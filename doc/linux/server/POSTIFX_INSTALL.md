
  # 安装POSTFIX + SASL

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:47:31 


      None


      <p>
      安装POSTFIX + SASL
postfix+cyrus-sasl+cyrus-imapd + tls 安装配置


下一步：
    补充 dns 相关设置， 可以让其它邮箱发送给本机邮箱


本安装的目的是实现一个类似常见的邮箱服务，所有邮箱与本地账户无关。
其中postfix 负责邮件收发功能， cyrus-imapd 实现邮箱的阅读下载功能（ pop3 /imap)
cyrus-sasl 是两者都需要用到的，实现用户验证功能。


基本环境描述
	本地域名 local.localdomain
	邮箱域名  mail.frd.info  (对应用户邮箱是   USER@mail.frd.info)
	系统 centos7
	
	/etc/hosts  中加入   127.0.0.1  mail.frd.info

	
安装配置步骤
	1， 基本软件安装
		yum install cyrus-sasl cyrus-sasl-md5 cyrus-sasl-lib cyrus-sasl-plain cyrus-sasl-devel cyrus-sasl-scram    cyrus-imapd cyrus-imapd-devel cyrus-imapd-utils    postfix   openssl openssl-devel


		
		可能还需要安装其它软件，用来把默认的sendmail切换成 postfix		

	2,  切换 默认的sendmail 到 postfix
		启动服务
		systemctl enable postfix  (chkconfig --level 35 postfix on)
		systemctl enable cyrus-imapd   (chkconfig --level 35 cyrus-imapd on)
		service postfix start
		service cyrus-imapd start	

	3,  配置 sasl 使用独立的帐号管理，而不是默认的跟系统帐号相关
	 	/etc/sasl2/smtpd.conf
			pwcheck_method: auxprop
			auxprop_plugin:sasldb
			mech_list: PLAIN LOGIN CRAM_MD5 DIGEST-MD5

		此时对应的独立帐号文件是  /etc/sasldb2 
		如果没存在，试着创建个帐号试试	saslpasswd2 -c -u `postconf -h myhostname` test
		
        修改此文件的权限，以便让 postfix 和 cyrus 都能访问（读取）
        chown cyrus.mail /etc/sasldb2  (mail 是 postfix 的组）
        chmod 440 /etc/sasldb2		
		
		相关的命令： 
			sasldblistusers2  查看当前所有的帐号（不显示密码）
			saslpasswd2  USER   为某个帐号设置密码，若帐号不存在，自动创建 。若未指定域名，采用 `hostname` 的域名
			saslpasswd2 -d USER  删除某个帐号

	3, 配置 postfix 支持 sasl 验证 （成功后发送邮件需要使用sasl中的帐号密码来发送）
		/etc/postfix/main.cf  增加配置

		 smtpd_sasl_auth_enable = yes
		 smtpd_recipient_restrictions=
		   permit_mynetworks
		   permit_sasl_authenticated
		   reject_unauth_destination
		 
		 smtpd_sasl_authenticated_header = yes
		 smtpd_sasl_security_options = noanonymous
		 broken_sasl_auth_clients = yes
		

		先检查下本地域名   hostname , postconf -h myhostname 
		看看是否都是 localhost.localdomain
		
		这里确定的帐号是   USER@mail.frd.info , 
		先创建一个测试用户
		 saslpasswd2  111111   密码也设置成 111111
		 sasldblistusers2 看看是否出现

		重启postfix  service postfix restart
		
	
		通过telnet 测试	
		$ telnet 127.0.0.1 25
		HELO localhost
		　   ...
		　　250-AUTH LOGIN PLAIN DIGEST-MD5 CRAM-MD5  (支持的身份验证机制种类: LOGIN, PLAIN等)
		　　...

		 
		AUTH LOGIN
		　　334 VXNlcm5hbWU6       (Base64解码后: Username:)
		MTExMTEx                   (Base64编码前:的用户名 111111)
		　　334 UGFzc3dvcmQ6         (Base64解码后: Password:)
		MTExMTEx                    (Base64编码前的密码: 111111)
		　　235 Authentication successful
		QUIT
		    221 Bye
		    Connection closed by foreign host.


		
	     成功就是这一步正确了

	4，配置 cyrus-imapd  +  cyrus-sasl
		/etc/imapd.conf  确保有如下配置
		
		admins: cyrus    默认的管理帐号，还需要另外为它创建密码才能使用   
		sasl_pwcheck_method: auxprop   为sasl配置的
		sasl_mech_list: PLAIN LOGIN CRAM-MD5 DIGEST-MD5  为sasl配置的
		allowplaintext: yes   这里暂时允许明文密码， 用来测试，正式使用时候改成  no
		defaultdomain: mail.frd.info
		servername: mail.frd.info       要绑定的邮箱域名  （这个非常重要，是核心配置之一）


		为管理帐号创建密码 ，注意域名
		saslpasswd2 cyrus@mail.frd.info  

		重启cyrus-imapd    service cyrus-imapd restart

		现在进入cyrus-imapd 后台创建用户
		cyradm -u cyrus mail.frd.info
			> cm user.frd   (这里有两点，一是 user.不能省略，这样才能创建相应的目录，第二是不带域名，域名自动就是mail.frd.info)
			> quit

		现在为用户创建密码  
		saslpasswd2  frd@mail.frd.info  (这里却需要域名，否则省略了就是默认的域名'local.localdomain'）

		这里有个问题， postfix 和 cyrus-imapd 的域名不一样，所以帐号也不一样， 要么用两个帐号分别用于发信和收信
		要么为同一个用户创建两个域名的帐号，同样密码，这样看起来同一个帐号就可以了

		最后测试，用pop3协议测试帐号
		telnet  127.0.0.1 110
		....
		user frd (不需要域名，域名就是cyrus-imapd 默认的域名)
		.....
		pass 明文密码
	 
		...若提示验证成功 
		list  (查看当前邮箱中的邮件）

		RETR 1  #获取序号为1 的邮件

		若成功就完毕了。

	5，配置 postfix 传送邮件给 cyrus-imapd 
	/etc/postfix/main.cf

	virtual_mailbox_domains = mail.frd.info 
	virtual_mailbox_maps = hash:/etc/postfix/virtual  这里包含所有的邮箱帐号，所有帐号都必须存在此文件，postfix才会发送，否则会提示邮箱地址不存在，拒绝发送
	virtual_transport = lmtp:unix:/var/lib/imap/socket/lmtp

	然后增加邮箱用户在  /etc/postfix/virtual
		 frd@mail.frd.info   General Information Address (第一列是邮箱，第二列没有意义）
	 这是个特殊文件，所以另外处理下  
		postmap  /etc/postfix/virtual 


         配置到这里就算完成了。最后需要测试。
	6.测试
		 总共创建两个用户  frd@mail.frd.info  frd2@mail.frd.info
		1, cyrus-imapd 中创建
		2， sasl 中创建两个域名的同密码同用户帐号
		3， 增加frd@mail.frd.info 到虚拟表中

	      创建完成后，使用thunderbird 创建两个邮箱帐号，互发邮件。

		服务器：
		服务器名称 :  mail.frd.info
		用户名 : frd
		连接安全  starttls
		验证方式   加密密码
		
		smtp中
		服务器名称 mail.frd.info
		端口  25
		连接安全  无
		验证方式  密码，不安全地传输
		用户名   frd


    7，补充， 支持 tls 加强安全
    
            先需要openssl创建公钥和私钥
            mkdir /etc/tls
            cd /etc/tls
             openssl req -new -x509 -nodes -out mail_cert.pem
             chmod 0600 privkey.pem
             
             chown cyrus.mail /etc/tls
             chown cyrus.mail /etc/tls/*
             
             编辑 /etc/postfix/main.cf ,支持使用tls登录发送
                smtpd_use_tls = yes
                smtpd_tls_security_level = may
                smtpd_tls_loglevel=3
                smtpd_tls_session_cache_timeout = 3600s
                smtpd_tls_session_cache_database = btree:/var/lib/postfix/smtpd_tls_cache
                smtpd_tls_cert_file = /etc/tls/mail_cert.pem
                smtpd_tls_key_file = /etc/tls/privkeggy.pem
                tls_random_source = dev:/dev/urandom
                tls_daemon_random_source = dev:/dev/urandom
                smtpd_tls_auth_only = yes


             编辑  /etc/postfix/master.cf , 以支持协议
             smtps     inet  n       -       n       -       -       smtpd
             确保这一行不被注释
             
             
             最后设置cyrus-imapd 也支持tls 收取邮件  /etc/imapd.conf
             tls_cert_file: /etc/tls/mail_cert.pem
             tls_key_file: /etc/tls/privkey.pem


             #tls_ca_file: /etc/pki/tls/certs/ca-bundle.crt  #注释掉这行，不然会出现错误Fatal error: tls_start_servertls() failed




其它参考
    cyradm中创建用户时候， 
    可以设置邮箱限额
    默认无法删除用户， 需要先赋予权限，
       sam frd cyrus cd (cd = change + delete)
       dm  frd (此时可以删除）
       
       
如果mailbox 损坏，想删除却遇到system io error 试试  
	reconstruct  MAILBOX
	然后可能可以删除了
	sam MAILBOX cyrus cd
	dm MAILBOX
	
	
所有地日志消息都在  /var/log/maillog 中


默认 postfix 只绑定本机端口，想要外部能连接postfix发送邮件，
	需要修改inet_interfaces = all
 为  all ,一定要是all才行
	
	
	
若/var/log/maillog 不存在，可能是日志服务没有启动

yum install rsyslog
 systemctl enable rsyslog
 service rsyslog start
 
 
 可能的问题： 
        明明安装了tls, 提示postfix 未支持starttls
        最后发现是 有特殊字符在 tls 私钥的路径中  ，日志显示  ??/etc/...   （这个??)
        总之有问题多注意日志        
        
   centos6中， postfix 验证失败，需要加上   后面的域名 frd@.....

imapd.conf 中的默认ca证书是无效的，可以注释掉，存在有可能造成问题（centos6) 
     
     
     

虚拟邮箱的别名
    增加设置  /etc/postfix/main.cf
    virtual_alias_maps=hash:/etc/postfix/virtual_alias
    
        内容格式:    admin@iamlosing.me   frd@iamlosing.me
        修改后，执行  postmap  /etc/postfix/virtual_alias 更新之
        
      注意：  若一个邮箱已经在虚拟别名中存在了，则不应该再出现再 virtual_mailbox_maps 中，
           若两者同时存在，则以 virtual_mailbox_maps为准

参考
https://wiki.centos.org/HowTos/Postfix+CyrusImapd+SASL#head-dc104e8c1d1b57266ced18db9e2b4022a11080b9
	
			



测试与检查： 
	域名  iamlosing.me
	邮件域名  mail.iamlosing.me  IP 地址和 iamlosing.me 相同

	邮件格式  USER@iamlosing.me

	1, postfix virtual 中绑定域名为    iamlosing.me
	2, cyrus-impaed 中的 绑定域名和 server name 都是  iamlosing.me
	3, 创建帐号：
		saslpasswd2 创建管理帐号  cyrus@iamlosing.me
		cyrus@iamlosing.me  登陆，然后创建用户  user.frd (为了能创建文件目录）
		再创建一个为postfix服务的同名帐号，但是不同域名， 域名是本地host,通常是 localhost.localdomain:
			saslpasswd2  frd@localhost.localdomain

	4,开始检查
		检查发信件
		从别处登陆  telnet  iamlosing.me 25 
		... 
		

		检查收信
		telnt iamlosing 110


	5，正常后配置邮件客户端：
		收：  iamlosing.me  143   用户名  frd ,
			加密方法 starttls
			身份验证 ： 密码
		发送：
			iamlosing.me  465
			starttls

			身份验证： plain ,
			用户名  : frd

主要通过  telnet 来检测，完成后再检测邮件客户端
      </p>

  