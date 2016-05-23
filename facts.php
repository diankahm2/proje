<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php
    include ('navbar1.php');
    ?>
    <link href="ImageMapster-master/examples/style.css" rel="stylesheet">
    <link href="stylefacts.css" rel="stylesheet">


  </head>
  <body>

    <?php session_start();
    	if(!isset($_SESSION['status'])){
    		header("Location:index.php");
    	}
    ?>
		<?php if($_SESSION['status']==0){

		 include "addNewsForm.php";
		}else{
			include "showNews.php";
		} ?>
    	</div>
    </body>
    </html>


  </body>
</html>
