
  # 2016-07-13 develop log

      version:  1
      created_at:  None
      updated_at:  None

      None

      None


      <p>
      
	frd php framework upgraded to v0.1.  
	what' new future in this version?  
		Frd_Route updated ,easy to use.
		 package support added, 
		 Frd_Db_Table updated.
		Frd_Api added.

	the problem is i foud it is still not stable enough .the document, test need improve . 
	i have a simple color definition for the status of a project.   red means risky , yellow is not stable, and green is stable .
	so frd php framework v0.1 is  yellow color ,not stable.

	i have did  reseach in  database version controller 
	there have 2 ways to do  dbv( database version controller)
	the first way is write  upgrade and degrade sqls by manual, then use these sqls to manage database version . 
	of course that's not a good way .
	a better way is like git repo,  each time can push to center repo, and each locals can pull the newest change .
	but that's difficult,  and not sure if that's possible . 
	now i use SchemaSync (https://github.com/mmatuson/SchemaSync) to do version control, seems it is a correct direction.

	what's the next plan?
		1,  deploy center update to v0.0.1
		2,  test framework update to v0.0.1
		3, performance update to v0.0.1
		4,  dbv  update to v0.0.1
		5，find a good to show frd php framework's documents
	 	6,  unicorn update to v0.0.7
		

	

      </p>

  