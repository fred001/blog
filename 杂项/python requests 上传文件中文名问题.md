
  # python requests 上传文件中文名问题

      version:  1
      created_at:  2016-07-26
      updated_at:  None

      None

      None


      <p>
      	事实上是不支持unicode字符的，这是rfc2231要求，具体怎么要求，看不懂不知道

	所以另外一个处理方法是对文件名进行处理，比如base64 encode, urlencode等等
	暂时采用urlencode, 优点是仍旧保持扩展名，并且可以恢复到中文

此问题的讨论
https://github.com/kennethreitz/requests/issues/2313
      </p>

  