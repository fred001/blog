
  # php--acl

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:47:47 


      None


      <p>
      ACL
Zend_Acl :
  理论上acl支持无限级权限
  实际上应用起来不方便

  因为资源名必须唯一
  allow 函数,也只提供2级查询

  所以实际上acl用来实现2级比较方便
  通过不同acl,实现多级
  对应框架的 module,controller,action,刚好合适



  ACL三级权限:

  表:
   resource
    id
    tree_level //1是最高级 module
    module
    controller
    action

  foreach($resources as $resource)
  {
    $acl=$$resurce['name']=new Acl();

    get all type = controller

    foreach($relations as $relateion)
    {
        $acl->allow($controller,$module);
    }


    get all type = action
    foreach($relations as $relateion)
    {
        $acl->allow($action,$controller);
    }
  }


  角色类似
  角色可以无限级别,因为角色名称一般不会重复
  资源是很可能重名的

  role:
  id
  name

  role_relateion:
  id
  tree_level //哪一个等级,角色实例化按照等级来
  app
  parent_name
  name



  role_resource_relation
    role,
    resource
    sub resource
    type : allow ,deny
  创建ACL

  1,给出name (backend)
  2,查询资源关系
    from resource where module='backend' and type='controller';
    $acl->addResource(controller,module)

    from resource where module='backend' and type='action';
    $acl->addResource(action,controller)

  3,Define tree depth
  select order order by tree_level
      if has parent_name
        $acl->addRole('role',parent_name)
      else
        $acl->addRole('role')

      </p>

  