# pyside

http://www.cnblogs.com/ascii0x03/p/5496699.html
http://www.cnblogs.com/ascii0x03/p/5499507.html
http://www.cnblogs.com/ascii0x03/p/5500933.html
http://www.cnblogs.com/ascii0x03/p/5502286.html
http://www.cnblogs.com/ascii0x03/p/5505439.html


https://wiki.qt.io/PySide
http://pyside.github.io/docs/pyside/

http://zetcode.com/gui/pysidetutorial/

这是一个对pyqt封装的库。
因为pyqt是对c++库的封装，有很多c++语言的特性在其中，显得十分繁琐，所以才出现这个更简介的python封装。

但是资料不多，还是需要参照qt 文档


1. 基本框架
2. 元素
3. 布局
4. 事件


如果一个元素是动态增加的，但是界面没有变化， 那么执行  元素.show() 就行了
估计是元素默认都是隐藏的，调用show()的时候才显示
