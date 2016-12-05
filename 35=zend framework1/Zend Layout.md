
  # Zend Layout

      version:  1
      created_at:  2016-03-01
      updated_at:  None

      created at 2016-03-01 18:16:44 


      None


      <p>
      	内部它使用zend view来实现渲染。 其它功能为了配合mvc机制。 
	所有的$this->METHOD ，实际上都是 zend view的helper, 位于Zend/View/Helper/  目录之下。 
	$this->partial（$name,$module,$model)  
	事实上不知道这个module是什么， 看注释大约是传递给模板的变量数组
	功能大约如此，细节不详
      </p>

  