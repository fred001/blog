
  # php--php

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:49:10 


      None


      <p>
      PHP
PHP include()和require()方法的区别
	
require() :如果文件不存在，会报出一个fatal error.脚本停止执行
include() : 如果文件不存在，会给出一个 warning，但脚本会继续执行 

有文章说面对 if条件， require始终包含文件
php 5.5.9 中无此问题，无论require还是include,都会在执行到才载入文件

      </p>

  