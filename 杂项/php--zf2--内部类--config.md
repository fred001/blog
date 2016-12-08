
  # php--zf2--内部类--config

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:36:58 


      None


      <p>
      CONFIG

Config


 
读取和操作配置文件
更改配置文件不知道怎么做， 没文档


 
支持格式： ini,xml,json,yaml


 
范例：
 $reader = new Zend\Config\Reader\Ini();  
 $data   = $reader->fromFile('/path/to/config.ini');  


 
 echo $data['webhost']  // prints "www.example.com"  
 echo $data['database']['params']['dbname'];  // prints "dbproduction"


      </p>

  