<?php

	session_start();

	require_once 'db_connection.php';

	if (isset($_SESSION['user'])){
		$res=mysqli_query($mysqli, "SELECT * FROM `userdata` WHERE userdata_id=". $_SESSION['user']. "");
		$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
	}

	if (isset($_SESSION['admin'])){
		$res=mysqli_query($mysqli, "SELECT * FROM `userdata` WHERE userdata_id=". $_SESSION['admin']. "");
		$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
	}
	
	if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){
		header("Location: login.php");
	}

	if(isset($_POST['update'])){

		$id = $_POST['item_id'];

		$itemName = $_POST['itemName'];

		$sql = "UPDATE `items` SET itemName = '$itemName' WHERE item_id = {$id}";

		if($mysqli->query($sql) === TRUE) {
			header("Location: home.php");
		} else {
			echo "Error while updating record: ". $mysqli->error;
		}
	}

	if(isset($_POST['delete'])){

		$id = $_POST['item_id'];

		$sql = "DELETE FROM `items` WHERE item_id = {$id}";

		if($mysqli->query($sql) === TRUE) {
			header("Location: home.php");
		} else {
			echo "Error while deleting record: ". $mysqli->error;
		}
	}

	if(isset($_POST['create'])){

		$itemName = $_POST['newItemName'];

		$sql = "INSERT INTO items (`itemName`) VALUES ('$itemName')";

		if($mysqli->query($sql) === TRUE){
			header("Location: home.php");
		} else {
			echo "Error while creating record: ". $mysqli->error;
		}

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
				if (isset($_SESSION['user'])) {
					$displayName = $userRow['userFirstName']. " ". $userRow['userLastName'][0]. ".";
					echo '<i class="fas fa-sign-out-alt"></i> '. $displayName;
				}
				elseif (isset($_SESSION['admin'])) {
					$displayName = $userRow['userFirstName']. " ". $userRow['userLastName'][0]. ".";
					echo '<i class="fas fa-sign-out-alt"></i> '. $displayName. " ADMIN";
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
			if(isset($_SESSION['admin'])){
				echo '
					<div calss="createnewrecord">
						<a type="submit" name="create" data-toggle="modal" data-target="#createModal" class="btn btn-success">Create</a>
						<form method="POST" accept-charset="utf-8">
							<div class="modal fade" id="createModal" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Create a new record</h4>
										</div>
										<div class="modal-body">
											<p>New Item Name</p>
											<input type="text" name="newItemName" placeholder="New Item Name">
										</div>
										<div class="modal-footer">
											<input type="submit" name="create" class="btn btn-primary" value="Create">
											<button type="submit" class="btn btn-default" data-dismiss="modal">Go back</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
						';
		}
		?>

		<?php

		$sql = mysqli_query($mysqli, "SELECT * FROM `items`");

		$count = mysqli_num_rows($sql);

		if($count > 0) {
			while($ItemRow = mysqli_fetch_array($sql)){
			echo
			'
				<div id="'. $ItemRow['item_id']. '" class="item">
					<p>'. $ItemRow['item_id']. ") ". $ItemRow['itemName']. '</p>';
					
					if(isset($_SESSION['admin'])){
					echo'
						<div class="itembuttons">
							<form method="POST" accept-charset="utf-8">
								<input type="hidden" name="item_id" value="'.$ItemRow['item_id'].'">
								<a type="submit" name="edit" data-toggle="modal" data-target="#editModal'. $ItemRow['item_id']. '" class="btn btn-primary itembuttons">Edit</a>
								<div class="modal fade" id="editModal'. $ItemRow['item_id']. '" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Edit "'. $ItemRow['itemName']. '"</h4>
											</div>
											<div class="modal-body">
												<p>Item Name</p>
												<input type="text" name="itemName" value="'. $ItemRow['itemName']. '">
											</div>
											<div class="modal-footer">
												<input type="submit" name="update" class="btn btn-primary" value="Update">
												<button type="submit" class="btn btn-default" data-dismiss="modal">Go back</button>
											</div>
										</div>
									</div>
								</div>
							</form>

							<form method="POST" accept-charset="utf-8">
								<input type="hidden" name="item_id" value="'.$ItemRow['item_id'].'">
								<a type="submit" name="delete" data-toggle="modal" data-target="#deleteModal'. $ItemRow['item_id']. '" class="btn btn-danger itembuttons">Delete</a>
								<div class="modal fade" id="deleteModal'. $ItemRow['item_id']. '" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Delete "'. $ItemRow['itemName']. '"</h4>
											</div>
											<div class="modal-body">
												<h3>Are you sure you want to delete "'. $ItemRow['itemName']. '"?</h3>
											</div>
											<div class="modal-footer">
												<input type="submit" name="delete" class="btn btn-danger" value="Delete">
												<button type="submit" class="btn btn-default" data-dismiss="modal">Go back</button>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>';
					} echo '
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