<?php include"midas.inc.php";
extract($_REQUEST);
$Pname=$_SERVER['PHP_SELF'];
$PN=explode('/',$Pname);
$PageName=$PN[count($PN)-1];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Impetusit</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body onload="MM_preloadImages('images/home+rollver.jpg','images/aboutus_rollver.jpg','images/services_rollver.jpg','images/jobseekers_rollver.jpg','images/contact.jpg')">
<div id="wrapper">
<div class="table_top"><img src="images/table_top_image.jpg" /></div>

<div class="table_bg"><div id="wrapper1"><div class="top_menu"><a href="index.php"><img src="images/logo.jpg" border="0" /></a></div>
<div class="sitemap"><a href="sitemap.php">Sitemap</a></div>
<div class="punchline"><img src="images/punchilne.jpg" /></div>
<div class="menubar"><a href="index.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image36','','images/home+rollver.jpg',1)"><img src="images/<?php if($PageName=='index.php')  { ?>home+rollver.jpg<?php } else { ?>home_.jpg <?php } ?>" name="Image36" width="187" height="47" border="0" id="Image36" /></a><a href="#"></a><img src="images/slider.jpg" /><a href="about_us.php"><img src="images/<?php if($PageName=='about_us.php')  { ?>aboutus_rollver.jpg<?php } else { ?>aboutus.jpg <?php } ?>" border="0" /></a><img src="images/slider.jpg" width="1" height="47" /><a href="services.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','images/services_rollver.jpg',1)"><img src="images/<?php if($PageName=='services.php')  { ?>services_rollver.jpg<?php } else { ?>services.jpg <?php } ?>" name="Image7" width="187" height="47" border="0" id="Image7" /></a><img src="images/slider.jpg" width="1" height="47" /><a href="jobseekers.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','images/jobseekers_rollver.jpg',1)"><img src="images/<?php if($PageName=='jobseekers.php')  { ?>jobseekers_rollver.jpg<?php } else { ?>jobseekers.jpg <?php } ?>" name="Image9" width="187" height="47" border="0" id="Image9" /></a><img src="images/slider.jpg" width="1" height="47" /><a href="contact_us.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image46','','images/contact.jpg',1)"><img src="images/<?php if($PageName=='contact_us.php')  { ?>contact.jpg<?php } else { ?>contact_rollver.jpg<?php } ?>" name="Image46" width="187" height="47" border="0" id="Image46" /></a></div>


