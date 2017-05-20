# sqlachemy

http://www.jianshu.com/p/0d234e14b5d3
http://www.jianshu.com/p/8d085e2f2657
http://www.jianshu.com/p/152685de2533
http://www.cnblogs.com/harrychinese/archive/2012/09/12/My_Own_Tutorial_For_SqlAlchemy.html


sqlachemy 是一个orm数据库库。 大概算是python数据库连接的标准了。以后尽量用这个。


常用的数据库连接字符串
==============================
#sqlite
sqlite_db = create_engine('sqlite:////absolute/path/database.db3')
sqlite_db = create_engine('sqlite://')  # in-memory database
sqlite_db = create_engine('sqlite:///:memory:') # in-memory database
# postgresql
pg_db = create_engine('postgres://scott:tiger@localhost/mydatabase')
# mysql
mysql_db = create_engine('mysql://scott:tiger@localhost/mydatabase')
# oracle
oracle_db = create_engine('oracle://scott:tiger@127.0.0.1:1521/sidname')
# oracle via TNS name
oracle_db = create_engine('oracle://scott:tiger@tnsname')
# mssql using ODBC datasource names.  PyODBC is the default driver.
mssql_db = create_engine('mssql://mydsn')
mssql_db = create_engine('mssql://scott:tiger@mydsn')
# firebird
firebird_db = create_engine('firebird://scott:tiger@localhost/sometest.gdm')


## 概念
engine  数据库连接引擎
session  一个数据库连接的会话
from sqlalchemy.ext.declarative import declarative_base  一个基本的orm对象定义,都从这里继承


步骤：
  1. 创建引擎
  2. 创建会话，引擎和会话绑定
  3. 定义orm对象

  4.  对象修改后，通过session commit 来进行修改
  5.  session.query 用来查询对象


  session.query().filter_by().filter() 用来查询，相当于where
  session.all(), one(), first()  相当于 fetchall(), fetchrow() 没有则出错， fetchrow()




