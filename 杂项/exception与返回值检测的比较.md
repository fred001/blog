
  # exception与返回值检测的比较

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:05:40 


      None


      <p>
      EXCEPTION与返回值检测的比较
try ... catch...    与  返回值检查的比较

返回值比较的问题在于：
	1， 层数过多，代码比较麻烦
		
		a()
			-- b
				--  c
					-- d 
		
		(a 中调用 b , b中调用c, c中调用d)			
		于是每一层都需要添加 返回值检查
		
	try .. catch.. 的好处是可以仅仅在  a() 这一层控制， 
	通过检查exception的类型来决定行为， 
	如果 它们是一体的话，可以进行一个处理，省略了大量代码
	分离了错误处理和正常代码的逻辑，更加清晰

      </p>

  