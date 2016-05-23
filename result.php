
<link rel="stylesheet" type="text/css" href="stylerecall.css">
<script src="jquery.js" type="text/javascript"></script>
<script src="js-script.js" type="text/javascript"></script>

<form method="post" name="frm">

<?php
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


$sql = "SELECT * FROM posts ORDER BY id DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
     echo "<br>";
     echo "<div class='post'>";
     echo  "<h4>".$row['date']."</h4>";
     echo "<br>";
       echo "<p>".$row["text"]."</p>";
       echo "</div>";
       $value=$row['id'];
       //echo $value;
       echo '<input type="checkbox" id="ch" name="chk[]" class="chk-box"  value="' . htmlspecialchars($value) . '">';
       //echo '<input type="text" name="idtest" value="' . htmlspecialchars($value) . '">';

       echo "<span><img src='delete.png' onClick='delete_records();' ' alt='delete' /></span>";
       #echo "<span><img src='edit.png' onClick='edit_records();'' alt='edit' />edit</span>";

       echo "<br>";

   }
} else {
   echo " <p style='margin-left:15px;'>You don't have any post , ~ post something</p>";
}
$conn->close();
?>
</form>
