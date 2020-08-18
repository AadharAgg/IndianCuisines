<?php
	include_once "config.inc.php";
	session_start();

	if(isset($_FILES['rcp_img'])){

		$filename     = $_FILES['rcp_img']['name'];
		$filesize     = $_FILES['rcp_img']['size'];
		$filetmp_name = $_FILES['rcp_img']['tmp_name'];
		$filetype 	  = $_FILES['rcp_img']['name'];
		$fileext 	  = end(explode('.', $filename));
		$extensions   = array("jpeg", "jpg", "png");

		if(in_array($fileext, $extensions) === false){
			header("Location: ../add-recipe.php?err=ThisExtensionNotAllowed");
		}else{
			move_uploaded_file($filetmp_name, "../uploads/".$filename);
			if(isset($_POST['add-recipe'])){
				$title       = $_POST['title'];
				$description = $_POST['description'];
				$category    = $_POST['category'];
				$ingredients = $_POST['ingredients'];
				$process     = $_POST['process'];
				$cook_id     = $_SESSION['ID'];
		
				$sql = "INSERT INTO recipe(title, description, category, cook_id, ingredients, process, rcp_img) VALUES 
						('{$title}', '{$description}', '{$category}', {$cook_id}, '{$ingredients}', '{$process}', '{$filename}')";
				if(mysqli_query($conn, $sql)){
					header("Location: {$hostname}/home.php");
				}else{
					header("Location: {$hostname}/home.php?err=datanotinserted");
				}	

				}else{
					header("Location: {$hostname}/home.php");
				}
			}
		}	
	mysqli_close($conn);
?>