<?php include"includes/header.php"; 
$news_sql="select * from imp_news order by NewsId desc";
$news_result=mysql_query($news_sql);
?>
<div class="header"><?php if($CmsRow['header_image']!='') {?><img src="uploaded_files/headerimage/<?php echo $CmsRow['header_image'];?>" /><?php } ?></div>
<div class="inner_bg">
<div class="header"><img src="images/aboutus_top_line.jpg" /><br /><div class="middle_top"><a href="index.php">Home</a> >> <a href="newsheading.php">News Heading</a></div>
<br /><img src="images/aboutus_top_line.jpg" /></div>
<?php include"includes/left_menu.php"; ?>
<div class="aboutus_content_h1">News Headings</div>
<div class="news_heading_h1"><div class="news_heading_in_h1">News Heading</div><div class="news_heading_in_h2">Date</div></div>
<?php while($news_row=mysql_fetch_array($news_result)){?>	
<div class="news_heading_h2"><div class="news_heading_in_h3"><a href="newsdetail.php?id=<?php echo $news_row['NewsId'];?>"><?php echo $news_row['heading'];?></a></div>
<div class="news_heading_in_h4"><?php echo date('d-M-Y',strtotime($news_row['addeddate']));?></div></div>
<?php } ?>
</div>
<?php include"includes/footer.php"; ?>