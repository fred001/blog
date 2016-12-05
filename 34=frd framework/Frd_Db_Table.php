继承自 Zend_Db_Table,并扩展其功能，实现对单表的更多功能。 
创建一个Table对象。 
假设已经有一个表 "blog" ,id 为主键。

$table=new Frd_Db_Table("blog","id");
首先此对象拥有zend db table 的常用方法。

$table->load(ID)
$table->title=xxxx
$table->content=...
$last_insert_id=$table->save()
$table->delete(ID)

其次，它拥有一些额为方法。

$table->loadWhere(array("title"=>"test")); //必须结果仅仅一条记录，效果相当于 $table->load(ID)
$table->get("title",DEFAULT_VALUE)
$table->has("title")  #return true or false
$table->setData(ARRAY)
$table->getData() 

$table->insertWhere($where,$data) 
//如果已经存在此记录，则更新，否则则插入
$table->insertWhere(array("name"=>"test"),array("name"=>"test","content"=>"test")); 
//如果已经存在此记录，则更新，否则不做任何事
$table->updateWhere($where,$data);
//如果已经存在此记录，则删除
$table->deleteWhere($where)


$table->exiestsWhere($where);


