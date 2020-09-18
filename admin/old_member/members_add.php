<?php include_once"../includes/midas.inc.php"; 
validate_admin();
if($_POST['flag']=="yes") {
@extract($_REQUEST);
$error='';
if($user_id!='')
{
   
  //if(checkUniquenessOfString('synergy_customer','user_loginid',$loginid))
                    //  $error="duplicate Login Id";		
		//if(checkUniquenessOfString('synergy_customer','user_email',$remail))
                     // $error="duplicate Email";	 
    if($error=='')
		   {
		   
			  $sql_update = "update synergy_customer  set user_fname='$fname',user_lname='$lname',user_email='$remail',user_loginid='$loginid',user_address1='$add1',user_address2='$add2',user_phone='$phone',user_city='$c1name',user_zip='$zname',user_state='$sname',user_country='$cname',user_isactive='$user_isactive'  where user_id='$user_id'";
			
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
		    		
			  
					 if(checkUniquenessOfString('synergy_customer','user_loginid',$loginid))
                      $error="duplicate Login Id";		
		if(checkUniquenessOfString('synergy_customer','user_email',$remail))
                      $error="duplicate Email";		  
				
				
				    if($error=='')
				{
					//$currentDate= date("Y-m-d");
					$sqlInsert="insert into synergy_customer (user_fname, user_lname, user_email, user_loginid, user_passwd,user_address1,user_address2,user_phone,user_city,user_zip,user_state,user_country,user_isactive) values('$fname', '$lname', '$remail', '$loginid', '$txt_password', '$add1' , '$add2' , '$phone','$c1name' , '$zname' , '$sname' , '$cname' ,  '$user_isactive')";
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
	 $sqlBid="select * from synergy_customer where user_id='".$user_id."'";
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
function city(str)
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
<script language="javascript" type="text/javascript">
var xmlHttp
var divid1="txtHint1";
function doWork2(str)
{ 

xmlHttp=GetXmlHttpObject2()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="statecambodir.php"
url=url+"?value="+str
url=url+"&sid="+Math.random()
//divid1=divid;
xmlHttp.onreadystatechange=stateChanged2 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function stateChanged2() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById('outputText2').innerHTML=xmlHttp.responseText 
 } 
}
function GetXmlHttpObject2()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest2();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}
 
 <!-- 
 // Get the HTTP Object
 function getHTTPObject2(){
    if (window.ActiveXObject) return new ActiveXObject("Microsoft.XMLHTTP");
    else if (window.XMLHttpRequest) return new XMLHttpRequest2();
    else {
     alert("Your browser does not support AJAX.");
       return null;
   }
 }   
  
 // Change the value of the outputText field
 function setOutput2(){
     if(httpObject.readyState == 4){
        document.getElementById('outputText2').innerHTML = httpObject.responseText;
     }
  
 }
  
 // Implement business logic    
 function doWork3(value){    
 //alert('hi');
    
var where=value

document.getElementById('PID').value=where;
	
	
	 httpObject = getHTTPObject2();
     if (httpObject != null) {
         var value=value
		//alert(value);
		 httpObject.open("GET", "keyword.php?tagID="+value, true);
         httpObject.send(null); 
         httpObject.onreadystatechange = setOutput;
     }
 }
  
 var httpObject = null;
  
 //-->qty

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
                <TD class=blueheading align=left width="56%">Add Client </TD>
				
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
				      <td align="left" class="white_bold">Add/Edit Clients</td>
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
				  <td><span class="fieldsname">User Phone:</span><font class="red_txt"></font></td>
				  <td><input name="phone" type="text"  size="40"  value="<?php if(isset($user_id)){echo $recordSet->fields['user_phone']; } else echo $_REQUEST['user_phone']; ?>"></td>
				</tr>
				<tr class="oddClass">
				  <td><span class="fieldsname">User City:</span><font class="red_txt"></font></td>
				  <td><input name="c1name" type="text"  size="40"  value="<?php if(isset($user_id)){echo $recordSet->fields['user_city']; } else echo $_REQUEST['user_city']; ?>"></td>
				</tr>
				<tr class="evanClass">
				  <td><span class="fieldsname">User Zip:</span><font class="red_txt"></font></td>
				  <td><input name="zname" type="text"  size="40"  value="<?php if(isset($user_id)){echo $recordSet->fields['user_zip']; } else echo $_REQUEST['user_zip']; ?>"></td>
				</tr>
				<tr class="oddClass">
				  <td><span class="fieldsname">User State:</span><font class="red_txt"></font></td>
				  <td><input name="sname" type="text"  size="40"  value="<?php if(isset($user_id)){echo $recordSet->fields['user_state']; } else echo $_REQUEST['user_state']; ?>"></td>
				</tr>
				<tr class="evanClass">
				  <td><span class="fieldsname">User Country:</span><font class="red_txt"></font></td>
				  <td><input name="cname" type="text"  size="40"  value="<?php if(isset($user_id)){echo $recordSet->fields['user_country']; } else echo $_REQUEST['user_country']; ?>"></td>
				</tr>
				
				<tr class="oddClass">
				  <td class="fieldsname">Status</td>
				  <td>
				  <select name="user_isactive" class="list_menu_status">
				    <option value="Y" <?php if($user_isactive =="Y") { echo"selected"; }?>>Active</option>
				    <option value="N" <?php if($user_isactive =="N") { echo"selected"; }?>>InActive</option>
				  </select></td>
				  </tr>
				  
				  
				<tr class="evanClass">
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