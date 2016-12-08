
  # Zend version

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:32:09 


      None


      <p>
      功能：  
 1， 获取当前version
  Zend\Version\Version::VERSION  
 2,比较版本和当前版本的高低
  return   （-1, 0 or 1 ）  
   $cmp = Zend\Version\Version::compareVersion(’2.0.0’);  
 3, 获取当前最高版本
  echo Zend\Version\Version::getLatest();  

  这个功能需要允许网络连接，会去github 或 zend 官网 尝试获取结果


      </p>

  