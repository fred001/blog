
  # ZF2代码阅读

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:30:05 


      None


      <p>
      ZF2代码阅读

apigility - DoctrineObject 怎么调用的？

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
结论： 
    返回的数组，值为object(是类） 并且类名在 zf-ha.metadata_map 中的，才会进行metadata_map的处理
    


~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 


vendor/zfcampus/zf-hal/src/Plugin/Hal.php:542
 542     public function renderEntity(Entity $halEntity, $renderEntity = true)
	
	1, 获取 metadata_map  (zfhal.metadata_map)
        2,  可能调用 metadata_map 进行处理

	 557         foreach ($entity as $key => $value) {


	 558             if (is_object($value) && $metadataMap->has($value)) {


	 559                 $value = $this->createEntityFromMetadata(
	 560                     $value,
	 561                     $metadataMap->get($value),
	 562                     $this->getRenderEmbeddedEntities()
	 563                 );
	 564             }


		$metadtaMap->has($value):

	vendor/zfcampus/zf-hal/src/Metadata/MetadataMap.php:100
	100     public function has($class)
101     {
102         if (is_object($class)) {
103             $className = get_class($class);
104         } else {
105             $className = $class;
106         }
107 
108         if (array_key_exists($className, $this->map)) {
109             return true;
110         }
111 
112         if (get_parent_class($className)) {
113             return $this->has(get_parent_class($className));
114         }
115 
116         return false;
117     }


	获取这个对象的类名

	$metadataMap->get($value)

	vendor/zfcampus/zf-hal/src/Metadata/MetadataMap.php:127

		127     public function get($class)
128     {
129         if (is_object($class)) {
130             $className = get_class($class);
131         } else {
132             $className = $class;
133         }
134 
135         if (isset($this->map[$className])) {
136             return $this->getMetadataInstance($className);
137         }
138 
139         if (get_parent_class($className)) {
140             return $this->get(get_parent_class($className));
141         }
142 
143         return false;
144     }

	获取这个对象的metadata 实例，应该是定义在配置中



 560                 $value = $this->createEntityFromMetadata(
 561                     $value,
 562                     $metadataMap->get($value),
 563                     $this->getRenderEmbeddedEntities()
 564                 );

	这是最后的结果
	

      </p>

  