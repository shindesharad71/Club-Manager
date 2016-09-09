<?php

	global $con;

	$hostname = 'localhost'; 	// Host Name
	
	$user = 'root'; 			// username of host
	
	$password = ''; 			// password of host
	
	$dbname = 'db'; 			//database name
			
	$con = new mysqli($hostname,$user,$password,$dbname);
	if (mysqli_connect_errno())
		{
	  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  		die();
	  	}