<?php include"includes/header.php"; ?>
<div class="header"><?php /*?><img src="uploaded_files/headerimage/<?php echo $CmsRow['header_image'];?>" /><?php */?></div>
<div class="inner_bg">
<div class="header"><img src="images/aboutus_top_line.jpg" /><br /><div class="middle_top"><a href="index.php">Home</a> >> Job Description <a href="contract_staff.php"><?php echo $CmsRow['page_name'];?></a></div>
<br /><img src="images/aboutus_top_line.jpg" /></div>
<?php include"includes/left_menu.php"; ?>
<div class="aboutus_content_h1">Job Description</div>
<div class="form_table">
<div class="job_table_top"><img src="images/job_table_top.jpg" /></div>
<div class="job_table_bg"><div class="job_h1">Job Description</div></div> <?php
 $jobSql=mysql_query("select * from imp_jobs where JobsId='$_REQUEST[id]' and Status='Y'");
$jobNum=mysql_num_rows($jobSql);
if($jobNum>0)
{
$jobRow=mysql_fetch_array($jobSql);
?>  
<div class="job_table_bg1"><form><div class="job_form"><div class="job_form_h2">Job ID<span class="style1">*</span></div>
<div class="colon_space1">:</div>
<div class="job_form_h3">5596
</div></div>

<div class="job_form"><div class="job_form_h2">Name<span class="style1">*</span></div>
<div class="colon_space1">:</div>
<div class="job_form_h3"><?php echo strip_tags($jobRow['JobsTitle']);?></div>
</div>

<div class="job_form"><div class="job_form_h2">Location<span class="style1">*</span></div>
<div class="colon_space1">:</div>
<div class="job_form_h3">New Delhi</div>
</div>

<div class="job_form">
  <div class="job_form_h2">Added Date <span class="style1">*</span></div>
  <div class="colon_space1">:</div>
<div class="job_form_h3"><?php if($jobRow['JobsAddedDate']!='0000-00-00'){ echo date('d-M-Y',strtotime($jobRow['JobsAddedDate'])); }?></div>
</div>
	
	
	<div class="job_form"><div class="job_form_h2">End Date<span class="style1">*</span></div>
	<div class="colon_space1">:</div>
<div class="job_form_h3">
 <?php if($jobRow['JobsExpirationDate']!='0000-00-00'){ echo date('d-M-Y',strtotime($jobRow['JobsExpirationDate'])); }?>  </div>
	</div>
  
  <div class="job_form"><div class="job_form_h2">Contact Info<span class="style1">*</span></div>
  <div class="colon_space1">:</div>
<div class="job_form_h3">
 <?php echo strip_tags($jobRow['JobsContactInfo']);?></div>
  </div>
  
  <!--<div class="job_form"><div class="job_form_h2">Email ID<span class="style1">*</span></div>
  <div class="colon_space1">:</div>
<div class="job_form_h3"><?php echo strip_tags($jobRow['JobsEmail']);?> </div>
  </div>
  -->
 <!-- <div class="job_form"><div class="job_form_h2">Salary<span class="style1">*</span></div>
  <div class="colon_space1">:</div>
<div class="job_form_h3"><?php echo strip_tags($jobRow['Salary']);?> </div>
  </div>-->
	
	<!--<div class="job_form"><div class="job_form_h2">Authorization<span class="style1">*</span></div>
	<div class="colon_space1">:</div>
<div class="job_form_h3">Green card<br />H1B<br />EAD<br />OPT<br />CPT</div>
	</div>-->
	
	<div class="job_form"><div class="job_form_h2">Job Details<span class="style1">*</span></div>
	<div class="colon_space1">:</div>
<div class="job_form_h3"><?php echo strip_tags($jobRow['JobsDescription']);?></div></div>
	
	<!--<div class="job_form"><div class="job_form_h2">Email ID<span class="style1">*</span></div>
	<div class="colon_space1">:</div>
<div class="job_form_h3">train@synergisticit.com</div>
	</div>
	
	<div class="job_form"><div class="job_form_h2">Contact No<span class="style1">*</span></div>
	<div class="colon_space1">:</div>
<div class="job_form_h3">510-868-8545 </div>
	</div>-->
	
	<div class="job_form"><div class="job_form_h2">Other Details<span class="style1">*</span></div>
	<div class="colon_space1">:</div>
<div class="job_form_h3">
  	NA</div>
	</div>
	<div class="job_form"><div class="job_form_h2"><a href="applynow.php?id=<?php echo strip_tags($jobRow['JobsId']);?>"><img src="images/applyfor-job.jpg"  border="0" /></a></div>
<div class="job_form_h3">&nbsp;&nbsp;&nbsp;&nbsp;<br /><br /></div></div>

</form><?php } ?></div>
<div class="job_table_top"><img src="images/job_table_bottom.jpg" /></div>
</div>
</div>
<?php include"includes/footer.php";?>