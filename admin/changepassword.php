
<?php include_once"../includes/midas.inc.php"; 
validate_admin();
if($_POST['change']=="yes") 
  {
// 
$error='';
$SqlCheck1="select * from imp_admin where adm_login_id='$_POST[adm_login_id]' and adm_password='$_POST[password]'";
$resultCheck1=$contact->Execute($SqlCheck1) or die($contact->ErrorMsg());
$CountCheck1=$resultCheck1->RecordCount(); 
if($CountCheck1==0)
 $errorcheck='invalid';

if($error=='') 
 {
    $SqlUpdate="update imp_admin set adm_password='$_POST[repassword]' , adm_conpwd='$_POST[repassword]' where adm_id='$_SESSION[ses_userid]'";
	$resultUpdate=$contact->Execute($SqlUpdate) or die($contact->ErrorMsg());
	
	$done='yes';
 }

?>
<?php
  }
$sqlCheck="select * from imp_admin where adm_id='$_SESSION[ses_userid]' ";
$rsCheck=$contact->Execute($sqlCheck) or die($contact->ErrorMsg());
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0049)http://69.61.15.150/~dish/admin/admin_desktop.php -->
<HTML><HEAD><TITLE><?php echo $title_message;?></TITLE>
<script language="javascript" src="js/validation.js"></script>


<script language=javascript>
function PostSearchForm()
{
   	if(document.form1.adm_login_id.value=="")
	{
		alert("Please Enter Username Name !!");
		document.form1.adm_login_id.focus();
		return false;
	}
	if(document.form1.password.value=="")
	{
		alert("Please Enter Password !!");
		document.form1.password.focus();
		return false;
	}
	
	if(document.form1.Newpassword.value=="")
	{
		alert("Please Enter New Password !!");
		document.form1.Newpassword.focus();
		return false;
	}
	if(document.form1.Repassword.value=="")
	{
		alert("Please Enter Confirm Password !!");
		document.form1.Repassword.focus();
		return false;
	}
	
	if(document.form1.Repassword.value!=document.form1.Newpassword.value)
	{
		alert("Please Enter Currect Confirm Password !!");
		
		document.form1.Repassword.focus();
		return false;
	}
	return true;
}
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
                <TD width="2%"><IMG height=17 alt="" 
                  src="images/orangebullet.gif" width=17 
                vspace=3></TD>
                <TD class=blueheading align=left width="98%">Change Password </TD>
				
					<!--<td width="41%" align="right"><a href="city_view.php">
					<img src="images/return_back.gif" border="0"></a></td>-->
              </TR></TBODY></TABLE></TD></TR>
        <TR>
          <TD vAlign=top align=middle bgColor=#ffffff>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
               
              <TR>
                <TD align=center>&nbsp;</TD>
              </TR>
              <TR>
                <TD align=center><?php 
				   
				   if($errorcheck=='invalid')
				      {
					   ?>
					  <font color="#FF0000"><strong> Please Enter currect your old password !! </strong></font>
					 <?php 
					  }
				     
					   if($done=='yes')
				      {
					   ?>
					  <font color="#FF0000"><strong> Your Password Change Successfully !!  New Password is [<?php echo $_POST[repassword]; ?>] </strong></font>
					 <?php 
					  }
					 
					
				
				//echo display_session_msg();?></TD>
              </TR> <TR>
                <TD align=center>&nbsp;</TD>
              </TR>
              <TR>
                <TD height=260 align=left valign="top">
<form name="form1" method="post" action="changepassword.php"  onSubmit="return PostSearchForm();">
				<table width="80%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr>
				      <td align="left" class="white_bold">Change Password</td>
				      <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				    </tr></table>				  </td>
		
			
				  <tr class="oddClass">
				  <td><span class="fieldsname"><strong>UserName: </strong></span><font class="red_txt">*</font></td>
				  <td><input name="adm_login_id" type="text"  value="<?php echo $rsCheck->fields[adm_login_id]; ?>"></td></tr>
								
							
				  <tr class="evanClass">
				  <td><span class="fieldsname"><strong>Password: </strong></span><font class="red_txt">*</font></td>
				  <td><input name="password" type="password" ></td></tr>
				  
				   <tr class="oddClass">
				  <td><span class="fieldsname"><strong>New Password:</strong></span><font class="red_txt">*</font></td>
				  <td><input name="	newpassword" type="password" ></td></tr>
							
				<tr class="oddClass">
				  <td><span class="fieldsname"><strong>	Re-Type New Password:</strong></span><font class="red_txt">*</font></td>
				  <td><input name="repassword" type="password" ></td></tr>
								
				<input type="hidden" value="yes" name="change" >
				  
				  
				<tr class="evanClass">
				 
				  <td colspan="6" align="center">
				 <!-- <input type="hidden" name="flag" value="yes">-->
				<input name="submit" type="submit" class="submitbutton" value="Submit"> &nbsp; &nbsp; 
				<input type="reset" name="reset" value="Reset" class="submitbutton">
				  </td>
				  </tr>
				</table>	</form>			</TD>
              </TR>
              <TR>
        <TD 
    align=left>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD>&nbsp;</TD></TR></TBODY></TABLE></td></tr></table>
<?php include("bottom.inc.php");?></BODY></HTML>