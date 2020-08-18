<?php 
	include_once "header.php";
  	include_once "includes/config.inc.php";

  # Check If User Is Loggedin
	if(!isset($_SESSION['ID'])){
		header("Location: {$hostname}/login.php");
	}
  
?>

 <!-- Fetching Recipes -->
<?php 
  $page_limit = 1;
    if(isset($_GET['page'])){
      $page = $_GET['page'];
    }else{
      $page = 1;
    }
  $offset = ($page - 1) * $page_limit;

  $sql = "SELECT * FROM recipe JOIN users ON recipe.cook_id=users.ID ORDER BY date_posted DESC LIMIT {$offset},{$page_limit};";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)){
      while($row = mysqli_fetch_assoc($result)){
?>

 <!-- Display Recipes -->
<div style="opacity: 0.7;" >
  <div class="card mx-auto mt-2" style="width: 38rem; background-color: black">
    <img class="card-img-top img-fluid ml-auto mr-auto" src="uploads/<?php echo $row['rcp_img']; ?>" alt="Card image cap"
     style="height: 240px; width: 50%;">
    <div class="card-body"> 
       <h5 class="card-title" style="color: white;"><?php echo $row['title']; ?></h5>
        <small class="card-text" style="color: white;"> <?php echo $row['description']; ?></small><br>

        <!-- Edit And Delete Recipe Buttons If Active User Is THE USER WHO ADD RECIPE --> 
        <a href="recipe-detail.php?id=<?php echo $row['rcp_id']; ?>" class="btn btn-success">Read Recipe &rarr;</a>
        <?php if($_SESSION['ID'] == $row['cook_id']){ ?>
          <a href="edit-recipe.php?id=<?php echo $row['rcp_id']; ?>" class="btn btn-primary">Edit Recipe</a>
        <?php } ?>

        <?php if($_SESSION['ID'] == $row['cook_id']){ ?>
          <a href="includes/delete-recipe.inc.php?id=<?php echo $row['rcp_id']; ?>" class="btn btn-danger">Delete Recipe</a>
        <?php } ?>
    </div>
    <div class="card-footer text-muted">
      <span style="color:white;">Category: <?php echo $row['category']; ?></span><br>
      <div class="ml-auto">
        <span style="color:white;">Posted on <?php echo date("d-m-Y", strtotime($row['date_posted'])); ?> by</span>
        <a href="#" style="text-decoration: none;"><?php echo $row['name']; ?></a>
      </div>    
    </div>
  </div>
</div>
<?php }
  }
?>

  <!-- Pagination -->
  <ul class="pagination justify-content-center mt-2">
  <?php
    if($page > 1){
      echo "<li class='page-item'>
      <a style='background-color: black; color: white;' class='page-link' href='home.php?page=" .($page-1) . "'>&larr;Prev </a></li>";
    }
    $total_records_query = "SELECT * FROM recipe";
    $trq_result = mysqli_query($conn, $total_records_query) or die("Query Failed!");
    $total_pages = "";
    if(mysqli_num_rows($trq_result) > 0){
      $total_records = mysqli_num_rows($trq_result);
      $total_pages = ceil($total_records/$page_limit);
      for($i=1; $i<=$total_pages; $i++){
        echo "<li class='page-item'> 
        <a style='background-color: black; color: white;' class='page-link' href='home.php?page=". $i ."'>". $i . "</a></li>";
      }
    }else{
      echo "<h3 style='color:red;'>No Recipes There!<a style='color:blue;' href='add-recipe.php'>Add One</a></h3>";
    }
    if($total_pages > $page){
      echo "<li class='page-item'>
      <a style = 'background-color: black;  color: white;' class='page-link' href='home.php?page=" .($page+1)."'>Next&rarr;</a><li>";
    }
    echo "</ul>"; 
    mysqli_close($conn);
    include_once "footer.php";
  ?>  