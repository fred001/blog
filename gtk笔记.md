
  # gtk笔记

      version:  1
      created_at:  2016-03-15
      updated_at:  None

      created at 2016-03-15 15:32:36 


      None


      <p>
      GTK 开发

显示widget:   gtk_widget_show(WIDGET)  
显出所有widget:   gtk_widget_show_all(WIDGET);

控件：
  window :  window=gtk_window_new(GTK_WINDOW_TOPLEVEL);
 只能有一个控件
  frame: gtk_frame_new(“LABEL”)
  label:   gtk_label_new(“LABEL”)
  button:  gtk_button_new_with_label(“LABEL”)
  text:   gtk_entry_new()
  image:  gtk_image_new_from_file("IMAGE_PATH");
  text:   gtk_text_view_new();
  checkbox:  gtk_check_button_new_with_label(“LABEL”);
  combo: 
          combo=gtk_combo_box_new_text();
	gtk_combo_box_append_text(GTK_COMBO_BOX(combo),"Linux");
	gtk_combo_box_append_text(GTK_COMBO_BOX(combo),"Window");

  hseparator:   gtk_hseparator_new  水平分割线
  vseparator:   gtk_vseparator_new  垂直分割线 


布局：
  Fixed: 固定位置 
      GtkWidget  *fixed=gtk_fixed_new();
     gtk_fixed_put(GTK_FIXED(fixed),WIDGET);

  vbox / hbox :水平和垂直盒

 GtkWidget *fixed=gtk_hbox_new(TRUE,1);
 gtk_box_pack_start(GTK_BOX(fixed),btn1,TRUE,TRUE,0);


表格布局

对齐布局

window布局


对话框
创建 （ info,warning,error,question(需要回答OK或不）
 GtkWidget *dialog=gtk_message_dialog_new(window,GTK_DIALOG_DESTROY_WITH_PARENT,
info: 
GTK_MESSAGE_INFO,
GTK_BUTTONS_OK,
"Error Happened","title");
warning:
GTK_MESSAGE_WARNING,
GTK_BUTTONS_OK,
"Error Happened");

error:
GTK_MESSAGE_ERROR,
GTK_BUTTONS_OK,
"Error Happened","title");

question:
GTK_MESSAGE_QUESTION,
GTK_BUTTONS_YES_NO,
"Are you sure to quit?");

设置属性： gtk_window_set_title(GTK_WINDOW(dialog), "Warning");
运行：  gtk_dialog_run(GTK_DIALOG(dialog));
销毁： gtk_widget_destroy(dialog);  //运行后就可以销毁了


其它更高级对话框： 
   应用程序对话框 ：GtkAboutDialog
   字体选择对话框： GtkFontSelectionDialog
   色彩选择对话框： GtkColorSelectionDialog

事件
  绑定事件：  handler_id= g_signal_connect(G_OBJECT(button), "clicked",
G_CALLBACK(button_clicked), NULL);
 解除绑定：
    g_signal_handler_disconnect(window, handler_id);

高级情况： 
	gtk_widget_add_events(GTK_WIDGET(window), GDK_CONFIGURE);


菜单
   菜单条：  GtkWidget * menubar=gtk_menu_bar_new();
   菜单项：  GtkWidget *gtk_menu_item_new_with_label("关于");  
   菜单   :     GtkWidget * menu=gtk_menu_new();
  用法：  用法有点别扭
 1, 创建菜单条  
 2, 每个菜单，不能单独放置到菜单条上， 需要再创建一个 菜单项，
  这个菜单项 是特殊的，显示在菜单条上的
  例如 （文件，编辑，帮助） 这种

3, 为这个特殊的菜单项 绑定 菜单 
   gtk_menu_item_set_submenu(GTK_MENU_ITEM(菜单项 ),菜单);
4, 为绑定的菜单增加菜单项
 gtk_menu_shell_append(GTK_MENU_SHELL(菜单),菜单项);

5,其它：
   特殊菜单项，增加到菜单条中 ，然后就完成了


工具条： 
 创建:   

  GtkWidget *toolbar = gtk_toolbar_new();
设置：
  gtk_toolbar_set_style(GTK_TOOLBAR(toolbar),GTK_TOOLBAR_ICONS);
 gtk_container_set_border_width(GTK_CONTAINER(toolbar),2);

工具项：   GtkToolItem *new=gtk_tool_button_new_from_stock(GTK_STOCK_NEW);
插入工具项：   gtk_toolbar_insert(GTK_TOOLBAR(toolbar),new,-1);

禁用widget !

gtk_widget_set_sensitive(menubar,FALSE);

工具项也可以禁用， 工具箱的类型是  GtkToolItem * ,但是通过转换，可以禁用
gtk_widget_set_sensitive(GTK_WIDGET(new),FALSE);


      </p>

  