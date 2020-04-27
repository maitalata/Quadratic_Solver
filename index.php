<?php
session_start();
require("includes/classes.inc.php");

$handling = new data_handling();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$empty = $handling->check_values($_POST['username'], $_POST['password']);
	
	if(!$empty)
	{
		$error = "Missing Password Or Username";
	}else{
		$password = md5($_POST['password']);
		$statement = $db->prepare("SELECT name, email, username, password FROM users WHERE username= ? AND password= ?");
		$statement->bind_param('ss', $_POST['username'], $password);
		$statement->execute();
		$statement->store_result();
		if($statement->num_rows == 1){
			echo "nested if";
			$statement->bind_result($name, $email, $user, $pass);
			$row = $statement->fetch();
			$_SESSION['user'] = $name;
			$_SESSION['mail'] = $email;
			header("Location: user.php");
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
<title>Mathematics Distant Learning</title>
</head>
<body>
	<a href="index.php"><div class="header">
		Mathematics Distant Learning
	</div></a>
	<div class='box'>
		<a href="enroll.php" id="btn">Enroll</a>
		<fieldset>
		<legend>Login</legend>
		<form action="" method="POST">
		<table>
		<tr>
		<td><input type="text" name="username" placeholder="Username"></td>
		<td><input type="password" name="password" placeholder="Password"></td>
		</tr>
		<tr>
		<td><input type="submit" value="Login"></td>
		</tr>
		</table>
		</form>
		</fieldset>
	</div>
	<div class='box'>
		<img width="420" height="420" src="images/math.jpg">
	</div>
</body>
</html>