
  # -firefox书签之历史备

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:51:36 


      None


      <p>
      FIREFOX书签之历史备份
firefox书签之历史备份

书签大约是存放在数据库中，每日生成昨日备份文件
备份文件位于：/home/frd/.mozilla/firefox/1ts2kf7s.default/bookmarkbackups/bookmarks-YYYY-MM-DD.json



备份文件的的式： 
	第一层是全局描述 
	 
	children=> 第二层 
	 
	第二层包括：  书签菜单， 书签工具栏，未分类书签 
	 
	它们之下可以有任意层级 
	 
	 
	先考虑主要统计书签菜单： 
		children[N]['title'] = "书签菜单" 
		 
		 
	目前光统计：  children[N][title=书签菜单]    ['children'] 数目， 不考虑层级 
	不准确，但是对目前情况适用 
	 
	

      </p>

  