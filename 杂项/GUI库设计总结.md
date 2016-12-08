
  # GUI库设计总结

      version:  1
      created_at:  2016-07-11
      updated_at:  None

      None

      None


      <p>
      主要难点： 
	元素尺寸
	元素位置
	元素的层
	子元素

当元素尺寸，位置变动， 会引起父元素，甚至子元素一起变动，十分复杂，
这是table渲染很慢的主要原因
最好的方式是让元素尽量固定尺寸，wxpython就是这样，需要手动更新
pygameui的方法是当元素变动，调用父元素的resize重新确定子元素位置

pygameui基本设计：
	A类： 元素 
	B类： 布局元素 : hbox, vbox

	布局根据子元素的变动而变动，优点是十分灵活，缺点是性能不好
      </p>

  