<?php
	include_once "header.php";
	include_once "includes/config.inc.php";

	$err = "";
	if(isset($_GET['err'])){
		$err = $_GET['err'];
	}

	if(isset($_SESSION['email'])){
		header("Location: {$hostname}/indian-cuisines/home.php");
		exit();
	}
	if($err){
 ?>
<div class="alert alert-secondary mt-2 mx-5 alert-dismissible fade show" role="alert">
	<p style="margin: 0px; color: red"><?php echo $err; ?></p>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true" >&times;</span>
	</button>
</div>

 <?php } ?>

<div  style="opacity: 0.7">
	<div class="card mx-auto mt-5" style="width: 18rem; background-color: black">
		<div class="card-body">	
			<h5 style="color: white">Register</h5>	
			<form action="includes/register.inc.php" method="POST">

				<?php if($err){ ?>
				<div class="form-group" style="display: flex;">
					<i class="fa fa-user icon">	</i>	
					<input style="outline:none;" type="text" name="name" class="form-control is-invalid" placeholder="Username">
				</div>
				<?php }else{ ?>
				<div class="form-group" style="display: flex;">
					<i class="fa fa-user icon">	</i>	
					<input style="outline:none;" type="text" name="name" class="form-control" placeholder="Username">
				</div>
				<?php } ?>

				<?php if($err){ ?>
				<div class="form-group" style="display: flex;">
					<i class="fa fa-envelope icon">	</i>
					<input type="email" name="email" class="form-control is-invalid" placeholder="Email">
				</div>
				<?php }else{ ?>
				<div class="form-group" style="display: flex;">
					<i class="fa fa-envelope icon">	</i>
					<input type="email" name="email" class="form-control" placeholder="Email">
				</div>
				<?php } ?>

				<?php if($err){ ?>
				<div class="form-group" style="display: flex;">
					<i class="fa fa-key icon">	</i>
					<input type="password" name="password" class="form-control is-invalid" placeholder="Password">
				</div>
				<?php }else{ ?>
				<div class="form-group" style="display: flex;">
					<i class="fa fa-key icon">	</i>
					<input type="password" name="password" class="form-control" placeholder="Password">
				</div>
				<?php } ?>

				<?php if($err){ ?>
				<div class="form-group" style="display: flex;">
					<i class="fa fa-key icon">	</i>
					<input type="password" name="cpassword" class="form-control is-invalid" placeholder="Confirm Password">
				</div>
				<?php }else{ ?>
				<div class="form-group" style="display: flex;">
					<i class="fa fa-key icon">	</i>
					<input type="password" name="cpassword" class="form-control" placeholder="Confirm Password">
				</div>
				<?php } ?>

				<div class="form-group">
					<p style="font-size: 14px; color: white;">Already have account?<a style="font-size: 16px" href="login.php">Login</a></p>
				</div>
				<button type="submit" class="btn btn-success" name="register">
					Register
				</button>
			</form>
		</div>
	</div>
</div>
<?php
	include_once "footer.php";
?>