# widgets

QLabel
  signal  : linkActivated, linkHovered
  methods:
    setText (内容可以是简单的html)
    toPlainText
    toHtml

      label.setOpenExternalLinks(True) #允许label中的链接直接被打开




QLineEdit
  signal:  editingFinished
  methods:
    setText
    text()

QPushButton
  signal:  clicked
  
  methods:
    setCheckable()
    toggle
    setion
    setEnabled()
    isChecked()
    setDefault()
    setText()
    text()

QButtonGroup:
  用来把一组radio, checkbox 等放在一起
  它本身不负责布局，布局需要另外的layout来处理(比如hboxlayout)
  理论上这些button 可以放在任何地方

  信号： 
    pressed
    released
    clicked

  常用方法： 
    setExclusive(bool) 默认估计是true, 但是对于checkbox ，需要是false
    checkedButton() 返回选中的按钮
    checkedId() 返回选中的按钮id
  



QRadioButton
  signal:
  methods:
    setChecked(True | False)
    setText(STRING)
    text()  # == getText()
    isChecked()

QCheckBox
  signal: stateChanged, toggled
  methods:
    setChecked
    setText()
    text()
    isChecked()
    setTriState()

QComboxBox:
  signal: currentIndexChanged
  methods:
      activated()
      currentIndexChanged()
      hightlighted()
      addItem("C++")
      setCurrentIndex(2)
      
QCalendarWidget:
  signalL
  methods:
    selectedDate() //返回的QDate(2017,11,11)

这三个是个单行控件， 选择其中一个字段， 点击右侧上下箭头增减数字
QDateTimeEdit //日期+时间
QDateEdit //日期
QTimeEdit //时间
    


QColorDialog:
  dialog=QColorDialog(parent=widget) //创建 对话框
  print dialog.getColor() //打开对话框并获得结果



QSpinBox
  signal: valueChanged
  methods:
      setMinimum()
      setMaximum()
      setRange()
      setValue()
      Value()
      singleStep()
      setText()

QSlider
  singal: valueChanged
  methods:
    valueChanged()
    sliderPressed()
    sliderMoved()
    sliderReleased()
      
QMenuBar,QMenu,QActive

import sys
from PyQt4.QtCore import *
from PyQt4.QtGui import *

class menudemo(QMainWindow):
     def __init__(self, parent = None):
             super(menudemo, self).__init__(parent)
                
                   layout = QHBoxLayout()
        bar = self.menuBar()
        file = bar.addMenu("File")
              file.addAction("New")
                  
                    save = QAction("Save",self)
                          save.setShortcut("Ctrl+S")
                                file.addAction(save)
      
        edit = file.addMenu("Edit")
              edit.addAction("copy")
                    edit.addAction("paste")
                        
                          quit = QAction("Quit",self) 
                                file.addAction(quit)
        file.triggered[QAction].connect(self.processtrigger)
        self.setLayout(layout)
        self.setWindowTitle("menu demo")
            
           def processtrigger(self,q):
                   print q.text()+" is triggered"
                      
                   def main():
                        app = QApplication(sys.argv)
                           ex = menudemo()
                           ex.show()
                           sys.exit(app.exec_())
                          
                        if __name__ == '__main__':
                           main()

QToolBar

  addAction()
  addSeperator()
  addWidget()
  addToolBar()
  setmovable()
  setOrientation()
    

  import sys
  from PyQt4.QtCore import *
  from PyQt4.QtGui import *

  class tooldemo(QMainWindow):
       def __init__(self, parent = None):
               super(tooldemo, self).__init__(parent)
                     layout = QVBoxLayout()
                     tb = self.addToolBar("File")
                  
                     new = QAction(QIcon("new.bmp"),"new",self)
                           tb.addAction(new)
      
        open = QAction(QIcon("open.bmp"),"open",self)
              tb.addAction(open)
        save = QAction(QIcon("save.bmp"),"save",self)
              tb.addAction(save)
        tb.actionTriggered[QAction].connect(self.toolbtnpressed)
        self.setLayout(layout)
        self.setWindowTitle("toolbar demo")
            
           def toolbtnpressed(self,a):
                   print "pressed tool button is",a.text()
                      
                   def main():
                        app = QApplication(sys.argv)
                           ex = tooldemo()
                           ex.show()
                           sys.exit(app.exec_())
                          
                        if __name__ == '__main__':
                           main()




dialog=QFileDialog(parent=self)
  if dialog.exec_():
  print dialog.selectedFiles()



LAYOUT:
  addStretch(1) //增加一个能自动伸展的空白元素
    否则控件中可以自动伸展的元素就伸展了


