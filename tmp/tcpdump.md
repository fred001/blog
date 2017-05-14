# tcpdump


tcpdump 基本用法
tcpdump  -i  DEV  指定监听的设备  如 tcpdump -i lo
tcpdump -w  result.txt   将监听到的数据写入文件，方便wireshark 来查看 (wireshark result.txt ) 查看文件

过滤:
tcpdump  host 127.0.0.1  只监听此IP上的包
tcpdump  dst  127.0.0.1  只监听目标为此ip的包
tcpdump  src  127.0.0.1  只监听来源为此ip的包
tcpdump  net  192.168.2.0 指定网络地址
tcpdump  port  22  指定端口

tcpdump  fddi|ip|arp|rarp|tcp|udp   指定网络协议

其它还支持网关，广播等，并且支持逻辑运算符组成更复杂的过滤条件

监听后获得的结果通常保存到文件， 由wireshark 来查看。 
wireshark也有监听功能，但是不如tcpdump好用。所以仅仅用来查看
