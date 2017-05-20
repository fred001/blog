# Frd Db Table

Inherite from Zend_Db_Table, and extended. 

table:    blog
primary key :  id

// create object 
$table=new Frd_Db_Table("blog","id");

//normal methods
$table->load(ID)
$table->title=xxxx
$table->content=...
$last_insert_id=$table->save()
$table->delete(ID)


//extra methods
$table->loadWhere(array("title"=>"test")); //if have many records ,only use the first record
$table->get("title",DEFAULT_VALUE)
$table->has("title")  #return true or false
$table->setData(ARRAY)
$table->getData() 

//if exists where , update, else  insert
$table->insertWhere($where,$data) 
$table->insertWhere(array("name"=>"test"),array("name"=>"test","content"=>"test")); 

//if exists where, update, else  do nothing
$table->updateWhere($where,$data);


//if exists where,  delete it
$table->deleteWhere($where)

//return boolean , 
$table->exiestsWhere($where);
