
  # php http 服务器比较

      version:  1
      created_at:  2016-07-11
      updated_at:  None

      None

      None


      <p>
      apache :
	apache 通过mod_php 实现，方式大约是一次访问启动一个进程
	缺点是每次需要全部载入所有php文件， 造成大量的资源消耗
	并且并发数量增加，开销很大

nginx + php-fpm 
	这是cgi模式 ，方法是分成两个进程，一个监听请求，一个启动多个worker来处理。
	不知道php文件是不是需要每次重新载入？
         文件大约需要重新载入，但是php解释器不需要
swoole
	c写的高并发服务器，好处是什么？  似乎是可以一开始就载入所有php代码
	并且并发方式，支持高程度利用资源，性能比较高
	另外是php语言，可以替代 nodejs
      </p>

  