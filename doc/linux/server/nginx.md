
  # nginx

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:46:22 


      None


      <p>
      nginx

历史：
2015年10月08日
建立



Nginx 是一个web服务器，跟apache机制似乎不同， 性能据说很高。不知道为什么高。

安装：
	yum install nginx 

配置文件： 
	 /etc/nginx.conf 

配置：
修改绑定端口为81 
listen  81 default_server; 
listen [::]:81 default_server; 

修改网站目录 
root  /var/www/html/nginx 
启动测试,此时仅支持html 

下面来支持php 
nginx 对php支持是通过代理实现的。 
nginx 发送请求给 php fastcgi 接口， 读取响应再返回给客户。 

所以步骤如下： 
1,安装 php的 fastcgi  (php-fpm) 
2,在nginx 中加入 php-fpm的相关配置 
3,php-fpm中修改用户和组为nginx 以便有权限（可能不修改也行？） 
4,启动 php-fpm 服务（默认端口 9000） 

1，安装 
	yum install php-fpm 

2，修改nginx 配置  /etc/nginx/nginx.conf  server结构中增加配置： 
         (这种方式面对路由重写后，没有php应该怎么样？）
          location ~ \.php$ {  
            root           /var/www/html/nginx;          #web的根目录 
            fastcgi_pass   127.0.0.1:9000;          #php-fpm的地址 
            fastcgi_index  index.php; 
            include        fastcgi.conf; 
          } 

3， 修改php-fpm默认用户和组为nginx 
	/etc/php-fpm.d/www.conf 
	找到 user, group ， 
	修改为niginx 

4, 启动php-fpm 
	service php-fpm start 


接下来想办法支持路由重写，重定向到 index.php 
增加这部分就行了。 所有请求(只要不是请求文件的）重定向到 index.php
 47         location / { 
 48           index  index.php; 
 49           if (!-f $request_filename){ 
 50           rewrite ^/(.+)$ /index.php last; 
 51           } 
 52          
 53         } 
 54 


其它：
	nginx 和  fastcgi 都需要配置下 网站的目录， 因为它们并不共享配置
	所以逻辑上，他们可以采用不同的目录，当然通常应该是一致

	多域名支持需要配置多个server, 但是不要再绑定端口了
      </p>

  