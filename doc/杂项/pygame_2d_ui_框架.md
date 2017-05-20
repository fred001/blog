
  # pygame_2d_ui_框架

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:03:17 


      None


      <p>
      PYGAME_2D_UI_框架

Pygame 2d ui 框架设计
包含内容：
渲染
  元素
  布局
事件：
  监听事件 ->  寻找对应元素  -> 分配事件给元素
 

 


 
事件接口：
 on_quit,on_keyup,on_keydown 等等


 
例子： 一个文本输入框：
 textinput=Textinput()
 put(screen,textinput,(10,10))


 
 function set_title: 控制元素的行为
  if  textinput.on_keydown:
   if key = ENTER
   print textinput.value

   self.window.set_title(textinput.value)


 
有一个全局的对象控制所有元素的行为， 当事件在元素身上发生后，首先交给元素，
最后直接转发给该对象 （controller)


 


 
最后先了解几个其他UI设计的思路，不要完全自己想，比较累，
也许别人有可取之处


      </p>

  