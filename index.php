<?php include"includes/midas.inc.php"; 


if($_POST['flagMail']=='yes')
  {
	
    $email=$_POST['email'];			   
  $sql_email="insert into imp_tempemails (EMAILS, SUBMITTIME) values ('$email', Now())";
  
   $result=mysql_query($sql_email);
	 if(mysql_error()=='')
	 {
		 $msg="suceess";
		 
		 {
		 $email=$_POST['email'];
		 $current=date("Y-m-d");
		
		 $mailstr = "";							
		 $mailstr .= "Date:   $current
		 
		 
		 You Have Successfully Joined Our Newsletter Mailing List as $email";	
		
		 						 							
		 $subject="ImpetusIT ";
		 $headers = "MIME-Version: 1.0\r\n";
		 //$headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
		 $headers.= "From: $email";

		 //$status=mail($email,$subject, $mailstr, $headers);//make it live when site will online
		 }
		 }
	 else
	 {
	   echo mysql_error();	
	   } 
  
 }


//$PAGE_REDIRECT=$_COOKIE["PAGEREDIRECT"];
/****************************************
validate the USER for valid login name and password 
creates the session variables and sets their values. 
****************************************/
if(isset($_POST['submit']))
{
	// get login name and password entered by User
	 
	$sql = "select * from imp_customer  where user_loginid='$email' and user_passwd='$password' and user_isactive='Y'";
	// echo $sql;
	// exit;
     $sql_result_user = mysql_query($sql);
     $row_user = mysql_fetch_array($sql_result_user);
   	//check and proceed if ADMIN is valid
  if(mysql_num_rows($sql_result_user)>0) 
	{
	    $session_user = $row_user['user_loginid'];
		$session_memType = $row_user['user_fname'];
		$member_id= $row_user['user_id'];
        $_SESSION['session_user']=$session_user;
	    $_SESSION['session_memType']=$session_memType;
		$_SESSION['username']=$member_id;
		header('location:memberhome.php');
	/*if($_POST['id']=='' && $PAGE_REDIRECT=='')
		 {
		?>
	 <SCRIPT language="JavaScript">
		location.href='<?php echo $defaultUrl;?>';
     </SCRIPT>
<?php
        }
	   elseif($_POST['id']=='checkout')
	   {
	    ?>
		      <SCRIPT language="JavaScript">
		        location.href='checkout.php';
              </SCRIPT>
		<?php
		}
		else
		 {
	      ?> 
		      <SCRIPT language="JavaScript">
		        location.href="<?php echo $PAGE_REDIRECT; ?>";
              </SCRIPT>
		<?php
		
	   }	*/
	}
	else{
	   $error='Login failed!!! please try again...';

	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script> 


<script>
$(document).ready(function(){ 
	var touch 	= $('#resp-menu');
	var menu 	= $('.menu');
 
	$(touch).on('click', function(e) {
		e.preventDefault();
		menu.slideToggle();
	});
	
	$(window).resize(function(){
		var w = $(window).width();
		if(w > 767 && menu.is(':hidden')) {
			menu.removeAttr('style');
		}
	});
	
});
</script>
<script src="fade_files/jquery.js"></script>
<script>
$(function(){
	$('.fadein img:gt(0)').hide();
	setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
});
</script>

<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js"></script>-->
<script src="js/jcarousellite_1.0.1c4.js" type="text/javascript"></script> 
<script type="text/javascript">
$(function() {
	$(".newsticker-jcarousellite").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 1,
		auto:4000,
		speed:1500
	});
});
</script>	

<script type="text/javascript">
$(function() {
	$(".newsticker-jcarousellite2").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 3,
		auto:4000,
		speed:1500
	});
});
</script>	
    <script type="text/javascript" src="http://web-argument.com/wp-content/uploads/2011/03/jquery-ui-1.8.10.custom.min_.js"></script>
	<script type="text/javascript" src="js/accordionImageMenu-0.4.min.js"></script>
	
    <link href="js/accordionImageMenu.css" rel="stylesheet" type="text/css" />
     
    <script type="text/javascript">
	$(document).ready(function() {
	
		jQuery('#acc-menu2').AccordionImageMenu({
		  'border' : 0,
		  'openItem':5,
		  'duration': 700,
		  'openDim': 500,
		  'closeDim': 160,
		  'effect': 'easeOutQuint',
		  'fadeInTitle': true,
		  'height':280 
		});	
		
	});
    </script>
	
	

<script language="javascript">
function validlogin()
 	{
	if(document.loginfrm.email.value=='')
	{
	alert('Please enter your login id');
	document.loginfrm.email.focus();
	return false;
	}
 	if(document.loginfrm.password.value=='')
	{
	alert('Please enter your passwords');
	document.loginfrm.password.focus();
	return false;
	}
	return true;
	}
</script>
<script language="javascript">
function validate()
 	{
	if(document.form1.email.value=='')
	{
	alert('Please Enter Your Id');
	document.form1.email.focus();
	return false;
	}
 	return true;
	}
</script>
<style>
.fadein { position:relative; height:367px; width:939px; }
.fadein img { position:absolute; left:0; top:0; width:100%; height:350px; }
</style>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> vedantus</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>


<script type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

</head>

<body onload="MM_preloadImages('images/home+rollver.jpg','images/aboutus_rollver.jpg','images/services_rollver.jpg','images/jobseekers_rollver.jpg','images/contact.jpg','images/readmore_rollover.jpg','images/viewall_rollover.jpg','images/news_rollover.jpg')">
<div id="wrapper">
<div class="table_top"><img src="images/table_top_image.jpg" /></div>


<div class="table_bg">
<div id="wrapper1">
    <div class="top_menu"><a href="index.php"><img src="images/logo.png" border="0" /></a></div>
	<div class="sitemap">
<h4> <img src="images/free_s.png" />  <span class="span_c"> Free Support: </span>  +61.470766095</h4>
    <ul class="socail_m">
    <li> <a href="#"><img src="images/fb.png" /></a></li>
     <li> <a href="#"><img src="images/twitter.png" /></a></li>
         <li> <a href="#"><img src="images/google_plus.png" /></a></li>
     <li> <a href="#"><img src="images/linkedin.png" /></a></li>
    </ul>
    </div>
 
    <div class="menubar">
	<link rel="stylesheet" type="text/css" href="chrometheme/chromestyle.css" />

<script type="text/javascript" src="chromejs/chrome.js"></script>

<div class="d" id="d">
<nav> <a id="resp-menu" class="responsive-menu" href="#"><i class="fa fa-reorder"></i> Menu</a>
  <ul class="menu">
    <li><a class="homer" href="index.php"> HOME</a>    </li>
    <li><a  href="about_us.php"> ABOUT US</a>
      <!--<ul class="sub-menu">
        <li><a href="#">Sub-Menu 1</a></li>
        <li><a href="#">Sub-Menu 2</a>
          <ul>
            <li><a href="#">Sub Sub-Menu 1</a></li>
            <li><a href="#">Sub Sub-Menu 2</a></li>
            <li><a href="#">Sub Sub-Menu 3</a></li>
            <li><a href="#">Sub Sub-Menu 4</a></li>
            <li><a href="#">Sub Sub-Menu 5</a></li>
          </ul>
        </li>
        <li><a href="#">Sub-Menu 3</a>
          <ul>
            <li><a href="#">Sub Sub-Menu 1</a></li>
            <li><a href="#">Sub Sub-Menu 2</a></li>
            <li><a href="#">Sub Sub-Menu 3</a></li>
            <li><a href="#">Sub Sub-Menu 4</a></li>
            <li><a href="#">Sub Sub-Menu 5</a></li>
          </ul>
        </li>
      </ul>-->
    </li>
    <li><a  href="services.php"> SERVICES</a>  
<ul class="sub-menu">
        <li><a href="enterprise_Integration.php">Enterprise Integration SOA/BPM/OSB/AIA</a></li>
        <li><a href="portal_and_content_management.php">Portal and Content Management</a></li>
        <li><a href="oracle_adf.php">Oracle ADF</a></li>
        <li><a href="oracle_maf.php">Oracle MAF</a></li>
     

      </ul>
    
    
    
      </li> <li><a  href="career.php"> CAREERS</a></li>
    <li><a  href="sitemap.php"> SITEMAP</a></li>
        <li><a  href="contact_us.php"> CONTACT US</a></li>
 
  </ul>
</nav>
 
</div>
 
 
</div>
    <div class="header_sub"><div class="fadein">
<img style="display: block;" src="images/1.png">
<img style="display: none;" src="images/2.jpg">
<img style="display: none;" src="images/3.jpg">
<img style="display: none;" src="images/4.jpg">
<img style="display: none;" src="images/3.jpg">
</div></div>
<!--<div class="header2">
  <div class="header_content">ImpetusIT, Inc. is a consulting firm specializing in the human capital needs of large and small clients.  We work as a trusted advisor to our clients as well as a strategic supplier to them.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="about_us.php">readmore</a></div>
</div>-->
<div class="header1"><img src="images/header_bottom.jpg" /></div>

    <div class="middle_section">
      <div class="nt_staffing s1">
        <div class="nt_staffing_top">
            <div class="nt_staffing_bg"><?php $dev_sql="select * from imp_static_pages  where page_id='11'";
$dev_result=mysql_query($dev_sql);
$dev_row=mysql_fetch_array($dev_result);  ?>
              <div class="nt_staffing_content">
              <div class="new_sh">
              <img src="images/nt_staffing_icon.jpg"  hspace="5" /><br />
                <?php echo $dev_row['page_name'];?>   </div>
            
<div class="h1"><?php echo $dev_row['page_description'];?></div>
                
<div class="readmore"><a href="enterprise_Integration.php" onmouseout="MM_swapImgRestore()" >Read More</a></div>
</div>
</div> </div>   </div>

<div class="nt_staffing s2">
        <div class="nt_staffing_top">
            <div class="nt_staffing_bg"><?php $dev_sql="select * from imp_static_pages  where page_id='8'";
$dev_result=mysql_query($dev_sql);
$dev_row=mysql_fetch_array($dev_result);  ?>
              <div class="nt_staffing_content">
              <div class="new_sh">
              <img src="images/nt_staffing_icon.jpg"  hspace="5" /><br />
                <?php echo $dev_row['page_name'];?>   </div>
            
<div class="h1"><?php echo $dev_row['page_description'];?></div>
                
<div class="readmore"><a href="portal_and_content_management.php" onmouseout="MM_swapImgRestore()" >Read More</a></div>
</div>
</div>
 
        </div>
      </div>
      
      
      <div class="nt_staffing s3">
        <div class="nt_staffing_top">
            <div class="nt_staffing_bg"><?php $dev_sql="select * from imp_static_pages  where page_id='9'";
$dev_result=mysql_query($dev_sql);
$dev_row=mysql_fetch_array($dev_result);  ?>
              <div class="nt_staffing_content">
              <div class="new_sh">
              <img src="images/nt_staffing_icon.jpg"  hspace="5" /><br />
                <?php echo $dev_row['page_name'];?>   </div>
            
<div class="h1"><?php echo $dev_row['page_description'];?></div>
                
<div class="readmore"><a href="oracle_adf.php" onmouseout="MM_swapImgRestore()" >Read More</a></div>
</div>
</div>

        </div>
      </div>
      
      <div class="nt_staffing s4">
        <div class="nt_staffing_top">
            <div class="nt_staffing_bg"><?php $dev_sql="select * from imp_static_pages  where page_id='72'";
$dev_result=mysql_query($dev_sql);
$dev_row=mysql_fetch_array($dev_result);  ?>
              <div class="nt_staffing_content">
              <div class="new_sh">
              <img src="images/nt_staffing_icon.jpg"  hspace="5" /><br />
                <?php echo $dev_row['page_name'];?>   </div>
            
<div class="h1"><?php echo $dev_row['page_description'];?></div>
                
<div class="readmore"><a href="oracle_maf.php" onmouseout="MM_swapImgRestore()" >Read More</a></div>
</div>
</div>
 
        </div>
      </div>

 
    </div>
    <div class="bottom_middle_section">
      <div class="services"><img src="images/services_icon.jpg" hspace="5" />About Us
        <div class="services_bg_line">
        <img src="images/fmw8.jpg"  />
        
        
        <p><strong>Vedantus Solutions Pty Ltd</strong> is committed to help evolve your business in multiple dimensions and unfold key opportunities to reduce your cost, improve performance, imbibe agility and achieve substantial automation in your Organization. </p> <div class="readmore"><a href="about_us.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image45','','images/readmore_rollover.jpg',1)">Read More </a></div></div>
   
        
		<div class="services_bg_line">&nbsp;</div>
      </div>
      <div class="client"><img src="images/client_icon.jpg" hspace="5"/>Our Testimonial
	  
	    <div class="newsticker-jcarousellite">
						 <div>
	  <ul>
	  <?php 
			   $featureSql2=mysql_query("select * from imp_testimonialtitle where Status='Y' order by TestimonialId desc");
			   while($featureRow2=mysql_fetch_array($featureSql2)){
			  ?>
       <li> <div class="client_image"><img src="uploaded_files/new_photo/<?php echo $featureRow2['Photo'];?>"   height="102"/></div>
        <div class="client_h1"><?php echo $featureRow2['TestimonialTitle'];?></div>
        <div class="client_content"><p> <?php echo substr($featureRow2['TestimonialDescription'],0,120);?></p>
            <br />
          <div class="readmore"><a href="client_test_detail.php?tid=<?php echo $featureRow2['TestimonialId'];?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image45','','images/readmore_rollover.jpg',1)">Read More </a></div>
		  </div></li>
		    <?php }?>
       </ul><br />
</div>
        </div>
		<div class="client_content"><?php /*?><form name="form1" method="post" onsubmit="return validate()" >  <?php if($msg=="suceess"){?> <div class="newsletter">Yuor Massage Is Successfully Sent</div><?php } ?>
	  <div class="newsletter"><img src="images/newsletter.jpg"  />&nbsp;&nbsp;Newsletter<br /><input name="email" type="text" class="login_bg" /><input type="hidden" name="flagMail" value="yes" /> <br /><input type="image" src="images/subscribe.jpg" border="0"  class="subs"/></div></form><?php */?></div> 
      </div>
	  
      <div class="news"><img src="images/news_icon.jpg" hspace="5"  />Our News
	  <div class="space"></div>
	  <?   $featureSql=mysql_query("select * from imp_news where Status='Y' and View='Y' order by NewsId desc");
	        $tot_view_news=mysql_num_rows($featureSql);
			if($tot_view_news>0)
			{
	  ?>
	   <div class="newsticker-jcarousellite">
						 <div>
	  <ul>
	  <?php 
			  
			   while($featureRow=mysql_fetch_array($featureSql)){
			  ?>
        <li><div class="client_image"><img src="uploaded_files/new_photo/<?php echo $featureRow['photo'];?>" height="102"/></div>
		<div class="news_h1"><?php echo $featureRow['addeddate'];?> </div>
        <div class="news_content"> <p> <?php echo substr($featureRow['description'],0,120);?>   </p>       </div>
		  </li>
		  <?php }?>
       </ul><br />
</div></div>

        <div class="readmore"><a  style="font-size:14px" href="newsheading.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image48','','images/news_rollover.jpg',1)">Read More </a></div>
        
 
<? } ?>
	  <?   $featurerssSql=mysql_query("select * from imp_rssdetail where Status='Y' and View='Y' order by RssDetId desc");
	        $tot_view_rss=mysql_num_rows($featurerssSql);
			if($tot_view_rss>0)
			{
			include"rssview.php";
	  ?>
	   <div class="newsticker-jcarousellite2">
						 <div>
	  <ul>
	  <?php 
			  
			  //$p=0;
	  foreach($feed1 as $item1){   	?>
			
        <li><!--<div class="client_image"><img src="uploaded_files/new_photo/<?php //echo $featureRow['photo'];?>"  width="217" height="90"/></div>-->
		<div class="rss_news_h1">	<?php	echo "<a href=\"$item1[link]\"  target=\"_blank\" >$item1[title]</a><br>";
		            echo " <b>$item1[date]</b>\n";
		?></div>
      <!--  <div class="news_content"> <?php //echo substr($featureRowrss['description'],0,120);?>          </div>-->
		  </li>
		  <?php }?>
       </ul><br />
</div></div>
<div class="readmore1"><a  href="http://www.computerworld.com/news/xml/0,5000,54,00.xml"  target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image48','','images/news_rollover.jpg',1)"><img src="images/news.jpg" name="Image48" width="108" height="23" border="0" id="Image48" /></a></div>
<? } ?>
          
       </div>
      </div>
	  
   
	
	
	
	
	
	<div class="middle_section1"><div class="middle_section_h1">
 
	   <div class="login_bg1"><div class="login_image"><img src="images/clientlogin.jpg" /></div><form method="post" action="index.php" name="loginfrm" onsubmit="return validlogin();">
	   <div class="login_image2">Username<br /><input name="email" type="text"  class="login_textfield"/></div>
	   <div class="login_image3">Password<br /><input name="password" type="password"  class="login_textfield"/></div>	   
	   <div class="login_image_login"><input type="hidden"  name="submit"  value="yes" /><input name="submit" type="submit" class="sus_bu_l" value="Login"  border="0" /></div></form>
	   </div>
	    </div>
	   
	   
	   
	   <div class="middle_section_h3">
	    <form name="form1" method="post" onsubmit="return validate()" > 
	   <div class="login_bg2"><div class="login_image1"><h2>Newsletter Sign Up</h2></div>
	     <div class="login_image"><input type="hidden" name="flagMail" value="yes" /><input name="email" type="text"  class="login_textfield2"/></div>	   
	   <div class="log_space"><input type="submit" class="sus_bu" value="Subscribe" border="0" /></div>
	   </div></form>
  <?php if($msg=="suceess"){?> <div class="message">Your Message Is Successfully Sent</div>
	     <?php } ?></div>
		 
		<div class="middle_section_h2"><a href="contact_us.php"><img src="images/contactus.jpg" border="0" /></a></div> 
		 
	   </div>
	   <div class="middle_section1"><br /></div>
    <div class="footer">
      <div class="footer_h1"><a href="index.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="about_us.php">About Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="services.php">Services</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="career.php">Careers</a> &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="contact_us.php">Contact Us</a></div>
    </div>
	<div class="copyright">
  <div align="center" class="footer1">2015 vedantus.com All Rights Reserved, Powered by  <a href="http://www.us-creations.com/" target="_blank"> Us-creations</a>    </div></div>
</div></div>
  <div class="table_bottom"><img src="images/table_bottom_image.jpg" /></div>
  <div class="table_top">&nbsp;</div>
</div>

</body>
</html>
 
