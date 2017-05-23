QFontDialog

import sys
from PyQt4.QtCore import *
from PyQt4.QtGui import *

class fontdialogdemo(QWidget):
   def __init__(self, parent = None):
      super(fontdialogdemo, self).__init__(parent)
		
      layout = QVBoxLayout()
      self.btn = QPushButton("choose font")
      self.btn.clicked.connect(self.getfont)
		
      layout.addWidget(self.btn)
      self.le = QLabel("Hello")
		
      layout.addWidget(self.le)
      self.setLayout(layout)
      self.setWindowTitle("Font Dialog demo")
		
   def getfont(self):
      font, ok = QFontDialog.getFont()
		
      if ok:
         self.le.setFont(font)
			
def main():
   app = QApplication(sys.argv)
   ex = fontdialogdemo()
   ex.show()
   sys.exit(app.exec_())
	
if __name__ == '__main__':
   main()
