
  # smarty 总结

      version:  1
      created_at:  2016-04-14
      updated_at:  None

      created at 2016-04-14 12:34:19 


      None


      <p>
      如何载入子模板：
	{include file="footer.tpl"}


如果给子模板传递变量
	默认父模板的变量都在子模板中可以使用
	父模板可以另外增加或修改变量
		 {assign var="name" value="frd2"}
	自动在以下的子模板中生效
	但是子模板的变量不在父模板中生效

循环中调用子模板如何形成template 和cache 的
	template: 内在实现不知道，大概是通过include载入的
	cache: 解析子模板最终合并到父模板中，形成cache ,cache中应该没有include
      </p>

  