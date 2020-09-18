<?php include"includes/header.php"; 
if($_POST['la']=='va')
{
include_once("PHPMailer/class.phpmailer.php");
extract($_REQUEST);
  
$atachment=$_FILES['resume']['tmp_name'];
$fileName=$_FILES['resume']['name'];	
$content =  "
$fn $Ln has just sent the following data via the impetusit.com web site.  This is the result of the public site Apply submission form.
 
=======================================================================================

Name		:	$fn $Ln<br>
Present Comapny		:	$Pc $Ln<br>
Current Designation		:	$Cd<br>
Email-ID	:	$Em<br>
Contact no.	:	$Cn<br>
Current CTC	:	$CC<br>


Other Details	:	$de<br>

=======================================================================================

";  
$mail = new PHPMailer();
$body2    = str_replace("[\]",'',$content);
$subject2 = str_replace("[\]",'',$_REQUEST['subject']);
$mail->From = $Em;
$mail->FromName = $fn;
$mail->AddAttachment("$atachment", "$fileName");
$mail->IsHTML(false);                                  // set email format to HTML
$mail->Subject = "Application for ".$jobname;
$mail->AltBody = " "; // optional, comment out and test
$mail->MsgHTML($body2);

$emails="train@impetusit.com";
$mail->AddAddress("$emails");
$mail->AddAddress("ajay@us-creations.com");
  
//remove this comment when site will live
/*if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}*/


$st="Your application has been sent to our staff.";

if(trim($_FILES['resume']['name']) != "")//if image given
			{			
				$uniq=time();
				$imageName2 = $uniq."_".trim($_FILES['resume']['name']);
				if (!copy($_FILES['resume']['tmp_name'], "uploaded_files/Resume/".$imageName2))
				$error="upload";
			}	
$cdat=date('Y-m-d');
$insSql=mysql_query("insert into imp_applyjob (Name, CompCity, CurrentDesignation, EmailID, ContactNumber, CCTC, Resume, Details, JobID, Applydate) values ('$fn', '$Pc', '$Cd', '$Em', '$Cn', '$CC', '$imageName2', '$de', '$JobID', '$cdat')");

}
?>

<div class="header"><?php /*?><img src="uploaded_files/headerimage/<?php echo $CmsRow['header_image'];?>" /><?php */?></div>
<div class="inner_bg">
<div class="header"><img src="images/aboutus_top_line.jpg" /><br /><div class="middle_top"><a href="index.php">Home</a> >> Apply Now <a href="contract_staff.php"><?php echo $CmsRow['page_name'];?></a></div>
<br /><img src="images/aboutus_top_line.jpg" /></div>
<?php include"includes/left_menu.php"; ?>
<script language="javascript">
function checkapply()
{
 if(document.apply.fn.value=='')
 {
  alert("Please enter your name.");
  document.apply.fn.focus();
  return false;
 }
 if(document.apply.Em.value=='')
 {
  alert("Please enter your email-id.");
  document.apply.Em.focus();
  return false;
 }
 
 if(document.apply.Em.value!="" && document.apply.Em.value.indexOf('@')==-1 || document.apply.Em.value.indexOf('.')==-1)
 {
  alert("Please enter correct mmail-id syntax (xxx@xx.xx)!!!");
  document.apply.Em.focus();
  return false;
 }
 
 if(document.apply.Cn.value=='')
 {
  alert("Please enter your contact number.");
  document.apply.Cn.focus();
  return false;
 }
 
 if(document.apply.CC.value=='')
 {
  alert("Please enter your current ctc.");
  document.apply.CC.focus();
  return false;
 }
 if(document.apply.resume.value=='')
 {
  alert("Please attach your update resume.");
  document.apply.resume.focus();
  return false;
 }
return true;
}

</script><?php
$jobSql=mysql_query("select * from imp_jobs where JobsId='$_REQUEST[id]' order by JobsAddedDate");
$jobNum=mysql_num_rows($jobSql);
$jobRow=mysql_fetch_array($jobSql);
?>		
<div class="aboutus_content_h1">Apply Now</div>
<div class="form_table">
<div class="job_table_top"><img src="images/job_table_top.jpg" /></div>
<div class="job_table_bg"><div class="job_h1">apply for job</div></div>
<div class="job_table_bg1"><form name="apply" method="post" action="" enctype="multipart/form-data" onsubmit="return checkapply()"><!--<div class="job_form"><div class="job_form_h2">Job ID<span class="style1">*</span></div>
<div class="colon_space1">:</div>
<div class="job_form_h3">
  <input name="Input" type="text" class="job_form_textfield" />
</div></div>-->

<div class="job_form"><div class="job_form_h2">Name<span class="style1">*</span></div>
<div class="colon_space1">:</div>
<div class="job_form_h3">
  <input name="fn" type="text" class="job_form_textfield" />
</div></div>

<div class="job_form"><div class="job_form_h2">Current Designation<span class="style1">*</span></div>
<div class="colon_space1">:</div>
<div class="job_form_h3">
  <input name="Cd" type="text" class="job_form_textfield" />
</div></div>

<div class="job_form">
  <div class="job_form_h2">Present Company  / Organisation<span class="style1">*</span></div>
  <div class="colon_space1">:</div>
<div class="job_form_h3">
  <label>  <input name="Pc" type="text" class="job_form_textfield" /> </label>
</div></div>
	
	<div class="job_form"><div class="job_form_h2">E-mail<span class="style1">*</span></div>
	<div class="colon_space1">:</div>
<div class="job_form_h3">
  <input name="Em" type="text" class="job_form_textfield" />
</div></div>

<div class="job_form"><div class="job_form_h2">Contact No<span class="style1">*</span></div>
<div class="colon_space1">:</div>
<div class="job_form_h3">
  <input name="Cn" type="text" class="job_form_textfield" />
</div></div>

<!--<div class="job_form"><div class="job_form_h2">Address<span class="style1">*</span></div>
<div class="colon_space1">:</div>
<div class="job_form_h3">  <textarea name="addr" class="job_form_textfield1"></textarea>
</div></div>
-->


<div class="job_form"><div class="job_form_h2">Resume<span class="style1">*</span></div>
<div class="colon_space1">:</div>
<div class="job_form_h3"><label><input type="file" class="input_form3" name="resume" /> </label></div></div>

<?php /*?><div class="job_form"><div class="job_form_h2">&nbsp;&nbsp;&nbsp;</div>
<div class="job_form_h3"><strong></strong></div></div><?php */?>

<div class="job_form"><div class="job_form_h2">Any Remark<span class="style1">*</span></div>
<div class="colon_space1">:</div>
<div class="job_form_h3">  <textarea name="de" class="job_form_textfield1"></textarea>
</div></div>

<div class="job_form"><div class="job_form_h2">&nbsp;&nbsp;&nbsp;</div>
<div class="job_form_h3">&nbsp;&nbsp;<input type="hidden" name="la" value="va" />
		<input type="hidden" name="JobID" value="<?php echo $jobRow['JobsId'];?>" />
		<input type="hidden" name="jobname" value="<?php echo $jobRow['JobsTitle'];?>" /><input type="image" src="images/applyfor-job.jpg" /></div></div>

<div class="job_form"><div class="job_form_h2">&nbsp;&nbsp;&nbsp;</div>
<div class="job_form_h3">&nbsp;&nbsp;&nbsp;&nbsp;<br /><br /></div></div>

</form></div>
<div class="job_table_top"><img src="images/job_table_bottom.jpg" /></div>
</div>
</div>
<?php include"includes/footer.php";?>