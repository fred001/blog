
  # Awstats nginx 配置

      version:  2
      created_at:  2016-04-08
      updated_at:  2016-04-13 11:56:31

      created at 2016-04-08 16:27:04 
update at 2016-04-13 11:56:31


      None


      <p>
      Awstats nginx 配置

	awstats 和apache配合是很容易配置的。然而nginx十分折腾。原因是nginx通常只是静态网页的服务，并不支持php,python,perl等脚本。它支持的方式是通过转发给其它cgi服务来实现的。因此为了实现nginx 支持awstats 的网页，必须寻找 支持perl的cgi服务。寻找这个服务又是个十分艰难的任务，所以最终选择放弃。
	最后我的思路是后端  nginx 生产日志， awstats 解析日志。 前端则由 apache绑定另外端口，提供网页浏览统计信息。

环境：
	操作系统：  centos 7
	nginx 绑定端口80, 443 
	apache 绑定端口8080, 并且放弃ssl功能，避免绑定443
	

1， 安装  awstats
	yum install awstats

2, 安装apche + mod_perl
	yum install httpd mod_perl
	配置： 
	vim /etc/httpd/conf/httpd.conf  
	修改成 listen 8080 	
	去除注释并添加.pl 获得
	 AddHandler cgi-script .cgi .pl 

		增加文件 /etc/httpd/conf.d/vhosts.conf
		NameVirtualHost *:8080
	
		DocumentRoot "/var/www/html"
	 Alias /awstatsclasses "/usr/share/awstats/wwwroot/classes/"
	 Alias /awstatscss "/usr/share/awstats/wwwroot/css/"
	Alias /awstatsicons "/usr/share/awstats/wwwroot/icon/"
	ScriptAlias /awstats/ "/usr/share/awstats/wwwroot/cgi-bin/"
	
		<Directory "/usr/share/awstats/wwwroot">
	  AuthType Basic
		  AuthName "Authentication Required"
		  AuthUserFile "/etc/httpd/.htpasswd"
		  Require valid-user
	
	
	  Options None
	   AllowOverride All
	
		 Order allow,deny
		  Allow from all
		
	 #Require all granted
		</Directory>


	创建对应的验证文件 
	/htpasswd -c /etc/httpd/.htpasswd user1  （ -c 表示创建文件）


3, 设置 nginx 日志拆分

脚本 ： nginx_cut_log 
    1 #!/bin/bash
  2 #
  3 # Filename:    nginxCutLog.sh
  4 # Author:      Qicheng
  5 # Website:     http://qicheng0211.blog.51cto.com/
  6 # Description: 切割nginx日志
  7 # Notes:       设置crontab，每天23点59分定时执行
  8 #
  9 ROOT_UID=0
 10 if [ "$UID" -ne "$ROOT_UID" ];then
 11   echo "Error: 必须以root用户运行此程序！"
 12   exit 1
 13 fi
 14 
 15 nginx_logs_dir="/var/log/nginx"
 16 nginx_pid_file="/var/run/nginx.pid"
 17 # 切割后的日志文件名，例如access_20141022.log
 18 nginx_log_today="$nginx_logs_dir/access_`date +%Y%m%d`.log"
 19 
 20 while [ `date +%S` -ne 59 ];do
 21   sleep 1
 22 done
 23 sleep 1
 24 [ -f "$nginx_log_today" ] && exit 1
 25 mv $nginx_logs_dir/access.log $nginx_log_today
 26 # 给nginx发送USR1信号，使重新打开新的access.log日志文件
 27 [ -f $nginx_pid_file ] && /bin/kill -USR1 $(cat $nginx_pid_file)
~               

加入到 定时任务
vim /etc/crontab
 59 23 * * * root /root/bin/nginx_cut_log
                                                       

4， 设置 awstats 每日分析日志
vim /etc/crontab

 1  0   * * * root /usr/share/awstats/wwwroot/cgi-bin/awstats.pl -update -config=iamlosing.me    


5，访问网站   iamlosing.me:8080/awstats/awstats.pl ,输入用户名密码即可。
      </p>

  