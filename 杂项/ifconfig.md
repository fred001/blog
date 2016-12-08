
  # ifconfig

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 16:01:36 


      None


      <p>
      ifconfig

历史：
2015年10月08日
建立




ifconfig {interface} {up|down} <== 观察与启动接口 
[root@www ~]# ifconfig interface {options} 
<== 设定与修改接口 
选项与参数: 
interface:网络卡接口代号,包括 eth0, eth1, ppp0 等等 
options :可以接的参数,包括如下: 
up, down :启动 (up) 或关闭 (down) 该网络接口(不涉及任何参数) 
mtu 
:可以设定不同的 MTU 数值,例如 mtu 1500 (单位为 byte) 
netmask :就是子屏蔽网络; 
broadcast:就是广播地址啊! 

ifconfig eth0 192.168.100.100 
ifconfig eth0 192.168.100.100 netmask 255.255.255.128 mtu 8000 

ifconfig eth0:0 192.168.50.50 
      </p>

  