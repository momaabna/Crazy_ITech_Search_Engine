<?php
include('../config.php');
include('../simple_html_dom.php');
///////////////////////////////////////
$author = 'Akhbar-Tech - أخبار التقنيه';
mysqli_query($db,"set names utf8");
$result = mysqli_query($db,"select * from posts where author='$author' order by id desc");
if ($row = mysqli_fetch_assoc($result)){
	$id = $row['id'];
	$title = $row['title'];
	$link = $row['link'];
	
	$fff = (int) explode('/Node/d/',$link)[1];
	
	$st = $fff+1;
	$en = $fff+100;
	echo 'Start : '.$st.'<br />';








///////////////////////////////////

for ($page=$st;$page<=$en;$page++){


echo $page;
$url = 'http://www.akhbar-tech.com/Node/d/'.$page ;
$opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
$context = stream_context_create($opts);
$header = file_get_contents($url,false,$context);



$html = str_get_html($header);

$title=null;
$body =null;
if($html){
if (count($html->find('div[class=clearfix]'))>0){
$cat = mysqli_real_escape_string($db,'أحدث الأخبار');
$title =mysqli_real_escape_string($db,$html->find('h1',0)->innertext);
$im = $html->find('img[class=thumbnail]',0)->src;
$image = 'http://www.akhbar-tech.com'. $im;
$image = mysqli_real_escape_string($db,$image);
$body =mysqli_real_escape_string($db,$html->find('div[class=detailsContainer]',0)->innertext);
$author = 'Akhbar-Tech - أخبار التقنيه';
$url = $url;
}}
if($title and $body and $cat ){
				mysqli_query($db,"SET NAMES 'utf8'");
				mysqli_query($db,'SET CHARACTER SET utf8'); 
				$sql = "INSERT INTO `posts`( `title`, `body`, `author`, `image`, `link`,`cat`) VALUES ('$title','$body','$author','$image','$url','$cat')" ;
				mysqli_query($db,$sql);
				echo 'Done : '. $title . ' -- '. $url .' -- '. $image.'<br />';
}

}}


?>