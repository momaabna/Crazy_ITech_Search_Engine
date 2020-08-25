<?php
include('config.php');

function unique_word($string) {
    $string = explode(' ', strtolower($string));
    $words = array_unique($string);
    return $words;
}
$arr =array();
 mysqli_query($db,"set names utf8");

$result = mysqli_query($db,"select * from posts ");
while($row = mysqli_fetch_assoc($result)){
	$id = $row['id'];
	$title = $row['title'];
	$link = $row['link'];
	$author = $row['author'];
	$image = $row['image'];
	$body = $row['body'];
	$cat = $row['cat'];
	$rest = strip_tags($body);
	$arr = array_merge($arr,unique_word($rest));
}
foreach (array_unique($arr) as $value){
	echo $value . '<br />';
}

	






?>