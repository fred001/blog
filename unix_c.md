
  # unix_c

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 10:34:18 


      None


      <p>
      

文件IO

#include <fcntl.h>

int open(const char *path,int oflag ,...)

	oflag:  O_RDONLY ,O_WRONLY, O_RDWR , O_EXEC ,OAPPEND

#include <unistd.h>
int close(int fd)


off_t lseek(int fd,off_t offset,int whence)
	whence  :  SEEK_SET ,SEEK_CUR,SEEK_END

ssize_t read(int fd,void *buf,size_t nbytes)
ssize_t write(int fd,const void *buf,size_t nbytes)
int dup(int fd);
int dup2(int fd,int fd2)
int fcntl(int fd,int cmd,...);

#include<unistd.h>
#include <sys/local.h>
int ioctl(int fd,int request,...);

      </p>

  