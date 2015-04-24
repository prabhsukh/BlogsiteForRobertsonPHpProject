<?php

$host="localhost"; 
$username="root"; 
$password="";  
$db_name="dbGroupProject"; 
$tbl_name="tbUser"; 

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


$result = mysql_query("SELECT * FROM tbvideo");
 ?>


