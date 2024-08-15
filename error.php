<?php 
session_start();

	include("connection.php");
	include("functions.php");
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
<body style="background-color#202333;text-align:center;">
    <h2 style="text-align:center;margin-top: 200px;font-family:sans-serif;font-size: 40px;color: #f2a5cd;">THIS EMAIL ALREADY EXISTS!!</h2><br>
    <a href="signup.php" style="text-align:center; text-decoration: underline;">Click here to try with another email id</a>

</body>
</html>