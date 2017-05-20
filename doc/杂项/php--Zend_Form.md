
  # php--Zend_Form

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:47:13 


      None


      <p>
      ZEND_FORM
Zend_Form:
  表单的提交和验证放在一个动作里,
  这样信息回填比较容易
    if($form->isValid($_POST) == false)
    {
    
      //echo $form;
      $this->view->form=$form;
      //return $this->render($form);
    }
    

  po;ulate($data);
  可以填充数据,$data是数组,
  不许可在表单中 setValue

  校验器:
    校验器是 Zend_Validate
    包括

    必须:setRequired
    整数或者字母:Alnum 
      addValidator('alnum');

    字母: Alpha
    条码: Barcode
    值范围:Between: 
    LUhn算法: Ccnum
    日期: 
    整数:
    Email地震:



      </p>

  