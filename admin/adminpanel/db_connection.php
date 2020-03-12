<?php 
	session_start();
	$dbh = mysqli_connect('localhost', 'root', 'cfc619619', 'milink');
	mysqli_set_charset($dbh, "utf8");
	if (!$dbh)
	{
		die("Could not connect: " . mysqli_connect_error());
	}
 ?>