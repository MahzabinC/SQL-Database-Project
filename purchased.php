<?php 
session_start();

	include("connection.php");
	include("functions.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{	header("Location: orderpage.php");
		die;
    }

	$user_data = check_login($con);



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Homepage</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="homepage.css">
</head>

<body>
<!--Starting styling------------------------------------->

	<style>
	li{
		float: left;
		margin-right: 10px;	
	}
	ul{
		list-style-type: none;
	}
	.wrapper{
		width: 100%;
		margin: 0 0;
	}
	.logo{
		width: 30%;
		float: left;
		margin-left: 10px;
		margin-top: 10px;
	}
	nav{
		float: right;
		line-height: 20px;
		margin-top: 40px;
		margin-right: 20px;
	}
	.in-box{
	background:#47011a;
	display: inline-block;
	padding: 10px;
	position: relative;
	border: 10px solid #6b4e62;
	align-self: center;
	margin-left: 135px;
	margin-bottom: 0;
	margin-top: 220px;
	border-radius: 10px;
	box-shadow: 0px 10px #1a1c29;
}
.in-box2{
	background:#47011a;
	display: inline-block;
	padding: 10px;
	position: relative;
	border: 10px solid #6b4e62;
	align-self: center;
	margin-left: 570px;
	margin-bottom: 295px;
	border-radius: 10px;
	box-shadow: 0px 10px #1a1c29;

}
.in-box3{
	background: #47011a;
	display: inline-block;
	position: relative;
	padding: 10px;
	border: 10px solid #6b4e62;
	align-self: center;
	margin-left: 1000px;
	margin-bottom: 805px;
	border-radius: 10px;
	box-shadow: 0px 10px #1a1c29;
}
.container{
	display: flex;
	align-items: center;
	width: 150px;
	height: 200px;
	
}
#button{

		padding: 10px;
		width: 150px;
		height: 50px;
		color: white;
		background-color: #ad5c7b;
		border: none;
		float: right;
		font-size: 20px;
		margin-right: 30px;
		margin-top: 400px;
		margin-bottom: 30px;
		border-radius: 20px;
		box-shadow: 0px 10px #1a1c29;
	}
	.food{
		background-color: #47011a;
		width: 100%;
		height: 400px;

	}
	#lala{
		text-align: center;
		background-color: #bfb4bd;
		width: 100%;
		

	}
	#footer{
		background-color: #47011a;
		
		width: 100%;
		height: 60px;
	}
	
	</style>	



	<!-----------------------------Ending Style-------------------------------------->



	<!-----------------------------Navbar Start---------------------------------------->


<header style="height: 100px;position: fixed;width: 100%;z-index: 12;display: flex;justify-content: space-between;">
	<div class="wrapper">
		<div class="logo">
	      <img src="uploads/logo.webp" alt="logo" style="width:160px;height:80px;">
	  </div>
	  <nav>
	   <ul>

		<li ><a href="orderpage.php" >Order Again</a></li>
		<li ><a href="index.php" >Home</a></li>
		<li ><a href="logout.php" >    Logout</a></li>
	   </ul>
     </nav>
 </div>
</header>



<!-----------------------------Navbar End------------------------------->


		
            <div style="height:100%;padding-top: 15%; padding-bottom: 8%; align-content: center;" >
            	<h2 style="text-align: center;font-size: 15px;font-family: sans-serif;color:#ad879b; padding-bottom: 10px;"> Order placed successfully</h2>
                <table id=lala style="font-family:sans-serif; border: 2px;" >
                    <thead style="color: white;">
                        <tr style="height:60px; ">
                            <th style="background-color: #6e3a54;">Date</th>
                            <th style="background-color: #7d4763;">OrderID</th>
                            <th style="background-color: #804965;">Name</th>
                            <th style="background-color: #874e6b;">Bun</th>
                            <th style="background-color: #8c516f;">Patty</th>
                            <th style="background-color: #875870;">Salad</th>
                            <th style="background-color: #875870;">Addon 1</th>
                            <th style="background-color: #875870;">Price (BDT)</th>
                            <th style="background-color: #8c5b74;">Quantity</th>
                            <th style="background-color: #996881;">Delivery Fee (BDT)</th>
                            <th style="background-color: #a6748d;">Total (BDT)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $order_no=$_SESSION['order_no'];
                        $result=mysqli_query($con,"select * from orders where order_no='$order_no'");
                            if (!$result) 
                            {
                            	die;
                            }
                            else
                            {
                            	while ($row= mysqli_fetch_assoc($result))
                            	 {
                                        echo "<tr style='color: #d19fb5; width:80px;'>".
                                                "<td style='width:50px'>".$row["date"]."</td>".
                                                "<td style='width:50px'>".$row["order_no"]."</td>".
                                                "<td style='width:50px'>".$row["ordered_by"]."</td>".
                                                "<td style='width:50px'>".$row["bun"]."</td>".
                                                "<td style='width:50px'>".$row["patty"]."</td>".
                                                "<td style='width:50px'>".$row["salad"]."</td>".
                                                "<td style='width:50px'>".$row["addon_1"]."</td>".
                                                "<td style='width:50px'>".$row["bill"]."</td>".
                                                "<td style='width:50px'>".$row["quantity"]."</td>".
                                                "<td style='width:50px'>".$row["delivery"]."</td>".
                                                "<td style='width:50px'>".$row["total"]."</td>".
                                            "</tr>";
                                   }

                            } 

                        ?>

                    </tbody>
                </table>
            </div>
            <h2 style="text-align: center;font-size: 35px;font-family: sans-serif;color:#ad879b; padding-bottom: 100px;"> THANKS FOR ORDERING!!</h2>
		
		

	


<!-----------------------------------------Footer Start---------------------------------------->

	<div id="footer">
		
	</div>
	<p style="background-color:#47011a;color:#a18c96;text-align: center; padding-bottom: 2%;"> 2021. Mahzabin Chowdhury.</p>

<!-----------------------------------------Footer End----------------------------------------->	
</body>
</html>