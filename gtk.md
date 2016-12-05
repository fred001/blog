
  # gtk

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:19:40 


      None


      <p>
      GTK
编程技能树：

  GUI 编程
  
    初级：  初始化窗口
                  窗口控件
                   窗口布局
                   窗口对话框
                   菜单，工具栏，状态栏
                   
      2：    事件处理
                
      3,       更加细化：
               窗口属性
               布局
               控件更高级
               
               
               
               
               GTK 开发

显示widget:   gtk_widget_show(WIDGET)  
显出所有widget:   gtk_widget_show_all(WIDGET);

控件：
  window :  window=gtk_window_new(GTK_WINDOW_TOPLEVEL); 只能有一个控件
  frame: gtk_frame_new(“LABEL”)
  label:   gtk_label_new(“LABEL”)
  button:  gtk_button_new_with_label(“LABEL”)
  text:   gtk_entry_new()
  image:  gtk_image_new_from_file("IMAGE_PATH");
  text:   gtk_text_view_new();
  checkbox:  gtk_check_button_new_with_label(“LABEL”);
  combo: 
          combo=gtk_combo_box_new_text();
	gtk_combo_box_append_text(GTK_COMBO_BOX(combo),"Linux");
	gtk_combo_box_append_text(GTK_COMBO_BOX(combo),"Window");

  hseparator:   gtk_hseparator_new  水平分割线
  vseparator:   gtk_vseparator_new  垂直分割线 


布局：
  Fixed: 固定位置 
      GtkWidget  *fixed=gtk_fixed_new();
     gtk_fixed_put(GTK_FIXED(fixed),WIDGET);

  vbox / hbox :水平和垂直盒

 GtkWidget *fixed=gtk_hbox_new(TRUE,1);
 gtk_box_pack_start(GTK_BOX(fixed),btn1,TRUE,TRUE,0);


表格布局

对齐布局

window布局


对话框
创建 （ info,warning,error,question(需要回答OK或不）
 GtkWidget *dialog=gtk_message_dialog_new(window,GTK_DIALOG_DESTROY_WITH_PARENT,
info: 
GTK_MESSAGE_INFO,
GTK_BUTTONS_OK,
"Error Happened","title");
warning:
GTK_MESSAGE_WARNING,
GTK_BUTTONS_OK,
"Error Happened");

error:
GTK_MESSAGE_ERROR,
GTK_BUTTONS_OK,
"Error Happened","title");

question:
GTK_MESSAGE_QUESTION,
GTK_BUTTONS_YES_NO,
"Are you sure to quit?");

设置属性： gtk_window_set_title(GTK_WINDOW(dialog), "Warning");
运行：  gtk_dialog_run(GTK_DIALOG(dialog));
销毁： gtk_widget_destroy(dialog);  //运行后就可以销毁了


其它更高级对话框： 
   应用程序对话框 ：GtkAboutDialog
   字体选择对话框： GtkFontSelectionDialog
   色彩选择对话框： GtkColorSelectionDialog

事件
  绑定事件：  handler_id= g_signal_connect(G_OBJECT(button), "clicked",
G_CALLBACK(button_clicked), NULL);
 解除绑定：
    g_signal_handler_disconnect(window, handler_id);

高级情况： 
	gtk_widget_add_events(GTK_WIDGET(window), GDK_CONFIGURE);


菜单
   菜单条：  GtkWidget * menubar=gtk_menu_bar_new();
   菜单项：  GtkWidget *gtk_menu_item_new_with_label("关于");  
   菜单   :     GtkWidget * menu=gtk_menu_new();
  用法：  用法有点别扭
 1, 创建菜单条  
 2, 每个菜单，不能单独放置到菜单条上， 需要再创建一个 菜单项，
  这个菜单项 是特殊的，显示在菜单条上的
  例如 （文件，编辑，帮助） 这种

3, 为这个特殊的菜单项 绑定 菜单 
   gtk_menu_item_set_submenu(GTK_MENU_ITEM(菜单项 ),菜单);
4, 为绑定的菜单增加菜单项
 gtk_menu_shell_append(GTK_MENU_SHELL(菜单),菜单项);

5,其它：
   特殊菜单项，增加到菜单条中 ，然后就完成了


工具条： 
 创建:   
  GtkWidget *toolbar = gtk_toolbar_new();
设置：
  gtk_toolbar_set_style(GTK_TOOLBAR(toolbar),GTK_TOOLBAR_ICONS);
 gtk_container_set_border_width(GTK_CONTAINER(toolbar),2);

工具项：   GtkToolItem *new=gtk_tool_button_new_from_stock(GTK_STOCK_NEW);
插入工具项：   gtk_toolbar_insert(GTK_TOOLBAR(toolbar),new,-1);

禁用widget !

gtk_widget_set_sensitive(menubar,FALSE);

工具项也可以禁用， 工具箱的类型是  GtkToolItem * ,但是通过转换，可以禁用
gtk_widget_set_sensitive(GTK_WIDGET(new),FALSE);



Gtk笔记
2013-11-09

=======================
运行框架:
  #安装
    缺少

  #载入必要包
  from gi.repository import Gtk,Gdk,Pango,cairo

  #创建一个自定义的窗口
  class TestWindow(Gtk.Window):
    def __init__(self):
    Gtk.Window.__init__(self,title="Test")

  #实例窗口
  window=TestWindow()

  #绑定关闭窗口事件
  window.connect("delete_event",Gtk.main_quit)

  #显示窗口和内部所有控件， show_all也可以由控件调用
  window.show_all()


  #主循环开始 
  Gtk.main()

       
窗口(window)
 - 窗口是核心组件，也是用来显示的基础
 - 方法：
   set_default_size(x,y)  //设置默认尺寸
   move(x,y)  //移动到屏幕某个位置
   set_size_request(w,h) //其它元素也可以使用这个方法来设置本身尺寸
   set_position(Gtk.WindowPosition.CENTER_ALWAYS)

   add(OBJECT) //增加控件到window,只能增加1个layout控件
设置窗口位置
WINDOW.set_position(Gtk.WindowPosition.CENTER)

位置值：
Gtk.WindowPosition.NONE
Gtk.WindowPosition.CENTER
Gtk.WindowPosition.MOUSE
Gtk.WindowPosition.CENTER_ALWAYS
Gtk.WindowPosition.CENTER_ON_PARENT

窗口的图标
WINDOW.set_icon_from_file("web.png")


Frame

布局控件:
 -特殊的控件，用来实现布局
 -window放置一个布局元素， 这个布局的尺寸就是整个window的尺寸

 Fix布局：
 - 固定位置的布局，其实就是没布局 //比较方便刚开始测试

 fixed=Gtk.Fixed()
 fixed.put(child,x,y)  //放置元素在某个位置   


 Alignment布局:
 -这是个比较灵活的位置管理的布局
 -里面只能加入一个控件， 在alignment尺寸范围中，
   设置控件位于其中的具体位置，可以是任何位置
   用百分比来确定

  但是可以加入一个例如 vbox,然后vbox里面加入更多元素

 align=Gtk.Alignment() //参考手册上初始化就可以使用参数，但实际上不行,只能第二部用 set来设置

 //xalign 0.0-1.0, 0.3意思是在横向上，位于 30%这个位置，
 //xscale 0.0-1.0 指在横向上， 扩展自身尺寸到 总可以扩展尺寸的 百分之几
 //设置参数时候，首先需要考虑本身所占据的尺寸，如果有办法显示边框就方便了
 //
 align.set(xalign, yalign, xscale, yscale) 
 align.set_padding(padding_top, padding_bottom, padding_left, padding_right)
 align.get_padding()

 Box控件（ 垂直或者水平）：

 //创建box, 垂直
 box =Gtk.Box(spacing=6,orientation=Gtk.Orientation.VERTICAL)
 //创建box, 水平，这是默认， 不加参数就是水平）
 box =Gtk.Box(spacing=6,orientation=Gtk.Orientation.HORIZONTAL)

 box.pack_start(child,expand,fill,padding) 从前往后添加
 box.pack_end(child,expand,fill,padding)  从后往前添加
 

 Grid控件：
   grid=Gtk.Grid()  //创建grid
   grid.add(child) //水平增加
   grid.attach(child,left,top,width,height)  //指定位置增加， left,top 从0开始数 width=2
   则占据2倍的宽度

   //根据其它元素放置
   //sibling是参照元素
   //side 可以是 
   Gtk.PositionType.LEFT
   Gtk.PositionType.RIGHT
   Gtk.PositionType.TOP
   Gtk.PositionType.BOTTOM

   意思是本元素应当位于参照元素的哪个方向
   grid.attach_next_to(child,sibling,side,width,height)

  table控件：
   
expand + fill ,
 似乎是指， 1 可以扩展所有可用空间，
 2,尽力扩展自身
最终占据了所有的可用空间

如果仅仅expand,虽然允许占据所有空间，但是自身不扩展，所以可能没效果

如果仅仅fill,虽然尽力扩展，但是不允许占据额外空间，所以能扩展一点点

    Gtk.AttachOptions.EXPAND: The widget should expand to take up any extra space in its container that has been allocated.
    Gtk.AttachOptions.FILL: The widget will expand to use all the room available.
    Gtk.AttachOptions.SHRINK: Reduce size allocated to the widget to prevent it from moving off screen.


Gtk.Table
    //xoptions, yoptions value:  
    //Gtk.AttachOptions.EXPAND
     Gtk.AttachOptions.FILL
     Gtk.AttachOptions.SHRINK
    可以类似  Gtk.AttachOptions.EXPAND | Gtk.AttachOptions.FILL 

    attach(child, left_attach, right_attach, top_attach, bottom_attach[, xoptions[, yoptions[, xpadding[, ypadding]]]])
  
  //homogeneous 可以是True
  table=Gtk.Table(rows,cols,homogeneous) 


  //放置在3x3的  2.2 位置  
  //table.attach(child,1,2,1,2) 
  //意思是 x 占据  2-1, y也占据  2-1 位置
  table.attach(child,left,right,top,bottom)  //放置元素
  


控件:

 widget:
grab_focus //获取焦点
set_sensitive( //禁用
et_default_size  //设置默认尺寸



Label:
label=Gtk.Label(TEXT)  #创建label
label.set_text(TEXT)
label.get_text()  return TEXT
label.set_markup(TEXT)   //可以使用超链接等 html元素,但不是html,是xml
label.selectable(True)  //文字可以被选中，复制，默认不行


Entry:
entry=Gtk.Entry()   //文本输入控件 ，没有参数
entry.get_text()   //
entry.set_text(TEXT)  //
entry.set_visibility(True| False)  // false,则类似password
entry.set_max_length(max)
entry.set_editable(True|False)  //可否编辑

entry.grab_focus()  //让文本获得焦点， 其它widget也可以

支持Enter Press:
entry.set_activates_default(True) //允许enter事件
 entry.connect('activate',self.activate) // 现在可以绑定这个事件了


Button:
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

进度条：
 progressbar=Gtk.ProgressBar() //滚动条
 set_fraction(fraction) //设置完成百分比  0.0-1.0

 set_pulse_step() //另一种方式展现进度， 步骤数目 ，设置步骤总数
 pulse()  完成了一个步骤

 set_orientation(Gtk.Orientation.HORIZONTAL |
  Gtk.Orientation.VERTICAL)  //设置;滚动它方向

  set_show_text(text)  //设置文字
  set_text() //设置文字

  set_inverted(True|False) //设置是否逆向

进度圈：
//这是个未知用多少时间的状态显示
spinner=Gtk.Spinner() //类似ajax loading的圆环载入图标
start() //开始
stop(0  //结束

 CheckBox
button = gtk.CheckButton("Show title")
button.set_active(True)
button.unset_flags(gtk.CAN_FOCUS)
button.connect("clicked", self.on_clicked)

Image:
 image = gtk.Image()
image.set_from_file("redrock.png")



HScale

cale = gtk.HScale()
scale.set_range(0, 100) //我仧设置了这个标尺的低值和高值范围
scale.set_increments(1, 10)  //set_increments()方法为这个范围设置步长和页尺寸。
scale.set_digits(0)  //我仧想让这个标尺的值为整数,所以我仧将小数部分的位数设置为 0。 几意味着有几个小数
scale.set_size_request(160, 35)  //还得手动设置长宽，这个无法自动


toggleButotn


drawing area:
 self.darea = gtk.DrawingArea()
self.darea.set_size_request(150, 150)
self.darea.modify_bg(gtk.STATE_NORMAL,Gdk.Color(10,10,10)) //gtk.STATE_NORMAL 不存在，可能已经改名


calander:
  calendar = gtk.Calendar()
calendar.connect("day_selected", self.on_day_selected) 

def on_day_selected(self, widget):
(year, month, day) = widget.get_date()
self.label.set_label(str(month) + "/" + str(day) + "/" + str(year))

scrolledWindow

  sw = gtk.ScrolledWindow()
sw.set_shadow_type(gtk.SHADOW_ETCHED_IN)sw = gtk.ScrolledWindow()
sw.set_shadow_type(gtk.SHADOW_ETCHED_IN)
sw.set_policy(gtk.POLICY_AUTOMATIC, gtk.POLICY_AUTOMATIC)
vbox.pack_start(sw, True, True, 0)
self.store = self.create_store()
sw.set_policy(gtk.POLICY_AUTOMATIC, gtk.POLICY_AUTOMATIC)


下拉选中：
 
select: 
  看起来比较复杂，没看到简单的用法

  //首先创建一个 listStore 存放options
  name_store = Gtk.ListStore(int, str)
  name_store.append([1, "Billy Bob"])
  name_store.append([11, "Billy Bob Junior"])

  //初始化一个combo,  这种类型的combo,具有一个下拉选择，但是选中的文字可以编辑
  name_combo = Gtk.ComboBox.new_with_model_and_entry(name_store)

  //绑定事件
  name_combo.connect("changed", self.on_name_combo_changed)

  //这个还不懂什么作用
  name_combo.set_entry_text_column(1)


  //事件发生，获得选中的值
  //值有两种，1是下拉中选择的，2是直接修改或者输入的
   combo.get_active_iter() //获得当前选中的项，不存在是None,其它就是常规操作了，估计甚至可以修改

   def on_name_combo_changed(self, combo):

   tree_iter = combo.get_active_iter()
   if tree_iter != None:
   model = combo.get_model()
   row_id, name = model[tree_iter][:2]
   print "Selected: ID=%d, name=%s" % (row_id, name)
   else:
   entry = combo.get_child()
   print "Entered: %s" % entry.get_text()



 
Gtk.Frame:
  类似html 中的 fieldset ,一个线框围住控件， 还有个标题在框上
 
frame=Gtk.Frame()
方法：
  set_label(STRING)
  set_label_widget(LABEL) //用label来替代文字， 估计可以方便修改
  
  // xpos位于线框内部，从左(0)到右(1),默认 0
   //ypos 位于线框中间 从上(1)到下(0) ,0 则位于内部，1则位于外部，默认0.5
  set_label_align(xpos,ypos) 
  set_shadow_type(Gtk.ShadowType.XXXX) //xxxx= IN, OUT,ETCHED_IN,ETCHED_OUT 但是似乎没有什么区别



菜单:
    MENUITEM.connect("activate",self.exit2) //绑定事件到菜单项
 
对话框：
 Gtk Dialog:
  特点：  
      1， 弹出后，父层不能动了，得关闭对话框后父层才能继续运行
          2， 内部包含一个 box, 纵向

           方法：
              get_content_area()  获取内部的box, 然后可以自定义里面的内容， 但是 button 始终在底部

                 add_button(button_text,response_id) //底部添加button
                  
                 response_id :
                 Gtk.ResponseType.NONE
                 Gtk.ResponseType.REJECT
                 Gtk.ResponseType.ACCEPT
                 Gtk.ResponseType.DELETE_EVENT
                 Gtk.ResponseType.OK
                 Gtk.ResponseType.CANCEL
                 Gtk.ResponseType.CLOSE
                 Gtk.ResponseType.YES
                 Gtk.ResponseType.NO
                 Gtk.ResponseType.APPLY
                 Gtk.ResponseType.HELP

                 add_buttons(button_text,response_id[,..])
                 例如：
                 dialog.add_buttons(Gtk.STOCK_OPEN,42,"close",Gtk.ResponseType.CLOSE)
                 //有点费解，不懂


                 set_modal(is_modal)  //设置是否是
                 modal,更强大

                 run() //打开并运行，
                 如果在dialog内部增加了自定义元素，
                 需要用  dialog.show_all()
                 来让它们显示，否则看不到

                 response_id =dialog.run()
                 //结束后返回一个值，标明是哪个
                 //response_id 点击了

                 destory() //销毁  ，
                 需要手动销毁，不然对话框不会自动消失
                 hide() //隐藏，不销毁

                 gtk.ImageMenuItem(gtk.STOCK_NEW, agr)
                 gtk.SeparatorMenuItem()
                 gtk.CheckMenuItem("View Statusbar")


文件选择dialog：
dialog=Gtk.FileChooserDialog(TITLE[,parent[,action[,buttons]]])
action: 代表类型

Gtk.FileChooserAction.OPEN: 
Gtk.FileChooserAction.SAVE:
Gtk.FileChooserAction.SELECT_FOLDER: 
Gtk.FileChooserAction.CREATE_FOLDER: 

buttons
是dialog中的各类button

       
About 对话框
about = gtk.AboutDialog()
about.set_program_name("Battery")
about.set_version("0.1")
about.set_copyright("(c) Jan Bodnar")
about.set_comments("Battery is a simple tool for battery checking")
about.set_website("http://www.zetcode.com")
about.set_logo(gtk.gdk.pixbuf_new_from_file("battery.png"))
about.run()
about.destroy()

字体选择对话框
fdia = gtk.FontSelectionDialog("Select font name")
response = fdia.run()
if response == gtk.RESPONSE_OK:
font_desc = pango.FontDescription(fdia.get_font_name())
if font_desc:
self.label.modify_font(font_desc)
fdia.destroy()
颜色选择对话框

cdia = gtk.ColorSelectionDialog("Select color")
response = cdia.run()
if response == gtk.RESPONSE_OK:
colorsel = cdia.colorsel
color = colorsel.get_current_color()
self.label.modify_fg(gtk.STATE_NORMAL, color)
cdia.destroy()                                                                                         方法：
                                                                                                  //无论是
                                                                                                  //open还是
                                                                                                  //save,
                                                                                                  //都会获取一个路径，
                                                                                                  //用来保存或者读取  
                                                                                                    get_filename()
                                                                                                    //在run结束后调用，获得选择的文件路径，
                                                                                                    //如果选了的话
                                                                                                      

                                                                                                     其它和dialog相同





工具栏:

工具栏：
 toolbar = gtk.Toolbar()
toolbar.set_style(Gtk.ToolbarStyle.ICONS)
newtb = gtk.ToolButton(gtk.STOCK_NEW)
opentb = gtk.ToolButton(gtk.STOCK_OPEN)
savetb = gtk.ToolButton(gtk.STOCK_SAVE)
sep = gtk.SeparatorToolItem()
quittb = gtk.ToolButton(gtk.STOCK_QUIT)
toolbar.insert(newtb, 0)
toolbar.insert(opentb, 1)
toolbar.insert(savetb, 2)
toolbar.insert(sep, 3)
toolbar.insert(quittb, 4)

set_sensitive(False)//禁用工具栏

状态栏:
剪切板：
 贴板： 
   系统存在两个剪切板。是可以和其它程序共享的！ 并非仅仅在gtk程序中用。
     1， 获取其中一个剪切板
       2， 使用剪切版的  get/set系列函数， 可以分别设置 文本，或者图片

         clipboard=Gtk.Clipboard.get(Gdk.SELECTION_CLIPBOARD | Gdk.SELECTION_PIRMARY) 
          //首先要 import Gdk, 跟import Gtk一样,通常用前一个，第二个还不知道什么用


          clipboard 方法：
            set_text(text,length )  //length 是文本的最大长度，需要提供，不知道怎么才能所有文本
              set_image(image)

              wait_for_text() //相当于 get_text,不存在则 None  名字有点奇怪，还不懂为啥
              wait_for_image()  //相当于get_image

              store() //    Stores the clipboard’s data outside the application. Otherwise, data
              copied to the clipboard may be lost when the application exits.

              clear() //    Clears the contents of the clipboard. Use with caution; this may clear
              data from another application.


拖拉：
 步骤：
   1， 拖动widget设置 可拖动
      drag_source_set(start_button_mask, targets, actions)
        2,拖动目标处设置
          drag_dest_set(flags, targets, actions)

            3， 拖动开始的事件
                on_drag_data_received(self, widget, drag_context, x,y, selection_data,info, time):
                         //info ,selection_data 可能要用到
                                    在selection_data中设置传递的信息
                                      4， 拖动结束的事件
                                          on_drag_data_get(self, widget, drag_context,
                                          selection_data, info, time):
                                                //info ,selection_data 
                                                        在selection_data中获得接收信息

                                                        selection_data的方法
                                                           class Gtk.SelectionData
                                                               get_text()  //    Returns the
                                                               contents of the text contained in
                                                               selection data
                                                                   set_text(text)  //    Sets the
                                                                   contents of the text contained in
                                                                   selection data to text
                                                                       get_pixbuf()//    Returns the
                                                                       pixbuf contained in selection
                                                                       data
                                                                           set_pixbuf(pixbuf)



                                                                           Glade 和 Gtk.Builder
                                                                             实现了通过配置文件创建程序，比较有前景。

                                                                               程序包含的部分：
                                                                                 1， 元素对象
                                                                                   2， 事件

                                                                                   对象的xml格式：
                                                                                     <?xml
                                                                                     version="1.0"
                                                                                     encoding="UTF-8"?>
                                                                                     <interface>
                                                                                       <!--
                                                                                       interface-requires
                                                                                       gtk+ 3.0 -->
                                                                                         <object
                                                                                           class="GtkWindow"
                                                                                           id="window1">
                                                                                               <property
                                                                                               name="can_focus">False</property>
                                                                                                   <child>
                                                                                                         <object
                                                                                                           class="GtkButton"
                                                                                                           id="button1">
                                                                                                                   <property
                                                                                                                   name="label"
                                                                                                                   translatable="yes">button</property>
                                                                                                                     
                                                                                                                           <signal
                                                                                                                           name="pressed"
                                                                                                                           handler="onButtonPressed"
                                                                                                                           swapped="no"/>
                                                                                                                           //事件！
                                                                                                                            ...


                                                                                                                            builder
                                                                                                                            =
                                                                                                                            Gtk.Builder()
                                                                                                                            builder.add_from_file("example.glade")

                                                                                                                            window
                                                                                                                            =
                                                                                                                            builder.get_object("window1")
                                                                                                                            window.show_all()
                                                                                                                            //builder.get_objects()

信号和事件:

 def hello(button):
  pass


  handlers = {
    "onDeleteWindow": Gtk.main_quit,
    "onButtonPressed": hello   //让xml中的onButtonPressed事件，绑定到 hello函数
}
builder.connect_signals(handlers)

第二种绑定事件：
 1, 但是怎么知道是哪个事件呢，加入两个控件都有 onButtonPressed事件？
 2, onButtonPressed 名字是自定义的吗？

  class Handler:
    def onDeleteWindow(self, *args):
        Gtk.main_quit(*args)

    def onButtonPressed(self, button):  //
        print "Hello World!"

builder = Gtk.Builder()
builder.add_from_file("builder_example.glade")
builder.connect_signals(Handler())


Builder :
  Gtk.Builder 
方法：
  
    add_from_file(filename)

        Loads and parses the given file and merges it with the current contents of builder.

    add_from_string(string)

        Parses the given string and merges it with the current contents of builder..

    add_objects_from_file(filename, object_ids)

        Same as Gtk.Builder.add_from_file(), but loads only the objects with the ids given in the object_ids list.

    add_objects_from_string(filename, object_ids)

        Same as Gtk.Builder.add_from_string(), but loads only the objects with the ids given in the object_ids list.

    get_object(object_id)

        Retrieves the widget with the id object_id from the loaded objects in the builder.

    get_objects()

        Returns all loaded objects.

    connect_signals(handler_object)

        Connects the signals to the methods given in the handler_object. The handler_object can be any object which contains keys or attributes that are called like the signal handler names given in the interface description, e.g. a class or a dict.





GObject:
  这是gtk+的核心， 通过它可以自定义object, 创建自定义属性和自定义事件，比较高级，以后再研究




Pango文本处理:

Pango:
  import :    from gi.repository import Gtk,Gdk,Pango


修改label字体:
  fontdesc=Pango.FontDescription("Purisa 14")
  label.modify_font(fontdesc)


获得所有字体：
context=self.create_pango_context()
self.fam=context.list_families()
for ff in self.fam:
	print ff.get_name()

估计pango使用方式已经变化,使用类似html的标记来处理。
优先是方便简单，不用记忆太多。

例子：
label.set_markup("<span font_size='large' foreground='#ff00ff'><i>Hello     中文</i></span>")

可用的标签：
b   Bold
big   Makes font relatively larger, equivalent to <span size="larger">
i   Italic
s    Strikethrough
sub   Subscript
sup   Superscript
small Makes font relatively smaller, equivalent to <span size="smaller">
tt   Monospace font
u   Underline 

span 万能标签， 也只有这个标签才能放置各种属性，通过属性修改字体
span属性：

1，font[1], font_desc
	A font description string, such as "Sans Italic 12". See pango_font_description_from_string() for a description of the format of the string representation . Note that any other span attributes will override this description. So if you have "Sans Italic" and also a style="normal" attribute, you will get Sans normal, not italic.

2，font_family, face   A font family name
3， font_size[1], size
Font size in 1024ths of a point, or one of the absolute sizes 'xx-small', 'x-small', 'small', 'medium', 'large', 'x-large', 'xx-large', or one of the relative sizes 'smaller' or 'larger'. If you want to specify a absolute size, it's usually easier to take advantage of the ability to specify a partial font description using 'font'; you can use font='12.5' rather than size='12800'.
4，font_style[1], style
One of 'normal', 'oblique', 'italic'
5，font_weight[1], weight
One of 'ultralight', 'light', 'normal', 'bold', 'ultrabold', 'heavy', or a numeric weight
6，font_variant[1], variant
One of 'normal' or 'smallcaps'
7，font_stretch[1], stretch
One of 'ultracondensed', 'extracondensed', 'condensed', 'semicondensed', 'normal', 'semiexpanded', 'expanded', 'extraexpanded', 'ultraexpanded'

8，foreground, fgcolor[1], color
An RGB color specification such as '#00FF00' or a color name such as 'red'

9，background, bgcolor[1]
An RGB color specification such as '#00FF00' or a color name such as 'red'
10，underline            One of 'none', 'single', 'double', 'low', 'error'
11，underline_color    The color of underlines; an RGB color specification such as '#00FF00' or a color name such as 'red'
12，rise                  Vertical displacement, in Pango units. Can be negative for subscript, positive for superscript.
13，strikethrough         'true' or 'false' whether to strike through the text
14，strikethrough_color    The color of strikethrough lines; an RGB color specification such as '#00FF00' or a color name such as 'red'
15，fallback         'true' or 'false' whether to enable fallback. If disabled, then characters will only be used from the closest matching font on the system. No fallback will be done to other fonts on the system that might contain the characters in the text. Fallback is enabled by default. Most applications should not disable fallback.
16，lang             A language code, indicating the text language
letter_spacing   Inter-letter spacing in 1024ths of a point.
17，gravity          One of 'south', 'east', 'north', 'west', 'auto'.
18，gravity_hint     One of 'natural', 'strong', 'line'. 


cairo图形显示:
Cairo:
  import: from gi.repository import Gtk,Gdk,Pango,cairo
  
   创建一个绘图区域：
        self.darea=Gtk.DrawingArea()
      self.darea.set_size_request(300,300) //要设置尺寸，不然什么也看不到
      self.darea.connect("draw",self.expose) //绑定事件，需要在事件中绘画，现在不能直接绘画
  
  
      fixed.put(self.darea,10,10)

  绘图事件： 
     def expose(self,widget,cr): //cr是可以用来绘画的对象
  这个函数会被调用许多次，所以要尽量优化，
        

cr.set_line_width(9)  
cr.set_source_rgb(0.7, 0.2, 0.0，1)  //设置当前颜色，最后一个数字是透明度 , 0.0 - 1.0


cr.translate(220, 180) //坐标转换,类似 opengl
cr.rotate(i*math.pi/36) //旋转
cr.arc(0, 0, 50, 0, 2*math.pi)  //画弧线
cr.stroke_preserve()  //不清楚
cr.fill() //填充


cr.rectangle(20, 20, 120, 80)  //矩形




cr.scale(1, 0.7)  //对园进行缩放，就是椭圆



cr.select_font_face("Purisa", cairo.FONT_SLANT_NORMAL,
cairo.FONT_WEIGHT_NORMAL) //设置字体
cr.set_font_size(13)  //设置字体大小
cr.move_to(20, 30)  //移动  笔 到  某位置
cr.show_text("Most relationships seem so transitory")  //绘制文本



梯度： 设置渐变
 lg3 = cairo.LinearGradient(20.0, 260.0, 20.0, 360.0)
lg3.add_color_stop_rgba(0.1, 0, 0, 0, 1)
lg3.add_color_stop_rgba(0.5, 1, 1, 0, 1)
lg3.add_color_stop_rgba(0.9, 0, 0, 0, 1)
cr.rectangle(20, 260, 300, 100)
cr.set_source(lg3)
cr.fill(


反射： 
  类似倒影
cr.set_source_surface(self.surface, self.border, self.border)
cr.paint()
alpha = 0.7
step = 1.0 / self.imageHeight
cr.translate(0, 2

键盘事件：
  self.board = Board()
self.connect("key-press-event", self.on_key_down)
self.add(self.board)
self.connect("destroy", gtk.main_quit)
self.show_all()
def on_key_down(self, widget, event):
key = event.keyval
self.board.on_key_down(event)



自定义控件:
  class Burning(gtk.DrawingArea):
 可以通过覆盖  __init__ 方法来重写，
 DrawingArea的核心方法是  绘制， 
需要绑定   draw 事件， 在相应方法中绘制图形
这样就能实现自定义的控件了
  def __init__(self, parent):


==================未知========================
事件：
  发射事件
  禁止发射事件




子窗口？

Container 基础类： 被box等继承
  class gtk.Container(gtk.Widget):
    def set_border_width(border_width)

    def get_border_width()

    def add(widget)

    def remove(widget)

    def set_resize_mode(resize_mode)

    def get_resize_mode()

    def check_resize()

    def forall(callback, callback_data)

    def foreach(callback, callback_data)

    def get_children()   //返回所有子元素的列表，应该仅包含第一层

    def propagate_expose(child, event)

    def set_focus_chain(focusable_widgets)

    def get_focus_chain()

    def unset_focus_chain()

    def set_reallocate_redraws(needs_redraws)

    def set_focus_child(child)

    def get_focus_child()

    def set_focus_vadjustment(adjustment)

    def get_focus_vadjustment()

    def set_focus_hadjustment(adjustment)

    def get_focus_hadjustment()

    def resize_children()

    def child_type()

    def add_with_properties(widget, first_prop_name, first_prop_value, ...)

    def child_set(child, first_prop_name, first_prop_value, ...)

    def child_get(child, first_prop_name, ...)

    def child_set_property(child, property_name, value)

    def child_get_property(child, property_name)

Class Methods
    def install_child_property(property_id, pspec)

    def list_child_properties()

Functions
    def gtk.container_class_install_child_property(klass, property_id, pspec)

    def gtk.container_class_list_child_properties(klass)
Layout: 



  boxes,fixed,paned,icon view,layouts
menu shells,notebooks , sockets, tables, text views ,toolbars 
tree views


expander布局
handlebox
notebooks
   append_page
    set_tab_pos

   insert_page
   set_show_tabs
    set_scrollable

  remove_page
   set_current_page

stock image button 
  gtk_button_new_from_stock (GTK_STOCK_CLOSE);


gtk_widget_set_sensitive (flags, FALSE);

radio_buttons
  radio1 = gtk_radio_button_new_with_label (NULL, "I want to be clicked!");
radio2 = gtk_radio_button_new_with_label_from_widget (GTK_RADIO_BUTTON (radio1),
"Click me instead!");
radio3 = gtk_radio_button_new_with_label_from_widget (GTK_RADIO_BUTTON (radio1),


密码文本
gtk_entry_set_visibility (GTK_ENTRY (pass), FALSE);
gtk_entry_set_invisible_char (GTK_ENTRY (pass), '*');

文本属性
  _set_editable (
 void gtk_entry_set_max_length (GtkEntry *entry,
void gtk_editable_insert_text (GtkEditable *editable,
const gchar *text,
gint length_of_text,
gint *position);


void gtk_editable_delete_text (GtkEditable *editable,
gint start_pos,
gint end_pos);
void gtk_editable_select_region (GtkEditable *editable,
gint start_pos,
gint end_pos);
Once you are able to select text, it would be useful to be a
void gtk_editable_delete_selection (GtkEditable *editable);
In addition to retrieving the whole textual content of the widget, it is p

gchar* gtk_editable_get_chars (GtkEditable *editable,
gint start_pos,
gint end_pos);
The following three functions perform various clip


void gtk_editable_cut_clipboard (GtkEditable *editable);
void gtk_editable_copy_clipboard (GtkEditable *editable);
void gtk_editable_paste_clipboard (GtkEditable *editable);


Spin Button:
 spin_int = gtk_spin_button_new (integer, 1.0, 0);
  spin_float = gtk_spin_button_new (float_pt, 0.1, 1);


H V Scale 横向竖向数值条
方向按钮

splash窗口


对话框：
 parent :
	the transient parent, or None if none

flags :
	the dialog flags - a combination of: gtk.DIALOG_MODAL, gtk.DIALOG_DESTROY_WITH_PARENT or 0 for no flags

type :
	the type of message: gtk.MESSAGE_INFO, gtk.MESSAGE_WARNING, gtk.MESSAGE_QUESTION or gtk.MESSAGE_ERROR.

buttons :
	the predefined set of buttons to use: gtk.BUTTONS_NONE, gtk.BUTTONS_OK, gtk.BUTTONS_CLOSE, gtk.BUTTONS_CANCEL, gtk.BUTTONS_YES_NO, gtk.BUTTONS_OK_CANCEL

  创建  内置对话框
 Gtk.MessageType.ERROR INFO,ERROR,WARNING,SUCCESS,MESSAGE，ABOUT 

    dialog=Gtk.MessageDialog(type=Gtk.MessageType.ERROR, buttons=Gtk.ButtonsType.OK)
     dialog.set_markup(text)     
     dialog.run()
     dialog.destroy()




 GtkAssistant 多页对话框
  

Gtk IMAGE

 
无边框窗口 （创建窗口，参数用 GTK_WINDOW_POPUP)

动画实现？

GtkScrollWindow  控件

viewport

textview : 富文本编辑器

1, create new textview
2, get buffer  from textview textview = gtk_text_view_new ();
gtk_widget_modify_font (textview, font);
gtk_text_view_set_wrap_mode (GTK_TEXT_VIEW (textview), GTK_WRAP_WORD);
gtk_text_view_set_justification (GTK_TEXT_VIEW (textview), GTK_JUSTIFY_RIGHT);
gtk_text_view_set_editable (GTK_TEXT_VIEW (textview), TRUE);
gtk_text_view_set_cursor_visible (GTK_TEXT_VIEW (textview), TRUE);
gtk_text_view_set_pixels_above_lines (GTK_TEXT_VIEW (textview), 5);GtkLayout
gtk_text_view_set_pixels_below_lines (GTK_TEXT_VIEW (textview), 5);
gtk_text_view_set_pixels_inside_wrap (GTK_TEXT_VIEW (textview), 5);
gtk_text_view_set_left_margin (GTK_TEXT_VIEW (textview), 10);
gtk_text_view_set_right_margin (GTK_TEXT_VIEW (textview), 10);
buffer = gtk_text_view_get_buffer (GTK_TEXT_VIEW (textview));
gtk_text_buffer_set_text (buffer, "This is some text!\nChange me!\nPlease!", -1);

可以把textview加入到  scrollwindow, 就可以实现滚动了

状态栏

动态增加菜单， 删除菜单？
optin_menu菜单

menu_pop 弹出菜单


按钮盒：
  buttonBox
 继承自 box, 拥有和box一样的方法，
扩展方法：
  set_layout(STYLE) //Gtk.ButtonBoxStyle.SPREAD,EDGE,START,END
 get_layout()
get_child_secondary(child)
set_child_secondary(child,is_secondary)

纵横比frame:
  变化尺寸时，保持纵横比
     gtk.AspectFrame(label=None, xalign=0.5, yalign=0.5, ratio=1.0, obey_child=True)

//xalign,yalign (0.0-1.0）
 //ratio 横纵比系数
//obey_child 子控件是否受约束
    def set(xalign=0.0, yalign=0.0, ratio=1.0, obey_child=True)


事件盒
  event_box
  为本来没有事件的对象提供事件

  1, 创建事件盒
  2， 绑定事件到事件盒
  3， 把对象加入到事件盒 ， 事件盒.add(child)


Gtk.ComboBox:
  set_popdown_strings;
可能用来显示下拉列表

键盘事件：
  key_press_event:
   keyval表示键


Pixbuf
PixbufAnimation
Pixbufloader
Pixmap


Gtk.Panel:
  类似 html frame， 但是可拖动，改变尺寸
1， 选择垂直或者水平，
2， 可以添加两个元素

多窗口：
  创建新窗口，然后显示？



  box.remove(child) //delete child element







label,button.. 
  set_alignment(X,Y)  //left (0,1), right(1,1)
set_padding(xpad,ypad)



menu: 
  menubar -> add menuitem 
  menuitem -> set_submenu  

  menu -> add menuitem
  
  
  
  HOME目录仿照linux 目录

把一个用户当成一个整体， 
所有会一样有 tmp/  var/log 等目录，  config/ =  etc/


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

  