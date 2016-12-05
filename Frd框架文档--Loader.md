
  # Frd框架文档--Loader

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:07:31 


      None


      <p>
      LOADER

Loader


 
核心功能之一  
通过注册autoload, 实现避免手动require


 
背景知识：
类文件的格式为：    Aa/Bb/Cc.php 不需要命名空间
用法：
 $loader=new Frd_Loader();
 $loader->addPath(PATH)
 $loader->addPaths($array)
 $loader->autoload();


      </p>

  