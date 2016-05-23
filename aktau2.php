<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style(1).css">
    <title>Aktau</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">

</head>
<body>
  <?php
  include ('navbar1.php');
  ?>
  <link href="ImageMapster-master/examples/style.css" rel="stylesheet">



<div class="black"></div>

<div class="zak">
          <a href="aktau2.php" type="button"  class="btn btn-default" data-toggle="tooltip" data-placement="top" >History</a>
          <a href="aktausigns.php" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top">Sights</a>
          <a href="aktaurecall.php"type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top">Recall</a>

</div>
<div class="main">
<div class="section">
   <div class="container">
   <div class="row">



       <img src="aktau1.jpg">
       <div class='carousel'>
         <img src="akatu3.jpg" id="carousel">
       </div>
       <div class="info1">
         <h1>Mangystau</h1>
         <h3></h3>
          <p>
        <div style="text-align:justify">Mangystau region
                 is located at the junction of great desert and the world's only inland sea -
                the Caspian Sea. Being on the south-western part of Kazakhstan, the
                desert lies below global sea level. Here is one of the deepest hollows
                on the
                planet - Karagiye.&nbsp;</div>
                <div style="text-align:justify"><br>
                </div>
                <div style="text-align:justify" >The
                 territory of Mangystau is called open-air museum. It is the place where
                 ancient civilizations lived. 11 thousand monuments of history and thousands
                of petroglyphic drawings-poems are under state protection. This is a
                land of unique mosques and places of worship. The&nbsp;Great&nbsp;Silk&nbsp;Road&nbsp;got
                through the territory of Mangystau&nbsp;in ancient times, as well as
                caravans&nbsp;aries, dwellings of hunters, artisans, cattle farmers and
                fortresses&nbsp;were located along this way.
                Mangystau region is located at the junction of great desert and the world's only inland sea - the Caspian Sea.</div>
              </div>



       </div>
<script>
  var x = 0;
  var array = new Array("akatau3.jpg","aktau2.jpg");
  var i = setInterval(change, 3000);

  function change(){
    x++;
    if (x == array.length)
    x=0;
  document.getElementById('carousel').src=array[x];
  }

</script>

        </div>
      </div>
  </div>
</div>


</body>
</html>
