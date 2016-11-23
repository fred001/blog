## CFormModel 理解
## ActiveRecord 用法

insert
      $post=new Post();
      $post->title='sample post';
      $post->content='post body content';
      boolean $post->save();

update
    $post=Post::model()->findByPk(10)
    $post->title="title"
    boolean $post->save()

    Post::model()->updateAll($attributes,$condition,$params)
    Post::model()->updateByPk($pk,$attributes,$condition,$params)
    Post::model()->updateCounters($counters,$attributes,$condition,$params)

delete
    $post=Post::model()->findByPk(10)
    $post->delete()

    Post::model()->deleteAll($condition,$params)
    Post::model()->deleteByPk($pk,$condition,$params)

事务：
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


// 查找满足指定条件的结果中的第一行
$post=Post::model()->find($condition,$params);
// 查找具有指定主键值的那一行
$post=Post::model()->findByPk($postID,$condition,$params);
// 查找具有指定属性值的行
$post=Post::model()->findByAttributes($attributes,$condition,$params);
// 通过指定的 SQL 语句查找结果中的第一行
$post=Post::model()->findBySql($sql,$params);
$post=Post::model()->findAll($condition,$params);
$post=Post::model()->findAllBySql($sql,$params);


$post=Post::model()->find('postID=:postID', array(':postID'=>10));


CONDITION:
  $criteria=new CDbCriteria;
  $criteria->select='title';  // 只选择 'title' 列
  $criteria->condition='postID=:postID';
  $criteria->params=array(':postID'=>10);
  $post=Post::model()->find($criteria); // $params 不需要了
  


## QueryBuilder 怎么用，能否不直接指定表明， 关联表查询的用法
  db/CDbCommand.php

$user = Yii::app()->db->createCommand()
  ->select('id, username, profile')
  ->from('tbl_user u')
  ->join('tbl_profile p', 'u.id=p.user_id')
  ->where('id=:id', array(':id'=>$id))
  ->order("name , id desc")
  ->queryRow();
  ->queryColumn();
  ->query();
  ->queryAll()


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




## 关联表查询
  1. 表的配置中增加关联关系
  BELONGS_TO, HAS_MANY,HAS_ONE,MANY_MANY

  class Post extends CActiveRecord
  {
    function relations()
    {
      return array(
          'author'=>array(self::BELONGS_TO, 'User', 'author_id'),
          'categories'=>array(self::MANY_MANY, 'Category',
            'tbl_post_category(post_id, category_id)'),
          );
    }
  }


  2. 使用
      $post=Post::model()->findByPk(10)
      $post->author


      $posts=Post::model()->with('author')->findAll();
      $posts=Post::model()->with('author','categories')->findAll();

  3. 定义更复杂的查询关系
  class User extends CActiveRecord
  {
      public function relations()
          {
                return array(
                          'posts'=>array(self::HAS_MANY, 'Post', 'author_id',
                                          'order'=>'posts.create_time DESC',
                                                        'with'=>'categories'),
                                'profile'=>array(self::HAS_ONE, 'Profile', 'owner_id'),
                                    );
                  }
  }


  4.查询时候指定更复杂条件
    $posts=Post::model()->with('comments')->findAll(array(
            'order'=>'t.create_time, comments.create_time'
          ));





## 验证与授权
  Yii::app()->user  (CWebUser)
      isGuest()
      login()
      logout()
      checkAccess()
      name



      Controller
      filters() 返回控制方式
      accessRules () 返回权限控制详细， 可能需要在filter中增加  accessControl


      web/CController::runActionWithFilters 中创建所有filter
      web/filters/CFilterChain::create 中创建了 filter
      其中创建有两种方式，一种是创建一个新类，一种是查询controller中是否有对应函数
      所以对于accessControl,应该是调用了CController:filterAccessControl方法


      此方法最后创建了 CAccessControlFilter，并且设置了rule (accessRules() 返回的数组） 
          CAccessControlFilter 中有setRule方法，将数组的rule变成实际的类
          最终通过这些类来检测


          CAccessRule中的 isUsermatched($user) 用来确定用户权限 （硬编码）
          * = tru
          * ? 未登录才可以
          * @ 登录了才可以
          * admin   用户名必须是admin  $user->getName()

## yii table {{user}} 怎么实现的？
   CDbCommand 中
  173       $this->_text=preg_replace('/{{(.*?)}}/',$this->_connection->tablePrefix.'\1',$value);

    原理就是通过正则替换， 加上表前缀而已！ ，其它都没有变动。



