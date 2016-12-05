
  # magento

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:08:25 


      None


      <p>
      MAGENTO
1，获取产品tag,需要直接通过tag来获取

    $collection = Mage::getModel('tag/tag')
      ->getCustomerCollection()
      ->addProductFilter(1)
      ->addGroupByTag()
      ->addDescOrder();

    $tags=$collection->getData();

    foreach($tags as $tag)
    {
      var_dump(($tag['name']));
    }


2,为可下载产品产品增加下载链接

$link=Mage::getModel('downloadable/link');
$link->setTitle()
->setPrice
->save()

这个模块自动创建到
downloadable_link
downloadable_link_price
downloadable_link_title
三个表的关联数据

3，静态区块，静态区块脚本和css 的路径用变量没办法，
需要用自定义变量，
比如定义 frd_js ,html内容是  <script src="xxxx"></script>
当然，自定义变量中还是要手写域名地址，没法用变量替换


4,magento 产品文件上传过程：
1，先保存到临时文件夹中，
通过Mage_Adminhtml_Catalog_Product_GalleryController::uploadAction

2，保存产品的时候，保存到/media/catalog/product 真正的目录中
catalog_product_entity_media_gallery 表 保存着链接


\app\code\core\Mage\Catalog\Model\Product\Attribute\Backend\Media.php
_moveImageFromTmp 是返回最终路径

表说明：
catalog_product_entity_media_gallery
value_id 主键
attribute_id eav_attributes 中的主键 (media_gallery)
entity_id  产品的主键
value 值


catalog_product_entity_media_gallery_value
value_id 上表的主键
store_id 商店id
label  标签
postion
disabled


创建两表信息，可以
$product->addImageToMediaGallery($file);
$product->save();

$file是文件名，必须存在



5,magento 自动载入
方法是 Varien_Autoload::autoload()
  根据  _ 拆分类名，
  最后 include $classFile
  但是 include 没有错误返回，即使是文件不存在，一样会载入，而且没有错误，这个不太好


6,模板，布局，模块
例子：
<block type="webinar/mywebinar" name="webinar_mywebinar" as="address" template="webinar/mywebinar.phtml"/>

首先，会根据 type 初始化块的模块，如果失败，没有信息，也不会继续（这里需要仔细检查）
1,检查文件名是否正确
2，检查类名是否正确
3，检查组config.xml中是否有 <blocks><{MODULE}><class>{FRD}_{MODULE}_BLOCK</class></blocks> 这样的配置

然后会调用模板， webinar/mywebinar.phtml
把快的模块对方赋给模板， 模板中 $this 就是 webinar/mywebinar 的类实例

最后模板中需要输出内容！！

as是用来在 模板中 <?php echo $this->getChildHtml('address') ?> 真正输出内容





获取区块内容方式：
$block=new Cobra_Webinar_Block_Mywebinar(); //可以用来测试

$layout =  $this->getLayout(); //在controller中
$type = 'webinar/mywebinar';

$attributes = array(
    'type'     =>  'webinar/mywebinar',
    'name'     =>  'webinar_mywebinar',
    'template' =>  'webinar/mywebinar.phtml'
    );

//echo get_class($layout);
$block = $layout->createBlock($type, null, $attributes);
echo $block->toHtml();



5, 获取网站 ，获取网站的商店 
$object=Mage::app()->getWebsite()->getDefaultStore();
直接获取商店
$object=Mage::app()->getStore();
获取商店分类
$store->getRootCategoryId();

获取分类下的第一级子分类  ，返回“1，2，3，5” 
$category->getChildren(); 

获取分类下的所有子分类  ，返回“1，2，3，5” 
$category->getAllChildren(); 

分类获取产品数目

$category->getProductCount();

分类获取产品列表，只能获取id!

    $collection=($category->getProductCollection());
    foreach($collection as $product)
    {
     echo $product->getId(); 
    }



可下载的产品，保存两次，就会变成 "out of stock",
因为第二次保存的时候， 会检查有没有  getDownloadableData
downloadable 数组，只有在 第一次创建的时候才会有，
第二次不会有，而且这也不是产品的属性，
但是在管理面板编辑是可以的，因为每次都会传递post 数据


      </p>

  