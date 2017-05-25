# systemd

version:  2
created_at:  2015-10-13
updated_at:  2016-05-03 19:51:47



## 常用操作

#### 管理服务

1. 启动服务  systemctl start httpd 
1. 关闭服务  systemctl stop httpd 
1. 查看服务状态  systemctl status httpd 
1. 重启服务  systemctl restart httpd 
1. 允许开机启动  systemctl enable httpd 
1. 禁止开机启动  systemctl disable httpd 
1. 检查是否允许开机启动  systemctl is-enabled httpd ; echo $? 0 表示已开机启用，1 表示没有开机启用 
1. 查看已启动的服务列表：systemctl list-unit-files|grep enabled
1. 列出所有服务可用单元 systemctl list-unit-files
1. 列出所有运行中的单元 systemctl list-units
1. 列出失败的单元 systemctl --failed
1. 列出某个单元是否启动  systemctl is-enabled crond.service  (输出  enabled )
1. 检查某个单元或服务是否运行  systemctl is-active crond  (输出  active )
1. 列出所有服务（包括启用的和禁用的） systemctl list-unit-files  --type=service
1. 使用systemctl命令杀死服务 systemctl kill httpd
1. 启动系统救援模式 systemctl rescue
1. 进入紧急模式 systemctl emergency
1. 列出当前使用的运行等级 systemctl get-default （如输出 multi-user.target ) (注意:init 1也是可以使用的)
1. 重启系统 systemctl reboot
1. 停止系统 systemctl halt
1. 挂起系统 systemctl suspend
1. 休眠系统 systemctl hibernate
1. 使系统进入混合睡眠 systemctl hybrid-sleep
1. 怎么创建一个服务？ 
  假设服务名为 unicorn  
  创建一个脚本 unicorn.service  
  复制到 /usr/lib/systemd/system/ 目录下  
  然后使用systemctl enable unicorn 即可  

  服务脚本范例：  

      [Unit]
      Description=UNICORN Service

      #依赖关系，需要其它服务先启动
      After=syslog.target network.target,audited.service   
      [Service]
      StandardError=syslog+console
      ExecStart=/root/bin/mount_unicorn  #启动命令
      #停止的命令 ，如果没有，会按默认方式依次发送信号   SIGTERM, IGHUP,SIGKILL
      #最终终止脚本
      #ExecStop=  。。。。 
       

      #失败后30秒后重启
      Restart=on-failure  
      RestartSec=30s  

      [Install]
      WantedBy=multi-user.target  #多用户下安装







#### 其它

  你可以使用下面的命令切换到“运行级 3 ”： 

   systemctl isolate multi-user.target (or) systemctl isolate runlevel3.target 

  你也可以使用下面的命令切换到“运行级 5 ”： 

   systemctl isolate graphical.target (or) systemctl isolate runlevel5.target 

		 






 如何改变默认运行级别？ 

systemd 使用链接来指向默认的运行级别。在创建新的链接前，你可以通过下面命令删除存在的链接： 

 rm /etc/systemd/system/default.target 

默认切换到运行级 3 ： 

 ln -sf /lib/systemd/system/multi-user.target /etc/systemd/system/default.target 

默认切换到运行级 5 ： 

 ln -sf /lib/systemd/system/graphical.target /etc/systemd/system/default.target 

systemd 不使用/etc/inittab 文件。 


 如何查看当下运行级别？ 

runlevel 命令在 systemd 下仍然可以工作。你可以继续使用它，尽管 systemd 使用 'target' 概念(多个的 'target' 可以同时激活)替换了之前系统的 runlevel 。等价的 systemd 命令是 

 systemctl list-units --type=target 


 如何关机？ 

你可以使用 

poweroff 




  

      ======

分析systemd的启动进程  systemd-analyze
分析各个进程启动发费的时间  systemd-analyze blame
分析启动时候的关键链 systemd-analyze critical-chain


重要：Systemctl接受服务（.service），挂载点（.mount），套接口（.socket）和设备（.device）作为单元。


注意:who -r 也是可以查看的

启动运行等级5，即图形模式
# systemctl isolate runlevel5.target
或
# systemctl isolate graphical.target




启动运行等级3，即多用户模式（命令行）


# systemctl isolate runlevel3.target

或

# systemctl isolate multiuser.target




设置多用户模式或图形模式为默认运行等级


# systemctl set-default runlevel3.target

# systemctl set-default runlevel5.target




对于不知运行等级为何物的人，说明如下。
Runlevel 0 : 关闭系统
Runlevel 1 : 救援？维护模式
Runlevel 3 : 多用户，无图形系统
Runlevel 4 : 多用户，无图形系统
Runlevel 5 : 多用户，图形化系统
Runlevel 6 : 关闭并重启机器



注意:在centos7 中仍然可以使用init 0 关机 init 6 启动。



systemd-cgls以树形列出正在运行的进程，它可以递归显示控制组内容。如图：



2、如何改变默认运行级别？
systemd使用链接来指向默认的运行级别。在创建新的链接前，可以通过下面命令删除存在的链接： rm /etc/systemd/system/default.target
默认启动运行级别3 ：
ln -sf /lib/systemd/system/multi-user.target /etc/systemd/system/default.target
默认启动运行级别5 ：
ln -sf /lib/systemd/system/graphical.target /etc/systemd/system/default.target
systemd不使用/etc/inittab文件。

####  参考
https://wiki.archlinux.org/index.php/Systemd_%28%E7%AE%80%E4%BD%93%E4%B8%AD%E6%96%87%29#systemd_.E5.9F.BA.E6.9C.AC.E5.B7.A5.E5.85.B7 
http://www.ibm.com/developerworks/cn/linux/1407_liuming_init1/index.html 
http://www.ibm.com/developerworks/cn/linux/1407_liuming_init2/index.html 
http://www.ibm.com/developerworks/cn/linux/1407_liuming_init3/ 
http://fedoraproject.org/wiki/Systemd/zh-cn#.E4.B8.BA.E4.BB.80.E4.B9.88.E6.98.AF_systemd.EF.BC.9F 
http://0pointer.de/blog/projects/systemd-docs.html 
	参考： http://0pointer.de/public/systemd-man/systemd.service.html
	http://0pointer.de/public/systemd-man/systemd.kill.html
