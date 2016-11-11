<?php
   include_once("./Parsedown.php");

   $Parsedown = new Parsedown();

   $md=$_GET['file'];
   if(file_exists($md)) 
   {
      $content = file_get_contents($md) or '__Read file error__';
      echo $Parsedown->text($content);
   } 
   else 
   {
      echo $Parsedown->text('__404 Error__');
   }

