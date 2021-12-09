<?php
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Não foi possível conectar');
	$dbname = 'locadora';
	mysql_select_db($dbname);
?>
