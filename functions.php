<?php

function check_login($con)
{

	
	if(isset($_SESSION['email_id']))
	{

		//$id = $_SESSION['user_id'];
		$id = $_SESSION['email_id'];
		
		$query = "select * from users where email_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
		else
		{
		 $query2="select * from admin where email_id = '$id' limit 1";
		 $re= mysqli_query($con,$query2);
		 if($re && mysqli_num_rows($re)>0)
		 {
			echo "You are not allowed to View That Page";
			header("Location: admin_interphase.php");
			die;
		 }
	    }
	}
	else
	{
	//redirect to homepage
	echo "Please Login First";
	header("Location: login.php");
	die;

	}

}
function check_login2($con)
{

	
	if(isset($_SESSION['email_id']))
	{

		//$id = $_SESSION['user_id'];
		$id = $_SESSION['email_id'];
		
		$query = "select * from admin where email_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
		else
		{
		$query2="select * from users where email_id = '$id' limit 1";
		$re= mysqli_query($con,$query2);
		if($re && mysqli_num_rows($re)>0)
		{
			echo "You are not allowed to View That Page";
			header("Location: index.php");
			die;
		}
	    }
	}

	//redirect to homepage
	echo "Please Login First";
	header("Location: homepage.php");
	die;

}
?>


