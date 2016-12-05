
  # php--module_v3

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:46:45 


      None


      <p>
      MODULE_V3
v3 module structure:

app
  -Object
    * object can load/save/edit/delete
     only point to one record in table
 
  -Model
    * model can manage objects

-----------

app/Object/Instance/Config
* loadBy(array: instance_id,locale,identifier)
  ** load config 

* setMeta(k,v)
  set column meta_data item value
* getMeta(k,default=null)
  get column meta_data item value

* save()
  save ,use addWhere to save

* compile()
  create css link for  css type 
  and set src to meta_data 


app/Object/Model/Config
* loadBy(array:app_id,locale,configset_id,identifier) 
** load model config, 
return: true or throw exception

* _loadBy(array:app_id,locale,configset_id,identifier) 
**  load model config
return true or false 

* setMeta(k,v)
** set column meta_data items value

* getMeta(k,default)
** get column meta_data items value

* compile()
** create css file and set src to meta_data

* save()
** save current data,use addWhere

* debugLoadBy(array:app_id,locale,configset_id,identifier)
** print detail records of  loadBy will query 


   


      </p>

  