<?php
	include_once "config.inc.php";
	$id = $_GET['id'];
	$image = "";

	$sql = "SELECT * FROM recipe WHERE rcp_id = $id";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$image = $row['rcp_img'];
		}
	}
	$path = "../uploads/".$image;
	unlink($path);

	$sql = "DELETE FROM recipe WHERE rcp_id = $id";
	if(mysqli_query($conn, $sql)){
		header("Location: ../home.php?success=RecipeDeleted");
	}else{
		header("Location: ../home.php?err=RecipeNotDeleted");
	}
	mysqli_close($conn);
?>