
  # memcache

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:46:03 


      None


      <p>
      memcache

历史：
2015年10月08日
建立



http://memcached.org/

安装：
	yum install memcached
	yum install  php-pecl-memcached  (还有个php-pecl-memcache,是个旧版本的，用这个就够了）
	yum install python-memcached

php代码：
	http://php.net/manual/zh/memcache.set.php
   $m = memcached_connect("localhost", 11211); //false 表示错误，不会抛出异常，但是会有notice, warning 错误

 
   $m->add('name', 'value'); （add只能增加没有的key,否则返回false,其它和set一样）
   $m->set('name', 'value'); 
   echo $m->get("name"); 

python 代码：	 
https://pypi.python.org/pypi/python-memcached 
http://my.oschina.net/flynewton/blog/10660


 
import memcache 
mc = memcache.Client(['127.0.0.1:12000'],debug=0) 
mc.set("foo","bar") 
	value = mc.get("foo") 
	print value
      </p>

  