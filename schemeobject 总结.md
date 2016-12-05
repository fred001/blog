
  # schemeobject 总结

      version:  1
      created_at:  2016-08-04
      updated_at:  None

      None

      None


      <p>
      	此包可以获得数据库的信息，并可以生成sql语言，对于数据库结构管理十分有用。

基本用法：
 import schemaobject
 
 sourcedb="mysql://root@localhost/test"
 source_obj = schemaobject.SchemaObject(sourcedb)
print source_obj.version

source_obj.databases #字典，每个value都是一个database对象
source_obj.selected  # 选中的database对象，（可能不存在）
source_obj.tables #字典， 每个value都是table对象

table=source_obj.tables['account'];
table.indexes #keys
table.columns #字典，每个value都是字段对象

table.creaate() #创建此table的sql语句
table.drop() #删除此table的sql语句

column=table.columns['id']
column.create() #创建此column的语句
column.drop() #删除此column的语句
column.modif()  #修改此column的语句
      </p>

  