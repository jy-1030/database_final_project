<?php
     header("Content-Type:text/html; charset=utf-8");
     $serverName="DESKTOP-JC8DF8D\SQLEXPRESS";
     $connectionInfo=array("Database"=>"stationary_406257004","UID"=>"CCU2","PWD"=>"asdf12345","CharacterSet" => "UTF-8");
     $conn=sqlsrv_connect($serverName,$connectionInfo);
         if($conn){
             echo "Success!!!<br />";
         }else{
             echo "Error!!!<br />";
             die(print_r(sqlsrv_errors(),true));
         }            
?>