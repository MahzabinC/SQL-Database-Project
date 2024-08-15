<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$password = $_POST['password'];
		$email_id = $_POST['email_id'];
		$address = $_POST['address'];
		$date_of_birth = $_POST['date_of_birth'];

		if(!empty($name) && !empty($date_of_birth) && !empty($address) && !empty($password) && !empty($email_id)  && !is_numeric($name))
		{
			$queryy= "select * from users where email_id='$email_id'";
            $results = mysqli_query($con,$queryy);
           if($results && mysqli_num_rows($results)>0)
            {
			
			header("Location: error.php");
			die;
			
           
           }

			//save to database
			$query = "insert into users (name,password,email_id,date_of_birth,address) values ('$name','$password','$email_id','$date_of_birth','$address')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightpink;
		border: none;
		border-radius: 20px;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}


	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;text-align: center ;font-family: sans-serif;">Signup</div>
            <label style="font-family: sans-serif;"for="name">Name:</label><br>
			<input id="text" type="text" name="name"><br><br>

			<label style="font-family: sans-serif;"for="email_id">Email:</label><br>
			<input id="text" type="email" name="email_id"><br><br>

			<label style="font-family: sans-serif;"for="password">Password:</label><br>
			<input id="text" type="password" name="password"><br><br>

			 <label style="font-family: sans-serif;"for="dat_of_birth">Date Of Birth:</label><br>
			<input id="text" type="date" name="date_of_birth"><br><br>

			<label style="font-family: sans-serif;"for="address">Address:</label><br>
			<input id="text" type="text" name="address"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php"style="font-family: sans-serif; color:#780e43">Click to Login</a><br><br>
			<a href="homepage.php"style="font-family: sans-serif;color:#8a305d">Go back to Homepage</a><br><br>
		</form>
	</div>
	
	<p style="color:#a18c96;text-align: center; padding-top: 2%;"> 2021. Mahzabin Chowdhury.</p>
</body>
</html>