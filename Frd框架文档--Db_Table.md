
  # Frd框架文档--Db_Table

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:05:52 


      None


      <p>
      DB_TABLE
Frd_Db_Table


 
for database table operation


 
继承自 Zend_Db_Table 并有扩充,并更换了方法


 


 
$table=new Frd_Db_Table(“TABLE_NAME”,”TABLE_PRIMARY_KEY”);


 
1, load, save
2, load update save
3, delete


 
4, crud


 
5, 复杂操作


 
  function load($key)   //load(ID)
  function loadWhere(array $where) //load(array(“name”=>”test”))
  function setData(array $data)  //
  function getData()  
  function save()  


 
  function insertWhere($where,$data)  
  function updateWhere($where,$data)  
  function deleteWhere($where)  
  function existsWhere($where)  
  function insert(array $data)  


 
  function delete($id)  


 


 


 


 


 


 


      </p>

  