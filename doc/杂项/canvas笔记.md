
  # canvas笔记

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:05:26 


      None


      <p>
      CANVAS笔记
Html5 Canvas 笔记
	简介：  canvas 是 html5的一个画布， 可以在上面绘制各种图形，功能完备，可以用来做游戏
	架构：	唯一的html元素:  <canvas id='test'  width=  height= ></canvas>
		canvas 对象：  
			var canvas=document.getElementById("test");
			var context=canvas.getCOntext('2d');  //也支持3d, 比较复杂
			context 是绘图的核心， 包含了一系列的 属性 和方法
			
		绘制方法：
			1， 设置context属性
			2， 调用context方法 设定路径
			3， 调用context方法  最终绘制

		坐标系统：  左上角为 (0,0) ,width和height 来源自  <canvas> 的 width,height 属性，如果<canvas style="width:..."  ，这是无效的！！ 
				如果样式尺寸和元素尺寸不同，会缩放整个画布

	功能：
		基本绘制
			属性设置： 	context.fillStyle=COLOR
			路径设置：
					context.beginPath()
						arc(x,y,radius,startAngle,endAngle,...)  //增加路径
						....
					context.closePath()  //	不关闭路径的话，路径会一直存在， 于是以后的fill,stroke操作会针对整个路径


			绘制方法:	
				fill  :填充内部
				stroke  ：绘制边框
				clip：  裁剪
			
			绘制
				moveTo  :移动到某点，开始绘制

				绘制线段
					lineTo(x,y)	从当前点，连接一条线到某个点

				绘制矩形
					rect
					fillRect
					strokeRect
					clearRect
				绘制曲线
					arc(x,y,半径，弧形的起点角度，弧形的结束角度，弧形的方向（顺时针或逆时针））
						arc(75,100,50,0,rads(360),false)
					arcTo
						arcTo(500,50,500,150,30)
					bezierCurveTo
						(220,220,280,280,300,250)
					quadraticCurveTo
						(100,200,175,250)

				绘制文字：
					文字的属性
						font,
						textAlign
						textBaseline

					fillText(text,x,y,(maxWidth))
					strokeText(..)
				绘制图像：
					drawImage(image,x,y)
						(image,x,y,w,h)
						(image,sx,sy,sw,sh,dx,dy,dw,dh)  //可以从画布中赋值图像到画布的其它地方


					图像平铺：
						var pattern=createPattern(image,'repeat')  // no-repeat,repeat-x,repeat-y,repeat
						context.fillStyle=pattern
						context.fillRext(0,0,400,300)
	
					图像裁剪：
						创建路径，然后调用  clip()

					像素处理：
						CanvasPixelArray getImageData(sx,sy,sw,sh)  //坐标和宽高
						CanvasPixelArray.height,width,data (数组）

						putImageData() ，处理后，可以通过这个重新应用图像





		高级绘制


			渐变：
				var g1=	context.createLinearGradient(0,0,0,300) //创建渐变
				g1.addColorStop(0,'rgb(255,255,0)');  //这个方法有两个参数， 第一个是偏移量， (0-1) 意思是设置某偏移量的颜色
				g1.addColorStop(1,'rgb(0,255,255)');
				context.fillStyle=g1
	
				fill..

				径向渐变：
					从圆心向外渐变
					createRadialGradient(xStart,yStart,radiusStart,xEnd,yEnd,radiusEnd);

			图形组合：
				globalCompositeOperation=type  //source-over,source-in,destination-in,source-out,destination-out,,....


			阴影：
				shadowOffsetX=10
				shadowColor="rgba(...)"
				shadowBlur =7.5 模糊范围

			坐标转换：
				translate(x,y)
				scale(x,y) //x (水平放大倍数，y,垂直放大倍数）
				rotate(angle)  //  MATH.PI/10  = 10度

				坐标转换后，原有的路径都不能用了


			矩阵变换： (比较难）
				transform(m11,m12,m21,m22,dx,dy)
			命中检测
				isPointInPath()

		其它

	
			保存和恢复状态： 实现单次撤销（只会对状态进行修改，不会对图像进行修改）
				save() ;//保存
				restore() //恢复到上次状态

			保存文件：
				toDateURL(type)  //type: mime type (image/jpeg)

				window.location=canvas.toDataURL("image/jpeg");

======================================================================
参考：
	属性
		fillStyle:	填充时候的颜色，渐变，或图案等样式	 ： 默认 #000000
		font		绘制文本时候的css字体
		globalAlpha  	绘制像素时候要添加的透明度
		globalCompositeOperation	如何合并新的像素点和下面的像素点
		lineCap		如何渲染线段的末端
		lineJoin		如何渲染顶点
		lineWidth		外框线的宽度
		miterLimit		紧急斜接顶点的最大长度
		textAlign		文本水平对齐方式
		textBaseline	文本垂直对齐方式
		shadowBlur		阴影的清晰或模糊程度
		shadowColor		下拉阴影的颜色
		shadowOffsetX	阴影的水平偏移量
		shadowOffsetY	阴影的垂直偏移量
		strokeStyle		勾勒线段时候的颜色，渐变样式或图案等样式 ： 默认 #000000


		颜色的标识：  #f44, rgb(60,60,255), rgb(100%,25%,100%,0.5),hsl(60,100%,50%)






		


		





      </p>

  