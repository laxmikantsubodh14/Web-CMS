<?php include"includes/header_user.php";
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
<div class="changepassword1">
  <div class="changepassword_h2">
    <div class="changepassword_h3">Login-Id :<span class="style1">*</span></div>
    <div class="changepassword_h4">
  <input name="Input" type="text" class="changepassword_textfield" />
</div></div>

<div class="changepassword_h2"><div class="changepassword_h3">Old Password:<span class="style1">*</span> </div>
<div class="changepassword_h4">
  <input name="Input" type="text" class="changepassword_textfield" />
</div></div>

<div class="changepassword_h2"><div class="changepassword_h3">New Password:<span class="style1">*</span> </div>
<div class="changepassword_h4">
  <input name="Input" type="text" class="changepassword_textfield" />
</div></div>
<div class="changepassword_h2"><div class="changepassword_h3">Re-type Password:<span class="style1">*</span> </div>
<div class="changepassword_h4">
  <input name="Input" type="text" class="changepassword_textfield" />
</div></div>
<div class="changepassword_h2">
  <div class="submit">
  <a href="#"><img src="images/submit.jpg" border="0" /></a>
</div></div>

</div>
 </div><div class="changepassword"><img src="images/change_password_bottom.jpg" /></div></div>
 
</div>


 </div>
</div>
</div></div>
<?php include"includes/footer.php" ?>