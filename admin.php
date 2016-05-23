<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styleadmin.css">



<title>Admin</title>
<?php
 include 'navbar1.php'
 ?>

<div class="main">

  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <ul class="list-group">
            <a href="admin.html"><li class="list-group-item">Posts</li></a>
            <a href="viewers.php"><li class="list-group-item">Viewers</li></a>
            <a href="sales.html"><li class="list-group-item">Sales</li></a>
            <a href="profile.html"><li class="list-group-item">Profile</li></a>
          </ul>
        </div>
        <div class="col-md-7">
          <form role="form" action="addNews.php" method="post">
            <div class="form-group">
              <label class="control-label" for="exampleInputEmail1">Title</label>
              <input class="form-control" id="exampleInputEmail1"  type="text">
            </div>
            <div class="form-group">
              <label class="control-label" for="exampleInputPassword1">Information</label>
              <textarea class="form-control" id="exampleInputPassword1" type="text"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
            <button type="submit" class="btn btn-default">File  </button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>







</body>
</html>
