<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Indian Cuisines</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width", initial-scale=1>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/mycss.css">
	<link rel="stylesheet" href="font-awesome/css/all.css">
	<style type="text/css">
	
	</style>
</head>
<body class="img-fluid">
	<!-- Navbar -->
<div style="opacity: 0.8;">	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="index.php">
			<img src="img/logo.jpeg" width="30" height="30" class="d-inline-block align-top" alt="news-time-logo">
			Indian Cuisines
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About Us</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php">Contact</a>
				</li>
			</ul>
			<?php 
				if(isset($_SESSION['ID'])){
			?>
			<ul class="navbar-nav ml-auto">
				<li class="mt-2 mx-1"><a style="color:white; text-decoration: none;" href="add-recipe.php">Add Recipe |</a></li>
				<li class="mt-2 mx-1" style="color: white;">
					<?php echo $_SESSION['name']; ?>
				</li>
				<li style="color: white;">
					<i class="fa fa-user mt-3"></i>
				</li>
				<li class="mt-2 mx-2">
					<a href="includes/logout.inc.php" style="color: white; text-decoration: none;">| Logout</a>
				</li>
			</ul>
		<?php } ?>
		</div>
	</nav>
</div>

	
