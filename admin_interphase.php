<?php
    session_start();
    include("connection.php");
	include("functions.php");
   
   $admin_updating =  check_login2($con);

    
    

    if($_SERVER['REQUEST_METHOD']=="POST")
   {
   $item = $_POST['i'];
   $price = $_POST['p'];
   $admin_updating=$_SESSION['email_id'];
   $action=$_POST['action_type'];
   $table=$_POST['table'];
   if(!empty($item)&& !empty($price))
   {
    if($action==1)
    {
        if($table==1)
        {
            $query = "insert into bun (item_name,price,admin_id) values ('$item','$price','$admin_updating')";

            mysqli_query($con, $query);
        }
        if($table==2)
        {
            $query = "insert into patty (item_name,price,admin_id) values ('$item','$price','$admin_updating')";

            mysqli_query($con, $query);
        }
        if($table==3)
        {
            $query = "insert into salad (item_name,price,admin_id) values ('$item','$price','$admin_updating')";

            mysqli_query($con, $query);
        }
        if($table==4)
        {
            $query = "insert into addon_1 (item_name,price,admin_id) values ('$item','$price','$admin_updating')";

            mysqli_query($con, $query);
        }
        

    }
    else if($action==2)
    {
        if($table==1)
        {
            $queryy = " update bun set price = '$price', admin_id='$admin_updating' where item_name='$item'";
            mysqli_query($con,$queryy);
        }
        if($table==2)
        {
            $queryy = " update patty set price = '$price', admin_id='$admin_updating' where item_name='$item'";
            mysqli_query($con,$queryy);
        }
        if($table==3)
        {
            $queryy = " update salad set price = '$price', admin_id='$admin_updating' where item_name='$item'";
            mysqli_query($con,$queryy);
        }
        if($table==4)
        {
            $queryy = " update addon_1 set price = '$price', admin_id='$admin_updating' where item_name='$item'";
            mysqli_query($con,$queryy);
        }
        
    }
    if($action==3)
    {
        if($table==1)
        {
            $queryy ="delete from bun where item_name='$item'";
            mysqli_query($con,$queryy);
        }
        if($table==2)
        {
            $queryy ="delete from patty where item_name='$item'";
            mysqli_query($con,$queryy);
        }
        if($table==3)
        {
            $queryy ="delete from salad where item_name='$item'";
            mysqli_query($con,$queryy);
        }
        if($table==4)
        {
            $queryy ="delete from addon_1 where item_name='$item'";
            mysqli_query($con,$queryy);
        }
        
        
    }
   
   }
   else if(!empty($item))
  {
    if($action==3)
    {
        if($table==1)
        {
            $queryy ="delete from bun where item_name='$item'";
            mysqli_query($con,$queryy);
        }
        if($table==2)
        {
            $queryy ="delete from patty where item_name='$item'";
            mysqli_query($con,$queryy);
        }
        if($table==3)
        {
            $queryy ="delete from salad where item_name='$item'";
            mysqli_query($con,$queryy);
        }
        if($table==4)
        {
            $queryy ="delete from addon_1 where item_name='$item'";
            mysqli_query($con,$queryy);
        }
        
        
    }
      
  }
  else{
    echo "Can Not Update, Sorry'$admin_updating'!!";

  }
  }
  
    

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin panal</title>
</head>
<body>
<!--Starting styling------------------------------------->

    <style>
    *{

    margin: 0;
    padding: 0;
    background-color: #202333;
    
    }

    li, a, button{
    font-family: sans-serif;
    font-size: 20px;
    color: white;
    text-decoration: none;
    }


    nav li{
    display: inline-block;
    padding: 0px 10px;
    }
     nav li a{
    transition: all 0.3s linear;
    
   }
    nav li a:hover{
    color: lightpink;
    font-size: 23px;
}
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
   
}

.container{
    display: flex;
    align-items: center;
    width: 150px;
    height: 200px;
    
}
#button{

        padding: 10px;
        width: 100px;
        height: 30px;
        color: white;
        background-color: #ad5c7b;
        border: none;
        float: right;
        font-size: 15px;
        text-align: center;
        margin-right: 267px;
        border-radius: 15px;
        
    }
    .food_list{
        background-color: #47011a;
        width: 100%;
        height: 400px;

    }
  
    #footer{
        background-color: #47011a;
        
        width: 100%;
        height: 100px;
    }
    #lala{
        text-align: center;
        background-color: #bfb4bd;
        width: 100%;
    }
    #box{
        width:15%;
        height: 30px;
        align-items: center;
        margin-left: 250px;
        background-color: #ac9bb3;
        color: black;
        border-radius: 10px;
    }
     #box2{
        width:15%;
        height: 30px;
        align-items: center;
        margin-left: 10px;
        background-color: #ac9bb3;
        border-radius: 10px;


    }

    
    </style>    

<!-----------------------------Navbar Start---------------------------------------->


<header style="height: 100px;position: fixed;width: 100%;z-index: 12;display: flex;justify-content: space-between;">
    <div class="wrapper">
        <div class="logo">
          <img src="uploads/logo.webp" alt="logo" style="width:160px;height:80px;">
      </div>
      <nav>
       <ul>
        
        <li ><a href="#food_list" >List</a></li>
        <li ><a href="#update" >Update</a></li>
        <li ><a href="logout.php" >    Logout</a></li>

       </ul>
     </nav>
 </div>
</header>



<!-----------------------------Navbar End------------------------------->

<!-----------------------------------------Food List Start-------------------------------------------->
<br><br><br><br><br><br><br><br><h2 style="text-align: center;font-size: 35px;font-family: sans-serif;color: white;"> LIST OF FOOD ITEMS</h2><br><br><br>
<div id ="food_list">

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
</div><br><br><br><br>

<!-----------------------------------------Food List end-------------------------------------------->
<br><br><h2 style="text-align: center;font-size: 35px;font-family: sans-serif;color: white;"> UPDATE/INSERT/DELETE FOOD ITEMS</h2><br><br><br>
<div id="update">
 
            <form method="POST" >
                <input id="box" type="text" name="i" placeholder="Food Name">
                <input id="box2"type="number" name="p" placeholder="Food Price">
                <select name="action_type" id="box2"> Choose Action Type
                <option value="1" style="background-color:#ac9bb3">Add</option>
                <option value="2"style="background-color:#ac9bb3">Uppdate</option>
                <option value="3"style="background-color:#ac9bb3">Delete</option>
            </select>
             <select name="table" id="box2"> Choose Table Name
                <option value="1" style="background-color:#ac9bb3">Bun</option>
                <option value="2"style="background-color:#ac9bb3">Patty</option>
                <option value="3"style="background-color:#ac9bb3">Salad</option>
                <option value="4"style="background-color:#ac9bb3">Add on</option>
                
            </select><br><br><br>
            <input id="button" type="submit" value="Go"><br><br><br><br><br><br>
            
            </form>

</div>


				

<!-----------------------------------------Footer Start---------------------------------------->

    <div id="footer">
        
    </div>
    <p style="background-color:#47011a;color:#a18c96;text-align: center; padding-bottom: 5px;"> 2021. Mahzabin Chowdhury.</p>

<!-----------------------------------------Footer End-----------------------------------------> 		
</body>
</html>