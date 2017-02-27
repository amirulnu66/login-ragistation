<?php
include 'inc/header.php';
include 'lib/user.php';
?>

<?php
	$user = new User();
	 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
	 	$regRegi = $user->useregister($_POST);
	 
	 }

?>



<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>User Registration</h3>
	</div>
	<div class="panel-body">
	<div style="max-width: 600px; margin: 0 auto">
	<?php
		if(isset($regRegi)){
			echo $regRegi;
		}
	?>
	<form action="" method="POST">
		<div class="form-group">
			<label for="name">Your Name</label>
			<input type="text" id="name" name="name" class="form-control" />
		</div>
		<div class="form-group">
			<label for="username">User Name</label>
			<input type="text" id="username" name="username" class="form-control" />
		</div>
		<div class="form-group">
			<label for="email">Email Adders</label>
			<input type="text" id="email" name="email" class="form-control" />
		</div>
		<div class="form-group">
			<label for="password">password</label>
			<input type="password" id="password" name="password" class="form-control"  />
		</div>
		<input type="submit" name="submit" class="btn btn-success" value="Submit">
		</form>
		
	</div>
	</div>
</div>
</div>



<?php include 'inc/footer.php'; ?>