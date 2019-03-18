<?php 

	$mysqli = @mysqli_connect('localhost', 'root', '', 'adminpanel');
	if (!$mysqli){
	   die("Connection failed: " . mysqli_connect_error());
	}

?>