lib/App.php (Frd_App) 
app是application 的简称，可以将它理解成一个整个框架所提供的平台。比网站更高概念的一个平台。
而frd module 则相当于网站的概念。  app 可以包含众多网站，差不多这个概念。

frd 框架的核心组件都存放在此对象中，如route, db,module,setting,global 对象等等。
并且此对象包含  run 方法，负责通过路由寻找到正确的controller并载入执行之。
