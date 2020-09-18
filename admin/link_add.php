<?php 
include_once"../includes/midas.inc.php"; 
validate_admin();
if($_POST['flag']=="yes") {
@extract($_REQUEST);
$error='';
		if($LinkId!='') 
		{
			$sqlCheck="select * from imp_link where LinkUrl ='$LinkUrl' and LinkId!='$LinkId'";				 				            $rsCheck=executeQuery($sqlCheck);
			if(mysql_num_rows($rsCheck)==0)
			{								
				$sqlUpdate="update imp_link  set LinkTitle='$LinkTitle',LinkUrl='$LinkUrl',LinkCategory='$LinkCategory',LinkDescription='$LinkDescription',LinkAddedDate='$LinkAddedDate',Status='$Status' where LinkId='$LinkId'";
				$result_rsUpdate = executeQuery($sqlUpdate);
				
				$sess_msg=$sitemsgs[28];
				$_SESSION['sessionMsg']=$sess_msg;
				?>
				<script language="javascript">
				location.href="link_view.php";
				</script>
				<?php 
			
				exit;
			} 
			else  
			{ 
				$sess_msg=$sitemsgs[27];
				$_SESSION['sessionMsg']=$sess_msg;
				@extract($_POST);
				
			}
		}
		else 
		{
			    $sqlCheck="select * from imp_link where LinkUrl ='$LinkUrl'";	
			    $rsCheck=executeQuery($sqlCheck);
				if(mysql_num_rows($rsCheck)==0)
				{
					$sqlInsert="insert into imp_link (LinkTitle,LinkUrl,LinkCategory,LinkDescription,LinkAddedDate,Status)
					values('".$LinkTitle."','".$LinkUrl."','".$LinkCategory."','".$LinkDescription."','".$LinkAddedDate."', '".$Status."')";
				     $rsInsert=executeQuery($sqlInsert);
					$sess_msg=$sitemsgs[26];
					$_SESSION['sessionMsg']=$sess_msg;
					?>
				<script language="javascript">
				location.href="link_view.php";
				</script>
				<?php 
					
					exit;
				}
				else
				{
					$sess_msg=$sitemsgs[27];
					$_SESSION['sessionMsg']=$sess_msg;
					@extract($_POST);
				
				}
		}
		
}

if(isset($LinkId))
{
	$sqlBid="select * from  imp_link where LinkId='".$LinkId."'";
	$rsBid=executeQuery($sqlBid);
	$arrB=mysql_fetch_array($rsBid);
	@extract($arrB);
}

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0049)http://69.61.15.150/~dish/admin/admin_desktop.php -->
<HTML><HEAD><TITLE><?php echo $title_message;?></TITLE>
<script language="javascript" src="js/validation.js"></script>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1"><LINK 
href="css/css.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<script language=javascript>
function PostSearchForm()
{
if(document.form1.LinkCategory.value=='')
	{
		alert("Please Enter Category");
		document.form1.LinkCategory.value='';
		document.form1.LinkCategory.focus();
		return false;
	}
if(document.form1.LinkTitle.value=='')
	{
		alert("Please Enter Title Name");
		document.form1.LinkTitle.value='';
		document.form1.LinkTitle.focus();
		return false;
	}
	if(document.form1.LinkUrl.value=='')
	{
		alert("Please Enter Url");
		document.form1.LinkUrl.value='';
		document.form1.LinkUrl.focus();
		return false;
	}
 if(document.form1.Description.value=="")
	{
		alert("Please Enter Description");
		document.form1.Description.value='';
		document.form1.Description.focus();
		return false;
	}
	
		
	if(document.form1.LinkAddedDate.value=="")
	{
		alert("Please Enter AddedDate");
		document.form1.LinkAddedDate.value='';
		document.form1.LinkAddedDate.focus();
		return false;
	}
	if(document.form1.Status.value=="")
	{
		alert("Please Enter Your Status");
		document.form1.Status.value='';
		document.form1.Status.focus();
		return false;
	}
	
	
	
	return true;
}


</script>

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
                <TD class=blueheading align=left width="56%">Link Info </TD>
				
					<td width="41%" align="right"><a href="link_view.php">
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
<form name="form1" method="post" action="link_add.php" onSubmit='return PostSearchForm();'>
				<table width="80%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr>
				      <td align="left" class="white_bold">Add/Edit Details </td>
				      <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				    </tr></table>				  </td>
					  			  
				  <tr class="oddClass">
				  <td><span class="fieldsname"><strong>Category:</strong></span><font class="red_txt">*</font></td>
				  <td><select name="LinkCategory">
				      <option value="">:: Select ::</option>
					  <?php
					   $regionSql=mysql_query("select * from imp_link_category where Status='Y' order by CatID");
					   while($regionRow=mysql_fetch_array($regionSql)){
					  ?>
					  <option value="<?php echo $regionRow['CatID'];?>"<?php if($regionRow['CatID']==$LinkCategory)echo"selected";?>><?php echo $regionRow['Category'];?></option>
					  <?php }?>
					  
					  
				      </select>
				  </td></tr>
				  
				  <tr class="evanClass">
				  <td><span class="fieldsname"><strong>Link Title:</strong></span><font class="red_txt">*</font></td>
				  <td><input name="LinkTitle" type="text"  value="<?php echo $LinkUrl; ?>"></td></tr>
							
							<tr class="oddClass">
				  <td><span class="fieldsname"><strong>Link Url:</strong></span><font class="red_txt">*</font></td>
				  <td><input name="LinkUrl" type="text"  value="<?php echo $LinkUrl; ?>"></td></tr>
				  <tr class="evanClass">
				  <td><span class="fieldsname"><strong>Description:</strong></span><font class="red_txt">*</font></td>
				  <td><input name="LinkDescription" type="text"  value="<?php echo $LinkDescription; ?>"></td></tr>
				  <tr class="oddClass">
				  <td><span class="fieldsname"><strong>Added Date:</strong></span><font class="red_txt">*</font></td>
				  <td><input name="LinkAddedDate" type="text"  value="<?php echo $LinkAddedDate; ?>"></td></tr>
								
								
								
				<tr class="evanClass">
				  <td class="fieldsname"><strong>Status</strong></td>
				  <td>
				  <select name="Status" class="list_menu_status">
				  <option value=""> Status </option>
				  <option value="Y" <?php if($Status=="Y") { echo"selected"; }?>>Active</option>
				  <option value="N" <?php if($Status=="N") { echo"selected"; }?>>InActive</option>
				  </select></td>
				  </tr>
				  
				  
				<tr class="oddClass">
				  <td>&nbsp;</td>
				  <td>
				  <input type="hidden" name="flag" value="yes">
				  <input type="hidden" name="LinkId" value="<?php echo $_REQUEST['LinkId'];?>">
				  <input name="submit" type="image" class="submitbutton" src="images/submit.gif"></td>
				  </tr>
				</table>	</form>			</TD>
              </TR>
              <TR>
        <TD 
    align=left>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD>&nbsp;</TD></TR></TBODY></TABLE></td></tr></table>
<?php include("bottom.inc.php");?></BODY></HTML>














