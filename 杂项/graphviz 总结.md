
  # graphviz 总结

      version:  1
      created_at:  2016-07-11
      updated_at:  None

      None

      None


      <p>
      		初步指引：  dotguid.pdf
		全面文档 ： http://www.graphviz.org/content/attrs#dpos
		

	使用dot语言， 生成范例： dot -Tpng  skill.gv -o skill.png && showimage  skill.png
	从skill.gv  生成  skill.png

	dot语言中分成两个结构：
		第一部分对整体的描述
		第二部分是对各个节点的描述和节点的关系
		
		节点描述的基本语法：	
		label [ Key1=value1,key2=value2,...]
		
		节点关系图：
		label -> label2 , label3 ;
		label -> label4;
      </p>

  