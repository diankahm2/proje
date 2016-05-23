
<?php
	include "connection.php";
	print_r($_POST);
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$query = "SELECT * FROM users WHERE email='".$email."' AND password=md5('".$pass."')";
	if($res=$con->query($query)){
		if(mysqli_num_rows($res)>0){
			$data = $res->fetch_array();
			session_start();
			$_SESSION['id'] = $data['id'];
			$_SESSION['name'] = $data['name'];
			$_SESSION['surname'] = $data['surname'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['status'] = $data['status'];
			header("Location:cabinet.php");
		}
	}else{
		echo $con->error;
	}
?>
