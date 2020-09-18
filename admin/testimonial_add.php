<?php 
include_once"../includes/midas.inc.php"; 
validate_admin();
if($_POST['flag']=="yes") {
@extract($_POST);
		if($TestimonialId!='') 
		{
		if(trim($_FILES['m_pic']['name'])!="")//if image given
		{
		print_r($_FILES);
		//exit;
					$uniq=time()+10;
					$imageName1 = $uniq."_".trim($_FILES['m_pic']['name']);
					if (!copy ($_FILES['m_pic']['tmp_name'], "../uploaded_files/new_photo/".$imageName1)) 
					$error="upload";
			}
		 $sqlUpdate="update imp_testimonialtitle set TestimonialTitle = \"".trim(addslashes(stripslashes($title)))."\", TestimonialDescription = \"".trim(addslashes(stripslashes($content)))."\", TestimonialNumber ='$number', ClientName =\"".trim(addslashes(stripslashes($ClientName)))."\", URL='$URL', City='$City', State='$State',Country='$Country', Category='$Category', Featured='$Featured', Status='$Status'";
	
	if (trim($_FILES['m_pic']['name']) != "")//if image given
		     $sqlUpdate.=" , Photo='$imageName1'";
	 	     $sqlUpdate.=" where TestimonialId = '$TestimonialId'";
				
				$rsUpdate=executeQuery($sqlUpdate);
				$sess_msg=$sitemsgs[16];
				$_SESSION['sessionMsg']=$sess_msg;
				?>
				<script language="javascript">
				location.href="testimonial_list.php";
				</script>
				<?php 
				header("location: testimonial_list.php");
				exit;
			
		  }
	    else 
		 {  
		 if(trim($_FILES['m_pic']['name'])!="")//if image given
		{
					$uniq=time()+10;
					$imageName1 = $uniq."_".trim($_FILES['m_pic']['name']);
					if (!copy ($_FILES['m_pic']['tmp_name'], "../uploaded_files/new_photo/".$imageName1)) 
					$error="upload";
			} 
			     	$title=htmlentities($title);
					$ClientName=htmlentities($ClientName);  //  \"".trim(addslashes(stripslashes($content)))."\"
					$content=htmlentities($content);
					echo $sqlInsert="insert into imp_testimonialtitle (TestimonialTitle, TestimonialDescription, TestimonialDate,TestimonialNumber,ClientName, URL, City, State, Country, Photo, Category, Featured, Status) values (\"".trim(addslashes(stripslashes($title)))."\", \"".trim(addslashes(stripslashes($content)))."\", '$currentdate', '$number', \"".trim(addslashes(stripslashes($ClientName)))."\",'$URL', '$City', '$State', '$Country', '$imageName1', '$Category', '$Featured', '$Status')";
					$rsInsert=executeQuery($sqlInsert);
					$sess_msg=$sitemsgs[14];
					$_SESSION['sessionMsg']=$sess_msg;
					?>
				<script language="javascript">
				  location.href="testimonial_list.php";
				</script>
				<?php 
					//header("location: testimonial_list.php");
					exit;
				
		}
		
}

if(isset($TestimonialId))
{
	$db_query="select * from imp_testimonialtitle where TestimonialId='".$TestimonialId."'";
	$rsResult=executeQuery($db_query);
	$arr_total=mysql_fetch_array($rsResult);
	@extract($arr_total);
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE><?php echo $title_message;?></TITLE>
<script language="javascript" src="js/validation.js"></script>
<script language="javascript">
function post_search()
{

var emailID=document.form1.remail
//var x = document.form1.Mobile.value
   	
	
	
	if(document.form1.title.value=='')
	{
		alert("Please Enter title ");
		document.form1.title.value='';
		document.form1.title.focus();
		return false;
	}
if(document.form1.ClientName.value=='')
	{
		alert("Please Enter Client Name");
		document.form1.ClientName.value='';
		document.form1.ClientName.focus();
		return false;
	}
	if(document.form1.URL.value=='')
	{
		alert("Please Enter URL ");
		document.form1.URL.value='';
		document.form1.URL.focus();
		return false;
	}
	if(document.form1.City.value=='')
	{
		alert("Please Enter City ");
		document.form1.City.value='';
		document.form1.City.focus();
		return false;
	}

	return true;
}


 //CityID
 </script>
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
                <TD class=blueheading align=left width="56%">Testimonial Info </TD>
					<td width="41%" align="right"><a href="testimonial_list.php">
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
				<form name="form1" method="post" action="testimonial_add.php" onSubmit="return post_search()"; enctype="multipart/form-data">
				<table width="80%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr>
				      <td align="left" class="white_bold">Add/Edit Testimonial </td>
				      <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				    </tr></table>				  </td>
				</tr>
		
			
				<tr class="oddClass">
				  <td><span class="fieldsname">Current Date:</span></td>
				  <td>  <?php echo date('m-d-Y');?> </td></tr>
				
	
				
				<tr class="oddClass">
				  <td><span class="fieldsname">Testimonial Title :</span><font class="red_txt">*</font></td>
				  <td><input name="title" type="text" class="textbox12" value="<?php echo $TestimonialTitle; ?>"></td></tr>
				  
				 <tr class="oddClass">
				  <td><span class="fieldsname">Client Name :</span><font class="red_txt">*</font></td>
				  <td><input name="ClientName" type="text" class="textbox12" value="<?php echo $ClientName; ?>"></td></tr> 
				  
				  <tr class="oddClass">
				  <td><span class="fieldsname">URL :</span><font class="red_txt">*</font></td>
				  <td><input name="URL" type="text" class="textbox12" value="<?php echo $URL; ?>"> [Must begin with http://] </td>                  </tr> 
				
				 <tr class="oddClass">
				  <td><span class="fieldsname">City :</span></td>
				  <td><input name="City" type="text" class="textbox12" value="<?php echo $City; ?>"> </td></tr> 
				  
				  <tr class="oddClass">
				  <td><span class="fieldsname">State :</span></td>
				  <td><input name="State" type="text" class="textbox12" value="<?php echo $State; ?>"> </td></tr> 
			
			  <tr class="oddClass">
				  <td><span class="fieldsname">Country :</span></td>
				  <td><input name="Country" type="text" class="textbox12" value="<?php echo $Country; ?>"> </td></tr> 
			
			
			  <tr class="oddClass">
				  <td><span class="fieldsname">Sort Order :</span></td>
				  <td><input name="number" type="text" class="textbox12" value="<?php echo $TestimonialNumber; ?>"> </td></tr> 
				  
			   <tr class="oddClass">
				  <td><span class="fieldsname">Message:</span></td>
				  <td>
				   
				   <TEXTAREA NAME="content" ROWS="12" COLS="50"><?php echo $TestimonialDescription; ?></TEXTAREA>
				   
				   
				   </td>
				  </tr> 	  
			
			   <!-- <tr class="oddClass">
				  <td><span class="fieldsname">Featured :</span></td>
				  <td><input type="checkbox" name="Featured" value="Y"<?php //if($Featured=='Y')echo"checked";?>> </td></tr>-->
				  
				  <tr class="oddClass">
				  <td><span class="fieldsname">Testimonial Image :</span></td>
				  <td><input type="file" name="m_pic" value=""></td></tr>
				  <?php if($Photo!='')
				  {
				  ?>
				  <tr class="oddClass">
				  <td><span class="fieldsname">Image :</span></td>
				  <td><img src="../uploaded_files/new_photo/<?php echo $Photo; ?>" height="80" width="200" ></td></tr>
				  <? } ?>
				

		
								
				<tr class="oddClass"> 
				  <td class="fieldsname">Status</td>
				  <td>
				  <select name="Status" class="list_menu_status">
				    <option value="Y" <?php if($Status =="Y") { echo"selected"; }?>>Active</option>
				    <option value="N" <?php if($Status =="N") { echo"selected"; }?>>InActive</option>
				  </select></td>
				  </tr>
				  
				<tr class="evanClass">
				  <td>&nbsp;</td>
				  <td>
				  <input type="hidden" name="flag" value="yes">
				  <input type="hidden" name="TestimonialId" value="<?php echo $TestimonialId;?>">
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
