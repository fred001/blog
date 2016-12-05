
  # PHP_filter_and_validation

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:52:17 


      None


      <p>
      PHP FILTER AND VALIDATION
PHP filter and validation  functions:

http://www.php.net/manual/en/intro.filter.php

filter 支持两种方式，1, 不修改原值， 2 修改原值，适应需要的类型

对单个值:  filter_var(VALUE,FILTER_TYPE,array(
 options=>array(
  key=>value,
...
     ),
flags=>FILTER_FLAG (not array)
))

失败返回  false,成功返回处理（可能不处理） 的值 （不是返回true)

validation 同样使用filter 函数。

filter_array()可以处理数组，没仔细研究，可能跟filter_var类似

      </p>

  