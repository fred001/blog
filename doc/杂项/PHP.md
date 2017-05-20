
  # PHP

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:30:44 


      None


      <p>
      PHP5.3新增了一个叫做__invoke的魔术方法，这样在创建实例后，可以直接调用对象。

    class testClass
    {

    public function __invoke
    {
    print “hello world”;
    }
    }

    $n = new testClass;
    $n();

    执行结果为：

    hello world。


PHP函数

debug_trace:
	大约是获取当前堆栈的调用， 
	如果是直接调用这个函数，是没有内容的，因为堆栈上没东西
	如果这个函数在其他函数内被调用， 那么才有内容

      </p>

  