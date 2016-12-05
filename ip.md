
  # ip

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 16:01:45 


      None


      <p>
      ip

历史：
2015年10月08日
建立




[root@www ~]# ip [option] [动作] [指令] 
选项与参数: 
net.qiang@hotmail.comoption :设定的参数,主要有: 
-s :显示出该装置的统计数据(statistics),例如总接受封包数等; 
动作:亦即是可以针对哪些网络参数进行动作,包括有: 
link :关于装置 (device) 的相关设定,包括 MTU, MAC 地址等等 
addr/address :关于额外的 IP 协议,例如多 IP 的达成等等; 
route :与路由有关的相关设定 

root@www ~]# ip [-s] link show <== 单纯的查阅该装置相关的信息 
[root@www ~]# ip link set [device] [动作与参数] 
选项与参数: 
show:仅显示出这个装置的相关内容,如果加上 -s 会显示更多统计数据; 
set :可以开始设定项目, device 指的是 eth0, eth1 等等界面代号; 
动作与参数:包括有底下的这些动作: 
up|down :启动 (up) 或关闭 (down) 某个接口,其他参数使用默认的以 
太网络; 
address :如果这个装置可以更改 MAC 的话,用这个参数修改! 
name 
:给予这个装置一个特殊的名字; 
mtu 
:就是最大传输单元啊! 


ip link set eth0 up 
# 范例三:修改网络卡代号、MAC 等参数 
[root@www ~]# ip link set eth0 name vbird 


 ip address show 
<==就是查阅 IP 参数啊! 
[root@www ~]# ip address [add|del] [IP 参数] [dev 装置名] [相关参数] 
选项与参数: 
show 
:单纯的显示出接口的 IP 信息啊; 
add|del :进行相关参数的增加 (add) 或删除 (del) 设定,主要有: 
IP 参数:主要就是网域的设定,例如 192.168.100.100/24 之类的设定 
喔; 
dev 
:这个 IP 参数所要设定的接口,例如 eth0, eth1 等等; 
相关参数:主要有底下这些: 
broadcast:设定广播地址,如果设定值是 + 表示『让系统自动计算』 
label 
:亦即是这个装置的别名,例如 eth0:0 就是了! 
scope 
:这个界面的领域,通常是这几个大类: 
global :允许来自所有来源的联机; 
site 
:仅支持 IPv6 ,仅允许本主机的联机; 
link 
:仅允许本装置自我联机; 
host 
:仅允许本主机内部的联机; 
所以当然是使用 global 啰!预设也是 global 啦! 
# 范例一:显示出所有的接口之 IP 参数: 
[root@www ~]# ip address show 


root@www ~]# ip route show <==单纯的显示出路由的设定而已 
[root@www ~]# ip route [add|del] [IP 或网域] [via gateway] [dev 装置] 
选项与参数: 
show :单纯的显示出路由表,也可以使用 list ; 
add|del :增加 (add) 或删除 (del) 路由的意思。 
IP 或网域:可使用 192.168.50.0/24 之类的网域或者是单纯的 IP ; 
via 
:从那个 gateway 出去,不一定需要; 
dev 
:由那个装置连出去,这就需要了! 
mtu 
:可以额外的设定 MTU 的数值喔! 
# 范例一:显示出目前的路由资料 
[root@www ~]# ip route show 
192.168.1.0/24 dev eth0 prot 

# 范例二:增加路由,主要是本机直接可沟通的网域 
[root@www ~]# ip route add 192.168.5.0/24 dev eth0 
# 针对本机直接沟通的网域设定好路由,不需要透过外部的
      </p>

  