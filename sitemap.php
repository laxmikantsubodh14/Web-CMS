<?php include"includes/header.php"; 
$cmsimp="select * from imp_static_pages where page_id='13'";
$cmsSql=mysql_query($cmsimp);

$CmsRow=mysql_fetch_array($cmsSql);
?>
<div class="header"><?php if($CmsRow['header_image']!='') {?><img src="uploaded_files/headerimage/<?php echo $CmsRow['header_image'];?>" /><?php } ?></div>
<div class="inner_bg">
<div class="header"><img src="images/aboutus_top_line.jpg" /><br /><div class="middle_top"><a href="index.php">Home</a> >> <a href="sitemap.php"><?php echo $CmsRow['page_name'];?></a></div>
<br /><img src="images/aboutus_top_line.jpg" /></div>
<?php include"includes/left_menu.php"; ?>
<div class="aboutus_content_h1">Sitemap </div>
<div class="aboutus_content"><div class="aboutus_content"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
            <td width="7" valign="top">&nbsp;</td>
            <td width="12" valign="top">&nbsp;</td>
            <td width="661" class="sitemap_content">&nbsp;</td>
          </tr>
          
          <tr>
            <td width="7" valign="top">&nbsp;</td>
            <td width="12"><img src="images/sitemap_bulit.jpg" /></td>
            <td width="661" class="sitemap_content"><a href="index.php">Home</a></td>
          </tr>
          <tr>
            <td height="5" colspan="3"></td>
            </tr>
          
		 
          <tr>
            <td width="7" valign="top">&nbsp;</td>
            <td width="12"><img src="images/sitemap_bulit.jpg" /></td>
            <td width="661" class="sitemap_content"><a href="about_us.php">About Us </a></td>
          </tr>
		  <tr>
            <td colspan="3" valign="top" height="5"></td>
            </tr>
		  
		     <tr>
            <td width="7" valign="top">&nbsp;</td>
            <td width="12"><img src="images/sitemap_bulit.jpg" /></td>
            <td width="661" class="sitemap_content"><a href="services.php">Services </a></td>
          </tr>
		  <tr>
            <td colspan="3" valign="top" height="5"></td>
            </tr>
			
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td valign="top" class="sitemap_1"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="12" height="19" valign="middle"><img src="images/sitemap_smallbulite.jpg" /></td>
                <td valign="top" class="sitemap_content_mini"><a href="enterprise_Integration.php">Enterprise Integration SOA/BPM/OSB/AIA</a></td>
              </tr>
              <tr>
                <td height="5" colspan="2"></td>
                </tr>
				
				 <tr>
                <td width="12" height="19" valign="middle"><img src="images/sitemap_smallbulite.jpg" /></td>
                <td valign="top" class="sitemap_content_mini"><a href="portal_and_content_management.php">Portal and Content Management</a></td>
              </tr>
              <tr>
                <td height="5" colspan="2"></td>
                </tr>
				<tr>
                <td width="8" valign="middle"><img src="images/sitemap_smallbulite.jpg" /></td>
                <td valign="top" class="sitemap_content_mini"><a href="oracle_adf.php">Oracle ADF</a></td>
              </tr>
			  
			     <tr>
                <td height="5" colspan="2"></td>
                </tr>
				<tr>
                <td width="8" valign="middle"><img src="images/sitemap_smallbulite.jpg" /></td>
                <td valign="top" class="sitemap_content_mini"><a href="oracle_maf.php">Oracle MAF</a></td>
              </tr>
              
              		
			  
			     <tr>
                <td height="5" colspan="2"></td>
                </tr>
		
            </table></td>
          </tr>
 
		  <tr>
            <td height="5" colspan="3"></td>
            </tr>
                   <tr>
            <td>&nbsp;</td>
            <td><img src="images/sitemap_bulit.jpg" /></td>
            <td valign="top" class="sitemap_content"><a href="career.php">  CAREERS </a></td>
          </tr>
          
          <tr>
          <tr>
            <td>&nbsp;</td>
            <td><img src="images/sitemap_bulit.jpg" /></td>
            <td valign="top" class="sitemap_content"><a href="contact_us.php">Contact Us </a></td>
          </tr>
          
    
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td valign="top">&nbsp;</td>
          </tr>
        </table></div></div>
		</div>
<?php include"includes/footer.php"; ?>