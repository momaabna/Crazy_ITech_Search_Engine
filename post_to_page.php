<?php 
require_once("./config.php");
require_once("./Facebook/autoload.php");
$config = array();
$config['app_id'] = '610098722499111';
$config['app_secret'] = '54e435c76239437c82be01d55b648d20';

$fb = new Facebook\Facebook($config);

//if (1){
//Get Post By Id

$id = (int) mysqli_real_escape_string($db,$_GET['id']);
mysqli_query($db,"set names utf8");
$result = mysqli_query($db,"select * from posts where id=$id");
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$title = $row['title'];
$link = $row['link'];
$author = $row['author'];
$image = $row['image'];
$body = $row['body'];
$cat = $row['cat'];
$rest = $rest = substr(strip_tags($body), 0, 300);
$url = 'http://crazyitech.com/tech/topic.php?id='.$id;	
	$res = $fb->get('me/accounts','access-tocken');
	$res = $res->getDecodedBody();
	foreach($res['data'] as $page){
		echo $page['id'] .' - ' .$page['name']. '<br>';
		if($page['id'] = '296875137482894'){
			
			$access = $page['access_token'];
		}
		$message = array(
		
		"message" => $title,
		"link" => $url,
		"picture" => $image
		);
		$fb->post('296875137482894/feed/',$message,$access);
		echo 'done';
		header("Location : index.php");
	
	}
	
//}else{
//		$helper = $fb->getRedirectLoginHelper();
//		$permissions =['email','user_posts','manage_pages','publish_actions','publish_pages'];
//		$callback = 'https://crazyitech.com/tech/facebook/';
//		$loginurl = $helper->getLoginUrl($callback,$permissions);
//		echo "<a href='".$loginurl."'>login</a>";
//	}





?>