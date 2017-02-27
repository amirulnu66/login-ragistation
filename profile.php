<?php
include 'lib/user.php';
include 'inc/header.php';
Session::chechSession();
?>

<?php 
	if(isset($_GET['id'])){
		$userid = (int)$_GET['id'];
	}
	$user = new User();
	if($_SERVER["REQUEST_METHOD"] == "post" && isset($_POST['update'])){
		$Updateur = $user->updateUserData($userid ,$_POST);
	}
	
?>

<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>User Profile <span class="pull-right"><a href="index.php" class="btn btn-primary">Back</a></span></h3>
	</div>
	<div class="panel-body">
		<div style="max-width: 600px; margin: 0 auto">
		<?php
			if(isset($Updateur)){
				echo $Updateur;
			}

		?>


	<?php 
		$user = $user->getUserByid($userid);
		if($user){

	?>	
			<form action="" method="post">
				<div class="form-group">
					<label for="username">Your Name</label>
					<input type="text" id="name" name="name" class="form-control" value="<?php echo $user->name ;?>" />
				</div>
				<div class="form-group">
					<label for="name">User Name</label>
					<input type="text" id="username" name="username" class="form-control" value="<?php echo $user->username ;?>" />
				</div>
				<div class="form-group">
					<label for="email">Email Adders</label>
					<input type="text" id="email" name="email" class="form-control" value="<?php echo $user->email ;?>" />
				</div>
				<?php $sesId = Session::get("gara_id");	
					 if($user->id == $sesId){


				?>
				<button type="submit" name="update" class="btn btn-success">Update</button>
				<?php }?>
			</form>
		<?php } ?>	
		</div>
	</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>