
<center>
<?php
mysqli_query($db,"set names utf8");
$result = mysqli_query($db,"SELECT DISTINCT author FROM posts");
$auth =0;
while($row = mysqli_fetch_assoc($result)){
	$auth++;
}
echo "<div style='margin:10px;height:50px;padding:10px;width:200px;float:left;background-color:black;color:#fff;'>Resoursces : ($auth) </div>";
$result = mysqli_query($db,"SELECT DISTINCT cat FROM posts");
$cata =0;
while($row = mysqli_fetch_assoc($result)){
	$cata++;
}
echo "<div style='margin:10px;height:50px;padding:10px;width:200px;float:left;background-color:black;color:#fff;'>Catagories : ($cata) </div>";

$result = mysqli_query($db,"SELECT count(id) AS num FROM posts");
$row1 = mysqli_fetch_assoc($result);
$cou1 = $row1['num'];

echo "<div style='margin:10px;height:50px;padding:10px;width:200px;float:left;background-color:black;color:#fff;'>Topics : ($cou1) </div>";
$datei = fopen("./counter/countlog.txt","r");
$count = (int) fgets($datei,1000);
fclose($datei);
echo "<div style='margin:10px;height:50px;padding:10px;width:200px;float:left;background-color:black;color:#fff;'>Visitors : ($count) </div>";


?>
</center>