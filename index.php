<?php
include 'lib/user.php';
include 'inc/header.php';
Session::chechSession();

?>

<?php

	$loginmsg = Session::get("LoginMsg");
	if(isset($loginmsg)) {
	 	echo $loginmsg;
	 }
	 /*
	 $usertype = Session::get("user_type");
	 if ($usertype == 1) {
	 	echo "EDITOR Only Edit and View Mode";
	 }
	 elseif ($usertype == 2) {
	 	echo "Admin";
	 }else{
	 	echo "USER ONLY";
	 }
	*/


?>



<div class="col-md-10 col-md-offset-1">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3>User list <span class="pull-right">welcome..!<strong>
		<?php

			$name = Session::get("tomas");
			if($name){
				echo $name;
			}
		?>
		</strong></span></h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			<th>Serial</th>
			<th>Name</th>
			<th>User Name</th>
			<th>Email Address</th>
			<th>Action</th>
	<?php
	$user = new User();
		$usedata = $user->getUserdata();
		foreach ( $usedata as $val):
	?>	
			<tr>
	
				<td><?php echo $val['id']; ?></td>
				<td><?php echo $val['name']; ?></td>
				<td><?php echo $val['username']; ?></td>
				<td><?php echo $val['email']; ?></td>
				<td>
					<a style="color: #fff" href="profile.php?id=<?php echo $val['id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a> |
					<a style="color: #fff" href="#"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				</td>
			</tr>
		<?php endforeach;?>
		</table>
	</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>






