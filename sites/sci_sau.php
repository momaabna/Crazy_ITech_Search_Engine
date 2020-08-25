<?php
include('../config.php');
include('../simple_html_dom.php');
$st = (int) $_GET['s'];//6301 //in dB 13757
$en = (int) $_GET['e'];//12809

for ($page=$st;$page<=$en;$page++){

echo $page;
$url = 'http://www.scientificsaudi.com/ss/'.$page ;

$html = file_get_html($url);
//echo $html;
$title=null;
$body =null;
if($html){
if (count($html->find('section[class=entry-content]'))>0){
$cat = mysqli_real_escape_string($db,'مقالات');
//$new =str_get_html($html->find('h1[id=article-title]',0)->innertext);
$banner = $html->find('div[class=c5-post-thumb]',0)->innertext;
$title =mysqli_real_escape_string($db,$html->find('h1[class=entry-title]',0)->innertext);
$pieces = explode("background-image:url('", $banner)[1];
$pieces = explode("');min-height",$pieces)[0];
$image = $pieces;
$body =$html->find('section[itemprop=articleBody]',0)->innertext;
$body = mysqli_real_escape_string($db,explode("<div class=\"abh_box abh_box_down abh_box_business\">",$body)[0]);
$author = 'Scientific Saudi - السعودي العلمي';
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