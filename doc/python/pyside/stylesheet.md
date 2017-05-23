# stylesheet

  QDialog.setStyleSheet("QLabel { color: red } \n QLabel { color: yellow } \n QLabel {font: 14pt "WenQuanYi Micro Hei Mono";} \n QLineEdit { background: yellow }\n")


  注意：
    1. 样式后面不要加分号
    2. 选择器针对类名， 其它的暂时不知道
    3. 子元素会继承样式，如果没有继承，就是样式有错误，比如多了分号
    4. QT Designer 中增加的样式默认是没有选择器的，需要自己加上



    linkLabel->setText("<style> a {text-decoration: none} </style> <a href=\"http://blog.csdn.net/fron_csl\">linkLabelTest");

    这种方法是直接写入到text中来去除样式
