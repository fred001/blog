
  # JavaScript权威指南(第6版)

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:25:52 


      None


      <p>
      JavaScript权威指南(第6版)
类别
 计算机技术方面的实用书籍
内容简介
完整地介绍了javascript的各个方面
评分
6
开始阅读时间
2014-07-07
粗读完成时间
2014-07-07
精读完成时间

完成阅读时间
2014-07-27



	1.这本书到底在谈什么？关于什么的？
		
		
	2.作者细部说了什么，怎么说的？ 
词法结构 
	字符集：  unicode字符  (utf-16)
	区分大小写 
	unicode转义：  \u00e9  (\u+4个16进制代表unicode字符） 
	标准化 
	注释：   //  /* ... */  （和多行注释在同一行可能也被注释：  /*...*/ CODE  ，可能CODE会不起作用！！ 
	直接量： 程序中直接实用的数据值 
	标识符和保留字： 以字母，下划线或美元符开始， 后续可以是字母，数字，下划线或美元符 
	保留字： 共24个关键词 
	分号可选： 一行末尾分号可以省略，最好不要省略 

类型，值和变量 
	原始值类型：数字，字符串，布尔值
	对象值类型： 
	原始值看起来也有方法，但是关键是原始值属性是不能修改的， 字符串看起来能修改，内部实际上是返回新的字符串。

	显示转换： Number(), String(),Boolean(),Object()

	浮点数字精度转换：  
		100.163.toFixed(2) => 100.16
		.toExponential(1) =>   //...e+xx
		.toPrecision(4)   =>  12.12
	字符串转换成数字：
		parseInt('11',2)  => 3
		parseInt(11,10) => 11
		parseFloat....)

	对象到原始值：
		对象都有 toString()  和 valudOf() 方法
	 
	 







	
	变量作用域：
		1，函数内部直接可以访问外部变量，不需要声明
		2， 函数内部可以直接修改外部变量
		3， 不存在 {}的块级作用域			






表达式和运算符 
	表达式包含 变量+运算符
	表达式是短句， 对变量进行操作
	运算符是表达式中对变量进行操作的符号
	
	特殊运算符：
		位操作： & ,|  ,^,~ ,<< ,>>,>>>
		比较符：  ==



	in运算符：：   “x” in {x:1,y:1},  
			0 in [7,8,9]

	instanceof :
		d instanceof  new Date()
	eval:
		eval(代码）
	全局eval:
		eval会依赖调用环境， 所以需要全局的时候，需要特殊操作以下
	严格模式eval:
		
	typeof:
		判断变量类型： 可能返回 'undefined','object','boolean','number','string','function','object',其它编译器实现的字符串
	delete:
		delete {x:1,y:2}.x
		delete [1,2,3][1]  (但是数组的长度没有改变！）
	， 逗号运算符：
		常用在for循环中
				
语句 
	语句是单行代码， 分号为结束， 表达式是值的计算
	控制结构：
		条件
			if...
			else if....
			else...

			switch(n){
				case 1:
						....
				break;
				case 2:
						....
				break;
				default: 
						....
				break;
			}
				
		循环
			while(...) {           }
			do
				....
			whilc(...)

			for(.. ,  ..  , ..)
			{

			}

			for(var in object)
				...
		跳转
			break
			continue
			return
			throw
			try/catch/finally

		其它：
			  with(object)
				...

			if(0 == undefined) debugger
			“use strict”

对象 
	对象是一种数据类型
	对象创建：
		直接量：  {}
		通过 new :  new Date()
		原型：
			对象有原型，原型形成原型链，最初是 Object.prototype

		Object.create():
		
	属性的查询和设置：
		查询： 会通过原型链，从底向上查
				o.hasOwnProperty
		设置：  通过原型链，检查是否可以设置
				若可以，只在最底端对象设置
		删除：  只删除最低端对象的属性
		检测：   in 
		枚举：for ...in ...    ,
				  o.propertypeIsEnumerable(..)
				 o.getOwnPropertyNames() //返回所有的属性，不仅仅是可 枚举的		
		属性getter和setter:
			定义方法： 
				get accessor_prop(){}
				set accessor_prop(value){...)
				(get,set是类似function的关键词，  accessor_prop 是属性的名字， 当访问  o.assessor_prop() 时候调用）

		属性的特性
		设置属性的特性：
			o.definedProperty(o,'x',{value:1,
						writable:true,
						enumerable:false,
						configurable:true})
			o.defineProperties({},{
					x:{...}
					y:{...}
				});
			四个特性都是可选的，另外也可以重复设置（修改）
			获取属性的特性：
				getOwnPropertyDescriptor(0,'attr_name')
	对象的三个属性
		原型属性
			获取对象的原型
		类属性
			classof
		可扩展性
				Object有方法可以设置对象是否可以扩展

	对象方法：
		toString
		toLocaleString
		toJSON
		valueOf
数组 
	数组是值的有序集合。每个值叫元素，元素的位置称为索引

	创建：
		var a=[]
		var a=['a','b']
		var a =new Array(10)
	增加:
		a[10]='bbb'
		a.push('b')
	删除:
		del a[0]  //差不多相当于设置 a[0]= undefined, 并不会改变数组length

	其它方法：
		join
		reverse
		sort
		concat
		slice
		splice
		push/pop
		unshift/shift
		toString/toLocaleString

		ECMAscript5中的方法：
		forEach
		map
		filter
		every/some
		reduce/reduceRight
		indexOf/lastIndexOf

	数组类型：
 		Array.isArray(..)

	字符串类似数组，但是不可更改
		str[index]
函数 
	函数声明:	function test(){} 
	1,函数声明会被自动提前到顶层，所以在声明之前的代码也可以访问它 
2，嵌套函数可以访问其外部函数的变量 
3， 不能出现在循环，条件判断或者 try/catch/finally 以及with中 

函数定义表达式：	 var test=function(){} 
1， 不会被提前 
2， 变量作用域规则和函数声明一样 
3，可以出现在任何地方 


函数调用： 
	作为函数 
		this 可能是全局对象或者undefined（根据是否严格模式和script版本） 
	作为方法 
		this 是调用此函数的对象 
	作为构造函数 
		new o.m ： this 并不是o,它是m本身 
	通过call,apply 
		可以显式修改this指向的对象 



函数的实参和形参 
	可选形参： 
		如果实参少于定义的形参，那么剩下的形参都会被设置为 undefined 
		可以通过  === undefined 判断 
		另一种常用方法是    var VAR=VAR || 默认值； (这种方法问题是假如 false,null,'', 等是有意义的，就不行了 
	可变长的实参列表 
		函数内部有一个特殊的标识符 arguments 
		arguments.length (传入实参的个数） 
		arguments[0],arguments[1],... 分别是每一个实参 

		（在ecmascript 5严格模式中，这两个是无效的） 
		arguments.callee //当前执行的函数 
		arguments.caller //调用此函数的函数 
	将对象属性用作实参 
		FUNC({name:value,name2,value2}) 通过对象来传递参数，避免参数过多引起记忆困难的问题 

	实参类型 
		实参既无法确保类型，也不能设置默认值，所以有必要的话，只能在函数内部进行手动检验 

、 



作为值的函数： 
	函数可以当成值来用，  () 则调用 
	可以像值一样传递为参数，保存到数组，对象等等 


作为命名空间的函数： 
	(function(){ 
		 
	}()) 

这种方式可以直接执行某段代码，不用担心变量会和外部的变量重复 


闭包： 
	通过变量的作用域规则， 在函数内部创建函数，可以实现保存函数内部的变量和参数， 
	达到仅仅能通过子函数来访问函数内部变量的效果，这就是闭包 



函数的属性: 
	length  //形参的个数 
	prototype: 函数原型对象 
	call/apply方法：	f.call(o), f.apply(o)  相当于   o.f() 
	bind:   var g=f.bind(o) ,g()  //相当于o.f() 
	toString() //通常返回函数源代码 
	Function()构造函数: var f=new Function('x','y','return x*y;'); 

	可调用函数：  使用方法类似函数，但是其实不是真正的函数， 
			例如客户端方法（window.alert()) 和 RegExp对象 


函数式编程： 
	使用函数处理数组： 需要map函数， 对每一个元素进行处理 
	高阶函数：操作函数的函数 
	不完全函数：仅仅实现部分代码，其它动态生成（通过改变调用对象，修改参数和行为） 
	记忆：接收一个函数，返回一个记忆了变量的新函数 

		 
		
类和模块 
	类和模块： 
	类的实现基于原型继承机制 
	原型是类的核心 
	原型也是区分是否同一个类的实例的标准 
	类和构造函数： 
		var o=new F() 
		o.constructor === F 

	类的组成部分： 
		1， 属性 ，每个实例都独立 
			function Test(){this.name='aaa';} 
		2, 方法： 每个实例共用 
			Test.prototype={getName:function(){return this.name;}} 
		3, 静态方法 
			Test.create=function(){...} 
		4, constructor：  类的特殊属性，用来识别类 


	javascript中的面向对象技术： 
		 
	子类 
		实现子类和类的层级结构		 

	Ecmascript5中的类 
		通过新增的关键词，让类实现不同的效果，其实就是对象属性的特殊关键词，和对象操作一个性质 
	模块 
		1，模块需要尽量不能操作全局变量 
		2，模块需要提供公共api

正则表达式的模式匹配 

	创建:	 
		var pattern=/s$/gim; 
		var pattern=new Regexp("s$","gim");
		var pattern=new RegExp("\\d","gim"); //注意是 \\d ，在这里需要多加一个 \ ,用来转义！

	表达式组成部分： 
		直接量字符： 
		


















和String相关的支持正则的方法：
	STRING.search 
	STRING.replace 
	STRING.match 
	STRING.split

RegExp对象：
	 
source: 只读字符串，正则表达式的文本 
global： boolean ,是否 g模式  只读 
ignoreCase：boolean ,是否 i模式  只读 
multiline： boolean, 是否m模式 只读 
lastIndex： 下一次检索的开始位置， 可读写 

方法： 
	exec() //return null 或者数组 
	boolean test()

javascript的子集和扩展 
	 
	子集： 去掉javascript中某些不良的特性，获得一个比较好的子集合 
	 
		Javascript:The Good Parts 介绍了这个概念 
		子集有工具可以检测代码是否符合 
		具体的子集： 
			Adsafe (adsafe.org) 
			dojox.secure (dojotoolkit.org) 
			Caja 
			FBJS 
			Microsoft Web Sandbox 

	扩展：对javascript的扩展，以后可能成为标准 
		常量： const 
		局部变量：  let 
		解构赋值 
		迭代 
		for/each循环 
		迭代器 
		生成器 
		数组推导 
		生成器表达式 
		函数简写 
		多catch从句 
		 
		E4x: ECMAScript for XML 
			适用于处理XML文档 



	
服务端javascript

(第二部分  客户端javascript)
web浏览器中的javascript

window对象
	计时器： 
  Timer  setTimeout(FUNC,MICROSECOND) 
  Timer  setInterval(FUNC,MICROSECOND) 

  clearTimeout 
  clearInterval 


location 
	location.protocol 
	location.host 
	location.hostname 
	location.port 
	location.pathname 
	location.search 

	location.hash 
	location.search 

	location.assign() //载入新的文档 
	location.replace()  //载入新的文档，并且清除历史记录 


history: 
	history.back() 
	history.forward() 
	history.go(-2) //后退两次 

navigator: 
	navigator.appName 
	navigator.appVersion 
	navigator.userAgent 
	navigator.platform 


Screen: 
	 
对话框： 
alert 
boolean confirm(msg) 
msg prompt(MSG) 


错误处理： 
	boolean  onerror(error_msg,url,line) 
	返回false表明不需要继续处理了，否则浏览器会接着处理错误，例如输出 
	但是对于firefox,需要返回true 

多窗口： 
	var w=window.open("smallwin.html","smallwin","width=400,height=350,status=yes,resizeable=yes"); 
	w.alert('test'); 
	w.close() 
	w.opener (打开它的脚本的window对象） 

	iframe: 
		window.IFRAME_ID //引用iframe 
		parent  //iframe中引用父窗口 
		iframe.contentWindow //iframe的window对象 

脚本化文档
		文档和元素的位置： 
		文档坐标 
		视口坐标（考虑上滚动位置就是文档坐标） 
		视口尺寸 
		元素在视口中的位置： getBoundingClientRect() 
		判断某位置上有什么元素：  document.elementFromPoint(x,y) 
 
		offsetLeft,offsetTop: 文档位置，相对父元素 
		clientWidth,clientHeight: 不包含边框，只包含内容和内边距，也不包含滚动条 
		 
		 
	表单： 
		form.elements 
		form.field_name //直接获取表单中某控件
脚本化css
	重要的css样式属性 
	position 
	top,left 
	bottom,right 
	width,height 
	z-index 
	display 
	visibility 
	clip 
	overflow 
	margin,border,padding 
	background 
	opacity 

	 
	查询元素的所有样式： 
		CssStyleDeclaration window.getComputedStyle(element,null); 

	样式表操作： 
		获取： document.styleSheets[0].cssRules[0] (cssRules有lengh属性） 
		增加： document.styleSheets[0].insertRule("h1 {...}",0); 
		删除 ： document.styleSheets[0].deleteRule(0) ? 
		IE 不支持insertRule,deleteRule,但是有 addRule和removeRule 

	样式表增加： 
		创建 <style></style>属性，并设置 html内容 

	样式表禁止： 
		获取 <link ... > ，然后设置 disabled 就可以了， 
	样式表启用： 
		同上，去掉disabled属性就可以 了	 

	Document属性 
		cookie 
		domain 
		lastModified 
		location 
		referrer  ： 上一个链接，如果有的话 
		title:  <title></title>中间的内容 
		URL 

		write() 

		window.getSelection()  //当前选取的文本 

事件处理
		事件类型： 
		传统事件：表单，鼠标，键盘 
		html5 事件 
		dom事件 
		触摸屏和移动设备事件 

	注册事件处理程序： 
		1, onclick 事件 （是否唯一？第二次会覆盖？） 
		2， addEventListener() 
		3， attachEvent （IE) 

		事件返回值： 
			对于onclick类型： false 通常代表取消进一步处理， 
			对于addEventListener 或attachEvent,必须调用preventDefault 
		调用顺序： 
			onclick一直优先调用 
			addEventListener 按照注册顺序 
			attachEvent无序 
		事件的传播： 
			focus,blur,scroll事件会例外，其它会冒泡 
			文档对象的load会在Docuemnt对象上停止冒泡，不会传播到window对象 
		事件取消： 
			 
		鼠标事件： 
			click,contextmenu,dblclick 
			mousedown,mouseup,mousemove,mouseover,mouseout,mouseenter,mouseleave 
		鼠标滚轮 
		拖放事件 
		文本事件 
		键盘事件
脚本化HTTP
	ajax 
	跨域： CORS 
jquery类库
		jquery 
		自定义事件： 
			$.event.trigger("NAME") //触发一个自定义事件 

		实时事件： 
			dom经常变化，当dom变化后，其中的事件也会失效， 实时事件可以解决这个问题 
			$('.dynamic').delegate("a","mouseover",hanlder) //似乎看不到什么差别？？ 
客户端存储
		localStorage 
	sessionStorage 

	特性： 
		sessionStorage关闭后失效 
		localStorage: 永久存在 
		根浏览器相关，换了浏览器，数据不能共享 
		有存储事件 
 
	cookie: 
		在客户端和浏览器中自动传输 
	 
	应用程序存储： 
		通过header头的content-type实现 
		存储： 
		更新： 
		 
	离线web应用： 
		数据存储在localStorage中，连线的时候再上传 

	
多媒体和图形编程
		脚本化图片： 
		图片效果：翻转等 
		脚本化音频： <audio> 
		脚本化视频： <video> 
		svg: 用于绘制图片 
		<canvas> ： 绘制图形, 和svg绘制原理不同，但是两者同样强大 
HTML5 API
		地理位置 api: 
			navigator.geolocation 
				getCurrentPOsition 
				watchPosition 
				clearWatch 	
	历史记录管理： 
		ajax历史记录问题的解决 
		locatiohn.hash 
		history.pushState 
		history.popstate 

	跨域消息传递： 
		postMessage() 
			 
	web worker: 
		 
	blob: 
		对大数据块的不透明引用或者句柄 
		文件作为blob 
		构造blob 
			var bb=new BlobBuilder(); 
			bb.append(STRING) 
			bb.append("\0") 
		blob URL 

	文件系统API: 
		主动请求用户允许读取本地的文件 
	客户端数据库： 
		indexedDB :对象数据库 

	Web套接字 
		websocket协议 

			var socket=new WebSocket("ws://ws.example.com:1234/resource") 
			socket.onopen=... 
			socket.send

				
(第三部分 Javascript核心参考）
javascript核心参考

（第四部分 客户端javascript参考）
客户端javascript参考



	3.这本书有道理吗，是部分还是全部有道理？ 
	4.这本书和我什么关系？对我有用处吗？用处大还是小？ 



      </p>

  