
  # php--zf2--内部类--Db.

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:43:31 


      None


      <p>
      DB

Db


 
使用了注入，看起来比较复杂  
   
 resultSet 是返回结果，而不是数组 
   
   
 SQL:  


 
 use Zend\Db\Sql\Sql;  
 $sql = new Sql($adapter);  
 $select = $sql->select(); // @return Zend\Db\Sql\Select  
 $insert = $sql->insert(); // @return Zend\Db\Sql\Insert  
 $update = $sql->update(); // @return Zend\Db\Sql\Update  
 $delete = $sql->delete(); // @return Zend\Db\Sql\Delete  


 
 DLL : 创建dll语句 
   
 TableGateway：  
  大约等同于一个表， 可以进行各种crud操作  
  一种类似load + save 的操作：  
   $table = new TableGateway('artist', $adapter, new Feature\RowGatewayFeature('id'));  
   $results = $table->select(array('id' => 2));  


 
   $artistRow = $results->current();  
   $artistRow->name = 'New Name';  
   $artistRow->save();  
     
 RowGateway  
   
 Zend\Db\Metadata 是 Zend\Db 的子组件，可以用来以标准化的方式获取表、列、触发器等元数据信息，。Metadata 对象的主要接口：  
  可以获取表，表的字段，等信息，看起来比较有用 
    
    
    
未整理文档：
   Zend Db Adapter:
	创建
		$adapter = new Zend\Db\Adapter\Adapter($configArray);

	执行
		$adapter->query(’SELECT * FROM ‘artist‘ WHERE ‘id‘ = ?’, array(5));
		$adapter->query(’ALTER TABLE ADD INDEX(‘foo_index‘) ON (‘foo_column‘)’, Adapter::QUERY_MODE_EXECUTE);

		$statement = $adapter->createStatement($sql, $optionalParameters);
		$result = $statement->execute();


		
	返回值
		$result=....
		$row=$result->current();
		$row['name'];   //是个数组
		
		
		
	》》》》
	Zend Db ResultSet \ ResultSet | AbstractResultSet
	大约相当与 StdClass() 
	但是功能有提升
	
	可以从dataSource 中创建对象
	可以转换成 array  (toArray)
	
	HydratingResultSet
		$resultSet = new HydratingResultSet(new ReflectionHydrator, new UserEntity);

	这个类没懂什么意思， 可能需要看代码
		
	
	
	
	》》》
	Zend Db Sql Sql:
	它不是直接创建 sql语句的。
	通过它来创建四个不同的sql (select,insert,update,delete)
	然后执行具体的sql对象
	
	创建不同sql:
		$sql=new ..>Sql($adapter)
		$sql->select();
		$sql->insert()
		$sql->update()
		$sql->delete()
	
	执行sql:
		方法1
		$statement = $sql->prepareStatementForSqlObject($select);
		$results = $statement->execute()
		
		方法2
		$selectString = $sql->getSqlStringForSqlObject($select);
		$results = $adapter->query($selectString, $adapter::QUERY_MODE_EXECUTE);

	复杂sql:
		复杂sql需要设置 where,having,
		这两个也是对象， 所以可以用  $select->where->in(..) 这种方法
		这两个对象也有一系列方法
		
	
	
	
	》》》
	Tablegatway
	包含 AbstractTableGateway 和TableGateway
	第一个可以用来继承扩展功能
	第二个实现了基本的功能，可以直接使用
	
	TableGateway功能：
		getAdapter();
		getColumns();
		getFeatureSet();
		getResultSetPrototype();
		getSql();
		select($where = null);
		selectWith(Select $select);
		insert($set);
		insertWith(Insert $insert);
		update($set, $where = null);
		updateWith(Update $update);
		delete($where);
		deleteWith(Delete $delete)
	
	TableGateway 特性：
		$table = new TableGateway(’artist’, $adapter, new Feature\MasterSlaveFeature($slaveAdapter));
 		通过第三个参数指定特性，可以影响功能，似乎比较复杂



》》》
rowgateway是表中一行记录的 对象，可以修改该行和删除
有两种建立方法：
	1， 手动创建，需要制定primary key和 表名，然后纳入数据
	1
use Zend\Db\RowGateway\RowGateway;

// query the database
$resultSet = $adapter->query(’SELECT * FROM ‘user‘ WHERE ‘id‘ = ?’, array(2));

// get array of data
$rowData = $resultSet->current()->getArrayCopy();

// row gateway
$rowGateway = new RowGateway(’id’, ’my_table’, $adapter);
$rowGateway->populate($rowData);

$rowGateway->first_name = ’New Name’;
$rowGateway->save();

// or delete this row:
$rowGateway->delete();
The workflow described above i


第二种： 从tablegatway中获取


use Zend\Db\TableGateway\Feature\RowGatewayFeature;
use Zend\Db\TableGateway\TableGateway;

$table = new TableGateway(’artist’, $adapter, new RowGatewayFeature(’id’));
$results = $table->select(array(’id’ => 2));

$artistRow = $results->current();
$artistRow->name = ’New Name’;
$artistRow->save()




》》》
public function getSchemas();   //获取数据库  array(dbname1,dbname2,...)
public function getTableNames($schema = null, $includeViews = false); 
//获取表名 
array(tablename1,tablename2,tablename3,...)

public function getTables($schema = null, $includeViews = false);
//获取表
array(Zend\Db\Metadata\Object\TableObject,...)


public function getTable($tableName, $schema = null);
获取表

public function getViewNames($schema = null);
public function getViews($schema = null);
public function getView($viewName, $schema = null);

public function getColumnNames($table, $schema = null);
获取字段名  ....(tablename)  => 
array(colname1,colname2,...)

public function getColumns($table, $schema = null);
// array(..Zend\Db\Metadata\Object\ColumnObject,...)

public function getColumn($columnName, $table, $schema = null);

//获取约束
public function getConstraints($table, $schema = null);

array(Zend\Db\Metadata\Object\ConstraintObject,...)

public function getConstraint($constraintName, $table, $schema = null);
public function getConstraintKeys($constraint, $table, $schema = null);


//获取触发
public function getTriggerNames($schema = null);
public function getTriggers($schema = null);
public function getTrigger($triggerName, $schema = null);



》》》
Zend  Db Adapter
Zend Db ResultSet
Zend Db Sql
Zend Db TableGateway
Zend Db RowGaeway
	

Zend Db Metadata
	获取数据库信息
	表信息，
	触发器，视图，字段等信息


      </p>

  