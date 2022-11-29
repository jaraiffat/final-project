<?php

require('functions.php');

session_start();

if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
	header("location: index.php");
	exit;
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Admin Dashboard</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../tyle.css">
	<script src="../sweetalert.min.js"></script>
</head>

<body>

	<button onclick="topFunction()" id="myBtn" title="Go to top"></button>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="admin.php">Library Management System(LMS)</a>
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


	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
		<div class="container-fluid">
			<ul class="nav navbar-nav navbar-center">
				<li class="nav-item">
					<a href="admin.php" class="nav-link">Dashboard</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">Book</a>
					<div class="dropdown-menu">
						<a href="add_book.php" class="dropdown-item">Add New Book</a>
						<a href="manage_book.php" class="dropdown-item">Manage Books</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
					<div class="dropdown-menu">
						<a href="add_cat.php" class="dropdown-item">Add New Category</a>
						<a href="manage_cat.php" class="dropdown-item">Manage Category</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">Author</a>
					<div class="dropdown-menu">
						<a href="add_author.php" class="dropdown-item">Add New Author</a>
						<a href="manage_author.php" href="" class="dropdown-item">Manage Authors</a>
					</div>
				</li>
				<li class="nav-item">
					<a href="issue_book.php" class="nav-link">Issue Book</a>
				</li>
				<li class="nav-item">
					<a href="pdf_up.php" class="nav-link">PDF Books</a>
				</li>
				<li class="nav-item">
					<a href="journal_up.php" class="nav-link">Journals</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="py-3">
		<marquee>Welcome to library Management System. Library opens at 8:00 AM and close at 8:00 PM</marquee>
	</div>



	<div class="container-fluid admin-dash">
		<h1 class="text-light text-center">Admin Dashboard</h1>
		<div class="container">
			<div class="row">
				<div class="col-md-3 py-2">
					<div class="card bg-light mt-2">
						<div class="card-header">Registered Users:</div>
						<div class="card-body">
							<p class="card-text">No. of total users: <?php echo get_user_count(); ?> </p>
							<a href="reg_users.php" class="btn btn-danger">View Registered Users</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 py-2">
					<div class="card bg-light mt-2">
						<div class="card-header">Registered Books:</div>
						<div class="card-body">
							<p class="card-text">No. of availbale books: <?php echo get_book_count(); ?> </p>
							<a href="regbooks.php" class="btn btn-info">View Registered Books</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 py-2">
					<div class="card bg-light   mt-2">
						<div class="card-header">Registered Category:</div>
						<div class="card-body">
							<p class="card-text">No. of book's category: <?php echo get_catagory_count(); ?> </p>
							<a href="regcat.php" class="btn btn-warning">View Categories</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 py-2">
					<div class="card bg-light   mt-2">
						<div class="card-header">Registered Authors:</div>
						<div class="card-body">
							<p class="card-text">No. of availbale authors: <?php echo get_auth_count(); ?> </p>
							<a href="regauth.php" class="btn btn-primary">View Authors</a>
						</div>
					</div>
				</div>


				<div class="col-md-3 py-2">
					<div class="card bg-light mt-2">
						<div class="card-header">Issued Books:</div>
						<div class="card-body">
							<p class="card-text">No. Issued Books: <?php echo get_issued_book_count(); ?></p>
							<a href="view_issued_book.php" class="btn btn-success">View Issued books</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php

	if (isset($_SESSION['log']) && $_SESSION['log'] == "Login Successful") { ?>

		<script>
			swal({
				title: "Congratulations!",
				text: "<?php echo $_SESSION['log']; ?>",
				icon: "success",
				button: "Close",
			});
		</script>

	<?php
		unset($_SESSION['log']);
	}
	?>


	<footer class="bg-light text-center text-lg-start">
		<!-- Copyright -->
		<div class="text-center p-3 text-light bg-dark">
			© 2022 Copyright
			<a href="../contact.php">Contact us</a>
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