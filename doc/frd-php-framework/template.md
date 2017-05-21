[回到首页](/)

1. the default extension is  .phtml

usage:

//basick usage
	<?php
	$t=new Frd_Template();
	echo $t->render("test",array("name"=>"framework"); 
	?>

	in template  file   test.phtml 
	use  $this->name get the variable
	and can call $this->render(PATH,PARAMS) to render other template


          


