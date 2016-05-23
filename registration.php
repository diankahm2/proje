<?php
	include "connection.php";
	$surname = $_POST['surname'];
	$name = $_POST['name'];
	$pass = $_POST['password'];
	$email = $_POST['email'];
	$query = "INSERT INTO users VALUES(null,'".$surname."','".$name."','".$email."',md5('".$pass."'),'1')";
	if(!$con->query($query)){
		echo $con->error;
	}
	header("Location:index.php");
?>
