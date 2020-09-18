<?php include"includes/header.php";
$cmsimp="select * from imp_static_pages where page_id='2'";
$cmsSql=mysql_query($cmsimp);

$CmsRow=mysql_fetch_array($cmsSql);

 ?>
 <div class="header"><?php if($CmsRow['header_image']!='') {?><img src="uploaded_files/headerimage/<?php echo $CmsRow['header_image'];?>" /><?php } ?></div>
 <div class="inner_bg">
<div class="header"><img src="images/aboutus_top_line.jpg" /><br /><div class="middle_top"><a href="index.php">Home</a> >> <a href="about_us.php"><?php echo $CmsRow['page_name'];?></a></div>
<br /><img src="images/aboutus_top_line.jpg" /></div>
<?php include"includes/left_menu.php"; ?>
<div class="aboutus_content_h1"><?php echo $CmsRow['page_name'];?></div>
<div class="aboutus_content"><?php echo $CmsRow['page_description'];?> </div>
</div>
<?php include"includes/footer.php"; ?>