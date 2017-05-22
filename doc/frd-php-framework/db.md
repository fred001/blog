[回到首页](/)

# Frd_Db

  version:  2
  created at 2016-02-29 12:54:29 
  update at 2016-04-25 14:30:41



  inherit from Zend_DB ,  so just look at  Zend Framework 1.10  document.



  Transaction:

  <?php
  $db=app()->getDb();
  $db->beginTransaction();

  try 
{
  $sql="insert into user (username2) values('test')";
  $db->query($sql);

  $db->commit();
}  
catch (Exception $e)
{
  $db->rollBack();
  echo $e->getMessage();
}  


