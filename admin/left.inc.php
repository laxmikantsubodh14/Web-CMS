<?php session_start();
include_once"../includes/midas.inc.php"; 
 $sql_detail_admin = "select * from imp_admin where adm_login_id ='".$_SESSION['ses_username']."'";
 $recordSet_admin2 = mysql_query($sql_detail_admin);
 $recordSet_admin=mysql_fetch_array($recordSet_admin2);
 $arrvalue=explode(",",$recordSet_admin['adm_privi']);
 $aa=$recordSet_admin['status'];
 $access=array();
 if($aa=='S')
 {
 ?>
<table width="192" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td><a href="admin_desktop.php"><img src="images/secure_login.gif" alt="Main Administration Home" width="212" height="42" border="0" /></a></td>
  </tr>
  <tr>
    <td height="6"></td>
  </tr>
   <?php 
   if(in_array("Admin Manager",$arrvalue)==true)
		{
   ?>
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<a href="admin_list.php" class="blue_txt">Admin Manager</a> </td>
  </tr>
 

<?php /*?><tr>
    <td height="1" align="left" bgcolor="#E0E0E0"></td> 
  </tr>
   <?php }  
     if(in_array("Menu Management",$arrvalue)==true)
		{
  ?>
  
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="menu_list.php" class="blue_txt">Menu Management</a></font></td>
  </tr> <?php */?>
  
   <tr>
    <td  align="left" bgcolor="#E0E0E0"></td>
  </tr>
  <?php }  
     if(in_array("News Management",$arrvalue)==true)
		{
  ?>
 
 <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="news_list.php" class="blue_txt">News Management</a></font></td>
  </tr> 
  
 <?php /*?>  <tr>
    <td  align="left" bgcolor="#E0E0E0"></td>
  </tr>
 
 
<?php }  
     if(in_array("Directories Management",$arrvalue)==true)
		{
  ?>
 
 
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<a href="dirlisting_view.php" class="blue_txt">Directories Management</a> </td>
  </tr><?php */?>
  
 <tr>
    <td  align="left" bgcolor="#E0E0E0"></td>
  </tr> 
  <?php }  
     if(in_array("Banner Management",$arrvalue)==true)
		{
  ?>
 
 <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<a href="banner_view.php" class="blue_txt">Banner Management</a> </td>
  </tr>
 
<?php /*?>  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  
 <?php }  
     if(in_array("FAQ Management",$arrvalue)==true)
		{
  ?>
 <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="faqcat_view.php" class="blue_txt">FAQ Management</a></font></td>
  </tr>
  <tr><?php */?>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  <?php }  
     if(in_array("Inquiry Management",$arrvalue)==true)
		{
  ?>
  
   <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="inquiry_view.php" class="blue_txt">Inquiry Management</a></font></td>
  </tr>
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  
  <?php }  
     if(in_array("Newsletter Management",$arrvalue)==true)
		{
  ?>
  
   <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="newsletter_send_mail.php" class="blue_txt">Newsletter Management</a></font></td>
  </tr>
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
 <?php /*?> <?php }  
     if(in_array("Debate Posting Management",$arrvalue)==true)
		{
  ?>
    <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="debatepost_list.php" class="blue_txt">Debate Posting Management</a></font></td>
  </tr>
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr><?php */?>
  
 <?php /*?> <?php }  
     if(in_array("Opinion Posting  Management",$arrvalue)==true)
		{
  ?>
    <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="opinionpost_list.php" class="blue_txt">Opinion Posting  Management</a></font></td>
  </tr>
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr><?php */?>
  <?php }  
     if(in_array("Video Management",$arrvalue)==true)
		{
  ?>
    
   <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="videos_view.php" class="blue_txt">Video Management </a></font></td>
  </tr>
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
<?php /*?>  <?php }  
     if(in_array("Audio Management",$arrvalue)==true)
		{
  ?>
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="audio_view.php" class="blue_txt">Audio Management </a></font></td>
  </tr>
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr><?php */?>
<?php /*?>  <?php }  
     if(in_array("Web TV Management",$arrvalue)==true)
		{
  ?>
     <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="web_view.php" class="blue_txt">Web TV Management</a></font></td>
  </tr><?php */?>

  <?php /*?><tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  <?php }  
     if(in_array("Gallery Management",$arrvalue)==true)
		{
  ?>
     <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="gallery_view.php" class="blue_txt">Gallery Management</a></font></td>
  </tr><?php */?>

  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  <?php /*?><?php }  
     if(in_array("Poll  Management",$arrvalue)==true)
		{
  ?>
   <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="poll_add.php" class="blue_txt">Poll  Management</a></font></td>
  </tr>
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr><?php */?>
<?php /*?>  <?php }  
     if(in_array("Community  Management",$arrvalue)==true)
		{
  ?>
   <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="communitycat_view.php" class="blue_txt">Community  Management</a></font></td>
  </tr>
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr><?php */?>
  <?php /*?><?php }  
     if(in_array("Forum  Management",$arrvalue)==true)
		{
  ?>
  
   <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="forumcategory_view.php" class="blue_txt">Forum  Management</a></font></td>
  </tr>
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr><?php */?>
  
<?php /*?>  <?php }  
     if(in_array("Group  Management",$arrvalue)==true)
		{
  ?>
    <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="groupcat_view.php" class="blue_txt">Group  Management</a></font></td>
  </tr>
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr><?php */?>
  <?php }  
     if(in_array("Members/doctors  Management",$arrvalue)==true)
		{
  ?>
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="members_view.php" class="blue_txt">Members Management</a></font></td>
  </tr>
  
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
<?php /*?>  <?php }  
     if(in_array("Share Thoughts Management",$arrvalue)==true)
		{
  ?>
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="thoughts_view.php" class="blue_txt">Share Thoughts Management</a></font></td>
  </tr>
  
 
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  <?php }  
     if(in_array("Message Board Management",$arrvalue)==true)
		{
  ?>
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="messageboard_view.php" class="blue_txt">Message Board Management</a></font></td>
  </tr>
  
  
  
  <tr>
    <td  align="left" bgcolor="#E0E0E0"></td>
  </tr><?php */?>
  <?php }  
     if(in_array("State Management",$arrvalue)==true)
		{
  ?>
 
<!--  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<a href="state_view.php" class="blue_txt">State Management</a> </td>
  </tr>-->
  
   <tr>
    <td  align="left" bgcolor="#E0E0E0"></td>
  </tr>
  
  <?php }  
     if(in_array("City Management",$arrvalue)==true)
		{
  ?>
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<a href="city_view.php" class="blue_txt">City Management</a> </td>
  </tr>
  
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>

<?PHP }?>

  
 <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="changepassword.php" class="blue_txt">Change Password!</a></font></td>
  </tr>
  
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  
<?php   
     if(in_array("Blog",$arrvalue)==true)
		{
  ?>
 
   
   <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a target="_blank" href="<?php echo "/medicanewsindia/blog/wp-admin";?>" class="blue_txt">Blog</a></font></td>
  </tr>
  
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
 <?php } ?>

<?php   
     if(in_array("CMS",$arrvalue)==true)
		{
  ?>
 
   
   <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="static_home_list.php" class="blue_txt">CMS</a></font></td>
  </tr>
 <?php } ?>
  
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="logout.php" class="blue_txt">Logout!</a></font></td>
  </tr>
 
  
  <tr>
    <td height="1" bgcolor="#E0E0E0"></td>
  </tr>
</table>
<?php } else {?>
<table width="192" border="0" cellspacing="0" cellpadding="3">
  <tr>
    <td><a href="admin_desktop.php"><img src="images/secure_login.gif" alt="Main Administration Home" width="212" height="42" border="0" /></a></td>
  </tr>
  <tr>
    <td height="6"></td>
  </tr>
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<a href="admin_list.php" class="blue_txt">Admin Management</a> </td>
  </tr>
  
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="member_view.php" class="blue_txt">Client Management</a></font></td>
  </tr> 
  
<!--   <tr>
    <td  align="left" bgcolor="#E0E0E0"></td>
  </tr>
 <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="menu_list.php" class="blue_txt">Menu Management</a></font></td>
  </tr> -->
<!--  
   <tr>
    <td  align="left" bgcolor="#E0E0E0"></td>
  </tr>
  
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="client_list.php" class="blue_txt">Client Management</a></font></td>
  </tr> -->
  

  
   <tr>
    <td  align="left" bgcolor="#E0E0E0"></td>
  </tr>
 
 <!--<tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="news_list.php" class="blue_txt">News Management</a></font></td>
  </tr> 
  
   <tr>
    <td  align="left" bgcolor="#E0E0E0"></td>
  </tr>
 <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<a href="banner_view.php" class="blue_txt">Banner Management</a> </td>
  </tr>
 
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>-->
  
   
   <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="inquiry_view.php" class="blue_txt">Inquiry Management</a></font></td>
  </tr>
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  
   <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="newsletter_send_mail.php" class="blue_txt">Newsletter Management</a></font></td>
  </tr>
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  
  
  
<!--  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="link_view.php" class="blue_txt">Link Management</a></font></td>
  </tr>
     <tr>
    <td  align="left" bgcolor="#E0E0E0"></td>
  </tr>-->
  
<!--  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="country_view.php" class="blue_txt">Country Management</a></font></td>
  </tr> 
  -->
<!--   <tr>
    <td  align="left" bgcolor="#E0E0E0"></td>
  </tr>
  -->
<!--  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="state_view.php" class="blue_txt">State Management</a></font></td>
  </tr> 
  -->
<!--   <tr>
    <td  align="left" bgcolor="#E0E0E0"></td>
  </tr>-->
  
<!--  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="city_view.php" class="blue_txt">City Management</a></font></td>
  </tr> -->
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="testimonial_list.php" class="blue_txt">Testimonial Management</a></font></td>
  </tr>
  
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<a href="jobcat_list.php" class="blue_txt">Job Category Management</a></td>
  </tr>  
  
   <tr>
      <td height="1" align="left" bgcolor="#E0E0E0"></td>
   </tr>
  
  
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;
	<a href="job_list.php" class="blue_txt">Job Management</a></td>
  </tr>  
  
   <tr>
    <td height="1" align="left" bgcolor="#E0E0E0"></td>
  </tr>
   <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="jobapp_list.php" class="blue_txt">Job Application Management </a></font></td>
  </tr>
  
<!--  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<a href="newsemails_list.php" class="blue_txt">Tempmails Management</a></td>
  </tr>  
  -->
  
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
   <tr>
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="news_list.php" class="blue_txt">News Management</a></font></td>
  </tr>
  
<!--  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  
  <tr>
    <td height="1" align="left" bgcolor="#E0E0E0"></td>
  </tr>
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="upload_view.php" class="blue_txt">File Management</a></font></td>
  </tr>-->
  
<!--  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
   <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="video_view.php" class="blue_txt">Video Management</a></font></td>
  </tr>
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>-->
   <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="static_home_list.php" class="blue_txt">CMS</a></font></td>
  </tr>

  
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  
  <!--<tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="static_home_list2.php" class="blue_txt">Inner CMS</a></font></td>
  </tr>

  
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>-->
  
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="changepassword.php" class="blue_txt">Change Password!</a></font></td>
  </tr>
  
  <tr>
    <td bgcolor="#E0E0E0"></td>
  </tr>
  
  <tr>
    <td height="15" align="left" class="blue_txt"><img src="images/bullet_1.gif" width="4" height="8" />&nbsp;&nbsp;<font color="#DC4300"><a href="logout.php" class="blue_txt">Logout!</a></font></td>
  </tr>
  
  
</table>
<?php } ?>
<p>&nbsp;</p>
