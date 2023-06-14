<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_DATABASE','comaildb');

class DB_CLASS
{
	function DB_CLASS()
	{
	$conn=mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die('Could not connect  '.mysql_error());
	mysql_select_db(DB_DATABASE,$conn) or die('Could not select database  '.mysql_error());
	}
}

?>