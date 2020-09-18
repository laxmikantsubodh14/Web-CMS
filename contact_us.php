<?php include"includes/header.php";
$cmsimp="select * from imp_static_pages where page_id='5'";
$cmsSql=mysql_query($cmsimp);

$CmsRow=mysql_fetch_array($cmsSql);
 ?>
 
<script language="javascript">
function validlogin()
 	{
	if(document.contactus.fname.value=='')
	{
	alert('Please Enter Your Name');
	document.contactus.fname.focus();
	return false;
	}
	if(document.contactus.message1.value=='')
	{
	alert('Please Enter Your Address');
	document.contactus.message1.focus();
	return false;
	}
	if(document.contactus.email.value=='')
	{
	alert('Please Enter Your Email');
	document.contactus.email.focus();
	return false;
	}
 
	return true;
	}
</script>
<div class="header"><?php if($CmsRow['header_image']!='') {?><img src="uploaded_files/headerimage/<?php echo $CmsRow['header_image'];?>" /><?php } ?></div>
<div class="inner_bg">
<div class="header"><img src="images/aboutus_top_line.jpg" /><br /><div class="middle_top"><a href="index.php">Home</a> >> <a href="contact_us.php"><?php echo $CmsRow['page_name'];?></a></div>
<br /><img src="images/aboutus_top_line.jpg" /></div>
<?php include"includes/left_menu.php"; ?>
<div class="aboutus_content_h1"><?php echo $CmsRow['page_name'];?></div>
<div class="aboutus_content"><?php echo $CmsRow['page_description'];?>
<div class="con_map">asdjpsajfpoj</div>
</div>



<div class="form_line"><img src="images/form_line.jpg" /></div>
<div class="form_table">
<div class="form_top"><img src="images/form_top.jpg" /></div>
<div class="form_bg">
<div class="form_h1">All fields are required<span class="style1">*</span></div><?
					  if($mails=='sent')
					  {
					 /*?>		if(isset($_POST['captchaimage']))
		              {
		                  $string = $_SESSION['string'];
	                      $userstring =$_POST['captcha']; 
		                 if(($string != $userstring))
	                      $message="Please enter correct security code."	;   
	       		   
		                 }<?php */?>
	   
	           <?php   if($message=='')
	                { 
					
							
							//$sql_country="select * from vinexshop_country  where COUNTRY_ID='$country'";
							//$result_country=mysql_query($sql_country);
							//$row_country=mysql_fetch_array($result_country);
							$current=date("Y-m-d");
							$mailstr = "";							
							$mailstr .= "Date:            $current 
										FirstName:        $fname
										LastName:         $lname
										Email:            $email
										city:             $city
										state:            $state
										Phone No.:        $Phone
							            Address:          $message1
										Comment:          $description";										 							
							$subject="ImpetusIT Contact";
							$headers = "MIME-Version: 1.0\r\n";
							//$headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
							$headers.= "From: $email";
						       $sql_insinq="insert into imp_inquiry set Name='$fname',	Address='$message1',email='$email',state='$state',city='$city',description='$description',Telephone='$Phone',Date='$current'";
						  $sql_res_inq=mysql_query($sql_insinq) or mysql_error();
							//$status=mail("ajay@uscreations.com",$subject, $mailstr, $headers);//remove comment after live the site
							
						           //mail("ajay@us-creations.com",$subject, $mailstr, $headers);
							
						  }}
							if($status==1)
							{
								echo "<br><br><br><div class=text1 align=center><font color=red>";
								echo "Mail Sent Successfully<br>";
								echo "Thank you for your interest in 'ImpetusIT'.";
								echo "</font></div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
							}?><form name="contactus"  onsubmit="return validlogin();" method="post">
<div class="form_h1"><div class="form_h2"> Name:<span class="style1">*</span></div>
<div class="form_h3">
  <input name="fname" type="text" class="textfield" />
</div></div>



<div class="form_h1"><div class="form_h2">Address:<span class="style1">*</span> </div>
<div class="form_h3">
  <textarea name="message1" cols="" rows="" class="textfield1"></textarea>
</div></div>

<div class="form_h1"><div class="form_h2">Phone:<span class="style1"></span> </div>
<div class="form_h3">
  <input name="Phone" type="text" class="textfield" />
</div></div>

<div class="form_h1"><div class="form_h2">E-mail:<span class="style1">*</span> </div>
<div class="form_h3">

  <input name="email" type="text" class="textfield" />
</div></div>
<div class="form_h1"><div class="form_h2">Country:<span class="style1"></span> </div>
<div class="form_h3">
  <select name="state..." class="textfielddrop">
<option value="">Country...</option>
   
</select>
</div></div>
<div class="form_h1"><div class="form_h2">State:<span class="style1">*</span> </div>
<div class="form_h3">
  <input name="email" type="text" class="textfield" />
</div></div>


<div class="form_h1"><div class="form_h2">Comments:<span class="style1"></span> </div>
<div class="form_h3">
  <textarea name="description" cols="" rows="" class="textfield1"></textarea>
</div></div>

<div class="form_h1"><div class="form_h2">&nbsp; </div><input type="hidden" name="mails" value="sent" />
<div class="form_h3"><input type="submit" class="ne_lodsdnjv"  border="0"/>&nbsp;&nbsp;<!--<input type="image" src="images/clear.jpg"  border="0"/>-->

</div></div></form>
</div>
<div class="form_top"><img src="images/form_bottom.jpg" /></div></div>
</div>
<?php include"includes/footer.php"; ?>