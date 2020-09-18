<?php include_once"../includes/midas.inc.php"; 
validate_admin();
if($_POST['flag']=="yes") {
@extract($_REQUEST);
$error='';
if($user_id!='')
{
   
   	if (trim($_FILES['memberimage']['name']) != "")//if image given
					{
						if ($_FILES['memberimage']['type'] == "image/gif" || $_FILES['memberimage']['type'] == "image/pjpeg" || $_FILES['memberimage']['type'] == "image/jpeg")
							{
								$uniq=time()+10;
								$imageName = $uniq."_".trim($_FILES['memberimage']['name']);
								if (!copy ($_FILES['memberimage']['tmp_name'], "../uploaded_files/memberimage/".$imageName)) 
								$error="upload";
							}
							else
								$error = "type";
					}//end of if image given
					
				
 
    if($error=='')
		   {
		   
			  $sql_update = "update imp_customer  set user_fname='$fname',user_lname='$lname',user_email='$remail',user_loginid='$loginid',user_address1='$add1',user_address2='$add2',user_phone='$phone',user_city='$city_id',user_zip='$zname',user_state='$Stateid',user_country='$Countryid'";  
			  
			  
			  if($_FILES['memberimage']['name']!= "")
                        $sql_update.=" ,Image ='$imageName'";
			  
			  
			  
			  
			  
			  $sql_update.="where user_id='$user_id'";
			
//			echo $sql_update; exit;
			$result_rsUpdate = $contact->Execute($sql_update) or die($contact->ErrorMsg());			
			
			
				
				$sess_msg=$sitemsgs[2];
				$_SESSION['sessionMsg']=$sess_msg;
				?>
				<script language="javascript">
				location.href="member_view.php";
				</script>
				<?php 
			
				exit;
			}
			
			else  
			{ 
				
				@extract($_POST);
				
			}
		}
		else 
		{
		    		
			  
					 if(checkUniquenessOfString('imp_customer','user_loginid',$loginid))
                      $error="duplicate Login Id";		
		if(checkUniquenessOfString('imp_customer','user_email',$remail))
                      $error="duplicate Email";		  
				
				
					if($error=='')
	            {
	  				if (trim($_FILES['memberimage']['name']) != "")//if image given
						{
							if ($_FILES['memberimage']['type'] == "image/gif" || $_FILES['memberimage']['type'] == "image/pjpeg" || $_FILES['memberimage']['type'] == "image/jpeg")
							{
								$uniq=time()+10;
								$imageName = $uniq."_".trim($_FILES['memberimage']['name']);
								if (!copy ($_FILES['memberimage']['tmp_name'], "../uploaded_files/memberimage/".$imageName)) 
								$error="upload";
							}
							else
								$error = "type";
						}//end of if image given
				}
				
				    if($error=='')
				{
					//$currentDate= date("Y-m-d");
					$sqlInsert="insert into imp_customer (user_fname, user_lname, user_email, user_loginid, user_passwd, user_address1, user_address2, user_phone, user_city,user_zip,user_state,user_country,user_status,Image) values('$fname', '$lname', '$remail', '$loginid', '$txt_password', '$add1' , '$add2' , '$phone','$city_id' , '$zname' , '$Stateid' , '$Countryid' ,  'u','$imageName')";
				     $rsInsert=$contact->Execute($sqlInsert) or die($contact->ErrorMsg());
					$sess_msg=$sitemsgs[3];
					$_SESSION['sessionMsg']=$sess_msg;
					
					
					?>
				<script language="javascript">
				location.href="member_view.php";
				</script>
				<?php 
					
					exit;
				}
				else
				{
					
					
					@extract($_POST);
				
				}
}
}		

if(isset($user_id))
{
	 $sqlBid="select * from imp_customer where user_id='".$user_id."'";
	$recordSet=$contact->Execute($sqlBid) or die($contact->ErrorMsg());
    $NumRecords=$recordSet->RecordCount();
}

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0049)http://69.61.15.150/~dish/admin/admin_desktop.php -->
<HTML><HEAD><TITLE><?php echo $title_message;?></TITLE>
<script language="javascript" src="js/validation.js"></script>
<script language=javascript>
function PostSearchForm()
{
var emailID=document.form1.remail
//var x = document.form1.Mobile.value
   	
	
	
	if(document.form1.fname.value=='')
	{
		alert("Please Enter First Name");
		document.form1.fname.value='';
		document.form1.fname.focus();
		return false;
	}
if(document.form1.lname.value=='')
	{
		alert("Please Enter Last Name");
		document.form1.lname.value='';
		document.form1.lname.focus();
		return false;
	}
	
	
	if ((emailID.value==null)||(emailID.value=="")){
		alert("Please Enter your Email ID")
		emailID.focus()
		return false
	}
	if (echeck(emailID.value)==false){
		emailID.value=""
		emailID.focus()
		return false
	}
	
   
   		if(document.form1.loginid.value=="")
	{
		alert("Please Enter Login-Id");
		document.form1.loginid.value='';
		document.form1.loginid.focus();
		return false;
	}
	if(document.form1.txt_password.value=="")
	{
		alert("Please Enter Password");
		document.form1.txt_password.value='';
		document.form1.txt_password.focus();
		return false;
	}
		if(document.form1.cpass.value=="")
	{
		alert("Please Enter Confirm Password");
		document.form1.cpass.value='';
		document.form1.cpass.focus();
		return false;
	}
	if((document.form1.cpass.value) != (document.form1.txt_password.value))
	{

		alert("Password Mismatch!!!");
		document.form1.cpass.value="";
		document.form1.cpass.focus();
		return false;
	}
		
	if(document.form1.add1.value=="")
	{
		alert("Please Enter Your Address");
		document.form1.add1.value='';
		document.form1.add1.focus();
		return false;
	}
	if(document.form1.phone.value=="")
	{
		alert("Please Enter Your Phone");
		document.form1.phone.value='';
		document.form1.phone.focus();
		return false;
	}
	if(isNaN(document.form1.phone.value))
	{
		alert("Please Enter Valid Phone ");
		document.form1.phone.value='';
		document.form1.phone.focus();
		return false;
	}
	
	if(document.form1.c1name.value=="")
	{
		alert("Please Enter Your City Name");
		document.form1.c1name.value='';
		document.form1.c1name.focus();
		return false;
	}
	if(document.form1.zname.value=="")
	{
		alert("Please Enter Your Zip");
		document.form1.zname.value='';
		document.form1.zname.focus();
		return false;
	}
	if(isNaN(document.form1.zname.value))
	{
		alert("Please Enter Valid Zip ");
		document.form1.zname.value='';
		document.form1.zname.focus();
		return false;
	}
	if(document.form1.sname.value=="")
	{
		alert("Please Enter Your State Name");
		document.form1.sname.value='';
		document.form1.sname.focus();
		return false;
	}
   	
   	if(document.form1.cname.value=="")
	{
		alert("Please Enter  Your Country Name");
		document.form1.cname.focus();
		return false;
	}
	
	return true;
}
function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    alert("Invalid E-mail ID")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

 		 return true					
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
<script language="JavaScript" type="text/javascript">
var cat_xmlHttp
function statess(str)
{ 
	//alert(str);
	cat_xmlHttp=GetXmlHttpObject()
	if (cat_xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	} 
url="statecambodir.php?value="+str
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
		

	document.getElementById('outputText2').innerHTML=st11; 

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

<script language="JavaScript" type="text/javascript">
var cat_xmlHttp2
function city(str)
{ 
	//alert(str);
	cat_xmlHttp2=GetXmlHttpObject()
	if (cat_xmlHttp2==null)
	{
		alert ("Browser does not support HTTP Request")
		return
	} 
url2="city.php?value="+str
//alert(url);
url2=url2+"&id="+Math.random()

cat_xmlHttp2.onreadystatechange=stateChanged12
cat_xmlHttp2.open("GET",url2,true)
cat_xmlHttp2.send(null)

}
function stateChanged12() 
{ 
if (cat_xmlHttp2.readyState==4 || cat_xmlHttp2.readyState=="complete")
{ 
	var st11 = cat_xmlHttp2.responseText;
		

	document.getElementById('ccc').innerHTML=st11; 

}
} 
function GetXmlHttpObject()
{ 
	var objXMLHttp2=null
	if (window.XMLHttpRequest)
	{
		objXMLHttp2=new XMLHttpRequest()  
	}
	else if (window.ActiveXObject)
	{
		objXMLHttp2=new ActiveXObject("Microsoft.XMLHTTP")
	}
	return objXMLHttp2
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
                <TD class=blueheading align=left width="56%">Add Member </TD>
				
					<td width="41%" align="right"><a href="member_view.php">
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

echo $error;//display_session_msg();?></TD>
              </TR> <TR>
                <TD align=center>&nbsp;</TD>
              </TR>
              <TR>
                <TD height=260 align=left valign="top">
<form name="form1" enctype="multipart/form-data" method="post" action="members_add.php" onSubmit='return PostSearchForm();'>
				<table width="80%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr>
				      <td align="left" class="white_bold">Add/Edit Members</td>
				      <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				    </tr></table>				  </td>
				
				


					
	<tr class="evanClass">
				  <td><span class="fieldsname">First Name:</span><font class="red_txt">*</font></td>
				  <td><input name="fname" type="text" size="40"   value="<?php if(isset($user_id)){echo $recordSet->fields['user_fname']; } else echo $_REQUEST['user_fname']; ?>"></td>
				</tr>
				
				<tr class="oddClass">
				  <td><span class="fieldsname">Last Name:</span><font class="red_txt">*</font></td>
				  <td><input name="lname" type="text" size="40"   value="<?php if(isset($user_id)){echo $recordSet->fields['user_lname']; } else echo $_REQUEST['user_lname']; ?>"></td>
				</tr>
				
				<tr class="evanClass">
				  <td><span class="fieldsname">Email Id:</span><font class="red_txt">*</font></td>
				  <td><input name="remail" type="text" size="40"   value="<?php if(isset($user_id)){echo $recordSet->fields['user_email']; } else echo $_REQUEST['user_email']; ?>"></td>
				</tr>
								
							
				
				 <tr class="oddClass">
				  <td width="25%"><span class="fieldsname">Login-Id:</span><font class="red_txt">*</font></td>
				  <td width="75%"><input name="loginid" size="40" type="text"  value="<?php if(isset($user_id)){echo $recordSet->fields['user_loginid']; } else echo $_REQUEST['user_loginid']; ?>"></td>
				</tr>
				
				<tr class="evanClass">
				  <td><span class="fieldsname">Password:</span><font class="red_txt"></font></td>
				  <td><input name="txt_password" type="password" size="40"   value="<?php if(isset($user_id)){echo $recordSet->fields['user_passwd']; } else echo $_REQUEST['user_passwd']; ?>"></td>
				</tr>
				
				<tr class="oddClass">
				  <td><span class="fieldsname">Confirm Password:</span><font class="red_txt"></font></td>
				  <td><input name="cpass" type="password"  size="40"  value="<?php if(isset($user_id)){echo $recordSet->fields['user_passwd']; } else echo $_REQUEST['user_passwd']; ?>"></td>
				</tr>
				
				
				  <tr class="evanClass">
				  <td><span class="fieldsname">User_address1:</span><font class="red_txt"></font></td>
				  <td><TEXTAREA NAME="add1" ROWS="2" COLS="20" > <?php if(isset($user_id)){echo $recordSet->fields['user_address1']; } else echo $_REQUEST['user_address1']; ?></TEXTAREA></td>
				</tr>
				<tr class="oddClass">
				  <td><span class="fieldsname">User_address2:</span><font class="red_txt"></font></td>
				  <td><TEXTAREA NAME="add2" ROWS="2" COLS="20"> <?php if(isset($user_id)){echo $recordSet->fields['user_address2']; } else echo $_REQUEST['user_address2']; ?></TEXTAREA></td>
				</tr>
					<tr class="evanClass">				    
					<td  class="fieldsname"> Image :</td>
                    <td align="left"  >
                    <?php if($_REQUEST['user_id']!='') {
					       if($recordSet->fields['Image']!='')
	                { ?>
	                <img src="../uploaded_files/memberimage/<?=$recordSet->fields['Image']?>" width="100"><br> 
	               <input type="hidden" name="MainImage2" value="<?=$recordSet->fields['Image'];?>">
                   <? } else { ?>
                  No Image Available<br>
                  <? } }?>
	                <input type=file class='bordered'  name="memberimage" size=26></td>			
					
				</tr>
				
				
				<tr class="evanClass">
				  <td><span class="fieldsname">User Phone:</span><font class="red_txt"></font></td>
				  <td><input name="phone" type="text"  size="40"  value="<?php if(isset($user_id)){echo $recordSet->fields['user_phone']; } else echo $_REQUEST['user_phone']; ?>"></td>
				</tr>
				<?php
           $sql="select * from  imp_country order by country";
		  $recordSet2=$contact->Execute($sql) or die($contact->ErrorMsg());
//;
//print_r($Row); 65535
		?>
				<tr class="oddClass">
				  <td><span class="fieldsname">Country:</span><font class="red_txt"></font></td>
				  <td> <select name="Countryid"  class="list_menu" onChange="statess(this.value)">
                                    <option>....Select Country....</option>
									<?php 
					 while(!$recordSet2->EOF)
					          {							  
							  $country_id=$recordSet->fields['user_country'];
						   if($country_id=='')
						       $TempCounty=99;
						     else
						       $TempCounty=$recordSet->fields['user_country']; 
		                          
                      ?>
                    <option value="<?php echo $recordSet2->fields["country_id"];?>"  <?php if($recordSet2->fields["country_id"]==$TempCounty) echo "selected" ?>><?php echo $recordSet2->fields["country"];?></option>
                    <?php $recordSet2->MoveNext();
					}
					
			  $recordSet2->Close();?>
                                  </select>     </td>
				</tr>
				<tr class="evanClass">
				  <td><span class="fieldsname">State:</span><font class="red_txt"></font></td>
				  <td><div id="outputText2">
								  <?php
								  $sql="select * from  imp_states where country_id='99'  order by StatesName";
$recordSet3=$contact->Execute($sql) or die($contact->ErrorMsg());
 ?>
<select name="Stateid" id="Stat"  class="list_menu" onChange="city(this.value)">
<option value=""  selected="selected">Select state</option>
<?php 
while(!$recordSet3->EOF) 
{
$state_id=$recordSet->fields['user_state'];
?>

<option value="<?php echo $recordSet3->fields["StatesID"];?>" <?php if($recordSet3->fields["StatesID"]==$recordSet->fields['user_state']) echo"selected" ?>><?php echo $recordSet3->fields["StatesName"];?></option>
<?php $recordSet3->MoveNext();
}?>
<?php
$recordSet3->Close();?>
<!--<option value="Other">Other</option>-->
</select></div>&nbsp;&nbsp; <!--<div id="Otst" style="display:none">
                     <input type="text" class="signup_inputjump" name="Otstate" size="26" />
                 </div>--></td>
				</tr>
				
				<tr class="oddClass">
				  <td><span class="fieldsname">City:</span><font class="red_txt"></font></td>
				  <td><div id="ccc">
				  <?php 
				  $sql_city="select * from  imp_city where StatesID='$state_id' order by city";
				  $recordSet4=$contact->Execute($sql_city) or die($contact->ErrorMsg());
				  ?>
								 <select name="cityid" id="cityid" class="list_menu" onChange="shomOtc()" >
                                 <option value=""  selected="selected">Select City</option><?php 
while(!$recordSet4->EOF) 
{

?>
<option value="<?php echo $recordSet4->fields["city_id"];?>" <?php if($recordSet4->fields["city_id"]==$recordSet->fields['user_city']) echo"selected" ?>><?php echo $recordSet4->fields["city"];?></option>
<?php $recordSet4->MoveNext();
}?>
<?php
$recordSet4->Close();?>
<!--<option value="Other">Other</option>-->
</select></div>&nbsp;&nbsp; <!--<div id="Otct" style="display:none">
                                                              <input class="signup_inputjump" type="text" name="Otcity" size="26" />
                                                            </div>-->
															</td>
				</tr>
				
				<tr class="evanClass">
				  <td><span class="fieldsname">User Zip:</span><font class="red_txt"></font></td>
				  <td><input name="zname" type="text"  size="40"  value="<?php if(isset($user_id)){echo $recordSet->fields['user_zip']; } else echo $_REQUEST['user_zip']; ?>"></td>
				</tr>
				
				
				
				
				  
				  
				<tr class="oddClass">
				  <td>&nbsp;</td>
				  <td>
				  <input type="hidden" name="flag" value="yes">
				  <input type="hidden" name="user_id" value="<?php echo $_REQUEST['user_id'];?>">
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