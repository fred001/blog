
  # 目标-dbcheck

      version:  1
      created_at:  2016-03-15
      updated_at:  None

      created at 2016-03-15 15:11:07 


      None


      <p>
      DBCHECK


[思考]
db check 思考:

	核心是记录前后数据的差别， 最后比较结果。 只限于比较记录。暂时不比较字段内容。

	流程都是一样： 核心是 表和 where 查询 ， 
	这个where查询，前后都需要通过此获取数据
	create 比较特殊一点
	针对单表，多表则创建多个比较
	
	伪代码 （One Check)：
	
	table=new Table("NAME","PRIMARY")
	last_id=Table.get_last_id

	if(type == create)
		where=(table.PRIMARY >  last_id)

	before=new Before()
	before.table=table
	before.rows=table.fetchAllWhere(where)
	before.count=count(before.rows)

	....do create....


	after=new After()
	after.table=table
	after.rows=table.fetchAllWhere($where)
	after.count=count(after.rows)
	

	==>check
	before.count=0 && after.count>1

	UPDATE: 
		table=new Table(..)
		where=WHERE( 参数）

		....


	==>check  (上面代码都一样)
	after.count=before.count
	还需要检测 after.rows 每条和before.rows 不同

	DELETE:
	.....

	==>check
	after.count=0
	


      </p>

  