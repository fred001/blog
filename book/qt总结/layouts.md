# layouts


分成三种布局：
    盒布局:
        QHBoxLayout
        QVBoxLayout
            addWidget()
            addStretch()
            addLayout()


        import sys
        from PyQt4.QtCore import *
        from PyQt4.QtGui import *

        def window():
          app = QApplication(sys.argv)
          win = QWidget()

          b1 = QPushButton("Button1")
          b2 = QPushButton("Button2")

          vbox = QVBoxLayout()
          vbox.addWidget(b1)
          vbox.addStretch()
          vbox.addWidget(b2)
          win.setLayout(vbox)

          win.setWindowTitle("PyQt")
          win.show()
          sys.exit(app.exec_())

        if __name__ == '__main__':
          window()


              
    表格布局
        QGridLayout
            addWidget(QWidget, int r, int c)
            addWidget(QWidget, int r , int c, int rowspan,int columnspan)
            addLayout(QLayout,int r, int c)


          import sys
          from PyQt4.QtCore import *
          from PyQt4.QtGui import *

          def window():
            app = QApplication(sys.argv)
            win = QWidget()
            grid = QGridLayout()

            for i in range(1,5):
            for j in range(1,5):
            grid.addWidget(QPushButton("B"+str(i)+str(j)),i,j)

            win.setLayout(grid)
            win.setGeometry(100,100,200,100)
            win.setWindowTitle("PyQt")
            win.show()
            sys.exit(app.exec_())

          if __name__ == '__main__':
            window()


    表单局部（相当于2列表格）
    QFormLayout
        addRow(QLabel,QWidget)
        addRow(QLabel,QLayout)
        addRow(QWidget)



	import sys
	from PyQt4.QtCore import *
	from PyQt4.QtGui import *

	def window():
	   app = QApplication(sys.argv)
	   win = QWidget()

	   l1 = QLabel("Name")
	   nm = QLineEdit()

	   l2 = QLabel("Address")
	   add1 = QLineEdit()
	   add2 = QLineEdit()
	   fbox = QFormLayout()
	   fbox.addRow(l1,nm)
	   vbox = QVBoxLayout()

	   vbox.addWidget(add1)
	   vbox.addWidget(add2)
	   fbox.addRow(l2,vbox)
	   hbox = QHBoxLayout()

	   r1 = QRadioButton("Male")
	   r2 = QRadioButton("Female")
	   hbox.addWidget(r1)
	   hbox.addWidget(r2)
	   hbox.addStretch()
	   fbox.addRow(QLabel("sex"),hbox)
	   fbox.addRow(QPushButton("Submit"),QPushButton("Cancel"))

	   win.setLayout(fbox)
	   
	   win.setWindowTitle("PyQt")
	   win.show()
	   sys.exit(app.exec_())

	if __name__ == '__main__':
	   window()

