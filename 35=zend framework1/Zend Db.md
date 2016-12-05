
  # Zend Db

      version:  1
      created_at:  2016-03-02
      updated_at:  None

      created at 2016-03-02 11:51:47 


      None


      <p>
      	Db
		factory:
			传递参数，返回对应的adapter 
			核心的方法都定义在  Zend/Db/Adapter/Abstract.php中，实现了必要的数据库操作方法

	Statement:
		大概是更底层的数据库操作，多数时候用不到。 可能在很复杂的语句才需要。

	Profile:
		前提是开启数据库的profile,然后通过查询profile内容来获取信息
	Select:
		这大约是Zend最好的一个类。实现对select语句的生成，还可以即时查看语句，非常好用。
		代码位于 Zend/Db/Select.php 值得深入研究。
	Table:
		这个类感觉设计的不好。 只是对db的操作做了一点点简化。 并且不支持一些常见的table操作，例如已存在则更新，不存在则插入等。
		并没有很好的适合单表的操作。 一般只用到它很少的功能。 
		其它Row, Rowset 根据此衍生存在，基本没用过。

	RelationShips:
		表关系，根据关系获取其它表的数据。 听起来很吸引人，事实上不好用。 暂时手动搜寻关联表。 事实上可以让Table支持一些简单的单表搜寻。 
		这类自动查询，应当尽量容易理解，并能直接提供SQL语句进行参考，否则看起来很好，用起来很麻烦。 比如DQL，听起来极端灵活，用起来真是噩梦。

		
      </p>

  