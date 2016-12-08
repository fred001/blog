
  # wxpython

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:28:03 


      None


      <p>
      frame居中：
	FRAME.Center()

StaticText 修改文本：
	StaticText.SetLabel()   

打开文件：
	比较麻烦，因为不知道具体的后缀名对应什么打开文件，gnome等桌面环境可以判断，因为有记录和默认值
	但是在wxpython中则不知道，暂时想到只能也记录下默认打开文件的命令，然后根据后缀进行识别
	如果有桌面环境的shell命令，如gnome-open 之类，可以尝试调用之，但是gnome-open已经不存在了


绑定事件到对象：
	对象.Bind(事件，方法）#这种方法比较可靠，另外一种依靠指定source的方法不太可靠
	EVT_SET_FOCUS ，EVT_KILL_FOCUS, 分别对应focus和blur 事件

隐藏显示对象：
	对象.Hide() 对象.Show()

EVT_LEFT_DOWN: 是鼠标左键点击事件，没有特别指出MOUSE

光点击panel,不会使textctrl失去焦点，这点有点麻烦,设置panel,button focus,都不会使textctrl失去焦点，但是设置另外一个textctrl焦点才行
      </p>

  