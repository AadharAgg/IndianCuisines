<?php
	include_once "config.inc.php";
	session_start();

	if(isset($_FILES['rcp_img'])){
			
		$filename      = $_FILES['rcp_img']['name'];
		$filesize      = $_FILES['rcp_img']['size'];
		$filetmp_name  = $_FILES['rcp_img']['tmp_name'];
		$filetype 	   = $_FILES['rcp_img']['name'];
		$fileExt 	   = explode('.', $filename);
		$fileActualExt = strtolower(end($fileExt));
		$extensions    = array("jpeg", "jpg", "png");

		if(in_array($fileActualExt, $extensions) == false){
			header("Location: ../home.php?err=ThisExtensionNotAllowed");
		}else{
			move_uploaded_file($filetmp_name, "../uploads/".$filename);

			if(isset($_POST['edit-recipe'])){
				$title       = $_POST['title'];
				$description = $_POST['description'];
				$category    = $_POST['category'];
				$ingredients = $_POST['ingredients'];
				$process     = $_POST['process'];
				$id 		 = $_POST['rcp_id'];

				$sql = "UPDATE recipe set title = '{$title}', description = '{$description}', category = '{$category}',
		 		rcp_img = '{$filename}', ingredients = '{$ingredients}', process = '{$process}' WHERE rcp_id = $id;";  

				if(mysqli_query($conn, $sql)){
					header("Location: ../home.php");
				}else{
					header("Location: ../home.php?err=datanotupdated");
					}

				}else{
					header("Location: ../home.php");
					}
				}
	}

	mysqli_close($conn);
?>