
git clone https://github.com/letsencrypt/letsencrypt
cd letsencrypt
./letsencrypt-auto certonly --standalone --email admin@laozuo.org -d laozuo.org -d www.laozuo.org


同意，然后自动获取证书，安装库 /etc/letsencrypt/live/DOMAIN/目录下
最后在nginx中配置使用证书即可

ssl on
ssl_certificate /etc/letsencrypt/live/laozuo.org/fullchain.pem;
ssl_certificate_key /etc/letsencrypt/live/laozuo.org/privkey.pem;


续期则调用  letsencrypt-auto renew 即可
