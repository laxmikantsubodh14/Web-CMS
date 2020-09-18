<?php 
include_once"../includes/midas.inc.php"; 
validate_admin();
if($_POST['flag']=="yes") {
@extract($_POST);
 
		{
			$error="";
						
			if(trim($_FILES['UploadFile']['name']) != "")//if image given
			{
			
			$uniq=time();
			$imageName1 = $uniq."_".trim($_FILES['UploadFile']['name']);
			if (!copy($_FILES['UploadFile']['tmp_name'], "../uploaded_files/Clients_image/".$imageName1))
			$error="upload";
			}
			
			
			// Current Date
			
			$date=explode('-', $addeddate);
			$addeddate=$date[2].'-'.$date[0].'-'.$date[1];
		
		if($error=='')
		 {
					$sqlInsert="insert into imp_portfolio (ClientName, description , addeddate , photo, Status,Type,Kanvas,Imagine,Vivid, SubClient, LoginID, Password) values ('$ClientName', '$description', '$addeddate', '$imageName1', '$IsActive','$Type','$Kanvas','$Imagine','$Vivid','$subClientName','$LoginID','$Password')";
					$rsInsert=executeQuery($sqlInsert);
			if($imageName1!='')
			   {
			   // include("image.php");
			   }
					$sess_msg=$sitemsgs[14];
					$_SESSION['sessionMsg']=$sess_msg;
					
					
					$ClientId=mysql_insert_id();
		
		
	$tot_image=count($_FILES['imagename']['name']);
	if($tot_image!='')
	    {
		  for($at=0;$at<$tot_image;$at++)  
		    {
			    $smaller="imagename"; 
			    //$smaller2=$_POST[$smaller];
				$morename="name".$at;
				$name=$_POST[$morename];
				     
				
				//$name=$name[$at];;
			  
			  if ($_FILES[$smaller]['name']!= "")//if image given smaller
					{
						if ($_FILES[$smaller]['type'][$at] == "image/gif" || $_FILES[$smaller]['type'][$at] == "image/pjpeg" || $_FILES[$smaller]['type'][$at] == "image/jpeg")
							{
								$uniq=time()+10;
								$imageName3 = $uniq."_".trim($_FILES[$smaller]['name'][$at]);
								if (!copy ($_FILES[$smaller]['tmp_name'][$at], "../uploaded_files/portfolio/".$imageName3)) 
								$error="upload";
							}
							else
								$error = "type";
						}//end of if image given smller 
			 
			  
			  //$sqlLogTime2="insert into swap_moreimage (ClientId,Image,Name) values ('$ClientId', '$imageName3','$name')";		  
		      //$ResultLogTime2=mysql_query($sqlLogTime2) or die("could not insert"); 
		       echo mysql_error();		   
			   if($imageName3!='')
			   {
			  //  include("image3.php");
			   }
			 } 
		}
					
					?>
				<script language="javascript">
				   location.href="client_list.php";
				</script>
				<?php 
					header("location: client_list.php");
					exit;
		   }// end if...			
					
				
		}
		
}

if(isset($ClientId))
{
	$db_query="select * from imp_portfolio where ClientId='".$ClientId."'";
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
   	if(document.Jobs.ClientName.value=="")
	{
		alert("Please Enter Client Name !!");
		document.Jobs.ClientName.value="";
		document.Jobs.ClientName.focus();
		return false;
	}
	
	if(document.Jobs.LoginID.value=="")
	{
		alert("Please Enter Clients LoginID !!");
		document.Jobs.LoginID.value="";
		document.Jobs.LoginID.focus();
		return false;
	}
	
	if(document.Jobs.Password.value=="")
	{
		alert("Please Enter Clients Password !!");
		document.Jobs.Password.value="";
		document.Jobs.Password.focus();
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
    td.innerHTML = '<input type="text" name="name[]" size="26"> <input type="file" name="imagename[]"> <span onclick="removeFile(\'file-' + gFiles + '\')" style="cursor:pointer;">Remove</span>';
    tr.appendChild(td);
    document.getElementById('files-root').appendChild(tr);
    gFiles++;
}
function removeFile(aId) {
    var obj = document.getElementById(aId);
    obj.parentNode.removeChild(obj);
}

--></script>
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
                <TD class=blueheading align=left width="56%">Client/Portfolio Info </TD>
					<td width="41%" align="right"><a href="client_list.php">
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
				<form name="Jobs" method="post" action="cient_add.php" onSubmit="return PostSearchForm();" enctype="multipart/form-data">
				<table width="80%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr>
				      <td align="left" class="white_bold">Add/Edit Client/Portfolio </td>
				      <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				    </tr></table>				  </td>
				</tr>
		

		
				
				 <tr class="oddClass">
				   <td><span class="fieldsname">Client Name :</span><font class="red_txt">*</font></td>
				   <td><input name="ClientName" type="text" class="textbox12" value="<?php echo $ClientName; ?>"></td>
				 </tr>
				 
				 <tr class="evanClass">
				   <td><span class="fieldsname">Login-ID :</span><font class="red_txt">*</font></td>
				   <td><input name="LoginID" type="text" class="textbox12" value="<?php echo $LoginID; ?>"></td>
				 </tr>
				 
				 <tr class="oddClass">
				   <td><span class="fieldsname">Password :</span><font class="red_txt">*</font></td>
				   <td><input name="Password" type="text" class="textbox12" value="<?php echo $Password; ?>"></td>
				 </tr>
				
	<tr class="evanClass">
		<td align="left">Add Under Client</td>
		<td>
			<?
				$tempcategory = $SubClient;
				include("clientCombo.php");
			?>
		</td>
   </tr>	 
			  <tr class="oddClass">
			   <td><span class="fieldsname">Description:</span><font class="red_txt"></font></td>
			   <td><TEXTAREA style='width:350' NAME="description" ROWS="4" COLS="40"><?php  echo $description; ?></TEXTAREA></td>
			 </tr>
			<?php /*?><tr class="evenClass">
				   <td class="fieldsname">Client Of :</td>
				  <td><input type="checkbox" name="Kanvas" value="Y"<?php if($Kanvas =="Y") { echo"checked"; }?>>&nbsp;Kanvas&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Imagine" value="Y"<?php if($Imagine =="Y") { echo"checked"; }?>>&nbsp;Imagine&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="Vivid" value="Y"<?php if($Vivid =="Y") { echo"checked"; }?>>&nbsp;Vivid</td>
				  </tr><?php */?>	 
			 <tr class="oddClass">
				   <td><span class="fieldsname">Added Date :</span><font class="red_txt"></font></td>
				   <td><input name="addeddate" id="demo2" type="text" class="textbox12" value="<?php echo $addeddate; ?>">&nbsp;&nbsp;<a href="javascript:NewCal('demo2','MMDDYYYY',false,24)"><img src="../includes/plugins/DateTime/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
				 </tr>
				 
				 <tr class="oddClass">
				   <td><span class="fieldsname">Logo :</span></td>
				   <td><input type="file" name="UploadFile" size="27"></td>
				 </tr>
				 
		<?php /*?>		 <tr class="evanClass">		
		<td nowrap class="MaintTableHeading1">Portfolio Images</td>
		<td colspan="2" nowrap><table><tbody id="files-root">
		<tr class="evanClass">
		<td colspan="2"></td></tr>
		</tbody></table>		</td></tr>
		
		<tr class="evanClass">
		
		<td colspan="2"><span onClick="addFile()" style="cursor:pointer;">Add More Images...</span>
		</td>
		</tr>	<?php */?>			 
								
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
				  <input type="hidden" name="ClientId" value="<?php echo $ClientId;?>">
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
