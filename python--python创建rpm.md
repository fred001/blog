
  # python--python创建rpm

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:49:52 


      None


      <p>
      PYTHON创建RPM
rpm本身操作略麻烦，通过python来自动创建，非常方便

参考： http://docs.python.org/2/distutils/builtdist.html

1, 创建一个工作目录
2，把需要的文件都放到工作目录中，
3， 创建 setup.py
  内容例子：
      1 from distutils.core import setup
	  2 
	  3 setup(name="focus",
	  4     version="0.1",
	  5     scripts=["focus.py"] )
4，创建包， 包可以用不同格式，并不限于 rpm
   python setup.py  bdist --format=rpm
其它格式还有： tar,gztar,zip
还支持windows的 msi格式，但是可能有环境要求,具体查看文档

创建 msi,估计需要windows平台， 还有 msilib，
5， 然后可以在工作目录中找到一个新增的目录   dist,里面是创建好的各种格式的文件，很方便！

      </p>

  