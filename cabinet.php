<?php session_start();
	if(!isset($_SESSION['status'])){
		header("Location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cabinet</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
<?php
	include "navbar1.php";
 ?>
		<div class="col-md-6">
			<p>Name : <?php echo $_SESSION['name'];?></p>
			<p>Surname : <?php echo $_SESSION['surname'];?></p>
			<p>Email : <?php echo $_SESSION['email'];?></p>
			<p>Status : <?php echo $_SESSION['status'];?></p>
		  <a href="logout.php"><p>logout</p></a>


		</div>
		<?php if($_SESSION['status']==0){
			include "addNewsForm.php";
		}else{
			include "ls.php";
		} ?>
	</div>
</body>
</html>
