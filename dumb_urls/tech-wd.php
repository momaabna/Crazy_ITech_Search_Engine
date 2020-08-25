<?php
include('../config.php');
include('../simple_html_dom.php');


$url = "tech-wd.com.html";






echo $url;

$html = file_get_html($url);

//echo $html;
$title=null;
$url =null;
if($html){
echo 'ok';
$items = $html->find('li[class=post-item]');
//echo $items;
foreach($items as $item){
$url = mysqli_real_escape_string($db,$item->find('a',0)->href);
$author = mysqli_real_escape_string($db,'tech-wd.com');
$title = mysqli_real_escape_string($db,$item->find('a',0)->innertext);
$cat = mysqli_real_escape_string($db,$item->find('h5',0)->innertext);
if($title and $url){
				mysqli_query($db,"SET NAMES 'utf8'");
				mysqli_query($db,'SET CHARACTER SET utf8'); 
				$sql = "INSERT INTO `links`( `url`, `title`, `author`,`cat`) VALUES ('$url','$title','$author','$cat')" ;
				if(mysqli_query($db,$sql)){
				echo 'Done : '. $title . ' -- '. $url .' -- '. $author.'<br />';}
}

}}


?>