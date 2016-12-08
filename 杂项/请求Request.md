
  # 请求Request

      version:  1
      created_at:  2016-03-09
      updated_at:  None

      created at 2016-03-09 12:44:04 


      None


      <p>
      	请求的作用是封装所有请求，方便获得请求的数据。 
	基本功能包括  获取$_GET, $_POST, 以及支持  $_PUT 等其它不常见的请求，
	最好能将$_PUT中的参数模仿地如同$_POST。 

	对于Yii, 请求的类是 /vendor/yiisoft/yii2/web/Request.php
	获取request对象：   $request = Yii::$app->request;
      </p>

  