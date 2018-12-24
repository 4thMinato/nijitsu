<?php
	$dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'gue55me';
	$dbname = 'nijishu';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die('Error with MySQL connection');
	mysqli_set_charset($conn,"utf8");
?>