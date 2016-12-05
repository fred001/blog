
  # bootstrap

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:05:03 


      None


      <p>
      BOOTSTRAP
datepicker plugin:

下载和参数：
	http://eternicode.github.io/bootstrap-datepicker/?markup=input&format=&weekStart=&startDate=&endDate=&startView=0&minViewMode=0&todayBtn=false&language=en&orientation=auto&multidate=&multidateSeparator=&keyboardNavigation=on&forceParse=on#sandbox


demo:
	http://runnable.com/U2C3z7peEpJ87YGN/output

使用：
	因为html5已经有 date类型的input了， chrome和opera支持，所以最好通过modernizr检测下

	if modernizr.inputtypes.date == false
		$('[type=date]').datepicker({...})

      </p>

  