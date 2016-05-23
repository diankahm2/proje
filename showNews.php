
<head>
	<link href="stylesnews.css" rel="stylesheet">
	<link href="stylefacts.css" rel="stylesheet">

</head>
<div class="all">
<div class="col-md-8">
<?php
	include "connection.php";
	$query = "SELECT * FROM news";
	$res = $con->query($query);
	while($row=$res->fetch_array()){
	?>
	<div class="news">
		<div class="row">
			<div>
		<a href="showSingleNews.php?id=<?php echo $row['id']?>">
		<div class="col-md-8">
					<h3><?php echo $row['title']; ?></h3>
				</div>
			</a>
		</div>
	<?php
	}
?>
</div>
</div>
