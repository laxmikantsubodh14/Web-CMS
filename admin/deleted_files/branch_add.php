<?php 
include_once"../includes/midas.inc.php"; 
validate_admin();
if($_POST['flag']=="yes") {
@extract($_POST);
		if($BanchID!='') 
		{
			$sqlCheck="select * from synergy_branch where BranchName ='$BranchName' and BanchID!='$BanchID'";				 				            $rsCheck=executeQuery($sqlCheck);
			if(mysql_num_rows($rsCheck)==0)
			{								
				$sqlUpdate="update synergy_branch set BranchName='$BranchName', IsActive='$IsActive',CityID='$CityID', StatesID='$StatesID', Phone='$Phone', Address='$Address', ZipCode='$ZipCode' where BanchID='$BanchID'";
				$rsUpdate=executeQuery($sqlUpdate);
				$sess_msg=$sitemsgs[16];
				$_SESSION['sessionMsg']=$sess_msg;
				?>
				<script language="javascript">
				location.href="branch_list.php";
				</script>
				<?php 
				header("location: branch_list.php");
				exit;
			} 
			else  
			{ 
				$sess_msg=$sitemsgs[15];
				$_SESSION['sessionMsg']=$sess_msg;
				@extract($_POST);
				
			}
		}
		else 
		{
			$sqlCheck="select * from synergy_branch where BranchName ='$BranchName'";	
			$rsCheck=executeQuery($sqlCheck);
				if(mysql_num_rows($rsCheck)==0)
				{
					$sqlInsert="insert into synergy_branch   (BranchName , CityID , IsActive, StatesID, Phone, Address, ZipCode)
					values('".$BranchName."','".$CityID."','".$IsActive."','".$StatesID."','".$Phone."','".$Address."','".$ZipCode."')";
					$rsInsert=executeQuery($sqlInsert);
					$sess_msg=$sitemsgs[14];
					$_SESSION['sessionMsg']=$sess_msg;
					?>
				<script language="javascript">
				   location.href="branch_list.php";
				</script>
				<?php 
					header("location: branch_list.php");
					exit;
				}
				else
				 {
				  $sess_msg=$sitemsgs[15];
				  $_SESSION['sessionMsg']=$sess_msg;
				  @extract($_POST);
				}
		}
		
}


if(isset($BanchID))
{
	$db_query="select * from synergy_branch where BanchID='".$BanchID."'";
	$rsResult=executeQuery($db_query);
	$arr_total=mysql_fetch_array($rsResult);
	@extract($arr_total);
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE><?php echo $title_message;?></TITLE>
<script language="javascript" src="js/validation.js"></script>
<script language="javascript">
function post_search()
{

if(document.form1.CityID.value=='')
 {
  alert("Please select city ");
  document.form1.CityID.focus();
  return false;
 }

if(document.form1.BranchName.value=='')
 {
  alert("Enter a field branch name");
  document.form1.BranchName.focus();
  return false;
 }
 return true;
 }
 //CityID
 </script>
<script language="JavaScript" type="text/javascript">
var cat_xmlHttp
function dowork(str)
{ 
	//alert(str);
	cat_xmlHttp=GetXmlHttpObject()
	if (cat_xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	} 
url="city.php?value="+str
//alert(url);
url=url+"&id="+Math.random()

cat_xmlHttp.onreadystatechange=stateChanged122
cat_xmlHttp.open("GET",url,true)
cat_xmlHttp.send(null)

}
function stateChanged122() 
{ 
if (cat_xmlHttp.readyState==4 || cat_xmlHttp.readyState=="complete")
{ 
	var st11 = cat_xmlHttp.responseText;
		

	document.getElementById('ccc').innerHTML=st11; 

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
                <TD class=blueheading align=left width="56%">Branch Info </TD>
					<td width="41%" align="right"><a href="branch_list.php">
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
				<form name="form1" method="post" action="branch_add.php" onSubmit="return post_search();">
				<table width="80%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr>
				      <td align="left" class="white_bold">Add/Edit Branch </td>
				      <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				    </tr></table>				  </td>
				</tr>
				
     <?php
         $sql="select * from  synergy_states order by StatesName";
		 $recordSet3=executeQuery($sql);
		 $SII=$StatesID;
		?>
				<tr class="oddClass">
		<td align="left"><span class="fieldsname">States</span><font class="red_txt">*</font></td>
		<td>
				
				 <select name="StatesID" class="list_menu" onChange="dowork(this.value)">
                     <option value=""  selected="selected"><< Select>></option>
					 <?php 
					 while($rowStates=mysql_fetch_array($recordSet3)) 
					          {
		                          
                      ?>
                    <option value="<?php echo $rowStates["StatesID"];?>" <?php if($rowStates["StatesID"]==$StatesID) echo"selected" ?>><?php echo $rowStates["StatesName"];?></option>
                    <?php }?>
                    </select>
				
					 </td>
				</tr>	
		
		<?php
		      $sqlCity="select * from  synergy_city order by city";
		      $recordSet3=executeQuery($sqlCity);
		      $CID=$CityID;
		?>
		<tr class="evanClass">
		<td align="left"><span class="fieldsname"> Select City </span><font class="red_txt">*</font></td>
		<td>
		<div id="ccc">	 
		<select name="CityID" class="list_menu" >
		<option value=""  selected="selected"><< Select City >></option>
		<?php 
		while($rowCity=mysql_fetch_array($recordSet3)) 
		{
		
		?>
		<option value="<?php echo $rowCity["city_id"];?>" <?php if($rowCity["city_id"]==$CID) echo"selected" ?>><?php echo $rowCity["city"];?></option>
		<?php }?>
		</select>
		</div>	
		</td>
		</tr>	
						
				
				
				
				<tr class="oddClass">
				  <td><span class="fieldsname">Branch Name:</span><font class="red_txt">*</font></td>
				  <td><input name="BranchName" type="text" class="textbox12" value="<?php echo $BranchName; ?>"></td>
				</tr>
				  
				<tr class="evanClass">
				  <td><span class="fieldsname">Branch Phone:</span><font class="red_txt">*</font></td>
				  <td><input name="Phone" type="text" class="textbox12" value="<?php echo $Phone; ?>"></td>
				</tr>  
				
				<tr class="oddClass">
				  <td><span class="fieldsname">Branch Address:</span><font class="red_txt">*</font></td>
				  <td><textarea name="Address" cols="32" rows="4"><?php echo $Address;?></textarea></td>
				</tr>
				
				<tr class="evanClass">
				  <td><span class="fieldsname">Zip Code:</span></td>
				  <td><input name="ZipCode" type="text" class="textbox12" value="<?php echo $ZipCode; ?>"></td>
				</tr> 
								
				<tr class="oddClass">
				  <td class="fieldsname">Status</td>
				  <td>
				  <select name="IsActive" class="list_menu_status">
				    <option value="Y" <?php if($IsActive =="Y") { echo"selected"; }?>>Active</option>
				    <option value="N" <?php if($IsActive =="N") { echo"selected"; }?>>InActive</option>
				  </select></td>
				  </tr>
				  
				<tr class="evanClass">
				  <td>&nbsp;</td>
				  <td>
				  <input type="hidden" name="flag" value="yes">
				  <input type="hidden" name="BanchID" value="<?php echo $BanchID;?>">
				  <input name="submit" type="image" class="submitbutton" src="images/submit.gif"></td>
				  </tr>
				</table>	</form>			</TD>
              </TR>
              <TR>
        <TD 
    align=left>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD>&nbsp;</TD></TR></TBODY></TABLE>
<?php include("bottom.inc.php");?></BODY></HTML>
