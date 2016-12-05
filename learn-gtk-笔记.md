
  # learn-gtk-笔记

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:18:57 


      None


      <p>
      LEARN-GTK-笔记


window.set_default_size(x,y)  //设置默认尺寸
window.move(x,y)  //移动到屏幕某个位置


label=Gtk.Label(TEXT)  #创建label
label.set_text(TEXT)
label.get_text()  return TEXT
label.set_markup(TEXT)   //可以使用超链接等 html元素,但不是html,是xml
label.selectable(True)  //文字可以被选中，复制，默认不行


entry=Gtk.Entry()   //文本输入控件
entry.get_text()   //
entry.set_text(TEXT)  //
entry.set_visibility(True| False)  // false,则类似password
entry.set_max_length(max)
entry.set_editable(True|False)  //可否编辑

button=Gtk.Button(label=TEXT)  //创建button

button=Gtk.ToggleButton([label[, stock[, use_underline]]]) //按下跟不按下的效果不一样的button
get_active()
set_active()

button=Gtk.CheckButton([label[, stock[, use_underline]]]) //checkbox


button=Gtk.RadioButton(..)
join_group(group)

link=Gtk.LinkButton(uri[,label])
get_uri()
set_uri(uri)

SpinButton


button=Gtk.Switch()  //开关， 有on,off,滑动的那种
get_active()
set_active(is_active)  





布局：
  一个window只能有一个布局  ,通过  WINDOW.add(布局） 加入即可
 
//创建box, 垂直
box =Gtk.Box(spacing=6,orientation=Gtk.Orientation.VERTICAL)
//创建box, 水平，这是默认， 不加参数就是水平）
box =Gtk.Box(spacing=6,orientation=Gtk.Orientation.HORIZONTAL)

box.pack_start(child,expand,fill,padding) 从前往后添加
box.pack_end(child,expand,fill,padding)  从后往前添加


grid=Gtk.Grid()  //创建grid
grid.add(child) //水平增加
grid.attach(child,left,top,width,height)  //指定位置增加， left,top 从0开始数 width=2 则占据2倍的宽度

//根据其它元素放置
//sibling是参照元素
//side 可以是 
    Gtk.PositionType.LEFT
    Gtk.PositionType.RIGHT
    Gtk.PositionType.TOP
    Gtk.PositionType.BOTTOM

意思是本元素应当位于参照元素的哪个方向
grid.attach_next_to(child,sibling,side,width,height)



//homogeneous 可以是True
table=Gtk.Table(rows,cols,homogeneous) 


//放置在3x3的  2.2 位置  
//table.attach(child,1,2,1,2) 
//意思是 x 占据  2-1, y也占据  2-1 位置
table.attach(child,left,right,top,bottom)  //放置元素
 


      </p>

  