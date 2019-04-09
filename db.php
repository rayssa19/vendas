<?php
$hostname_db="ec2-54-225-95-183.compute-1.amazonaws.com";
$database_db="d3oii8f1kkklce";
$username_db="coupodfgsdapjx";
$password_db="d4b3662a0a6453106771b2f584843ac8f9986e519519b645d5b93e2efb536c3d";
$dbconn=mysql_connect($hostname_db,$username_db,$password_db)OR DIE("");
mysql_select_db($database_db,$dbconn);
?>