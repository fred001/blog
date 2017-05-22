# gitbook 安装



#### 安装npm  

    #yum -y install npm

#### 安装 nrm

    #npm install nrm -g

#### 安装 gitbook

这里最重要的是安装的是gitbook-cli ,而不是gitbook (此是旧版)
    
    #npm install gitbook-cli -g 


#### 更新gitbook

    这里不再用root帐号，是普通帐号，需要update
    每个帐号都要自己update,因为最终的gitbook会安装在用户目录/.gitbook中


    $gitbook update

    
#### 使用 gitbook

  在空白目录使用 

    $gitbook init (创建基本文件)
    $gitbook build (从基本文件创建出需要的文件和目录)
    $gitbook serve (监听本地4000端口，可以通过127.0.0.1:4000查看效果)
  
