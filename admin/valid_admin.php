<?php 
include_once"../includes/midas.inc.php"; 
extract($_REQUEST);
$adm_login_id=trim($username_admin);
$adm_password=trim($password_admin);

$sqlCheck="select * from imp_admin where adm_login_id='$adm_login_id' and adm_password='$adm_password' and adm_status='Active'";
$rsCheck=$contact->Execute($sqlCheck) or die($contact->ErrorMsg());
$numCheck=$rsCheck->RecordCount();;

 
  
if($numCheck >0)
{	
	$ses_userid=$rsCheck->fields[adm_id];
	$_SESSION['ses_userid']=$ses_userid;
	$_SESSION['ses_username']=$rsCheck->fields['adm_login_id']; 
	header("location: admin_desktop.php");
	?>
	  <SCRIPT language="JavaScript">
		  location.href='admin_desktop.php';
       </SCRIPT>
	<?php
	exit;

}
else
{
	$sess_msg=$sitemsgs[9];
	$_SESSION['sessionMsg']=$sess_msg;
	  header("location: index.php");
}

 
?>