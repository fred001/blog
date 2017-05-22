
  # Frd框架文档--App

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:06:29 


      None


      <p>
      APP

Frd_App
作者：  李歌之
版本： 20141013-1
创建时间： 2014年10月13日


 
 Frd_App 中的App指整个项目（project)，但是为了方便，使用App（字符数少）。一个 App包含若干个 Module,App是Module们共同的上层对象。
必须存在一个函数  app() 获取这个 App对象。
 App提供了一系列的方法以供全局调用，并支持编写自己的App ，（extends Frd_App) 来扩展和继承方法。
 App默认包含以下方法：


 
__construct($setting)  
getSetting($k,$default=null)


 
  registerPlugin($name,$function)  
  setBaseurl($baseurl)  


 
  getRoute()  


 
  getGlobal($key,$default=null)  
  hasGlobal($key)  
  setGlobal($key,$value)  


 
  addDb($name,$config)  
  getDb($name='default')  


 
  getModule($name)  
   
  
  setConfig($key,$value)  
  getConfig($key,$default=null)  
  setConfigs($data)  
  getConfigs()  


 
  startSession()  
  setSession($k,$v)  
  getSession($k,$default=null)  
  hasSession()  
  deleteSession()  
  clearSession()  


 
  &getSessionNamespace($k=false)  


 
  initUserSession()  
  setUserSession($k,$v)  
  getUserSession($k,$default=null)  
  hasUserSession($k)  
  deleteUserSession($k)  
  clearUserSession($k)  


 
    
  run($url_path=false)  


 
  url($path,$params=array())  


 
  pathToUrl($path)  
  urlToPath($url)


 

 


      </p>

  