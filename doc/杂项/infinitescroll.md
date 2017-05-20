
  # infinitescroll

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:03:59 


      None


      <p>
      INFINITESCROLL
infinite scroll:
	初始化会创建一个对象，并保存到当前元素的 中去 ，通过$.data(OBJ,"NAME","VALUE")
	
	也会先从这个元素中获取，若存在，则直接用， 
	所以 $("#container").data('infinitescroll',null); 可以删除这个对象，从来达到消灭它的效果
	但是事件绑定还在， 所以还需要取消事件绑定
	
	
	update:方法：
		更新options   $object.update(OPtions) ； 设置option
		
	pause ,resume ：
		设置 state:({}) 中的值， 当 scroll的时候会判断，是否真正scroll
		
	destroy:
		设置 state.isDestroy 的值， 会停止scroll
		还会调用 opts.loading.finished , 清除loading msg
		
	scroll:
		进行判断是否滚动，需要滚动则调用  retrieve（PageNum) 实际滚动
		
	retrieve: 
		进行滚动，但也会判断 isDestroy, 真正调用  opts.loading.start进行滚动
		
	/en:
		调用 _ 进行绑定和取消
		默认绑定到 window对象， 事件名是 smartscrol.infscr.{ID}
		
		
	_setup:
		绑定事件
		
	_validate:
		检查要绑定的元素是否至少有1个
		
		
	_prefill : 预先载入
		如果需要，则调用  scroll
		并且绑定 resize 方法，在resize的时候也进行预先载入
		
	needsPrefill():
		假如contentSelctor高度小于窗口高度， 则需要预先载入
		
		
	_create:
		检查必要环境
		设置绑定
		设置预先载入等
		
	_determinepath: 增加 下一个请求的url
	
	_error:
		根据不同错误，进行不同处理（ xhr错误，或者是 end 等等）
		清楚绑定
		
	Ajax:
		滚动核心方法
		
		ajax请求数据，成功调用  _loadcallback，失败调用 _error
			没有更多数据也是 _error
			
		
	_loadcallback:
		根据不同结果进行处理：
			done :完成
			no-append
			append
			
	_nearbottom:未知
	_showdownmsg: 估计是显示信息
	
	
其它：
	创建了  event.special.smartscroll  事件
	这个里面实际绑定了scroll时间，并且可以抛出 自定义的 smartscroll事件

      </p>

  