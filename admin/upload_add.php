<?php include_once("../includes/midas.inc.php"); 
validate_admin();
if($_POST['flag']=="yes") {
@extract($_REQUEST);
$error='';


if($File_id!='') 
   {
							 			
	 if(checkUniquenessOfString1('imp_file','File_name',$File_name,'File_id' ,$File_id))
	
	 $error="duplicate File Name";
	 if($error=='')
	 {	
			
	
	if (trim($_FILES['file']['name']) != "")//if image given
	{
		
			
			$uniq=time();
			$imageName2 = $uniq."_".trim($_FILES['file']['name']);
			if (!copy ($_FILES['file']['tmp_name'], "../uploaded_files/uploadepdf/".$imageName2)) 
			 $error="upload";
		    else
		    {
			    $image_sql="select pdf from imp_file where File_id='$File_id'";
				$image_result=mysql_query($image_sql);
				$image_cat=mysql_fetch_array($image_result);
				$src="../uploaded_files/uploadepdf/$image_cat[pdf]"; 
				if($image_cat['pdf'] !='')
					unlink($src);
			}
		       $query_update="update imp_file set pdf='$imageName2' where File_id='$File_id'";
	    	   $result_update=mysql_query($query_update) or die("Error: in Updating Image");
	}//end of if image given
		
			
		   
		   $currentDate= date("Y-m-d");
			$sql_update = "update imp_file set File_name ='$File_name', CurrentDate =$currentDate, Description='$Description',Sortorder='$Sortorder',view='$view',download='$download',Status='$Status'";				
			
			$sql_update.= "where File_id='$File_id'";
			$result_rsUpdate = $contact->Execute($sql_update) or die($contact->ErrorMsg());	
			if($user_id!='')
				   {
			        $SqlDeleteCust="delete from imp_filecust where File_id ='$File_id'";
					$ResultDeleteCust=$contact->Execute($SqlDeleteCust);
			        foreach($user_id as $user_id)
					{
					 $sql_insertcust="insert into imp_filecust(File_id,user_id) values('$File_id',$user_id)";
					 $rsInsert1=$contact->Execute($sql_insertcust) or die($contact->ErrorMsg());
					 }
//			echo $sql_update; exit;
}
					
			
				
				$sess_msg=$sitemsgs[2];
				$_SESSION['sessionMsg']=$sess_msg;
				?>
				<script language="javascript">
				location.href="upload_view.php";
				</script>
				<?php 
			
				exit;
			}
			 
			else  
			{ 
				$sess_msg=$sitemsgs[11];
				$_SESSION['sessionMsg']=$sess_msg;
				@extract($_POST);
				
			}
		}
		else 
		{
			if(checkUniquenessOfString('imp_file','File_name',$File_name))
			$error="duplicate File Name";
					
				if($error=='')
				{
				
				
	if (trim($_FILES['file']['name']) != "")//if image given
	{
			
			$uniq=time();
			echo $imageName2 = $uniq."_".trim($_FILES['file']['name']);
			if (!copy ($_FILES['file']['tmp_name'], "../uploaded_files/uploadepdf/".$imageName2)) 
			$error="upload";
		
		}//end of if image given

		
		
		
		

				    $currentDate= date("Y-m-d");
					 $sqlInsert="insert into imp_file (File_name,CurrentDate,pdf,Description,Sortorder,view,download,Status) values ('$File_name','$currentDate','$imageName2','$Description','$Sortorder','$view','$download','$Status')";
				     $rsInsert=$contact->Execute($sqlInsert) or die($contact->ErrorMsg());
					 $LastinsertId=mysql_insert_id();
					 if($user_id!='')
				   {
					 foreach($user_id as $user_id)
						{
					 $sql_insertcust="insert into imp_filecust(File_id,user_id) values('$LastinsertId',$user_id)";
					 $rsInsert1=$contact->Execute($sql_insertcust) or die($contact->ErrorMsg());
					 }
					 }
					$sess_msg=$sitemsgs[3];
					$_SESSION['sessionMsg']=$sess_msg;
					?>
				<script language="javascript">
				location.href="upload_view.php";
				</script>
				<?php 
					
					exit;
				}
				else
				{
					$sess_msg=$sitemsgs[11];
					$_SESSION['sessionMsg']=$sess_msg;
					@extract($_POST);
				
				}
		}
		
}
$extMem=array();
if(isset($File_id))
{
	$sqlBid="select * from  imp_file where File_id='".$File_id."'";
	$recordSet=$contact->Execute($sqlBid) or die($contact->ErrorMsg());
    $NumRecords=$recordSet->RecordCount();
	
	$sqlBid2=mysql_query("select * from  imp_filecust where File_id='".$File_id."'");
	$m=0;
	
	while($recordSet2=mysql_fetch_array($sqlBid2))
	{
	 $extMem[$m]=$recordSet2['user_id'];
	 $m++;
	}
	//$rsBid=executeQuery($sqlBid);
	//$arrB=mysql_fetch_array($rsBid);
	//@extract($arrB);
}

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0049)http://69.61.15.150/~dish/admin/admin_desktop.php -->
<HTML><HEAD><TITLE><?php echo $title_message;?></TITLE>
<script language="javascript" src="js/validation.js"></script>
<script language=javascript>
function PostSearchForm()
{
   	if(document.form1.File_name.value=="")
	{
		alert("Please Enter File name !!");
		document.form1.File_name.focus();
		return false;
	}
	if(document.form1.Status.value=="")
	{
		alert("Please Enter status !!");
		document.form1.Status.focus();
		return false;
	}
	
	
	return true;
}

function onRemove()
{
   	document.form1.action="<?=$PHP_SELF;?>?removeImage=yes";
   	document.form1.submit();
}
</script>
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


<META http-equiv=Content-Type content="text/html; charset=iso-8859-1"><LINK 
href="css/css.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<style type="text/css">
<!--
 .text_border    {
    width:35px;
    border:#FFFFFF solid 1px;
    font-family:verdana;
    font-size:10px;
    height:12px;
    color:#545454;
    }
-->	
</style>

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
                <TD class=blueheading align=left width="56%">Upload File </TD>
				
					<td width="41%" align="right"><a href="upload_view.php">
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
                <TD align=center>
				<?

echo display_session_msg();?></TD>
              </TR> <TR>
                <TD align=center>&nbsp;</TD>
              </TR>
              <TR>
                <TD height=260 align=left valign="top">
<form name="form1" enctype="multipart/form-data" method="post" action="upload_add.php" onSubmit='return PostSearchForm();'>
				<table width="80%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr>
				      <td align="left" class="white_bold">Add/Edit File</td>
				      <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				    </tr></table>				  </td>
					<tr class="oddClass">
				  <td><span class="fieldsname">Current Date:</span></td>
				  <td>  <?php echo date('m-d-Y');?> </td></tr>
				
				
				 <tr class="evanClass">
				  <td><span class="fieldsname">File Name:</span><font class="red_txt">*</font></td>
				  <td><input name="File_name" type="text" size="40"   value="<?php if(isset($File_id)){echo $recordSet->fields['File_name']; } else echo $_REQUEST['File_name']; ?>"></td>
				</tr>
			 
 <tr class="oddClass">
		<td><span class="fieldsname"> File:</span><font class="red_txt"></font></td>
		<td><input type="file" name="file" size="26" value="<?php if(isset($File_id)){echo $recordSet->fields['pdf']; } else echo $_REQUEST['pdf']; ?> " class='bordered'>
		<?php if($recordSet->fields['pdf']=="")
	{
		echo "No File Available";
	}
	else
	{?>
		
		<?php echo($recordSet->fields['pdf']); ?>
		 <?php } ?></td>
   </tr>
   
   <tr class="evanClass">
				  <td>&nbsp;</td>
				  <td><i>(Accepted file formats are : .doc, .pdf, .ppt, .xls, .txt)</i></td>
				</tr>
   	  
		<tr class="evanClass">
				  <td><span class="fieldsname">Description:</span><font class="red_txt">*</font></td>
				  <td><TEXTAREA NAME="Description" ROWS="2" COLS="20" ><?php if(isset($File_id)){echo $recordSet->fields['Description']; } else echo $_REQUEST['Description']; ?> </textarea></td></tr>
							
							<tr class="oddClass">
				  <td><span class="fieldsname">Sort Order:</span><font class="red_txt">*</font></td>
				  <td><input name="Sortorder" type="text"  value="<?php if(isset($File_id)){echo $recordSet->fields['Sortorder']; } else echo $_REQUEST['Sortorder']; ?> " ></td></tr>
				  
<?php 
$CatSql="select * from imp_customer order by user_id";
$CatRes=mysql_query($CatSql);
?>

<tr class="evanClass">
<td><span class="fieldsname">Customer :</span><font class="red_txt">*</font></td>
<td><select name="user_id[]" multiple="multiple" size="3">

<? while($CatRow=mysql_fetch_array($CatRes)) {?>
<option value="<? echo $CatRow['user_id'];?>"<? if(in_array($CatRow['user_id'],$extMem)) echo"selected";?>>
<? echo $CatRow['user_fname'].$CatRow['user_lname'];?></option>
<? }  ?>
</select></td>

</tr>	
<tr class="oddClass">
				  <td><span class="fieldsname">Permission:</span><font class="red_txt">*</font></td>
				  <td><input type="checkbox" name="view" value="Y" <?php if($recordSet->fields['view'] =="Y") { echo "checked"; } ?> />View &nbsp; <input type="checkbox" name="download" value="Y" <?php if($recordSet->fields['download'] =="Y") { echo "checked"; }?> />Download &nbsp;</td></tr>
				  
				  
								
				<tr class="evanClass">
				  <td class="fieldsname">Status: </td>
				  <td>
				  <select name="Status" class="list_menu_status">
				  <option value="Y" <?php if($recordSet->fields['Status'] =="Y") { echo"selected"; }?>>Active</option>
				  <option value="N" <?php if($recordSet->fields['Status'] =="N") { echo"selected"; }?>>InActive</option>
				  </select></td>
				  </tr>
				  
				  
				<tr class="oddClass">
				  <td>&nbsp;</td>
				  <td>
				  <input type="hidden" name="flag" value="yes">
				  <input type="hidden" name="File_id" value="<?php echo $_REQUEST['File_id'];?>">
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