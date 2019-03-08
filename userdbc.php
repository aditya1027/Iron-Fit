<?php

$hostname='localhost';
$mysqluser="root";
$mysql_pass="";

$mysql_db="users";

if(!@mysql_connect($hostname,$mysqluser,$mysql_pass) || !@mysql_select_db($mysql_db))
    {
		die(mysql_error());
	}
	
?>