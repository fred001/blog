
  # samba

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:46:50 


      None


      <p>
      samba
历史：
2015年10月05日
建立




简介：
	samba是对windows 网络邻居的共享的模仿。 实现了linux, windows的文件，打印机共享。

启动:
	service smb start
配置文件：
	/etc/samba/smb.conf

相关命令：
	testparm   #检查配置文件
	smbstatus  #查看服务器状态
	pdbedit  #增加，修改，删除samba 用户（samba用户必须存在于linux服务器中，但是密码是另外设置的，主要是用户才能对应权限）
	smbpasswd  #修改用户密码
	smbclient   #客户端查看存在的共享
	mount.cifs   #客户端挂载共享

配置流程：
	编辑  smb.conf
	启动
	检查

配置参数：
	smb.conf

/etc/samba/smb.conf 核心配置文件
[global] 全局配置
workgroup = 工作群組的名稱：注意，主機群要相同； 
• netbios name = 主機的 NetBIOS 名稱啊，每部主機均不同； 
• server string = 主機的簡易說明，這個隨便寫即可。 
security = share, user, domain：三選一，這三個設定值分別代表：
• share：分享的資料不需要密碼，大家均可使用 (沒有安全性)； 
• user ：使用 SAMBA 伺服器本身的密碼資料庫，密碼資料庫與底下的 passdb backend 有關； 
• domain：使用外部伺服器的密碼，亦即 SAMBA 是用戶端之意，如果設定這個項目， 你還得要提供『password server = IP』的設定值才行； 


[分享名] 
path = /var/spool/samba //真正分享的目录
说明：path用来指定共享目录的路径。可以用%u、%m这样的宏来代替路径里的unix用户和客户机的Netbios名，用宏表示主要用于 [homes]共享域。例如：如果我们不打算用home段做为客户的共享，而是在/home/share/下为每个Linux用户以他的用户名建个目录， 作为他的共享目录，这样path就可以写成：path = /home/share/%u; 。用户在连接到这共享时具体的路径会被他的用户名代替，要注意这个用户名路径一定要存在，否则，客户机在访问时会找不到网络路径。同样，如果我们不是以用 户来划分目录，而是以客户机来划分目录，为网络上每台可以访问samba的机器都各自建个以它的netbios名的路径，作为不同机器的共享资源，就可以 这样写：path = /home/share/%m 。 




comment = Home Directories //说明
browseable = no //是否讓所有的使用者看到這個項目？
writable = yes //是否可以寫入？
valid users = %S //不是很清楚作用
valid users = MYDOMAIN\%S //不是很清楚作用
说明：valid users用来指定允许访问该共享资源的用户。 
例如：valid users = bobyuan，@bob，@tech（多个用户或者组中间用逗号隔开，如果要加入一个组就用“@+组名”表示。） 

guest ok = no //不清楚作用
说明：意义同“public”。 
printable = yes //不清楚作用
public = yes //不清楚作用
说明：public用来指定该共享是否允许guest账户访问。 
share modes = no //不清楚作用
write list = +staff //這個項目可以指定能夠進入到此資源的特定使用者

	
权限问题
权限可能根据用户名， 不同机器的用户名相互对应， 然后ID 相互转换，最后用来判断权限

samba的权限由两方面构成：一是目录本身的权限，二是samba的配置权限。最终权限定义是两者的最小交集。 
如果您需要以 bird 這個帳號登入 SAMBA 時，並且 Linux 本身並沒有 bird 這個使用者，呵呵！那麼您就必須要使用 useradd 來使 Linux 系統多出一個名為 bird 的帳號，然後才可以讓該帳號登入 SAMBA 伺服器喔！並且，並不是所有在 /etc/passwd 裡面的帳號都可以用來登入 SAMBA 主機，必須要使用 SAMBA 的相關功能 (就是 smbpasswd 這個指令) 所新增到 SAMBA 密碼設定檔裡面的帳號才可以使用 SAMBA 登入喔！


      </p>

  