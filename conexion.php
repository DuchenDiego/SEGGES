<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$user_name="";
$pass_word="";
$database="tallergimnasio";
$server="127.0.0.1:81";
$db_handle=mysql_connect($server,$user_name,$pass_word,$database);
$db_found=mysql_select_db($database,$db_handle);
?>
