<?php 
include_once"../includes/midas.inc.php"; 
validate_admin();
if($_POST['flag']=="yes") {
@extract($_REQUEST);
		if($CategoryID!='') 
		{
			$sqlCheck="select * from imp_job_category where CategoryName ='$CategoryName' and CategoryID!='$CategoryID'";				 				            $rsCheck=executeQuery($sqlCheck);
			if(mysql_num_rows($rsCheck)==0)
			{								
				$sqlUpdate="update imp_job_category set CategoryName ='$CategoryName', Status='$Status',SortOrder ='$SortOrder', IsDefaultCat='$IsDefaultCat' where CategoryID='$CategoryID'";
				
				$rsUpdate=executeQuery($sqlUpdate);
				$sess_msg=$sitemsgs[16];
				$_SESSION['sessionMsg']=$sess_msg;
				?>
				<script language="javascript">
				location.href="jobcat_list.php";
				</script>
				<?php 
				header("location: jobcat_list.php");
				exit;
			} 
			else  
			{ 
				$sess_msg=$sitemsgs[15];
				$_SESSION['sessionMsg']=$sess_msg;
				@extract($_POST);
				
			}
		}
		else 
		{
			$sqlCheck="select * from  imp_job_category  where CategoryName =\"$CategoryName\"";	
			$rsCheck=executeQuery($sqlCheck);
				if(mysql_num_rows($rsCheck)==0)
				{
					$sqlInsert="INSERT INTO imp_job_category (CategoryID, CategoryName, Status, SortOrder, IsDefaultCat, Image) VALUES ('', '$CategoryName', '$Status', '$SortOrder' ,'$IsDefaultCat', '$imageName1')";
					$rsInsert=executeQuery($sqlInsert);
					$sess_msg=$sitemsgs[14];
					$_SESSION['sessionMsg']=$sess_msg;
					?>
				<script language="javascript">
				   location.href="jobcat_list.php";
				</script>
				<?php 
					header("location: jobcat_list.php");
					exit;
				}
				else
				 {
				  $sess_msg=$sitemsgs[15];
				  $_SESSION['sessionMsg']=$sess_msg;
				  @extract($_POST);
				}
		    }
        }
if(isset($CategoryID))
{
	$db_query="select * from imp_job_category  where CategoryID='".$CategoryID."'";
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

if(document.form1.CategoryName.value=='')
 {
  alert("Please Enter Category Name ");
  document.form1.CategoryName.focus();
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
                <TD class=blueheading align=left width="56%">Job Categories Info </TD>
					<td width="41%" align="right"><a href="jobcat_list.php">
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
				<form name="form1" method="post" action="jobcat_add.php" onSubmit="return post_search();">
				<table width="80%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr>
				      <td align="left" class="white_bold">Add/Edit Job Categories</td>
				      <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				    </tr></table>				  </td>
				</tr>
		
		
				
				
				
				<tr class="oddClass">
				  <td><span class="fieldsname">Category Name:</span><font class="red_txt">*</font></td>
				  <td><input name="CategoryName" type="text" class="textbox12" value="<?php echo $CategoryName; ?>"></td></tr>
								
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
				  <input type="hidden" name="CategoryID" value="<?php echo $CategoryID;?>">
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
