
  # php--zf2--内部类--Filter

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:34:44 


      None


      <p>
       
对数据进行 过滤， （处理，会改变数据）

 
用法很简单，也很无聊， 函数即可，何必非用类？
我猜测是作为一个框架，或者库， 无法预定义目标项目中必须有某函数存在
而且直接编写函数会导致函数名冲突
不符合它的风格，只能这么麻烦

 

 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
original = "my_original_content";// Attach a filter$filter   = new Zend\Filter\Word\UnderscoreToCamelCase();$filtered = $filter->filter($original);// Use it's opposite$filter2  = new Zend\Filter\Word\CamelCaseToUnderscore();$filtered = $filter2->filter($filtered)
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


 


      </p>

  