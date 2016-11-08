# nginx+awstats 安装配置


## nginx 日志拆分

/etc/logrotate.d/nginx 修改 compress 为 nocompress 即可

## awstats 安装

yum -y install awstats

## nginx 日志格式修改
log_format  main  '$remote_addr – $remote_user [$time_local] "$request" '
        '$status $body_bytes_sent "$http_referer" '
        '"$http_user_agent" "$http_x_forwarded_for"';




## awstats 配置
 /usr/share/awstats/tool/awstats.pl 根据提示进行配置

 编辑 /etc/awstats/awstats-DOMAIN.conf
  LogFile="/var/log/nginx/access.log-%YYYY-24%MM-24%DD-24"


 /etc/crontab 增加定时任务

## nginx 支持perl
 yum -y install perl-FCGI

  两个相关文件： fastcgi-wrapper.pl(服务）  , perl-fastcgi  (关闭,启动服务）


nginx 配置

        server {
        listen 80;
        root /usr/share/awstats/wwwroot/cgi-bin;
        server_name awstats.frd.life;
        index awstats.pl;

        auth_basic “Restricted”;
        auth_basic_user_file /etc/nginx/htpasswd.pass;





        location /{

        }

        location ~ \.pl$ {
#include /etc/nginx/fastcgi_params;
#fastcgi_pass unix:/var/run/fcgiwrap.socket;
#fastcgi_index index.pl;

          root /usr/share/awstats/wwwroot/cgi-bin;
          include fastcgi_params;
          fastcgi_pass  127.0.0.1:8999;
#fastcgi_pass  unix:/var/run/ttlsa.com.perl.sock;
          fastcgi_index index.pl;
          include        fastcgi.conf;

#auth_basic “Restricted”;

#auth_basic_user_file /etc/nginx/htpasswd.pass;

        }
        }

配置完成后使用  test.pl 测试是否能够连接

