<?php
include('../config.php');
include('../simple_html_dom.php');
$st = (int) $_GET['s'];
$en = (int) $_GET['e'];

for ($page=$st;$page<=$en;$page++){

echo $page;
$url = 'http://www.almasdar-tech.com/'.$page .'/';




$html = file_get_html($url);
$title=null;
$body =null;
if($html){
if (count($html->find('div[class=cs-main-content]'))>0){
$cat = mysqli_real_escape_string($db,$html->find('span[class=cs-post-category-solid]',0)->find('a',0)->innertext);
$title =mysqli_real_escape_string($db,$html->find('h1[class=entry_title]',0)->innertext);
$html1 = $html->find('div[class=cs-single-post-paragraph]',0)->innertext;
$html1 = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $html1);
$body = explode("<p class=\"cs-single-post-tags\">",$html1)[0]; 

$image = mysqli_real_escape_string($db,$html->find('div[class=cs-main-content]',0)->find('img',0)->src);
$body =mysqli_real_escape_string($db,$body);

$author = 'almasdar-tech - المصدر تك';
$url = $url;
}}
if($title and $body and $cat){
				mysqli_query($db,"SET NAMES 'utf8'");
				mysqli_query($db,'SET CHARACTER SET utf8'); 
				$sql = "INSERT INTO `posts`( `title`, `body`, `author`, `image`, `link`,`cat`) VALUES ('$title','$body','$author','$image','$url','$cat')" ;
				mysqli_query($db,$sql);
				echo 'Done : '. $title . ' -- '. $url .' -- '. $image.'<br />';
}

}


?>