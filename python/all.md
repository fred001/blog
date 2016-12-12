## __init__.py

  1. 有此文件的目录才能成为模块
  2. 文件中可以定义  
    __all__ = ["Module1", "Module2", "subPackage1", "subPackage2"]

    from PACKAGE import *  #自动导入定义的这些包



## sys.path

    在shell中执行
    PYTHONPATH=....
    export PYTHONPATH

    那么就会被加入到 sys.path中了

    自动的话把代码加到.bashrc中


