<?php 
	$link = @ mysql_connect("localhost","root","xg") or die(mysql_error());
	mysql_set_charset('utf8');
	$database_name = 'xg';
	mysql_select_db($database_name);
 ?>