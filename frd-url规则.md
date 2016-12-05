
  # frd-url规则

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:21:21 


      None


      <p>
      url() 函数介绍：
如果没有rewrite,需要主动加入 index.php 
url("index.php/index/book")


url rewrite :
1，获取path
2, 对path不同情况进行处理 
a, path = false , path = default_module+default_controller
b, path 只有单个部分，表明缺少module或者controller
paths=default_module+path, path+default_controller

c, 正常path ,但是也可能缺少module 或者 controller

3, 对所有可能path进行rewrite 
rewrite($paths)

4， 正常处理方式
1, 逐一从path中获取 module, 若module存在，
剩下部分可能包含controller+params
先从头往尾尽获取controller, 获取最大部分的controller

2,若有结果则是结果，否则会逐渐匹配module直至结束（这应该有错误，module前部分若不存在，加上后部分更不会存在）


~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

favicon.ico 


这个是在浏览时候标签显示图标的
1， 创建图标 ，通过转换图片成ico格式
图片尺寸是32x32
2, 放在网站根目录下

3， 可能需要重启服务器，
更重要的是重启浏览器才能看到效果

4， 如果看不到，主动在网页中加入 相关代码 
<link ... >
<link ... >
      </p>

  