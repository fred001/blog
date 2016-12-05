
  # mongodb

      version:  2
      created_at:  2016-08-04
      updated_at:  2016-08-04 12:30:01

      None

      None


      <p>
      help
show dbs
show collection

基本结构：
	schema ->  dbs -> collections
	use  DB
	db #current db

db.test #数据库对象
db.getCollection("test")  #数据库对象，避免特殊名的数据库

db.test.insert(DICT DATA) #插入
db.test.find()  # 查询
db.test.findOne()

db.test.update(WHERE,DATA) #修改
db.test.remove(WHERE)


collectoin=db.test

collection.find(WHERE,COLUMNS) 
collection.find({},{"username":1,"email":1,"created_at":0})
collection.find({"age":{"$gte":18}})
collection.find({"name.first":...}) #多级查询

collection.find().limit(3)
...skip(3)
...sort({usearnem:1,age:-1})  #1 生序



      </p>

  