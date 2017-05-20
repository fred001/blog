
  # wxpython 学习

      version:  2
      created_at:  2016-07-11
      updated_at:  2016-07-22 10:36:44

      None

      None


      <p>
      
wxpython是什么？
	wxpython是一个图形库，基于c++的wxWidget 库，提供python 语言的绑定
	和它相似的有gtk, qt，都是图形库

wxpython优点：
	python绑定，容易使用。 
	库功能强大
	库的设计比较容易理解
	跨平台

wxpython 基本构造
	frame 
		panel
			普通元素： button,label 等
			复杂元素： tree, list等
			布局元素: boxsizer, gridsizer等等
	dialog 



经验总结：
	布局一般是首先创建一个panel,然后在panel中使用其它panel,其它panel放置具体元素
	外层panel使用具体坐标来定位，比较方便
	布局对控制偏移量等十分不容易
	元素是可以自己实现的，这点非常有用

wxpython+matplotlib 
   如果是后端不存在，可能是因为centos7  包的问题
   缺少  python-matplotlib-wx 
   使用pip install matplotlib 安装最新的可以解决此问题
	
      </p>

  