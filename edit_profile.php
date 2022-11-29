<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
include 'Connection.php';
$id = "";
$name = "";
$email = "";
$mobile = "";
$address = "";
$query = "select * from users where email = '$_SESSION[email]'";
$query_run = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
	$id = $row['id'];
	$name = $row['name'];
	$email = $row['email'];
	$mobile = $row['mobile'];
	$address = $row['address'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Edit</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="tyle.css">
</head>


<body>

<button onclick="topFunction()" id="myBtn" title="Go to top"></button>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="user_dashboard.php">HOME</a>
			</div>
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email']; ?></strong></span></font>

			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="view_profile.php">View Profile</a>
						<a class="dropdown-item" href="edit_profile.php"> Edit Profile</a>
						<a class="dropdown-item" href="change_password.php">Change Password</a>
					</div>
				</li>
				<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
			</ul>
		</div>
	</nav>


	</div>
	</nav>
	<div class="py-3">
		<span>
			<marquee>Library opens at 8:00 AM and close at 8:00 PM</marquee>
		</span>
	</div>

	<div class="container-fluid" style="background-image: url('bg.png'); ">
		<div class="container d-flex justify-content-center align-items-center">
			<div class="card shadow text-light p-4 mb-3 mt-3  bg-body rounded">
				<form class="text-dark" action="edit.php" method="post">
					<center>
						<h3 style="color: cadetblue;">Edit Profile</h3>
					</center>
					<div class="form-group">
						<b><label>Name:</label></b>
						<input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
					</div>
					<div class="form-group">
						<b><label>Email:</label></b>
						<input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
					</div>
					<div class="form-group">
						<b> <label>Mobile:</label> </b>
						<input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>">
					</div>
					<div class="form-group">
						<b> <label>Address:</label></b>
						<textarea rows="3" cols="40" name="address" class="form-control"><?php echo $address; ?></textarea>
					</div>
					<input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
					<button type="submit" name="edit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>

		<footer class="bg-light text-center text-lg-start">
			<!-- Copyright -->
			<div class="text-center p-3 text-light bg-dark">
				© 2021 Copyright:
				<a class="text-light" href="https://www.istiaq66.codes/">Istiaq66.com</a>
			</div>
			<!-- Copyright -->
		</footer>
	




		<script>
		//Get the button
		var mybutton = document.getElementById("myBtn");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {
			scrollFunction()
		};

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				mybutton.style.display = "block";
			} else {
				mybutton.style.display = "none";
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>



</body>

</html>