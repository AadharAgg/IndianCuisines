<?php
	$hostname = "http://localhost/indian-cuisines";
	
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'indian-cuisines');

	$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	if(!$conn){
		die("Can't connect to database!");
	}
 ?>