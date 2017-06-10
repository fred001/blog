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
1. systemctl daemon-reload  重新载入配置文件 (如  unciorn.service )，如果有修改
1. 怎么创建一个服务？ 
  假设服务名为 unicorn  
  创建一个脚本 unicorn.service  
  复制到 /usr/lib/systemd/system/ 目录下  
  然后使用systemctl enable unicorn 即可  

  服务脚本范例：  

      [Unit]
      Description=unicorn  #这里的描述很关键，

      #依赖关系，需要其它服务先启动
      After=syslog.target network.target,audited.service   
      [Service]

      #除了默认的simple,还有其它好几种服务类型， 比如n2n就是forking类型，如果设置错了类型可能会导致服务运行失败
      Type=simple  

      StandardError=syslog+console
      ExecStart=/root/bin/mount_unicorn  #启动命令
      #停止的命令 ，如果没有，会按默认方式依次发送信号   SIGTERM, IGHUP,SIGKILL
      #最终终止脚本
      #ExecStop=  。。。。 
       

      #失败后30秒后重启
      Restart=on-failure  
      RestartSec=30s  

      [Install]
      #多用户下安装,只能设置一个的样子  a.target  b.target 是错误的
      WantedBy=multi-user.target  


所有的运行等级
      0 	runlevel0.target, poweroff.target 	Shut down and power off the system.
      1 	runlevel1.target, rescue.target 	Set up a rescue shell.
      2 	runlevel2.target, multi-user.target 	Set up a non-graphical multi-user system.
      3 	runlevel3.target, multi-user.target 	Set up a non-graphical multi-user system.
      4 	runlevel4.target, multi-user.target 	Set up a non-graphical multi-user system.
      5 	runlevel5.target, graphical.target 	Set up a graphical multi-user system.
      6 	runlevel6.target, reboot.target 	Shut down and reboot the system.

如果安装出现  invalid argument, 可能是 Install 中的配置有错误， 




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
 systemctl get-default 

或 ll /etc/systemd/system/default.target


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


#### journalctl
systemd 自带日志服务 journald，该日志服务的设计初衷是克服现有的 syslog 服务的缺点。比如：

    syslog 不安全，消息的内容无法验证。每一个本地进程都可以声称自己是 Apache PID 4711，而 syslog 也就相信并保存到磁盘上。
        数据没有严格的格式，非常随意。自动化的日志分析器需要分析人类语言字符串来识别消息。一方面此类分析困难低效；此外日志格式的变化会导致分析代码需要更新甚至重写。

Systemd Journal 用二进制格式保存所有日志信息，用户使用 journalctl 命令来查看日志信息。无需自己编写复杂脆弱的字符串分析处理程序。


记录日志

    syslog    

    c:
    
    #include <syslog.h>
    syslog(LOG_NOTICE,"Hell World")

    python:
    import syslog
    syslog.syslog("hello world")


    甚至可以捕获服务进程在 stdout/stderr输出的所有内容(估计必须是服务进程)


    另外提供了原生的c语言库用户提交日志 (systemd/sd-journal.h)


    sd_journal_print(LOG_NOTICE,"hello world"),
    这个方法能包含代码的位置信息,函数，文件，行数等
    还可以加入更多自定义字段

    对于python
    from systemd import journal
    journal.send("hello world")

    php:
    sd_journal_send("MESSAGE=hello world")

    nodejs也有对应的方法



配置文件：/etc/systemd/journald.conf

手动创建存储目录  /var/log/journal 若被删掉是不会重建的，除非升级软件包
若是此目录不存在， 则会保存到 /run/log/journal
run是重启后丢失的



journalctl -b 
  本次启动后的所有日志


journalctl -b -p err
  本地启动后，等级为err的日志

journalctl --since=2012-10-15 --uitil='2011-10-16 23:59:59' #根据日期查询
journalctl /dev/sda #根据设备查询
journalctl /usr/lib/systemd/system #根据特定程序查询
journalctl _PID=1 #查询进程


怎么查看一个service的日志
journalctl -u httpd #查询 unit, 注意后面的d, 可以监控任何一个service了

journalctl -u unicorn #比如查看自定义的服务日志


分发

systemd journal本身未提供日志分发功能。
常见的解决方案，做好单机日志的存储配置之后，通过rsync、btsync等工具收集同步日志至某中心节点进行分析处理。
另外在systemd-193添加了systemd-journal-gatewayd.service，服务器开启此服务之后，将监听本地19531端口，其他机器可通过HTTP或JSON协议访问服务器得到后者日志，详细介绍(登录验证等)请查看 systemd-journal-gatewayd.service 。
注：systemd-212引入了 systemd-journal-remote >systemd-journal-remote is a command to receive serialized journal events and store them to the journal.

日志监控和报警
journal没有监控和报警方面的特性与功能，可以通过日志工具的过滤再配合脚本或程序做监控与报警。


journalctl -o json-pretty -f
  以json格式来查看日志

journalctl  -f  
  类似 tail -f 的方式监控新日志


systemd下服务单元的启动、停止以及进入失败状态都会生成Audit记录，日志记录在 /var/log/audit/audit.log 文件中。 


由 Journal 守护进程添加的域将具有下划线前缀(“_”)， 用来标示该区域是可信的，而不是由未知客户端提供的。应用程序自身无法传递以下划线开头的的域名称。这是一个样例展示在客户端传输基础上添加内容的日志条目展示：



man 手册包含了众多重要的信息，勤奋阅读!


内核一旦检测完硬件并组织好了内存，就会运行 /usr/lib/systemd/systemd 可执行程序，这个程序会按顺序依次发起其他程序。（在还没有 Systemd 的日子里，内核会去运行 /sbin/init，随后这个程序会在名为 SysVinit 的系统中运行其余的各种启动脚本。）



#### Timer

创建一个  NAME.timer 的服务，运行之即可。
详细配置参考  man systemd.timer , man systemd.time


配置格式： 

    [Unit]
    Description=Runs myscript every hour
     
    [Timer]
    # 首次运行要在启动后10分钟后
    OnBootSec=10min
    # 每次运行间隔时间
    OnUnitActiveSec=1h #根据本服务的启动时间来算
    #OnCalendar=.... #根据日历时间来算，可用来替代  crontab
    Unit=myscript.service #定时运行此服务,由此服务指定具体的执行脚本
     
    [Install]
    WantedBy=multi-user.target


OnCalendar设置格式：
日历事件

所谓"日历事件"是指可以同时表达多个时间戳的一种特殊的表达式， 可以把它想象成一种专用于时间戳的正则表达式。 其语法是基于前述绝对时间戳语法的一种扩展。例如：

Thu,Fri 2012-*-1,5 11:12:13

表示： 2012年任意月份的1号或5号且为周三或周五的日子的11点12分13秒

"星期"部分是可选的。若指定， 则必须使用英文三字母缩写(例如"Wed")或英文全称(例如"Wednesday")， 大小写无关。可以使用 "," 依次列出多个日子， 也可以使用 ".." 表示一个范围， 还可以将多个范围( ".." )用 "," 依次列出。

对于"年-月-日"与"时:分:秒"两部分中的 每个子部分都可以使用 "*" 表示匹配任意值、 使用","依次列出多个值、使用 ".." 表示一个范围、 使用"/整数"表示以此整数为间隔不断向后重复跳跃 (例如在表示分钟的部分"3/10"等价于"3,13,23,33,43,53")。 最后，还可以将多个重复("/")用与范围("..")用","依次列出。

注意，"秒"部分比较特殊，可以使用十进制小数以表示更高的精度(最多六位小数)， 例如"3.33/10.05"等价于"3.33,13.38,23.43,33.48,43.53,53.58"。

若省略了"年-月-日"则等价于当前日期； 若省略了"时:分:秒"则等价于"00:00:00"； 若省略了":秒"则等价于":00"

时区部分与时间戳一样，要么必须省略，要么必须丝毫不差的设为"UTC"三个大写字母。 省略时区表示使用本机时区，而设为"UTC"则表示使用世界统一时间(相当于格林威治时间)。

特殊的日历事件关键字 "minutely"(每分钟), "hourly"(每小时), "daily"(每天), "monthly"(每月), "weekly"(每周), "yearly"(每年), "quarterly"(每季度), "semiannually"(每半年) 的精确定义 分别是： "*-*-* *:*:00", "*-*-* *:00:00", "*-*-* 00:00:00", "*-*-01 00:00:00", "Mon *-*-* 00:00:00", "*-01-01 00:00:00", "*-01,04,07,10-01 00:00:00", "*-01,07-01 00:00:00"

http://www.jinbuguo.com/systemd/systemd.time.html#

下面是一些日历事件实例及其标准化形式：

   Sat,Thu,Mon..Wed,Sat..Sun → Mon..Thu,Sat,Sun *-*-* 00:00:00
     Mon,Sun 12-*-* 2,1:23 → Mon,Sun 2012-*-* 01,02:23:00
                   Wed *-1 → Wed *-*-01 00:00:00
           Wed..Wed,Wed *-1 → Wed *-*-01 00:00:00
                Wed, 17:48 → Wed *-*-* 17:48:00
Wed..Sat,Tue 12-10-15 1:2:3 → Tue..Sat 2012-10-15 01:02:03
               *-*-7 0:0:0 → *-*-07 00:00:00
                     10-15 → *-10-15 00:00:00
       monday *-12-* 17:00 → Mon *-12-* 17:00:00
 Mon,Fri *-*-3,1,2 *:30:45 → Mon,Fri *-*-01,02,03 *:30:45
      12,14,13,12:20,10,30 → *-*-* 12,13,14:10,20,30:00
           12..14:10,20,30 → *-*-* 12,13,14:10,20,30:00
 mon,fri *-1/2-1,3 *:30:45 → Mon,Fri *-01/2-01,03 *:30:45
            03-05 08:05:40 → *-03-05 08:05:40
                  08:05:40 → *-*-* 08:05:40
                     05:40 → *-*-* 05:40:00
    Sat,Sun 12-05 08:05:40 → Sat,Sun *-12-05 08:05:40
          Sat,Sun 08:05:40 → Sat,Sun *-*-* 08:05:40
          2003-03-05 05:40 → 2003-03-05 05:40:00
05:40:23.4200004/3.1700005 → 05:40:23.420000/3.170001
            2003-02..04-05 → 2003-02,03,04-05 00:00:00
      2003-03-05 05:40 UTC → 2003-03-05 05:40:00 UTC
                2003-03-05 → 2003-03-05 00:00:00
                     03-05 → *-03-05 00:00:00
                    hourly → *-*-* *:00:00
                     daily → *-*-* 00:00:00
                 daily UTC → *-*-* 00:00:00 UTC
                   monthly → *-*-01 00:00:00
                    weekly → Mon *-*-* 00:00:00
                    yearly → *-01-01 00:00:00
                  annually → *-01-01 00:00:00
                     *:2/3 → *-*-* *:02/3:00


                     事实上这些就是sytemd.time文档说的。 只是全是英文，而且得实践下就明白了



OnCalendar=*-*-* *:*:00  每分钟执行一次


####  参考
https://wiki.archlinux.org/index.php/Systemd_%28%E7%AE%80%E4%BD%93%E4%B8%AD%E6%96%87%29#systemd_.E5.9F.BA.E6.9C.AC.E5.B7.A5.E5.85.B7 
http://www.ibm.com/developerworks/cn/linux/1407_liuming_init1/index.html 
http://www.ibm.com/developerworks/cn/linux/1407_liuming_init2/index.html 
http://www.ibm.com/developerworks/cn/linux/1407_liuming_init3/ 
http://fedoraproject.org/wiki/Systemd/zh-cn#.E4.B8.BA.E4.BB.80.E4.B9.88.E6.98.AF_systemd.EF.BC.9F 
http://0pointer.de/blog/projects/systemd-docs.html 
	参考： http://0pointer.de/public/systemd-man/systemd.service.html
	http://0pointer.de/public/systemd-man/systemd.kill.html


  红帽子文档，权威，有四节
  https://access.redhat.com/documentation/en-US/Red_Hat_Enterprise_Linux/7/html/System_Administrators_Guide/sect-Managing_Services_with_systemd-Unit_Files.html#sect-Managing_Services_with_systemd-Unit_File_Structure



  http://www.ruanyifeng.com/blog/2016/03/systemd-tutorial-commands.html
  http://blog.csdn.net/fu_wayne/article/details/38018825


十分完整的文档， 不过全是英文，比较多
https://www.freedesktop.org/wiki/Software/systemd/


#journal比较详细的文章
http://www.tuicool.com/articles/EfuYJjy


介绍了journal的设计概念
https://linuxtoy.org/archives/systemd-journal.html
