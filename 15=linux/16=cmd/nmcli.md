
  # nmcli

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 16:05:55 


      None


      <p>
      nmcli

历史：
2015年10月10日
建立




nmcli 是NetworkManager的命令行实现。 
功能强大，但是也复杂，文档不多。 

基本用法： 
	nmcli connection  show  | add | edit | modify  | del 管理连接
	nmcli  connection edit IFNAME  #进入交互界面设置连接 
	其它还有更多功能，比较高级，这两个基本的功能知道就可以管理连接了

	添加连接：
		nmcli connection add type ethernet con-name NAME_OF_CONNECTION ifname interface-name ip4 IP_ADDRESS gw4 GW_ADDRESS  
		其实很简单， type 是连接类型 ,ethernet 是以太网，相当于本地连接
		后面的con-name ifname ip4 gw4 都是针对这个连接的配置，
		可以省略，如果有必须的配置，会提示少了 xxx ,只要再加上这个 xxx 参数即可
		如  nmcli connection add type  连接类型  KEY1  VALUE1  KEY2 VALUE2 ...
		
		添加好后，nmcli connection show 查看新连接的ifname
		nmcli connection edit  IFNAME  进入交互编辑，编辑后 保存即可使用。


使用nmcli 创建一个pppoe adsl连接 

nmcli connection add type pppoe   myadsl #创建连接 
nmcli connection show pppoe-myadsl   #查看创建的连接（ 会主动加上pppoe-，不知道为什么） 
nmcli connection edit pppoe-myadsl   #进入交互编辑界面，编辑后要记得save ,用help 和 tab 辅助 
nmcli> set pppoe.username  bbbb   #修改用户名 
nmcli> set pppoe.password  1111   #修改密码 
nmcli> save  #保存 

最后退出重新查看下变化 
nmcli connection show pppoe-myadsl 

也可以用modify 直接编辑 
nmcli connection modify  pppoe-adsl pppoe.username cccc    #更快，即时生效 

同时nmcli支持简些 
connection = con 
add = a 

nmcli con a type pppoe #也是创建连接 

其它使用： 
	nmcli con show 
	nmcli -p con show  #显示当前连接 
	nmcli con show -a   #显示当前活动连接 

	#添加静态的网卡连接 
	nmcli connection add type ethernet con-name NAME_OF_CONNECTION ifname interface-name ip4 IP_ADDRESS gw4 GW_ADDRESS  
	 



范例：
	#创建基本连接-动态地址
	nmcli connection add type ethernet ifname epn3s0 

	#创建vpn pptp 连接
	nmcli connection show
	nmcli connection add type vpn  ifname myvpn  vpn-type pptp   #创建vpn,pptp造型连接
	nmcli connection  show  #应该多了个连接， ifname = vpn-myvpn (ifname 会自动带有前缀  vpn-)
	nmcli connection edit vpn-myvpn #编辑新连接
nmcli> print 
nmcli> set connection.id myvpn  #设置连接名，去掉vpn- 前缀
nmcli> print connection.id  #看看效果
nmcli> set connection.autoconnect no  #因为是vpn,不自动启动，需要在启动 
nmcli> set vpn.data #很关键包含服务器，帐号，及必要pptp设置，
输入 'data' 值： lcp-echo-interval = 30, password-flags = 0, lcp-echo-failure = 5, user = test001, require-mppe = yes, gateway = jp4.5uf5.com 
nmcli> print vpn.data  #设置完成注意检查下，有时候复制可能最后多了 vpn.data = 这些额外内容
nmcli> set vpn.secrets password = woyaozgm  #设置密码
nmcli>print  #最后检查
nmcli>print vpn.secrets  #单独检查密码，默认这个自动是 <hidden> ,需要单独指定显示
nmcli> save #别忘了保存
	
		 nmcli connection up myvpn #测试是否能启动 ，如果不能， 检查 /var/log/message 的错误信息
		nmcli connection down myvpn #停止连接
		 nmcli connection del  myvpn #这是删除连接
      </p>

  