# swoole 安装

#1 下载
wget https://codeload.github.com/swoole/swoole-src/zip/v1.9.0-stable

#解压
unzip swoole....zip

#进入目录编译并安装
cd swoole...
phpize 
./configure
./make 
./make install # use root

# 添加php配置
cd /etc/php.d/

echo "extension=swoole.so" > swoole.ini
