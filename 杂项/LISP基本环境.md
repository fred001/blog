
  # LISP基本环境

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:27:18 


      None


      <p>
      	建立代码：  hello.lsp 
	内容： 	 (print "Hello World\n")

	创建编译文件：  cclisp
	  #!/usr/bin/env bash
	  sbcl --noinform --eval "(compile-file \"$1\")" --eval "(quit)" > /dev/null
	  FILE=$(echo $1 | sed -e "s/.lsp$//")
	  mv $FILE.fasl  a.out
	  chmod u+x a.out

	用法：
		./cclisp hello.lsp && ./a.out
	但是这样编译的 a.out,应该实际还需要sbcl 编译器来执行，
	不知道算不算真正二进制文件


yum install sbcl 

进入 sbcl 可以直接写代码
也可以用vim 编写lsp代码，然后直接编译执行

NEXT：
	怎么编写代码后， 编译并调式？


      </p>

  