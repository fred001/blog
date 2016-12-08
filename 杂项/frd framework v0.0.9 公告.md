
  # frd framework v0.0.9 公告

      version:  2
      created_at:  2016-04-27
      updated_at:  2016-04-27 15:29:54

      created at 2016-04-27 15:20:22 
update at 2016-04-27 15:29:54


      None


      <p>
      终于，frd framework进入0.0.9版本了！
自2010年以来，frd framework从一个微不足道的函数库逐渐进化成为一个框架，经历了9个版本的巨大变化，终于暂时稳定。
需要注意的是，本版本仍旧不能应用于实际项目，以《人月神话》的定义，它仅仅是编程代码，并未成为编程产品。
它还缺少完整的测试，明晰的文档以及维护。 暂时仅建议应用于试验项目。

frd framework的核心目标是
	一，为了获得一种固定清晰的结构，以便放置各类代码
	二，创建更高层次的复用方式，以减少重复代码的开发


frd framework努力保持对原始PHP代码的支持，极力减少框架本身对开发的额外负担。仅仅增加了 App 和 Module 两个概念 以支持更高层次的复用。

frd framework与当前流行的诸大型PHP框架理念并不相同。
	它并不是典型的MVC架构
	不支持代码注入，反向依赖等来自于Java的概念
	并不鼓励 restful形式的API接口
	代码风格未必符合 psr-* 推荐标准
	不支持composer依赖管理。 仅支持遵循一种简单的自动载入类格式的第三方库。



应当如何使用：
	访问 http://iamlosing.me/frd_framework
	选择 "下载" 标签页并点击链接进入  github网站，
	执行 git clone  REPO  或者直接下载代码
	
	在源代码目录中调用 ./install ,删除非必要文件。
	配置web服务器，指向  源代码目录/public
	然后配置 local/setting.php 中的数据库配置
	
	接下来可以阅读	 http://iamlosing.me/frd_framework  文档标签页的相关文章以了解如何使用。

警告：
	frd framework框架事实上文档很不齐全，根据上述文档很有可能不能成功配置。 
	如果您对php 开发并不熟悉，建议您暂时不要尝试此框架。
	如果安装，使用中存在问题，发送邮件报告问题是个好办法，可以发送邮件到  iamlosing02(AT)gmail.com 询问。

	本版本目前成熟水平相当于beta版本，仅建议热爱尝试新事物的资深PHPer使用。 


联系方式:
	https://twitter.com/fred_silent
	https://www.facebook.com/iamlosing02
	iamlosing02(AT)gmail.com
	http://iamlosing.me
http://iamlosing-me.blogspot.jp/

      </p>

  