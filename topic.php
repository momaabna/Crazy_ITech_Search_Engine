<?php







?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php

include('config.php');
mysqli_query($db,"set names utf8");
$page = (int) mysqli_real_escape_string($db,$_GET['id']);
$result = mysqli_query($db,"select * from posts where id=$page");
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$title = $row['title'];
$link = $row['link'];
$author = $row['author'];
$image = $row['image'];
$body = $row['body'];
$cat = $row['cat'];
echo $title;




?> </title>

<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
	background-color:black;
}

/* Style the header */
.header {
    height:10%;
    padding: 30px;
    text-align: center;
    
}

/* Create three unequal columns that floats next to each other */
.column {
    float: left;
    padding: 10px;
    /* Should be removed. Only for demonstration */
}

/* Left and right column */
.column.side {
    width: 30%;
}

/* Middle column */
.column.middle {
	float: right;
    width: 70%;
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


<div class="header">
  <?php include('header.php');


  ?>
</div>
<br />
<div class="row">
<hr />
  <div class="column side" style="background-color:#aaa;"><?php ;include('res.php');?></div>
  <div class="column middle" style="background-color:#fff;"> <?php include('top.php');?> </div>
  
</div>

<div class="footer">
  <?php include('footer.php');?>
</div>

</body>
</html>
