
  # Frd框架文档--Template

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:06:18 


      None


      <p>
      TEMPLATE

Frd_Template


 

描述
提供了基本的模板功能，可以分离逻辑和表现
包括渲染 content和渲染template file两个功能，两者有略微不同， content中无法使用 $this->VAR 调用模板变量

功能
基本用法：
  $template=new Frd_Template();
渲染内容


 
  a:  
   $content="hello {name}";  
  echo $template->renderContent($content,array(  
    'name'=>"frd",  
  ));


 
 b:
 $content="hello {name.first}";
     echo $template->renderContent($content,array(  
     'name'=>array('first'=>"frd"),  
  ));  


 
2, render template file
 a, create template file same folder as test file
 ./test.phtml:
      hello <?php echo $this->name;?> your age is  <?php echo $age; ?>

 $template->assign(“name”,“frd”);
echo $template->render("test",array(  
    'age'=>"11",  
  ));
 //default template folder is current folder
 //default template extension is  phtml


 


 
3, change script folder:
  $template->setDir(dirname(__FILE__));  


 
4, use other extendsion template
echo $template->render("test2.js",array(  
    'name'=>"frd",  
  ));


 


 


 


 


 
Frd Template 功能：  


 
 3， 渲染子文件  
  ./test2.phtml
   <?php echo “test2”; ?>


 
   ./test.phtml
   <?php echo $this->render(“test2”); ?>  
   
 5，模板变量 ，
  有两种变量， 分别是 assign 和  render 中传递的
  前者通过 $this->NAME 访问，所有模板均共享
  后者直接通过 $NAME 访问，仅在当前模板可用


 
 6，模板与子模板关系  
  子模板和模板使用同一个 Frd_Template对象


 
问题：  循环中载入  
解决办法：  opcode cache  
template 检测：  name=> null ,是否不渲染，这是个问题
通过 array_key_exists 和property_exists替代 isset，解决了这个问题，  
这个功能在Multimedia/lib中，需要合并


 


      </p>

  