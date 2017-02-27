<?php

    $filePath =realpath(dirname(__FILE__));
    include_once $filePath."/../lib/session.php";
    Session::init();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Regester Form</title>
</head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="inc/style.css">

<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">D L R S<br/>OOP WITH PDO <?php echo " Today".date('d/m/Y'); ?></a>
    </div>
    <ul class="nav navbar-nav pull-right">

      <?php 
        $id = Session::get("gara_id");
          $userlogin = Session::get("login");
          if($userlogin == true){

      ?>
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="profile.php?id=<?php echo $id; ?>">Profile</a></li>
      <li><a href="logout.php">Logout</a></li>
      <?php }else{ ?>
      <li><a href="login.php">Login</a></li>
      <li><a href="register.php">Register</a></li>
      <?php }?>
    </ul>
  </div>
</nav>