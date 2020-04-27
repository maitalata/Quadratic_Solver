<?php
require("includes/classes.inc.php");

$handling = new data_handling();

$error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
		$empty = $handling->check_values($_POST['member'], $_POST['email'], $_POST['username'], $_POST['pass']);
		
		if(!$empty)
		{
			$error = "Every Field must be filled";
		}
		else{
				$password = md5($_POST['pass']);
				$statement = $db->prepare("INSERT INTO users (name, email, username, password) VALUES (?, ?, ?, ?)");
				$statement->bind_param('ssss', $_POST['member'], $_POST['email'], $_POST['username'], $password);
				$statement->execute();
				header("Location: success.php");
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
	<div class="box">
		<form action="" method="POST">
			<table>
			<tr>
			<td>Name</td>
			</tr>
			<tr>
			<td><input type="text" name="member" placeholder="Your Name"></td>
			</tr>
			<tr>
			<td>Email</td>
			</tr>
			<tr>
			<td><input type="text" name="email" placeholder="Your Email"></td>
			</tr>
			<tr>
			<td>Username</td>
			</tr>
			<tr>
			<td><input type="text" name="username" placeholder="Username"></td>
			</tr>
			<tr>
			<td>Password</td>
			</tr>
			<tr>
			<td><input type="password" name="pass" placeholder="Password"></td>
			</tr>
			<tr>
			<td><input type="submit" value="Enroll"></td>
			</tr>
			</table>
		</form>
	</div>
</body>
</html>