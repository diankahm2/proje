<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="stylesign.css">
    <script type="text/javascript" src="val.js">
    </script><script type="text/javascript"></script>



    <title>Registration</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <script>
    function validate() {
        var inputVal=document.getElementById("email");
        var x = document.forms["form"]["email"].value;
        var dog= x.indexOf("@");
        var dot = x.lastIndexOf(".");
        if (dog<1 || dot<dog+2 || dot+2>=x.length) {
            inputVal.style.backgroundColor = '#F16D95';
          //  document.getElementById('email').innerHTML = 'Not valid email';

            return false;

            //alert("Not a valid e-mail:( try again");
        }
    }
  </script>

</head>

<body>
<?php
include('navbar1.php');
?>
<div class="main">


  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1>Sign Up</h1>
          <form role="form" method="POST" action="registration.php" name="form" onsubmit="return validate();">
            <div class="form-group">
              <label class="control-label" for="exampleInputEmail1">Surname</label>
              <input class="form-control" name="surname" id="surname" placeholder="Enter your surname" type="text">
            </div>
            <div class="form-group">
              <label class="control-label" for="exampleInputEmail1">Name</label>
              <input class="form-control" name="name" id="name" placeholder="Enter your name" type="text">
            </div>
            <div class="form-group"><label class="control-label" for="exampleInputPassword1">Email address</label>
              <input class="form-control" name="email" id="email"  placeholder="Enter your email" ></div>

              <div class="form-group">
                <label class="control-label" for="exampleInputEmail1">Password</label>
                <input class="form-control" name="password" id="password" placeholder="Enter your surname" type="password">
              </div>

              <button type="submit" class="btn btn-default">SignUp</button>
            </form>
            </div>
          </div>
        </div>
      </div>

      <p id="or">or</p>
      <form action="index.php">
      <button type="submit" class="btn btn-default" id="login">Login</button>
    </form>



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
             </div


</body>
</html>
