<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styleadmin.css">



<title>Admin</title>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">


    <title>Gallery</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
</head>
<body>



<div class="main">
  <div class="section">
      <div class="container">
        <div class="row">
        <div class="col-md-7">
          <form role="form" method="POST" action="addNews.php" enctype="multipart/form-data">
            <div class="form-group">
              <label class="control-label" for="exampleInputEmail1">Title</label>
              <input class="form-control" id="exampleInputEmail1" name="title" type="text">
            </div>
            <div class="form-group">
              <label class="control-label" for="exampleInputPassword1">Information</label>
              <textarea class="form-control" id="exampleInputPassword1"  name="textarea"type="text"></textarea>
            </div>
						<div class="form-group">
					    <label for="exampleInputFile">File input</label>
					    <input type="file" id="exampleInputFile" name="img">
					  </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>
      </div>
      </div>
        <div class="b">
        <ul class="list-group">
          <a href="admin.html"><li class="list-group-item">Posts</li></a>
          <a href="viewers.php"><li class="list-group-item">Viewers</li></a>
          <a href="sales.html"><li class="list-group-item">Sales</li></a>
          <a href="profile.html"><li class="list-group-item">Profile</li></a>
        </ul>
    </div>
  </div>

</div>
</body>
</html>
