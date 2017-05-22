
  # yii mongodb 安装

      version:  1
      created_at:  2016-08-10
      updated_at:  None

      None

      None


      <p>
      	1，安装扩展 php-pecl-mongodb 这个是最新的扩展 php-pecl-mongo是旧的
	2，安装yii mongo扩展，使用composer, 如果不存在的话 yii/vendor/yiisoft/yii2-mongodb
	3, 载入此包，在composer.json中
	4，在配置中增加  mongodb=> .... 配置
	5， 代码中获取mongodb     $scheme=\Yii::$app->get('mongodb');
      </p>

  