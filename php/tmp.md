# db 操作

原始DB操作:
  PDO init
  statement= PDO prepare
  statement->fetch, fetch All, fetchColumn


  第二种：
  PDO init
  POD -> query(SQL or STATEMENT)


  statement 创建时候定义了变量占用符， 后期通过 bindParam,bindValue来绑定参数
  两方法区别是bindParam(":name","abc") 这样不行，不能用直接量


Zend Db Select 支持多种方式，感觉不是很必要，保持一种即可


## where
  where 子句是可以嵌套的，也就是说是层级，所以复杂where很难用方法来写
  手写似乎更方便，

  API 接口不应当提供复杂where查询



