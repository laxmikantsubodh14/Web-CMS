<?php include_once"../includes/midas.inc.php"; 
include("fckeditor/fckeditor.php") ;
validate_admin();
$PageId=trim($_REQUEST['PageId']);

if($_POST['flag']=="yes")
{
		@extract($_POST);
		if($page_id!='') 
		{
		
		
		if($_FILES['header_image']['name']!='')
  {
    $zimg=time()."_".$_FILES['header_image']['name'];
    $tmp_name=$_FILES['header_image']['tmp_name'];
	$uploadFile = "../uploaded_files/headerimage/".trim($zimg);	
	move_uploaded_file($tmp_name,$uploadFile);
 }//endif
		
		
		
		
			$page_description =  $_POST['FCKeditor1'];
			 $sqlUpdate="update imp_static_pages set page_name='$page_name',header_image='$zimg',page_description='".addslashes(stripslashes($page_description))."',
			page_datemodified=now() where page_id='$page_id'";
		
			$rsUpdate=executeQuery($sqlUpdate);
			$sess_msg=$sitemsgs[10];
			$_SESSION['sessionMsg']=$sess_msg;
			?>
				<script language="javascript">
				location.href="static_home_list.php";
				</script>
				<?php 
			//header("location: static_page_list.php");
			exit;
		}
				  
}

if(isset($PageId))
{
	$sqlPage="select * from imp_static_pages where page_id='".$PageId."'";
	$rsPage=executeQuery($sqlPage);
	$arrPage=mysql_fetch_array($rsPage);
	@extract($arrPage);
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0049)http://69.61.15.150/~dish/admin/admin_desktop.php -->
<HTML><HEAD><TITLE><?php echo $title_message;?></TITLE>
<script language="javascript" src="js/validation.js"></script>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1"><LINK 
href="css/css.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
</HEAD>
<BODY><?php include("top.inc.php");?>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  
  
  <TR>
    <TD align=middle>
      <TABLE width="98%" border=0 align="center" cellPadding=0 cellSpacing=1 bgColor=#bccad2>
        <TBODY>
        <TR>
          <TD class=blueheading 
          style="BACKGROUND-IMAGE: url(images/tablebgrep.gif)" align=left 
          height=38>
            <TABLE cellSpacing=0 cellPadding=0 width="98%" border=0>
              <TBODY>
              <TR>
                <TD width="3%"><IMG height=17 alt="" 
                  src="images/orangebullet.gif" width=17 
                vspace=3></TD>
                <TD class=blueheading align=left width="56%">Static Page Manager</TD>
					<td width="41%" align="right"><a href="static_home_list.php">
					<img src="images/return_back.gif" border="0" class="submitbutton"></a></td>
              </TR></TBODY></TABLE></TD></TR>
        <TR>
          <TD vAlign=top align=middle bgColor=#ffffff>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
               
              <TR>
                <TD align=center>&nbsp;</TD>
              </TR>
              <TR>
                <TD align=center><?php echo display_session_msg();?></TD>
              </TR> <TR>
                <TD align=center>&nbsp;</TD>
              </TR>
              <TR>
                <TD height=260 align=left valign="top">
				<form name="form1" method="post" action="<?php echo $PHP_SELF;?>" onSubmit="return valid_page('form1');" enctype="multipart/form-data">
				<table width="90%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr><td align="left" class="white_bold">Add/Edit Admin</td>
				    <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				    </tr></table>				  </td>
				</tr>
				<tr class="oddClass">
				  <td width="21%"><span class="fieldsname"><strong>Page Name :</span><font class="red_txt">*</font></td>
				  <td width="79%"><input readonly name="page_name" type="text" class="textbox12" value="<?php echo $page_name;?>"></td></tr>
				   <tr class="oddClass">
				  <td width="21%"><span class="fieldsname"><strong>Header Image :</span><font class="red_txt">*</font></td>
				  <td width="79%"><?php if($header_image!=''){?><img src="../uploaded_files/headerimage/<?php echo $header_image;?>" width="250"><?php } ?>
				  <input name="header_image" type="file"></td></tr>
				<tr class="evanClass">
				  <td colspan="2"><!--<?php  //get_html_editor(page_description,$page_description, $width='100%', $height='150px') ?>-->
				  <?php
$oFCKeditor = new FCKeditor('FCKeditor1') ;
$oFCKeditor->BasePath = 'fckeditor/';
$oFCKeditor->Value = "$page_description";

$oFCKeditor->Width  = '700' ;
$oFCKeditor->Height = '300' ;
//$oFCKeditor->Config['CustomConfigurationsPath'] = '/myconfig.js' ;


$oFCKeditor->Create() ;
?>
				  
				  
				  </td>
				  </tr>
				
				<tr class="oddClass">
				  <td colspan="2" align="center">
				  <input type="hidden" name="flag" value="yes">
				  <input type="hidden" name="page_id" value="<?php echo $page_id;?>">
				  <input name="submit" type="image" class="submitbutton" src="images/submit.gif"></td>
				  </tr>
				</table>	
				</form>			</TD>
              </TR>
              <TR>
        <TD 
    align=left>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD>&nbsp;</TD></TR></TBODY></TABLE>
<?php include("bottom.inc.php");?></BODY></HTML>
