<?php include"includes/header_user.php";?>
<script language=javascript>


function PostSearchForm()
{

 if(document.form1.loginid.value=="")
	{
		alert("Please Enter Login id");
		document.form1.loginid.focus();
		return false;
	}
		if(document.form1.password1.value=="")
	{
		alert("Please Enter Password");
		document.form1.password1.focus();
		return false;
	}
	if(document.form1.newpassword.value=="")
	{
		alert("Please Enter New password");
		document.form1.newpassword.focus();
		return false;
	}
		if(document.form1.repassword.value=="")
	{
		alert("Please Enter Re-password");
		document.form1.repassword.focus();
		return false;
	}
	if(document.form1.newpassword.value!=document.form1.repassword.value)
	{
		alert("Password Mismatch Please Enter Again.");
		document.form1.repassword.focus();
		return false;
	}
       
	return true;
}

</script>
<?php 

if($_POST['change']=="yes") 
  {
// 
extract($_REQUEST);
$error='';
	
$SqlCheck1="select * from imp_customer where user_loginid='$_POST[loginid]' and user_passwd='$_POST[password1]'";
$resultCheck1=$contact->Execute($SqlCheck1) or die($contact->ErrorMsg());
$CountCheck1=$resultCheck1->RecordCount(); 
if($CountCheck1==0)
 $errorcheck='invalid';

if(($error=='') && ($errorcheck!='invalid')) 
 {
    $SqlUpdate="update imp_customer set user_passwd='$_POST[newpassword]' where user_loginid='$_SESSION[session_user]'";
	$resultUpdate=$contact->Execute($SqlUpdate) or die($contact->ErrorMsg());
	
	$done='yes';
	?>
	<script language="javascript">
	alert("Password chaged successfully.");
	location.href="memberhome.php";
	</script>
	<?php
 }

?>
<?php
  }
$sqlCheck=mysql_query("select * from imp_customer where user_loginid='$userID'") or die(mysql_error());
$rsCheck=mysql_fetch_array($sqlCheck);
 //echo"==".mysql_num_rows($sqlCheck);

?>

<div class="header"><img src="images/contactus_header.jpg" /></div>
<div class="inner_bg">

<div class="header"><img src="images/aboutus_top_line.jpg" /><br />
<div class="middle_top"><a href="memberhome.php">Home</a> >> <a href="editprofile.php">Edit Profile</a></div>
<br /><img src="images/aboutus_top_line.jpg" /></div>
<?php include"includes/left_user_menu.php" ?>
<div class="userhome"><div class="user_home"><div class="user_home_h1">Welcome To <?php echo strtoupper($RowsUser['user_fname']).' '.strtoupper($RowsUser['user_lname']);?></div><div class="user_home_h2"><a href="memberhome.php">Back</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php">Logout</a></div>
</div>
</div>
<div class="aboutus_content_h3">Change Password </div>

<div class="form_table"><div class="changepassword"><img src="images/change_password.jpg" width="648" height="51" /></div>
<div class="changepassword_bg"><div class="changepassword_h1">Make the desired change to your <b>account Information :</b></div>
 <form name="form1" enctype="multipart/form-data" method="post" action="changepassword.php" onSubmit="return PostSearchForm();"><div class="changepassword1">
  <div class="changepassword_h2">
    <div class="changepassword_h3">Login-Id :<span class="style1">*</span></div>
    <div class="changepassword_h4">
  <input name="loginid" type="text" class="changepassword_textfield" value="<?php echo $rsCheck[user_loginid]; ?>" />
</div></div>

<div class="changepassword_h2"><div class="changepassword_h3">Old Password:<span class="style1">*</span> </div>
<div class="changepassword_h4">
  <input name="password1" type="password"  class="changepassword_textfield" />
</div></div>

<div class="changepassword_h2"><div class="changepassword_h3">New Password:<span class="style1">*</span> </div>
<div class="changepassword_h4">
  <input name="newpassword" type="password"  class="changepassword_textfield" />
</div></div>
<div class="changepassword_h2"><div class="changepassword_h3">Re-type Password:<span class="style1">*</span> </div>
<div class="changepassword_h4">
  <input name="repassword" type="password"  class="changepassword_textfield" />
</div></div>
<div class="changepassword_h2">
  <div class="submit"><input type="hidden" name="change" value="yes" />
 <input type="image" src="images/submit.jpg" border="0" />
</div></div>

</div></form>
 </div><div class="changepassword"><img src="images/change_password_bottom.jpg" /></div></div>
 
</div>


 </div>
</div>
</div></div>
<?php include"includes/footer.php" ?>