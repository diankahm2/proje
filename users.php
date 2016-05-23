<?php
	session_start();
	if(!isset($_SESSION['status']) || $_SESSION['status']!=0){
		header("Location:index.php");
	}
	include "connection.php";
	$query = "SELECT * FROM users";
	$res = $con->query($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
	  <table class="table table-striped">
	    <thead>
	      <tr>
	        <th>Id</th>
	        <th>Name</th>
	        <th>Surname</th>
	        <th>City</th>
	        <th>Email</th>
	        <th>Status</th>
	        <th>Change Status</th>
	      </tr>
	    </thead>
	    <tbody>
	      <?php
	      	while($row = $res->fetch_array()){
	      ?><tr>
	        <td><?php echo $row['id']?></td>
	        <td><?php echo $row['name'] ?></td>
	        <td><?php echo $row['surname'] ?></td>
	        <td><?php echo $row['city'] ?></td>
	        <td><?php echo $row['email'] ?></td>
	        <td id = "status<?php echo $row['id'];?>"><?php if($row["status"]==0){echo "Admin";}else{ echo "User"; } ?></td>
	        <td><button class="btn btn-success" onClick="changeStatus(<?php echo $row['id']?>,<?php echo $row['status']?>)">Change</button></td>
	      </tr>
	      <?php } ?>
	    </tbody>
	  </table>
	</div>
</body>
</html>
<script type="text/javascript">
	function changeStatus(id,status){
		$.ajax({
     		url: "changeUserStatus.php",
     		type: "POST",
     		data: "id="+id+"&status="+status,
     		success: function(data){
     			if(status==0){
     				$("#status"+id).html("User");
     			}else{
     				$("#status"+id).html("Admin");
     			}
     		}
     	});
	}
</script>
