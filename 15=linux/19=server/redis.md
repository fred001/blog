
  # redis

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:46:39 


      None


      <p>
      redis

历史：
2015年10月08日
建立




Redis

基本概念
一个数据存储服务器,功能比memcache强

特点
1， 有memcache的功能
2， 数据持久化，重启后数据依然存在，和memcache只保存在内存是不一样的
redis 的作者antirez曾称其为一个数据结构服务器（data structures server） 

网站:
	http://redis.io/
	https://github.com/phpredis/phpredis#classes-and-methods  #php 扩展文档
	https://pypi.python.org/pypi/redis  #python 扩展文档

数据什么时候删除：
默认规则
# volatile-lru -> remove the key with an expire set using an LRU algorithm


3， 怎么允许外网使用
2.8版本以上才可以一次绑定多个IP
低版本只能绑定一个版本

4,
redis 不能保存 array
false可以

使用：
安装:
	yum -y install redis 
	yum install   php-pecl-redis (centos7)  or php-redis 
	yum install  python-redis  #python扩展

启动
service redis start
加入自启动
systemctl enable redis

基本使用：
命令 redis-cli
redis-cli set KEY VALUE #设置值
redis-cli get KEY #获取值
redis-cli del KEY


php代码： 
	 1 <?php 
	  2 $redis = new Redis(); 
	  3 
	  4 $redis->connect("127.0.0.1",6379); 
	  5 
	  6 $redis->set("name","frd"); 
	  7 
	  8 var_dump($redis->get("name")); 
	  9 $redis->del("name");   //frd 
	 10 var_dump($redis->get("name"));  //false 

python 代码： 
	import redis 
>>> r = redis.StrictRedis(host='localhost', port=6379, db=0) 
>>> r.set('foo', 'bar') 
True 
>>> r.get('foo') 
	r.delete('name')  //不是del, 因为del是python保留字
      </p>

  