
  # web开发--javascript

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:55:25 


      None


      <p>
      JAVASCRIPT
javascript 笔记
====================
严格模式：
	顶部添加代码：  "use strict";
也可以只要求函数以严格模式运行：
	function test(){
		"use strict";
	}

数据类型
	Undefined
	Null
	Boolean
	Number
	String
	Object

typeof 可能的返回值
	undefined
	boolean
	string
	number
	object
	function

数据类型转换	
	转换成 boolean的false  (Boolean(VALUE))
		""   //string
		0和NaN  // number
		null  //object
		undefined  //undefined

	转换成数值 （Number)
		true => 1, false => 0  //boolean
		null  => 0 
		undefined => NaN
		尽量转换成数值， 全是空的字符串 "   "  => 0 
		仅仅转换10进制和16进制 		//string
		调用对象的valueOf方法，
		然后按照前面规则转换。
		如果结果是Nan, 则调用 toString() ,
		然后安装前面规则转换。  //object

	转换成数值 (parseInt(VALUE, 进制))
		比Number合理点，会尽量转换
		"123a" => 123 
		支持10，8，16进制  //string
	
	转换成数值 (parseFloat)
		和parseInt类似， 仅仅支持10进制
		如果结果是整数，会返回整数，而不是浮点数


	转换成字符串(String()):
	如果值有toString（） 方法，则调用 //Number类型有这个方法
	null => "null"
	undefined => "undefined"


Array对象：
	var arr=['a','b','c']
	arr.length
	arr.toString()  //a,b,c
	arr.valueOf()  //a,b,c
	arr.join(".")  //a.b.c  类似 php的implode("SPLITE",$arra)
	arr.push('d')  //
	arr.pop()  //  d
	arr.shift() //a  去掉前面的
	arr.unshift(‘k') // 将值从前端插入

	arr.sort()
	arr.sort(function(a,b({ ... }) //根据自定义函数排序 返回  1,0,-1
	arr.reverse()  
	arr.concat("h",['i','j']) //把值添加到数组中，适合数组之间大批量增加

Array	arr.splice(0，2） //删除数组中的前两项
Array	arr.splice(2,0,"red","green") //插入项 2 （起始位置) ,0(要删除的项),要插入的项
Array	arr.splice(2,1,"red","green") //删除当前数组2的项 (因为参数1），然后插入新的项
	
	arr.indexOf(VALUE, START_POS)
	arr.lastIndexOf(VALUE, START_POS)

	迭代方法：
	arr.every(FUNCTION)  //如果每一项都返回true,则返回true
	arr.filter(FUNCTION)  //返回true项组成的数组
	arr.forEach(FUNCTION) //对每一项执行函数，没有返回
	arr.map(FUNCTION) //对每一项执行函数，返回 每次调用结果组成的数组
	arr.some(FUNCTION)  //如果有一项返回true,则为true
	
	arr.forEach(function(item,index,array){

	});

	arr.reduce()
	arr.reduceRight()

Date类型

Regexp类型

Function类型

基本包装类型 
	Boolean
	Number
	String

单体内置类型
	Global
	Math

BOM：
	window对象：
		window.top,window.parent
		window.screenLeft,window.screeTop
		window.moveTo,window.moveBy
		innerWidth,innerHeight,outerWidth,outerHeight
		
		setTimeout(function,1000)
		setInterval(function,1000)
		alert,confirm,prompt
	
	location对象：
		hash //#contents
		host  //
		hostname
		href
		pathname
		port
		protocol
		search

	navigator对象：
		appCodeName
		appMinorVersion
		appName
		appVersion
		buildID
		cookieEnabled
		cpuClass
		javaEnabled
		language

	screen对象
	history对象

DOM:
	载入样式：  创建一个 <link> 对象，添加到 head中， 设置disabled可以禁用或者启用样式
	操作样式表：  可以操作样式表的所有内容，包括每一条规则
		mimeTypes
		onLine
		opsProfile
		oscpu
		Platform
		plugins
		preference
		product
		productSub
		register-ContentHandler
		register-ProtocolHandler
		securityPolicy
		systemLanguage
		taintEnabled
		userAgent
		userLanguage
		userProfile
		vendor
		vendorSub
	
事件：
	javascript有能力模拟任何事件 
	
	鼠标事件：
	document.createEvent('MouseEvents')
	event.initMouseEvent("click",true,true,document.defaultView,0,0,0,0,0,false,false,false,false,0,null)
	btn.dispatchEvent(event)
	
	键盘事件：
	
	其他事件：


表单：
	form.elements //包含了所有元素
	富文本  

Canvas:

WebGL:

视频
音频

错误处理：
	window.onerror  
	try catch finally

Ajax:

本地存储：
	
离线存储：

获取地理位置信息：


新兴API：
	创建平滑的动画
		requestAnimationFrame
	文件API
	Web Workers
	

      </p>

  