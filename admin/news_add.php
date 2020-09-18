<?php include_once"../includes/midas.inc.php";
extract($_REQUEST); 
validate_admin();

if(isset($_REQUEST['NewsId']))
{
	$sql="select * from imp_news  where NewsId='$_REQUEST[NewsId]'";
	$recordSet=$contact->Execute($sql) or die($contact->ErrorMsg());
    $NumRecords=$recordSet->RecordCount();
	
}
if($_REQUEST[remove]=='yes')
{
	$imageid=$_REQUEST['imageid'];
	$image_sql5="select Image from imp_morenwesimg  where ImageId='$imageid'";
	$image_result5=$contact->Execute($image_sql5) or die($contact->ErrorMsg());
	$src5="../uploaded_files/new_photo/$image_quote5->fields[Image]";

	$sql_update5 = "delete from imp_morenwesimg  where ImageId='$imageid'";
	$result_sql5=$contact->Execute($sql_update5) or die($contact->ErrorMsg());
	
	if($image_quote5->fields['Image']!='')
		unlink($src5);
}
if($_POST['flag']=="insert")
{
	@extract($_POST);
	 
	$error='';
 
	$ImageName=$_FILES['MainImage'][name];	
	;	
	list($width, $height, $type, $attr) =  getimagesize($_FILES['MainImage'][tmp_name]);
	
	 $width; $height;
    
	$ImageTempName=$_FILES['MainImage'][tmp_name];	
	//if($width<=198 && $height<=105)
	//{
	  if($ImageName!='')
	  {
		$item_photo_big=time()."-".$ImageName;
		$uploadFile = UP_FILES_FS_PATH."/new_photo/".trim($item_photo_big);	
		move_uploaded_file($ImageTempName,$uploadFile); 
		
	  }	
	//}
	//else
	//{
	// $error="imgheight";
	// $_SESSION['sessionMsg']="Please select Image which have 198 height and 105 width";
	//}
if($error=='')
{
$addeddate=date('Y-m-d:H-i-s');
$sqlInsert="insert into imp_news(heading,description, addeddate, photo, Status,IsHeadline,IsBreakingNews,category_id,MediaId )values('".$heading."', '".$description."', '".$addeddate."','".$item_photo_big."','".$Status."','".$IsHeadline."','".$IsBreakingNews."','".$subcatname."','".$submedia."')";
	$rsInsert=$contact->Execute($sqlInsert) or die($contact->ErrorMsg());
		$sess_msg=$sitemsgs[26];
		$_SESSION['sessionMsg']=$sess_msg;
		
		$NewsId=$contact->Insert_ID();
		
		
	$tot_image=count($_FILES['imagename']['name']);
	if($tot_image!='')
	    {
		  for($at=0;$at<$tot_image;$at++)  
		    {
			    $smaller="imagename";				     
			  
			  if ($_FILES[$smaller]['name']!= "")//if image given smaller
					{
						if ($_FILES[$smaller]['type'][$at] == "image/gif" || $_FILES[$smaller]['type'][$at] == "image/pjpeg" || $_FILES[$smaller]['type'][$at] == "image/jpeg")
							{
								$uniq=time()+10;
								$imageName3 = $uniq."_".trim($_FILES[$smaller]['name'][$at]);
								if (!copy ($_FILES[$smaller]['tmp_name'][$at], "../uploaded_files/new_photo/".$imageName3)) 
								$error="upload";
							}
							else
								$error = "type";
						}//end of if image given smller 
			 
			  
			  $sqlLogTime2="insert into imp_morenwesimg  (NewsId,Image) values ('$NewsId', '$imageName3')";		  
		      $ResultLogTime2=$contact->Execute($sqlLogTime2) or die("could not insert"); 
		        echo mysql_error();		   
			   
			 } 
		}
		 
?>
				<script language="javascript">
				location.href="news_list.php";
				</script>
				<?php 
	exit;	
	
}



}


if($_POST['flag']=="update")
{	
	$error='';
	@extract($_POST);	 
	$ImageName=$_FILES['MainImage'][name];
	$ImageTempName=$_FILES['MainImage'][tmp_name];	
	list($width, $height, $type, $attr) =  getimagesize($_FILES['MainImage'][tmp_name]);
   	
	if($ImageName!='') 
	{	
	  //if($width<=198 && $height<=105)
	 // {
		$item_photo_big=time()."-".$ImageName;
		$uploadFile = UP_FILES_FS_PATH."/new_photo/".trim($item_photo_big);	
		@unlink_file($_POST['MainImage2'],"../uploaded_files/new_photo/");
		move_uploaded_file($ImageTempName,$uploadFile);
	  //}
	 // else
	  //{
	   //$error="imgheight";
	   //$_SESSION['sessionMsg']="Please select Image which have 198 height and 105 width";
	  //}	
	} 
	else 
	{	
		$item_photo_big=$_POST['MainImage2'];
	}		
		if($error=='')
		{
		 $sqlUpdate="update imp_news set  heading='$heading' ,description='$description', IsHeadline='$IsHeadline',IsBreakingNews='$IsBreakingNews' , photo='$item_photo_big' ,category_id='$subcatname',Status='$Status', MediaId='$submedia' where NewsId='$NewsId'";
		$result_rsUpdate = $contact->Execute($sqlUpdate) or die($contact->ErrorMsg());	 
		$sess_msg=$sitemsgs[28]; 
		$_SESSION['sessionMsg']=$sess_msg;
		
	   $NewsId=$NewsId;
	   $tot_image=count($_FILES['imagename']['name']);
	   if($tot_image!='')
	    {
		  for($at=0;$at<$tot_image;$at++)  
		    {
			    $smaller="imagename";				     
			  
			  if ($_FILES[$smaller]['name']!= "")//if image given smaller
					{
						if ($_FILES[$smaller]['type'][$at] == "image/gif" || $_FILES[$smaller]['type'][$at] == "image/pjpeg" || $_FILES[$smaller]['type'][$at] == "image/jpeg")
							{
								$uniq=time()+10;
								$imageName3 = $uniq."_".trim($_FILES[$smaller]['name'][$at]);
								if (!copy ($_FILES[$smaller]['tmp_name'][$at], "../uploaded_files/new_photo/".$imageName3)) 
								$error="upload";
							}
							else
								$error = "type";
						}//end of if image given smller 
			 
			  
			  $sqlLogTime2="insert into imp_morenwesimg  (NewsId,Image) values ('$NewsId', '$imageName3')";		  
		      $ResultLogTime2=$contact->Execute($sqlLogTime2) or die($contact->ErrorMsg()); 
			   
			 } 
		}
		
		?>
				<script language="javascript">
				location.href="news_list.php";
				</script>
				<?php 
	   // header("location: news_list.php");
	exit;

}

}

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0049)http://69.61.15.150/~dish/admin/admin_desktop.php -->
<HTML><HEAD><TITLE><?php echo $title_message;?></TITLE>
<style type="text/css">
<!--
 .text_border    {
    width:70px;
    border:#FFFFFF solid 1px;
    font-family:verdana;
    font-size:10px;
    height:12px;
    color:#545454;
    }
-->	
</style>
<script language="javascript" src="js/validation.js"></script>
<script language=javascript>
function PostSearchForm()
{

 if(document.form1.heading.value=="")
	{
		alert("Please select News heading");
		document.form1.heading.focus();
		return false;
	}
		if(document.form1.description.value=="")
	{
		alert("Please fill the description");
		document.form1.description.focus();
		return false;
	}
	return true;
}


</script>
<script type="text/javascript"><!--
var gFiles = 0;
function addFile() {
    var tr = document.createElement('tr');
    tr.setAttribute('id', 'file-' + gFiles);
    var td = document.createElement('td');
    td.innerHTML = '<input type="file" name="imagename[]"><span onclick="removeFile(\'file-' + gFiles + '\')" style="cursor:pointer;">Remove</span>';
    tr.appendChild(td);
    document.getElementById('files-root').appendChild(tr);
    gFiles++;
}
function removeFile(aId) {
    var obj = document.getElementById(aId);
    obj.parentNode.removeChild(obj);
}

-->
</script>
<script language="javascript">
function Remove(imageid,NewsId)
{
	//alert('hi');
	location.href="news_add.php?remove=yes&imageid=" + imageid+"&NewsId="+NewsId;
}
</script>

<script language="javascript">

function textCounter(field,cntfield,maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
else
cntfield.value = maxlimit - field.value.length;
}
//  End -->
</script>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1"><LINK 
href="css/css.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>


</HEAD>
<BODY><?php include("top.inc.php");?>

<table width="100%" border="0" cellpadding="4" cellspacing="1">
<tr>
 <td>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  
  
  <TR>
    <TD align=middle>
      <TABLE width="98%" border=0 align="center" cellPadding=0 cellSpacing=1 bgColor=#bccad2>
        <TBODY>
        <TR>
          <TD class=blueheading 
          style="BACKGROUND-IMAGE: url(images/tablebgrep.gif)" align=left 
          height=38>
            <TABLE cellSpacing=0 cellPadding=0 width="98%" border=0>
              <TBODY>
              <TR>
                <TD width="3%"><IMG height=17 alt="" 
                  src="images/orangebullet.gif" width=17 
                vspace=3></TD>
                <TD class=blueheading align=left width="56%">News Info </TD>
				
					<td width="41%" align="right"><a href="news_list.php">
					<img src="images/return_back.gif" border="0"></a></td>
              </TR></TBODY></TABLE></TD></TR>
        <TR>
          <TD vAlign=top align=middle bgColor=#ffffff>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
               
              <TR>
                <TD align=center>&nbsp;</TD>
              </TR>
              <TR>
                <TD align=center><?php echo display_session_msg();?></TD>
              </TR> <TR>
                <TD align=center>&nbsp;</TD>
              </TR>
              <TR>
                <TD height=260 align=left valign="top">

	<form enctype="multipart/form-data" name="form1" method="post" action="news_add.php" onSubmit='return PostSearchForm();'>
	<table width="80%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr>
				      <td align="left" class="white_bold">Add/Edit News Details </td>
				      <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				    </tr></table>				  </td>
				</tr>
				


				
				<tr class="oddClass">
				  <td><span class="fieldsname">News Heading:</span><font class="red_txt">*</font></td>
				  <td><input name="heading" type="text" value="<?php echo $recordSet->fields['heading']; ?>" size="65"></td></tr>
				  
				  
				
							
				  
				  			<tr>
    <td bgcolor="#F6F6F6" class="fieldsname">Image</td>
    <td align="left" bgcolor="#F6F6F6" class="padlft23 brdtopgrey">
<?php if($_REQUEST['NewsId']!='') {?>
	<? if($recordSet->fields['photo']!='' && file_exists("../uploaded_files/new_photo/$photo"))
	{ ?>
	<img src="../uploaded_files/new_photo/<?=$recordSet->fields['photo']?>" height="100" width="100"><br> 
	<input type="hidden" name="MainImage2" value="<?=$recordSet->fields['photo'];?>">
<? } else { ?>
<img src="../images/noimgbig.gif"><br>
<? } }?>
	<input name="MainImage" type="file" class="textbox12" id="txtFile" />&nbsp;<i>(198 width and 105 height)</i></td>
  </tr>
			
			<tr class="oddClass">
				  <td><span class="fieldsname"> News  Description:</span><font class="red_txt">*</font></td>
				  <td>
				  <input readonly type="text" name="remLen1" size="10"  value="4294967295" class="text_border"> Characters Remaining
				  <TEXTAREA NAME="description" ROWS="15" COLS="62" onKeyDown="textCounter(document.form1.description,document.form1.remLen1,4294967295)"
onKeyUp="textCounter(document.form1.description,document.form1.remLen1,4294967295)"><?php if(isset($NewsId)){echo $recordSet->fields['description']; }?></TEXTAREA></td></tr>		
			
				  
				  <tr class="oddClass">
				  <td><span class="fieldsname">Is Breaking News</span></td>
				  <td><input name="IsBreakingNews" type="checkbox" value="Y" <?php if($recordSet->fields['IsBreakingNews']=='Y')echo"checked";?>  ></td>
				  </tr>
				  
										
				<tr class="oddClass">
				  <td class="fieldsname"><strong>Status</strong></td>
				  <td>
				  <select name="Status" class="list_menu_status">
				  <option value="">  Status  </option>
				  <option value="Y" <?php if($recordSet->fields['Status'] =="Y") { echo"selected"; }?>>Active</option>
				  <option value="N" <?php if($recordSet->fields['Status'] =="N") { echo"selected"; }?>>InActive</option>
				  </select></td>
				  </tr>
				  
				
				    
  <tr>
    <td colspan="2" align="center" bgcolor="#F6F6F6" class="brdtopgrey brdbtmgrey"><input name="submit" type="image" class="submitbutton" src="images/submit.gif">
      <input type="hidden" name="flag" <? if(isset($_REQUEST['NewsId'])) echo "value=update"; 
else echo "value=insert";?>>
<input name="NewsId" type="hidden" value="<?=$_REQUEST['NewsId']?>"></td>
  </tr></table></form>
  			
		</TD>
              </TR>
              <TR>
        <TD 
    align=left>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD>&nbsp;</TD></TR></TBODY></TABLE></td></tr></table>
<?php include("bottom.inc.php");?></BODY></HTML>













