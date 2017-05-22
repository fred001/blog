
  # php--zf2--内部类--Crypt

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:33:24 


      None


      <p>
      CRYPT
Crypt

 
加密方法支持：
 bcrypt
 apache password

 

 

 

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
|| 点击这里 || 点击这里 ||
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 234 || use Zend\Crypt\Password\Bcrypt;$bcrypt = new Bcrypt();$securePass = $bcrypt->create('user password'); ||
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

use Zend\Crypt\Password\Bcrypt;

$bcrypt = new Bcrypt();
$securePass = 'the stored bcrypt value';
$password = 'the password to check';

if ($bcrypt->verify($password, $securePass)) {
    echo "The password is correct! \n";
} else {
    echo "The password is NOT correct.\n";
} 
 


      </p>

  