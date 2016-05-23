<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="styleviewers.css">



    <title>Viewers</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>
<body>



  <?php
  include ('navbar1.php');
  ?>

<div class="main">

  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <ul class="list-group">
            <a href="cabinet.php"><li class="list-group-item">Posts</li></a>
            <a href="viewers.php"><li class="list-group-item">Viewers</li></a>
            <a href="sales.html"><li class="list-group-item">Sales</li></a>
            <a href="profile.html"><li class="list-group-item">Profile</li></a>
          </ul>
        </div>
    </div>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <link   href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
    				<table class="table table-striped table-bordered">
    		              <thead>
    		                <tr>


    		                  <th>ID</th>
                          <th>Surname</th>
    		                  <th>Name</th>
    		                  <th>Email</th>
    		                  <th>Action</th>
    		                </tr>
    		              </thead>
    		              <tbody>
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



                if(isset($_POST['delete'])){
                  $Delete = "DELETE FROM users WHERE id='$_POST[hidden]'";
                  $conn->query($Delete);
              		header("Location:viewers.php");
        	};


                if(isset($_POST['update'])){
                  $Update = "UPDATE users SET surname='$_POST[surname]',name='$_POST[name]', email='$_POST[email]' WHERE id='$_POST[hidden]'";
                  $conn->query($Update);
      		        header("Location:viewers.php");
      	};




                 $sql = "SELECT * FROM users";
                 $result = $conn->query($sql);
                 if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                      echo "<form action=viewers.php method=post>";
                      echo "<tr>";
                      echo  "<td>".$row['id']."</td>";

                      echo "<br>";
                      echo  "<td>".$row['surname']."</td>";
                      echo "<br>";
                      echo "<td>".$row["name"]."</td>";
                      echo "<td>".$row["email"]."</td>";
                    	echo "<td>" . "<input type=hidden name=hidden value=" . $row['id'] . " </td>";
                      echo "<td>" . "<input type=text name=name placeholder='new name' </td>";
				              echo "<td>" . "<input type=text name=surname placeholder='new surname'</td>";
			                echo "<td>" . "<input type=text name=email placeholder='new email' </td>";
                      echo "<td>" . "<input type=submit name=update value=Update id=button" . " </td>";
                      echo "<td>" . "<input type=submit name=delete value=Delete id=button" . " </td>";


                      echo "<tr>";




                    }
                 }
                 $conn->close();
                 ?>


    				      </tbody>
    	            </table>
        </div>
      </div>
        </div> <!-- /container -->
      </body>
    </html>
