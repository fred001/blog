
  # DIV_居中的绝好解决方法

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:02:43 


      None


      <p>
      DIV 居中的绝好解决方法
DIV 居中的绝好解决方法 
 
作者：本站收集    文章来源：互联网    点击数：47    更新时间：2005-10-12 
 
　　现在进行WEB重构的时候,一般我们做DIV 居中是这样: 
body{
margin:0px auto;
text-align:center;
}

但是在没申明下面这句解析方法的时候,页面就会出错.不能居中对齐!
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
为此困扰了我几天.那么有的朋友就会说:你加上这句不就行了吗? 可是有时候页面并不能全部按上面规定的代码格式来编写,比如说要改多彩滚动条.
直到昨天,一个想法在我脑中闪了一下. 何不用JS来控制页面的边距?说干就干!
找了个页面.添加了下面的一小段代码. 
<script language="javascript" type="text/javascript" src="function.js"></script>

function.js内容: 
if(window.screen.width>800){document.write("<style type=\"text/css\">body{margin-left:"+(window.screen.width-800)/2+"px}</style>");}

保存,测试. 哈哈,换了几个分辨率都可以正常居中!至此试验成功.
总结一下:
主要是这句代码起的作用: 
(window.screen.width-800)/2 //计算页面应该留出的边距数值.800为我的DIV宽度 + 滚动条宽度.实际应用改为你自己的大小.

补充一点:上面这段JS 必须放在你的最后一个CSS连接或</style>的后面. 

      </p>

  