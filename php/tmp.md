# db 操作

原始DB操作:
  PDO init
  statement= PDO prepare
  statement->fetch, fetch All, fetchColumn


  第二种：
  PDO init
  POD -> query(SQL or STATEMENT)


  statement 创建时候定义了变量占用符， 后期通过 bindParam,bindValue来绑定参数
  两方法区别是bindParam(":name","abc") 这样不行，不能用直接量


Zend Db Select 支持多种方式，感觉不是很必要，保持一种即可


## where
  where 子句是可以嵌套的，也就是说是层级，所以复杂where很难用方法来写
  手写似乎更方便，

  API 接口不应当提供复杂where查询



## session
  初次访问网站， 服务器发送  set-cookie 头部给客户端，客户端接受此头部并设置cookie
  其后客户端都带上此cookie ，每次发送给服务端

  服务端的 session_start() 估计已经会主动处理此cookie
  当有session id, 则不再发送set_cookie头部了

## include path 设置

  Five ways to create include path for PHP
  One thing that people often complain about PHP is that there are always more than one way to do the same thing in PHP. This is very true for PHP includes. Here are 5 ways to create PHP include path.

  Use php.ini

  Use .htaccess

  Use ini_set function

  Use set_include_path function

  Manually code the path



  其中最简单的是就是 php.ini 
    include_path = /home/share/lib/php:.:/usr/share/pear:/usr/share/php


  然后就可以到处使用了
