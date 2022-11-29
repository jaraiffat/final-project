<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
	header("location: index.php");
	exit;
}
include 'Connection.php';
$name = "";
$email = "";
$mobile = "";
$query = "select * from admin where email = '$_SESSION[email]'";
$query_run = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($query_run)) {
	$name = $row['name'];
	$email = $row['email'];
	$mobile = $row['mobile'];
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
		<div class="container-fluid">
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


	</div>
	</nav>
	<div class="py-3">
		<marquee>Library opens at 8:00 AM and close at 8:00 PM</marquee>
	</div>

	<div class="container-fluid" style="background-image: url('bg2.png'); ">
		<div class="container d-flex justify-content-center align-items-center">
			<div class="card shadow text-light p-5 mb-5 mt-5 bg-secondary bg-body rounded ">
				<form>
					<center>
						<h4 style=" text-shadow:  rgba(25, 30, 95, 0.5) 0px 3px 3px;">Admin Profile</h4>
					</center>
					<br>
					<div class="form-group">
						<b><label>Name:</label></b>
						<input type="text" class="form-control" value="<?php echo $name; ?>" disabled>
					</div>
					<div class="form-group">
						<b><label>Email:</label></b>
						<input type="text" class="form-control pl-3 pr-1" value="<?php echo $email; ?>" disabled>
					</div>
					<div class="form-group ">
						<b> <label>Mobile:</label> </b>
						<input type="text" class="form-control" value="<?php echo $mobile; ?>" disabled>
					</div>
				</form>
			</div>
		</div>
	</div>

	<footer class="bg-light text-center text-lg-start">
		<!-- Copyright -->
		<div class="text-center p-3 text-light bg-dark">
			© 2021 Copyright:
			<a class="text-light" href="https://www.istiaq66.codes">Istiaq66.com</a>
			<a href="../contact.php">Contact us</a>
		</div>
		<!-- Copyright -->
	</footer>


</body>

</html>