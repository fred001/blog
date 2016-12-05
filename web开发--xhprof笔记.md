
  # web开发--xhprof笔记

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:58:16 


      None


      <p>
      XHPROF笔记
  在线运行的性能记录模块。 低性能消耗和够用的功能。
  
  安装    yum install xhprof php-pecl-xhprof
  yum install grahpviz php-pear-Image-GraphViz  //图形显示用的模块
  
  
  安装后得到      xhprof 模块 (apache), 
   xhprof_html, xhprof_lib 两个目录 （在apache的 xhprof 配置中）
   默认是：  /usr/share/xhprof/*
   
     基本使用      xhprof_enable();
   $result=xhprof_disable();
   var_dump($result);  //简略的结果输出
   
   
   记录结果并
web界面显示     include_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_lib.php";
   include_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_runs.php";
	
   $xhprof_runs = new XHProfRuns_Default();
   $run_id = $xhprof_runs->save_run($xhprof_data, "xhprof_foo");
   
   
   
   访问web界面
    默认安装到： 127.0.0.1/xhprof (在xhprof 配置文件中）
http://<xhprof-ui-address >/index.php?run=$run_id&source=xhprof_foo


  结果解释
    ct 函数调用次数，
wt 花费的时间，
cpu 花费的 CPU 时间(微秒即百万分之一秒)，xhprof_enable 参数
mu 使用的内存(bytes)，
pmu 使用的内存峰值(bytes)。


xhprof_enable参数

XHPROF_FLAGS_CPU 分析结果中添加 CPU 数据
XHPROF_FLAGS_MEMORY 分析结果中添加内存数据
XHPROF_FLAGS_NO_BUILTINS 跳过 PHP 内置函数

xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
xhprof_enable(XHPROF_FLAGS_NO_BUILTINS | XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);


注意：
 CPU的计时器（ getrusage ）在Linux上开销很大。为了在函数级别更有用，这个是粗粒度的（毫秒精确度，而不是微秒水平）。因此，使用XHPROF_FLAGS_CPU模式时，在报告里，数字上的误差往往会更高。

我们建议在生产环境中使用 "占用时间+内存" 来做性能分析。[注：内存性能分析模式的额外开销很低。 ]


// elapsed time profiling (default) + memory profiling
  xhprof_enable(XHPROF_FLAGS_MEMORY);
  
  
  
  采样模式函数
    xhprof_sample_enable()
 xhprof_sample_disable()
 
 
 
 
 高级用法
    修改保存目的地：  
    使用这个实必须实现iXHProfRuns （ ）接口。
高级：您还需要修改“xhprof_html/"目录中3个主要的PHP入口文件（index.php ， callgraph.php ， typeahead.php ），使用新的类而不是默认的类XHProfRuns_Default 。改变3个文件的这一行:

$xhprof_runs_impl = new XHProfRuns_Default();

您还需要“include”声明了上述class的文件。
  忽略特定函数列别



1， 高级查看方式：


     一）看单一运行报告

要查看run id是<run_id>和命名空间是<namespace>的报告，访问URL：
http://<xhprof-ui-address>/index.php?run=<run_id>&source=<namespace>
例如，
http://<xhprof-ui-address>/index.php?run=49bafaa3a3f66&source=xhprof_foo

二）查看diff报告
要查看命名空间<namespace>下runid分别是< run_id1>和<run_id2>的两个报告，访问URL：
http://<xhprof-ui-address>/index.php?run1=<run_id1>&run2=<run_id2>&source=<namespace>

三）汇总报告
您也可以指定一组run id来汇总得到您想要的报告视图。
如果你有三个XHProf运行，都在"benchmark‘命名空间下,run id分别是1，2，3。要查看这些运行的汇总报告:
http://<xhprof-ui-address>/index.php?run=1,2,3&source=benchmark
加权汇总 ：进一步假设，上述3个运特分别对应三种程序,p1.php,p2.php和p3.php ，通常以20％,30%,50％概率混合:要查看汇总报告所对应的加权平均数这些运行使用：
http://<xhprof-ui-address>/index.php?run=1,2,3&wts=20,30,50&source=benchmark 

      </p>

  