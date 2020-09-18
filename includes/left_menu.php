<?php 
include_once"includes/midas.inc.php"; 

?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js"></script>
<script src="js/jcarousellite_1.0.1c4.js" type="text/javascript"></script> 
<script type="text/javascript">
$(function() {
	$(".newsticker-jcarousellite").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 1,
		auto:4000,
		speed:2000
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
<link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>	
<div class="middle_section">
<div class="left_menu"><div class="left_menu_left"><img src="images/services_icon1.jpg" class="left_image" hspace="5" />Our  Services</div>
  <div class="aboutus_content_line"><br /><div class="aboutus_content_line1"> <img src="images/arrow1.jpg" /> <a href="enterprise_Integration.php">Enterprise Integration SOA/BPM/OSB/AIA</a></div>
<div class="about_line"><img src="images/about_line.jpg" /></div>

<div class="aboutus_content_line1"> <img src="images/arrow1.jpg" /> 
<a href="portal_and_content_management.php">Portal and Content Management</a></div>
<div class="about_line"><img src="images/about_line.jpg" /></div>

<div class="aboutus_content_line1">  <img src="images/arrow1.jpg" /> <a href="oracle_adf.php">Oracle Application Development Framework</a></div>
<div class="about_line"><img src="images/about_line.jpg" /></div>

<div class="aboutus_content_line1">  <img src="images/arrow1.jpg" /> <a href="oracle_maf.php">Oracle Mobility Services</a></div>
<div class="about_line"><img src="images/about_line.jpg" /></div>
 
 
<div class="about_line"><img src="images/about_line.jpg" /></div>
<div class="view_all1"></div>

<div class="aboutus_leftmenu1"><img src="images/internal_bg3.jpg" /></div>

</div>

<div class="left_menu_left1"><img src="images/icon.jpg" class="left_image" hspace="5" />Vedantus News </div>
<div class="left_menu_bg1">
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
        <li><div class="client_image"><img src="uploaded_files/new_photo/<?php echo $featureRow['photo'];?>"  width="217" height="90"/></div>
		<div class="news_h1"><?php echo $featureRow['addeddate'];?> </div>
        <div class="news_content"> <?php echo substr($featureRow['description'],0,120);?>          </div>
		  </li>
		  <?php }?>
       </ul><br />
</div></div>
<div class="view_all1"><a href="newsheading.php">View All</a></div>
<? } ?>
	  <?   $featurerssSql=mysql_query("select * from imp_rssdetail where Status='Y' and View='Y' order by RssDetId desc");
	        $tot_view_rss=mysql_num_rows($featurerssSql);
			if($tot_view_rss>0)
			{
			include_once"rssview.php"; 
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
<div class="view_all1"><a href="http://www.computerworld.com/news/xml/0,5000,54,00.xml"  target="_blank">View All</a></div>
<? } ?>
       

  
</div><div class="left_menu_bottom1"><img src="images/leftmenu_bottom.jpg" /></div>



 <div class="contact_us"><a href="contact_us.php"><img src="images/contact_us.jpg" border="0" /></a></div>
</div>