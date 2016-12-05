
  # web开发--1_code_style

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:51:50 


      None


      <p>
      1_CODE_STYLE
code style
---------------------

code beautiful
===================
* /* */ comment only on top of  file
   do not use it in  head of  function
   /*
   */
   function test()
   {
   }
   
   reason:   that cause can not comment 2+ functions at once !
   but  in function , if it is necessary use  /* */ to comment  many lines of code, 
   it is ok . 
   use  // for  normal  comment .
   
* no tab, use space
* { in new line is more clean
  { in same line is more short
  both accept,depends your goal

* }else{ is not good, 
  seems it from K&R style
  but in today  i do not think it is good.
   
   e.g: 
  if ($type == 'video'){
      pass
  }else if($type == "photo"){
     if($count == 1){
      }else if ($count ==2 ){
          pass
      }
  }
  
  i can not take a look and understand what this code will do .
  i guess the problem is this style  can not  find all  blocks  at once.
  first should  find the  "else if" , then find  it's  correct  "}"
  and between these block find the   next  if/else if block.
  
  the second problem is:
   now most editor have  hightlight  function,
   when cursor in  "{", the  "}" will  hightlight with the  "{"
   for this style , you should move  cursor to then end, then this function can work.
   
   for php this has another problem:
     //if($type == 'vidoe')
     {
     }
  
   comment the if for  debug is not possible.( { ... } do not effect variables, not like in c )
   
*  others i  think not so important
  like    if($type[SPACE]==[SPACE]'video')
     if($type=='video') is also accept, will not cause problem.
  i do not understand why  somes write it as serious rule, and seems in jlint, will also check this ....
   it  for complicated  code    , if($value=in_array($v,array('a','b','c')))
    space is necessary , make it  more clean
    but for simple  code, that's no diffience.
    
    if you really like this, you can create script for handle this.
    
*  Principles:
   1,   try best to make code easy understand,  code style should not  effect this .
        so   }else{ is not good,  it cause can not find all  code blocks at once.
    2,  use  space,  space line  make code more clean.
    3,  increment  machine performance  is easy,  only need money.
         but increment  developer performance  is not easy , 
          reduce  developer work is very important, 
          so i do not think  for simple code should also take care of  SPACE.
          
    4,   one rule i really do not understand .. 
        
       $arr=array(
            'value1 ddfae afeafeaw'              //  value1
            'valu2'                                       //  value2
       );
        
      the rule is make   the  2 comments  start at the same   column .
       we are humen , not machine, we can  of cause  understand  not formatted strings
       like this , will take much times to  add enough SPACE, 
       and if key changed,  should also add enough  SPACE, 
       not good. 
       
       just   use 
        $arr=array(
            'value1 ddfae afeafeaw'   //  value1
            'valu2'    //  value2
       );
       is ok.
       do not take much times for format code, this is the most not important !
        and it should be   scripts 's job .
        
        
   5,    these are php  code styles:

 //first  character uppercase) 
 //use _  as split  , for class)
 class Test_App
 {
  // test all 
  function testAll()
  {
           $test_success=true;  
  }
}     
       
variable name
===================
  this is more important then code beautiful. 
  
  * normally use full name for variable 
     so it is  test_success, not test_suc 
  *  special  word use  uppercase 
    function   getIP 
   
comment
==================
* comment for necessary, try best to self explain of code.
not use comment to explain the code.
comment is short explain some important points.
for more detaill explain,  use  DOCUMENT.

* for functions,  the function name should  explain it's function.
e.g. 
//get value 
function getValue()

the  //get value is not necessary

* comment is for developer , who already understant the code function;
   and only for  some  which  will easy cause error if not understand.
   
document
==================
this is not easy.  i found the UML  not good for explain code.
it do not have  level,  a class's methods   in the same level
but of cause the methods have levels,  
some is first level,  some is second level, 
the first level methods can call  second level  methods  and so on.
and  maybe have several  core methods, which is the core functions of the class.




 
    
      
       
       
        
        
  

      </p>

  