<?php
session_start();
    include("connection.php");
	include("functions.php");
    $user_data = check_login($con);

    if (isset($_POST['cart'])) {
        // Variable Declaration
		$ordered_by = $_SESSION['email_id'];
		$bun  = $con->real_escape_string($_POST['bunN']);
		$order_no = rand(0,999999);
		$patty = $con->real_escape_string($_POST['pattyN']);
		$salad = array_map("strip_tags", $_POST['saladN']);
	    $addon1 = array_map("strip_tags", $_POST['addon_1N']);
        $qty  = $_POST['quantity'];
        $price = 0;

        //including price of bun and patty
        $queryy= "select price from bun where item_name='$bun'";
        $bq = mysqli_fetch_assoc(mysqli_query($con,$queryy));
        $bp= $bq['price'];
        $price += $bp;
        $queryy= "select price from patty where item_name='$patty'";
        $pq = mysqli_fetch_assoc(mysqli_query($con,$queryy));
        $pp= $pq['price'];
        $price += $pp;
        foreach($salad as $s)
        {
        	$queryy= "select price from salad where item_name='$s'";
            $sq = mysqli_fetch_assoc(mysqli_query($con,$queryy));
            $sp= $sq['price'];
            $price += $sp;
        }
        unset($s);

         foreach($addon1 as $s)
        {
        	$queryy= "select price from addon_1 where item_name='$s'";
            $aq = mysqli_fetch_assoc(mysqli_query($con,$queryy));
            $ap= $aq['price'];
            $price += $ap;
        }
         unset($s);
        
         $addon1 = implode(", ",$addon1);
         $salad = implode(", ",$salad);
         $total=($price*$qty)+80;
         $_SESSION["order_no"]=$order_no;

         $query = "insert into orders (order_no,ordered_by,bun,patty,addon_1,salad,quantity,bill,delivery,total) values ('$order_no','$ordered_by','$bun','$patty','$addon1','$salad','$qty','$price','80','$total')";

        $result=mysqli_query($con,$query);
        if(!$result)
        {
        	echo("Sorry for the trouble but the order couldn't be placed");
        	die;

        }
        else
        {
        	header("Location: purchased.php");
       	    die;

        }
       	

       

             
    }

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
	
.container{
	display: flex;
	align-items: center;
	width: 150px;
	height: 200px;
	
}
.container-checherbox{
	font-family: sans-serif;
	font-size: 12;
	margin-left: 20%;
	display: 100%;
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
		margin-right: 10%;
		margin-bottom: 10%;
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
	#box2{
        width:15%;
        height: 30px;
        align-items: center;
        margin-left: 10%;
        background-color: #ac9bb3;
        border-radius: 10px;


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

		<li ><a href="index.php" >Home</a></li>
		<li ><a href="logout.php" >    Logout</a></li>
	   </ul>
     </nav>
 </div>
</header>
<!-----------------------------Navbar End------------------------------->
<!-----------------------------------------Menu Start-------------------------------------------->
<br><h2 style="text-align: center;font-size: 35px;font-family: sans-serif;color: #f5edf1;"> MENU</h2><br><br><br>
<div id ="food">
	<form action="" method="post">

<?php
$query="SELECT item_name,price FROM bun";
$result=mysqli_query($con,$query);
	if(!$result)
	{
		die;
	}
	else
	{
		?>
        	<div style="font-family: sans-serif;font-size: 12;margin-left: 10%;margin-top: 3%; margin-right:10%  ;display: 100%;color:#d19fb5;">
        		 <span style=" color: white;font-size: 20px;">* BUN:</span>
        		 <br><br>
        		 <?php
		foreach ($result as $bunN) 
        {
        	
        	?>
        	<input type="radio" name="bunN" value="<?= $bunN['item_name']; ?>" checked="checked" />   <?= $bunN['item_name']; ?> ( BDT <?=$bunN['price']; ?> ) 
        	<?php
        }
        ?>
        </div>
        <?php

     }
     ?>
     <br>
     <?php
$query="SELECT item_name,price FROM patty";
$result=mysqli_query($con,$query);
	if(!$result)
	{
		die;
	}
	else
	{
		?>
        	<div style="font-family: sans-serif;font-size: 12;margin-left: 10%;margin-top: 3%;margin-right:10% ;display: 100%;color:#d19fb5;">
        		 <span style=" color: white; font-size: 20px;">* PATTY:</span>
        		 <br><br>
        		 <?php
		
		foreach ($result as $pattyN) 
        {
        	
        	?>
        	<input type="radio" name="pattyN" value="<?= $pattyN['item_name']; ?>" checked="checked"/>   <?= $pattyN['item_name']; ?> ( BDT <?=$pattyN['price']; ?> )
        	<?php
        }
         ?>
        </div>
        <?php
    
     }
     ?>
     <br>
     <?php
$query="SELECT item_name,price FROM salad";
$result=mysqli_query($con,$query);
	if(!$result)
	{
		die;
	}
	else
	{
		?>
        	<div style="font-family: sans-serif;font-size: 12;margin-left: 10%;margin-top: 3%;margin-right:10% ;display: 100%;color:#d19fb5;">
        		 <span style=" color: white;font-size: 20px;">* SALAD:</span>
        		 <br><br>
        		 <?php
		
		foreach ($result as $saladN) 
        {
        	
        	?>
        	<input type="checkbox" name="saladN[]" value="<?= $saladN['item_name']; ?>"/>   <?= $saladN['item_name']; ?>( BDT <?=$saladN['price']; ?> )
        	<?php
        }
         ?>
        </div>
        <?php
    
     }
     ?>
     <br>
     <?php
$query="SELECT item_name,price FROM addon_1";
$result=mysqli_query($con,$query);
	if(!$result)
	{
		die;
	}
	else
	{
		?>
        	<div style="font-family: sans-serif;font-size: 12;margin-left: 10%;margin-top: 3%;margin-right:10% ;display: 100%;color:#d19fb5;">
        		 <span style=" color: white;font-size: 20px;">* ADD ONS:</span>
        		 <br><br>
        		 <?php
		
		foreach ($result as $addon_1N) 
        {
        	
        	?>
        	<input type="checkbox" name="addon_1N[]" value="<?= $addon_1N['item_name']; ?>"/>   <?= $addon_1N['item_name']; ?>( BDT <?=$addon_1N['price']; ?> )
        	<?php
        }
         ?>
        </div>
        <?php
    
     }
     ?>
     <br>
     <br>

	<span style="color: white;margin-bottom: 6%; font-family: sans-serif;font-size: 20px;margin-left: 10%;margin-top: 3%;margin-right:10% ;display: 100%;"> * QUANTITY: </span><br><br>
	<input id="box2"type="number" min="1" step="1" name="quantity" placeholder="1">
     <input id="button" type="submit" name="cart" value="Order"><br><br><br><br><br><br><br>
     
</div>
</form>

<!-----------------------------------------Menu end-------------------------------------------->
<!-----------------------------------------Footer Start---------------------------------------->

	<div id="footer">
		
	</div>
	<p style="background-color:#47011a;color:#a18c96;text-align: center; padding-bottom: 5px;"> 2021. Mahzabin Chowdhury.</p>

<!-----------------------------------------Footer End----------------------------------------->	
</body>
</html>