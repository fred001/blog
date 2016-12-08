
  # Python基础教程

      version:  1
      created_at:  2016-01-22
      updated_at:  None

      created at 2016-01-22 15:26:03 


      None


      <p>
      Python基础教程
类别

内容简介

评分

开始阅读时间
2014-08-18
粗读完成时间

精读完成时间

完成阅读时间




	1.这本书到底在谈什么？关于什么的？
		
		
	2.作者细部说了什么，怎么说的？ 
	


	3.这本书有道理吗，是部分还是全部有道理？ 
	4.这本书和我什么关系？对我有用处吗？用处大还是小？ 






读取输入： name=raw_input('...')

“”“
”“”

列表：[1,2,3,4]
元组：(1,2,3,4)
字典：{'a':'1'}


创建类： 
class Person(Creature,Behieve):
	count=0  #static number

	def init(-self):
		pass

	def setName(self,name):
		self.name=name

person=Person();
person.setname(“Luke”);


异常：
	raise Exception

	try:
		....
	except TypeError:
		pass

	except (ZeroDivisionErro), e:
		print e
	except:
		pass

	else:
		ok

	finally:
		print 'finally'


魔术方法：
	__init__
		super(SongBird,self).__int()

	__getitem__(self,key)
	__setitem__(self,key,value)
	__delitem__(self,key)


class Rectangle:
	def __init__(self):
		self.width=0
		self.height=0
	def setSize(self,size):
		self.width,self.height=size
	def getSize(self):
		return self.width,self.height

	size=property(getSize,setSize)

	r=Rectangle();
	r.size  #很神奇，


	静态方法
	class Myclass:
		@staticmethod  
		def smethd():
			print “this is a static method'


模块：
	内部怎么引用内部其它模块？
	设置sys.path ?
      </p>

  