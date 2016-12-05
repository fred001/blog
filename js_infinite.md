
  # js_infinite

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:54:14 


      None


      <p>
      http://www.infinite-scroll.com/
http://isotope.metafizzy.co/demos/infinite-scroll.html
--
isotope 是对 infinite-scroll的封装。
实现类似google图片那种，滚动到空白，ajax刷新得到新内容

原理猜测：
[触发] 当遇到有没有占满的行的时候，就开始载入 藏在
nextSelector 中的下一页链接.

载入后有几种情况：
1， 成功， 增加内容， （寻找页面的 #content 部分，其它部分不会处理，还有  nextSelector部分）
  1，如果增加的内容没有产生新行，删除！！！
    所以一页至少要超过一行

2, 失败， 认为没有新内容了，不再处理

[安装]
 css 

 jquery
 isotope
 infinite

 问题：
   具体不知道怎么才更新，不知道位置的计算方法
   尤其是在iframe中的时候






      </p>

  