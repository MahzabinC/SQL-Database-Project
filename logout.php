<?php

session_start();

if(isset($_SESSION['email_id']))
{
	unset($_SESSION['email_id']);

}

header("Location: homepage.php");
die;