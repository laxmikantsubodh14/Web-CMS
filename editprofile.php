<?php include"includes/header_user.php";
?>
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
<div class="header"><img src="images/contactus_header.jpg" /></div>
<div class="inner_bg">

<div class="header"><img src="images/aboutus_top_line.jpg" /><br />
<div class="middle_top"><a href="memberhome.php">Home</a> >> <a href="editprofile.php">Edit Profile</a></div>
<br /><img src="images/aboutus_top_line.jpg" /></div>
<?php include"includes/left_user_menu.php" ?>
<div class="userhome"><div class="user_home"><div class="user_home_h1">Welcome To <?php echo strtoupper($RowsUser['user_fname']).' '.strtoupper($RowsUser['user_lname']);?></div><div class="user_home_h2"><a href="memberhome.php">Back</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="logout.php">Logout</a></div>
</div>
</div>
<div class="aboutus_content_h3">Edit Profile </div>
<?php if(trim($update) !="")
{	
	
	$error="";
	/*$sql="SELECT * FROM multilinkshop_customer  where user_loginid = '$userID'";
	$result=mysql_query($sql);
	$tot_record=mysql_num_rows($result);
	if($tot_record > 0)//if dupliacate record found
	$error="duplicate";
	else*/
	{	
			// get encryped password
			$sql = "select password('$txt_password')";
			$sql_result_passwd = mysql_query($sql);
			$encryped_passwd = mysql_fetch_array($sql_result_passwd);
			//$txt_password ="$encryped_passwd[0]";
			//echo "get pass ".$txt_password;exit();
			mysql_free_result($sql_result_passwd);
		
	 $updateDate= date("Y-m-d");
	 $updateTime= date("H:i:s");
	 $sql_user="update imp_customer  set user_fname='$fname',user_lname='$lname',user_email='$remail',user_address1='$add1',user_address2='$add2',user_city='$city_id',user_zip='$zname',user_state='$Stateid',user_country='$Countryid'  where user_loginid='$userID'"; 
	  $sql_user;
	 $result_sql_update = mysql_query($sql_user); if(mysql_error()!=""){echo mysql_error();}

?>
			<script language="javascript">
			location.href="memberhome.php?edited=yes";
			</script>
<?php
}
}
if($cmd=="edit")
{?>
<div class="form_table"><div class="changepassword"></div>
<div class="edit_bg">
<form name="AddForm" method="post" action="<?=$PHP_SELF;?>?update=yes" onsubmit='return PostSearchForm();'>
<?php
	$sql_detail = "select * from imp_customer  where user_loginid='$userID'";
	$result_detail = mysql_query($sql_detail);
	$row_detail = mysql_fetch_array($result_detail);
	
	?>
  <div class="changepassword1">
  <div class="changepassword_h2">
    <div class="edit_h1">First Name:<span class="style1">*</span></div>
    <div class="changepassword_h4">
  <input name="fname" type="text" class="edit_h4" value="<? if($error !='') echo $fname; else echo $row_detail[user_fname];?>"/>
</div></div>

<div class="changepassword_h2"><div class="edit_h1">Last Name:<span class="style1">*</span> </div>
<div class="changepassword_h4">
  <input name="lname" type="text" class="edit_h4" value="<? if($error !='') echo $lname; else echo $row_detail[user_lname];?>"/>
</div></div>

<div class="changepassword_h2"><div class="edit_h1">Email Id:<span class="style1">*</span> </div>
<div class="changepassword_h4">
  <input name="remail" type="text" class="edit_h4" value="<? if($error !='') echo $remail; else echo $row_detail[user_email];?>"/>
</div></div>
<div class="changepassword_h2"><div class="edit_h1">User_address1:<span class="style1">*</span> </div>
<div class="changepassword_h4">
  <textarea name="add1" cols="" rows="" class="edit_h5"><? if($error !='') echo $add1; else echo $row_detail[user_address1]; ?></textarea>
</div></div>
<div class="changepassword_h2"><div class="edit_h1">User_address2:<span class="style1">*</span> </div>
<div class="changepassword_h4">
  <textarea name="add2" cols="" rows="" class="edit_h5"><? if($error !='') echo $add2; else echo $row_detail[user_address2]; ?></textarea>
</div></div>
<div class="changepassword_h2">
    <div class="edit_h1">User Country:<span class="style1">*</span></div>
    <div class="changepassword_h4">
     <select name="Countryid"  onChange="statess(this.value)">
                                    <option>....Select Country....</option>
								   	<?php $sql="select * from  imp_country order by country";
		  $recordSet2=$contact->Execute($sql) or die($contact->ErrorMsg()); 
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
                                  </select>   
</div></div>
<div class="changepassword_h2">
    <div class="edit_h1">User Zip:</div>
    <div class="changepassword_h4">
  <input name="zname" type="text" class="edit_h4" value="<? if($error !='') echo $zname; else echo $row_detail[user_zip];?>"/>
</div></div>
<div class="changepassword_h2">
    <div class="edit_h1">User State:</div>
    <div class="changepassword_h4">
  <div id="outputText2">
								  <?php
								  $sql="select * from  imp_states where country_id='99'  order by StatesName";
$recordSet3=$contact->Execute($sql) or die($contact->ErrorMsg());
 ?>
<select name="Stateid" id="Stat"  onChange="city(this.value)">
<option value=""  selected="selected">Select State</option>
<?php 
while(!$recordSet3->EOF) 
{
$state_id=$row_detail['user_state'];
?>

<option value="<?php echo $recordSet3->fields["StatesID"];?>" <?php if($recordSet3->fields["StatesID"]==$row_detail['user_state']) echo"selected" ?>><?php echo $recordSet3->fields["StatesName"];?></option>
<?php $recordSet3->MoveNext();
}?>
<?php
$recordSet3->Close();?>
<!--<option value="Other">Other</option>-->
</select></div>
</div></div>
<div class="changepassword_h2">
    <div class="edit_h1">User City:</div>
    <div class="changepassword_h4">
  <div id="ccc">
				  <?php 
				 $sql_city2="select * from  imp_city where StatesID='$state_id' order by city";
				  $recordSet4=$contact->Execute($sql_city2) or die($contact->ErrorMsg());
				  ?>
								 <select name="cityid" id="cityid"  onChange="shomOtc()" >
                                 <option value=""  selected="selected">Select City</option><?php 
while(!$recordSet4->EOF) 
{

?>
<option value="<?php echo $recordSet4->fields["city_id"];?>" <?php if($recordSet4->fields["city_id"]==$row_detail['user_city']) echo"selected" ?>><?php echo $recordSet4->fields["city"];?></option>
<?php $recordSet4->MoveNext();
}?>
<?php
$recordSet4->Close();?>
<!--<option value="Other">Other</option>-->
</select></div>
  <input type=hidden name=cmd value=<?php echo $cmd; ?>>
  <input type=hidden name=uId value='<? echo $userID;?>'>
</div></div>
<div class="changepassword_h2">
  <div class="submit">
 <input type="image" src="images/update.jpg" border="0" />
</div></div>



</div>
</form>

</div>
  </div>
  
  <?php } else{ ?>


<div class="form_table"><div class="changepassword"></div>
<div class="edit_bg">

<?php



	$sql_detail = "select * from imp_customer  where user_loginid='$userID'";
	$result_detail = mysql_query($sql_detail);
	$row_detail = mysql_fetch_array($result_detail);
	?>

<div class="edit_bg">

  <div class="changepassword1">
  <div class="changepassword_h2">
    <div class="edit_h1">First Name:</div>
    <div class="changepassword_h4"><?php echo $row_detail[user_fname];?></div>
  </div>

<div class="changepassword_h2"><div class="edit_h1">Last Name: </div>
<div class="changepassword_h4"><?php echo $row_detail[user_lname];?></div>
</div>

<div class="changepassword_h2"><div class="edit_h1">Email Id: </div>
<div class="changepassword_h4"><?php
		echo $row_detail[user_email];?></div>
</div>
<div class="changepassword_h2"><div class="edit_h1">User_address1:</div>
<div class="changepassword_h4"><?php echo $row_detail[user_address1]; ?></div>
</div>
<div class="changepassword_h2"><div class="edit_h1">User_address2: </div>
<div class="changepassword_h4"><?php echo $row_detail[user_address2]; ?></div>
</div>
<div class="changepassword_h2">
    <div class="edit_h1">User City:</div><?php $sql_city="select * from imp_city where city_id='$row_detail[user_city]'";
	                                            $result_city=mysql_query($sql_city);
												$row_city=mysql_fetch_array($result_city);
												?>
    <div class="changepassword_h4"><?php echo $row_city[city];?></div>
</div>
<div class="changepassword_h2">
    <div class="edit_h1">User Zip:</div>
    <div class="changepassword_h4"><?php echo $row_detail[user_zip];?></div>
</div>
<div class="changepassword_h2">
    <div class="edit_h1">User State:</div><?php $sql_state="select * from imp_states where StatesID='$row_detail[user_state]'";
	                                            $result_state=mysql_query($sql_state);
												$row_state=mysql_fetch_array($result_state);
												?>
    <div class="changepassword_h4"><?php echo $row_state[StatesName];?></div>
</div>
<div class="changepassword_h2">
    <div class="edit_h1">User Country:</div><?php $sql_country="select * from imp_country where country_id='$row_detail[user_country]'";
	                                            $result_country=mysql_query($sql_country);
												$row_country=mysql_fetch_array($result_country);
												?>
    <div class="changepassword_h4"><?php echo $row_country[country];?></div>
</div>
<div class="changepassword_h2">
    <div class="edit_h1"><a href="?cmd=edit" style="text-decoration:none"><img src="images/edit-your-profile.jpg" border="0" /></a></div>
    <div class="changepassword_h4"></div>
</div>
  </div>
  <?php } ?>
</div>


 </div>
</div>
</div></div>
<?php include"includes/footer.php" ?>