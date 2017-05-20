# controller

It's the same as MVC pattern 's  Controller.The difference is it is not an object, it is just a php file .
For Frd Route, at last it will find a controller file and require it ,so  controller handle the logic and view .
A controller is just a php file, but it will always under a module. Use FPF's  global function  module() can get the controller's module .
Here are some simple examples:

controller file:	ROOT_PATH/modules/default/controllers/index.php

	
example 1 : print hello world

		<?php
			echo "hello world";



example 2 : render view

		<?php
			echo module()->render("index",array("msg"=>"hello world"));

example 3: render view with layout:

		<?php
			$module=module();
			$layout=$module->getLayout("basic");
			$view=$module->getTemplate("index",array("msg"=>"hello world"));

			$layout->content=$view;

			echo $layout->render();




