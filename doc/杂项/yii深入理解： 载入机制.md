
  # yii深入理解： 载入机制

      version:  3
      created_at:  2016-08-12
      updated_at:  2016-08-13 09:29:22

      None

      None


      <p>
      #new \app\models\form\ArticleAdd() ;

#app\models\form\ArticleAdd.php
基#本目录: vender/yiisoft/yii2
	BaseYii.php: 281   

	具体逻辑： 
		类名替换 \ 成为 /,获得名称 app/models/form/ArticleAdd
		根据此名字，获取别名  @app/models/form/ArticleAdd 
		增加后缀 .php

		此为最终文件

		
#static::$classMap 是调用此类的$classMap 属性,相当于 self::$classmap ,也许是新用法？

#@app/models/form/ArticleAdd 何时注册的？
	在 base/Application 定义了 @app别名
	getAlias(name) 中，会将 @app 替换成对应的路径
	具体替换规则在 140行左右

	http://www.digpage.com/aliases.html

#yii 自身如何被载入的？
	index.php 中直接引入 yii.php
	另外使用了composer 的自动载入机制， 在composer.json 定义了 yii包地址
      </p>

  