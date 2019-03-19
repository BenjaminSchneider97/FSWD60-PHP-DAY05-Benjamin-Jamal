<?php

	require_once 'db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="navbar">
		<p>Admin Panel</p>
		<span class="navbar-login">
			<a href="login.php" title="Login">
			<?php
				if (isset($_SESSION['user'])) {
					$displayName = $userRow['userFirstName']. " ". $userRow['userLastName'][0]. ".";
					echo '<i class="fas fa-sign-out-alt"></i> '. $displayName;
				}	
				else {
					echo '<i class="fas fa-sign-in-alt"></i> Login';
				}
			?>
			</a>
		</span>
	</div>
	<div class="container">
		<h1 class="pageheader">Registration</h1>
		<a class="mainpageback" href="login.php"><i class="fas fa-arrow-left"></i> Back to the login page</a>
		<hr>
		<div class="successmessage">
			<h3>Successfully created account!</h3>
		</div>
	</div>
	<div class="footer">
		<p>Benjamin Schneider - CodeFactory 2019</p>
	</div>
</body>
</html>