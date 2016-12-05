
  # vim

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:43:31 


      None


      <p>
      标签命令：
  :tabnew           //创建一个新标签
  :tabmove  NUMBER  //将当前标签移动到新的位置， 从0开始
  gt //跳转到下一个标签
  gT //跳转到前一个标签
  tabdo  CMD  //对多个标签同时执行命令


使用外部命令：
	{motion}!{program} // vim用户手册72中是错的，这个才是正确方式
		1,5!sort
		.!date  //替换当前行，用当前时间
	read !CMD  //读取命令结果，不会替换


@modified_at  DATE  // 怎么替换DATE成 当前时间， 替换中怎么调用外部命令结果

:let curdate=system('date') //外部命令结果赋值给变量
:/@modified/ s/\(modified_at\) \(.*\)/\="modified_at".curdate  // \= 之后似乎跟所要替换的内容，然后 . 可以连接变量， 这样唯一问题是 date结果是有换行的，要去掉

let curdate=system('date') | /@modified/....    //连接两个表达式一起

      </p>

  