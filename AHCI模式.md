
  # AHCI模式

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:16:08 


      None


      <p>
      AHCI模式


win7 - stat:
	1.单击“开始”按钮，在搜索框中键入“regedit”（如图1），按下回车键，打开“注册表编辑器”窗口。Windows7虽然在“开始”菜单默认不显示“运行”命令，但实际上可用搜索框代替这一功能（或者直接按下Windows键+R键再输入）。

	20100128_376e674ccf67f5eb181d2IMhPZHrpWFR.jpg

	图1

	　　2.在“注册表编辑器”窗口左侧标题栏定位至HKEY_LOCAL_MACHINE\SYSTEM\ CurrentControlSet\services\msahci分支，然后在右侧窗口，双击“Start”。

	　　
	　　3.在打开的“编辑DWORD值”对话框，将“数值数据”框中的值由3改为数字0（如图2），单击“确定”按钮。

	image002.jpg
	图2
	　　

	　　4.关闭“注册表编辑器”窗口并重新启动电脑。

	　　
	　　5.重新启动电脑时进入BIOS设置界面，将硬盘更改为AHCI模式。例如，针对笔者电脑而言，启动电脑时按F1键进入BIOS，依次选择Devices→ATA Drives Setup→Configure SATA as→AHCI（如图3），最后按F10键保存并退出BIOS。

      </p>

  