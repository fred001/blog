
  # Frd框架文档--功能.

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:06:05 


      None


      <p>
      功能
1， 核心功能
完成：
	Frd_Object  //重新整理
	Frd_Object_Base  //废弃
		loader  //支持普通load,支持命名空间的load ,支持module
			Frd_Module
	Frd_DB_Table
		Frd_Db对象
	Frd_Template  //需要完整考虑compile, cache 存在的问题
			Frd.php	//去除重复代码，
				functions.php
				Frd_App
			
未完成：

	
	Frd_DB_Object //废弃，还是用 Frd_Db_Table 
	
2， 扩展独立功能
	Frd_File
	Frd_Csv
	Frd_Regexp
	Frd_Facebook
	Frd_Facebook_Batch
	Frd_Image
	
	
	
	Frd_Paginator   //需要
	Frd_Paginator_Abstract   //废弃
	 
	Frd_Profiler   //优化
	Frd_Profiler_Console  //优化	
	
	
	Frd_Js_Array   //php => js array
	Frd_Js_Function  //php create js function
	Frd_Js_Object   //php create js object
	
	
		
	Frd_Html_A     //使用函数
	Frd_Html_Element   //使用函数
	Frd_Html_Form //使用函数
	Frd_Html_Table //使用函数
	Frd_Html_Tabs  //保留
	
		Frd_Uploader  //考虑废弃
	Frd_Widget  //考虑废弃

	Frd_Error  //输出error, 废弃
	Frd_Exception  //废弃
		
	Frd_Form			//废弃
	Frd_Form_Field    //废弃
	Frd_Form_Select   //废弃
	
	Frd_Log //废弃
		Frd_Table_Config  //config table class, 考虑转换成function 之类 （废弃）
		
			Frd_Cache_Temp  //考虑优化
			
				Frd_Start
	Frd_End
	Frd_Tool_Use   //考虑转换
3，非核心非独立功能



	
	
	assert错误的结果：
		PHP Warning:  assert(): Assertion failed in /home/www/html/frdlib/test/object.php on line 4


其他：
	setting, 检测是否有缺少值
	
	
	
-=---------------------------
创建一个demo网站

文档结构准备



				

      </p>

  