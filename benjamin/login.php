<?php
	
	session_start();

	require_once 'db_connection.php';

	$userEmail = "";
	$loginError = "";
	$error = false;


	if(isset($_POST['login'])){

		$userEmail = $_POST['userEmail'];

		$userPassword = $_POST['userPassword'];
	}

?>	

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
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
		<h1 class="pageheader">Login</h1>
		<hr>
		<form class="loginform" method="post" accept-charset="utf-8">
			<span><?php echo $loginError ?></span>
			<div class="loginfield">
				<i class="fas fa-envelope"></i>
				<input type="text" name="userEmail"  placeholder="Email" value="<?php echo $userEmail ?>" required>
			</div>
			<div class="loginfield">
				<i class="fas fa-key"></i>
				<input type="password" name="userPassword" placeholder="Password" required>
			</div>
			<input class="btn btn-success loginbutton" type="submit" name="login" value="Sign in">
			<p>No account yet? <a class="createaccountlink" href="register.php" title="Create account">Create one here!</a></p>
		</form>
	</div>
	<div class="footer">
		<p>Benjamin Schneider - CodeFactory 2019</p>
	</div>
</body>
</html>