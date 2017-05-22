
  # 创建fedor应用程序

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:10:21 


      None


      <p>
      创建FEDOR应用程序
一般需要 rpm包， 也可自己通过 root权限，手动创建

安装后的文件包括：

  1， /usr/share/applications/fedora-程序名.desktop
  此文件定义了基本的配置， 有这文件才能在 gnome中搜索到此程序
 内容参照其它文件，例如：
 [Desktop Entry]
Encoding=UTF-8
Name=Focus
Comment=Simple Focus Work
Comment[bg]=Опростен текстов редактор
Comment[br]=Embanner testennou eeun
Comment[ca]=Editor de text simple
Comment[cs]=Jednoduchý textový editor
Comment[da]=Enkel tekstbehandler
Comment[de]=Einfacher Texteditor
Comment[el]=Απλός επεξεργαστής κειμένου
Comment[eo]=Simpla tekstredaktilo
Comment[es]=Editor de texto simple
Comment[eu]=Testu editore sinplea
Comment[fi]=Yksinkertainen tekstieditori
Comment[fr]=Un éditeur de texte tout simple
Comment[ga]=Eagarthóir simplí
Comment[gl]=Editor de texto sinxelo
Comment[he]=עורך טקסט פשוט
Comment[hu]=Egyszerű szöveg szerkesztő
Comment[id]=Penyunting teks sederhana
Comment[it]=Semplice editor di testi
Comment[ja]=シンプルなテキストエディタ
Comment[ko]=간단한 텍스트 편집기
Comment[lt]=Paprastas teksto redaktorius
Comment[lv]=Vienkāršā teksta redaktors
Comment[nl]=Eenvoudige teksteditor
Comment[nn]=Enkel tekstredigering
Comment[pl]=Prosty edytor tekstu
Comment[pt]=Simples editor de texto
Comment[pt_BR]=Editor de texto simples
Comment[ru]=Простой текстовый редактор
Comment[sk]=Jednoduchý textový editor
Comment[sl]=Preprost urejevalnik besedila
Comment[sr]=Једноставан уређивач текста
Comment[sv]=Enkel textredigerare
Comment[ta]=எளிமையான உரை பதிப்பான்
Comment[tr]=Basit metin düzenleyicisi
Comment[uk]=Проситий текстовий редактор
Comment[vi]=Một trình soạn thảo văn bản đơn giản
Comment[zh_CN]=Focus
Comment[zh_TW]=Focus
Exec=focus.py
Icon=leafpad
Terminal=false
Type=Application
MimeType=text/plain;
Categories=GTK;Utility;TextEditor;
StartupNotify=true
GenericName=Text Editor
GenericName[de]=Texteditor
X-Desktop-File-Install-Version=0.21

2， 应用程序图标
   /usr/share/pixmaps/程序名.png 大小尺寸参照其它类似文件

3, 翻译：
  usr/share/locale/vi/LC_MESSAGES/leafpad.mo
/usr/share/locale/zh_CN/LC_MESSAGES/leafpad.mo
/usr/share/locale/zh_TW/LC_MESSAGES/leafpad.mo 

4， 核心代码 ， 
  /usr/bin/应用程序

有这几个基本文件，就可以实现增加应用程序到系统中去了！
当然有 readme 和文档更好！


      </p>

  