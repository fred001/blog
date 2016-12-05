
  # frd_js_lib详细解释

      version:  1
      created_at:  2016-02-08
      updated_at:  None

      created at 2016-02-08 14:28:03 


      None


      <p>
      

	Frd Js Lib 详细解释

functions.js  
	不需要解释

class.js
	用法：
		继承
		var Obj=extend(Class,function(self){
			self.name='test';
			self.test=function(){
				alert(self.name);
			};

		});
		
		var o=Obj.create();
		o.test();

		继续继承
		var O2=extend(O,function(self){
		self.show=function(){
		alert("hello "+self.name);
		};
		});
		var o=O.create();
		o.show();

		直接继承并执行
		O.run(function(self){
			alert(self.name);
		});

jquery-frd.js
		$(“body”).get2(“name”)  //  $(“body”).find(“[data-id=name]”).get(0);

	

dialog.js
	dialog().run(function(self){
		self.body.html(“test”);
		self.add_button("save","Save");
		self.bind_button("save","click",self.save);
	});	

form.js
	var form=Form.create();
	form.add_field("id",'','hidden').set_value(tr.attr("data-id"    ));
	form.add_field("title",'标题','text').set_value(tr.find("td"    ).eq(0).text());
	form.add_field("star",'星级','text').set_value(tr.find("td")    .eq(1).text());
	var html=form.create_html();

table.js
	var page_table=Table.create();
	page_table.run($("body").get2("table"));

page.js
	Page.add_init(function(){

	});

tree.js
	比较复杂，暂无例子	

editor.js
	 var editor=Editor.create();
	editor.create_html();
	editor.init();

ui.js
	var ui=UI.create();
	ui.create_html();
	ui.init()
      </p>

  