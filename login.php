<?php
include 'inc/header.php';
include 'lib/user.php';
Session::chechLogin();

?>

<?php
	$Lous = new User();
	 if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
	 	$userLogin = $Lous->loginUser($_POST);
	 
	 }

?>

<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>User Login</h3>
	</div>
	<div class="panel-body">
	<div style="max-width: 350px; margin: 0 auto">
	<?php 
	if(isset($userLogin)){
		echo $userLogin;
		}
	?>

	<form action="" method="post">
		<div class="form-group">
			<label for="email">Email Adders</label>
			<input type="text" id="email" name="email" class="form-control"/>
		</div>
		<div class="form-group">
			<label for="email">password</label>
			<input type="password" id="password" name="password" class="form-control" />
		</div>
		<button type="submit" name="login" value="SEND" class="btn btn-success">Loging</button>
	</form>
	</div>
	</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>