<?php include"includes/header_user.php";
session_start(); 
include("includes/auth.php");
include_once('includes/midas.inc.php');
$userID=$_SESSION['session_user'];  
 $cmsimp="select * from imp_customer where user_loginid='$userID'";
$cmsSql=mysql_query($cmsimp);

$CmsRow=mysql_fetch_array($cmsSql);
?>

<div class="inner_bg">
<div class="header"><img src="images/aboutus_top_line.jpg" /><br />
<div class="middle_top"><a href="index.php">Home</a> >> <a href="memberhome.php">User Home </a></div>
<br /><img src="images/aboutus_top_line.jpg" /></div>
<?php /*?><div class="header"><img src="images/aboutus_top_line.jpg" /><br />
<div class="header"><img src="images/aboutus_top_line.jpg" /><br /><div class="middle_top"><a href="index.php">Home</a> >> <a href="memberhome.php">Member Home</a></div><div class="middle_top1"><a href="uservideo.php">Videos</a><a href="userfile.php">Files</a><a href="logout.php">Logout</a></div>
<br /><img src="images/aboutus_top_line.jpg" /></div>
<br /><img src="images/aboutus_top_line.jpg" /></div><?php */?>
<?php include"includes/left_user_menu.php"; ?>
<div class="userhome"><div class="user_home"><div class="user_home_h1">Welcome To <?php echo strtoupper($RowsUser['user_fname']).' '.strtoupper($RowsUser['user_lname']);?></div><div class="user_home_h2"><a href="memberhome.php">Back</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php">Logout</a></div>
</div>
</div>
<div class="form_table"><div class="user_home_"><div class="user_icon"><div class="user_icon_1"><img src="images/user_home.jpg" /></div><div class="user_icon_2"><a href="#">User Home</a></div>
</div>
<div class="user_icon"><div class="user_icon_1"><img src="images/user_video.jpg" /></div><div class="user_icon_3"><a href="uservideo.php">User Video</a></div>
</div>
<div class="user_icon"><div class="user_icon_1"><img src="images/user_files.jpg" /></div><div class="user_icon_3"><a href="userfile.php">User Files</a></div>
</div>
<div class="user_icon"><div class="user_icon_1"><img src="images/view_profile.jpg" /></div><div class="user_icon_3"><a href="editprofile.php">View Profile</a></div>
</div>
<div class="user_icon"><div class="user_icon_1"><img src="images/changepassword.jpg" /></div><div class="user_icon_4"><a href="changepassword.php">Change Password</a></div>
</div>
</div>
</div>
</div>
<?php include"includes/footer.php"; ?>