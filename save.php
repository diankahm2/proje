<?php
include "connect.php";
if (isset($_POST['enter'])){
	$date=date('l \t\h\e jS \o\f F \: g:i a');
	$text=$_POST['text'];
	if (strlen($text)<=456){
	$query = mysql_query("INSERT INTO posts VALUES ('','$date','".addslashes($text)."')")or die (mysql_error());
	header("location:aktaurecall.php");
}else{
	echo "<p style='font-family:arial;color:red;'>";

}

}

?>
