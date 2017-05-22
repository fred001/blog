
  # php  命名空间

      version:  2
      created_at:  2016-08-01
      updated_at:  2016-08-01 15:30:50

      None

      None


      <p>
      特点是用来给 文件中的类，接口，函数，常量组合在一起。

必须定义在顶部：
namespace test
class Test

其它文件调用此：
$t=\test\Test();

或者 
use test //这里不需要用完全限定名！
$t=test\Test();


psr4 自动载入机制：
http://www.php-fig.org/psr/psr-4/
http://www.php-fig.org/psr/psr-4/examples/

1，_ 没有特殊意义
2， 以namespace 替代目录
3， 目录存在于namespace中
4， 类名仅仅代表一个文件，不再像zend1 一样代表一个路径

yii中的方式是 
 namespace/namespace2/ClassPart2Part3.php



      </p>

  