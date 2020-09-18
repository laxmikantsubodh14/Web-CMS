<?php include"includes/header.php"; 
$news_sql="select * from imp_news  where NewsId='$id'";
$news_result=mysql_query($news_sql);
$news_row=mysql_fetch_array($news_result); 
?>
<div class="header"><?php if($CmsRow['header_image']!='') {?><img src="uploaded_files/headerimage/<?php echo $CmsRow['header_image'];?>" /><?php } ?></div>
<div class="inner_bg">
<div class="header"><img src="images/aboutus_top_line.jpg" /><br /><div class="middle_top"><a href="index.php">Home</a> >> News Detail >><a href="newsdetail.php?id=<?php echo $news_row['NewsId'];?>"><?php echo $news_row['heading'];?></a></div>
<br /><img src="images/aboutus_top_line.jpg" /></div>
<?php include"includes/left_menu.php"; ?>
<div class="aboutus_content_h1">News Detail </div>
<div class="news_detail_h1"><b><?php echo $news_row['heading'];?></b></div>
<div class="news_detail_h1"><?php echo date('M d, Y',strtotime($news_row['addeddate']));?></div>
<div class="news_detail_content"><?php echo $news_row['description'];?></div>
<div class="news_detail_image"><?php if($news_row['photo']!=''){?><img src="uploaded_files/new_photo/<?php echo $news_row['photo'];?>" border="0" height="126" width="211" /><?php } ?><br /><a href="newsheading.php">view all news</a></div>
</div>
<?php include"includes/footer.php"; ?>