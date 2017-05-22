
  # magento--magento_api.

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:08:42 


      None


      <p>
      MAGENTO_API
使用API准备工作：(SOAP)
1，创建api账号
2，选择soap库
3, 使用

1，system->webserver 
创建一个 role,和 user
这个user 就是api连接时登陆的账号，
api key相当于密码

2，假设使用Zend_Soap

Zend_Soap用法： 
 call($session,$method,array(参数1，参数2，参数3，array(参数1，参数2)));
 参数是所有合并成一个数组！！！，如果编辑不成功，很可能因为这个原因
 返回true表示调用成功，不表示一定执行成功
3, 初始化

  soap 方法的地址是 
{你的magneto域名}/api/?wsdl
可以先在浏览器中访问这个地址，如果能正常显示 一个xml文档，就说明可以使用



代码例子：
$url="http://magento.test.info/index.php/api/?wsdl";
$client = new Zend_Soap_Client($url,
    array('compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_DEFLATE));

$session = $client->login('apiroot', 'rootkey');
$result = $client->call($session, 'product_attribute_set.list');
var_dump($result);
$client->endSession($session);


API 详细说明

@Customer API

Resource Name: customer

Methods:

* customer.list - Retrieve customers
* customer.create - Create customer
* customer.info - Retrieve customer data
* customer.update - Update customer data (will not update password!)
* customer.delete - Delete customer

@Customer's Groups API

Resource Name: customer_group

Methods:

  * customer_group.list - Retrieve customer’s groups

@Customer Address API

  Resource Name: customer_address

  Methods:

  *
  customer_address.list - Retrieve customer addresses
  *
  customer_address.create - Create customer address
  *
  customer_address.info - Retrieve customer address
  *
  customer_address.update - Update customer address
  *
  customer_address.delete - Delete customer address

  Mage_Directory

  Allows to retrieve countries and regions from magento.

  API resources:
  Country API

  Resource Name: directory_country

  Aliases:

  *
  country

  Methods:

  *
  directory_country.list - List of countries

  Region API

  Resource Name: directory_region

  Aliases:

  *
  region

  Methods:

  *
  directory_region.list - List of regions in specified country

  Mage_Catalog

  ... Allows to export/import categories and products from/into Magento ...

  API resources:
  Category API

  Resource Name: catalog_category

  Aliases:

  *
  category

  Methods:

  *
  catalog_category.currentStore - Set/Get current store view
  *
  catalog_category.tree - Retrieve hierarchical tree
  *
  catalog_category.level - Retrieve one level of categories by website/store view/parent category
  *
  catalog_category.info - Retrieve category data
  *
  catalog_category.create - Create new category
  *
  catalog_category.update - Update category
  *
  catalog_category.move - Move category in tree
  *
  catalog_category.delete - Delete category
  *
  catalog_category.assignedProducts - Retrieve list of assigned products
  *
  catalog_category.assignProduct - Assign product to category
  *
  catalog_category.updateProduct - Update assigned product
  *
  catalog_category.removeProduct - Remove product assignment

  Category attributes API

  Resource Name: catalog_category_attribute

  Aliases:

  *
  category_attribute

  Methods:

  *
  catalog_category_attribute.currentStore - Set/Get current store view
  *
  catalog_category_attribute.list - Retrieve category attributes
  *
  catalog_category_attribute.options - Retrieve attribute options

  Product API

  Resource Name: catalog_product

  Aliases:

  *
  product

  Methods:

  * catalog_product.currentStore - Set/Get current store view

  说明：获取当前商店view Id
  用法:  call(SESSION,METHOD,{ID:可选}
        不传参数，获取Id
        传参数,设置 id,如果不存在，会抛出错误

  * catalog_product.list - Retrieve products list by filters
  * catalog_product.info - Retrieve product
  说明：获取产品信息
  用法：call(SESSION,METHOD,array({ID or SKU},{STORE_VIEW_ID},{ATTRIBUTES|可选}))
  详细： {STORE_VIEW_ID} 不存在似乎也可以

  Return: array
  Arguments:
  * mixed product - product ID or Sku
  产品id或者sku
  * mixed storeView - store view ID or code (optional)
   商店view
  * array attributes - list of attributes that will be loaded (optional)
  需要获取的属性



  * catalog_product.create - Create new product
  说明：创建一个产品
  用法：call(SESSION,METHOD,"{SKU}",{ATTRIBUTES:array})
  详细：SKU必须是唯一的，ATTRIBUTES  是一个数组，包含需要设置的产品属性，
   有些必须的属性，即使不设置也没关系
  返回：好像没有返回

  * catalog_product.update - Update product
  说明： 更改产品信息
  用法: call(SESSION,METHOD,{SKU or ID},{STORE_VIEW_ID},{ATTRIBUTES}
  详细：attributes 使用数组格式 array('price'=>100) 无效
  * catalog_product.setSpecialPrice - Set special price for product
  说明：设置特别价格，属性都是可选
  用法：call(SESSION,METHOD,array({ID or SKU},{PRICE|可选}，{Form Date|可选},{To Date|可选},{Store View(id or code)|可选|数组)）
  详细：
  返回true不一定是设置成功，只是表示调用成功


  * catalog_product.getSpecialPrice - Get special price for product
  说明：获取特别价格，还有相关属性（开始时间，结束时间，商店，网站）
  用法：call(SESSION,METHOD,{ID or SKU}
  返回：数组，包含一系列信息
  详细：使用id可以获取，没有试过SKU

  * catalog_product.delete - Delete product
  说明：删除一个产品
  用法：call(SESSION,METHOD,{SKU or ID})
  详细：测试过ID,正常 没有试过SKU

  Product attributes API

  Resource Name: catalog_product_attribute

  Aliases:

  *
  product_attribute

  Methods:

  *
  catalog_product_attribute.currentStore - Set/Get current store view
  *
  catalog_product_attribute.list - Retrieve attribute list
  *
  catalog_product_attribute.options - Retrieve attribute options

  Product attribute sets API

  Resource Name: catalog_product_attribute_set

  Aliases:

  * product_attribute_set

  Methods:

  * catalog_product_attribute_set.list - Retrieve product attribute sets
  说明：获取所有 属性集的id和name
  用法：call($session,"catalog_product_attribute_set.list")
  返回：一个数组，array(
      0=>array('set_id'=>'1','name'='Image')
      1=>array('set_id'=>'9','name'='Default')
      );

  Product types API

  Resource Name: catalog_product_type

  Aliases:

  *
  product_type

  Methods:

  *
  catalog_product_type.list - Retrieve product types

  Product Images API

  Resource Name: catalog_product_attribute_media

  Aliases:

  *
  product_attribute_media
  *
  product_media

  Methods:

  *
  catalog_product_attribute_media.currentStore - Set/Get current store view
  *
  catalog_product_attribute_media.list - Retrieve product image list
  *
  catalog_product_attribute_media.info - Retrieve product image
  *
  catalog_product_attribute_media.types - Retrieve product image types
  *
  catalog_product_attribute_media.create - Upload new product image
  *
  catalog_product_attribute_media.update - Update product image
  *
  catalog_product_attribute_media.remove - Remove product image

  Product Tier Price API

  Resource Name: catalog_product_attribute_tier_price

  Aliases:

  *
  product_attribute_tier_price
  *
  product_tier_price

  Methods:

  *
  catalog_product_attribute_tier_price.info - Retrieve product tier prices
  *
  catalog_product_attribute_tier_price.update - Update product tier prices

Product links API (related, cross sells, up sells, grouped)

  Resource Name: catalog_product_link

  Aliases:

  *
  product_link

  Methods:

  *
  catalog_product_link.list - Retrieve linked products
  *
  catalog_product_link.assign - Assign product link
  *
  catalog_product_link.update - Update product link
  *
  catalog_product_link.remove - Remove product link
  *
  catalog_product_link.types - Retrieve product link types
  *
  catalog_product_link.attributes - Retrieve product link type attributes

  Mage_Sales

  ... Allows to export/import sales orders from/into Magento, to create invoices, shipments, credit memos ...
  Order API

  Resource Name: sales_order

  Aliases:

  *
  order

  Methods:

  *
  sales_order.list - Retrieve list of orders by filters
  *
  sales_order.info - Retrieve order information
  *
  sales_order.addComment - Add comment to order
  *
  sales_order.hold - Hold order
  *
  sales_order.unhold - Unhold order
  *
  sales_order.cancel - Cancel order

  Shipment API

  Resource Name: sales_order_shipment

  Aliases:

  *
  order_shipment

  Methods:

  *
  sales_order_shipment.list - Retrieve list of shipments by filters
  *
  sales_order_shipment.info - Retrieve shipment information
  *
  sales_order_shipment.create - Create new shipment for order
  *
  sales_order_shipment.addComment - Add new comment to shipment
  *
  sales_order_shipment.addTrack - Add new tracking number
  *
  sales_order_shipment.removeTrack - Remove tracking number

  *
  sales_order_shipment.getCarriers - Retrieve list of allowed carriers for order

  Invoice API

  Resource Name: sales_order_invoice

  Aliases:

  *
  order_invoice

  Methods:

  *
  sales_order_invoice.list - Retrieve list of invoices by filters
  *
  sales_order_invoice.info - Retrieve invoice information
  *
  sales_order_invoice.create - Create new invoice for order
  *
  sales_order_invoice.addComment - Add new comment to shipment
  *
  sales_order_invoice.capture - Capture invoice
  *
  sales_order_invoice.void - Void invoice
  *
  sales_order_invoice.cancel - Cancel invoice

  Mage_CatalogInventory

  ... Allows to update stock attributes (status, quantity) ...
  Inventory API

  Resource Name: cataloginventory_stock_item

  Aliases:

  *
  product_stock

  Methods:

  *
  cataloginventory_stock_item.list - Retrieve stock data by product ids
  *
  cataloginventory_stock_item.update - Update product stock data

      </p>

  