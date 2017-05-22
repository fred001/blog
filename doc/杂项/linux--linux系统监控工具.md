
  # linux--linux系统监控工具

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:17:58 


      None


      <p>
      LINUX系统监控工具
系统监控 
整体
 vmstat
 
 -查看CPU 负载
  htop
  mapstat   2 3 
 -内存使用
 htop
free -m 

硬盘使用：
  sar -d 1 10
  关注 %util 和 rd_sec/s wr_sec/s
  
  iostat
  
  网络使用：
    iptraf -ng
    ifstat
    sar有很多用途，如果要来监控网络流量，使用下面的命令行方式：

sar -n DEV interval count

 NTOP是一种监控网络流量 的工具，用NTOP显示网络的使用情况比其他一些网管软件 更加直观、详细。NTOP甚至可以列出每个节点计算机的网络带宽利用率。

NTOP是一个灵活的、功能齐全的，用来监控和解决局域网 问题的工具。它同时提供命令行输入和Web界面 ，可应用于嵌入式Web 服务。


vnstat
进程：
pmap可以报告某个或多个进程的内存使用情况。使用pmap判断主机中哪个进程因占用过多内存导致内存瓶颈。图14-9显示了SUSE LINUX

11 strace

strace截取和记录系统进程调用，以及进程收到的信号。是一个非常有效的检测、指导和调试工具。系统管理员可以通过该命令容易地解决程序问题。

使用该命令需要指明进程的ID(PID)，例如：

strace -p <pid>


监控进程各个方面资源使用情况：
  用 NetHogs 监控 Linux 每个进程的网络使用情况
  硬盘：
    iotop
    
    http://www.ansen.org/disk-monitor.html
    lsof 查看程序读写的文件
    反向查找程序
  

其它：
 starace
 dnstracer
 
 


      </p>

  