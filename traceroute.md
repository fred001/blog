
  # traceroute

      version:  1
      created_at:  2016-03-15
      updated_at:  None

      created at 2016-03-15 12:40:47 


      None


      <p>
      
[root@www ~]# traceroute [选项与参数] IP 
选项与参数: 
-n :可以不必进行主机的名称解析,单纯用 IP ,速度较快! 
-U :使用 UDP 的 port 33434 来进行侦测,这是预设的侦测协议; 
-I :使用 ICMP 的方式来进行侦测; 
net.qiang@hotmail.com-T :使用 TCP 来进行侦测,一般使用 port 80 测试 
-w :若对方主机在几秒钟内没有回声就宣告不治...预设是 5 秒 
-p 埠号:若不想使用 UDP 与 TCP 的预设埠号来侦测,可在此改变埠号。 
-i 装置:用在比较复杂的环境,如果你的网络接口很多很复杂时,才会用到 
这个参数; 
举例来说,你有两条 ADSL 可以连接到外部,那你的主机会有两个 
ppp, 
你可以使用 -i 来选择是 ppp0 还是 ppp1 啦! 
-g 路由:与 -i 的参数相仿,只是 -g 后面接的是 gateway 的 IP 就是了。 
# 范例一:侦测本机到 yahoo 去的各节点联机状态 
[root@www ~]# traceroute -n tw.yahoo.com
      </p>

  