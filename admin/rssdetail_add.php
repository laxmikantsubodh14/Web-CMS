<?php 
include_once"../includes/midas.inc.php"; 
validate_admin();
if($_POST['flag']=="yes") {
@extract($_REQUEST);
$error='';
		if($RssdetId!='') 
		{
							 			
			//if(checkUniquenessOfString1('imp_rssdetail','question',$question,'faq_id',$faq_id))
           // $error="duplicate";
			if($error=='')
			{		 // $dbvalu = isset($_POST['Viewonhome']) ? 'Y' : 'N';						
				 $sqlUpdate="update  imp_rssdetail   set URL='$URL',Description='$Description',Status='$Status',Sortorder='$Sortorder' where RssdetId='$RssdetId'";
				$result_rsUpdate = $contact->Execute($sqlUpdate) or die($contact->ErrorMsg());
				
				$sess_msg=$sitemsgs[2];
				$_SESSION['sessionMsg']=$sess_msg;
				?>
				<script language="javascript">
				location.href="rssdetail_view.php";
				</script>
				<?php 
			
				exit;
			} 
			else  
			{ 
				$sess_msg=$sitemsgs[27];
				$_SESSION['sessionMsg']=$sess_msg;
				@extract($_POST);
				
			}
		}
		else 
		{
			//if(checkUniquenessOfString('imp_rssdetail','question',$question))
				   // $error='duplicate';		
				if($error=='')
				  {
				     

					$sqlInsert="insert into  imp_rssdetail  (URL,Description,Status,Sortorder)
					values('".$URL."','".$Description."','".$Status."','".$Sortorder."')";
				     $rsInsert=$contact->Execute($sqlInsert) or die($contact->ErrorMsg());
					$sess_msg=$sitemsgs[3];
					$_SESSION['sessionMsg']=$sess_msg;
					?>
				<script language="javascript">
				location.href="rssdetail_view.php";
				</script>
				<?php 
					
					exit;
				}
				else
				{
					$sess_msg=$sitemsgs[27];
					$_SESSION['sessionMsg']=$sess_msg;
					@extract($_POST);
				
				}
		}
		
}

if(isset($RssdetId))
{
	$sqlBid="select * from   imp_rssdetail  where RssdetId='".$RssdetId."'";
	$recordSet=$contact->Execute($sqlBid) or die($contact->ErrorMsg());
    $NumRecords=$recordSet->RecordCount();
	
}

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0049)http://69.61.15.150/~dish/admin/admin_desktop.php -->
<HTML><HEAD><TITLE><?php echo $title_message;?></TITLE>
<script language="javascript" src="js/validation.js"></script>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1"><LINK 
href="css/css.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<script language=javascript>
function valid_list()
{
 
	  	if(document.form1.URL.value=="")
	{
		alert("Please Enter URL");
		document.form1.URL.focus();
		return false;
	}
		  
	
	return true;
}
</script>
<style type="text/css">
<!--
 .text_border    {
    width:70px;
    border:#FFFFFF solid 1px;
    font-family:verdana;
    font-size:10px;
    height:12px;
    color:#545454;
    }
-->	
</style>
<script language="javascript">

function textCounter(field,cntfield,maxlimit) {
if (field.value.length > maxlimit) // if too long...trim it!
field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
else
cntfield.value = maxlimit - field.value.length;
}
//  End -->
</script>
</HEAD>
<BODY><?php include("top.inc.php");?>
<table width="100%" border="0" cellpadding="4" cellspacing="1">

<!--<tr>
	<td></td>
</tr> -->
<tr>
 <td>
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
                <TD class=blueheading align=left width="56%"> RSS Info </TD>
				
					<td width="41%" align="right">
			</TR></TBODY></TABLE></TD></TR>
        <TR>
          <TD vAlign=top align=middle bgColor=#ffffff>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD align=center>&nbsp;</TD>
              </TR>
              <TR>
                <TD align=center>
						</TD>
              </TR> <TR>
                <TD align=center>&nbsp;</TD>
              </TR>
              <TR>
                <TD height=260 align=left valign="top">
<form name="form1" method="post" action="rssdetail_add.php" onSubmit="return valid_list('form1');">
				<table width="80%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr>
				      <td align="left" class="white_bold">Add/Edit Details </td>
				      <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				    </tr></table>				  </td>


	<!--			<tr class="oddClass">
		<td align="left"> <span class="fieldsname">Select Category Name</span><font class="red_txt">*</font></td>
		     <td width="77%">
		   
				  <?
/* $SqlLaonType="select * from imp_rss ";
 $ResultLoanType=mysql_query($SqlLaonType);	*/
?>	
				  
				  
				  
				  
				  
		   <select name="RssId" >
		     <option value=""> -- Select -- </option>
			   <? //while($RowsLoanType=mysql_fetch_array($ResultLoanType)) { ?>
			 <option value="<?=$RowsLoanType['RssId'] ?>"<?php //if($RowsLoanType['RssId']==$arr_total['RssId'])echo"selected";?> > <?=$RowsLoanType['Name'] ?> </option>
               <? //} ?>
		   </select>
		</td></tr>-->
		
			  <tr class="evanClass">
				  <td><span class="fieldsname"> Rss URL: </span><font class="red_txt">*</font></td>
				  <td>
				     <input type="text" name="URL" value="<?php echo $recordSet->fields['URL']; ?>">
				  </td></tr>		

						  <tr class="oddClass">
				  <td><span class="fieldsname"> Description: </span><font class="red_txt">*</font></td>
				  <td>
				  <textarea name="Description" rows="5" cols="25"><?php echo $recordSet->fields['Description']; ?></textarea>
				</td></tr>				
					  <tr class="evanClass">
				  <td><span class="fieldsname"> Sortorder: </span><font class="red_txt"></font></td>
				  <td>
				     <input type="text" name="Sortorder" value="<?php echo $recordSet->fields['Sortorder']; ?>">
				  </td></tr>	
										
									
								
				<tr class="oddClass">
				  <td class="fieldsname">Status</td>
				  <td>
				  <select name="Status" class="list_menu_status">
				   <option value="Y" <?php if($recordSet->fields['Status'] =="Y") { echo"selected"; }?>>Active</option>
				  <option value="N" <?php if($recordSet->fields['Status'] =="N") { echo"selected"; }?>>InActive</option>
				  </select></td>
				  </tr>
				  
				  
				<tr class="evanClass">
				  <td>&nbsp;</td>
				  <td>
				  <input type="hidden" name="flag" value="yes">
				  <input type="hidden" name="RssdetId" value="<?php echo $_REQUEST['RssdetId'];?>">
				  <input name="submit" type="image" class="submitbutton" src="images/submit.gif"></td>
				  </tr>
				</table>	</form>			</TD>
              </TR>
              <TR>
        <TD 
    align=left>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD>&nbsp;</TD></TR></TBODY></TABLE></td></tr></table>
<?php include("bottom.inc.php");?></BODY></HTML>