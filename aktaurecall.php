<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="stylerecall.css">
    <title>Aktau</title>
  <//script src="js/bootstrap.min.js"><///script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
<?php
include('navbar1.php') ?>
</head>

<body>


<div class="zak">
          <a href="aktau2.php" type="button"  class="btn btn-default" data-toggle="tooltip" data-placement="top" >History</a>
          <a href="aktausigns.php" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top">Sight  s</a>
          <a href="aktaurecall.php"type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top">Recall</a>
</div>

  <center>
    <div class="black">
    <br>
      <form class="form" method="post" action="save.php" onsubmit="return submit_handler(this)">
        <textarea cols="20" rows="4" type="text" name="text" placeholder="Share with your thoughts" ></textarea>
        <input type="submit" name="enter" value="post">


      </form>
    </div>
    </center>
  </div>

  <?php
  include "result.php";
  ?>









</div>
<br>




  <div class="section1">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="btn-toolbar" role="toolbar">
            <div class="btn-group">
              <a type="button" class="btn btn-default">1</a>
              <a type="button" class="btn btn-default">2</a>
              <a type="button" class="btn btn-default">3</a>
              <a type="button" class="btn btn-default">4</a>
            </div>
            </div>
            <div class="btn-group">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>






</body>
</html>
