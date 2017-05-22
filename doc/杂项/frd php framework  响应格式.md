
  # frd php framework  响应格式

      version:  1
      created_at:  None
      updated_at:  None

      None

      None


      <p>
      	data: {} 用户数据
	外层都是特定内容

	error_msg :  
	error_code:  
	

	1，每次仅返回一个错误
	error:  整数 0 没有错误， 1错误
	2， error_code 定义了错误类型
	3， error_msg  可以直接输出给用户的信息
	4,	error_detail :  描述

范例：
	miss key
		error:1
		error_code: KEY_MISS
		error_code_detail  { key: name}
		error_msg:  key missed 


	key invalid
		error:1
		error_code : key_INVALID
		error_code_detail: {key:KEY_NAME, "reason":"NOT_INT}
		error_msg 

      </p>

  