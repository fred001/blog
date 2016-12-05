
  # Zend Loader

      version:  1
      created_at:  2016-03-01
      updated_at:  None

      created at 2016-03-01 16:47:46 


      None


      <p>
      Zend Loader 分成三个部分 Loader, AutoLoader, PluginLoader

Loader:
	核心是三个方法 loadFile,loadClass,registerAutoload

	loadFile($filename, $dirs = null, $once = false)
	例子：  loadFile("Zend/View.php",array(PATH1,PATH2,...,true);
	假如提供了dirs ,则将 dirs中的目录加入到include path，然后载入文件
	最后若是提供了dirs,则将 include path 设置为当前目录， 这个代码不明白什么用处。

	loadClass($class, $dirs = null)
	与loadFile相似，最后调用 loadFIle($file,$dirs,true) 载入文件
	此方法还支持命名空间

	autoload
	调用loadClass实际载入

	registerAutoload($class = 'Zend_Loader', $enabled = true)
	若$class并非  Zend_loader, 则此类必须提供 autoload方法， 会将此类加入到autoload队列中
	若是zend_loader呢？  可能是默认已经包含进去了， 具体代码参见 zend_loader_autoloader

AutoLoader:
	核心是_construct 和 autoload方法
	支持多种autoload,代码有点复杂，不怎么清楚

	_construct
		注册本类的autoload方法为 autoload

	autoload
		获取所有的autoload方法，逐个尝试进行load, 支持 namespace , 类的对象， 纯函数
		

PluginLoader:
	包含两部分功能，一是增加插件的路径和类前缀对应，二是载入类（省略前缀，自动寻找文件获得正确的前缀）
	核心方法：
	 public function load($name, $throwExceptions = true)
	
	根据已经注册的路径寻找类，然后载入之
	但是为什么代码总显得特别难懂呢？



				
		


      </p>

  