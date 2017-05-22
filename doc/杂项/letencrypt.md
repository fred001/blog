# let encrypt ssl配置

假设域名  example.com, 路径  /var/www/html/example
OS centos7

let encrypt 是个网站，可以申请ssl证书，但是三个月要续一次
sslforfree 是为了让它更方便使用的网站
certbot是它的客户端，更加方便使用


1. 安装客户端 
  yum install certbot

2. 获取证书
certbot certonly --webroot --email iamlosing02@gmail.com -w /var/www/html/example -d example.com
i

-w 选项是网站的根目录，因为它需要创建一些文件 （.wellknown/...) 来验证此网站是否是用户的
-d 是要获取证书的域名，可以用多个 -d ，注意子域名也需要独立申请


3. 续期
  certbot renew


4. nginx + ssl 配置 
listen       443 ssl;

#私钥路径
ssl on ;
ssl_certificate /etc/letsencrypt/live/example.com/cert.pem;
ssl_certificate_key /etc/letsencrypt/live/example.com/privkey.pem;

