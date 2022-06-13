<?php
session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['Request Method'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{
			//save to database
			$user_id = random_num(100);
			$query = "insert into users(user_id, user_name, password) values ('$user_id', '$user_name', '$password')";
			mysqli_query($con, $query);
			
			$_SESSION['user_id'] = $user_data['user_id'];
			
			header("location: login.php");
			die;
		}else
		{
			echo "Please enter valid information";
		}
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>
	<style type="text/css">
		#text{
			
			height: 25px;
			border-radius: 5px;
			padding: 4px
			border: solid thin #aaa;
		}
		
		#button{
			padding 10px;
			width: 100px;
			color: white;
			background-color: lightblue;
			border: none;
		}
		
		#box{
			background-color: grey;
			margin: auto;
			width: 300px;
			padding: 20px
		}
		
	</style>
	
	<div id="box">
		<form method="Post">
			<div style="font-size: 20px;margin: 10px;color: white;">Sign Up</div>
			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>
			<input id="button" type="submit" value="Sign Up"><br><br>
			
			<a href="Login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>