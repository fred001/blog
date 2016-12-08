# DB

## db 操作方式

  1. CDbCommand 创建SQL并绑定参数
  2. CDbCommand 使用方法创建SQL ,类似Zend Db Select
  3. ActiveRecord::model() 使用预定义方法+ CDbCriteria() 执行操作


### create one

  $post=Post::model()
  $post->name="test";
  $post->save()



  sql="INSERT INTO {{user}} (username, email) VALUES(:username,:email)";
  $command=$connection->createCommand($sql);
  $command->bindParam(":email",$email,PDO::PARAM_STR);
  $command->execute();

### update one

  $post=Post::model()
  $post->findByPk($id)
  $post->name="test";
  $post->save()

### delete one
  $post=Post::model()
  $post->findByPk($id)
  $post->delete()


### update mulitiple

  $post=Post::model()
  $post->updateAll(array('on_shelf' => '0'), 'id=:id', array(':id' => $value->id));



### delete mulitiple
  $post=Post::model()
  $post->deleteAll(array('on_shelf' => '0'), 'id=:id', array(':id' => $value->id));



### select
  sql="select * from  {{user}} where name=:name"

  $connection=Yii::app()->db;
  $command=$connection->createCommand($sql);
  $command->bindParam(":email",$email,PDO::PARAM_STR);
  $dataReader=$command->query();   // 执行一个 SQL 查询
  $rows=$command->queryAll();      // 查询并返回结果中的所有行
  $row=$command->queryRow();       // 查询并返回结果中的第一行
  $column=$command->queryColumn(); // 查询并返回结果中的第一列
  $value=$command->queryScalar();  // 查询并返回结果中第一行的第一个字段



  $user = Yii::app()->db->createCommand()
    ->select('id, username, profile')
    ->from('tbl_user u')
    ->join('tbl_profile p', 'u.id=p.user_id')
    ->where('id=:id', array(':id'=>$id))
    ->queryRow();


  $post=Post::model()->find($condition,$params);
  // 查找具有指定主键值的那一行
  $post=Post::model()->findByPk($postID,$condition,$params);
  // 查找具有指定属性值的行
  $post=Post::model()->findByAttributes($attributes,$condition,$params);
  // 通过指定的 SQL 语句查找结果中的第一行
  $post=Post::model()->findBySql($sql,$params);

  $criteria=new CDbCriteria;
  $criteria->select='title';  // 只选择 'title' 列
  $criteria->condition='postID=:postID';
  $criteria->params=array(':postID'=>10);
  $post=Post::model()->find($criteria); // $params 不需要了


      [select()|CDbCommand::select() ]: specifies the SELECT part of the query
      [selectDistinct()|CDbCommand::selectDistinct]: specifies the SELECT part of the query and turns on the DISTINCT flag
      [from()|CDbCommand::from() ]: specifies the FROM part of the query
      [where()|CDbCommand::where() ]: specifies the WHERE part of the query
      [andWhere()|CDbCommand::andWhere() ]: appends condition to the WHERE part of the query with AND operator
      [orWhere()|CDbCommand::orWhere() ]: appends condition to the WHERE part of the query with OR operator
      [join()|CDbCommand::join() ]: appends an inner join query fragment
      [leftJoin()|CDbCommand::leftJoin]: appends a left outer join query fragment
      [rightJoin()|CDbCommand::rightJoin]: appends a right outer join query fragment
      [crossJoin()|CDbCommand::crossJoin]: appends a cross join query fragment
      [naturalJoin()|CDbCommand::naturalJoin]: appends a natural join query fragment
      [group()|CDbCommand::group() ]: specifies the GROUP BY part of the query
      [having()|CDbCommand::having() ]: specifies the HAVING part of the query
      [order()|CDbCommand::order() ]: specifies the ORDER BY part of the query
      [limit()|CDbCommand::limit() ]: specifies the LIMIT part of the query
      [offset()|CDbCommand::offset() ]: specifies the OFFSET part of the query
      [union()|CDbCommand::union() ]: appends a UNION query fragment


### 事务
  $transaction=$model->dbConnection->beginTransaction();
  try
  {
    // 查找和保存是可能由另一个请求干预的两个步骤
    // 这样我们使用一个事务以确保其一致性和完整性
    $post=$model->findByPk(10);
    $post->title='new post title';
    $post->save();
    $transaction->commit();
  }
  catch(Exception $e)
  {
    $transaction->rollBack();
  }




## 各种数据库操作之间的关系
model()->save:
  CDbCommandBuilder->createInsertCommand , createUpdateCommand
  =>   connection->createCommand()  #事实上是组装成 insert语句而已

  对于find 则是  createFindCommand, 并且组装criteria 成sql 最后执行


  所以真正执行SQL最后还是  CDbCommand

##  CDbCommand 如何实现的？
    本质是PDO类， 此类名定义在 CDbConnection::_pdoClass中

    所以CDbCommand 是对 statement的封装
    SQL语句的组装是由CDbCommand实现的，在 buildQuery中实现

    CDbCommand 组装SQL语句，交给 PDO::Statement来执行


