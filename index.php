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
		height: 100px;
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

		<li ><a href="#food" >Menu</a></li>
		<li ><a href="#order" >Order</a></li>
		<li ><a href="logout.php" >    Logout</a></li>
	   </ul>
     </nav>
 </div>
</header>



<!-----------------------------Navbar End------------------------------->


		
			<div class="wrapper">
			  <img src="uploads/homepageCover.jpg" alt="cover" style="width:100%;height:700px;margin-right: 0;margin-left: 0;">
			</div><br><br>
			
		

	
<!-----------------------------------------Menu Start-------------------------------------------->
<br><h2 style="text-align: center;font-size: 35px;font-family: sans-serif;color: #f5edf1;"> MENU</h2><br><br><br>
<div id ="food">

<?php
$query="SELECT item_name,price FROM bun";
	$result=mysqli_query($con,$query);
	if(!$result)
	{
		die;
	}
	else
	{
		echo "<table id='lala'>";
		echo "<tr style='height:30px;'>";
		echo "<td style='color:white;font-family: sans-serif;background-color: #ad5c7b;width:50%;'> AVAILABLE BUNS</td>";
		echo "<td style='color:white;font-family: sans-serif;background-color: #ad5c7b;width:50%;'> PRICE (TK)</td>";
		echo "</tr>";
		while($row= mysqli_fetch_assoc($result))
        {
        	
        	echo "<tr style='height:30px;'>";

        	echo "<td style='color:white;font-family: sans-serif;background-color: #595b75;width:50%;'>".$row['item_name']."</td>";
        	echo "<td style='color:white;font-family: sans-serif;background-color: #595b75;width:50%;'>".$row['price']."</td>";
        	echo "</tr>";
        }
        echo "</table>";

     }
    $query="SELECT item_name,price FROM patty";
    $result=mysqli_query($con,$query);
    if(!$result)
    {
        die;
    }
    else
    {
        echo "<table id='lala'>";
        echo "<tr style='height:30px;'>";
        echo "<td style='color:white;font-family: sans-serif;background-color: #ad5c7b;width:50%;'> AVAILABLE PATTIES</td>";
        echo "<td style='color:white;font-family: sans-serif;background-color: #ad5c7b;width:50%;'> PRICE (TK)</td>";
        echo "</tr>";
        while($row= mysqli_fetch_assoc($result))
        {
            
            echo "<tr style='height:30px;'>";

            echo "<td style='color:white;font-family: sans-serif;background-color: #595b75;width:50%;'>".$row['item_name']."</td>";
            echo "<td style='color:white;font-family: sans-serif;background-color: #595b75;width:50%;'>".$row['price']."</td>";
            echo "</tr>";
        }
        echo "</table>";
	}
	$query="SELECT item_name,price FROM salad";
    $result=mysqli_query($con,$query);
    if(!$result)
    {
        die;
    }
    else
    {
        echo "<table id='lala'>";
        echo "<tr style='height:30px;'>";
        echo "<td style='color:white;font-family: sans-serif;background-color: #ad5c7b;width:50%;'> AVAILABLE SALAD</td>";
        echo "<td style='color:white;font-family: sans-serif;background-color: #ad5c7b;width:50%;'> PRICE (TK)</td>";
        echo "</tr>";
        while($row= mysqli_fetch_assoc($result))
        {
            
            echo "<tr style='height:30px;'>";

            echo "<td style='color:white;font-family: sans-serif;background-color: #595b75;width:50%;'>".$row['item_name']."</td>";
            echo "<td style='color:white;font-family: sans-serif;background-color: #595b75;width:50%;'>".$row['price']."</td>";
            echo "</tr>";
        }
        echo "</table>";

    }
    $query="SELECT item_name,price FROM addon_1";
    $result=mysqli_query($con,$query);
    if(!$result)
    {
        die;
    }
    else
    {
        echo "<table id='lala'>";
        echo "<tr style='height:30px;'>";
        echo "<td style='color:white;font-family: sans-serif;background-color: #ad5c7b;width:50%;'> AVAILABLE ADD ONS</td>";
        echo "<td style='color:white;font-family: sans-serif;background-color: #ad5c7b;width:50%;'> PRICE (TK)</td>";
        echo "</tr>";
        while($row= mysqli_fetch_assoc($result))
        {
            
            echo "<tr style='height:30px;'>";

            echo "<td style='color:white;font-family: sans-serif;background-color: #595b75;width:50%;'>".$row['item_name']."</td>";
            echo "<td style='color:white;font-family: sans-serif;background-color: #595b75;width:50%;'>".$row['price']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    
	?>
</div>

<!-----------------------------------------Menu end-------------------------------------------->

<!----------------------------pics start------------------------------>	

<br><br>
<br><br><h2 style="text-align: center;font-size: 35px;font-family: sans-serif;color: #f5edf1;"> CUSTOMISE YOUR OWN BURGER NOW!!</h2><br><br>
    <div >
		<div class="container" >
			<div class="in-box">
				<img src="uploads/menu-burger.jpg" style="width:200px;height:200px"><br>
				<p style="font-family: sans-serif;color: #b56b87;font-size: small;text-align: center;">Choose your desired spice and sauce level</p>
			</div>
			
		</div><br><br><br>
		<div class="container">
			<div class="in-box2">
				<img src="uploads/Capture.PNG" style="width:200px;height:200px">
				<p style="font-family: sans-serif;color: #b56b87;font-size: small;text-align: center;">Customise your burger with as many layers of patty and cheese as you want</p>
			</div>


			<form method="POST" id="order">
			<input id="button" type="submit" value="Order Now"><br><br><br><br><br><br><br>
		    </form>
			

		</div><br><br><br>

			
		<div class="container">
			<div class="in-box3">
				<img src="uploads/Capture3.PNG" style="width:200px;height:200px"><br>
				<p style="font-family: sans-serif;color: #b56b87;font-size: small;text-align: center;">Want to stay healthy? We also have options for that.</p>
				
			</div>
		</div>
	</div>
	
	
<!----------------------------pics end------------------------------>

<!-----------------------------------------Footer Start---------------------------------------->

	<div id="footer">
		
	</div>
	<p style="background-color:#47011a;color:#a18c96;text-align: center; padding-bottom: 5px;"> 2021. Mahzabin Chowdhury.</p>

<!-----------------------------------------Footer End----------------------------------------->	
</body>
</html>