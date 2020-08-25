<div style='text-align:right;margin:20px;'>

<?php
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
$rest = strip_tags($body);
	
	
echo "<div style='height:50;color:#172A31;padding:10px;margin:10px;border-style:solid;border-width:1px;border-raduis:10px;'>
<table style='width:100%'>
<tr>
<td style='text-align:left;'> 
<div'><h2>$cat</h2></div>
</td> 
<td style='text-align:right;'>
<h1 >$title</h1>
</td>
</tr>
</table>
</div>";
echo "<div style='padding:30px;margin:30px;'><img style='width:100%;height:100%;border-style:solid;border-width:1px;border-raduis:10px;' src='$image' /> </div>";
echo "<div style='color:#172A31;padding:10px;margin:10px;border-style:solid;border-width:1px;border-raduis:10px;text-align:right;overflow: auto;'>
<h3>$body</h3>
</div>";
echo "<div style='color:#172A31;padding:10px;margin:10px;border-style:solid;border-width:1px;border-raduis:10px;text-align:right'>
<table style='width:100%'>
<tr>
<td style='text-align:left;'> 
<div'><h2><a style='color:rgba(0,0,255,0.5);text-decoration: none;' href='$link' >$author</a></h2></div>
</td> 
<td style='text-align:right;'>
<a style='color:rgba(0,0,255,0.5);text-decoration: none;' href='$link' ><h1 > :المصدر</h1></a>
</td>
</tr>
</table>
</div>";


?>


</div>

