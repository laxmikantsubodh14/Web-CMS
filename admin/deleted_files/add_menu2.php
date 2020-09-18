<?php include_once"../includes/midas.inc.php"; 
validate_admin();
$AdminId=trim($_REQUEST['adm_id']);
if($_POST['flag']=="yes") {
@extract($_REQUEST);
$error='';
		if($MenuID!='') 
		{
		  	   // if(checkUniquenessOfString1('synergy_menu2','MenuTitle',$MenuTitle,'MenuID' ,$MenuID))
			if(checkUniquenessOfString2('synergy_menu2','MenuTitle',$MenuTitle,'MenuID',$MenuID,'ParentID',$ParentPage))
						 { $error='MenuTitle';
					$sess_msg=$sitemsgs[30];
					$_SESSION['sessionMsg']=$sess_msg;	}
			//if(checkUniquenessOfString1('synergy_menu2','MenuName',$MenuName,'MenuID' ,$MenuID))
					 if(checkUniquenessOfString2('synergy_menu2','MenuName',$MenuName,'MenuID',$MenuID,'ParentID',$ParentPage))
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
					
					$sqlUpdate="update synergy_menu2 set MenuName='$MenuName', MenuTitle='$MenuTitle', MenuKeyword='$MetaKeyword', IsActive='$status', view='$view', ParentID='$ParentPage', linkpage='$linkpage', openin='$openin', Target='$Target', MetaDescription='$MetaDescription', MetaTitle='$MetaTitle'";
					
					if($_FILES['maenuimage']['name']!= "")
                        $sqlUpdate.=" ,Image ='$imageName'";
					
					$sqlUpdate.=" where MenuID='$MenuID'";
					$result_Update = $contact->Execute($sqlUpdate) or die($contact->ErrorMsg());
					$sess_msg=$sitemsgs[2];
					$_SESSION['sessionMsg']=$sess_msg;
				
				
							?>
							<script language="javascript">
							    location.href="menu_list2.php";
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
				if(checkUniquenessOfString('synergy_menu2','MenuTitle',$MenuTitle))
				   { $error='MenuTitle';
					$sess_msg=$sitemsgs[30];
					$_SESSION['sessionMsg']=$sess_msg;	}
				if(checkUniquenessOfString('synergy_menu2','MenuName',$MenuName))
				  {  $error='duplicate';
					$sess_msg=$sitemsgs[29];
					$_SESSION['sessionMsg']=$sess_msg;	}
				if((file_exists($FileName)))*/
	      if(checkUniquenessOfString_add2('synergy_menu2','MenuName',$MenuName,'ParentID',$ParentPage))   
				 $error="Existfile";
		  if(checkUniquenessOfString_add2('synergy_menu2','MenuTitle',$MenuTitle,'ParentID',$ParentPage))   
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
				   $SqlMaxOrder="select Ordering from synergy_menu2 order by Ordering desc limit 0,1";
				   $ResultMaxOrder=$contact->Execute($SqlMaxOrder) or die($contact->ErrorMsg());
				   $order=$ResultMaxOrder->fields['Ordering']+1;
				 }
				 else
				 {
				   $order=0;
				 }
					
					$sqlInsert="insert into synergy_menu2 (MenuID, MenuName, MenuTitle, MenuKeyword, Image, URL, ParentID, IsActive, Ordering, view,linkpage,openin,Target,MetaTitle,MetaDescription) values ('','".$MenuName."','".$MenuTitle."','".$MetaKeyword."','".$imageName."','".$MenuURL."','".$ParentPage."','".$status."','".$order."','".$view."','".$linkpage."','".$openin."','".$Target."','".$MetaTitle."','".$MetaDescription."')";
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
					$content.="<?php include('includes/midas.inc.php');";
					$content.=" ";
					$content.="$"."pageid=$id;";
					$content.=" ";
					$chnheading2="\"select * from synergy_menu2 where MenuID='$id'\"";
					$content.=" ";
					$content.="$"."chnheading=$chnheading2;";
					$content.=" ";
					$content.="$"."chnresult=mysql_query($"."chnheading);";
					$content.=" ";
					$content.="$"."chnrow=mysql_fetch_array($"."chnresult);";
					$qq_im="\"select * from synergy_static_pages2 where page_admin_id='$id'\"";
					$content.=" ";
					$content.="$"."qq_cms=$qq_im;";
					$content.=" ";
					$content.="$"."result2=mysql_query($"."qq_cms);";
					$content.=" ";
					$content.="$"."row2=mysql_fetch_array($"."result2);";
					$content.=" ";
					$content.=" ?>
					
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
<title><?php echo $"."chnrow[MetaTitle];?></title>
<meta name=\"description\" content=\"<?php echo $"."chnrow[MetaDescription];?>\" />
<meta name=\"keywords\" content=\"<?php echo $"."chnrow[MenuKeyword];?>\" />
<link href=\"css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
</head>

<body>
<div id=\"wapper\">
 <div class=\"menu_outer\">
  <div class=\"menu_left\"><img src=\"images/menu_top_left.jpg\" alt=\"\" /></div>
  <div class=\"menu_middle\">
   <div class=\"logo_top\"><img src=\"images/logo.jpg\" alt=\"\" width=\"225\" height=\"64\" /></div>
   <div class=\"menulink_outer\">
     <?php include_once(\"testmen.php\"); ?>

   
   
   </div>
  

  
  </div>
  <div class=\"menu_right\"><img src=\"images/menu_top_right.jpg\" alt=\"\" /></div>
 
 </div>
<div class=\"contener_middle_outer\">
 <div class=\"contener_middle_inner\">
  <div class=\"middle_heading_out\">
   <div class=\"middle_heading\"><?php echo $"."chnrow[MenuTitle]; ?> </div>
   <div class=\"middle_contentarea\"><?php echo $"."row2[page_description]; ?></div>
  
  
  
  </div>
					
					
					
 						"; 		
				    
      				$content.="</td>
                   				 </tr>
                    
               			  		 </table>
							 <?php include('includes/secondFooter.php');?>";
			
			
			touch($FileName);
			$fp = fopen ($FileName, "w+");
			fwrite($fp,$content);
			fclose($fp);
			
			  $ins_qry = "INSERT INTO synergy_static_pages2 (page_name, page_description,page_admin_id) VALUES ('$MenuName','Please Update Your Content From CMS For This Page','$id')";
		      $contact->Execute($ins_qry) or die("Could Not Insert");
			
			
					
					
					?>
							<script language="javascript">
							    location.href="menu_list2.php";
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
	$query="select * from synergy_menu2 where MenuID='".$MenuID."'";
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
					<td width="41%" align="right"><a href="menu_list2.php">
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
				
				<form name="form1" method="post" action="<?php echo $PHP_SELF;?>" onSubmit="return valid_menu('form1');">
				
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
				  
				
				  
				
				
				<tr class="oddClass">
				  <td><span class="fieldsname"> Menu URL : </span><font class="red_txt">*</font></td>
				  <td><input type="text" name="MenuURL"<?php if($_GET['MenuID']!='') echo"readonly";?> class="textbox" size="26" value="<?php if($_GET['MenuID']!='') { echo $recordSet->fields[URL]; } else { echo $_REQUEST['MenuURL'];}?>">&nbsp;&nbsp;Like(contactus.php)
		 <br /> Please Do Not Use Space in Menu URL</td>
		       </tr>
				
				
			 <?php
               $SqlMenu="select * from synergy_menu2 where ParentID ='0'";
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
				        <option value=''>« Select »</option>
				        <option value='Y'<?php if('Y'==$recordSet->fields['view'])echo"selected";?>>« Yes »</option>
				        <option value='N'<?php if('N'==$recordSet->fields['view'])echo"selected";?>>« No »</option>
			            </select></td> 
				</tr>
				
				<tr class="evanClass">
				    <td><span class="fieldsname">Status:</span></td> 
				    <td><select name='status' >
				        <option value='Y'<?php if('Y'==$recordSet->fields['IsActive'])echo"selected";?>>« Active »</option>
				        <option value='N'<?php if('N'==$recordSet->fields['IsActive'])echo"selected";?>>« InActive »</option>
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
