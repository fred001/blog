
  # xcache

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:02:52 


      None


      <p>
      XCACHE

Xcache 用法
作者：李歌之
版本：20141010-1
创建时间：2014年10月10日


 
xcache是什么
是一个php代码编译缓存的扩展， 缓存opcode。有效提高php速度。
它包含两部分功能：1，文件自动缓存。2，手动缓存php变量（这部分功能属于数据缓存）

背景知识：
网站： http://xcache.lighttpd.net/wiki/XcacheIni
其它类似扩展：apc ,等
安装
 centos6.5 : yum insall  xcache-admin  php-xcache
配置文件：
 /etc/php.d/xcache.ini
 /etc/httpd/conf.d/xcache.conf
 /usr/share/xcache/


 
管理网站：  127.0.0.1/xcache
但是首先要设置帐号： 
  /etc/php.d/xcache.ini ,设置 xcache-admin-user ,xcache-admin-password
 password是md5加密后的字符串
使用
管理界面可以设置禁用和启用，非常方便，并显示相关的信息
这样其实就可以了，很方便。





 


      </p>

  