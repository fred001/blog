## openssl 加密初级整理
  1. 生成私钥  openssl genrsa -out rsa_private_key.pem 1024   
  2. 生成公钥  openssl rsa -in rsa_private_key.pem -pubout -out rsa_public_key.pem

  测试的时候注意用同一对


## git tag
    本质就是一个commit的标志，没有什么特别的，对commit如何操作，这个大多也能操作

    创建TAG
    git tag -a TAGNAME -m "TAG COMMENT"

    推送TAG
    git push --tags
    

    获取对应TAG的代码 并创建本地的分支
    git checkout -b TABNAME



