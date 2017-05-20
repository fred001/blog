
  # js_plugin_parsley.

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:05:16 


      None


      <p>
      JS_PLUGIN_PARSLEY
parsley笔记：
	如何实现：
		1， load   parsley.js
		2,  创建普通form ,有reqiured字段的需要验证
		3， $(FORM).parsley()

	内部如何实现：
		parsley通过绑定 submit.Parsley 事件到form，
		如果验证成功，下一步，否则停止事件

	如何在验证成功后做其它工作，如ajaxSubmit ?
		通过监听parsley事件
			parsley:form:validated (这个事件在验证完成后触发）
		function(form_instance){ form_instance.validationResult) 
		validationResult (boolean) 保存了验证结果 true是成功 ,false是不通过

		然后在此函数可以选择其它工作， 
		但是 return false 或者 true 是无意义的， 都会继续下一步（提交）
		需要在验证成功后处理，只能在parsley() 之后绑定事件，确保会在它的之后发生才行


其它知识：
	事件  submit.Parsley 有特殊含义， submit是事件， Parsley是namespace, 
	还支持 submit.NAME_SPACE.OTHER  的格式， 具体参考jquery on(..) 的文档

	




      </p>

  