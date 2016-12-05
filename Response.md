
  # Response

      version:  1
      created_at:  2016-03-09
      updated_at:  None

      created at 2016-03-09 12:58:13 


      None


      <p>
      reponse的作用是设置响应内容，头部等等。 
	默认下框架会有固定的返回内容，想要返回特别内容，需要单独设置响应内容，并阻止默认的渲染模板返回。

	对于Yii,代码位于/vendor/yiisoft/yii2/web/Response.php
	默认是渲染模板并返回

	其它返回方式：
		返回JSON内容
		public function actionInfo()
		{
		    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
		    return [
			'message' => 'hello world',
			'code' => 100,
		    ];
		}
		
		跳转
		public function actionOld()
		{
		    return $this->redirect('http://example.com/new', 301);
		}
		
		返回文件
		public function actionDownload()
		{
		    return \Yii::$app->response->sendFile('path/to/file.txt');
		}


      </p>

  