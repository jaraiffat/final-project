<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
	header("location: index.php");
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Admin Dashboard</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../tyle.css">
</head>


<body>


	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid ">
			<div class="navbar-header">
				<a class="navbar-brand" href="admin.php">HOME</a>
			</div>
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email']; ?></strong></span></font>

			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="view_prof.php">View Profile</a>
						<a class="dropdown-item" href="edit_pro.php"> Edit Profile</a>
						<a class="dropdown-item" href="change_pass.php">Change Password</a>
					</div>
				</li>
				<li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
			</ul>
		</div>
	</nav>

	
	</nav>
	<div class="py-3">
		<marquee>Library opens at 8:00 AM and close at 8:00 PM</marquee>
	</div>

	<div class="container-fluid content-box2">
		<div class="container">
			<div class="container d-flex justify-content-center ">
				<div class="card shadow text-light p-5 mb-5 mt-5  bg-body rounded">
					<form class="text-dark font-weight-bold" action="update_pass.php" method="post">
						<center>
							<h4 style="color: cadetblue;">Change Password</h4>
						</center>

						<div class="form-group mt-5">
							<label>Enter Current Password:</label>
							<input type="password" name="old_password" class="form-control">
						</div>
						<div class="form-group">
							<label>Enter New Password:</label>
							<input type="password" name="new_password" class="form-control">
						</div>
						<button type="submit" name="update" class="update btn btn-primary mt-2">Update</button>
					</form>
				</div>

			</div>
		</div>
	</div>

		<footer class="bg-light text-center text-lg-start">
			<!-- Copyright -->
			<div class="text-center p-3 text-light bg-dark">
				© 2021 Copyright:
				<a class="text-light" href="https://istiaq66.com/">Istiaq66.com</a>
				<a href="contact.php">Contact us</a>
			</div>
			<!-- Copyright -->
		</footer>

</body>

</html>