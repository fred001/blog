
  # python

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:49:37 


      None


      <p>
      PYTHON
文件字符宣称，以下都是合法的
	#-*- coding:utf8 -*-
	#-*- coding:utf-8 -*-
	#-*- coding:UTF8 -*-
	#-*- coding:UTF-8 -*-

获取当前文件的所在目录：
    6 print os.path.split(os.path.realpath(__file__))[0]

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~




基本类型:
  Number:
    10进制  1
    8进制   01
    16进制 0x1
  String:
    s1+s2   //合并
    s * 3   //重复
    s[i]    //索引
    s[i:j]  //分片

    ‘a %s’  % 'dd'  //格式
    for i in s: //迭代
    'm' in s //成员

    字符串格式代码： 
     s,c,d,i,u,o,x,e,E,f,g,G,X

List:
创建：  list=[]
增加 list.append(
修改 list[i]=..
删除  
  del list[i]
  del list[i:]
  list.remove(..)

合并
  list+list 
其它：
  list.sort()
  list.index
  list.reverse
  x in list //迭代


Tuple
  和 list基本相同，但是不能修改 

Dictionary
 创建   d={}
 增加   d[key]=value
 修改   d[key]=new_value
 删除   del  d[key]
 其它：
    d.keys()
    d.values()
    d.has_key()
    d.items()
    key in d

注意： 
  d 无次序

  无序
  for k,v in d.items()
    print k,v

  有序
  keys=d.keys()
  keys.sort()
  for k in keys:
    print  k,d[k]

文件：
打开 
  f=open(PATH,MODE) //MODE, r rw
读取
 f.read
 read(N)
 readline()
 readlines()  //读取所有行

写入
 f.write(S)
 writeline()
 writelines(L)

定位
  缺少

关闭
 f.close()



注意事项 ：
 
 
引用的问题：
  列表默认是引用的，
  l2=list1[:] 则是复制
  字符串操作

   str.strip()  //类似 php trim
   str.lstrip()
   str.rstrip()
   str=str.replace(REPLACE,NEW)
    
  str.split(STRING)  // 类似 php explode

索引：
 0,1,2...
 -3,-2,-1,:   //-1 后面是  :


============================
操作：
   /    // 1/2 =0  1/2.0=0.5
位操作
  <<  | & >> 

类型转换
  str
  list
  tuple
  int
  long
  float
  Complex
  hex //16进制
  oct   //8进度
  ord('A')
  char(65) 
  min(1,2,3,4)
  max([1,2,4,6])
===============================

内置工具：
 dir
 help


属性操作
  hasattr(obj,name)
  getattr(obj,name,[,default])
  setattr(obj,name,value)
  delattr(obj,name)

执行代码
  import
  exec code [in globaldict[,localdict]]
  compile(string,filename,kind)
  execfile(filename[,globaldict[,localdict]])
  eval(code[,globaldict[,localdict]])  //计算表达式 （=后面那个）整个是语句 



===============
函数作用域： LGB
   1 
  2 def outer(x):
  3   def inner(i):
  4     print i
  5     if i: inner(i-1)
  6     
  7   inner(x)
  8   
  9 outer(3)


这个函数在  《python入门》 中，是失败的的
但是在 python 2.7.5 中是正常的， 可能版本升级，对此有修改。
按照我的理解， def inner,就定义了一个在 outer 函数中的局部变量， 
inner中调用  inner时候， 本身作用域并不存在，于是去  outer寻找， 存在这个变量
加入outer不存在，会继续向上寻找


函数默认值在定义时保存
def saver(x=[]):
  x.append(1)
  print x

saver([2])  // [2,1]
saver()   //[1]
saver()   //[1,1]  仍然使用第一个创建的[]
saver()   //[1,1,]


模块：
  
模块的作用域
  LB  //模块本身和  build-in
  import 
  载入模块

from  ... import ...
  把模块中的属性，载入到当前命名空间中


reload
  只会重载本模块， 本模块 import的其它模块不会自动重载



访问模块中属性的方法 
M.name
M.__dict__['name']
sys.modules['M'].name
getattr(M,'name')

M.__dict__.keys()



类：
  class 和 def 都是赋值

  class 从语句开始向下逐步执行

  class Test:
    name='test'     //所有实例共享，通过self.data访问
    
    def __init__(self):
       self.name='test' 


  类有 __name__属性


  常用操作符重载方法
    __init__
    del  //析构
    add // +
    or  //  |
    repr  //打印
    call  //函数调用
    getattr  
    getitem  //索引   x[key]
    setitem  //索引赋值
    getslice //分片   x[1:2]
    len  //长度 len(x)
    cmp  //比较  x < y
    radd   //右边的操作符 +   ...+x





常用模块： 
string
method:
    atof()  //字符串转换成 float
    atoi(string[,base]) //转换成指定基(默认10）整数 atoi("10",10) ,atoi("10",8)
    atol(string[,base])

    capitalize(string)  //首字母大写
    capwords(string)  //每个单词首字母大写
    expandtabs(string,tabsize)  // 用指定的tab字符大小扩展string里的tab字符

    find(s,sub[,start[,end]])  没找到返回  -1
    rfind

    index(s,sub[,start[,end]]) //类似find, 没找到引发一场 ValueError
    rindex..

    count(s,sub[,start[,end]]) //返回sub出现的次数
    replace(str,old,new[,maxsplit]) 替换

    lower()
    upper() 
    split(s[,sep[,maxsplit]])
    join(wordlist[,sep[,maxsplit]])
    lstrip(s)
    rstrip(s)
    strip(s)
    swapCase(s) //大小写进行替换
    ljust(s,width) 
    rjust(s,width) //有对齐，返回字符宽度为width,不足填充空格
    center(s,width)

常量：
  digits   0123..9
  octdicts  0123..7
  hexdigits 012..f
  lowercase  abcde...z
  uppercase  ABC...Z
  letters  小写+大写字母
  whitespace   \t\n\r\v 所有空白字符



re模块
  特殊字符
  . ^ $ * + ? { [ ] \ | ( )
\d  匹配任何十进制数；它相当于类 [0-9]。
\D  匹配任何非数字字符；它相当于类 [^0-9]。
\s  匹配任何空白字符；它相当于类  [ \t\n\r\f\v]。
\S  匹配任何非空白字符；它相当于类 [^ \t\n\r\f\v]。
\w  匹配任何字母数字字符；它相当于类 [a-zA-Z0-9_]。
\W  匹配任何非字母数字字符；它相当于类 [^a-zA-Z0-9_]。


重复： 
  +  1-n
 ?  0 or 1
 * 0-n
{m,n}   m<=  <=n

  . ^ $ * + | \w（字母） \d(数字） tomato（匹配字符tomato)

在字符串前加个 "r" 反斜杠就不会被任何特殊方式处理
"\\\\section" =	r"\\section" 



pattern=re.compile(STRING)
   编译标志：
	DOTALL, S	使 . 匹配包括换行在内的所有字符
	IGNORECASE, I	使匹配对大小写不敏感
	LOCALE, L 	做本地化识别（locale-aware）匹配
	MULTILINE, M	多行匹配，影响 ^ 和 $
	VERBOSE, X	能够使用 REs 的 verbose 状态，使之被组织得更清晰易懂 


pattern方法：
  	match()	决定 RE 是否在字符串刚开始的位置匹配
	search()	扫描字符串，找到这个 RE 匹配的位置
	findall()	找到 RE 匹配的所有子串，并把它们作为一个列表返回
	finditer()	找到 RE 匹配的所有子串，并把它们作为一个迭代器返回 

匹配成功返回匹配对象， 失败返回None

匹配对象的方法：
	group()	返回被 RE 匹配的字符串
	start()	返回匹配开始的位置
	end()	返回匹配结束的位置
	span()	返回一个元组包含匹配 (开始,结束) 的位置 

更多参考
http://wiki.ubuntu.org.cn/Python%E6%AD%A3%E5%88%99%E8%A1%A8%E8%BE%BE%E5%BC%8F%E6%93%8D%E4%BD%9C%E6%8C%87%E5%8D%97


os模块：
  getcwd()  //返回当前路径
  listdir(path) //目录所有文件名
  chown(path,uid,guid)  //改变文件拥有者
  rename(srs,dest) 
  remove(path),unlink(path)
  mdkri(path[,mode])
  rmdir(path)
  system(command) //执行shell命令，返回 该命令的返回值
  symlink(src,dest) //创建src到dest的软链接文件
  link(src,dest) //创建硬链接


属性
  name  //操作系统名
  os.error 内部错误， 比如  os.rmdir(..) 产生错误
  try:
  os.rmdir(..)
  except os.error,value:
  print value // code+message

  os.envirn //环境变量

  curdir  //当前目录的字符   . 或者  : (mac)
  pardir  //父目录字符    ..   或者  :: (mac)
  sep      //路径分割符    /  \  :
  altsep   //  windows 上是  /  其它为None
  pathsep   // 分割路径的分割符，   :   ; (分号， windows)


os.path的函数
  split(path) //basepath + filepath
  basename(path)
  dirname(path)

  join(path,..)
  exists(path)  //是否路径存在
  expanduser(path)  //用用户名扩展变量  ~
  expandvars(path) // 返回环境变量值   os.path.expandvars("$HOME")
  isfile(path) 
  isdir(path)
  islink(path)
  ismount(path)
  normpath(path) //类似 realpath
  samefile(p,q)  //是否是同一个文件
  walk(p,visit,arg) //比较复杂。。


复制文件模块 shutil
  copyfile(src,dest)
  copymode(src,dest)
  copystat(src,dest)
  copy(src,dest)
  copy2(src,dest)
  copytree(src,dest,symlinks=0) 
  rmtree(path,ignore_errors=0,onerror=None)

urllib模块
  //data是参数，需要 urlencode ,
  //如果有 data, 是 GET 还是 POST ?
  urlopen(url[,data])  

  urlretrieve(url[,filename[,hook]])
  urlcleanup() //清除urlretrive使用的缓存区
  quote(string[,safe])  用%xx 替换特殊字符
  unquote(string)
  quote_plus(string[,safe]_ //类似 quote, 但是用 + 替换

  urlencode(dict) //编码成字符串，但是不知道urldecode在哪里，还有是否支持字符串

urlparse模块：
  //把url解析成5个部分，形成元组 ，（协议，网络位置，路径，参数，查询，段ID） 似乎没有端口，用户名,密码  
  urlparse(urlstring[,default_scheme[,allow_fragments]]) 

  urljoin(base,url[,allow_framents])  //合成一个 url


其它模块：
  sgmllib
  htmllib
  xmllib
  formatter
  rfc822
  mimetools
  binhex
  uu
  binascii
  xdrllib
  mimetypes
  base64
  quopri
  mailbox
  mimify


struct模块：  处理二进制


pdb 调式模块

pdb.run(...)
   内部命令
  break 代码
  next
list
where


字典 
  dict.copy() 复制字典

copy模块
  copy
  deepcopy

random模块
 choice(list) 随机一个列表

glob模块：
 glob //

tempfile 模块：
  tempfile.TemporaryFile()




request: 
  get 和 post 不同， 
  对于 urllib2.Request(URL,DATA)
  当有data, 自动变成post, 否则是get
  所以要get,得自己组装url

urllib:
   def request(url):
 14   import httplib2
 15 
 16   h=httplib2.Http()
 17   response,content=h.request(url)
 18 
 19   return content
 20   #print response['status']
 21   #print response['content-length']
 22   #print response['content-type']

这个例子不能用，不知道为啥， 反正无法 提交 数据， 无论是 get还是post
 import httplib2
>>> import urllib
>>> data = {'name': 'fred', 'address': '123 shady lane'}
>>> body = urllib.urlencode(data)
>>> body
'name=fred&address=123+shady+lane'
>>> h = httplib2.Http()
>>> resp, content = h.request("http://example.com", method="POST", body=body)


=-==========================
list[0:10:2]  //2= 步长
list[0:10:-2]  //步长负数， 从右往左提取

相同序列才能连接   +  ， list+string 不行

 22 records.sort(cmp=lambda x,y:cmp(float(x[9]),float(y[9]) ),reverse=True)

list.exend(list2)  // 相当于  list+=list2 ,但是效率更高
list.insert(index,value)  //插入一个值
list.pop()  //弹出最后一个值
list.pop(index) //指定某个值
list.remove(value) //移除一个值
list.reverse()  //反向
list.sort() 
 sort有三个可选参数
 cmp:  比较的函数
  key: 对每个值进行额外处理//  key=len 会计算每个值的长度，并用长度作比较,可以换成自定义函数
  reverse: 是否倒序   True or False

  join(str) //用str作为分割符，连接所有元素， 组成字符串

元组：
  1，2，3  //这样也算创建完成
 (1,)      //需要逗号


函数：
 cmp(x,y)
  len(seq)
list(seq)
max(args)
min(args)
reversed(seq)
sorted(seq)
tuple(seq)


字符串：
  %10f
%10.2f 
%.2f
%.*s  %(5,...   //*当成格式， 具体值是 5

%010.2f   //0开头表示不足之处0填充

%-10.2f   //标明左对齐
%+10.2f   //+标明符号


string.find(substr)  //返回索引或者 -1
lower()
upper()
replace(search,replace)
split(
strip() //去除空格，不能指定去除的符号
translate(table,new_value)  //table是maketrans制作成的转换表
maketrans(from,to) //创建转换表，  from中每个字母会被替换成to中相同位置的字母，
   返回的是替换后的表，有256长度

capwords(s[,seq])//使用s分割字符串， 使用capitalize将所有首字母大写，最后用sep join所有，形成字符串

s=string.Template('$x =1 ') //返回模版对象
s.substiute(x='slurm')  //替换变量  $x 替换成  slurm
s.substiute(d)  //用字典替换
 假如字符串需要 $ ,  用 $$

startwith(STR)
endwith(STR)


字典：
创建
 items=[('name','Gumby'),('age',42)]
 d=dict(items)
  d // age:42,name:Gumby 

2:
 d=dict(name='Gumby',age=42)

字典的键可以是任何类型
 
格式转换

"%(name)s"  , %d  //只要d中有这个name键，就会用相应的值替换 ,注意最后的那个 's' ,估计也适用其它格式

复杂的替换：
 template='''
  %(title)

%(name)


'''

print template % data  //这时就用 data里的值一一替换模版里的所有变量


d.clear()  //清除所有 d={} 不能清除，只是重新赋值， 所以其它值指向 这个字典的，不会受影响，但是clear却能真正清除

d.copy() //浅赋值 ， list可以通过  list[:] 赋值， d不行，只能用方法

{}.fromkeys(['name','age'],None) // {'age':None,'name':None}
d.get(KEY) //不存在时候不会出错，只返回None
d.items() //返回一个列表  ((k1,v1),(k2,v2))
d.iteritems() //返回迭代对象， 跟items类似，但是更高校
d.keys()
d.iterkeys()

d.pop('KEY') //获得值，删除值（在dict中）
d.popitem() //随机弹出一个值
d.setdefault('name',DEFAULT_VALUE) //比较奇特， 应该叫  getdefault(KEY,DEFAULT) 
d.update(d2)  //类似  d merge d2, d2优先
d.values()
d.itervalues()




序列解包

x,y,z=1,2,3
x,y=y,x

x  is y
x  is not y  //x, y不是相同的对象

x  in y
x  not in y  #x 不是 y的成员

assert 

range(0,10)
range(10)
xrange  //和range一样，但是一次仅仅创建一个数，适合 迭代的时候用


//并行迭代， zip把两个序列压缩成一个，他们的值是对应的
for name,age in zip(names,ages):
  print name, age


//迭代时候获得索引
for index,string in enumerate(strings):
  print index 


//奇特的 for .... else ,while .. else

for ...

else:
  ...//在循环中没有 break的时候执行， 



列表式推导

[结果元素   for循环1 for循环2   判断语句（true才增加值）]
scope={}
exec  'sqrt = 1'  in scope  //scope['sqrt'] 把结果存放在字典的命名空间中


value=eval(x*x,scope)  //以局部的命名空间中的 x 为值，计算结果， 不提供则使用当前命名空间的值

函数：
  def test():
     ' it is test func'  //文档字符串

  这个文档字符串会在  使用 help(test) 的时候显示

  def test(*params):
    print params
   test(1,2,3,4) // (1,2,3,4)
  
  def test(**params):
     print params
   
   test(x=1,y=2) // {x:1,y:2}


  def test(*args,**keds):
       print ..
   
  test(x,y,z,m=0,n=0) //可以不用管参数了

globals()['parameter']


filter(func,seq)  //返回函数为真的元素
reduce(func,seq[,initial])  // func(func(func(seq[0],seq[1],...)
sum(seq)  //返回seq中所有元素的和
apply(func[,args[,kwargs]]) //调用函数，可以提供参数


issubclass(A，B)   //A 是否是 B的子类

CLASS.__bases__  //类的基类

isinstance(A,B) //A 是否是B的实例

callable(object) //对象是否可调用
random.choice(sequence) //从序列中随机提取元素
type(object)  //返回对象类型


异常：

 raise Exception
 raise Exception(MSG)
 raise  ArithmeticError

 class CustomException(Exception):
    pass

 try:
  
  except (AError,BError,CError), e:
    print e


类：
  def B(A):
     def __Init__(self):
          super(B,self).__init__()

      def getSize(self,size):
          pass
      def setSize(self):
            pass
      size=property(getSize,setSize)


  b.size //直接就可以用了， 会自动调用 getSize和setSize方法


静态方法和类成员

__metaclass__ = type
class MyClass:

  @staticmethod
  def smeth():
     pass

  @classmethod
  def cmeth(cls):
      pass

迭代器：

class TestIterator:
  value=0
  def next(self):
    self.value+=1
    if self.value > 10: raise StopIteration
     return self.value

  def __iter__(self):
    return self


生成器：
  yield  比较难


iter(obj) //从可迭代的对象中获得迭代器
  


模块：
fileinput
  input([files[,inplace[,backup]]  //便于遍历多个输入流中的行
   filename  //返回当前文件的名称
    lineno()  //返回当前累计行署
filelineno() //返回当前文件行数
isfirstline() //检查当前行是否是文件的第一行
isstdin() //检查最后以行，是否来自sys.stdin
nextfile() //关闭当前文件，移动到下一个文件
cloase() //关闭序列


集合： 有交并等集合功能
  set(seq) 

堆： 包含一系列堆的函数

 heappush(heap.x)
 heappop(heap)
 heapify(heap)
 heapreplace(heap,x)
 nlargest(n,iter)
 nsmallest(n,iter)

双端队列：
  collections


time模块：
 localtime([secs]) //本地时间（本机时区设置）
  gmtime([secs])  //国际时间

 time() // 秒数
  sleep(secs) //暂停多少秒

strptime(string[,format]) 

mktime(tuple) //格式化  localtime或者 gmtime得到的元组,结果和 time()获得的一样，除了没有小数部分的值



random模块：
   random()  //返回 0<= n < 1 之间的实数
   getrandbits(n) //以长证书形式，返回n个随机位
 uniform(a,b) //返回随机实数  a<=n<b
randrange([start],stop,[step])  //返回这个range中的随机数
choice(seq) //从指定序列中，返回随机元素
shuffle(seq[,random]) //原地指定序列 seq
sample(seq,n)  //从序列中选择n个随机且独立的元素




pprint( ) //输出内容


shelve模块：  简单的文件数据库（存储字典）
 注意：  字典key必须是字符串

open(PATH)  //返回对象， 可以当成字典用
close()  //关闭并保存目前的值


re正则模块：
  比较难，以后学习

 compile(pattern[,flags])
 search(pattern,string[,flags])
 match(pattern,string[,flags])
 split(pattern,string[,maxsplit])
 findall(pattern,string)
 sub(pat,repl,string[,count=0])
escape(string)


其它有趣模块：
  functools:  通过部分参数， 调用函数
  difflib: 计算两个序列的相似程度
  hashlib:   计算字符串，文本的签名
 csv: csv文件读写
timeit,profile,trace:   代码性能测试
datetime:  更多 时间处理
itertools:  创建联合迭代器
logging:  日志
getopt,optparse:   命令行程序用的解析
cmd:  编写命令解释器


文件处理：
  file(path[,mode[,buffer]] 
  open(path[,mode[,buffer]]) // open是file的别名 
mode:  r ,w, a, b, +

// wench = 0 , offset> 0 从文件开头算 
//  wence=1  , offset 可以是正或者负， 从当前位置计算
//wence=2 , offset > 0 从文件结尾计算
seek(offset[,wence])  

tell() 返回当前位置


read()
readline(N) //读取1行的某几个字符
readline()
readlines()

write()
writelines()



数据库 -sqlite
  1， 命令行 
 sqlite3  PATH //进入交互模式
 命令 :  .tables  查看所有表
 select * from sqlite_master //查看所有表的具体信息
sqlite看起来能用sql,但是没有 describe ,show 等sql



python sqlite3模块

import sqlite3

sqlite3.connect(path) //其它参数  dsn, user,password,host,database
connect 返回的对象，有以下方法：
  close()
  commit()
 rollback()
cursor() //返回游标

游标的方法：
  callproc(name[,params])
close()
execute(oper[,params])
executemany(oper,pseq)
fetchone() //execute之后，就可以用 fetch系列函数
fetchall()
nextset()
setinputses(sizes)
setoutputsize(size[,col])

游标特性：
 description
 rowcount
arraysize


twistd 网络模块

tidy html残缺到完整智能处理

htmlparse 解析html

测试工具：
unitest
doctest


PyCheck
PyLInt
profile
pstats





ConfigParser 可以用来读取ini文件的内容，如果要更新的话要使用 SafeConfigParser. ConfigParse 具有下面一些函数:
读取

    read(filename) 直接读取ini文件内容
    readfp(fp) 可以读取一打开的文件
    sections() 得到所有的section，并以列表的形式返回
    options(sections) 得到某一个section的所有option
    get(section,option) 得到section中option的值，返回为string类型

写入

写入的话需要使用 SafeConfigParser, 因为这个类继承了ConfigParser的所有函数，
而且实现了下面的函数:
set( section, option, value) 对section中的option进行设置
ConfigParser 使用例子

from ConfigParser import SafeConfigParser
from StringIO import StringIO
 
f = StringIO()
scp = SafeConfigParser()
 
print '-'*20, ' following is write ini file part ', '-'*20
sections = ['s1','s2']
for s in sections:
    scp.add_section(s)
    scp.set(s,'option1','value1')
    scp.set(s,'option2','value2')
 
scp.write(f)
print f.getvalue()
 
print '-'*20, ' following is read ini file part ', '-'*20
f.seek(0)
scp2 = SafeConfigParser()
scp2.readfp(f)
sections = scp2.sections()
for s in sections:
    options = scp2.options(s)
    for option in options:
        value = scp2.get(s,option)
        print "section: %s, option: %s, value: %s" % (s,option,value)


[u'dateAdded',
 u'title',
 u'lastModified',
 u'children', => LIST (4) => dict
u'root', 
u'type', u'id']


time.strftime() //格式？ 

检查大容量的数据：
  使用 type ，+内置方法一步步深入


firefox 书签格式： （仅仅是默认保存的，不修改保存目录）

array(
 'children'=>array(
     array(),  //书签菜单

 //书签工具栏
      array(
           'children'=>array(
                      array(),  //最近使用的标签
     array(), //最近使用的书签
     array(),  //从这里开始，下面就是所有保存的标签了
                )

     ), 
     array(),  //标签
     array(),  //未分类书签
 )
)


json模块：
  方法：
 json.dump(obj, fp, skipkeys=False, ensure_ascii=True, check_circular=True, allow_nan=True, cls=None, indent=None, separators=None, encoding="utf-8", default=None, sort_keys=False, **kw)
 json.dumps(obj, skipkeys=False, ensure_ascii=True, check_circular=True, allow_nan=True, cls=None, indent=None, separators=None, encoding="utf-8", default=None, sort_keys=False, **kw)
 json.load(fp[, encoding[, cls[, object_hook[, parse_float[, parse_int[, parse_constant[, object_pairs_hook[, **kw]]]]]]]])

    Deserialize fp (a .read()-supporting file-like object containing a JSON document) to a Python object using this conversion table.
 json.loads(s[, encoding[, cls[, object_hook[, parse_float[, parse_int[, parse_constant[, object_pairs_hook[, **kw]]]]]]]])

注意：
 loads 和 dumps 中的s指 字符串.  否则默认就是从文件中读取写入



md5 模块：
 已经废弃，使用 hashlib替代

haslib模块：
  m=haslib.md5()
  m.update(STRING) //使用此字符串作为编码来源
  m.hexdigest() //获取16进制的md5编码
  m.digest_size //长度
  m.digestsize  //不知道
  m.digest //十进制的md6编码

  m.update(STRING) //重新编码其它字符串


MySQLdb模块：
http://mysql-python.sourceforge.net/MySQLdb.html#mysqldb
https://pypi.python.org/pypi/MySQL-python

  //注意charset, 这个一定要设置，否则默认 latian1
   self.connect=MySQLdb.connect(host='localhost',user='root',passwd='123'    ,db='unicorn',port=3306,charset="utf8")
168       self.cursor=self.connect.cursor()
169 
170       self.cursor.execute('set names utf8')
171       self.connect.commit()
172 
173       sql="set character_set_database =  utf8"
174       self.cursor.execute(sql)
175       self.connect.commit()
176 
177       sql="set character_set_server =  utf8"
178       self.cursor.execute(sql)
179       self.connect.commit()
180 
181       self.cursor.execute("show variables like '%character%'")

这个实现了python的数据库抽象接口，具体的看数据库接口就行了，但是似乎缺乏转义
查询 ：  cursor.execute() , cursor.fetchall() ,cursor.fetchone() .. 



扩展pythobn:
   python是胶水，可以粘和其它语言。

   java:  JPython
    c#  :  IronPython
C扩展：   CPython 
  工具们：  Psyco,Pyrex,PyPy(比较有前途） ,Weave,NumPy,ctypes,Subprocess,PyCXX,SIP,Boost.Pyton.,Modulator,



SWIG用来写C扩展

1， 使用python.h ，python c api来编写代码， 
2， 编译，通过 swig或者手动
3， 得到 .so文件，可以直接使用了  import xxx, 然后调用


打包： distutils + py2exe 非常重要的工具，可以发布程序了！
 1, 简单用法， setup.py 安装程序
   from distutils.core import setup
    
     setup(name="hello",
            version="1.0",
          description="a simple example"
author="frd",
py_modules=['hello'])  //核心是这里， 当前目录要存在 hello.py 的文件

然后就可以 python setup.py install 安装了，会自动把 hello.py 复制到本地的python目录中去


2, 创建 linux上的打包文件  (压缩文件包,默认  .tar.gz）
  python setup.py sdist //通过 --formats 指定其它格式

3, 创建windows安装程序

python setup.py bdist --format=wininst 


4, 也可以用来编译扩展， setup(... ,ext_modules=[Extension('...',[....c]))
  python setup.py build_ext --inplace


5, py2exe 创建可执行程序 ，直接可用，不用用户安装python解释器
  from distutils.core import setup
   import  py2exe

setup.py: setup(console=['hello.py'])

命令：  python setup.py py2exe




  

Logging  模块

  logger: 日志类，应用程序往往通过调用它提供的api来记录日志；
  handler: 对日志信息处理，可以将日志发送(保存)到不同的目标域中；
  filter: 对日志信息进行过滤；
  formatter:日志的格式化；

日志级别：
  CRITICAL 	50
ERROR 	40
WARNING 	30
INFO 	20
DEBUG 	10
NOTSET 	0


logging.basicConfig([**kwargs]):

　　为日志模块配置基本信息。kwargs 支持如下几个关键字参数：
filename ：日志文件的保存路径。如果配置了些参数，将自动创建一个FileHandler作为Handler；
filemode ：日志文件的打开模式。 默认值为'a'，表示日志消息以追加的形式添加到日志文件中。如果设为'w', 那么每次程序启动的时候都会创建一个新的日志文件；
format ：设置日志输出格式；
datefmt ：定义日期格式；
level ：设置日志的级别.对低于该级别的日志消息将被忽略；
stream ：设置特定的流用于初始化StreamHandler；

logging.shutdown()

　　当不再使用日志系统的时候，调用该方法，它会将日志flush到对应的目标域上。一般在系统退出的时候调用。 

Logger.info(msg[ , *args[ , **kwargs] ] )
Logger.warnning(msg[ , *args[ , **kwargs] ] )
Logger.error(msg[ , *args[ , **kwargs] ] )
Logger.critical(msg[ , *args[ , **kwargs] ] )

　　记录相应级别的日志信息。参数的含义与Logger.debug一样。
Logger.log(lvl, msg[ , *args[ , **kwargs] ] )

　　记录日志，参数lvl用户设置日志信息的级别。参数msg, *args, **kwargs的含义与Logger.debug一样。
Logger.exception(msg[, *args]) 


     import logging  
    logging.basicConfig(filename = os.path.join(os.getcwd(), 'log.txt'), level = logging.DEBUG)  
    logging.debug('this is a message')  

生成器
 生成器用在函数中，调用函数后，返回一个生成器。
 这个生成器是个迭代对象， 可以用 for .. in ，
 或者 生成器.next() 来访问，
 当生成器不能再生成的时候，会抛出错误

 可以把生成器当成一个指向函数的指针， 每个yield就是指针指向的执行点。
调用一次，执行到下一个yield停止， 返回值是那个 yield的值

生成器还有其它方法：
  send(value) //要求执行几次， 跳过几个yield， 但是第一次必须用 send(None)让生成器启动， 很费解

  close() 关闭，不再能执行 next()了，相当于指针归零
  throw(type,value=None,traceback=None)  //这个方法用于在生成器内部（生成器的当前挂起处，或未启动时在定义处）抛出一个异常。  

reportLab包 (yum install python-reportlab*)
 可以生成pdf, 非常强大


matplotlib
比较复杂，比较强大， 是mablib的模仿， 但是似乎没有现成的文档，只有许多例子
   http://matplotlib.org/1.3.1/examples/lines_bars_and_markers/barh_demo.html



字符串操作

   str.strip()  //类似 php trim
   str.lstrip()
   str.rstrip()
   str=str.replace(REPLACE,NEW)
    
  str.split(STRING)  // 类似 php explode

文件
  f=open(PATH)
   f.readline()
f.realines()
f.close()


python学习
2013-09-18 


python  PIL 读取图像大小

from PIL import Image
 im=Image.open("image_1.png")
  im.size  // (100,200)  元组
  
  假如不是图像文件，open的时候，会抛出错误（ raise IOError("cannot identify image file")）
  
  
  
  
  
字符串操作

   str.strip()  //类似 php trim
   str.lstrip()
   str.rstrip()
   str=str.replace(REPLACE,NEW)
    
  str.split(STRING)  // 类似 php explode

文件
  f=open(PATH)
   f.readline()
f.realines()
f.close()


      </p>

  