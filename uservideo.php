<?php include"includes/header_user.php";
 $dbquery = "select * from imp_customer where user_loginid ='$userID' order by user_id";
$result = mysql_query($dbquery); if(mysql_error()!=""){echo mysql_error();}
$row=mysql_fetch_array($result);
//$user_id=$row[user_id];
//$sql_file_id="select * from synergy_videocust where user_id='$user_id'";
//$result_file_id=mysql_query($sql_file_id);

$start = intval($start);
$pagesize = intval($pagesize)==0?$pagesize=5:$pagesize;

$columns = "select * ";
 $sql_file_id = "from imp_videocust where user_id='$user_id'";
				     $sql_file_id="from imp_videocust where user_id='$user_id'";
					 
					 
					  $sql_count = "select count(*) from imp_videocust where user_id='$user_id'"; 
					  $sql_file_id .= "limit $start, $pagesize ";
					   $sql_file_id = $columns.$sql_file_id;
$result_file_id=mysql_query($sql_file_id);
$reccnt = db_scalar($sql_count);
?>
<script language="JavaScript">
var newwindow;
function poptastic(url)
{
	newwindow=window.open(url,'name','height=350,width=350');
	if (window.focus) {newwindow.focus()}
}
</script>
 
<div class="header"><img src="images/contactus_header.jpg" /></div>
<div class="inner_bg">

<div class="header"><img src="images/aboutus_top_line.jpg" /><br />
<div class="middle_top"><a href="#">Home</a> >> <a href="#">User Videos </a></div>
<br /><img src="images/aboutus_top_line.jpg" /></div>
<?php include"includes/left_user_menu.php" ?>
<div class="aboutus_content_h1">User Videos</div>
<div class="form_table">
  <div class="uservideo">
    <div class="user_video">User Videos</div>
  </div>
  <?php
	           
			while($row_file_id=mysql_fetch_array($result_file_id))
				{
				$File_id=$row_file_id[video_id];
				     
					 $sql_Filename="select * from imp_video where video_id='$File_id'" ;
					$result_Filename=mysql_query($sql_Filename);
					   while($row_Filename=mysql_fetch_array($result_Filename))
				       {
					
					
				?>
  <div class="uservideo1">
    <div class="uservideo_h1">Video Name:<?php echo $row_Filename[video_name]; ?></div>
    <div class="uservideo_h2">Added date : <? echo $row_Filename[CurrentDate]; ?></div>
  <div class="uservideo_h3"><? echo $row_Filename[Description]; ?></div>
   <div class="uservideo_h4"><?php /*?><?php  if($row_Filename[view]=='Y' && $row_Filename[pdf]!=''){
		?><?php */?>
			<a href="javascript:void(0)" onclick="poptastic('viewvideo.php?file=uploaded_files/uploadevideo/<?php echo $row_Filename[video]; ?>')"><img src="images/view.jpg" border="0" /></a> <?php /*?><?php } ?><?php if($row_Filename[download]=='Y'  && $row_Filename[pdf]!=''){
		?><?php */?><?php /*?><a href="download.php?filename=uploaded_files/uploadepdf/<?php echo $row_Filename[pdf]; ?>"><img src="images/downlaod.jpg"  border="0"/></a><?php */?><?php /*?><?php } ?><?php */?></div></div>

	<?php  } 
					
					}?>

</div>
</div></div>
<?php include"includes/footer.php" ?>