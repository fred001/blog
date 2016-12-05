
模板用来渲染html,css,js等内容，并且支持子模板。
但是主模板和子模板的变量并不通用。 这和 smarty 不同。
默认模板的文件均以 .phtml结尾。

使用方式：
  $t=new Frd_Template();
    echo $t->render("test",array("name"=>"framework"); #模板不需要带 .phtml 后缀。 
      
      模板里面同样可以使用  $this->name 来获得值。
        并且可以调用  echo $this->render(PATH,PARAMS) 来进一步渲染子模板

          


