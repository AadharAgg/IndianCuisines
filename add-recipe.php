<?php
	include "header.php";
?>
<form action="includes/add-recipe.inc.php" method="POST" enctype="multipart/form-data">
	<div style="display: flex; justify-content: space-around;">
		<div>	
			<div style="opacity: 0.7;" >
				<div class="card mx-2 mt-5" style="width: 18rem; height: 25rem; background-color: black">
					<div class="card-body">	
						<h5 style="color: white;">Recipe:</h5>	
						<div class="form-group">
							<input type="text" name="title" class="form-control" placeholder="Title" required>
						</div>	
						<div class="form-group">
							<input type="text" name="description" class="form-control" placeholder="Description" required>
						</div>
						<div class="form-group">
							<select  class="custom-select" name="category" required>
								<option value="" disabled selected>Select Category</option>
								<option value="Regular">Regular</option>
								<option value="Beverages">Beverages</option>
								<option value="Desserts">Desserts</option>
								<option value="Snacks">Snacks</option>
							</select>
						</div>
						<div class="form-group" style="color: white">
							Add Image<input type="file" name="rcp_img">
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
							<textarea style="height: 20rem;" class="form-control z-depth-1" placeholder="Ingredients......" name="ingredients" required></textarea>
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
							<textarea style="height: 20rem;" class="form-control z-depth-1" placeholder="Process......" name="process" required></textarea>
						</div>
						<button type="submit" class="btn btn-primary" name="add-recipe">
							Add Recipe
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>


<?php
	include "footer.php";
?>