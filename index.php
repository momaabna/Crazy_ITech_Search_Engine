<?php







?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<?php
include('config.php');
?>
<title>Crazy Search Engine </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
	background-color:#53719E;
}

/* Style the header */
.header {
    height:10%;
    padding: 0px;
    text-align: center;
	background:url(images/NN.jpg);
	background-repeat: no-repeat;background-size: cover;
    
}

/* Create three unequal columns that floats next to each other */
.column {
    float: left;
    padding: 10px;
    /* Should be removed. Only for demonstration */
}

/* Left and right column */
.column.side {
    width: 20%;
}

/* Middle column */
.column.middle {
    width: 60%;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Style the footer */
.footer {
    background-color: #272727;
    padding: 10px;
    text-align: center;
	height:100px;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
    .column.side, .column.middle {
        width: 100%;
    }
}
</style>
</head>
<body>
<!-- Facebook Like Page  -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=617076468660010&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Facebook Like Page  -->
<div class="header">
  <?php include('header.php'); ?>
</div>
<br />
<div class="row">
<hr />
  <div class="column side" style="background-color:#aaa;">  

<!-- Facebook Like Page  -->
<div class="fb-page" data-href="https://web.facebook.com/Crazy.ITech.Engine/" data-tabs="timeline" data-width="300" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://web.facebook.com/Crazy.ITech.Engine/" class="fb-xfbml-parse-ignore"><a href="https://web.facebook.com/Crazy.ITech.Engine/">Crazy ITech Engine</a></blockquote></div>
<!-- Facebook Like Page  -->

  <?php include('res.php');?></div>
  <div class="column middle" style="background-color:#fff;"> <?php include('topics1.php');?> </div>
  <div class="column side" style="background-color:#ccc;overflow: auto;height:500px"><?php include('cats.php');?></div>
</div>

<div class="footer">
 <?php include('footer.php');?>
</div>

</body>
</html>
