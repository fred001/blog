  frd framework自动载入机制与zend framewor 1自动载入机制基本相同。
    一个类一个文件，类前缀是目录名。所有类存放在lib目录之下。
      比如类 Aaa_Bbb_Ccc 的位置是 lib/Aaa/Bbb/Ccc.php 。
        事实上可以支持多个lib目录， 比如 lib1,lib2 ... ，会逐个目录搜寻，但是暂时不考虑支持。
          
          lib/Frd/*  对应  Frd_* 对象 （Frd.php 例外,所以需要手动载入）
                      lib/Zend/*  对应 Zend_* 对象
                        
                        假设你有一系列的类，那么首先需要为它们起一个前缀名，以避免冲突。
                          假设前缀名是  Abc 。 然后将所有类存放在此目录中。
                            假设其中一个类是 Example,那么此类对应的文件是  Abc/Example.php 
                              类名需要替换成  Abc_Example
                                载入类直接通过 $example=new Abc_Example() 即可。
