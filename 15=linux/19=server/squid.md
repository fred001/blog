
  # squid

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:47:02 


      None


      <p>
      squid

历史：
2015年10月05日
建立




	Squid 是一个代理服务器，可以用来缓存一些静态内容。可以配置成对某web服务的代理，以达到缓存加速的目的。

配置文件：
	/etc/squid/squid.conf 
	/etc/squid/mime.conf 
启动：
	service squid start
配置：
	/etc/squid/squid.conf
	#取消cach_dir的注释，以使用缓存 
	#缓存目录可以是多个，新增的注意权限（selinux等)
	#三个值分别是   可用的容量（M） ， 共几个1级子目录， 1级子目录可以有几个2级子目录
	#通常只修改第一个值
cache_dir ufs /var/spool/squid 500 16 256 
cache_dir ufs /srv/squid 2000 16 256

日志：
	/var/log/squid/access.log

浏览器配置：
	默认只对本机开放
	代理 : 127.0.0.1, 端口   3128

其它高级功能包括权限管理， 具体网站的代理设置，如要支持同主机的web服务器代理，那么要修改同服务器的web服务器端口为81（只要80以外的未占用端口即可）
然后squid 修改绑定端口 80， 并设定web服务器端口为81，如此则隐蔽了真正的web服务器，令squid实现了web服务器代理功能。
      </p>

  