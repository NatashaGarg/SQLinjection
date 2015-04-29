<?php
	//echo 'yo';
	$dbhost='localhost';
	$dbuser='root';
	$dbpass='123';
	//echo 'hello';
	$conn=mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
   	{
     		die('Could not connect: ' . mysql_error());
   	}
	//echo 'connected';
	mysql_select_db("btp", $conn) or die("Unable to connect to database");
	//echo 'Databse selected';
?>
