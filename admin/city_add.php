<?php include"../includes/midas.inc.php"; 
validate_admin();
include("fckeditor/fckeditor.php") ;
if($_POST['flag']=="yes") {
@extract($_REQUEST);
$error='';
		if($city_id!='') 
		{
							 			
			if(checkUniquenessOfString1('imp_city','city',$city,'city_id' ,$city_id))
            $error="duplicate";
			if($error=='') //, MetaTitle='$MetaTitle',MetaDescription='$MetaDescription',MetaKeyword='$MetaKeyword'
			{	
			    $CityJobDesc1 = $_POST['FCKeditor1']; $CityConsultent1 = $_POST['FCKeditor3'];
			    $ShortCityJobDesc = $_POST['FCKeditor2'];
												
				$sqlUpdate="update imp_city  set country_id ='$country_id' , StatesID='$StatesID', city='$city',Status='$Status', district_id='$district',IsViewHome='$IsViewHome', CityJobDesc=\"".trim(addslashes(stripslashes($CityJobDesc1)))."\" ,CityConsultentDesc=\"".trim(addslashes(stripslashes($CityConsultent1)))."\", ShortCityJobDesc=\"".trim(addslashes(stripslashes($ShortCityJobDesc)))."\", cityshort='$cityshort', IsLeftMenu='$IsLeftMenu'   where city_id='$city_id'";
				$result_rsUpdate = $contact->Execute($sqlUpdate) or die($contact->ErrorMsg());
				$sess_msg=$sitemsgs[28];
				$_SESSION['sessionMsg']=$sess_msg;
				?>
				<script language="javascript">
				location.href="city_view.php";
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
			if(checkUniquenessOfString('imp_city','city',$city))
				    $error='duplicate';		
				if($error=='')                                     //  
				{
					$CityJobDesc1 = $_POST['FCKeditor1']; $CityConsultent1 = $_POST['FCKeditor3'];
			        $ShortCityJobDesc = $_POST['FCKeditor2'];
					
		$sqlInsert="insert into imp_city (country_id,StatesID,city,Status,district_id,IsViewHome,CityJobDesc,CityConsultentDesc, ShortCityJobDesc, cityshort, IsLeftMenu)values('".$country_id."','".$StatesID."','".$city."', '".$Status."', '".$district."','".$IsViewHome."' ,\"".trim(addslashes(stripslashes($CityJobDesc1)))."\",\"".trim(addslashes(stripslashes($CityConsultent1)))."\",\"".trim(addslashes(stripslashes($ShortCityJobDesc)))."\",'".$cityshort."','".$IsLeftMenu."')";
				     $rsInsert=$contact->Execute($sqlInsert) or die($contact->ErrorMsg());
					$sess_msg=$sitemsgs[26];
					$_SESSION['sessionMsg']=$sess_msg;
					?>
				<script language="javascript">
				location.href="city_view.php";
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

if(isset($city_id))
{
	$sqlBid="select * from  imp_city where city_id='".$city_id."'";
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

<script language="JavaScript" type="text/javascript">
var cat_xmlHttp
function dowork(str)
{ 
	
	cat_xmlHttp=GetXmlHttpObject()
	if (cat_xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	} 
url="statecambo.php?value="+str
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

<META http-equiv=Content-Type content="text/html; charset=iso-8859-1"><LINK 
href="css/css.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<script language=javascript>
function valid_list()
{
   	if(document.form1.StatesID.value=="")
	{
		alert("Please Select State");
		document.form1.StatesID.focus();
		return false;
	}
 	if(document.form1.city.value=="")
	{
		alert("Please Select City");
		document.form1.city.focus();
		return false;
	}

	return true;
}
</script>

</HEAD>
<BODY><?php include("top.inc.php");?>
<table width="100%" border="0" cellpadding="4" cellspacing="1">

<tr>
	<td>&nbsp;</td>
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
                <TD class=blueheading align=left width="56%">City Info </TD>
				
					<td width="41%" align="right"><a href="city_view.php">
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
<form name="form1" method="post" action="city_add.php" onSubmit="return valid_city('form1');">
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
				<tr class="evanClass">
		<td align="left">Country</span><font class="red_txt">*</font></td>
		<td>
				 	 
				 <select name="country_id" class="list_menu"  onChange="dowork(this.value)">
				 <option value=""><< Select Country >></option>
                    
			 <?php 
			 while(!$recordSet2->EOF)
			  {
				  $country_id=$recordSet->fields['country_id'];
				   if($country_id=='')
				       $TempCounty=99;
				     else
				       $TempCounty=$recordSet->fields['country_id']; 	   		
						  
			  ?>
                    <option value="<?php echo $recordSet2->fields["country_id"];?>"  <?php if($recordSet2->fields["country_id"]==$TempCounty) echo "selected" ?>><?php echo $recordSet2->fields["country"];?></option>
                    <?php $recordSet2->MoveNext();
					}
					
			  $recordSet2->Close();?>
                    </select>
				
					 </td>
				</tr>	
				
	<?php
	$sql="select * from  imp_states where country_id='99' order by StatesName";
	$recordSet3=$contact->Execute($sql) or die($contact->ErrorMsg());
	$SII=$recordSet->fields['StatesID'];
	?>
				<tr class="oddClass">
		<td align="left">States</span><font class="red_txt">*</font></td>
		<td>
				 <div id="ddd">	  <!--onChange="dowork(this.value)"-->
				 <select name="StatesID" class="list_menu" >
                     <option value=""  selected="selected"><< Select State >></option>
					 <?php 
					 while(!$recordSet3->EOF) 
					          {
		                          
                      ?>
                    <option value="<?php echo $recordSet3->fields["StatesID"];?>" <?php if($recordSet3->fields["StatesID"]==$recordSet->fields['StatesID']) echo"selected" ?>><?php echo $recordSet3->fields["StatesName"];?></option>
                    <?php $recordSet3->MoveNext();
					}
					$recordSet3->Close();?>
                    </select>
				</div>	
					 </td>
				</tr>	
				
			
				  <tr class="evanClass">
				  <td><span class="fieldsname"> City:</span><font class="red_txt">*</font></td>
				  <td><input name="city" type="text"  value="<?php echo $recordSet->fields['city']; ?>"></td>
				  </tr>
				  
				  
				   
	
								
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
				  <input type="hidden" name="city_id" value="<?php echo $_REQUEST['city_id'];?>">
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













