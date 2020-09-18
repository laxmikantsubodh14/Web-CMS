<?php 
include_once"../includes/midas.inc.php"; 
validate_admin();
if($_POST['flag']=="yes") {
@extract($_REQUEST);
$error='';
		if($StatesID!='') 
		{
							 			
			if(checkUniquenessOfString1('imp_states','StatesName',$StatesName,'StatesID' ,$StatesID))
            $error="duplicate";
			if($error=='')  
			{		
			       			   		
					
									
				$sqlUpdate="update imp_states  set country_id ='$country_id', StatesName='$StatesName', Status='$Status', MetaTitle='$MetaTitle',MetaDescription='$MetaDescription',MetaKeyword='$MetaKeyword',StateJobDesc=\"".trim(addslashes(stripslashes($StateJobDesc1)))."\" , StateConsultent = \"".trim(addslashes(stripslashes($StateConsultent1)))."\", ShortStateJobDesc=\"".trim(addslashes(stripslashes($ShortStateJobDesc)))."\", IsLeftMenu='$IsLeftMenu', Statesshort='$Statesshort'  where StatesID='$StatesID'";
				$result_rsUpdate = $contact->Execute($sqlUpdate) or die($contact->ErrorMsg());
				
				$sess_msg=$sitemsgs[28];
				$_SESSION['sessionMsg']=$sess_msg;
				?>
				<script language="javascript">
				location.href="state_view.php";
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
			if(checkUniquenessOfString('imp_states','StatesName',$StatesName))
				    $error='duplicate';		
				if($error=='')   //\"".trim(addslashes(stripslashes($StateConsultent1)))."\"
				{
				   
				   
					
				   $sqlInsert="insert into imp_states (country_id, StatesName, Status, MetaTitle, MetaDescription, MetaKeyword, StateJobDesc, StateConsultent,ShortStateJobDesc, Statesshort, IsLeftMenu)values('".$country_id."','".$StatesName."', '".$Status."', '".$MetaTitle."' , '".$MetaDescription."' , '".$MetaKeyword."', \"".trim(addslashes(stripslashes($StateConsultent1)))."\" ,\"".trim(addslashes(stripslashes($StateConsultent1)))."\",\"".trim(addslashes(stripslashes($ShortStateJobDesc)))."\",'".$Statesshort."','".$IsLeftMenu."')";
				     $rsInsert=$contact->Execute($sqlInsert) or die($contact->ErrorMsg());
					$sess_msg=$sitemsgs[26];
					$_SESSION['sessionMsg']=$sess_msg;
					?>
				<script language="javascript">
				location.href="state_view.php";
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

if(isset($StatesID))
{
	$sqlBid="select * from  imp_states where StatesID='".$StatesID."'";
	$recordSet=$contact->Execute($sqlBid) or die($contact->ErrorMsg());
    $NumRecords=$recordSet->RecordCount();
	//$rsBid=executeQuery($sqlBid);
	//$arrB=mysql_fetch_array($rsBid);
	//@extract($arrB);
}

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0049)http://69.61.15.150/~dish/admin/admin_desktop.php -->
<HTML><HEAD><TITLE><?php echo $title_message;?></TITLE>
<script language="javascript" src="js/validation.js"></script>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1"><LINK 
href="css/css.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
</HEAD>
<BODY><?php include("top.inc.php");?>
<table width="100%" border="0" cellpadding="4" cellspacing="1">

<tr>
	<td><?php //include("../includes/topNavigation.php");?></td>
</tr> 
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
                <TD class=blueheading align=left width="56%">State Info </TD>
				
					<td width="41%" align="right"><a href="state_view.php">
					<img src="images/return_back.gif" border="0"></a></td>
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
<form name="form1" method="post" action="state_add.php" onSubmit="return valid_state('form1');">
				<table width="80%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr>
				      <td align="left" class="white_bold">Add/Edit Details </td>
				      <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				    </tr></table>				  </td>
				<?php
           $sql="select * from  imp_country where Status='Y' order by country";
		  $recordSet2=$contact->Execute($sql) or die($contact->ErrorMsg());
//;
//print_r($Row);
		?>
				<tr class="oddClass">
		<td align="left"><span class="fieldsname">Country</span><font class="red_txt">*</font></td>
		<td>
				 <div id="outputText">	 
				<select name="country_id" class="list_menu">
				<option value=""  selected="selected"><< Select Country >></option>
				<?php 
				while(!$recordSet2->EOF)
				{
				  $country_id=$recordSet->fields['country_id'];
				   if($country_id=='')
				       $TempCounty=99;
				     else
				       $TempCounty=$recordSet->fields['country_id']
				
				?>
				<option value="<?php echo $recordSet2->fields["country_id"];?>"  <?php if($recordSet2->fields["country_id"]==$TempCounty) echo "selected" ?>><?php echo $recordSet2->fields["country"];?></option>
				<?php $recordSet2->MoveNext();
				}
				
				$recordSet2->Close();?>
				</select>
				</div>	
					 </td>
				
				

				  
				 
 

				  			  
				  <tr class="evanClass">
				  <td><span class="fieldsname">States:</span><font class="red_txt">*</font></td>
				  <td><input name="StatesName" type="text"  value="<?php echo $recordSet->fields['StatesName']; ?>"></td></tr>
								
				
				
								
				<tr class="oddClass">
				  <td class="fieldsname"> Status </td>
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
				  <input type="hidden" name="StatesID" value="<?php echo $_REQUEST['StatesID'];?>">
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














