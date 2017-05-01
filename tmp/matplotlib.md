# matplotlib 

http://matplotlib.org/faq/usage_faq.html (图表元素说明）

一个python 绘图库


核心概念：
  多种风格，其中一种是 matplotlib.pyplot

  figure
  ax


  一个figure中可以有多个图
  可以有多个figure

  Matplotlib 里的常用类的包含关系为 Figure -> Axes -> (Line2D, Text, etc.)一个Figure对象可以包含多个子图(Axes)，在matplotlib中用Axes对象表示一个绘图区域，可以理解为子图。

  可以使用subplot()快速绘制包含多个子图的图表，它的调用形式如下：

  subplot(numRows, numCols, plotNum)

  matplotlib的缺省配置文件中所使用的字体无法正确显示中文。为了让图表能正确显示中文，可以有几种解决方案。

      在程序中直接指定字体。
          在程序开头修改配置字典rcParams。
              修改配置文件。

                  比较简便的方式是，中文字符串用unicode格式，例如：u''测试中文显示''，代码文件编码使用utf-8 加上 # coding = utf-8 一行。

  
## 基本操作

  准备数据
  绘制图

  设置参数
    坐标，线条，标签等
