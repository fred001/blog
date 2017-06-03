# tcpip

##### tracepath 没有看到 ttl 立刻返回值的包，只有最后的超时返回包，这是为什么？
  原因很简单：

  响应的icmp包是来源于不同地址的，（来源于中途的地址）
  tcpdump 设置了host 目标地址

  tcpdump host iamlosing.me

  所以看不到响应，只看到最后返回的 unreadable 响应

  tcpdump icmp #这样就看到了

##### tracepath 机制
  1. 设置ttl 的值，递增发送包， 
    当路程中的主机因为ttl =0 丢弃此包，会返回丢弃的icmp 响应包
    根据此来潘来判断该点的主机 ip
  2. 设置一个不常用的端口， 达到目的主机后会产生端口不可达的icmp响应包
