<?php

	session_start();

	require_once 'db_connection.php';

	if (isset($_SESSION['admin'])){
	$res=mysqli_query($mysqli, "SELECT * FROM `userdata` WHERE userdata_id=". $_SESSION['admin']. "");
	$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
	}
	
	if(!isset($_SESSION['admin'])){
		header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
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
				if (isset($_SESSION['admin'])) {
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
		<h1 class="pageheader">Dashboard</h1>
		<hr>
		<div class="centermepls">
			<h2>Itemlist</h2>
		</div>

		<?php

		$sql = mysqli_query($mysqli, "SELECT * FROM `items`");

		$count = mysqli_num_rows($sql);

		if($count > 0) {
			while($ItemRow = mysqli_fetch_array($sql)){
			echo 
			'
				<div id="'. $ItemRow['item_id']. '" class="item">
					<p>'. $ItemRow['item_id']. ") ". $ItemRow['itemName']. '</p>
				</div>
			';
			}
		}
		else{
			echo 'No data available';
		}

		?>
	</div>
		<div class="footer">
			<p>Benjamin Schneider - CodeFactory 2019</p>
		</div>
</body>
</html>