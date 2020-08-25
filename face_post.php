
<?php
// require Facebook PHP SDK
// see: https://developers.facebook.com/docs/php/gettingstarted/
require_once("./Facebook/autoload.php");
 
// initialize Facebook class using your own Facebook App credentials
// see: https://developers.facebook.com/docs/php/gettingstarted/#install
$config = array();
$config['app_id'] = '617076468660010';
$config['app_secret'] = '7625d2330409e2f538a27cce89317425';
$config['fileUpload'] = false; // optional
 
$fb = new Facebook\Facebook($config);
 $pageaccesstoken ="EAAIxOkZB2tyoBAChI8gFUs7Vtcm7jdq6QiOt2a0vxgUD0mlZAg7ZAn0Rkl62VjnZBHtkBAVG0mJA4C3OVXvjDMDHsF0cbx8zYqvbAJTbi8TYYlyJi5Q2hpSdNYczBUVJJHrqCo9iot2d6pEdXPDQDKZAfT9ZAw51q2hKazRGTL30tpZAsV3TG09pqZCXeXHZBcqojs9MhQFNjkwZDZD";
// define your POST parameters (replace with your own values)
$params = array(
  "access_token" => $pageaccesstoken, // see: https://developers.facebook.com/docs/facebook-login/access-tokens/
  "message" => "TEST",
  "link" => "http://google.com",
  "picture" => "http://i.imgur.com/lHkOsiH.png",
  "name" => "test",
  "caption" => "test",
  "description" => "test"
);
 
// post to Facebook
// see: https://developers.facebook.com/docs/reference/php/facebook-api/
try {
  $ret = $fb->post('/296875137482894/feed', $params,$pageaccesstoken);
  echo 'Successfully posted to Facebook';
} catch(Exception $e) {
  echo $e->getMessage();
}
?>