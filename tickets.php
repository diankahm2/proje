<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styletickets.css">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <title>Tickets</title>
    <body>
  <script>
  $(document).ready(function(){
  var header = $('body');

  var backgrounds = new Array(
      'url(fly1.jpg)'
    , 'url(fly2.jpg)'
  );
  var current = 0;
  function nextBackground() {
      current++;
      current = current % backgrounds.length;
      header.css('background-image', backgrounds[current]);
  }
  setInterval(nextBackground, 4000);

  header.css('background-image', backgrounds[0]);
  });
</script>
<?php
include('navbar1.php'); ?>

<div class="color"></div>





<div class="main">
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-2">
</div>
      <div class="col-md-4">
        <form role="form">
          <div class="form-group">
            <label class="control-label" for="exampleInputEmail1">From</label>
            <input class="form-control" id="exampleInputEmail1" placeholder="Please select ..." type="text">
          </div>
          <div class="form-group">
            <label class="control-label" for="exampleInputPassword1">Departure</label>
            <input class="form-control" id="exampleInputPassword1" placeholder="enter date" type="data">
          </div>
          <div class="age">
            <div class="form-group">
              <label class="control-label" for="exampleInputPassword1">Adult</label>
              <input class="form-control" id="adult" value="1" type="number">
              <label class="control-label" for="exampleInputPassword1">Child</label>
              <input class="form-control" id="child" value="0" type="number">
              <label class="control-label" for="exampleInputPassword1">Infant</label>
              <input class="form-control" id="infant" value="0" type="number">
            </div>


          </div>
        </form>
      </div>
      <div class="col-md-4">
        <form role="form">
          <div class="form-group">
            <label class="control-label" for="exampleInputEmail1">To</label>
            <input class="form-control" id="exampleInputEmail1" placeholder="Please select ..." type="text">
          </div>
            <div class="form-group">
              <label class="control-label" for="exampleInputPassword1">Return</label>
              <input class="form-control" id="exampleInputPassword1" placeholder="enter date" type="dat">
            </div>
            <div class="form-group">
              <label class="control-label" for="exampleInputPassword1">Class</label>
              <input class="form-control" id="exampleInputPassword1" value="Economy" type="text">
            </div>
            <button type="submit" class="btn btn-default">Find Flight</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
