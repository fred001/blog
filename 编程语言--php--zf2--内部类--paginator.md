
  # 编程语言--php--zf2--内部类--paginator

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:35:48 


      None


      <p>
      PAGINATOR

paginator

 
一个前端分页显示的对象
需要一个后段提供真正的数据显示
前端仅仅显示  分页的html  

 
class MyDbSelect extends Zend\Paginator\Adapter\DbSelect
{
    public function count()
    {
        $select = new Zend\Db\Sql\Select();
        $select->from('item_counts')->columns(array('c'=>'post_count'));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result    = $statement->execute();
        $row       = $result->current();
        $this->rowCount = $row['c'];

        return $this->rowCount;
    }
}

$adapter = new MyDbSelect($query, $adapter);
$paginator = new Zend\Paginator\Paginator($adapter); 
 
Paginator;  array
	array有两个可以修改的方法
		count  //这里返回array元素的总数
		getItems(offset,page_count_perpage)
			这里获取对应页面的array里面的部分数据
			
		这样其实不好，因为还是要整个 array数据， 
		只是返回其中部分而已
		
	如果根据page给出了部分结果，该怎么做呢？
	1， count还是要返回所有数据的总计
	2， getItems(offset,page_count_perpage)
		这里根据两个参数返回对应的数据
		
		
		
Paginator:
	1, 基础概念
		包含两部分， 获取数据，和显示	
	2， 基础方法：
	
		 getCurrentPageNumber()  //当前页
		setCurrentPageNumber
		
		getItemCountPerPage() //每页多少项
		setItemCountPerPage($itemCountPerPage = -1)

		getPageRange()  //render view的时候，显示多少页
		setPageRange($pageRange)
					
		getFilter()  
		setFilter(FilterInterface $filter) //过滤器，过滤结果数据
		 
		getItemsByPage($pageNumber)  //获取指定页的项
		getCurrentItems()  //获取当前页的项

		getTotalItemCount()  //获取项的总数
		getCurrentItemCount() //获取当前页的项总数
		
		count() //用于子类覆盖， 返回项的总量
		getItems($offset, $itemCountPerPage) //用于子类覆盖，当前页的所有项



	2, 用法：
		a, array
			$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($data));
 	
 		b,dbselect,单表
 		 $adapter=$this->getDb();
			$sql = new \Zend\Db\Sql\Sql($adapter);

			 $select = $sql->select();
			 $select->from('app_model');

			$paginator = new \Zend\Paginator\Paginator(new MyDbSelect($select,$adapter));
		
		c, 自定义db select
		
		class MyDbSelect extends \Zend\Paginator\Adapter\DbSelect
		{
			覆盖 count 和 getItems 方法
			也许还需要覆盖 __construct方法
		}
		
		$paginator = new \Zend\Paginator\Paginator(new MyDbSelect($select,$adapter));


		d, filter:
			
			class MyFilter implements \Zend\Filter\FilterInterface
			 {
			 	  public function filter($item)
			    {
			      foreach($item as $k=>$v)
			      {
				if($v['id']%2 !=0)
				{
				  unset($item[$k]);
				}
			      }
			      return $item;
			    }
			  }
			  
		$paginator->setFilter(new MyFilter());
			  


fiter是过滤器，相当于把结果给它，它return的是最终结果， 
给的是所有结果，不是一项一项给
		
		

      </p>

  