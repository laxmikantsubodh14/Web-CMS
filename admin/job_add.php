<?php 
include_once"../includes/midas.inc.php"; 
validate_admin();
if($_POST['flag']=="yes") {
@extract($_POST);
 if($JobsId!='') 
{    

	$error='';
	if(trim($_FILES['UploadFile']['name']) != "")//if image given
	{
		// If File extension is .doc or .pdf..............

		if ($_FILES['UploadFile']['type'] == "application/pdf")
		{
			$uniq=time();
			$imageName = $uniq."_".trim($_FILES['UploadFile']['name']);
			if (!copy($_FILES['UploadFile']['tmp_name'], "../uploaded_files/pdf_files/".$imageName))
				$error="upload";
			else
			{
				// Code to remove the Previous File If Exist..........
				$image_sql="select JobsPdf from imp_jobs where JobsId ='$JobsId'";
				$image_result=mysql_query($image_sql);
				$image_cat=mysql_fetch_array($image_result);
				$src="../uploaded_files/pdf_files/$image_cat[JobsPdf]"; 
				if($image_cat['JobsPdf'] !='')
					unlink($src);
			}
		}
		else
			$error = "type";
	}//end of if image given

		// Current Date
		$currentDate= date("Y-m-d");

	   	// Code to Explode the Expiration Date and If Date is changed then make the format according to the Date Function for Database..........
		$date=explode('-', $ExpirationDate);
		$ExpirationDate=$date[2].'-'.$date[0].'-'.$date[1];	
		$Nd=explode('-',$StartDate);
		$SDate=$Nd[2].'-'.$Nd[0].'-'.$Nd[1];	

		 
		    
										
				$sqlUpdate="update imp_jobs set JobsTitle=\"$job_title\", JobsLastUpdated=\"$currentDate\" , Status=\"$IsActive\" , JobsExpirationDate=\"$ExpirationDate\", JobsEmail=\"$emailaddress\", JobsDescription=\"$description\", JobsContactInfo=\"$contact_info\", JobCat='$JobCat', StartDate='$SDate' ";
				  if(trim($_FILES['UploadFile']['name']) != "")
				     $sqlUpdate .= ", JobsPdf= '$imageName'";
			    
				$sqlUpdate.=" where JobsId='$JobsId'";
				$rsUpdate=executeQuery($sqlUpdate);
				$sess_msg=$sitemsgs[16];
				$_SESSION['sessionMsg']=$sess_msg;
				?>
				<script language="javascript">
				location.href="job_list.php";
				</script>
				<?php 
				header("location: job_list.php");
				exit;
			
		}
		else 
		{
			$error="";
			// Code to check the Uploaded PDF file (Name), Type, Uplaoded or not.,.. If there is problem then appropriate Flag will be generated and Error Message will display......
			
			// If there is nothing problem to upload the file then the file will be upload in ( PDFFile ) Folder.....
			
			if(trim($_FILES['UploadFile']['name']) != "")//if image given
			{
			if ($_FILES['UploadFile']['type'] == "application/pdf")
			{
			$uniq=time();
			$imageName = $uniq."_".trim($_FILES['UploadFile']['name']);
			if (!copy($_FILES['UploadFile']['tmp_name'], "../uploaded_files/pdf_files/".$imageName))
			$error="upload";
			}
			else
			$error = "type";
			}//end of if image given
			
			// Current Date
			$currentDate= date("Y-m-d");
			$date=explode('-', $ExpirationDate);
			$ExpirationDate=$date[2].'-'.$date[0].'-'.$date[1];
			$Nd=explode('-',$StartDate);
			$SDate=$Nd[2].'-'.$Nd[0].'-'.$Nd[1];
		
		if($error=='')
		 {
					$sqlInsert="insert into imp_jobs (JobsTitle, JobsAddedDate , JobsExpirationDate , JobsPdf, JobsContactInfo, JobsEmail, JobsDescription, Status, JobCat, StartDate) values ('$job_title', '$currentDate', '$ExpirationDate', '$imageName', '$contact_info', '$emailaddress', '$description', '$IsActive','$JobCat','$SDate')";
					$rsInsert=executeQuery($sqlInsert);
					$sess_msg=$sitemsgs[14];
					$_SESSION['sessionMsg']=$sess_msg;
					?>
				<script language="javascript">
				   location.href="job_list.php";
				</script>
				<?php 
					header("location: job_list.php");
					exit;
		   }// end if...			
					
				
		}
		
}

if(isset($JobsId))
{
	$db_query="select * from imp_jobs where JobsId='".$JobsId."'";
	$rsResult=executeQuery($db_query);
	$arr_total=mysql_fetch_array($rsResult);
	@extract($arr_total);
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE><?php echo $title_message;?></TITLE>
<script language="javascript" src="js/validation.js"></script>
<script language=javascript>
// JavaScript For Email Validation
function validateEmail(mailId)
{
    var ref=document.getElementById(mailId);
	var s=ref.value;
	if(stringTrim(s)== '')
		return true;
	a = s.match(/\S+@([-\w]+\.)+\w+/g);
	if(a != null && a.length)
		return true;
	else
		return false;
}
// Removes unnecessary spaces from beginning and end of a string
function stringTrim(str)
{
    if(str.length > 0)
        while(str.indexOf(' ') == 0)
            str = str.substr(1);
    if (str.length > 0)
        while(str.lastIndexOf(' ') == str.length-1)
            str = str.substr(0, str.length-1);
    return str;
}
// JavaScript For Form Validation
function PostSearchForm()
{
   	if(document.Jobs.JobCat.value=="")
	{
		alert("Please Select Job Category !!");
		document.Jobs.JobCat.value="";
		document.Jobs.JobCat.focus();
		return false;
	}
	
	if(stringTrim(document.Jobs.job_title.value)=="")
	{
		alert("Please Enter Job Title !!");
		document.Jobs.job_title.value="";
		document.Jobs.job_title.focus();
		return false;
	}
	if(stringTrim(document.Jobs.emailaddress.value)=="")
	{
		alert("Please Enter Email Address to Contact !!");
		document.Jobs.emailaddress.value="";
		document.Jobs.emailaddress.focus();
		return false;
	}
	if(validateEmail("emailaddress")=="")
	{
		alert("Please Enter Valid Mail Id");
		document.Jobs.emailaddress.focus();
		return false;
	}
	if(stringTrim(document.Jobs.contact_info.value)=="")
	{
		alert("Please Enter Contact Info !!");
		document.Jobs.contact_info.value="";
		document.Jobs.contact_info.focus();
		return false;
	}
	if(stringTrim(document.Jobs.description.value)=="")
	{
		alert("Please Enter Job Description !!");
		document.Jobs.description.value="";
		document.Jobs.description.focus();
		return false;
	}
   /*	if(document.Jobs.ExpirationDate.value=="")
	{
		alert("Please Enter ExpirationDate Date !!");
		document.Jobs.ExpirationDate.focus();
		return false;
	}*/
	return true;
}
</script>
<script language="javascript" type="text/javascript" src="../includes/plugins/DateTime/datetimepicker.js"></script>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1"><LINK 
href="css/css.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
</HEAD>
<BODY><?php include("top.inc.php");?>
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
                <TD class=blueheading align=left width="56%">Job Info </TD>
					<td width="41%" align="right"><a href="job_list.php">
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
				<form name="Jobs" method="post" action="job_add.php" onSubmit="return PostSearchForm();">
				<table width="80%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr>
				      <td align="left" class="white_bold">Add/Edit Job </td>
				      <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				    </tr></table>				  </td>
				</tr>
		

<?php 
$CatSql="select * from imp_job_category order by CategoryName";
$CatRes=mysql_query($CatSql);
?>

<tr class="oddClass">
<td><span class="fieldsname">Job Category :</span><font class="red_txt">*</font></td>
<td><select name="JobCat">
<option value="">Select</option>
<? while($CatRow=mysql_fetch_array($CatRes)) {?>
<option value="<? echo $CatRow['CategoryID'];?>"<? if($CatRow['IsDefaultCat']=='Y') echo"selected";?>>
<? echo $CatRow['CategoryName'];?></option>
<? }  ?>
</select></td>
</tr>

				
				
				 <tr class="oddClass">
				   <td><span class="fieldsname">Job Title :</span><font class="red_txt">*</font></td>
				   <td><input name="job_title" type="text" class="textbox12" value="<?php echo $JobsTitle; ?>"></td>
				 </tr>
				 
				  <tr class="oddClass">
				   <td><span class="fieldsname">Contact Info:</span><font class="red_txt">*</font></td>
				   <td><input name="contact_info" id="contact_info" type="text" class="textbox12" value="<?php echo $JobsContactInfo; ?>"></td>
				 </tr>
				 
			  <tr class="oddClass">
			   <td><span class="fieldsname">Description:</span><font class="red_txt">*</font></td>
			   <td><TEXTAREA style='width:350' NAME="description" ROWS="4" COLS="40"><?php  echo $JobsDescription; ?></TEXTAREA></td>
			 </tr>
				 
			 <tr class="oddClass">
				   <td><span class="fieldsname">Expiration Date :</span><font class="red_txt">*</font></td>
				   <td><input name="ExpirationDate" id="demo2" type="text" class="textbox12" value="<?php echo $JobsExpirationDate; ?>">&nbsp;&nbsp;<a href="javascript:NewCal('demo2','MMDDYYYY',false,24)"><img src="../includes/plugins/DateTime/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
				 </tr>
				 
				 
				 
				  <tr class="oddClass">
				   <td><span class="fieldsname">Start Date :</span><font class="red_txt">*</font></td>
				   <td><input name="StartDate" id="demo1" type="text" class="textbox12" value="<?php echo $StartDate; ?>">&nbsp;&nbsp;<a href="javascript:NewCal('demo1','MMDDYYYY',false,24)"><img src="../includes/plugins/DateTime/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
				 </tr>
				 
				  <tr class="oddClass">
				   <td><span class="fieldsname">PDF File :</span></td>
				   <td><input type="file" name="UploadFile" size="27"></td>
				 </tr>
				 
								
				<tr class="oddClass">
				  <td class="fieldsname">Status</td>
				  <td>
				  <select name="IsActive" class="list_menu_status">
				    <option value="Y" <?php if($IsActive =="Y") { echo"selected"; }?>>Active</option>
				    <option value="N" <?php if($IsActive =="N") { echo"selected"; }?>>InActive</option>
				  </select></td>
				  </tr>
				  
				<tr class="evanClass">
				  <td>&nbsp;</td>
				  <td>
				  <input type="hidden" name="flag" value="yes">
				  <input type="hidden" name="JobsId" value="<?php echo $JobsId;?>">
				  <input name="submit" type="image" class="submitbutton" src="images/submit.gif"></td>
				  </tr>
				</table>	</form>			</TD>
              </TR>
              <TR>
        <TD 
    align=left>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD>&nbsp;</TD></TR></TBODY></TABLE>
<?php include("bottom.inc.php");?></BODY></HTML>
