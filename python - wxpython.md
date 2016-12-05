
  # python - wxpython

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:32:08 


      None


      <p>
      安装 ：  yum install wxPython
模块名 ：  wx 

类：  wx.App,  wx.Frame(parent=None,title=TITLE)
方法：
   wx.App:: OnInit(self),MainLoop()
  OnInit应该返回True, False会退出
   wx.Frame:: Show()
   
 运行流程：
    1， 创建 App, 
    2,  在 App的OnINit 里面创建 Frame, 并且 call Frame.Show()
    3, 实例化 App, 调用 MainLoop()
    
 
wx.Frame.__init__(self,parent=None,id=-1,title,pos=(-1,-1),size=(-1,-1),name="frame")
wx.Image(IMAGE,wx.BITMAP_TYPE_JPEG)
wx.StaticBitmap(parent,bitmap=MAP);
    
    
  通过继承 wx.Frame,修改 __init__方法，可以更大的控制frame
      </p>

  