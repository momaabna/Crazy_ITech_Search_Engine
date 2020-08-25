
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type='text/css'>
.itemicon{
	width:200px;
	height:200px;
	border-radius: 100px;
	padding:10px;
	
}
.item{
	background: rgba(0,0,0,0.1);
	color:white;
	
	border-style: solid;
	border-width: 1px;
	margin:5px;
	
	
}

h4{
	margin:0px;
}
.topics{
	border-raduis:5px;
	border-style: solid;
	border-width: 1px;
	
}

.titlelink{
	
	color: rgba(255, 255, 255, 1.0);
	text-decoration: none;
}
.titlelink:hover{
	color:#4798A5;
}
.titlelink:visited{
	color:#4798A5;
	text-decoration: none;
}
.ti{
	height:50px;
	background-color: #D84833;
	weight:100%;
	text-align:center;
	padding:2px;
}
</style>
<div class='ti'><h3> جميع المواضيع </h3></div>
<div class='topics' style='background-color:black'>
<?php
if($_GET['key']=='HelloIntoHell'){
	

include('../config.php');
$page=1;
if (isset($_GET['page']) and $_GET['page']>0){
$page = (int) mysqli_real_escape_string($db,$_GET['page']);

}
 mysqli_query($db,"set names utf8");
 $st = ($page-1)*10 ;
 $en = 10 ;
 
$result = mysqli_query($db,"select * from posts order by id desc limit $st,$en");
while($row = mysqli_fetch_assoc($result)){
	$id = $row['id'];
	$title = $row['title'];
	$link = $row['link'];
	$author = $row['author'];
	$image = $row['image'];
	$body = $row['body'];
	$cat = $row['cat'];
	$rest = substr(strip_tags($body), 0, 300);
	
	echo "<div class='item' style=';background-image:url($image);background-repeat: no-repeat;background-size: 100% 100%;padding:50px'> 
	
	<center>

	
	<br />
	<div style='background-color:rgba(0,0,0,0.8)'>
	<a class='titlelink' href='topic.php?id=$id'> <h1>$title</h1> </a> 
	<br /> 
	
	<p>$rest ....<a class='titlelink' href='post_to_page.php?id=$id'> Post To Facebook</a></p>
	</div>
	</center>
	
	
	
	
	
	
	</div>";
	
}


?>

<center>
<div style='height:50px;background-color:black;color:black;'>

<?php
$result1 = mysqli_query($db,"SELECT COUNT(*) AS num FROM posts ");
$row1 = mysqli_fetch_assoc($result1);
$cou = $row1['num'];
$npages = ceil($cou/10);

echo "<div style='width:10;height:10;float:left;padding:5px;margin:5px;background-color:#00335E'><a style='text-decoration: none;color:white' href='index.php?page=1'> <<< </a></div>";

for ($i=max(($page-5) ,1);$i<=min($npages,($page+5));$i++){
	echo "<a style='text-decoration: none;color:white' href='index.php?page=$i'><div style='width:10;height:10;float:left;padding:5px;margin:5px;background-color:#00335E'>$i</div> </a>"; 
}



echo "<div style='width:10;height:10;float:left;padding:5px;margin:5px;background-color:#00335E'><a style='text-decoration: none;color:white' href='index.php?page=$npages'> >>> </a></div>";
}
?>
</div>
</center>


</div>