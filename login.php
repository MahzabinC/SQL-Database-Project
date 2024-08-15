<?php 

session_start();

	include("connection.php");
	include("functions.php");

	//checking if data was posted by user and if so then checking if all the field are valid and if they match take user back to homepage and admin in admin panal


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_type= $_POST['user_type'];
		$email_id = $_POST['email_id'];
		$password = $_POST['password'];

		if(!empty($email_id) && !empty($password) )
		{

			//read from database
			if($user_type==1)
		  {
		  	$query = "select * from users where email_id = '$email_id' limit 1";
		  	$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['email_id'] = $user_data['email_id'];
						header("Location: index.php");
						die;
					}
				}
			}
		  }
		  else if($user_type==2)
		  {
		  	$query = "select * from admin where email_id = '$email_id' limit 1";
		  	$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['email_id'] = $user_data['email_id'];
						header("Location: admin_interphase.php");
						die;
					}
				}
			}
		  }
			
			
			echo "wrong username or password!";
		}
		else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
		font-family: sans-serif;
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
		margin-top: 150px;
		width: 300px;
		padding: 20px;
		align-items: center;
		
	}
	
	

	</style>

	<div id="box">
		
		<form method="post" >
			<div style="font-size: 20px;margin: 10px;color: white;font-family: sans-serif;text-align: center;">Login</div>

			<label style="font-family: sans-serif;"for="email_id">Email:</label><br>
			<input id="text" type="email" name="email_id"><br><br>

			<label style="font-family: sans-serif;"for="password">Password:</label><br>
			<input id="text" type="password" name="password"><br><br>

			<select name="user_type" id="text" style="align-content: center;font-family: sans-serif;"> Choose User Type
				<option value="1">Customer</option>
				<option value="2">Admin</option>
			</select><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php"style="font-family: sans-serif; color:#780e43">Click to Signup</a><br><br>
			<a href="homepage.php"style="font-family: sans-serif; color:#8a305d">Go back to Homepage</a><br><br>
		</form>
	</div>
	<div id="footer">
		
	</div>
	<p style="color:#a18c96;text-align: center; padding-top: 5%;"> 2021. Mahzabin Chowdhury.</p>
</body>
</html>