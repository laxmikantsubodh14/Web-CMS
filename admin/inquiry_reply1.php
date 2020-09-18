<?php include_once "../includes/midas.inc.php"; 
//validate_admin();


$querySelect="Select * from imp_inquiry where Enq_ID='$inquiry_id'";
	$resultSelect=$contact->Execute($querySelect) or die($contact->ErrorMsg());
	//$rowSelect=mysql_fetch_array($resultSelect);
$to= $resultSelect->fields['email'];
$TO=$to;  
$DOMAIN="www.emiratesland.com";
if($save=='send')
	   {
	      $EmailStr = "";  //EMAIL STAFF
$EmailStr .= "emiratesland has just sent the following via the $DOMAIN web site. 
--------------------------------------------------------------------------------

INFORMATION

Reply:   $reply";
$subject='Inquiry';
  $header="From: emiratesLand";
  //mail($TO,$subject,$EmailStr,$header);
  $success='yes';
  //mail("ajay@us-creations.com",$subject,$EmailStr,$header);
  }
?>							
		
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0049)http://69.61.15.150/~dish/admin/admin_desktop.php -->
<HTML><HEAD><TITLE><?=$title_message;?></TITLE>
<script language="javascript" src="js/validation.js"></script>
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
<script language="javascript">


function PostSearchForm()
{
   	if(document.AddForm.reply.value=="")
	{
		alert("Please Enter Data To Reply  !!");
		document.AddForm.reply.focus();
		return false;
	}
  
	return true;
}
 </script>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1"><LINK 
href="css/css.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
</HEAD>
<BODY><?php include("top.inc.php");?>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  
  
  <TR>
    <TD align=middle>
      <TABLE width="100%" border=0 align="center" cellPadding=0 cellSpacing=1 bgColor=#bccad2>
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
                <TD class=blueheading align=left width="56%">Reply </TD>
					<td width="41%" align="right"><a href="inquiry_view.php">
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
                <TD align=center><?=display_session_msg();?></TD>
              </TR> <TR>
                <TD align=center>&nbsp;</TD>
              </TR>
              <TR>
                <TD height=260 align=left valign="top">

				<form enctype="multipart/form-data" action="inquiry_reply1.php?send=yes" method="post" name="AddForm" id="AddForm" onsubmit='return PostSearchForm()' >

				
				<table width="80%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="4" class="white_txt">
				  <table width="80%" border="0" cellpadding="0" cellspacing="0">
				    <tr><td colspan="2" align="left" class="white_bold"> Reply</td>
				    <td align="right" colspan="2" class="white_bold"><font class="red_txt">*</font> Required </td>
				    </tr></table>				  </td>
				</tr>
				<tr class="oddClass"><td><span class="MaintTableHeading1"><strong>To:</strong></span><font class="red_txt">*</font></td>
				 <td width="357" colspan=3><? echo $resultSelect->fields['email'];?></td></tr>
			
				
				 <tr class="evanClass">
				  <td><span class="MaintTableHeading1"><strong>Name</strong></span><font class="red_txt">*</font></td>
				  <td width="357" colspan=3><? echo $resultSelect->fields['Name'];?></td></tr>
			
				
				  <tr class="oddClass">
				  <td><span class="MaintTableHeading1"><strong>Contact No</strong></span><font class="red_txt">*</font></td>
				  <td width="357" colspan=3><? echo $resultSelect->fields['Telephone'];?></td></tr>

                    <tr class="evanClass">
				  <td><span class="MaintTableHeading1"><strong>Information Required</strong></span><font class="red_txt">*</font></td>
				  <td width="357" colspan=3><? echo $resultSelect->fields['description'];?></td></tr>


                    <tr class="oddClass">
                  <td><span class="MaintTableHeading1"><strong>Reply Text</strong></span><font class="red_txt">*</font></td>
				  <td colspan="3">
		<input readonly type="text" name="remLen1" size="10"  value="4294967295" class="text_border"> Characters Remaining <br>
				  <textarea name="reply" rows="8" cols="55" onKeyDown="textCounter(document.AddForm.reply,document.AddForm.remLen1,4294967295)"
onKeyUp="textCounter(document.AddForm.reply,document.AddForm.remLen1,4294967295)"><? echo "$reply"?></textarea></td>
			</tr>
				 <tr class="oddClass">
    <td colspan="2" align="center" bgcolor="#F6F6F6" class="brdtopgrey brdbtmgrey"><td align="center" colspan="2">
		
		  <input type="submit" value="send" name="save">
      <input type="hidden" name="inquiry_id" value="<? echo($inquiry_id); ?>">
</td>
  </tr>
				</table>	</form>			</TD>
              </TR>
              <TR>
        <TD 
    align=left>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD>&nbsp;</TD></TR></TBODY></TABLE>
<? include("bottom.inc.php");?></BODY></HTML>
