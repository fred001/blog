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


