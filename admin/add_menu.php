<?php include_once"../includes/midas.inc.php"; 
validate_admin();
if($_POST['flag']=="yes") {
@extract($_REQUEST);
$error='';
		if($MenuID!='') 
		{
		  	   // if(checkUniquenessOfString1('imp_menu','MenuTitle',$MenuTitle,'MenuID' ,$MenuID))
			if(checkUniquenessOfString2('imp_menu','MenuTitle',$MenuTitle,'MenuID',$MenuID,'ParentID',$ParentPage))
						 { $error='MenuTitle';
					$sess_msg=$sitemsgs[30];
					$_SESSION['sessionMsg']=$sess_msg;	}
			//if(checkUniquenessOfString1('imp_menu','MenuName',$MenuName,'MenuID' ,$MenuID))
					 if(checkUniquenessOfString2('imp_menu','MenuName',$MenuName,'MenuID',$MenuID,'ParentID',$ParentPage))
                        { $error="duplicate";
						 	$sess_msg=$sitemsgs[29];
					$_SESSION['sessionMsg']=$sess_msg; }
					
					if (trim($_FILES['maenuimage']['name']) != "")//if image given
					{
						if ($_FILES['maenuimage']['type'] == "image/gif" || $_FILES['maenuimage']['type'] == "image/pjpeg" || $_FILES['maenuimage']['type'] == "image/jpeg")
							{
								$uniq=time()+10;
								$imageName = $uniq."_".trim($_FILES['maenuimage']['name']);
								if (!copy ($_FILES['maenuimage']['tmp_name'], "../uploaded_files/ImageMenu/".$imageName)) 
								$error="upload";
							}
							else
								$error = "type";
					}//end of if image given
					
				if($error=='')
				{								
					
					$sqlUpdate="update imp_menu set MenuName='$MenuName', MenuTitle='$MenuTitle', MenuKeyword='$MetaKeyword', IsActive='$status', view='$view', ParentID='$ParentPage', linkpage='$linkpage', openin='$openin', Target='$Target', MetaDescription='$MetaDescription', MetaTitle='$MetaTitle'";
					
					if($_FILES['maenuimage']['name']!= "")
                        $sqlUpdate.=" ,Image ='$imageName'";
					
					$sqlUpdate.=" where MenuID='$MenuID'";
					$result_Update = $contact->Execute($sqlUpdate) or die($contact->ErrorMsg());
					$sess_msg=$sitemsgs[2];
					$_SESSION['sessionMsg']=$sess_msg;
				
				
							?>
							<script language="javascript">
							   location.href="menu_list.php";
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
				
				/*$FileName="../".$MenuURL;
				if(checkUniquenessOfString('imp_menu','MenuTitle',$MenuTitle))
				   { $error='MenuTitle';
					$sess_msg=$sitemsgs[30];
					$_SESSION['sessionMsg']=$sess_msg;	}
				if(checkUniquenessOfString('imp_menu','MenuName',$MenuName))
				  {  $error='duplicate';
					$sess_msg=$sitemsgs[29];
					$_SESSION['sessionMsg']=$sess_msg;	}
				if((file_exists($FileName)))*/
	      if(checkUniquenessOfString_add2('imp_menu','MenuName',$MenuName,'ParentID',$ParentPage))   
				 $error="Existfile";
		  if(checkUniquenessOfString_add2('imp_menu','MenuTitle',$MenuTitle,'ParentID',$ParentPage))   
				 $error="Existfile"; 			  	
					
				
				if($error=='')
	            {
	  				if (trim($_FILES['maenuimage']['name']) != "")//if image given
						{
							if ($_FILES['maenuimage']['type'] == "image/gif" || $_FILES['maenuimage']['type'] == "image/pjpeg" || $_FILES['maenuimage']['type'] == "image/jpeg")
							{
								$uniq=time()+10;
								$imageName = $uniq."_".trim($_FILES['maenuimage']['name']);
								if (!copy ($_FILES['maenuimage']['tmp_name'], "../uploaded_files/ImageMenu/".$imageName)) 
								$error="upload";
							}
							else
								$error = "type";
						}//end of if image given
				}
				
				if($error=='')
				{
					if($ParentPage=='')
				 {
				   $SqlMaxOrder="select Ordering from imp_menu order by Ordering desc limit 0,1";
				   $ResultMaxOrder=$contact->Execute($SqlMaxOrder) or die($contact->ErrorMsg());
				   $order=$ResultMaxOrder->fields['Ordering']+1;
				 }
				 else
				 {
				   $order=0;
				 }
					
					$sqlInsert="insert into imp_menu (MenuID, MenuName, MenuTitle, MenuKeyword, Image, URL, ParentID, IsActive, Ordering, view,linkpage,openin,Target,MetaTitle,MetaDescription) values ('','".$MenuName."','".$MenuTitle."','".$MetaKeyword."','".$imageName."','".$MenuURL."','".$ParentPage."','".$status."','".$order."','".$view."','".$linkpage."','".$openin."','".$Target."','".$MetaTitle."','".$MetaDescription."')";
					$rsInsert=$contact->Execute($sqlInsert) or die($contact->ErrorMsg());			
			
					$sess_msg=$sitemsgs[3];
					$_SESSION['sessionMsg']=$sess_msg;
					
					
					#
					# create file extension .php.............
					#	
			
					$id = mysql_insert_id();
					$pagename=$id;
		
					$content="";
					$FileName="../".$MenuURL;
					$row2="";
					$result2="";
					$content.="<?php include_once('includes/midas.inc.php'); ";
					$content.=" ";
					$content.="$"."pageid=$id;";
					$content.=" ";
					$content.=" ";
					$chnheading2="\"select * from imp_menu where MenuID='$id'\"";
					$content.=" ";
					$content.="$"."chnheading=$chnheading2;";
					$content.=" ";
					$content.="$"."chnresult=mysql_query($"."chnheading);";
					$content.=" ";
					$content.="$"."chnrow=mysql_fetch_array($"."chnresult);";
					$qq_im="\"select * from emirates_static_pages where page_admin_id='$id'\"";
					$content.=" ";
					$content.="$"."qq_cms=$qq_im;";
					$content.=" ";
					$content.="$"."result2=mysql_query($"."qq_cms);";
					$content.=" ";
					$content.="$"."row2=mysql_fetch_array($"."result2);";
					$content.=" ";
					
					$content.=" ?>";
					$content.="
					<?php include('includes/header_user.php');?>
<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
					
					<tr>
                        <td>&nbsp;</td>
                      </tr>
					  <tr>
                        <td class=\"navgation_menu\"><a href=\"index.php\">Home</a> &raquo; <?php echo ($"."chnrow[MenuTitle])?></td>
                      </tr>
					  <?php if($"."chnrow[Image]!=''){?>
					  <tr>
                        <td height=\"20\"></td>
                      </tr>
                      <tr>
                        <td><img src=\"uploaded_files/ImageMenu/<?php echo ($"."chnrow[Image])?>\" border=\"0\" /></td>
                      </tr>
					  <?php } ?>
					  <tr>
                        <td height=\"5\"></td>
                      </tr>
					   <tr>
                        <td class=\"border_bottom\"></td>
                      </tr>
                      <tr>
                        <td height=\"10\"></td>
                      </tr>
					  <tr>
                        <td valign=\"top\" class=\"h2_int\"><?php echo ($"."chnrow[MenuTitle])?></td>
                      </tr>
					  
					  <tr>
                        <td height=\"10\"></td>
                      </tr>
                      <tr>
                        <td valign=\"top\" class=\"content_all\"><?php echo ($"."row2[page_description])?></td>
                      </tr>
					   <tr>
                        <td>&nbsp;</td>
                      </tr>
                      
                      
                   
                      
                      <tr>
                        <td valign=\"top\">&nbsp;</td>
                      </tr>
                      <tr>
                        <td valign=\"top\">&nbsp;</td>
                      </tr>
                    </table>
					
 						"; 		
				   
      				$content.="
							 <?php include('includes/footer_user.php');?>";
			
			
			touch($FileName);
			$fp = fopen ($FileName, "w+");
			fwrite($fp,$content);
			fclose($fp);
			
			  $ins_qry = "INSERT INTO emirates_static_pages (page_name, page_description,page_admin_id) VALUES ('$MenuName','Please Update Your Content From CMS For This Page','$id')";
		      $contact->Execute($ins_qry) or die("Could Not Insert");
			
			
					
					
					?>
							<script language="javascript">
							    location.href="menu_list.php";
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

if(isset($MenuID))
{
	$query="select * from imp_menu where MenuID='".$MenuID."'";
	$recordSet=$contact->Execute($query) or die($contact->ErrorMsg());
    $NumRecords=$recordSet->RecordCount();;
	
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE><?php echo $title_message;?></TITLE>
<script language="javascript" type="text/javascript">
function ShowHide(obj,val)
{
if(val=='N')
{
document.getElementById(obj).style.display = '';
}
else
{
document.getElementById(obj).style.display = 'none';
}

}
</script>
<script language="javascript" src="js/validation.js"></script>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1"><LINK 
href="css/css.css" type=text/css rel=stylesheet>
<META content="MSHTML 6.00.2600.0" name=GENERATOR>
<script language=javascript>
function PostSearchForm()
{
//var emailID=document.form1.adm_email
//var x = document.form1.adm_phone.value
   	
	if(document.form1.MenuName.value=="")
	{
		alert("Please Enter Menu Name");
		document.form1.MenuName.value='';
		document.form1.MenuName.focus();
		return false;
	}
	if(document.form1.MenuTitle.value=="")
	{
		alert("Please Enter Menu Title");
		document.form1.MenuTitle.value='';
		document.form1.MenuTitle.focus();
		return false;
	}
	if(document.form1.MetaDescription.value=="")
	{
		alert("Please Enter Your Description");
		document.form1.MetaDescription.value='';
		document.form1.MetaDescription.focus();
		return false;
	}
		if(document.form1.MenuURL.value=="")
	{
		alert("Please Enter Menu URL ");
		document.form1.MenuURL.value='';
		document.form1.MenuURL.focus();
		return false;
	}
	 return true;
}

</script>
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
                <TD class=blueheading align=left width="56%">Menu Info </TD>
					<td width="41%" align="right"><a href="menu_list.php">
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
                <TD align=center><?php echo display_session_msg();?></TD>
              </TR> <TR>
                <TD align=center>&nbsp;</TD>
              </TR>
              <TR>
                <TD height=260 align=left valign="top">
				
				<form enctype="multipart/form-data" name="form1" method="post" action="<?php echo $PHP_SELF;?>" onSubmit="return PostSearchForm();">
				
				<table width="80%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				    <table width="100%" border="0" cellpadding="0" cellspacing="0">
				     <tr><td align="left" class="white_bold">Add/Edit MENU</td>
				      <td align="right" class="white_bold"><font class="red_txt">*</font> Required</td>
				     </tr>
					</table>
				  </td>   
				</tr>
				
				<tr class="oddClass">
					<td><span class="fieldsname">Menu Name: </span><font class="red_txt">*</font></td>
					<td><input name="MenuName" type="text" class="textbox12" value="<?php if($_GET['MenuID']!='') { echo $recordSet->fields[MenuName]; } else { echo $_REQUEST['MenuName']; } ?>"></td>
				</tr>
				
				<tr class="evanClass">
					<td><span class="fieldsname"> Page Title : </span><font class="red_txt">*</font></td>
				    <td><input name="MenuTitle" type="text" class="textbox12" value="<?php if($_GET['MenuID']!='') { echo $recordSet->fields[MenuTitle]; } else { echo $_REQUEST['MenuTitle'];}?>"></td>
				</tr>
				  
				<tr class="oddClass">
				    <td><span class="fieldsname"> Meta Title : </span><font class="red_txt"></font></td>
				    <td><TEXTAREA  NAME="MetaTitle" ROWS="3" COLS="25" ><?php if($_GET['MenuID']!='') { echo $recordSet->fields[MetaTitle]; } else { echo $_REQUEST['MetaTitle'];}?></TEXTAREA></td>
			   </tr>
			   
			   <tr class="oddClass">
				    <td><span class="fieldsname"> Meta Keyword : </span><font class="red_txt"></font></td>
				    <td><TEXTAREA  NAME="MetaKeyword" ROWS="3" COLS="25" ><?php if($_GET['MenuID']!='') { echo $recordSet->fields[MenuKeyword]; } else { echo $_REQUEST['MetaKeyword'];}?></TEXTAREA></td>
			   </tr>
			   
			   <tr class="oddClass">
				    <td><span class="fieldsname"> Meta Description : </span><font class="red_txt"></font></td>
				    <td><TEXTAREA  NAME="MetaDescription" ROWS="3" COLS="25" ><?php if($_GET['MenuID']!='') { echo $recordSet->fields[MetaDescription]; } else { echo $_REQUEST['MetaDescription'];}?></TEXTAREA></td>
			   </tr>
				  
				
				  
				<tr class="evanClass">				    
					<td  class="fieldsname"> Image :</td>
                    <td align="left"  >
                    <?php if($_REQUEST['MenuID']!='') {
					       if($recordSet->fields['Image']!='')
	                { ?>
	                <img src="../uploaded_files/ImageMenu/<?=$recordSet->fields['Image']?>" width="100"><br> 
	               <input type="hidden" name="MainImage2" value="<?=$recordSet->fields['Image'];?>">
                   <? } else { ?>
                  No Image Available<br>
                  <? } }?>
	                <input type=file class='bordered'  name="maenuimage" size=26></td>			
					
				</tr>
				
				<tr class="oddClass">
				  <td><span class="fieldsname"> Menu URL : </span><font class="red_txt">*</font></td>
				  <td><input type="text" name="MenuURL"<?php if($_GET['MenuID']!='') echo"readonly";?> class="textbox" size="26" value="<?php if($_GET['MenuID']!='') { echo $recordSet->fields[URL]; } else { echo $_REQUEST['MenuURL'];}?>">&nbsp;&nbsp;Like(contactus.php)
		 <br /> Please Do Not Use Space in Menu URL</td>
		       </tr>
				
				
			 <?php
               $SqlMenu="select * from imp_menu where ParentID ='0'";
               $ResultMenu=$contact->Execute($SqlMenu) or die($contact->ErrorMsg());   
               ?>
				  
			   <tr class="evanClass">
				  <td><span class="fieldsname"> Parent Page: </span><font class="red_txt"></font></td>
				  <td><select name="ParentPage"  >
		              <option value="">Main Menu</option>
			          <?php while (!$ResultMenu->EOF) 
			          {?>
			          <option value="<?php echo $ResultMenu->fields['MenuID'] ;?>"<?php if($ResultMenu->fields['MenuID']==$recordSet->fields['ParentID'])echo"selected";?>><? echo $ResultMenu->fields['MenuName'] ;?></option>			   
			          <?php  $ResultMenu->MoveNext();
							   }
							     $ResultMenu->Close(); #To close Record set  ?>
		              </select></td>
			   </tr>
			   
			   <tr class="evanClass">
				    <td><span class="fieldsname">Target</span></td> 
				    <td><input type="text" name="Target" value="<?php if($_GET['MenuID']!='') { echo $recordSet->fields[Target]; } else { echo $_REQUEST['Target'];}?>"></td> 
				</tr>
			   
				<tr class="oddClass">
				    <td><span class="fieldsname">View on Menu : </span></td> 
				    <td><select name='view' >
				        <option value=''> Select </option>
				        <option value='Y'<?php if('Y'==$recordSet->fields['view'])echo"selected";?>> Yes </option>
				        <option value='N'<?php if('N'==$recordSet->fields['view'])echo"selected";?>> No </option>
			            </select></td> 
				</tr>
				
				<tr class="evanClass">
				    <td><span class="fieldsname">Status:</span></td> 
				    <td><select name='status' >
				        <option value='Y'<?php if('Y'==$recordSet->fields['IsActive'])echo"selected";?>> Active</option>
				        <option value='N'<?php if('N'==$recordSet->fields['IsActive'])echo"selected";?>>InActive </option>
			            </select></td> 
				</tr>
				
				
				
	
				<tr class="oddClass">
				  <td>&nbsp;</td>
				  <td>
				  <input type="hidden" name="flag" value="yes">
				  <input type="hidden" name="MenuID" value="<?php echo $_REQUEST['MenuID'];?>">
				  <input name="submit" type="image" class="submitbutton" src="images/submit.gif"></td>
				  </tr>
				</table>	
				</form>			</TD>
              </TR>
              <TR>
        <TD 
    align=left>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR>
  <TR>
    <TD>&nbsp;</TD></TR></TBODY></TABLE>
<?php include("bottom.inc.php");?></BODY></HTML>
