
  # route

      version:  1
      created_at:  2016-03-15
      updated_at:  None

      created at 2016-03-15 12:36:24 


      None


      <p>
      route [-nee] 
[root@www ~]# route add [-net|-host] [网域或主机] netmask [mask] 
[gw|dev] 
[root@www ~]# route del [-net|-host] [网域或主机] netmask [mask] 
[gw|dev] 
观察的参数: 
-n :不要使用通讯协议或主机名,直接使用 IP 或 port number; 
-ee :使用更详细的信息来显示 
增加 (add) 与删除 (del) 路由的相关参数: 
-net 
:表示后面接的路由为一个网域; 
-host 
:表示后面接的为连接到单部主机的路由; 
netmask :与网域有关,可以设定 netmask 决定网域的大小; 
gw 
:gateway 的简写,后续接的是 IP 的数值喔,与 dev 不同; 
net.qiang@hotmail.comdev 
:如果只是要指定由那一块网络卡联机出去,则使用这个设定, 
后面接 eth0 等 


Flags:总共有多个旗标,代表的意义如下: 
  U (route is up):该路由是启动的; 
  H (target is a host):目标是一部主机 (IP) 而非网域; 
 G (use gateway):需要透过外部的主机 (gateway) 来转递封包; 

 

D (dynamically installed by daemon or redirect):已经由服务 
或转 port 功能设定为动态路由 
M (modified from routing daemon or redirect):路由已经被修改 
了; 
! (reject route):这个路由将不会被接受(用来抵挡不安全的网域!) 


[root@www ~]# route del -net 169.254.0.0 netmask 255.255.0.0 dev eth0 
# 请注意,在删除的时候,需要将路由表上面出现的信息都写入 
# 包括 netmask , dev 等等参数喔!注意注意 

route add -net 192.168.100.0  netmask 255.255.255.0 dev eth0 
route add default gw 192.168.1.250 
      </p>

  