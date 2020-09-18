<?php include"includes/header.php"; 
$test_sql="select * from imp_testimonialtitle order by TestimonialId desc";
$test_result=mysql_query($test_sql);
?>
<div class="header"><?php if($CmsRow['header_image']!='') {?><img src="uploaded_files/headerimage/<?php echo $CmsRow['header_image'];?>" /><?php } ?></div>
 <div class="inner_bg">
<div class="header"><img src="images/aboutus_top_line.jpg" /><br /><div class="middle_top"><a href="index.php">Home</a> >> <a href="client_test_heading.php">Testimonial Headings</a></div>
<br /><img src="images/aboutus_top_line.jpg" /></div>
<?php include"includes/left_menu.php"; ?>
<div class="aboutus_content_h1">Testimonial Headings</div>
<div class="news_heading_h1"><div class="news_heading_in_h1">Testimonial's Headings</div><div class="news_heading_in_h2">Date</div></div>
<?php while($test_row=mysql_fetch_array($test_result)){?>	
<div class="news_heading_h2"><div class="news_heading_in_h3"><a href="client_test_detail.php?tid=<?php echo $test_row['TestimonialId'];?>"><?php echo $test_row['TestimonialTitle'];?></a></div>
<div class="news_heading_in_h4"><?php echo date('d-M-Y',strtotime($test_row['TestimonialDate']));?></div></div>
<?php } ?>
</div>
<?php include"includes/footer.php"; ?>