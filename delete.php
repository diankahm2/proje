
<?php
$name = $_POST['chk'];

// optional
// echo "You chose the following color(s): <br>";

foreach ($name as $chk){
  $delid=$chk;
  echo $delid;
}

$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "coment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$sql = "DELETE FROM posts WHERE id='$delid'";
$result = $conn->query($sql);
header('Location:aktaurecall.php');
?>
