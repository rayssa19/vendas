<?php
$hostname_db="localhost";
$database_db="vendas";
$username_db="root";
$password_db="";
$dbconn=mysql_connect($hostname_db,$username_db,$password_db)OR DIE("");
mysql_select_db($database_db,$dbconn);
?>