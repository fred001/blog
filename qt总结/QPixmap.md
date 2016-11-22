QPixmap

copy()
fromImage()
grabWidget()
grabWIndow()
Load()
save()
toImage()


import sys
from PyQt4.QtCore import *
from PyQt4.QtGui import *

def window():
   app = QApplication(sys.argv)
   win = QWidget()
   l1 = QLabel()
   l1.setPixmap(QPixmap("python.jpg"))
	
   vbox = QVBoxLayout()
   vbox.addWidget(l1)
   win.setLayout(vbox)
   win.setWindowTitle("QPixmap Demo")
   win.show()
   sys.exit(app.exec_())
	
if __name__ == '__main__':
   window()
