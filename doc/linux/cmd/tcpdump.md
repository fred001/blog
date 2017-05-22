
  # tcpdump

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 16:11:06 


      None


      <p>
      tcpdump
历史：
2015年10月08日建立

[root@www ~]# tcpdump [-AennqX] [-i 接口] [-w 储存档名] [-c 次数] \ 
[-r 档案] [所欲撷取的封包数据格式] 
选项与参数: 
-A :封包的内容以 ASCII 显示,通常用来捉取 WWW 的网页封包资料。 
-e :使用资料连接层 (OSI 第二层) 的 MAC 封包数据来显示; 
-nn:直接以 IP 及 port number 显示,而非主机名与服务名称 
-q :仅列出较为简短的封包信息,每一行的内容比较精简 
-X :可以列出十六进制 (hex) 以及 ASCII 的封包内容,对于监听封包内容 
很有用 
-i :后面接要『监听』的网络接口,例如 eth0, lo, ppp0 等等的界面; 
-w :如果你要将监听所得的封包数据储存下来,用这个参数就对了!后面接 
档名 
-r :从后面接的档案将封包数据读出来。那个『档案』是已经存在的档案, 
并且这个『档案』是由 -w 所制作出来的。 
-c :监听的封包数,如果没有这个参数, tcpdump 会持续不断的监听, 
直到使用者输入 [ctrl]-c 为止。 
所欲撷取的封包数据格式:我们可以专门针对某些通讯协议或者是 IP 来源进 
行封包撷取, 
net.qiang@hotmail.com那就可以简化输出的结果,并取得最有用的信息。常见的表示方法有: 
'host foo', 'host 127.0.0.1' :针对单部主机来进行封包撷取 
'net 192.168' :针对某个网域来进行封包的撷取; 
'src host 127.0.0.1' 'dst net 192.168':同时加上来源(src)或目标 
(dst)限制 
'tcp port 21':还可以针对通讯协议侦测,如 tcp, udp, arp, ether 等 
还可以利用 and 与 or 来进行封包数据的整合显示呢! 
# 范例一:以 IP 与 port number 捉下 eth0 这个网络卡上的封包,持续 3 
秒 
[root@www ~]# tcpdump -i eth0 -nn 
[root@www ~]# tcpdump -i eth0 -nn port 21 
[root@www ~]# tcpdump -i lo -nn 

5.5.2 图形接口封包撷取器: wireshark
yum install wireshark-gnome wireshark

tcpdump 笔记：
tcpdump 默认监听第一个网络接口的数据 （第一个未必就是ifconfig显示第一个） 

指定具体的网络接口

tcpdump -i eth0

指定通讯的ip

tcpdump host iamlosing.me (也可以换成ip)


复合指定

tcpdump -i eth0 host iamlosing.me

http://www.cnblogs.com/ggjucheng/archive/2012/01/14/2322659.html

保存到文件
tcpdump ...   -w result.txt
保存后的文件就可以通过  wireshark 来读取了
      </p>

  