<?php
session_start();
$user= $email= "";

if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
	$email = $_SESSION['mail'];
}
else{
	header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
<title>Mathematics Distant Learning</title>
</head>
<body>
	<div class="userHeader">
	<a href=""><h3>Logout</h3></a><h1><?php echo $user; ?></h1><a href=""><h3>Join Discussion</h3></a>
	<h2><?php echo $email; ?></h2>
	</div>
	<div class="userBody">
		>> <a href="quadratic_solver.php">Quadratic Equation Solver(Using Quadratic Formula)</a>
	</div>
</body>
</html>