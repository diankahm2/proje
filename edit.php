<?php
 echo "string";
?>
<form method="post" action="updtae.php">
  <?php
  $name = $_POST['chk'];
  foreach ($name as $chk){
    $delid=$chk;
    echo $delid;
  }


$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "coment";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM posts WHERE id=$delid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
     }
   }
?>


<input type="hidden" name="id[]" value="<?php echo $row['id'];?>" />
<input type="text" name="fn[]" value="<?php echo $row['text'];?>" />
<button type="submit" name="savemul">Update all</button>&nbsp;
<a href="index.php">cancel</a>
</form>
