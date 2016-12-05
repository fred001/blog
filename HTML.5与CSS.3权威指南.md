
  # HTML.5与CSS.3权威指南

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:25:31 


      None


      <p>
      HTML.5与CSS.3权威指南
类别
关于html5,css3的实用书籍
内容简介
介绍了html5和css3技术
评分
7
阅读进度
完成html5，暂时终止css3部分阅读
开始阅读时间
2014-08-03
粗读完成时间

精读完成时间

完成阅读时间




笔记：
	html5_css3 读书笔记

第一章 Web时代的变迁
	htm5要解决的问题：
		1，浏览器兼容
		2，文档结构不够明确
		3， web应用程序的功能受到了限制
		
	
第二章  html5和html4的区别
		语法的改变
		新增元素和废除元素
			新增： section,article,aside,header,hgrop,footer,nav,figure
					video,audio,embed,mark,progress,time,ruby,rt,rp,canvas,
					wbr,command,details,....
		新增属性和废除属性
		全局属性

第三章  html5的结构
		新增的主体结构元素
			article,section...
		新增的非主体结构元素
			header,hgroup,...
		html5结构

第四章  表单与文件
		新增元素与属性
			元素新增属性  form=FORM_ID, 即使位于<form> 外面，也可以视为属于这个表单
			placeholder,autofocus,list,autocomplete
			 新增input种类
		表单验证
			required
			pattern
			min
			max
			step

			元素新增方法： boolean  document.getElementById('').checkValidity()
							setCustomValidity(MSG)

			取消验证：  元素的novalidate属性，或者submit的formnovalidate属性
		增强的页面元素
			figure,figcaption,details,mark,progress,meter,menu,command
		文件API
			其它地方已经笔记
		拖放API
			拖放事件：
				dragstart,drag,dragenter,dragover,dragleave,drop,dragend

第五章  绘制图形
		其他地方已经笔记

第六章  多媒体播放
		video, audio
第七章  本地存储
		web storage
			sessionStorage
			localStroage

			共同的方法：
			setItem(k,v)
			getItem(k)
			clear()

		本地数据库
			var  db=openDatabase('mydb','1.0','test db',2*1024*1024);
			db.transaction(function(tx){  //访问需要使用事务，避免冲突，
				tx.executeSql(“create Tabel....”);
			}，[dataHanlder],[errorHandler])

第八章  离线应用程序
	离线web应用程序详解
			
	manifest文件

			text/cache-manifest 启用
			manifest文件用于整个web应用程序

			<html mainfest=”xxx.manifest” > 表明此文件为止
			当此文件被修改，则cache会自动更新

	浏览器与服务器的交互过程
	applicationCache对象
			缓存更新时候，会触发  applicationCache.updateready事件
			这个事件触发时，只会在下一次才真正更新缓存，本次是不会变的

			swapCache则手动来更新
			update 检查是否有更新

第九章  通信API
		跨文档消息
			甚至可以跨域
			接受：window.addEventListener(“message”,function(evt){
			evt.orgin
			evt.data
},false);
			发送： otherWindow.postMessage(message,targetOrigin);
					otherWIndow可以通过window.open 或者 iframe获得
		web socket
			独立于http协议， 可以实现比较高级的功能
			var websocket=new Websocket(“ws://localhost:8005/socket”);	
			websocket.send(“data”)
			websocket.onmessage=function(event){  event.data }
			...onopen()
				onclose()	
			close()
				readyState=CONNECTING(0),OPEN(1),CLOSING(2),CLOSED(2)
第十章  web workers处理线程
		基础知识
			var worker=new Worker(“worker.js”);
			worker.onmessage=function(event){};
			worker.postMessage(message);
		与线程进行数据的交互
		线程嵌套
		线程中可用的变量，函数与类
			self,postMessage(message),onmessage,importScripts(urls),navigator,sessionStorage,localStorage,
		XMLHttpRequest
		WebWorkers
		setTimeout,setInterval,close(),eval,isNaN,escape,object,webSOckets
第十一章  获取地理位置信息
		Geolocation API
			window.navigator.geolocation：
				void getCurrentPosition(onSuccess,onError,options);
					onSuccess= function(position){position.coords)
				int watchCUrrentPosition(onSuccess,onError,options)
				void clearWarch(watchId)

		
			
			
		position对象
			latitude 纬度
			longitude 精度
			altitude 海拔
			accuracy 经度或纬度的精度
			altitudeAccurancy 海拔精度
			heading
			speed
			timestamp
		在页面上使用google地图
第十二章  css3概述
第十三章  选择器
第十四章  使用选择器插入内容
第十五章  文字与字体相关样式
第十六章  盒相关样式
第十七章  背景边框样式
第十八章  css3中的变形处理
第十九章  css3中的动画功能
第二十章  布局相关样式
第二十一章  media queries样式
第二十二章  css3中其他样式属性
	第二十三章 综合实例

      </p>

  