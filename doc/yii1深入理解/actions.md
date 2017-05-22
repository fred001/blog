## controller 中的 actions() 方法用途

web/CController.php :  
  417 $action=$this->createActionFromMap($this->actions(),$actionID,$actionID);
  此方法中获取对应配置的class ,然后调用 run() 方法执行之



