
  # iamlosing.me 邮箱管理

      version:  1
      created_at:  2016-04-27
      updated_at:  None

      created at 2016-04-27 11:24:02 


      None


      <p>
      1, 登陆cyrus-imapd
	cyradmin -u cyrus iamlosing.me
	密码： 111111

	创建两个同名帐号
	>cm  user.test
	>cm user.test@localhost.localdomain
	>quit

	密码： 
	saslpasswd2  test@iamlosing.me
	saslpasswd2  test@localhost.localdomain

	增加邮箱至 postfix 虚拟表  
	/etc/postfix/virtual
	更新虚拟表  postmap  /etc/postfix/virtual
      </p>

  