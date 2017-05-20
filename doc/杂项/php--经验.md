
  # php--经验

      version:  1
      created_at:  2016-01-02
      updated_at:  None

      created at 2016-01-02 09:45:58 


      None


      <p>
      经验
PHP 替换字符串， 仅仅保留需要的字符
 $output = preg_replace('#[^a-zA-Z_]#', '', $input);


 代码片段：
 获取 文件名，从文件路径中
 function get_filename($filename)
 {
    $filename=basename($filename);
    $filename=explode(".",$filename);
    array_pop($filename);
    $filename=implode(".",$filename);
 
    return $filename;
 }
 
 
 
fsockopen
   $fp = fsockopen("www.example.com",
     80, $errno, $errstr, 30);   
    if (!$fp) {   
    echo "$errstr ($errno)<br />\n";   
    } else {   
    $out = "GET / HTTP/1.1\r\n";   
    $out .= "Host: www.example.com\r\n";   
    $out .= "Connection: Close\r\n\r\n";   
     
    fwrite($fp, $out);   
    while (!feof($fp)) {   
    echo fgets($fp, 128);   
    }   
    fclose($fp);   
    }  

以上就是PHP fsockopen函数的具体使用方法，供大家参考学习。


echo append_filename("aa.jpg","_1");  //aa_1.jpg
echo append_filename("aa","_1");   //aa_1
function append_filename($filename,$append)
 {
    $dirname=dirname($filename);
    $basename=basename($filename);
 
    $pos=strrpos($basename,".");
    if($pos === false)
    {
       $basename.=$append;
    }
    else
    {
       $part1=substr($basename,0,$pos);
       $part2=substr($basename,$pos);
 
       $basename=$part1.$append.$part2;
    }
 
    return $dirname.'/'.$basename;
 }
 
 
 PHP  dirname()
     当没有dir，只有文件名的时候，  结果   =  .
     
    spl_autoload_register
         重复注册会怎么样？
         
         

fsockopen 方式模拟GET,POST,upload file
原理是通过设置  request ，向 远端80端口发出请求， 对方解析request, 返回response
  request,response具体细节需要网络知识
估计就是字符串，有约定的字符串
首先要明白HTTP协议，然后就很容易理解了。

GET：
  <?php  
$host = 'demo.fdipzone.com';  
$port = 80;  
$errno = '';  
$errstr = '';  
$timeout = 30;  
$url = '/socket/getapi.php';  
  
$param = array(  
    'name' => 'fdipzone',  
    'gender' => 'man'  
);  
  
$url = $url.'?'.http_build_query($param);  
  
// create connect  
$fp = fsockopen($host, $port, $errno, $errstr, $timeout);  
  
if(!$fp){  
    return false;  
}  
  
// send request  
$out = "GET ${url} HTTP/1.1\r\n";  
$out .= "Host: ${host}\r\n";  
$out .= "Connection:close\r\n\r\n";  
  
fputs($fp, $out);  
  
// get response  
$response = '';  
while($row=fread($fp, 4096)){  
    $response .= $row;  
}  
  
$pos = strpos($response, "\r\n\r\n");  
$response = substr($response, $pos+4);  
  
echo $response;  


POST：
 <?php  
$host = 'demo.fdipzone.com';  
$port = 80;  
$errno = '';  
$errstr = '';  
$timeout = 30;  
$url = '/socket/postapi.php';  
  
$param = array(  
    'name' => 'fdipzone',  
    'gender' => 'man',  
    'photo' => file_get_contents('photo.jpg')  
);  
  
$data = http_build_query($param);  
  
// create connect  
$fp = fsockopen($host, $port, $errno, $errstr, $timeout);  
  
if(!$fp){  
    return false;  
}  
  
// send request  
$out = "POST ${url} HTTP/1.1\r\n";  
$out .= "Host:${host}\r\n";  
$out .= "Content-type:application/x-www-form-urlencoded\r\n";  
$out .= "Content-length:".strlen($data)."\r\n";  
$out .= "Connection:close\r\n\r\n";  
$out .= "${data}";  
  
fputs($fp, $out);  
  
// get response  
$response = '';  
while($row=fread($fp, 4096)){  
    $response .= $row;  
}  
  
$pos = strpos($response, "\r\n\r\n");  
$response = substr($response, $pos+4);  
  
echo $response;

POST FILE：
      <?php  
    $host = 'demo.fdipzone.com';  
    $port = 80;  
    $errno = '';  
    $errstr = '';  
    $timeout = 30;  
    $url = '/socket/fileapi.php';  
      
    $form_data = array(  
        'name' => 'fdipzone',  
        'gender' => 'man',  
    );  
      
    $file_data = array(  
        array(  
            'name' => 'photo',  
            'filename' => 'photo.jpg',  
            'path' =>'photo.jpg'  
        )  
    );  
      
    // create connect  
    $fp = fsockopen($host, $port, $errno, $errstr, $timeout);  
      
    if(!$fp){  
        return false;  
    }  
      
    // send request  
    srand((double)microtime()*1000000);  
    $boundary = "---------------------------".substr(md5(rand(0,32000)),0,10);  
      
    $data = "--$boundary\r\n";  
      
    // form data  
    foreach($form_data as $key=>$val){  
        $data .= "Content-Disposition: form-data; name=\"".$key."\"\r\n";  
        $data .= "Content-type:text/plain\r\n\r\n";  
        $data .= rawurlencode($val)."\r\n";  
        $data .= "--$boundary\r\n";  
    }  
      
    // file data  
    foreach($file_data as $file){  
        $data .= "Content-Disposition: form-data; name=\"".$file['name']."\"; filename=\"".$file['filename']."\"\r\n";  
        $data .= "Content-Type: ".mime_content_type($file['path'])."\r\n\r\n";  
        $data .= implode("",file($file['path']))."\r\n";  
        $data .= "--$boundary\r\n";  
    }  
      
    $data .="--\r\n\r\n";  
      
    $out = "POST ${url} HTTP/1.1\r\n";  
    $out .= "Host:${host}\r\n";  
    $out .= "Content-type:multipart/form-data; boundary=$boundary\r\n"; // multipart/form-data  
    $out .= "Content-length:".strlen($data)."\r\n";  
    $out .= "Connection:close\r\n\r\n";  
    $out .= "${data}";  
      
    fputs($fp, $out);  
      
    // get response  
    $response = '';  
    while($row=fread($fp, 4096)){  
        $response .= $row;  
    }  
      
    $pos = strpos($response, "\r\n\r\n");  
    $response = substr($response, $pos+4);  
      
    echo $response;  
    ?>  
    
POST FILE 2:
  <?php
   $fp = fsockopen("frd.info", 80, $errno, $errstr, 10);  

   $host="frd.info";
   $url="/print_files.php";

   if(!$fp)
   {  
      echo "open fail";  
   }
   else
   {
      srand((double)microtime()*1000000);  
      $boundary = "---------------------------".substr(md5(rand(0,32000)),0,10);  

      $data = "--$boundary\r\n";  

      $data .= "Content-Disposition: form-data; name=\"".'photo'."\";
      filename=\"".'1'."\"\r\n";  
      $data .= "Content-Type: ".mime_content_type('1.png')."\r\n\r\n";  
      $data .= implode("",file('1.png'))."\r\n";  
      $data .= "--$boundary\r\n";  

      $out = "POST ${url} HTTP/1.1\r\n";  
      $out .= "Host:${host}\r\n";  
      $out .= "Content-type:multipart/form-data; boundary=$boundary\r\n"; // multipart/form-data  
      $out .= "Content-length:".strlen($data)."\r\n";  
      $out .= "Connection:close\r\n\r\n";  
      $out .= "${data}"; 

      fputs($fp,$out);


      // get response  
      $response = '';  
      while($row=fread($fp, 4096)){  
         $response .= $row;  
      }  

      $pos = strpos($response, "\r\n\r\n");  
      $response = substr($response, $pos+4);  

      echo $response;
      /*


      $filename = "1.png";
      $handle = fopen($filename, "r");  


      $contents = fread($handle, filesize($filename));  
      fwrite($fp,$contents);  
      echo $fp;  

      var_dump(fread($fp,1024));
      */
   }

   fclose($fp);  



     
     


      </p>

  