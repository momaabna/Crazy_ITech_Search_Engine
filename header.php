<?php  include('counter/counter.php');     ?>
<style type='text/css'>
.left{
	heigt:5%;
	width:50%;
	grid-area: left;
	margin-right: 30%;
	margin-bottom: 2.5%;
}
.right{
	background-color:white;
	border-radius:2.5%;
	margin-bottom:3%;
	heigt:10%;
	width:10%;
	grid-area: right;
}
.up{
	height:70%;
	
}
.menu{
	padding:0px;
	height:55px;
	
	background-color: #222;
}
.menu1 {
	overflow: hidden;
	background-color: #222;

    list-style-type: none;
	float: right;
    margin: 0;
    padding: 0;

}


li a:hover {
    background-color: #D84833;
}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
	
    text-decoration: none;
	
}
.amenu{
	display: block;
    padding: 8px;
    background-color: #222;
}
.limenu{
	height:50px;
	float: right;
	display:inline;
	font-size:150%;
	padding:5px;
}


</style>
<table>
<tr>

<div class='up' > <img class='left' src='images/stick.jpg' /> <img class='right' src='images/icon.png'/></div>
</tr>

<tr>
<div class='menu'>
 <ul class='menu1'>
  <li class='limenu'><a class='amenu' href="index.php">الرئيسية</a></li>
  <li class='limenu'><a class='amenu' href="catagory.php?cat=عام">التصنيفات</a></li>
  <li class='limenu'><a class='amenu' href="resourses.php">المصادر</a></li>
  <li class='limenu'><a class='amenu' href="contact.php">تواصل معنا</a></li>
  <li class='limenu'><a class='amenu' href="news.php"> الأخبار</a></li>
  <li class='limenu'><a class='amenu' href="news.php"> من نحن؟</a></li>
</ul> 

</div>

</tr>



</table>
