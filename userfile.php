<?php include"includes/header_user.php";
$userID=$_SESSION['session_user']; 
$dbquery = "select * from imp_customer where user_loginid ='$userID' order by user_id";

$result = mysql_query($dbquery); if(mysql_error()!=""){echo mysql_error();}
$row=mysql_fetch_array($result);
$start = intval($start);
$pagesize = intval($pagesize)==0?$pagesize=10:$pagesize;
//$sql_file_id="select * from imp_filecust where user_id='$user_id'";
$columns = "select * ";
$sql_file_id = " from imp_filecust where user_id='$user_id'";
				     $sql_file_id="from imp_filecust where user_id='$user_id'" ;
					 
					 
					  $sql_count = "select count(*) from imp_filecust where user_id='$user_id'"; 
					  $sql_file_id .= "limit $start, $pagesize ";
					   $sql_file_id = $columns.$sql_file_id;
$result_file_id=mysql_query($sql_file_id);
$reccnt = db_scalar($sql_count);

?>
<script language="JavaScript">
var newwindow;
function poptastic(url)
{
	newwindow=window.open(url,'name','height=500,width=600,resizable=1,scrollbars=1,location=1');
	if (window.focus) {newwindow.focus()}
}
</script>
 
<div class="header"><img src="images/contactus_header.jpg" /></div>
<div class="inner_bg">

<div class="header"><img src="images/aboutus_top_line.jpg" /><br />
<div class="middle_top"><a href="#">Home</a> >> <a href="#">User Files </a></div>
<br /><img src="images/aboutus_top_line.jpg" /></div>
<?php include"includes/left_user_menu.php" ?>
<div class="aboutus_content_h1">User Files </div>
<div class="form_table">
  <div class="uservideo">
    <div class="user_video">User Files </div>
  </div>
  <?php
	           
				while($row_file_id=mysql_fetch_array($result_file_id))
				{
				$FileId=$row_file_id[File_id];
				     $sql_Filename="select * from imp_file where File_id='$FileId'" ;
					$result_Filename=mysql_query($sql_Filename);
					   while($row_Filename=mysql_fetch_array($result_Filename))
				       {
					
				?>
  <div class="uservideo1">
    <div class="uservideo_h1">File Name:<?php echo $row_Filename[File_name]; ?></div>
    <div class="uservideo_h2">Added date : <? echo $row_Filename[CurrentDate]; ?></div>
  <div class="uservideo_h3"><? echo $row_Filename[Description]; ?></div>
   <div class="uservideo_h4"><?php  if($row_Filename[view]=='Y' && $row_Filename[pdf]!=''){
		?>
			<a href="javascript:void(0)" onclick="poptastic('view.php?file=uploaded_files/uploadepdf/<?php echo $row_Filename[pdf]; ?> ')"><img src="images/view.jpg" border="0" /></a> <?php } ?><?php if($row_Filename[download]=='Y'  && $row_Filename[pdf]!=''){
		?><a href="download.php?filename=uploaded_files/uploadepdf/<?php echo $row_Filename[pdf]; ?>"><img src="images/downlaod.jpg"  border="0"/></a><?php } ?></div></div>

	<?php  } 
					
					}?>

</div>
</div></div>
<?php include"includes/footer.php" ?>