﻿<?php
include('../config.php');
include('../simple_html_dom.php');
$st = (int) $_GET['s'];
$en = (int) $_GET['e'];

for ($page=$st;$page<=$en;$page++){

echo $page;
$url = 'http://www.technologianews.com/'.$page .'/';




$html = file_get_html($url); 

$title=null;
$body =null;
if($html){
if (count($html->find('span[class=term-badge]'))>0){
$cat = mysqli_real_escape_string($db,$html->find('span[class=term-badge]',0)->find('a',0)->innertext);
$title =mysqli_real_escape_string($db,strip_tags($html->find('h1[class=single-post-title]',0)->innertext));
$image = mysqli_real_escape_string($db,$html->find('a[class=post-thumbnail]',0)->href);

$html1 =$html->find('div[class=entry-content]',0)->innertext;
$body=mysqli_real_escape_string($db,preg_replace('#<script(.*?)>(.*?)</script>#is', '', $html1));
$author = 'Technologianews - تكنولوجيا نيوز';
$url = $url;
}}
if($title and $body and $cat ){
				mysqli_query($db,"SET NAMES 'utf8'");
				mysqli_query($db,'SET CHARACTER SET utf8'); 
				$sql = "INSERT INTO `posts`( `title`, `body`, `author`, `image`, `link`,`cat`) VALUES ('$title','$body','$author','$image','$url','$cat')" ;
				mysqli_query($db,$sql);
				echo 'Done : '. $title . ' -- '. $url .' -- '. $image.'<br />';
}

}


?>