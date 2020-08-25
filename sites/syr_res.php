<?php
include('../config.php');
include('../simple_html_dom.php');
$st = (int) $_GET['s'];
$en = (int) $_GET['e'];

for ($page=$st;$page<=$en;$page++){

echo $page;
$url = 'http://www.syr-res.com/article/'.$page .'.html';




$html = file_get_html($url);
$title=null;
$body =null;
if($html){
if (count($html->find('div[class=article-banner]'))>0){
$cat = mysqli_real_escape_string($db,$html->find('h3[id=cat-name-h3]',0)->find('a',0)->innertext);
$new =str_get_html($html->find('h1[id=article-title]',0)->innertext);
$banner = str_get_html($html->find('div[class=article-banner]',0)->innertext)->find('img',0);
$title =mysqli_real_escape_string($db,$new->find('span',0)->innertext);
$pieces = explode("data-src=\"", $banner)[1];
$pieces = explode("\"",$pieces)[0];
$image = $pieces;
$body =mysqli_real_escape_string($db,$html->find('main[id=article-html]',0)->innertext);
$author = 'Syrian Researchers - الباحثون السوريون';
$url = $url;
}}
if($title and $body and $cat and $banner){
				mysqli_query($db,"SET NAMES 'utf8'");
				mysqli_query($db,'SET CHARACTER SET utf8'); 
				$sql = "INSERT INTO `posts`( `title`, `body`, `author`, `image`, `link`,`cat`) VALUES ('$title','$body','$author','$image','$url','$cat')" ;
				mysqli_query($db,$sql);
				echo 'Done : '. $title . ' -- '. $url .' -- '. $image.'<br />';
}

}


?>