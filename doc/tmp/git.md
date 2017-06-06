# GIT 简要笔记

        version:  2
        created_at:  2016-01-02
        updated_at:  2016-04-18 12:54:02
        history:
          update at   2017-05-25
#### 配置
  [push]
    default = simple
  [user]
    name = renyj,
    email = renyj@anchu.com,
  [core]
    quotepath = false
  [diff]
    tool = vimdiff
  [difftool]
    prompt = false
  [alias]
    d = difftool
  [color]
    ui = true

#### 简介
      	git是个很不错的版本管理工具。胜在简单和灵活。 svn内置3个分支，必须按照它的开发模式来。而git完全可以不用。git另外好处是创建分支很轻松，当然需要配合功能上的分离才能享受此优点。多数时候git可以本地工作。 基础的应用只需要了解很少的命令，非常容易。

	如果说有缺点，那么缺点是子模块， 当一个项目中应用了另一个git项目，那么怎么管理这个子的git源呢， 这是个麻烦的事。 git中有 子模块概念，然而实际上难以使用。 我的策略是通过 .gitignore屏蔽掉内部的git源，如此放弃子模块的概念，完全当成几个git源合并一起工作。

	用了这么久，我甚至已经忘记了svn的用法。

## 基本操作


创建仓库 git init --bare  
克隆仓库到本地 git clone REPO  LOCAL_PATH         
拉取远程更新 git pull origin master
推送本地更新到远程 git push origin {master}
查看本地状态  git status 
添加修改到本地暂存区  git add . 
撤回添加操作   git reset
提交本地修改到暂存区  git commit -m "i am a comment!"         

查看本地分支 git branch                     
查看远程分支）（如果还是看不到就先 git fetch origin 先） git branch -r  
获取远程分支，并创建对应本地分支，然后切换过去 git checkout -b develop origin/develop
删除本地分支 git branch -d  BRANCH_NAME     
查看所有分支，包括远程分支 git branch -a  
创建远程分支  git push origin test  
删除远程分支 git push origin --delete test













#### 创建仓库
git init         //本目录可使用git操作    ,本目录可以提交
git init --bare  //本目录不可使用git操作   ,仅仅是仓库


#### 仓库操作
git clone REPO  LOCAL_PATH         //克隆远程仓库到本地
git fetch [ REMOTE_NAME  (origin )]
git pull REMOTE_NAME LOCAL_NAME   //拉取远程仓库
git push REMOTE_NAME LOCAL_BRANCH        //推送到远程仓库


git remote  //查看远程仓库 
git remote -v  //查看远程仓库 详细模式
git remote add REMOTE_NAME  REPO // 添加远程仓
git remote rm REMOTE_NAME //删除远程仓库
git remote set-url --push [name] [newUrl]   //修改远程仓库
git remote rename REMOTE_NAME  NEW_REMOTE_NAME //重命名远程仓库



常规操作
git log                //
git status              //
git status -s           //精简方式输出

git diff (show git add diff)//
git diff  --cached  (show diff git commit )//

git add PATH   //增加某个文件或目录，也可用通配符
git add *    //有.gitignore 的时候，会失败
git add -u  //仅仅把修改过的文件添加进去，  新增文件， 直接删除的文件不会处理
git add -A  //添加当前所有修改， 不会和.gitignore 冲突, 也添加新增文件，删除的文件（不是用git rm删除的）

git commit //
git commit -m "COMMENT"         //
git commit -a -m "COMMENT"  //添加当前所有修改，并提交,不会主动添加  新文件

git rm PATH 
git mv PATH   NEW_PATH   //
git rm --cached  PATH  // 把 commit 后的文件删掉


git reset HEAD  PATH  // 把已暂存的某路径恢复到已修改
git commit --amend    //编辑最后一次commit，可用来撤销


git revert VERSION   //还原一个版本的修改，git revert bbaf6fb5060b4875b18ff9ff637ce118256d6f20



分支操作
git branch                     // 查看本地分支
git branch BRANCH_NAME         // 创建分支 ----注意新分支创建后不会自动切换为当前分支
git checkout  BRANCH_NAME      // 切换分支
git checkout -b BRANCH_NAME    //创建新分支并立即切换到新分支

git branch -d  BRANCH_NAME     //删除分支
git branch -D  BRANCH_NAME     //强行删除分支，即使它没有merge

git branch -r  //查看远程分支）（如果还是看不到就先 git fetch origin 先）
git branch -a  //查看所有分支，包括远程分支

  git fetch origin mobile:mobile   获取远程分支 并在本地创建同名分支，但是没有切换过去
  git checkout -b local-branchname origin/remote_branchname 获取远程分支 


git symbolic-ref HEAD refs/heads/[name] ; rm .git/index ; git clean -fdx  // 创建空的分支：(执行命令之前记得先提交你当前分支的修改，否则会被强制删干净没得后悔)


git merge [name]   //  合并分支  将名称为[name]的分支与当前分支合并
git rebase -i HEAD~2  // 合并最后的2个提交, 数字2按需修改即可（如果需提交到远端$ git push -f origin master 慎用！）

git push origin test  创建远程分支( test本地分支push到远程)
  git push origin test:master         // 提交本地test分支作为远程的master分支
  git push origin test:test              // 提交本地test分支作为远程的test分支

  git push origin --delete <branchName>  //  删除远程分支
  git push origin :<branchName>  //  删除远程分支
  git push origin :heads/[name]  //  删除远程分支



  tag操作
  git tag                //查看所有本地tag 
  git tag TAGNAME        //创建轻量级tag
  git tag -a TAGNAME  -m "COMMENT"   //创建重量级tag

  git tag -d  TAGNAME             //删除本地tag

  git tag -r     
  // 查看远程版本 tag
  git push origin [name]                     // 创建远程版本(本地版本push到远程)
  git push origin --tags                     //上传本地所有tag到远程仓库

  git pull origin --tags                     // 合并远程仓库的tag到本地：
  git fetch origin tag  TAGNAME               // 获取远程tag 到本地

  git push origin --delete tag <tagname>   //删除远程tag
  git push origin :refs/tags/<tagname>     //删除远程tag


  stash操作

  git add -a ; git stash  //保存当前修改到堆栈
  git stash apply //(恢复最近的修改）
  git stash list //(查看堆栈）
  git stash pop //(恢复最近的修改）
  git stash drop ID  //删除一个
  git stash clear // 删除所有
  git stash apply stash@{1}’  //恢复指定的stash


  子模块(submodule):


#添加子模块
    git submodule add [url] [path]   #git submodule add git://github.com/soberh/ui-libs.git src/main/webapp/ui-libs


    git submodule init  初始化子模块 # ----只在首次检出仓库时运行一次就行
    git submodule update 更新子模块  #   ----每次更新或切换分支后都需要运行一下

#删除子模块：（分4步走哦）
    1) git rm --cached [path]
    2) 编辑“.gitmodules”文件，将子模块的相关配置节点删除掉
    3) 编辑“ .git/config”文件，将子模块的相关配置节点删除掉
    4) 手动删除子模块残留的目录





    ===========




    -----------------------------------------
    http://git-scm.com/docs

    git init, git init --bare 区别

    git init 直接在当前目录下创建repo, 同时也可以直接在此目录进行 git 操作
    这样的问题是，别处push过来，    
    git push origin master:master
    当本地有修改，就无法成功了，
    所以默认是不准push的，
    需要允许，就需要修改  .git/config 的配置

    git init --bare 纯粹创建一个repo,创建的repo无法进行git操作，所以一般名称以   .git 结尾




    其它：


    6）后悔药
    删除当前仓库内未受版本管理的文件：$ git clean -f
    恢复仓库到上一次的提交状态：$ git reset --hard
    回退所有内容到上一个版本：$ git reset HEAD^
    回退a.py这个文件的版本到上一个版本：$ git reset HEAD^ a.py
    回退到某个版本：$ git reset 057d 
    将本地的状态回退到和远程的一样：$ git reset –hard origin/master  
    向前回退到第3个版本：$ git reset –soft HEAD~3

    7）Git一键推送多个远程仓库
    编辑本地仓库的.git/config文件：
    [remote "all"]
    url = git@github.com:dragon/test.git
    url = git@gitcafe.com:dragon/test.git
    这样，使用git push all即可一键Push到多个远程仓库中


    迄今，我已经使用Git很长一段时间了，考虑分享一些不管你是团队开发还是个人项目，都受用的高级git命令。
    1. 输出最后一次提交的改变

  这个命令，我经常使用它 来发送其他没有使用git的人来检查或者集成所修改的。它会输出最近提交的修改内容到一个zip文件中。
1	git archive -o ../updated.zip HEAD $(git diff --name-only HEAD^)

  2. 输出两个提交间的改变

  类似的，如果你需要输出某两个提交间的改变时，你可以使用这个。
1	git archive -o ../latest.zip NEW_COMMIT_ID_HERE $(git diff --name-only OLD_COMMIT_ID_HERE NEW_COMMIT_ID_HERE)
  Lesus
  Lesus
  翻译于 2个月前


  如果你渴望只克隆远程仓库的一个指定分支，而不是整个仓库分支，这对你帮助很大。
  1	git init
  2	git remote add -t BRANCH_NAME_HERE -f origin REMOTE_REPO_URL_PATH_HERE
  3	git checkout BRANCH_NAME_HERE
  4. 应用 从不相关的本地仓库来的补丁

  如果你需要其它一些不相关的本地仓库作为你现在仓库的补丁，这里就是通往那里的捷径。
  1	git --git-dir=PATH_TO_OTHER_REPOSITORY_HERE/.git format-patch -k -1 --stdout COMMIT_HASH_ID_HERE| git am -3 -k
  5. 检测 你的分支的改变是否为其它分支的一部分

  cherry命令让我们检测你的分支的改变是否出现在其它一些分支中。它通过+或者-符号来显示从当前分支与所给的分支之间的改变：是否合并了(merged)。.+ 指示没有出现在所给分支中，反之，- 就表示出现在了所给的分支中了。这里就是如何去检测：
  1	git cherry -v OTHER_BRANCH_NAME_HERE
  2	#例如: 检测master分支
  3	git cherry -v master
  Lesus
  L
  6.开始一个无历史的新分支

  有时，你需要开始一个新分支，但是又不想把很长很长的历史记录带进来，例如，你想在公众区域（开源）放置你的代码，但是又不想别人知道它的历史记录。
  1	git checkout --orphan NEW_BRANCH_NAME_HERE
  7. 无切换分支的从其它分支Checkout文件

  不想切换分支，但是又想从其它分支中获得你需要的文件：
  1	git checkout BRANCH_NAME_HERE -- PATH_TO_FILE_IN_BRANCH_HERE
  Lesus
  Lesus

  8.忽略已追踪文件的变动

  如果您正在一个团队中工作，而且大家都在同一条branch上面工作，那么您很有可能会经常用到fetch和merge。但是有时候这样会重置您的环境配置文件，如此的话，您就得在每次merge后修改它。使用这一命令，您就能要求git忽视指定文件的变动。这样，下回你再merge的话，这个文件就不会被修改了。
  1	git update-index --assume-unchanged PATH_TO_FILE_HERE
  9.检查提交的变动是否是release的一部分

  name-rev命令能告诉您一个commit相对于最近一次release的位置。使用这条命令，您就可以检查您所做出的改动是否是release的一部分了。
  1	git name-rev --name-only COMMIT_HASH_HERE
  stoneyang
  stoneyang
  翻译于 2个月前


  10.使用rebase推送而非merge

  如果您正在团队中工作并且整个团队都在同一条branch上面工作，那么您就得经常地进行fetch/merge或者pull。Git中，分支的合并以所提交的merge来记录，以此表明一条feature分支何时与主分支合并。但是在多团队成员共同工作于一条branch的情形中，常规的merge会导致log中出现多条消息，从而产生混淆。因此，您可以在pull的时候使用rebase，以此来减少无用的merge消息，从而保持历史记录的清晰。
  1	git pull --rebase

  您也可以将某条branch配置为总是使用rebase推送：
  1	git config branch.BRANCH_NAME_HERE.rebase true




  git config –global core.quotepath false

  ore.quotepath设为false的话，就不会对0×80以上的字符进行quote。中文显示正常。
  git config --global core.quotepath false



  >>>创建仓库
  git init         //本目录可使用git操作    
  git init --bare  //本目录不可使用git操作   

  >>>仓库操作
  git clone REPO  [ssh:..  git:...  PATH ] LOCAL_PATH         //克隆远程仓库到本地
  git fetch [ REMOTE_NAME  (origin )]
  git pull [remoteName] [localBranchName]   //拉取远程仓库
  git push REMOTE_NAME  LOCAL_BRANCH        //推送到远程仓库



  git remote  //查看远程仓库 
  git remote -v  //查看远程仓库 详细模式
  git remote add REMOTE_NAME  REPO // 添加远程仓库：$ 
  git remote rm REMOTE_NAME //删除远程仓库：$ 
  git remote set-url --push [name] [newUrl]   //修改远程仓库：$ 
  git remote rename REMOTE_NAME  NEW_REMOTE_NAME //重命名远程仓库



  >>>常规操作
  git log                //
  git status              //
  git status -s           //精简方式输出

  git diff (show git add diff)//
git diff  --cached  (show diff git commit )//

  git add PATH   //增加某个文件或目录，也可用通配符
  git add *    //有.gitignore 的时候，会失败
  git add -u  //仅仅把修改过的文件添加进去，  新增文件， 直接删除的文件不会处理
  git add -A  //添加当前所有修改， 不会和.gitignore 冲突, 也添加新增文件，删除的文件（不是用git rm删除的）

  git commit //
  git commit -m "COMMENT"         //
  git commit -a -m "COMMENT"  //添加当前所有修改，并提交,不会主动添加  新文件

  git rm PATH 
  git mv PATH   NEW_PATH   //
  git rm --cached  PATH  // 把 commit 后的文件删掉


  git reset HEAD  PATH  // 把已暂存的某路径恢复到已修改
  git commit --amend    //编辑最后一次commit，可用来撤销


  git revert VERSION   //还原一个版本的修改，git revert bbaf6fb5060b4875b18ff9ff637ce118256d6f20



  >>>分支操作
  git branch                     // 查看本地分支
  git branch BRANCH_NAME         // 创建分支 ----注意新分支创建后不会自动切换为当前分支
  git checkout  BRANCH_NAME      // 切换分支
  git checkout -b BRANCH_NAME    //创建新分支并立即切换到新分支

  git branch -d  BRANCH_NAME     //删除分支
  git branch -D  BRANCH_NAME     //强行删除分支，即使它没有merge


  git branch -r  //查看远程分支）（如果还是看不到就先 git fetch origin 先）
  git branch -a  //查看所有分支，包括远程分支

git push origin [name]  创建远程分支(本地分支push到远程)

  git checkout -b [name] [remoteName] //直接检出远程分支 (如：git checkout -b myNewBranch origin/dragon)  



  git symbolic-ref HEAD refs/heads/[name] ; rm .git/index ; git clean -fdx  // 创建空的分支：(执行命令之前记得先提交你当前分支的修改，否则会被强制删干净没得后悔)


  git merge [name]   //  合并分支  将名称为[name]的分支与当前分支合并
  git rebase -i HEAD~2  // 合并最后的2个提交, 数字2按需修改即可（如果需提交到远端$ git push -f origin master 慎用！）

  it push origin test:master         // 提交本地test分支作为远程的master分支
  git push origin test:test              // 提交本地test分支作为远程的test分支

  git push origin --delete <branchName>  //  删除远程分支
  git push origin :<branchName>  //  删除远程分支
  git push origin :heads/[name]  //  删除远程分支



  >>>tag操作

  git tag                //查看所有本地tag 
  git tag TAGNAME        //创建轻量级tag
  git tag -a TAGNAME  -m "COMMENT"   //创建重量级tag

  git tag -d  TAGNAME             //删除本地tag

  git tag -r                               // 查看远程版本 tag
  git push origin [name]                     // 创建远程版本(本地版本push到远程)
  git push origin --tags                     //上传本地所有tag到远程仓库

  git pull origin --tags                     // 合并远程仓库的tag到本地：
  git fetch origin tag  TAGNAME               // 获取远程tag 到本地

  git push origin --delete tag <tagname>   //删除远程tag
  git push origin :refs/tags/<tagname>     //删除远程tag





  >> stash操作

  git add -a ; git stash  //保存当前修改到堆栈
  git stash apply //(恢复最近的修改）
  git stash list //(查看堆栈）
  git stash pop //(恢复最近的修改）
  git stash drop ID  //删除一个
  git stash clear // 删除所有
  git stash apply stash@{1}’  //恢复指定的stash


  4) 子模块(submodule)相关操作命令
  git submodule add [url] [path]  添加子模块：$ 
  如：$ git submodule add git://github.com/soberh/ui-libs.git src/main/webapp/ui-libs

  git submodule init  初始化子模块：$  ----只在首次检出仓库时运行一次就行
  git submodule update 更新子模块：$   ----每次更新或切换分支后都需要运行一下

  删除子模块：（分4步走哦）
  1) $ git rm --cached [path]
  2) 编辑“.gitmodules”文件，将子模块的相关配置节点删除掉
  3) 编辑“ .git/config”文件，将子模块的相关配置节点删除掉
  4) 手动删除子模块残留的目录

  5）忽略一些文件、文件夹不提交
  在仓库根目录下创建名称为“.gitignore”的文件，写入不需要的文件夹名或文件，每个元素占一行即可，如
  target
  bin
  *.db

  6）后悔药
  删除当前仓库内未受版本管理的文件：$ git clean -f
  恢复仓库到上一次的提交状态：$ git reset --hard
  回退所有内容到上一个版本：$ git reset HEAD^
  回退a.py这个文件的版本到上一个版本：$ git reset HEAD^ a.py
  回退到某个版本：$ git reset 057d 
  将本地的状态回退到和远程的一样：$ git reset –hard origin/master  
  向前回退到第3个版本：$ git reset –soft HEAD~3

  7）Git一键推送多个远程仓库
  编辑本地仓库的.git/config文件：
  [remote "all"]
  url = git@github.com:dragon/test.git
  url = git@gitcafe.com:dragon/test.git
  这样，使用git push all即可一键Push到多个远程仓库中




  ===========




  -----------------------------------------
  http://git-scm.com/docs

  git init, git init --bare 区别

  git init 直接在当前目录下创建repo, 同时也可以直接在此目录进行 git 操作
  这样的问题是，别处push过来，    
  git push origin master:master
  当本地有修改，就无法成功了，
  所以默认是不准push的，
  需要允许，就需要修改  .git/config 的配置

  git init --bare 纯粹创建一个repo,创建的repo无法进行git操作，所以一般名称以   .git 结尾








  迄今，我已经使用Git很长一段时间了，考虑分享一些不管你是团队开发还是个人项目，都受用的高级git命令。
  1. 输出最后一次提交的改变

  这个命令，我经常使用它 来发送其他没有使用git的人来检查或者集成所修改的。它会输出最近提交的修改内容到一个zip文件中。
1	git archive -o ../updated.zip HEAD $(git diff --name-only HEAD^)

  2. 输出两个提交间的改变

  类似的，如果你需要输出某两个提交间的改变时，你可以使用这个。
1	git archive -o ../latest.zip NEW_COMMIT_ID_HERE $(git diff --name-only OLD_COMMIT_ID_HERE NEW_COMMIT_ID_HERE)
  Lesus
  Lesus
  翻译于 2个月前


  如果你渴望只克隆远程仓库的一个指定分支，而不是整个仓库分支，这对你帮助很大。
  1	git init
  2	git remote add -t BRANCH_NAME_HERE -f origin REMOTE_REPO_URL_PATH_HERE
  3	git checkout BRANCH_NAME_HERE
  4. 应用 从不相关的本地仓库来的补丁

  如果你需要其它一些不相关的本地仓库作为你现在仓库的补丁，这里就是通往那里的捷径。
  1	git --git-dir=PATH_TO_OTHER_REPOSITORY_HERE/.git format-patch -k -1 --stdout COMMIT_HASH_ID_HERE| git am -3 -k
  5. 检测 你的分支的改变是否为其它分支的一部分

  cherry命令让我们检测你的分支的改变是否出现在其它一些分支中。它通过+或者-符号来显示从当前分支与所给的分支之间的改变：是否合并了(merged)。.+ 指示没有出现在所给分支中，反之，- 就表示出现在了所给的分支中了。这里就是如何去检测：
  1	git cherry -v OTHER_BRANCH_NAME_HERE
  2	#例如: 检测master分支
  3	git cherry -v master
  Lesus
  L
  6.开始一个无历史的新分支

  有时，你需要开始一个新分支，但是又不想把很长很长的历史记录带进来，例如，你想在公众区域（开源）放置你的代码，但是又不想别人知道它的历史记录。
  1	git checkout --orphan NEW_BRANCH_NAME_HERE
  7. 无切换分支的从其它分支Checkout文件

  不想切换分支，但是又想从其它分支中获得你需要的文件：
  1	git checkout BRANCH_NAME_HERE -- PATH_TO_FILE_IN_BRANCH_HERE
  Lesus
  Lesus

  8.忽略已追踪文件的变动

  如果您正在一个团队中工作，而且大家都在同一条branch上面工作，那么您很有可能会经常用到fetch和merge。但是有时候这样会重置您的环境配置文件，如此的话，您就得在每次merge后修改它。使用这一命令，您就能要求git忽视指定文件的变动。这样，下回你再merge的话，这个文件就不会被修改了。
  1	git update-index --assume-unchanged PATH_TO_FILE_HERE
  9.检查提交的变动是否是release的一部分

  name-rev命令能告诉您一个commit相对于最近一次release的位置。使用这条命令，您就可以检查您所做出的改动是否是release的一部分了。
  1	git name-rev --name-only COMMIT_HASH_HERE
  stoneyang
  stoneyang
  翻译于 2个月前


  10.使用rebase推送而非merge

  如果您正在团队中工作并且整个团队都在同一条branch上面工作，那么您就得经常地进行fetch/merge或者pull。Git中，分支的合并以所提交的merge来记录，以此表明一条feature分支何时与主分支合并。但是在多团队成员共同工作于一条branch的情形中，常规的merge会导致log中出现多条消息，从而产生混淆。因此，您可以在pull的时候使用rebase，以此来减少无用的merge消息，从而保持历史记录的清晰。
  1	git pull --rebase

  您也可以将某条branch配置为总是使用rebase推送：
  1	git config branch.BRANCH_NAME_HERE.rebase true


  git一次提交过多内容会失败（6.2G）


git设置:
  中文显示乱码
  git config –global core.quotepath false 
  这样就不会对0×80以上的字符进行quote。中文显示正常。

[push]
  default = simple
[user]
	name = renyj,
	email = renyj@anchu.com,
[core]
	quotepath = false
[diff]
	tool = vimdiff
[difftool]
	prompt = false
[alias]
	d = difftool
[color]
	ui = true





忽略一些文件、文件夹不提交
在仓库根目录下创建名称为“.gitignore”的文件，写入不需要的文件夹名或文件，每个元素占一行即可，如
/target
/bin
/*.db

  多级目录忽略， 需要一级一级处理
/* #忽略根目录所有文件
!/.local  #.local目录例外
/.local/*  #忽略.local/下所有文件
!/local/share  #share目录例外
/local/share/*  #忽略share下所有文件
!/local/share/bijiben  #bijiben例外

最后 /.local/share/bijiben 目录例外



##### 钩子 hooks
钩子分成服务端和客户端
不同的钩子有不同的参数， 有的是没有的。
另外钩子的脚本必须设置成可运行，否则不会调用

完整参考 
https://www.digitalocean.com/community/tutorials/how-to-use-git-hooks-to-automate-development-and-deployment-tasks


常用： (服务端)

pre-receive #在push之后第一步的操作，没有参数
update  #push之后，第二步的操作， 
  参数 remote: ['hooks/update', 'refs/heads/master', '45468d1979b1b82f0a30d187a0f246063defb62d', '78f7b03a54a95f0e0f58d8bacb74f8334320ab74']
  包含提交的commit id 和提前之前的commit id  (4546是提前的commit id)

post-receive  #push成功之后的操作


##### git log 过滤
git log -p -10 | grep Author 获得最近10条记录
git log --since="2017-06-01" 包含当天


https://git-scm.com/book/tr/v2/Git-Basics-Viewing-the-Commit-History

git log --since="2017-06-01" | grep Author | sort | uniq

