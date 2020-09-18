<?php include_once"../includes/midas.inc.php"; 
validate_admin();
include("fckeditor/fckeditor.php") ;
include_once("../includes/PHPMailer/class.phpmailer.php");
if($_POST['flag']=="yes")
{
 
  
$atachment=$_FILES['user_file']['tmp_name'];
$fileName=$_FILES['user_file']['name'];	
$content =  $_POST['FCKeditor1'];	  
$mail = new PHPMailer();
$body2    = eregi_replace("[\]",'',$content);
$subject2 = eregi_replace("[\]",'',$_REQUEST['subject']);
$mail->From     = "info@SynergyIT.com";
$mail->FromName = "Newsletter Synergy IT";
$mail->AddAttachment("$atachment", "$fileName");
$mail->Subject =  $subject2;
$mail->AltBody = " "; // optional, comment out and test
$mail->MsgHTML($body2);
$email=explode(',',$tempEmails);
  /*for ($i=0;$i<count($email);$i++)
		{
			$sql="select * from dgc_emails where EMAIL_ID='$email[$i]'";
			$result=mysql_query($sql);
		    $row=mysql_fetch_array($result);
			$emails=$row['EMAILS'];
		    $mail->AddAddress("$emails", "");		

   }*/
foreach($select2 as $val)
{
 $mail->AddAddress("$val", "");	
}
//foreach($select5 as $val)
//{
 //$mail->AddAddress("$val", "");	
//}
if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

//echo "Message has been sent";
?>
<SCRIPT LANGUAGE="JavaScript">
	 location.href= "newsletter_send_mail.php?sendMail=yes";
</SCRIPT>
<?
	
}

if(isset($EMAIL_ID))
{
	$sqlBid="select * from  imp_emails  where EMAIL_ID='".$EMAIL_ID."'";
	$recordSet=$contact->Execute($sqlBid) or die($contact->ErrorMsg());
    $NumRecords=$recordSet->RecordCount();
	//@extract($arrB);
}

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0049)http://69.61.15.150/~dish/admin/admin_desktop.php -->
<HTML><HEAD><TITLE><?php echo $title_message;?></TITLE>
<script language="javascript" src="js/validation.js"></script>

<META http-equiv=Content-Type content="text/html; charset=iso-8859-1"><LINK 
href="css/css.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<script language="JavaScript" type="text/javascript">
var cat_xmlHttp
function email_filter(str,filter)
{ 
	//alert(str);
	cat_xmlHttp=GetXmlHttpObject()
	if (cat_xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	} 
url="directoryEmail.php?value="+str+"&filt="+filter; 
//alert(url);
url=url+"&sid="+Math.random()

cat_xmlHttp.onreadystatechange=stateChanged121
cat_xmlHttp.open("GET",url,true)
cat_xmlHttp.send(null)

}
function stateChanged121() 
{ 
if (cat_xmlHttp.readyState==4 || cat_xmlHttp.readyState=="complete")
{ 
	var st11 = cat_xmlHttp.responseText;
		

	document.getElementById('ddd').innerHTML=st11; 

}
} 
function GetXmlHttpObject()
{ 
	var objXMLHttp=null
	if (window.XMLHttpRequest)
	{
		objXMLHttp=new XMLHttpRequest()  
	}
	else if (window.ActiveXObject)
	{
		objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
	}
	return objXMLHttp
}

function explodeArray25(item,delimiter) 
{
  tempArray=new Array(1);
  var Count=0;
  var tempString=new String(item);

while (tempString.indexOf(delimiter)>0) {
    tempArray[Count]=tempString.substr(0,tempString.indexOf(delimiter));
    tempString=tempString.substr(tempString.indexOf(delimiter)+1,tempString.length-tempString.indexOf(delimiter)+1); 
    Count=Count+1
  }

  tempArray[Count]=tempString;
  return tempArray;
}
</script>

<script language=javascript>
var arrOldValues;

function SelectAllList(CONTROL)
{
	for(var i = 0;i < CONTROL.length;i++)
		{
			CONTROL.options[i].selected = true;
		}
}

function DeselectAllList(CONTROL)
{
	for(var i = 0;i < CONTROL.length;i++)
		{
			CONTROL.options[i].selected = false;
		}
}

function FillListValues(CONTROL)
{
	var arrNewValues;
	var intNewPos;
	var strTemp = GetSelectValues(CONTROL);
	arrNewValues = strTemp.split(",");
	for(var i=0;i<arrNewValues.length-1;i++)
	{
		if(arrNewValues[i]==1){
		intNewPos = i;
	}
}

for(var i=0;i<arrOldValues.length-1;i++)
{
	if(arrOldValues[i]==1 && i != intNewPos)
		{
			CONTROL.options[i].selected= true;
		}
	else if(arrOldValues[i]==0 && i != intNewPos)
		{
			CONTROL.options[i].selected= false;
		}
	if(arrOldValues[intNewPos]== 1)
		{
			CONTROL.options[intNewPos].selected = false;
		}
	else
		{
			CONTROL.options[intNewPos].selected = true;
		}
	}
}

function GetSelectValues(CONTROL)
	{
		var strTemp = "";
		for(var i = 0;i < CONTROL.length;i++)
			{
				if(CONTROL.options[i].selected == true)
					{
						strTemp += "1,";
					}
				else
					{
						strTemp += "0,";
					}
			}
	return strTemp;
}
function GetCurrentListValues(CONTROL){
var strValues = "";
strValues = GetSelectValues(CONTROL);
arrOldValues = strValues.split(",")
}

function onSave1()
{
	if(stringTrim(document.frm.subject.value)=="")
	{
         alert("Please Enter Subject of Email!!");
         document.frm.subject.focus();
		 return false;
    }
	if(stringTrim(document.frm.select2.value)=="")
	{
         alert("Please Choose Atleast one Email!!");
         document.frm.select2.focus();
		 return false;
    }

	var emailString="";
	for (y=0; y<document.frm.select2.options.length; y++) 
	{ 
		if(document.frm.select2.options[y].selected == true)
		{
			if(emailString=="")
			{
				emailString = document.frm.select2.options[y].value;
			}
			else
			{
				emailString = emailString + ','+document.frm.select2.options[y].value;
			}
		}
	}
	document.frm.tempEmails.value=emailString;
	return true;
}
</script>
</HEAD>
<BODY><?php include("top.inc.php");?>
<table width="90%" border="0" cellpadding="4" cellspacing="1">


<tr>
 <td>
<TABLE cellSpacing=0 cellPadding=0 width="90%" border=0>
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
                <TD class=blueheading align=left width="56%">Send Newsletters </TD>
				
					<td width="41%" align="right" valign="middle">&nbsp;To View Emails &nbsp;&nbsp;<a href="emails_list.php">
					<img src="images/return_back.gif" border="0"></a></td>
              </TR></TBODY></TABLE></TD></TR>
        <TR>
          <TD vAlign=top align=middle bgColor=#ffffff>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
               
              <TR>
                <TD align=center><div align="right"> <a href="emails_add.php">Add Emails</a></div></TD>
              </TR>
              <TR>
                <TD align=center><?php echo display_session_msg();?></TD>
              </TR> <TR>
                <TD align=center>&nbsp;</TD>
              </TR>
              <TR>
                <TD height=260 align=left valign="top">
  <form name="frm" method="post" action="newsletter_send_mail.php">
				<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="4" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr>
				      <td align="left" class="white_bold">Send Emails </td>
				      <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				    </tr></table>				  </td>
			
				 
				  <tr class="oddClass">
				  <td><span class="fieldsname"> Subject:</span><font class="red_txt">*</font></td>
				  <td colspan="3"><INPUT id=tt TYPE="text" NAME="subject" value="<?=$recordSet->fields['subject'];?>" size=37 class="tex"></td></tr>
								
								
								
				<tr class="evanClass">
				  <td class="fieldsname" nowrap="nowrap">Choose Emails *</td>
				  <td>Signed Up Emails<br><br>
				 <SELECT style="width:250" id="select2" multiple=10 NAME="select2[]" onMouseDown="GetCurrentListValues(this);" onChange="FillListValues(this);" class="tex">
<?
		$query_email="select * from imp_emails where APPROVE='Y' order by EMAILS";
		//$result_email=mysql_query($query_email);
		$result_email=$contact->Execute($query_email) or die($contact->ErrorMsg());
		while(!$result_email->EOF)
		{
		?>
			<option value="<? echo $result_email->fields['EMAIL_ID']; ?>"><? echo $result_email->fields['EMAILS']; ?>
			</option>
		<?php $result_email->MoveNext();
					}
					
			  $result_email->Close();?>
</SELECT>
 <br><span class="text1"><a href="javascript:SelectAllList(document.frm.select2);"><b>Select All</b></a></span>&nbsp;&nbsp;&nbsp;
<span class="text1"> <a href="javascript:DeselectAllList(document.frm.select2);"><b>Deselect All</b></a></span>
</td>




<td>Inquiry Emails<br><br>
				 <SELECT style="width:250" id="select5" multiple=10 NAME="select5[]" onMouseDown="GetCurrentListValues(this);" onChange="FillListValues(this);" class="tex">
<?php
		$query_email="select email from imp_inquiry order by email";
	    $result_email=$contact->Execute($query_email) or die($contact->ErrorMsg());
		while(!$result_email->EOF)
		{
		?>
			<option value="<? echo $result_email->fields['email']; ?>"><? echo $result_email->fields['email']; ?>
			</option>
		 <?php $result_email->MoveNext();
					}
					
			  $result_email->Close();?>
</SELECT>
 <br><span class="text1"><a href="javascript:SelectAllList(document.frm.select5);"><b>Select All</b></a></span>&nbsp;&nbsp;&nbsp;
<span class="text1"> <a href="javascript:DeselectAllList(document.frm.select5);"><b>Deselect All</b></a></span>
</td>

  </tr>		  
				  
				  
	<tr class="evanClass"><td class='bgcolor4'><B class="text1">NOTE: </B></td><td class="text1" colspan="2" nowrap="nowrap"><i>To Select Emails ,<b>Simple Click on Emails</b>, for All Selection <b>Please Click on Select All</b> , for All Deselection <b>Please Click on Deselect All</b></i><BR> </td> 
</tr>
<tr>
 <td align="center" colspan="4" class='evanClass'>
<?php 
$oFCKeditor = new FCKeditor('FCKeditor1') ;
$oFCKeditor->BasePath = 'fckeditor/';
$oFCKeditor->Value = "$content";
$oFCKeditor->Width  = '100%' ;
$oFCKeditor->Height = '300' ;
//$oFCKeditor->Config['CustomConfigurationsPath'] = '/myconfig.js' ;
$oFCKeditor->Create() ;
//$contentbodypart =  $content;
		 //include("advancededitor/advancededitor.php");?>
	</td>
</tr>
			  
				  
				<tr class="evanClass">
				  <td>&nbsp;</td>
				  <td colspan="4">
				  <input type="hidden" name="flag" value="yes">
				
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