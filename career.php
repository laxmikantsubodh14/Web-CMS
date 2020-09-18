<?php include"includes/header.php";
$cmsimp="select * from imp_static_pages where page_id='4'";
$cmsSql=mysql_query($cmsimp);

$CmsRow=mysql_fetch_array($cmsSql); ?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<div class="header"><?php if($CmsRow['header_image']!='') {?><img src="uploaded_files/headerimage/<?php echo $CmsRow['header_image'];?>" /><?php } ?></div>
<div class="inner_bg">
<div class="header"><img src="images/aboutus_top_line.jpg" /><br /><div class="middle_top"><a href="index.php">Home</a> >> <a href="jobseekers.php"><?php echo $CmsRow['page_name'];?> </a></div>
<br /><img src="images/aboutus_top_line.jpg" /></div>
<?php include"includes/left_menu.php"; ?>
<div class="aboutus_content_h1"><?php echo $CmsRow['page_name'];?></div>
<div class="career">
  <?php
$jobSql=mysql_query("select * from imp_jobs where Status='Y' order by JobsAddedDate");
$jobNum=mysql_num_rows($jobSql);
if($jobNum>0)
{
while($jobRow=mysql_fetch_array($jobSql)){
?>
  <div class="career_bg"><div class="career_content">&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/careers_arrow.jpg" />&nbsp;&nbsp;<?php echo $jobRow['JobsTitle'];?></div></div>
  <div class="career_"><div class="career_h1">Job Title  : </div><div class="career_h2"><?php echo $jobRow['JobsTitle'];?></div></div>
  <div class="career_"><div class="career_h3">Job Description  : </div><div class="career_h2"><?php echo strip_tags(substr($jobRow['JobsDescription'],0,250));?></div></div>
  <div class="career_"><div class="button"><a href="applynow.php?id=<?php echo $jobRow[JobsId]; ?>"><img src="images/applynow.jpg" width="79" height="22" border="0" /></a>&nbsp;&nbsp;<a href="viewdetail.php?id=<?php echo $jobRow[JobsId]; ?>"><img src="images/viewdetail.jpg" width="79" height="22" border="0" /></a></div>
  </div><div class="career_h1">&nbsp;&nbsp;</div>
   <?php } }?>
  
</div></div>
<?php include"includes/footer.php"; ?>