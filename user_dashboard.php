<?php

require('function.php');

session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
	header("location: index.php");
	exit;
}


function get_user_issue_book_count()
{
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "final");
	$user_issue_book_count = 0;
	$query = "select count(*) as user_issue_book_count from issued_books where student_id = $_SESSION[id]";
	$query_run = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($query_run)) {
		$user_issue_book_count = $row['user_issue_book_count'];
	}
	return ($user_issue_book_count);
}



function get_user_returned_book_count()
{
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "final");
	$user_return_book_count = 0;
	$query = "select count(*) as user_return_book_count from rnt where student_id = $_SESSION[id]";
	$query_run = mysqli_query($connection, $query);
	while ($row = mysqli_fetch_assoc($query_run)) {
		$user_return_book_count = $row['user_return_book_count'];
	}
	return ($user_return_book_count);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>User Dashboard</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="tyle.css">
	<script src="sweetalert.min.js"></script>
</head>


<body>





	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="user_dashboard.php">Library Management System(LMS)</a>
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


	<div class="py-3">
		<marquee>Library opens at 8:00 AM and close at 8:00 PM</marquee>
	</div>



	<div class="container-fluid content-box">
		<h1 class="text-light text-center" style="border-bottom: 3px white solid;">User Dashboard</h1>
		<div class="container">
			<div class="row">
				<div class="col-lg-3 py-2">
					<div class="card bg-light mt-2">
						<div class="card-header">Issued Books:
						</div>
						<div class="card-body">
							<p class="card-text">No of issued books: <?php echo get_user_issue_book_count(); ?> </p>
							<a href="view_issued_book.php" class="btn btn-danger" target="_blank">View Issued Books</a>
						</div>
					</div>
				</div>



				<div class="col-md-3 py-2">
					<div class="card bg-light mt-2">
						<div class="card-header">Returned Books:
						</div>
						<div class="card-body">
							<p class="card-text">No of returned books: <?php echo get_user_returned_book_count(); ?> </p>
							<a href="view_returned_book.php" class="btn btn-success" target="_blank">View Returned Books</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 py-2">
					<div class="card bg-light mt-2">
						<div class="card-header">Pdf books:
						</div>
						<div class="card-body">
							<p class="card-text">No of pdf books: <?php echo get_pdf_count(); ?></p>
							<a href="view_pdf.php" class="btn btn-success" target="_blank">View PDFs</a>
						</div>

					</div>

				</div>

				<div class="col-md-3 py-2">
					<div class="card bg-light mt-2">
						<div class="card-header">online Journals:
						</div>
						<div class="card-body">
							<p class="card-text">No of Journals: <?php echo get_jan_count(); ?></p>
							<a href="view_journal.php" class="btn btn-success" target="_blank">View Journals</a>
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

	<footer class="bg-light text-center text-lg-start my-0">
		<!-- Copyright -->
		<div class="text-center py-3 text-light bg-dark">
			© 2022 Copyright
			<a href="../contact.php">Contact us</a>
		</div>
		<!-- Copyright -->
	</footer>



</body>

</html>