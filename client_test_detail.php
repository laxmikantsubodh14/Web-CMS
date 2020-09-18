<?php include"includes/header.php"; 
$test_sql="select * from imp_testimonialtitle  where TestimonialId='$tid'";
$test_result=mysql_query($test_sql);
$test_row=mysql_fetch_array($test_result); 
?>
<div class="header"><?php if($CmsRow['header_image']!='') {?><img src="uploaded_files/headerimage/<?php echo $CmsRow['header_image'];?>" /><?php } ?></div>
 <div class="inner_bg">
<div class="header"><img src="images/aboutus_top_line.jpg" /><br /><div class="middle_top"><a href="index.php">Home</a> >> Clients >><a href="client_test_detail.php?tid=<?php echo $test_row['TestimonialId'];?>"><?php echo $test_row['TestimonialTitle'];?></a></div>
<br /><img src="images/aboutus_top_line.jpg" /></div>
<?php include"includes/left_menu.php"; ?>
<div class="aboutus_content_h1">Clients</div>
<div class="news_detail_h1"><b><?php echo $test_row['TestimonialTitle'];?></b></div>
<div class="news_detail_h1"><?php echo date('M d, Y',strtotime($test_row['TestimonialDate']));?></div>
<div class="news_detail_content"><?php echo $test_row['TestimonialDescription'];?></div>
<div class="news_detail_image"><?php if($test_row['Photo']!=''){?><img src="uploaded_files/new_photo/<?php echo $test_row['Photo'];?>" border="0" height="126" width="211" /><?php } ?><br /><a href="client_test_heading.php">view all </a></div>
</div>
<?php include"includes/footer.php"; ?>