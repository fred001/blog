
  # postfix 安装配置

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:46:31 


      None


      <p>
      postfix 安装配置
=================

 默认linux系统使用 sendmail收发邮件， 并且绑定25端口。

 yum install postfix

安装后： 
1 ， 需要禁止sendmail启动，
2， 使用postfix 替换。


配置步骤：
 1， 收发本地邮件， 
  /etc/hostname
  /etc/hosts   

确定这两处的本地域名正确， 并且使用   hostname 查看，一般来说就可以收发本地邮件了，使用 /etc/hostname中的域名

2, 接受局域网的其它postfix传输的邮件
	a, 局域网可能没有dns,无法查询mx记录， 所以直接用传输表来实现 
		/etc/postfix/transport 增加记录
			villager.iamlosing.me  smtp[192.168.1.200]:25 
		/etc/postfix/main.cf 
			smtp_look_up=dns.native 
	这样遇到这个域名的邮件，直接就使用传输表中的配置，向指定IP进行发送了
		
	b, 默认情况下postfix不接受外来邮件
			Edit file - /etc/postfix/main.cf

		    Change:

			From - #inet_interfaces = all 

			To - inet_interfaces = all 

		    Change:

			From - #mynetworks_style = subnet

			To - mynetworks_style = subnet

		    Change:

			From - mynetworks = 127.0.0.0/8

			To - mynetworks = 192.168.30.0/24, 127.0.0.0/8

			Edit file - /etc/postfix/master.cf

		    Change:

			From - smtp inet n - n - - smtpd

			To - 0.0.0.0:smtp inet n - n - - smtpd

			Then restart the Postfix server:
			/etc/postfix/postfix stop
			/etc/postfix/postfix start

		这样处理后，就同样监听外部接口，并能接收本地邮件了



一些重要配置说明：
	smtp_host_lookup = native,dns  #当寻找MTA发送的时候， 去哪找 MTA的IP, dns是查找dns服务器， native是查找  /etc/hosts (本地一定要有这个，因为 dns服务器上根本不可能有记录）

	inet_interfaces = all  #默认是localhost,只监听本机端口， 这样无法接受外网邮件，
	mynetworks_style = subnet  #设置哪些机器是可信赖的， subnet（子网） ，默认仅仅本地的ip才信赖，所以会拒绝其它地址的MTA

	mynetworks = 192.168.1.0/24, 127.0.0.0/8  #定义子网，跟 mynetworks_style 配合


master.cf
 	0.0.0.0:smtp      inet  n       -       n       -       -       smtpd
	
	前面的地址大概是监听端口，不是很清楚
	
transport:
	swordman.iamlosing.me smtp:[192.168.1.102]:25
	域名 + 转发的地址 ，这样实现自动转发，不过可能并不需要，加入有/etc/hosts的话



  

	
 

      </p>

  