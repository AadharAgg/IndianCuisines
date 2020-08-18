<?php
	include_once "config.inc.php";

	$name = $email = $password =  "";
	if(isset($_POST['register'])){
		if(empty(trim($_POST['name']))){
			header("Location: {$hostname}/register.php?err=Name%20field%20can%20not%20be%20empty%21");
			exit();
			
		}else{
			$name = trim($_POST['name']);
		}
		if(empty(trim($_POST['email']))){
			header("Location: {$hostname}/register.php?err=Email%20field%20can%20not%20be%20empty%21");
			exit();
			
		}else{
			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				header("Location: {$hostname}/register.php?err=Invalid%20Email%20Format%21");
				exit();
				
			}else{
				$sql = "SELECT * FROM users WHERE email = ?";
				$stmt = mysqli_prepare($conn, $sql);
				if($stmt){
					$param_email = $_POST['email']; 
					mysqli_stmt_bind_param($stmt, "s", $param_email);
					if(mysqli_stmt_execute($stmt)){
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt) > 0){
							header("Location: {$hostname}/register.php?err=Email%20already%20taken%21");
							exit();
						}else{
							$email = $_POST['email'];
						}
					}
				}
				mysqli_stmt_close($stmt);
			}
		}
		if(empty(trim($_POST['password']))){
			header("Location: {$hostname}/register.php?err=Password%20field%20can%20not%20be%20empty%21");
			exit();
		}else{
			if(strlen(trim($_POST['password'])) < 6){
				header("Location: {$hostname}/register.php?err=Password%20must%20be%20of%20atleat%206%20characters%21");
				exit();
			
			}else{
				if(trim($_POST['password']) !== trim($_POST['cpassword'])){
					header("Location: {$hostname}/register.php?err=Password%20must%20match%21");
				exit();
					
				}else{
					$password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
				}
			}
		}
	if(empty($name_err) && empty($email_err) && empty($password_err) && empty($cpassword_err)){
		$sql = "INSERT INTO users(name, email, password) VALUES (?,?,?)";
		$stmt = mysqli_prepare($conn, $sql);
		if($stmt){
			$param_name = $name;
			$param_email = $email;
			$param_password = $password;
			echo $param_password, $param_email;
			mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_password);
			if(mysqli_stmt_execute($stmt)){
				header("Location: {$hostname}/login.php");
			}else{
				echo "Something went wrong!";
			}
			mysqli_stmt_close($stmt);
		}	
	}
	}
	mysqli_close($conn);
 ?>