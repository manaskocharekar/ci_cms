<?php
	require("config.php");


	$con = mysqli_connect("localhost","root","root","ecommerce");


if(!$con)
	{
	die("Database Connection failed".mysqli_error());
	}
else{
	//echo("Database Connection Succesful");
}

?>
