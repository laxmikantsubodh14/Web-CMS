<?php
require_once("../includes/midas.inc.php");
validate_admin();
@extract($_REQUEST);

if($approve=='yes')
{
	for($i=0; $i<$total_record; $i++)
	{  
		if($options[$i] == 'Y')
		{ 
			$sql="select * from imp_tempemails where EMAIL_ID='$postID[$i]'";
			$resl=$contact->Execute($sql) or die($contact->ErrorMsg());
			
			while(!$resl->EOF)
			{
			 
		 $resltmail=$resl->fields[EMAILS];
	
		  if(checkUniquenessOfString('imp_emails','EMAILS',"$resltmail"))
				{
					$deltempemails="Delete from imp_tempemails where EMAIL_ID=$postID[$i]";
					
						$contact->Execute($deltempemails) or die($contact->ErrorMsg());
				}
				else
				{
					 $insertmail="insert into imp_emails (EMAILS, SUBMITTIME, APPROVE) values ('$resltmail', NOW(), 'Y')";
					//$mailQuery=mysql_query($insertmail) or die("Could not insert email");
					$recordSet=$contact->Execute($insertmail) or die($contact->ErrorMsg());
					$delemails="Delete from imp_tempemails where EMAIL_ID=$postID[$i]";
					
						$contact->Execute($delemails) or die($contact->ErrorMsg());
					$approved='yes';
				}
			$resl->MoveNext();
							   }
			 $resl->Close(); 
		}
	}
}

if($discard == 'yes')
{ 
	for($i=0; $i<count($postID); $i++)
	{
		if($options[$i] == 'Y')
		{
			$sql="select * from imp_tempemails  where EMAIL_ID='$postID[$i]'";
			//$res=mysql_query($sql)  or die("Could not Select email");
			$res=$contact->Execute($sql) or die($contact->ErrorMsg());
			//$emailaddress=trim(mysql_result($res,0,"EMAILS"));	
			$mailstr = "";
			$mailstr .= "<html><body><form>";
			$mailstr .= "<table border align=center><tr><td colspan=2 align=center>Email from Owner</td></tr>";
			$mailstr.= "<tr><td valign=top>Message</td><td width=200 wrap>Your Email has been Denied.</td></tr>";
			$mailstr.= "</table>";
			$mailstr .= "</form></body></html>";
			//End-of-mail-string
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "From: info@us-creations.com";
			@mail($emailaddress,$subject, $mailstr, $headers);

			$delemails="Delete from imp_tempemails where EMAIL_ID=$postID[$i]";
			mysql_query($delemails) or die("Could not Deny email");		
		}
	}
	$discarded ='yes';
}
####################################################################################################################
$start = intval($start);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$columns = "select * ";
$sql = " from  imp_tempemails  where 1 ";
$sql = apply_filter($sql, $adm_login_id, $adm_login_id_filter,'EMAILS');
$order_by == '' ? $order_by = 'EMAILS' : true;
$order_by2 == '' ? $order_by2 = 'asc' : true;
$sql .= "order by $order_by $order_by2 ";
$sql_count = "select count(*) ".$sql; 
$sql .= "limit $start, $pagesize ";
$sql = $columns.$sql;
$result = $contact->Execute($sql) or die($contact->ErrorMsg());
$Total_Records=$result->RecordCount();  $result->fields[0];
$reccnt = db_scalar($sql_count);
?>
<link href="styles.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="../includes/general.js"></script>
<SCRIPT LANGUAGE="JavaScript">
<!--

function checkAll()
{
    if(document.postApprovalForm .checkall.checked==true)
    {
        for (i=0; i <document.postApprovalForm.elements.length; i++)
        {
            var e = document.postApprovalForm .elements[i];
            if (e.type == 'checkbox')
                e.checked = true;
        }
    }
    else
    {
        for (i=0; i < document.postApprovalForm.elements.length; i++)
        {
            var e = document.postApprovalForm.elements[i];
            if (e.type == 'checkbox')
                e.checked = false;
        }
    }
}


function onApprove()
{
	var flag = 0;
	for(i = 0; i < (document.postApprovalForm.elements.length); i++)
	{
		if((document.postApprovalForm.elements[i].type=="checkbox") && (document.postApprovalForm.elements[i].checked==true))
		{
			flag = 1;
			break;
		}
	}
	if(flag == 1)
	{
		if(confirm("Are you sure you want to Approve?"))
			flag = 1;
		else
			flag = 0;
	}
	else
	{
		alert("Nothing to Approve.");
		flag = 0;
	}
	if(flag == 1)
	{
		actionstr = document.postApprovalForm.action + "?approve=yes";
		document.postApprovalForm.action=actionstr ;
		document.postApprovalForm.submit();
	}
}

function onDiscard()
{
	var flag = 0;
	for(i = 0; i < (document.postApprovalForm.elements.length); i++)
	{
		if((document.postApprovalForm.elements[i].type=="checkbox") && (document.postApprovalForm.elements[i].checked==true))
		{
			flag = 1;
			break;
		}
	}
	if(flag == 1)
	{
		if(confirm("Are you sure you want to Deactivate?"))
			flag = 1;
		else
			flag = 0;
	}
	else
	{
		alert("Nothing to Deactivate.");
		flag = 0;
	}
	if(flag == 1)
	{
		actionstr = document.postApprovalForm.action + "?discard=yes";
		document.postApprovalForm.action=actionstr ;
		document.postApprovalForm.submit();
	}
}
//-->
</SCRIPT>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<?php include("top.inc.php");?>
<title>Untitled Document</title><div id="content">


<table width="100%" border="0" cellpadding="4" cellspacing="1">


<tr>
 <td>
<table width="100%" border="0" cellpadding="4" cellspacing="1" class="tblBackColor">
  <tr bgcolor="#FFFFFF"><td><table width="100%" border="0" cellpadding="0" cellspacing="0" style="BACKGROUND-IMAGE: url(images/tablebgrep.gif)">
    <tr><td width="3%" class="pageHead"><img height="17" alt="" 
                  src="images/orangebullet.gif" width="17" 
                vspace="3" /></td>
    <td width="97%" align="left"><div id="pageHead">View New Emails</div></td></tr></table>
</td></tr>
 
<tr><td height="200" bgcolor="#FFFFFF"><table width="100%">
  <tr><td><br> <?php echo display_session_msg();?></td></tr>

<tr><td height="250" valign="top"><br>
       <div align="right"> <a href="emails_add.php">Add Emails</a> </div>
       <?php if($Total_Records==0){?>

    <div class="msg">Sorry, no records found.</div>
<?php } else{ ?>
  <div align="right">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <tr><td width="77%">&nbsp;</td>
	  <td width="23%" align="right">    <span class="fieldsname">Showing Records:</span> 
      <?php echo $start+1?>
      <span class="fieldsname">      to</span> 
      <?php echo ($reccnt<$start+$pagesize)?($reccnt-$start):($start+$pagesize)?>
      <span class="fieldsname">      of</span>      <?php echo $reccnt ?></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td align="right">&nbsp;</td>
	    </tr>
	</table>
  </div>


  <div><span class="fieldsname">Records Per Page</span>:
    <?php echo pagesize_dropdown('pagesize', $pagesize);?>
</div>
 
<form name= "postApprovalForm" action="<?php echo $PHP_SELF;?>" method='post'>
  <table width="100%"  border="0" cellpadding="3" cellspacing="1" bgcolor="#d8d8d8" class="tableList" >
    <tr>
	      <th width="8%" nowrap> SNo. </th>
             <th width="17%" nowrap>Emails <?php echo sort_arrows('EMAILS')?></th>
			
          <th width="4%"><input name="check_all" type="checkbox" id="check_all" value="1" onClick="checkall(this.form)"></th>
	 </tr>
  
  <?php
  $i=1;
  $j=0;
while (!$result->EOF) 
{
	//$line = ms_display_value($line_raw);
	//@extract($line);
	$css = ($css=='trOdd')?'trEven':'trOdd';
	if($result->fields['APPROVE']=="N") { $css="disable_row"; }
?>   <tr class="<?php echo $css?>">
      	      <td nowrap><?php echo $i ;?> </td>			 		  
       <td nowrap><strong><b><?php echo $result->fields['EMAILS']; ?></b></strong></td>
			
           
		   

		  
   <td width="4%" align="center" nowrap><input type="checkbox"  name="options[<?php echo $j; ?>]"  value='Y'>
							<input type=hidden name="postID[<? echo $j++; ?>]" value="<? echo $result->fields["EMAIL_ID"] ?>"></td>    
 </tr><?php 
   $i++; 
 
   $result->MoveNext();
							   }
							     $result->Close();
?>
    <tr align="right">
      <td colspan="10" bgcolor="#FFFFFF"><table width="100%">
        <tr>
          <td align="left"><table cellspacing="1" cellpadding="1" class="gray_txt" border="0">
              <tr>
                <td width="20px"  class="disable_row">&nbsp;</td>
                <td>&nbsp;<span class="fieldsname">Inactive Emails. </span></td>
              </tr>
          </table></td>
          <td align="right"><input type="hidden" name="total_record" value="<?php echo $j; ?>" /><input type="submit" name="Activate" value="Approve" class="button" onClick="onApprove();" />
      |<input type="submit" name="Deactivate" value="Deny" class="button" onClick="onDiscard();" />
        
             </td>
        </tr>
      </table></td>
      </tr>
  </table>
  
  </form>
<?php }?>
<?php include("paging.inc.php");?></td>
</tr></table></td>
</tr>
</table></td></tr></table>
</div>
<?php include("bottom.inc.php");?>




