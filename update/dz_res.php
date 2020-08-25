
<?php

include('../config.php');
require_once('../simpletest/browser.php');
include('../simple_html_dom.php');

///////////////////////////////////////
$author = 'الباحثون الجزائريون - Algerian Researchers';
mysqli_query($db,"set names utf8");
$result = mysqli_query($db,"select * from posts where author='$author' order by id desc");
if ($row = mysqli_fetch_assoc($result)){
	$id = $row['id'];
	$title = $row['title'];
	$link = $row['link'];
	
	$fff = (int) explode('dz-res.com/?p=',$link)[1];
	$st = $fff+1;
	$en = $fff+100;
	echo 'Start : '.$st.'<br />';








///////////////////////////////////









$browser = new SimpleBrowser();
$browser->get('http://php.net/');
for ($page=$st;$page<=$en;$page++){

echo $page;
$url = 'https://www.dz-res.com/?p='.$page ;
$browser->get($url);
$html = str_get_html($browser->getContent());
//echo $html;
//$html = file_get_html($url);
$title=null;
$body =null;
if($html){
if (count($html->find('article[id=the-post]'))>0){
$cat = mysqli_real_escape_string($db,$html->find('a[property=v:title]',1)->innertext);

$new =str_get_html($html->find('div[class=single-post-thumb]',0)->innertext);
//$banner = str_get_html($html->find('div[class=article-banner]',0)->innertext)->find('img',0);
$title =mysqli_real_escape_string($db,$html->find('span[itemprop=name]',0)->innertext);
$image = $new->find('img',0)->src;
$body =mysqli_real_escape_string($db,$html->find('div[class=entry]',0)->innertext);
$body = explode('<div class="abh_box abh_box_down abh_box_fancy">',$body)[0];
$author = 'الباحثون الجزائريون - Algerian Researchers';
$url = $url;
}}
if($title and $body and $cat ){
				mysqli_query($db,"SET NAMES 'utf8'");
				mysqli_query($db,'SET CHARACTER SET utf8'); 
				$sql = "INSERT INTO `posts`( `title`, `body`, `author`, `image`, `link`,`cat`) VALUES ('$title','$body','$author','$image','$url','$cat')" ;
				mysqli_query($db,$sql);
				echo 'Done : '. $title . ' -- '. $url .' -- '. $image.' -- '.$cat.'<br />';
}

}

}
?>


