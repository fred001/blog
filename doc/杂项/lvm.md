
  # lvm

      version:  1
      created_at:  2016-03-15
      updated_at:  None

      created at 2016-03-15 12:31:34 


      None


      <p>
      
怎么扩充现有的磁盘 (lvm)

1, fdisk disk, 
create new partion, with type lvm 

> t DISK_NUM
8e (LVM)

partprobe

2, create pv from partion
pvcreate /dev/sdaX

3, extend pv to vg

vg extend VG_NAME /dev/sdaX



4,let lv use the vg 
lvresize -l +179 /dev/vbirdvg/vbirdlv
resize2fs /dev/vbirdvg/vbirdlv


      </p>

  