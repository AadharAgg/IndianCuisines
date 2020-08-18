<?php
	include "header.php";
	include "includes/config.inc.php";
	$id = $_GET['id'];
    $sql = "SELECT * FROM recipe WHERE rcp_id = $id;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
    	while($row = mysqli_fetch_assoc($result)){
?>
<form action="includes/edit-recipe.inc.php" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="rcp_id" class="form-control" value="<?php echo $id; ?>">
	<div style="display: flex; justify-content: space-around;">
		<div>	
			<div style="opacity: 0.7;" >
				<div class="card mx-2 mt-5" style="width: 18rem; height: 25rem; background-color: black">
					<div class="card-body">	
						<h5 style="color: white;">Edit Recipe:</h5>	
						<div class="form-group">
							<input type="text" name="title" class="form-control" placeholder="Title" 
							value="<?php echo $row['title']; ?>" required>
						</div>	
						<div class="form-group">
							<input type="text" name="description" class="form-control" placeholder="Description"
							value="<?php echo $row['description']; ?>" required>
						</div>
						<div class="form-group">
							<select  class="custom-select" name="category" required>
								<?php $categories = array("Regular", "Beverages", "Desserts", "Snacks");
										foreach ($categories as $category) {
										  	if($row['category'] == $category){
								?>	
								<option selected value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
								<?php	  				  									
										  	}else{
								?>
								<option  value="<?php echo $category; ?>"><?php echo $category; ?></option>
								<?php		 		
										  	}
										  }  ?>
							</select>
						</div>
						<div class="form-group" style="color: white">
							Add Image<input type="file" name="rcp_img" required>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div>	
			<div style="opacity: 0.7;" >
				<div class="card mx-2 mt-5" style="width: 25rem; height: 25rem; background-color: black">
					<div class="card-body">	
						<div class="form-group shadow-textarea">
							<textarea style="height: 20rem;" class="form-control z-depth-1" placeholder="Ingredients......" name="ingredients" required><?php echo $row['ingredients']; ?></textarea>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<div>	
			<div style="opacity: 0.7;" >
				<div class="card mx-2 mt-5" style="width: 20rem; height: 25rem; background-color: black">
					<div class="card-body">	
						<div class="form-group shadow-textarea">
							<textarea style="height: 20rem;" class="form-control z-depth-1" placeholder="Process......" name="process" required><?php echo $row['process']; ?></textarea>
						</div>
						<button type="submit" class="btn btn-primary" name="edit-recipe">
							Edit Recipe
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>


<?php
	}	
}
	mysqli_close($conn);
	include "footer.php";
?>