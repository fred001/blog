
  # 目标-array_validator

      version:  1
      created_at:  2016-03-15
      updated_at:  None

      created at 2016-03-15 15:10:47 


      None


      <p>
      ARRAY VALIDATOR
array validate:

	$array
	$validates=array(
		key=> array(
			type: 
			params:		
		)
	)

foreach($validates as $key=>$validate)
{
	if(get_array_value($array,$key) === null)
	{
		not exists
		continue
	}

	$validator=getValidator(type,$params)
	if( $validator->valid($value) == false:
		return msg

}



functions:
	get_array_value
	is_valid(value,type,params)

	返回  true  or  false

	

      </p>

  