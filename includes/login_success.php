<?php 
	session_start();
	if(isset($_SESSION["username"]))
	{
		echo '<h3>log in sucsess,welcome'.$_SESSION["username"].'</h3>';
		echo '<br/><br/><a href="logout.php">logout</a>';
		
	}
	else
	{
		header("location:pdo_login.php");
	}

	
?>