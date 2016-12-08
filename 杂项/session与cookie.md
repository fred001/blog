
  # session与cookie

      version:  1
      created_at:  2016-03-09
      updated_at:  None

      created at 2016-03-09 13:07:59 


      None


      <p>
      特别简单，没什么好特别解释的。
	对于Yii
		$session = Yii::$app->session;
		// 检查session是否开启 
		if ($session->isActive) ...

		// 开启session
		$session->open();

		// 关闭session
		$session->close();

		// 销毁session中所有已注册的数据
		$session->destroy();

		通常在引导期间就自动开启session,其它时间主要是访问其中的数据。


		$cookies = Yii::$app->request->cookies;
		$language = $cookies->getValue('language', 'en');

		cookie还可以支持cookie验证


		cookie如果不存放重要内容，似乎没必要验证。 重要的数据应当存放在session, cookie通过一个session id指向session即可。
		所以我一直不明白表单也要弄一个特殊验证什么的，有什么意义。 
		
		
      </p>

  