<?php
//	if (move_uploaded_file($_FILES['img']['tmp_name'], "img/".
	//	$_FILES['img']['name'])) {
	  //  print "File is valid, and was successfully uploaded.";
	//} else {
	  //  print "There some errors!";
	//}

	$title = $_POST['title'];
	$text = htmlspecialchars($_POST['text'], ENT_QUOTES);
	//$image = "img/".$_FILES['img']['name'];
	include "connection.php";
	$query = "INSERT INTO news VALUES(null,'".$title."','".$text."','".$image."')";
	if(!$con->query($query)){
		echo $con->error;
	}else{
		header("Location:cabinet.php");
	}

?>
