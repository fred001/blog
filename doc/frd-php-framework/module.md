frd module 是一个自创的概念，为了实现一种更高层次的代码组织方式，以应对更加复杂的代码。
  一个 frd module相当于一个网站，frd module内部的所有文件都可以访问本module
    并通过本module获取其他元素
      不支持子module,原因在于导致过分的复杂
        不支持多module，理由是多module的依赖和次序也导致过分的复杂

        frd module是不同于其它框架的特别功能。基于避免过分复杂的考虑，一个module相当于一个网站。 不支持多module,也不支持子module. 
          module有基本的目录结构。  module位于   module目录之下， 并有自己的名字，例如  module/default (default 即是名字) 
    module的核心文件是 目录之下的  main.php 。 此文件必须是一个类，并继承 Frd_Module. 基本的代码是  
      class Default extends Frd_Module
        {
            }

frd module 需求一种固定的目录结构：


//此文件应当包含一个类，此类是此module的名字和module其它文件的前缀。
//并且此类的方法是module的接口或公用方法
//有此文件和类是一个module最小的配置。
module/main.php  
module目录还可以增加其它目录，目录有两种格式
纯小写（如 templates) 和首字母大写(如 Table)
  首字母大写的目录必须存放类文件，格式同自动载入机制所支持的类文件一致。
  比如 module/Table/Blog.php (class MODULE_TABLE_Blog)
  $blog=$module->getTable("blog");

  纯小写的目录可以存放任何内容，通过 $module->getPath(PATH) 来获得文件路径，进一步使用由用户自定义。
  module/abc/test.php

  echo $module->getPath("abc/test.php");

  显然有些目录是被使用了，无法创建，其中包含：
    Path,Class,Name

    其它则随意使用。
    另外也默认设置了一些目录：  controller,templates,Object,Table

    module内部的文件，类如何获得 此 $module 对象？
      对于文件载入，通过 $_module ,对于类对象， 通过 $this->module








          
        
