# 自动载入机制


1. 核心添加autoload入口
 framework/YiiBase.php
  856 spl_autoload_register(array('YiiBase','autoload'));

  其中的registerAutoloader 是没有用过的,容易误解


2. 核心代码 
  YiiBase::autoload

      self::$classMap[$className])
      self::$_coreClasses[$className])
      接下来会去  include_path 寻找
      还有根据命名空间查找

      




