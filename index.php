
<?php session_start();
	if(isset($_SESSION['status'])){
		header("Location:cabinet.php");
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="stylelogin.css">
    <?php
    include ('navbar1.php');
    ?>
    <link href="ImageMapster-master/examples/style.css" rel="stylesheet">

    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">

</head>
<body>

<div class="main">
      <div class="section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h1>LogIn</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7">
              <form role="form" method="POST" action="login1.php">
                <div class="form-group">
                  <label class="control-label" for="exampleInputEmail1">Email address</label>
                  <input class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                  <label class="control-label" for="exampleInputPassword1">Password</label>
                  <input class="form-control" id="exampleInputPassword1" placeholder="Password" type="password" name="password">
                </div><button type="submit" class="btn btn-default">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


            <div class="footer">
              <footer class="section">
                 <div class="container">
                <div class="row"> <div class="col-sm-6"> <h1>Explore with us</h1>
                  <p>About us <br>Contacts
                     <br>Copyright (c) 2016 Copyright Holder All Rights Reserved.</p>
                   </div>
                   <div class="col-sm-6">
                      <p class="text-info text-right">
                         <br>
                         <br>
                       </p>
                       <div class="row">
                         <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left">
                           <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                            <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                             <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                              <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
                            </div></div><div class="row"> <div class="col-md-12 hidden-xs text-right">
                               <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                                 <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                     </footer>
                   </div>


</body>
</html>
