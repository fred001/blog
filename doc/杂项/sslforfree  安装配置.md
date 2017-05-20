
  # sslforfree  安装配置

      version:  1
      created_at:  2016-07-11
      updated_at:  None

      None

      None


      <p>
      sslforfree  安装配置

1, 访问网站 
https://www.sslforfree.com/create

2，输入自己要安装证书的域名， 子域名是需要独立安装的！
多个域名（子域名同时输入，用一个空格分开）

根据提示，手动安装
核心是下载随机生成的文件，放到网站的对应目录，并保证可以公开访问,刚才输入几个域名，就需要让几个域名的连接可以访问
下载用wget只能下载到错误内容的文件，得手动在浏览器中点击下载才正确！
里面的文件内容是一串key


完成配置后，点击确认，网站开始生成ssl证书
生成后，下载zip压缩包

包里有三个文件  certicate.crt,  ca_bundle.crt, private.key
对于nginx,  使用的是 cetricate.crt, private.key

在对应的server配置块中增加对应配置，例如：
   listen 443;
  ssl on;
   ssl_certificate     /etc/ssh/sslforfree/certificate.crt;
   ssl_certificate_key /etc/ssh/sslforfree/private.key;

重启nginx就可以了，官方的nginx配置文档有点落后，不准确。
对于nginx ,假如有两个域名配置了ssl, 一个配置不正确
那么访问不正确的域名，似乎会跳转到正确的域名中去，
大概https访问的时候，nginx 没有检查 server_name ? 


      </p>

  