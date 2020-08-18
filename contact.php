<?php
	include 'header.php';

?>

<div style="opacity: 0.7;" >
	<div class="card mx-auto mt-5" style="width: 20rem;  background-color: black">
		<div class="card-body">	
			<h5 style="color: white;">Send Email</h5>	
			<form action="includes/contact.inc.php" method="POST">
				<div class="form-group" style="display: flex;">
					<i class="fa fa-user icon"></i>
					<input type="text" name="name" class="form-control" placeholder="Name" required>
				</div>

				<div class="form-group" style="display: flex;">
					<i class="fa fa-envelope icon"></i>
					<input type="email" name="email" class="form-control" placeholder="Email" required>
				</div>
				<div class="form-group" style="display: flex;">
					<i class="fa fa-tag icon"></i>
					<input type="text" name="subject" class="form-control" placeholder="Subject" required>
				</div>
				<div class="form-group" style="display: flex;">
					<i class="fa fa-pen icon"></i>
					<textarea name="message" placeholder="Message" class="form-control" required></textarea>
				</div>
				<button type="submit" class="btn btn-primary" name="send-mail">
					Send Email
				</button>
			</form>
		</div>
	</div>
</div>


<?php
	include "footer.php";
?>