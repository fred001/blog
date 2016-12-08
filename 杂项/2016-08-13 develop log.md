
  # 2016-08-13 develop log

      version:  21
      created_at:  2016-08-13
      updated_at:  2016-08-13 11:01:19

      None

      None


      <p>
      long time after last develop ,  one month passed .

##Develop
####deploy 
   after try several ways, i found a simple way to deploy.
  use the  [ iamlosing.me ] as example. 
  it include 3 parts:   main code,  local config ,lib code
  so i create 3 git repos:  maincode, local, lib 
  and in maincode create .gitignore , which ignore  /local, /lib folder
  so everythings becomes easy. 
######build
    git clone maincode
    cd local & git clone local 
    cd lib   & git clone  lib

######update 
    git pull 
    cd local & git pull
    cd lib   & git pull
######push
    git push
    cd local & git push
    cd lib   & git push

######status
    git status
    cd local & git status
    cd lib   & git status	

  the only week point is sometimes need split a repo to several smaller repos . 
  but i thinks that is acceptable 。

#### richtext
  website's richtext editor is an important topic. there have 2 types editor. 
  one is wysiwyg editor, which convert user input to html code directly. 
  and a another is markdown editor . it convert content to html ,and still 
  can keep original content . 

  the markdown editor seems better at much times. because 
	1, it is more easy to write the editor code .
	2, it can extend  ,support complicated syntax
	3, support  write the content with other tool and copy/paste to editor and save .

  i have added markdown support for this site. 
  and i use the syntax : 
     http://daringfireball.net/projects/markdown/syntax
  it missed some useful syntax, like bold, font color and so on, 
  but it is a good start . 

#### yii2
  these days i try to learn yii framework .
  i insist zend framework2 is a failture product . because it is really too complicated.
  compare with zf2, yii2 is more reality. 
	
  it also support some difficult understanding conceptions, but have not make them so complicated. 
  i should say, it is also difficult to learn .
	
	

## Life:
####hot summer
  it's really hot , every day is 30-36 . that's make me do not want to go to outside . 
	

####g20
  G20 meeting will convened in  HangZhou. several monthes before the meetting , HangZhou 
  is preparing for it . i heared there have strict security, people like me go to HangZhou 
  maybe have problem, because i do not have job in HangZhou, so i decided go to there after 		
  the G20, i hope the HangZhou life can not restored to normal after G20 quickly .
  i will not say G20 is bad, because there already have one said that and be punished. 


      </p>

  