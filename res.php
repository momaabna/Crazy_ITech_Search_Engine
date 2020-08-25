<style type='text/css'>
.resit{
		border-raduis:10px;
	border-style: solid;
	border-width: 1px;
	padding:5px;
	margin:5;
	text-align: center;
	border-radius: 5px;
}
.resit:hover{
	background-color: #D84833;
}
.tires{
	text-align: center;
	background-color: #D84833;
	height:50px;
	padding:2px;
}
</style>
<div style='background-color:black;color:white;'>
<div class='tires'><h3> المصادر </h3></div>
<div >
<?php


 mysqli_query($db,"set names utf8");
$result = mysqli_query($db,"SELECT DISTINCT author FROM posts");
while($row = mysqli_fetch_assoc($result)){
	$author = $row['author'];
	echo "<div class='resit'> $author</div>";
	
}



?>

</div>
</div>