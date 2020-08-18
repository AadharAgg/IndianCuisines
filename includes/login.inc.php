<?php
	include_once "config.inc.php";
	session_start();

	if(isset($_SESSION['email'])){
		header("Location: {$hostname}/home.php");
		exit();
	}
	$email = $password = "";

	if(isset($_POST['login'])){
		if(empty(trim($_POST['email']))){
			header("Location: {$hostname}/login.php?err=Email%20can%20not%20be%20empty%21");
			exit();
		}else{
			$email = trim($_POST['email']); 
		}
		if(empty(trim($_POST['password']))){
			header("Location: {$hostname}/login.php?err=Password%20can%20not%20be%20empty%21");
			exit;
		}else{
			$password = trim($_POST['password']); 
		}
	if(empty($email_err) && empty($password_err)){
		$sql = "SELECT id, name, email, password FROM users WHERE email = ?";
		$stmt = mysqli_prepare($conn, $sql);
		if($stmt){
			$param_email = $_POST['email'];
			mysqli_stmt_bind_param($stmt, "s", $param_email);
			if(mysqli_stmt_execute($stmt)){
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt) > 0){
					mysqli_stmt_bind_result($stmt, $ID, $name, $email, $hashed_password);
					if(mysqli_stmt_fetch($stmt)){
						if(password_verify($password, $hashed_password)){
							session_start();
							$_SESSION['name'] = $name;
							$_SESSION['email'] = $email;
							$_SESSION['ID'] = $ID;
							header("Location: {$hostname}/home.php");
						}else{
							header("Location: {$hostname}/login.php?err=Invalid%20password%21");
							exit();
						}
					}
				}else{
					header("Location: {$hostname}/login.php?err=Email%20not%20recognised%21");
					exit();
				}
			} 
		}
		mysqli_stmt_close($stmt);
		}
	}
	mysqli_close($conn);
	?>