<?php include"includes/midas.inc.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="fade_files/jquery.js"></script>
<script>
$(function(){
	$('.fadein img:gt(0)').hide();
	setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
});
</script>	

<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js"></script>
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
	
	
<style>


.fadein { position:relative; height:428px; width:939px; }
.fadein img { position:absolute; left:0; top:0; }
</style>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Impetusit</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=News+Cycle' rel='stylesheet' type='text/css'>
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


<div class="table_bg"><div id="wrapper1">
    <div class="top_menu"><a href="index.php"><img src="images/logo.jpg" border="0" /></a></div>
	<div class="sitemap"><a href="sitemap.php">Sitemap</a></div>
    <div class="punchline"><img src="images/punchilne.jpg" /></div>
    <div class="menubar">
	<link rel="stylesheet" type="text/css" href="chrometheme/chromestyle.css" />

<script type="text/javascript" src="chromejs/chrome.js"></script>

<div class="chromestyle" id="chromemenu">

<ul>
	<li><a href="index.php"><img src="images/home+rollver.jpg" border="0" /></a></li><img src="images/slider.jpg" /><img src="images/slider.jpg" /><img src="images/slider.jpg" /><li><a href="about_us.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image5','','images/aboutus_rollver.jpg',1)"><img src="images/aboutus.jpg" name="Image5" width="187" height="47" border="0" id="Image5" /></a></li><img src="images/slider.jpg" width="1" height="47" /><img src="images/slider.jpg" width="1" height="47" /><img src="images/slider.jpg" width="1" height="47" /><li><a href="services.php" rel="dropmenu1" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','images/services_rollver.jpg',1)"><img src="images/services.jpg" name="Image7" width="187" height="47" border="0" id="Image7" /></a></li><li><a href="jobseekers.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','images/jobseekers_rollver.jpg',1)"><img src="images/jobseekers.jpg" name="Image9" width="187" height="47" border="0" id="Image9" /></a></li><img src="images/slider.jpg" width="1" height="47" /><img src="images/slider.jpg" width="1" height="47" /><img src="images/slider.jpg" width="1" height="47" /><li><a href="contact_us.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image46','','images/contact.jpg',1)"><img src="images/contact_rollver.jpg" name="Image46" width="187" height="47" border="0" id="Image46" /></a></li>
</ul>

</div>
<div id="dropmenu1" class="dropmenudiv">
<a href="http://www.dynamicdrive.com/">Dynamic Drive</a>
<a href="http://www.cssdrive.com">CSS Drive</a>
<a href="http://www.javascriptkit.com">JavaScript Kit</a>
<a href="http://www.codingforums.com">Coding Forums</a>
<a href="http://www.javascriptkit.com/jsref/">JavaScript Reference</a>
</div>
<script type="text/javascript">

cssdropdown.startchrome("chromemenu")

</script>

</div>
    <div class="header"><div class="fadein">
<img style="display: block;" src="fade_files/header.jpg"><img style="display: none;" src="fade_files/header1.jpg"><img style="display: none;" src="fade_files/header2.jpg"></div></div>
    <div class="middle_section">
      <div class="nt_staffing">
        <div class="nt_staffing_top"> <img src="images/top_table.jpg" />
            <div class="nt_staffing_bg">
              <div class="nt_staffing_content"><img src="images/nt_staffing_icon.jpg"  hspace="5" />Development Services
                <div class="image"><img src="images/bg_line.jpg" class="bg_line"/></div>                
				<div class="h1">Impetus IT  is prepared to take the necessary steps to provide solutions that meet the current and future requirements of our clients. With our Technology Solutions Center, branch offices throughout the United States and an international presence in India....</div>
                
                  <div class="readmore"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image272','','images/readmore_rollover.jpg',1)"><img src="images/readmore.jpg" name="Image272" width="84" height="31" border="0" id="Image272" /></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image17','','images/readmore_rollover.jpg',1)"></a></div>
              </div>
            </div>
          <div class="nt_staffing_bottom"><img src="images/bottom_table.jpg" /></div>
        </div>
      </div>
      <div class="Contractual_Staffing">
        <div class="nt_staffing_top"> <img src="images/top_table1.jpg" />
            <div class="Contractual_Staffing_bg">
              <div class="nt_staffing_content"><img src="images/contractual_icon.jpg"  hspace="5" />Contractual Staffing
			  <div class="image"><img src="images/bg_line.jpg" class="bg_line"/></div>
                <div class="h1">Impetus IT  is prepared to take the necessary steps to provide solutions that meet the current and future requirements of our clients. With our Technology Solutions Center, branch offices throughout the United States and an international presence in India....</div>
                
                <div class="readmore"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image27','','images/readmore_rollover.jpg',1)"><img src="images/readmore.jpg" name="Image27" width="84" height="31" border="0" id="Image27" /></a></div>
              </div>
            </div>
          <div class="nt_staffing_bottom"><img src="images/bottom_table1.jpg" /></div>
        </div>
      </div>
      <div class="Permanent_Staffing">
        <div class="nt_staffing_top"> <img src="images/top_table2.jpg" />
            <div class="Permanent_Staffing_bg">
              <div class="nt_staffing_content"><img src="images/permananet_icon.jpg"  hspace="5" />Permanent Staffing
			  <div class="image"><img src="images/bg_line.jpg" class="bg_line"/></div>
                
                <div class="h1">Impetus IT  is prepared to take the necessary steps to provide solutions that meet the current and future requirements of our clients. With our Technology Solutions Center, branch offices throughout the United States and an international presence in India....</div>
               
                <div class="readmore"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image271','','images/readmore_rollover.jpg',1)"><img src="images/readmore.jpg" name="Image271" width="84" height="31" border="0" id="Image271" /></a><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image17','','images/readmore_rollover.jpg',1)"></a></div>
              </div>
            </div>
          <div class="nt_staffing_bottom"><img src="images/bottom_table2.jpg" /></div>
        </div>
      </div>
    </div>
    <div class="bottom_middle_section">
      <div class="services"><img src="images/services_icon.jpg" hspace="5" />Our Services
        <div class="services_bg_line">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/button.jpg" align="middle" hspace="10"/><a href="outsourcingservices.php">Outsourcing services</a></div>
        <div class="services_line"><img src="images/services_bg_line.jpg" /></div>
        <div class="services_bg_line">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/button.jpg" align="middle" hspace="10"/><a href="non_tech_staff.php">Non-Technical Staffing</a></div>
        <div class="services_line"><img src="images/services_bg_line.jpg" /></div>
        <div class="services_bg_line">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/button.jpg" align="middle" hspace="10"/><a href="contract_staff.php">Contractual Staffing</a></div>
        <div class="services_line"><img src="images/services_bg_line.jpg" /></div>
        <div class="services_bg_line">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/button.jpg" align="middle" hspace="10"/><a href="perma_staff.php">  Permanent Staffing</a></div>
        <div class="services_line"><img src="images/services_bg_line.jpg" /></div>
        <div class="services_bg_line">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/button.jpg" align="middle" hspace="10"/><a href="cont_to_hire.php">Contract-to-hire staffing</a></div>
        <div class="services_line"><img src="images/services_bg_line.jpg" /></div>
        <div class="services_bg_line">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/button.jpg" align="middle" hspace="10"/><a href="development_services.php">Development Services</a></div>
        <div class="services_line"><img src="images/services_bg_line.jpg" /></div>
        
       <div class="services_bg_line">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/button.jpg" align="middle" hspace="10"/><a href="technical_int.php">Technical Interviewing</a></div>
        <div class="services_line"><img src="images/services_bg_line.jpg" /></div>
        <div class="services_bg_line">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image47','','images/viewall_rollover.jpg',1)"><img src="images/viewall.jpg" name="Image47" width="122" height="23" border="0" id="Image47" /></a></div>
		<div class="services_bg_line">&nbsp;</div>
      </div>
      <div class="client"><img src="images/client_icon.jpg" hspace="5"/>Clients
	  
	    <div class="newsticker-jcarousellite">
						 <div>
	  <ul>
	  <?php 
			   $featureSql2=mysql_query("select * from imp_testimonialtitle where Status='Y' order by TestimonialId desc");
			   while($featureRow2=mysql_fetch_array($featureSql2)){
			  ?>
       <li> <div class="client_image"><img src="uploaded_files/new_photo/<?php echo $featureRow2['Photo'];?>"  width="217" height="90"/></div>
        <div class="client_h1"><?php echo $featureRow2['TestimonialTitle'];?></div>
        <div class="client_content"> <?php echo substr($featureRow2['TestimonialDescription'],0,120);?>
            <br />
          <div class="readmore"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image45','','images/readmore_rollover.jpg',1)"><img src="images/readmore.jpg" name="Image45" width="84" height="31" border="0" id="Image45" /></a></div>
		  
		  
		  </div></li>
		    <?php }?>
       </ul><br />
</div>
		  
		  
		  
		  
        </div>
      </div>
	  
      <div class="news"><img src="images/news_icon.jpg" hspace="5"  />News
	  <div class="space"></div>
	   <div class="newsticker-jcarousellite">
						 <div>
	  <ul>
	  <?php 
			   $featureSql=mysql_query("select * from imp_news where Status='Y' order by NewsId desc");
			   while($featureRow=mysql_fetch_array($featureSql)){
			  ?>
        <li><div class="client_image"><img src="uploaded_files/new_photo/<?php echo $featureRow['photo'];?>"  width="217" height="90"/></div>
		<div class="news_h1"><?php echo $featureRow['addeddate'];?> </div>
        <div class="news_content"> <?php echo substr($featureRow['description'],0,120);?>
         
          
          </div>
		  </li>
		  <?php }?>
       </ul><br />
</div></div>

          <div class="readmore1"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image48','','images/news_rollover.jpg',1)"><img src="images/news.jpg" name="Image48" width="108" height="23" border="0" id="Image48" /></a></div>
       
      </div>
	  <div class="newsletter"><img src="images/newsletter.jpg"  />&nbsp;&nbsp;Newsletter<br /><input name="Input" type="text" class="textfield3" /><br /><a href="#"><img src="images/subscribe.jpg" border="0"  class="subs"/></a></div>
    </div>
    <div class="footer">
      <div class="footer_h1"><a href="index.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="about_us.php">About Us</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="services.php">Services</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="jobseekers.php">&nbsp;Job Seekers</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="contact_us.php">Contact Us</a></div>
    </div>
	<div class="copyright">
	  <div class="footer1">2012 ImpetusIt.com All Rights Reserved</div>
	  <div class="footer2"> </div><div class="link"><a href="http://www.us-creations.com/" target="_blank"> </a></div></div>
  </div></div>
  <div class="table_bottom"><img src="images/table_bottom_image.jpg" /></div>
  <div class="table_top">&nbsp;</div>
  
</div>
</body>
</html>
