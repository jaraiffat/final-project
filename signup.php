<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	header("location: user_dashboard.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Library Management System</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="Style.css">
</head>


<body>
	<button onclick="topFunction()" id="myBtn" title="Go to top"></button>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Library Management System(LMS)</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
					<a class="nav-link" href="admin/index.php">Admin Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">User Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="signup.php">Register</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="py-3">
	
		<marquee>Library opens at 8:00 AM and close at 8:00 PM</marquee>
	</div>

	<div class="full text-light">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4" id="side_bar">
				<h5>Library Timing</h5>
				<ul>
					<li>Opening Timing: 8:00 AM</li>
					<li>Closing Timing: 8:00 PM</li>
					<li>(Sunday off)</li>
				</ul>
				<h5>What we provide ?</h5>
				<ul>
					<li>Full furniture</li>
					<li>Free Wi-fi</li>
					<li>News Papers</li>
					<li>Discussion Room</li>
					<li>RO Water</li>
					<li>Peacefull Environment</li>
				</ul>
			</div>
			<div class="col-md-8 py-3" id="main_content" >
				<center>
					<h3>User Registration Form</h3>
				</center>
				<form class="mx-5" action="register.php" method="post">
					<div class="form-group">
						<label for="name"><b> Full Name:</b></label>
						<input type="text" name="name" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="name"><b>Email ID:</b></label>
						<input type="text" name="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="name">Password:</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="name"><b>Mobile Number:</b></label>
						<input type="text" name="mobile" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="name"><b>Address:</b></label>
						<textarea rows="3" cols="40" class="form-control" name="address"></textarea>
					</div>

					<br>
					<button type="submit" id="regibtn" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div>
	</div>


	<footer class="bg-light text-center text-lg-start">
		<!-- Copyright -->
		<div class="text-center p-3 text-light bg-dark">
			© 2022 Copyright
			<a href="contact.php">Contact us</a>
		</div>
		<!-- Copyright -->
	</footer>

	</div>

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