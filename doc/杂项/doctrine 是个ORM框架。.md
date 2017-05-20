
  # doctrine 是个ORM框架。

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:40:15 


      None


      <p>
      doctrine 是个ORM框架。
听起来似乎万能，功能也确实比较强大。
但是实际上感觉还是没多少好处。

问题一： entity对象必须和数据库对应。 另外也不支持联合主键的设定。 
entity本身没有任何继承来源，因此意味着没有任何方法。
另外属性仅仅能设置成 protected, private。
要获取属性，必须每个属性增加 getXXX() ，十分之麻烦。
怎么才能获取所有属性，例如 entity->getData() ?似乎是不可能。 
所以entity本身的功能真是弱，这直接导致了整个doctrine 功能的限制。

问题二： dql听起来很好。但是因为entity能力的限制，很多sql不方便转换成dql格式。 
dql和sql比较，就是对字段有了别名的功能，其它没什么区别。用起来反而更繁琐，好处有限，麻烦不少。

问题三： entity的CRUD方法都增加了一步 em->xxxx ,em->flush ，比zf1中的 table->insert/update/delelte 增加了一步骤。
好处没看到有什么，光看到麻烦。 也许有cache的效果，未研究过。

问题四： 实际工作中， 在entity之上需要一层更高的对象层， 实现很多自定义的方法和功能， 这是doctrine缺少的。
这也是实际用途中doctrine看起来没多少好处的重要原因。
教程中的例子都是些很简单的对应，实际上哪这么简单， 往往有很多例外，这些例外是不可能用一个一致的方法达到的。
必须通过自定义的代码才能够完成
      </p>

  