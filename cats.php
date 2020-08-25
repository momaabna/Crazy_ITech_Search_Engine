<style type='text/css'>
.resit{
		border-raduis:10px;
	border-style: solid;
	border-width: 1px;
	padding:5px;
	margin:5px;
	text-align: center;
	border-radius: 5px;
	
}
.resit:hover{
	background-color: #D84833;
}
aa:visited{
	color:blue;
}
.tires{
	text-align: center;
	background-color: #D84833;
	height:50px;
	padding:2px;
}
</style>
<div style='background-color:black;color:white;'>
<div class='tires'><h3> التصنيفات </h3></div>
<div>
<?php
//include('config.php');

 mysqli_query($db,"set names utf8");
$result = mysqli_query($db,"SELECT DISTINCT author,cat FROM posts");
while($row = mysqli_fetch_assoc($result)){
	$cat = $row['cat'];
	echo "<div class='resit'><a class='aa' style='color:white;text-decoration: none;' href='catagory.php?cat=$cat'>  $cat</a></div>";
	
}



?>
</div>

</div>