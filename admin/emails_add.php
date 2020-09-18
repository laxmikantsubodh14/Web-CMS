<?php include_once"../includes/midas.inc.php"; 
validate_admin();
if($_POST['flag']=="yes") {
@extract($_REQUEST);
$error='';
		if($EMAIL_ID!='') 
		{
							 			
			if(checkUniquenessOfString1('imp_emails','EMAILS',$EMAILS,'EMAIL_ID' ,$EMAIL_ID))
            $error="duplicate";
			if($error=='')
			{								
				$sqlUpdate="update imp_emails  set  EMAILS='$EMAILS',APPROVE='$APPROVE'  where EMAIL_ID='$EMAIL_ID'";
				//$result_rsUpdate = mysql_query($sqlUpdate) or die(mysql_error());
				$result_rsUpdate=$contact->Execute($sqlUpdate) or die($contact->ErrorMsg());
				
				$sess_msg=$sitemsgs[28];
				$_SESSION['sessionMsg']=$sess_msg;
				?>
				<script language="javascript">
				  location.href="emails_list.php";
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
			if(checkUniquenessOfString('imp_emails','EMAILS',$EMAILS))
				    $error='duplicate';		
				if($error=='')
				{
					$sqlInsert="insert into imp_emails (EMAILS,APPROVE)
					values('".$EMAILS."', '".$APPROVE."')";
				     //$rsInsert=mysql_query($sqlInsert) or die($contact->ErrorMsg());
					 $rsInsert=$contact->Execute($sqlInsert) or die($contact->ErrorMsg());
					$sess_msg=$sitemsgs[26];
					$_SESSION['sessionMsg']=$sess_msg;
					?>
				<script language="javascript">
				location.href="emails_list.php";
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

if(isset($EMAIL_ID))
{
	$sqlBid="select * from  imp_emails  where EMAIL_ID='".$EMAIL_ID."'";
	$recordSet=$contact->Execute($sqlBid) or die($contact->ErrorMsg());
    $NumRecords=$recordSet->RecordCount();
	//@extract($arrB);
}

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0049)http://69.61.15.150/~dish/admin/admin_desktop.php -->
<HTML><HEAD><TITLE><?php echo $title_message;?></TITLE>
<script language="javascript" src="js/validation.js"></script>

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
                <TD class=blueheading align=left width="56%">Emails </TD>
				
					<td width="41%" align="right"><a href="emails_list.php">
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
<form name="form1" method="post" action="emails_add.php" onSubmit="return valid_mail('form1');">
				<table width="80%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr>
				      <td align="left" class="white_bold">Add/Edit Details </td>
				      <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				    </tr></table>				  </td>
			
				  <tr class="oddClass">
				  <td><span class="fieldsname"> EMAILS:</span><font class="red_txt">*</font></td>
				  <td><input name="EMAILS" type="text"  value="<?php echo $recordSet->fields['EMAILS']; ?>"></td></tr>
								
								
								
				<tr class="oddClass">
				  <td class="fieldsname">Status</td>
				  <td>
				  <select name="APPROVE" class="list_menu_status">
				    <option value="Y" <?php if($recordSet->fields['APPROVE'] =="Y") { echo"selected"; }?>>Active</option>
				  <option value="N" <?php if($recordSet->fields['APPROVE'] =="N") { echo"selected"; }?>>InActive</option>
				  </select></td>
				  </tr>
				  
				  
				<tr class="evanClass">
				  <td>&nbsp;</td>
				  <td>
				  <input type="hidden" name="flag" value="yes">
				  <input type="hidden" name="EMAIL_ID" value="<?php echo $_REQUEST['EMAIL_ID'];?>">
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














