
  # C语言大学教程

      version:  1
      created_at:  2016-03-15
      updated_at:  None

      created at 2016-03-15 15:17:37 


      None


      <p>
      
	1.这本书到底在谈什么？关于什么的？
		c和c++ 语言编程
			
	2.作者细部说了什么，怎么说的？ 
		基础知识总结（包含前面几章）
			C语言编程简介： 
	标准的C语言功能比较弱，仅仅包含语言核心。 
	如何写一个C程序： 
		1， 编码：vim test.c 
			#include <stdio.h>  //包含printf函数 ，是一个定义，编译时候会链接相应的库 
				 
			int main(void)   //入口函数  ， int在shell是返回值 
			{ 
				printf("hello world\n"); 
			} 
		2， 编译：  
			gcc test.c //默认编译成a.out 
			gcc -o test test.c  //编译成test命令 
		3， 运行：  ./a.out 或者 ./test
		函数
			#include <stdio.h>
			int square(int y):    //需要在main函数之前定义，和解释型语言大不相同
			
			int main(voide)
			{
				.....
			}

			int square(int y)
			{
				....
			}

			数据类型： 
	long double 
	double 
	float 
	unsigined long int 
	log int 
	unsigned int 
	int 
	unsigned short 
	short 
	char 

头文件： 
	<assert.h> 
	<ctype.h> 
	<errno.h> 
	<float.h> 
	<limits.h> 
	<locale.h> 
	<math.h> 
	<setjmp.h> 
	<signal.h> 
	<stdarg.h> 
	<stddef.h> 
	<stdio.h> 
	<stdlib.h> 
	<string.h> 
	<time.h> 


存储周期： 
	auto ,register,extern, static
		数组
			int c[12]
			char string1[]=“first”  == char string1[]={'f','i','r','s','t','\0'}

			向函数传递数组： test(string1)
		指针
			指针： 
	定义： 
		int y=0; 
		int *countPtr=&y; 
		int * const ptr=&y; //此时ptr的值不能改变!但是 *y=8;是可以的，因为这是指针指向的值，未做限定 
		const int *const ptr=&y ; //此时无论指针还是指针指向的值，都无法改变 

	sizeof 
	指针只见可以相互加减，这是两指针地址的差值，通常在数组中才有意义 

	指针数组：const char *suit[4]={'hearts','diamonds','clubs','spades'} 

	函数指针：int (*compare)(int a,int b)  //在参数中用，传递的时候直接传函数名就可以了 
	函数指针数组： void (*f[3])(int) = {function1,function2,function3}; 
			(*f[0])(1) //调用
		字符和字符串
				定义： char color[]="blue"; 
		const char *colorPtr="blue"; 
		 
 
	字符串函数： 
		int isdigit(int c); 
		isalpha,isalnum,isxdigit,islower, 
		isupper,tolower,toupper,isspace, 
		iscntrl,ispunct,isprint,isgraph 

		double atof,int atoi ,atol,strtod,strtol,strtoul 

		fgets,putchar,getchar,puts,sprintf,sscanf, 
		strcpy 
		strncpy 
		strcat 
		strncat 
		格式化输入/输出
				printf 
	scanf 
	格式转换符： 
		d ,i , o, u, x/X ,h/l , p , n ,% 
		%4d, 
		- ，+ ， 空格， #, 0 
		结构体、共用体、位操作和枚举类型
			结构体： 
	定义： 
		struct card{ 
			char *face; 
			char *suit; 
		}aCard,deck[52],*cardPtr; 

	初始化： 
		struct card aCard={"Three","Hearts"} 
	访问： 
		aCard.suit,  cardPtr->suit 
	typedef 简写： 
		typedef struct { 
			char *face; 
			char *suit; 
		}Card; 
		Card aCard; 


共用体： 
	数个变量共同分享同样的空间，以解决空间 
	和结构体的唯一差别是 union 替代 struct, 
	并且一次只能使用其中的一个变量，否则会覆盖前一个 

位运算符： 
	&=, |=,^=,<<= , >>= 

	 
枚举常量： 
	enum months{Jan,Feb,Mar....	}//从0 开始 
	enum months{Jan=1,Feb,Mar....	}//从1 开始 
	enum months{Jan=1,Feb=3,Mar=5....	}//自定义值 

	大约相当于一次定义了大量常量 
	

		文件处理
			三个标准输入输出流： 
	stdin, stdout,stderr  ,它们是指针，可以直接当作文件来操作 
文件以EOF结尾 

文件分成两种类别： 
	顺序 
		顺序保存，修改时候需要修改所有内容 
	随机 
		以固定长度的一个个记录（结构体实现） 保存， 修改读取都不需要操作整个文件，但是一个记录的长度是固定的 

		以固定长度的一行行记录保存，可能效果和随机差不多，并且有一定程度的弹性长度 

 
	文件操作函数： 
		include <stdio.h>   定义了  FILE 结构体 

		FILE *cfPtr=fopen(PATH,MOD) === NULL 
		fclose(cfPtr) 
		feof(cfPtr),feof(stdin) 
		fprintf(cfPtr,"%d %s",account,name); 
		fscanf(cfPtr,"%d%s",&account,&name); 
		rewind(cfPtr) //文件指针复位 


		随机存储的文件函数： 
		fwrite(&number,sizeof(int),1,fPtr); 
		fwrite(&client,sizeof(struct client),1,cfPtr); 

		fseek(cfPtr,10 *  sizeof(struct client), SEEK_SET) 
		fread(&client,sizeof(struct client),1,cfPtr); 
		也可以使用顺序文件的操作函数： 
		fscanf(stdin,"%s%s",client.lastName,client.firstName); //大约是结构体是按照其中变量顺序存储，所以同样可以顺序读取 
		 
	 
		

		数据结构
			newPtr=malloc(sizeof(struct node));  //分配额外空间
free(newPtr)  //释放空间

(*sPtr)->nextPtr  //这个括号要注意， 因为符号优先级的问题，必须这样
		预处理	 
	#include 
	#define PI 3.14159 
	#define CIRCLE_AREA( x ) ( (PI) * (X) * (X))  //实际运行时候只是替换内容，不会计算， 所以要加上   （ ） 在最外面，以防万一 

	条件编译： 
		#if !defined(MY_CONSTANT) 
			#define MY_CONTSTANT 0 
		#endif 

	#error  1 - out of rang //输出错误信息并退出 
	#pragma  //执行系统中实现的定义好的操作，不能识别则被忽略 


	#和## 
	#define HELLO(x) printf("Hello ," #x " \n");  //这里的#x会被替换成  参数中的 x 
	#define TOKENCONCAT(x,y)  x##Y    //参数中的x ,y 会被拼接在一起 


	#line 100     //下面的行数从100开始算 
	#line 100 "file1.c"  //下面的行数从100行开始算，并且文件名都是  file1.c 

	预定义符号常量： 
		__LINE__, __FILE__,__DATE__,__TIME__,__STDC__ 

	assert 
		assert(x<=10)  //满足条件时候打印出错信息并且退出 
	
			
		C语言的其它专题
			io重定向： shell中的内容
			可变长的是实参列表
				va_list ,va_start,va_arg,va_end
				定义： double average(int i ,...)
				使用：
					va_list ap;
					va_start(ap,i);//i保存了数目
					
					va_arg(ap,double) //每次获取一个值，double指明类型

					va_end(ap)			
			命令行实参
				int main(int argc,char *argvp[])

			由多个源文件组成的程序的编译问题
				文件访问其它文件的全局变量： extra int flag; 链接程序会去寻找具体在哪里
				函数原型则只要包含就可以使用， 这也是 <stdio.h> 等头文件的原理
				一个文件中定义  static ... , 则这个变量只能本文件访问， 函数也可以限定static

			exit , atexit终止程序
				exit(10) //马上终止程序，返回10， （在shell中可以获得）
				atexit(print); //注册程序结束时候的调用函数
					void print(void){ ...  }

			volatile 类型限定符：
					除了const类型限定， volatile限制各种优化

			整形和浮点型常量的后缀：
				100u
				1000L
				1000ul


			信号处理：
				#include <signal.h>
				void signalHandler(int signalValue); 
				
				signal(SIGINT,signalHandler);//定义信号发生时候的调用函数

				
			动态内存分配：
				数组属于静态数据结构，  calloc,realloc 用来创建并修改动态数组
				void *calloc(size_t nmeb,size_t size);
				void *realloc(void *ptr,size_t size);  //重新分配内存空间

			goto无条件转移：
				
				


		C++：介绍面向对象技术
			一个简单的例子：
				#include <iostream>
				int main()
				{
					int number1;
					std::cout << “enter first interger:”;  //获取一个值
					std::cin >> number1 ;  //将值赋给 number1
					std::count << “number is “ <<  number1 <<std::endl;  //endl 强制刷新，立刻输出
				}			


			按引用传参：
				int test (int &)  //函数形参
				int test (int &num){...}  //函数定义

			引用别名：
				int count=1;
				int &cRef=count;
				cRef++;

			默认实参：
				int test(int lenght=1);

			一元作用域运算符：
				int count=1;
				int test()
				{
					std::cout<<::count<<endl; //显式访问全局变量， 但是假如局部变量count不存在，也可以直接用  count 访问全局变量
				}

			函数重载：通过形参来区别， 返回值是无关的
				int square(int x){...}
				double  square(double y){...}


			函数模板：
				template <class T>
				T maximum(T value1, Tvalue2,Tvalue3){...}  //自动根据不同参数生成处理不同类别参数的函数
 
		类与对象简介
			例子：	
				#include <iostream>
				using namespace std;
				class GradeBook		
				{
					public:
						void displayMessage()
						{
							cout << “welcome to the grade book” <<endl; 
						}
					private:
						void test(){....}
				};    	      //这里的分号不能省略！！


			函数原型定义类的接口： 放在.h文件
				class GradeBook
				{
					public:
						GradeBook(string);
						void displayMessage();
				}

		类：深入剖析1
			防止重复包含头文件引起错误：
			#ifndef TIME_H 
#define TIME_H 
 
类代码 

#endif 


当在头文件定义了类的函数原型等 
需要在.cpp文件实现代码(需要加上命名空间，就是类的名字，里面照样能直接访问类的属性和方法） 
例： 
	#include "time.h" 

	Time::Time(){....} 
	Time::~Time(){}  //析构函数没有参数和返回值,～+类名 
	void Time::setTime(....){....}
		类：深入剖析2
			const对象和const成员函数： 
	const Time noon(12,0,0); //限定类的实例为const 
	特点： 
		1，不允许调用非const的方法， 
		2，定义方法const,需要把const加在后面 
			int getMinute() const; 
		3, 对构造函数无此要求,构造函数中可以调用非const方法 
		 
	构造函数的另一种初始化变量： 
		Increment::Increement(int c,int i) 
		:count(c), 
		increment(1)   
	相当于：  int count=c, int increment=1; 是一种简单写法 


友元函数： 
	在类的定义中增加： 
		freiend class ClassTwo ;  //准许ClassTwo访问本类的所有私有属性 
		friend void setX(COunt &,int) //允许setX函数访问本类的所有私有属性		 
	 
this指针： 
	类中可以使用  this->XXX ，默认是可以不加的，但是可以显式地加上 
	this 还可以用来返回本实例  return (*this) 

static 类成员： 
	类中：  static int count; 这样地属性能被所有类所共享 


	
		运算符重载
				重载为方法和全局函数的差别 
		方法时候， 左边必须是类对象，全局函数则无此要求 
	流插入和读取需要是全局函数 
	 
	重载流： 
	ostream &operator<<(ostream &output,const PHotoNumber &number) 
	{ 
		output << number.areaCode; 
	} 

	重载一元运算符： 
	bool operator!() const; 
	 
	重载二元运算符： 
	bool operator <(const String &) const; 

	动态内存管理： 
	Time *timePtr=new Time; 
	delete timePtr; 

	explicit:禁止隐式转换 

	class Array 
	{ 
		explicit Array(int = 10); 
	} 
 
	代理类： 为接口隐藏私有变量 
	 
	
			
		面向对象编程：继承
				class BasePlusCommissionEmployee:public CommissionEMployee 
	{ 

	}
		面向对象编程：多态
			继承后，怎么访问父类中的属性和方法？ 
		通过名字如： CommissionEmployee::print() 

	虚函数：基类可以调用派生类的方法 
		声明： 在函数前面加 virtual 
			如： virtual void draw() const; 

	抽象类和纯虚函数： 
		纯虚函数为抽象类服务，表示此函数应当由子类实现，写法就是虚函数 

	虚析构函数

		模板
		函数模板： 
函数模板的重载 
类模板 
模板与继承 
模板与友元 
模板与static成员
		输入/输出流
			输出流： 
	cout.put('A') 
输入流： 
	cin.get() // 获取一个char 
	cin.getline(buffer,SIZE) //获取一行 
	cin.eof 
	cin.get 


	write/read/gcount: 
		cout.write(bufffer,10) 
		cin.read(buffer,20) 

流操纵符： 
	设置整数流的基数：dec,oct,hex,setbase 
		cout   <<hex <<number <<endl;  //16进制 
		cout <<dec <<number << oct <<number <<endl; //10进制和8进制 
		cout << setbase(10) << endl;  //输出进制 

	设置浮点数精度： precision, setprecision 
		cout.precision(2); 
		cout << value <<endl; 

		cout << setprecision(3) << number << endl; 
	 
	设置域宽（width,setw) 
		cout.width(5); cout << number; 
		 

	用户定义的输出流操纵符： 
		ostream& tab (ostream& coutput) 
		{ 
			return output << '\t'; 
		} 
		 
		cout << tab << end;  //现在自己创建的tab操纵符可以用了！ 此tab可以改成任何其它名字，只要重载的函数也同样修改。 


流格式状态和流操纵符： 
	skipws,left,right,internal,dec,oct,hex,showbase,showpoing,uppercase,showpos,scientific,fixed 

	设置尾数0和十进制小数点（showpoint) 
	设置对齐 
	设置填充字符 
	设置整数流的基数 
	设置浮点数 
	大/小写控制 
	制定布尔格式 
	流错误状态 
	将输出流绑定到输入流中 
	
		异常处理
			定义异常类： 
	class DivideByZeroException : public runtime_error{} 
捕获异常： 
	try{}catche(DivideBYZeroException &exception){} 

重新抛出异常： 
	throw 


标准库的异常层次结构： 
	
		
		


	3.这本书有道理吗，是部分还是全部有道理？ 
	4.这本书和我什么关系？对我有用处吗？用处大还是小？ 

      </p>

  