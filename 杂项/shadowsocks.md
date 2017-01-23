






shadowsocks 科学上网指南


简介：
	shadowsocks 有多个版本，从最初的python到各式语言的版本。 目前看来python和libev版本都不错。
	方便起见使用libev版本。


相关网站： 
	源代码
	https://github.com/shadowsocks1/shadowsocks-libev 

	yum repo
	https://copr.fedorainfracloud.org/coprs/librehat/shadowsocks/repo/epel-7/librehat-shadowsocks-epel-7.repo


安装：
	cd /etc/yum.repos.d/
	wget 	https://copr.fedorainfracloud.org/coprs/librehat/shadowsocks/repo/epel-7/librehat-shadowsocks-epel-7.repo
	yum update
	yum install shadowsocks-libev

	服务器上要启动服务端，客户端要启动客户端
	服务端：
		vim /etc/shadowsocks-libev/config.json
		编辑配置：
		{
		    "server":"服务器IP",
		    "server_port":2333,
		    "local_port":1080,
		    "password":"barfoo!",
		    "timeout":60,
		    "method":"aes-256-cfb"  //最后一行不要有, 不然会是语法错误
		}



			service shadowsocks-libev start
	

	客户端：

		sslocal -vv -s 97.107.132.130  -p 2333 -b 120.0.1 -l 1080 -k barfoo! -m aes-256-cfb
		sslocal -d start
		sslocal -d stop




	浏览器客户端：
		设置代理  只设置 socket5 , 127.0.0.1 1080的代理，其它http等不用设置
		firefox可以通过插件 autoproxy 实现更好地控制代理
		google似乎是只能使用全局代理



	然后浏览器就可以科学上网了。 


	目前存在的问题：
		firefox + autoproxy 可以实现全局科学上网
		但是其它代理插件和浏览器默认的代理设置，不能支持google,twitter之类的网站访问，不清楚为什么
		另外看youtube视频似乎有问题，进度条不会动

		chrome则没有问题，只是使用了全局代理，不是很好，因为这样依赖其它任何软件都会使用代理，耗费流量。


			
		
	






		
