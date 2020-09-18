<?php include_once"../includes/midas.inc.php"; 
validate_admin();
$AdminId=trim($_REQUEST['adm_id']);
if($_POST['flag']=="yes") {
@extract($_REQUEST);
$error='';
		if($adm_id!='') 
		{
		  	    if(checkUniquenessOfString1('imp_admin','adm_login_id',$adm_login_id,'adm_id' ,$adm_id))
						 { $error='duplicate';
					$sess_msg=$sitemsgs[30];
					$_SESSION['sessionMsg']=$sess_msg;	}
					 if(checkUniquenessOfString1('imp_admin','adm_email',$adm_email,'adm_id' ,$adm_id))
                        { $error="email duplicacy";
						 	$sess_msg=$sitemsgs[29];
					$_SESSION['sessionMsg']=$sess_msg; }
					
				if($error=='')
				{								
					if($Privilege!='')
					  {
					    $pri=implode(',',$Privilege);
					  } 
					$sqlUpdate="update imp_admin set adm_login_id='$adm_login_id', adm_password='$adm_password', adm_conpwd='$adm_conpwd', adm_name='$adm_name', adm_email='$adm_email', adm_phone='$adm_phone', adm_address='$adm_address', adm_city='$adm_city', adm_state='$adm_state', adm_zipcode='$adm_zipcode', adm_privi='$pri', adm_status='$adm_status' where adm_id='$adm_id'";
					$result_Update = $contact->Execute($sqlUpdate) or die($contact->ErrorMsg());
					$sess_msg=$sitemsgs[2];
					$_SESSION['sessionMsg']=$sess_msg;
				
				if($isfranchisee!='Y')
						  {	
							?>
							<script language="javascript">
							    location.href="admin_list.php";
							</script>
						<?php	
						  }
						 else
						 {
						 ?> 
						   <script language="javascript">
							    location.href="franchisee_list.php";
							</script>
						 
						 	
				        <?php 
				        }
				
					//header("location: admin_list.php");
					exit;
				} 
				else  
				{ 
				   //	$sess_msg=$sitemsgs[4];
					//$_SESSION['sessionMsg']=$sess_msg;
					@extract($_POST);
					
				}
		}
		else 
		{
				
				if(checkUniquenessOfString('imp_admin','adm_login_id',$adm_login_id))
				   { $error='duplicate';
					$sess_msg=$sitemsgs[30];
					$_SESSION['sessionMsg']=$sess_msg;	}
				if(checkUniquenessOfString('imp_admin','adm_email',$adm_email))
				  {  $error='email duplicacy';
					$sess_msg=$sitemsgs[29];
					$_SESSION['sessionMsg']=$sess_msg;	}
					
				if($error=='')
				{
					if($Privilege!='') { $pri=implode(',',$Privilege); } 
					
					$sqlInsert="insert into imp_admin (adm_login_id, adm_password, adm_conpwd, adm_name, adm_email, adm_phone, adm_address, adm_city, adm_state, adm_zipcode, adm_privi, adm_status) values ('".$adm_login_id."','".$adm_password."','".$adm_conpwd."','".$adm_name."','".$adm_email."','".$adm_phone."','".$adm_address."','".$adm_city."','".$adm_state."','".$adm_zipcode."','".$pri."','".$adm_status."')";
					$rsInsert=$contact->Execute($sqlInsert) or die($contact->ErrorMsg());			
			
					$sess_msg=$sitemsgs[3];
					$_SESSION['sessionMsg']=$sess_msg;
					?>
							<script language="javascript">
							    location.href="admin_list.php";
							</script>					 	
				        <?php 
					exit;
				}
				else
				{					
					@extract($_POST);
				
				}
		}		
}

if(isset($adm_id))
{
	$query="select * from imp_admin where adm_id='".$adm_id."'";
	$recordSet=$contact->Execute($query) or die($contact->ErrorMsg());
    $NumRecords=$recordSet->RecordCount();;
	
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0049)http://69.61.15.150/~dish/admin/admin_desktop.php -->
<HTML><HEAD><TITLE><?php echo $title_message;?></TITLE>

<!--<script language="javascript" src="js/validation.js"></script>-->

<META http-equiv=Content-Type content="text/html; charset=iso-8859-1"><LINK 
href="css/css.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<script language=javascript>
function PostSearchForm()
{
var emailID=document.form1.adm_email
var x = document.form1.adm_phone.value
   	
	if(document.form1.adm_login_id.value=="")
	{
		alert("Please Enter Login-Id");
		document.form1.adm_login_id.value='';
		document.form1.adm_login_id.focus();
		return false;
	}
	if(document.form1.adm_password.value=="")
	{
		alert("Please Enter Password");
		document.form1.adm_password.value='';
		document.form1.adm_password.focus();
		return false;
	}
		if(document.form1.adm_conpwd.value=="")
	{
		alert("Please Enter Confirm Password");
		document.form1.adm_conpwd.value='';
		document.form1.adm_conpwd.focus();
		return false;
	}
	if((document.form1.adm_conpwd.value) != (document.form1.adm_password.value))
	{

		alert("Password Mismatch!!!");
		document.form1.adm_conpwd.value="";
		document.form1.adm_conpwd.focus();
		return false;
	}
	if ((emailID.value==null)||(emailID.value=="")){
		alert("Please Enter your Email ID")
		emailID.focus()
		return false
	}
	if (echeck(emailID.value)==false){
		emailID.value=""
		emailID.focus()
		return false
	}
	
   if(document.form1.adm_phone.value=="")
	{
		alert("Please Enter Your Phone");
		document.form1.adm_phone.value='';
		document.form1.adm_phone.focus();
		return false;
	}
	if(isNaN(document.form1.adm_phone.value))
	{
		alert("Please Enter Valid Phone ");
		document.form1.adm_phone.value='';
		document.form1.adm_phone.focus();
		return false;
	}
	if(document.form1.adm_address.value=='')
	{
		alert("Please Enter Address");
		document.form1.adm_address.value='';
		document.form1.adm_address.focus();
		return false;
	}

	
	return true;
}
function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    alert("Invalid E-mail ID")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

 		 return true					
	}
</script>

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
                <TD class=blueheading align=left width="56%">Admin Info </TD>
					<td width="41%" align="right"><a href="admin_list.php">
					<img src="images/return_back.gif" border="0" class="submitbutton"></a></td>
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
				
				<form name="form1" method="post" action="<?php echo $PHP_SELF;?>" onSubmit='return PostSearchForm();'>
				<table width="80%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr><td align="left" class="white_bold">Add/Edit Admin/Franchisee</td>
				    <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				    </tr></table>				  </td>   
				</tr>
				<tr class="oddClass"><td><span class="fieldsname"><strong>Login Id:</strong></span><font class="red_txt">*</font></td>
				<td><input name="adm_login_id" type="text" class="textbox12" value="<?php if($_GET['adm_id']!='') { echo $recordSet->fields[adm_login_id]; } else { echo $_REQUEST['adm_login_id']; } ?>"></td></tr>
				<tr class="evanClass">
				  <td><span class="fieldsname"><strong>Password</strong></span><font class="red_txt">*</font></td>
				  <td>
		<input name="adm_password" type="password" class="textbox12" value="<?php if($_GET['adm_id']!='')  { echo $recordSet->fields[adm_password]; } else { echo $_REQUEST['adm_password'];}?>"></td>
				  </tr>
				  
				<tr class="oddClass">
				  <td><span class="fieldsname"><strong>Confirm Password</strong></span><font class="red_txt">*</font></td>
				  <td>
		<input name="adm_conpwd" type="password" class="textbox12" value="<?php if($_GET['adm_id']!='') { echo $recordSet->fields[adm_conpwd]; } else { echo $_REQUEST['adm_conpwd'];}?>"></td>
				  </tr>
				  
				
				  
				 <tr class="evanClass">
				  <td><span class="fieldsname"><strong>Email</strong></span><font class="red_txt">*</font></td>
				  <td><input name="adm_email" type="text" class="textbox12" value="<?php if($_GET['adm_id']!='') { echo $recordSet->fields[adm_email]; } else { echo $_REQUEST['adm_email'];}?>">				  </td></tr>
				 <tr class="oddClass">
				  <td><span class="fieldsname"><strong>Contact no</strong></span><font class="red_txt">*</font></td>
				  <td><input name="adm_phone" type="text" class="textbox12" value="<?php if($_GET['adm_id']!='') { echo $recordSet->fields[adm_phone]; } else { echo $_REQUEST['adm_phone'];} ?>">				  </td></tr>
				  
				<tr class="evanClass">
				  <td><span class="fieldsname"><strong> Address:</strong></span><font class="red_txt">*</font></td>
				 <td><textarea name="adm_address" cols="30" rows="4"><?php if($_GET['adm_id']!='') { echo $recordSet->fields[adm_address] ; } else { echo $_REQUEST['adm_address'];} ?></textarea></td></tr>
				  
				 <tr class="oddClass">
				  <td><span class="fieldsname"><strong>City</strong></span><font class="red_txt">*</font></td>
				  <td><input name="adm_city" type="text" class="textbox12" value="<?php if($_GET['adm_id']!='') {  echo $recordSet->fields[adm_city];  } else { echo $_REQUEST['adm_city'];} ?>">				  </td></tr>
				  
				   <tr class="evanClass">
				  <td><span class="fieldsname"><strong>State</strong></span><font class="red_txt">*</font></td>
				  <td><input name="adm_state" type="text" class="textbox12" value="<?php if($_GET['adm_id']!='')  { echo $recordSet->fields[adm_state];  } else { echo $_REQUEST['adm_state'];} ?>">				  </td></tr>
				  
				   <tr class="oddClass">
				  <td><span class="fieldsname"><strong>Zip code</strong></span><font class="red_txt">*</font></td>
				  <td><input name="adm_zipcode" type="text" class="textbox12" value="<?php if($_GET['adm_id']!='')  { echo $recordSet->fields[adm_zipcode];  } else { echo $_REQUEST['adm_zipcode'];}?>"> </td></tr>
				  
				  

	
				
		<tr class="oddClass">
		  <td><strong><span class="fieldsname">Status</span></strong></td> 
		  <td>
		   <select name="adm_status" class="list_menu_status">
		    <option value="Active" <?php if($recordSet->fields[adm_status]=="Active") { echo"selected"; }?>>Active</option>
			<option value="Inactive" <?php if($recordSet->fields[adm_status]=="Inactive") { echo"selected"; }?>>InActive</option>
		   </select>				  
		  </td>
		</tr>
				
		<tr class="evanClass">
		  <td>&nbsp;</td>
		  <td>
 		   <input type="hidden" name="flag" value="yes">
		   <input type="hidden" name="adm_id" value="<?php echo $_REQUEST['adm_id'];?>">
		   <input name="submit" type="image" class="submitbutton" src="images/submit.gif">
		  </td>
		</tr>
	</table>	
</form>
</TD>
</TR>
              <TR>
        <TD 
    align=left>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD>&nbsp;</TD></TR></TBODY></TABLE>
<?php include("bottom.inc.php");?></BODY></HTML>
