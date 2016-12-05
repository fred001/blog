
  # -php--zf2--内部类--Captcha

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:33:50 


      None


      <p>
      CAPTCHA

Captcha

 
实现验证码机制， 估计可以和数据库绑定

 
// Originating request:  
$captcha = new Zend\Captcha\Figlet(array(  
    'name' => 'foo',  
    'wordLen' => 6,  
    'timeout' => 300,  
));  

 
$id = $captcha->generate();  

 
//this will output a Figlet string  
echo $captcha->getFiglet()->render($captcha->getWord());  


      </p>

  