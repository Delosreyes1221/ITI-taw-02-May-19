<?php
   $host ='localhost';
   $user ='root';
   $password ='';
   $db ='tarea2'; 
   
   $config =  mysqli_connect($host, $user, $password, $db);
   if(mysqli_connect_errno())
   {
       echo'Error:'.mysqli_connect_error();
   }
   else {
   }
   error_reporting(0);

?>