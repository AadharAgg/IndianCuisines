<?php
	include "header.php"; 
    include "includes/config.inc.php";
	$id = $_GET['id'];
    $sql = "SELECT * FROM recipe WHERE rcp_id = $id;";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){
    	while($row = mysqli_fetch_assoc($result)){
        
?>
	<div style="display: flex; justify-content: space-around;">
		<div>	
			<div style="opacity: 0.7;" >
				<div class="card mx-2 mt-5" style="width: 18rem; height: 25rem; background-color: black">
					<div class="card-body">	
						<div class="form-group shadow-textarea">
							<label style="color: white;">Ingredients:</label>
							<textarea style="height: 18rem;" class="form-control z-depth-1" disabled>
								<?php echo $row['ingredients']; ?></textarea>
						</div>	
					</div>
				</div>
			</div>
		</div>
		<div>	
			<div style="opacity: 0.7;" >
				<div class="card mx-2 mt-5" style="width: 18rem; height: 25rem; background-color: black">
					<div class="card-body">	
						<div class="form-group shadow-textarea">
							<label style="color: white;">Process:</label>
							<textarea style="height: 18rem;" class="form-control z-depth-1" disabled>
								<?php echo $row['process']; ?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
	}
}
	mysqli_close($conn);
	include "footer.php";
?>