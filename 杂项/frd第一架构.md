
  # frd第一架构

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:21:31 


      None


      <p>
      第一架构 DB 架构
===================
Table Entity
name
primary
columns

Table 
$this->entity=Table_Entity();

1， 修改定义
$this->entity->name=NAME
$this->entity->columns=COLUMNS
$this->entity->primary=PRIMARY 

2， 单表查询等操作
fetchOne($select)
fetchRow($select)
fetchAll($select)

fetchOneWhere($where)
$select=$this->db->select();
$select->from($this->entity->name)
$select->where(... $where....)
return $this->db->fetchOne($select);

fetchRowWhere($where)
fetchAllWhere($where)

3， 单记录操作
load /set /get /save

insert/update/delete


4，单记录复合操作
insertWhere
if existsWhere:
insert
else:
update
updateWhere
if existsWhere:
update
deleteWhere
deleteWhere
existsWhere
fetchRowWhere

5，自定义时间处理，针对上述过程(怎么实现？ 要保证不能重复处理）
onSave
onRestore


Object 
__construct($primary) 
      </p>

  