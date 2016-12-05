
  # systemd

      version:  2
      created_at:  2016-01-22
      updated_at:  2016-05-03 19:51:47

      created at 2016-01-22 15:47:21 
update at 2016-05-03 19:51:47


      None


      <p>
      systemd

历史：
2015年10月13日
建立




systemd 

systmctl 

https://wiki.archlinux.org/index.php/Systemd_%28%E7%AE%80%E4%BD%93%E4%B8%AD%E6%96%87%29#systemd_.E5.9F.BA.E6.9C.AC.E5.B7.A5.E5.85.B7 

http://www.ibm.com/developerworks/cn/linux/1407_liuming_init1/index.html 
http://www.ibm.com/developerworks/cn/linux/1407_liuming_init2/index.html 
http://www.ibm.com/developerworks/cn/linux/1407_liuming_init3/ 


http://fedoraproject.org/wiki/Systemd/zh-cn#.E4.B8.BA.E4.BB.80.E4.B9.88.E6.98.AF_systemd.EF.BC.9F 
http://0pointer.de/blog/projects/systemd-docs.html 

需要做到： 
	1， 怎么创建一个服务？ 
	2， 管理服务： 
		  systemctl start httpd 
		  systemctl stop httpd 
		  systemctl status httpd 
		  systemctl restart httpd 
		  systemctl enable httpd 
		  systemctl disable httpd 
		  systemctl is-enabled httpd ; echo $? 0 表示已开机启用，1 表示没有开机启用 

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



服务脚本范例：
	[Unit]
	Description=My-demo Service
	After=syslog.target network.target,audited.service   #依赖关系，需要其它服务先启动

[Service]
StandardError=syslog+console
ExecStart=/root/bin/mount_unicorn  #启动命令
#停止的命令 ，如果没有，会按默认方式依次发送信号   SIGTERM, IGHUP,SIGKILL
#最终终止脚本
ExecStop=  。。。。 
 

#失败后30秒后重启
Restart=on-failure  
RestartSec=30s  

[Install]
WantedBy=multi-user.target  #多用户下安装


安装： 复制到 /usr/lib/systemd/system/ 目录下，然后使用systemctl enable unicorn 即可
	参考： http://0pointer.de/public/systemd-man/systemd.service.html
	http://0pointer.de/public/systemd-man/systemd.kill.html
      </p>

  