<?php
require_once("../includes/midas.inc.php");
validate_admin();
extract($_REQUEST);
if($_REQUEST['del']=='yes')
{
            $select_picture = "select Image, URL  from imp_menu  where MenuID='$_REQUEST[id]'";
            $resultimg=$contact->Execute($select_picture) or die($contact->ErrorMsg());
              if($resultimg->fields['Image']!='')
              {
	           $src="../uploaded_files/ImageMenu/$resultimg->fields[Image]";
		       @unlink($src);
              }
              if($resultimg->fields['URL']!='')
              {
			    $pageName=$resultimg->fields[URL];
	           $src1="../$pageName";
               @unlink($src1);
              }
			  			
			$sqlDel="delete from imp_menu where MenuID='$_REQUEST[id]'";
			$resultDel = $contact->Execute($sqlDel) or die($contact->ErrorMsg());
			$sess_msg=$sitemsgs[7];
			$_SESSION['sessionMsg']=$sess_msg;
}

if(is_post_back()) {
	$bb = $_REQUEST['bb'];	
	if(is_array($bb)) {
		$bbb = implode(',', $bb);		
		if($_REQUEST['Delete']!='') {		
			
			$select_picture = "select Image, URL  from imp_menu  where MenuID in ($bbb)";
            $resultimg=$contact->Execute($select_picture) or die($contact->ErrorMsg());
			
			while (!$resultimg->EOF) 
	       {
              if($resultimg->fields['Image']!='')
              {
	           $src="../uploaded_files/ImageMenu/$resultimg->fields[Image]";
		       @unlink($src);
              }
              if($resultimg->fields['URL']!='')
              {
	           $src1="../$resultimg->fields[URL]";
               @unlink($src1);
              }
			  
		      $resultimg->MoveNext();
            }
				$resultimg->Close(); #To close Record set   
				
			$sqlDel="delete from imp_menu where MenuID in ($bbb)";
			$resultDel = $contact->Execute($sqlDel) or die($contact->ErrorMsg());
			
			$sess_msg=$sitemsgs[7];
			$_SESSION['sessionMsg']=$sess_msg;
			
		} else if($_REQUEST['Activate']!='') {
			$sql = "update  imp_menu  set IsActive= 'Y' where MenuID in ($bbb)";
			$resultsql = $contact->Execute($sql) or die($contact->ErrorMsg());
			
			$sess_msg=$sitemsgs[5];
			$_SESSION['sessionMsg']=$sess_msg;
			
		} else if($_REQUEST['Deactivate']!='') {
			$sql = "update imp_menu set IsActive= 'N' where MenuID in ($bbb)";
			$resultsql = $contact->Execute($sql) or die($contact->ErrorMsg());
			
			$sess_msg=$sitemsgs[6];
			$_SESSION['sessionMsg']=$sess_msg;
		}
	}
	?>
				<script language="javascript">
				   location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
				</script>
				<?php 
	exit;
}
//ParentPage

$start = intval($start);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$columns = "select * ";
$sql = " from  imp_menu where ParentID='0'";
$sql= apply_filter($sql, $_REQUEST['ParentPage'], "=",'MenuID');
$order_by == '' ? $order_by = 'MenuID' : true;
$order_by2 == '' ? $order_by2 = 'desc' : true;
$sql .= "order by $order_by $order_by2 ";
$sql_count = "select count(*) ".$sql; 
$sql .= "limit $start, $pagesize ";
$sql = $columns.$sql;
$result = $contact->Execute($sql) or die($contact->ErrorMsg());
$Total_Records=$result->RecordCount();  $result->fields[0];
$reccnt = db_scalar($sql_count);

function showsubmenu($id)
    {
	  global $contact;
	 $SqlSelectsubMenu="select * from imp_menu where ParentID='$id' order by Ordering";
     $ResultSubSelectMenu=$contact->Execute($SqlSelectsubMenu);	  
	 $Total_Records2=$ResultSubSelectMenu->RecordCount();
	 if($Total_Records2>0)
	 {
	 while (!$ResultSubSelectMenu->EOF) 
	 {
	
	$css = ($css=='trOdd')?'trEven':'trOdd';
	if($ResultSubSelectMenu->fields['IsActive']=="N") { $css="disable_row"; }
	
	?><tr class="<?php echo $css?>">
      	      <td nowrap><?php echo $ResultSubSelectMenu->fields['MenuID']; ?> </td>	
       <td nowrap><strong><?php echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$ResultSubSelectMenu->fields['MenuName']; ?></strong></td>			
			<td align="center" nowrap><?php if($ResultSubSelectMenu->fields['IsActive'] =='Y') echo "Active"; else echo "InActive"; ?></td>
           
		   
<td align="center" nowrap><a href="add_menu.php?MenuID=<?php echo $ResultSubSelectMenu->fields['MenuID'];?>"><img src="images/icon-edit.gif" border="0" alt="Edit" /></a>&nbsp;|&nbsp;<a href="menu_list.php?del=yes&id=<?php echo $ResultSubSelectMenu->fields['MenuID'];?>"><img src="images/icon-delete.gif" border="0" alt="Delete" /></a> </td>
			     
		  
   <td width="4%" align="center" nowrap>
     <input name="bb[]" type="checkbox" id="bb[]" value="<?php echo $ResultSubSelectMenu->fields['MenuID'];?>">
   </td>    
 </tr>
<?php
	$ResultSubSelectMenu->MoveNext();
	  }
	$ResultSubSelectMenu->Close(); #To close Record set 
	  
} }
?>
<link href="styles.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="../includes/general.js"></script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<script language="javascript">
function chng(str)
{ 
  
   	document.catform.action="<?=$PHP_SELF;?>"
	document.catform.submit();
   	
}
</script>

<?php include("top.inc.php");?>
<title>Untitled Document</title><div id="content">


<table width="100%" border="0" cellpadding="4" cellspacing="1">

<tr>
	<td><table width="80%" height="25" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="2%" nowrap="nowrap"><a  href="reorder.php">Re-Order Pages  </a></td>
			
			
		</tr>
		
		</table></td>
</tr> 
<tr>
 <td>
<table width="100%" border="0" cellpadding="4" cellspacing="1" class="tblBackColor">
  <tr bgcolor="#FFFFFF"><td><table width="100%" border="0" cellpadding="0" cellspacing="0" style="BACKGROUND-IMAGE: url(images/tablebgrep.gif)">
    <tr><td width="3%" class="pageHead"><img height="17" alt="" 
                  src="images/orangebullet.gif" width="17" 
                vspace="3" /></td>
    <td width="97%" align="left"><div id="pageHead">Menu View</div></td></tr></table>
</td></tr>
 
<tr><td height="200" bgcolor="#FFFFFF"><table width="100%">
  <tr><td><br> <?php echo display_session_msg();?></td></tr>

<tr><td height="250" valign="top"><br>
       <div align="right"> <a href="add_menu.php">Add Menu</a></div>
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


  <div>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <tr><td >&nbsp;

  
  <span class="fieldsname">Records Per Page</span>:
    <?php echo pagesize_dropdown('pagesize', $pagesize);?> &nbsp; &nbsp;&nbsp;
	</td><td>

<form name="catform" method="get" action="">
<span class="fieldsname">Filter By Categories</span>

<?php
$SqlMenu="select * from imp_menu where ParentID ='0'";
$ResultMenu=$contact->Execute($SqlMenu) or die($contact->ErrorMsg());   
?>
<select name="ParentPage"  onchange="chng();" >
<option value="">Select Categories</option>
<?php while (!$ResultMenu->EOF) 
{?>
<option value="<?php echo $ResultMenu->fields['MenuID'] ;?>"<?php if($ResultMenu->fields['MenuID']==$_REQUEST['ParentPage'])echo"selected";?>><? echo $ResultMenu->fields['MenuName'] ;?></option>			   
<?php  $ResultMenu->MoveNext();
}
$ResultMenu->Close(); #To close Record set  ?>
</select>

</form>	

</td></tr></table>		
</div>
	
<br />
 
  <form name="form1" method="post" action="">
  <table width="100%"  border="0" cellpadding="3" cellspacing="1" bgcolor="#d8d8d8" class="tableList" >
    <tr>
	      <th width="8%" nowrap> SNo. <?php echo sort_arrows('MenuID')?></th>
             <th width="17%" nowrap>Menu Name <?php echo sort_arrows('MenuName') ?></th>
			 <th width="7%" nowrap>Status <?php echo sort_arrows('IsActive')?></th>
			
            <th width="6%"></th>
            <th width="4%"><input name="check_all" type="checkbox" id="check_all" value="1" onClick="checkall(this.form)"></th>
	 </tr>
  
  <?php
while (!$result->EOF) 
{
	//$line = ms_display_value($line_raw);
	//@extract($line);
	$css = ($css=='trOdd')?'trEven':'trOdd';
	if($result->fields['IsActive']=="N") { $css="disable_row"; }
?>   <tr class="<?php echo $css?>">
      	      <td nowrap><?php echo $result->fields['MenuID'];?> </td>	
       <td nowrap><strong><?php echo $result->fields['MenuName']; ?></strong></td>			
			<td align="center" nowrap><?php if($result->fields['IsActive'] =='Y') echo "Active"; else echo "InActive"; ?></td>
           
		   
<td align="center" nowrap><a href="add_menu.php?MenuID=<?php echo $result->fields['MenuID'];?>"><img src="images/icon-edit.gif" border="0" alt="Edit" /></a>&nbsp;|&nbsp;<a href="menu_list.php?del=yes&id=<?php echo $result->fields['MenuID'];?>"><img src="images/icon-delete.gif" border="0" alt="Delete" /></a> </td>
			     
		  
   <td width="4%" align="center" nowrap>
     <input name="bb[]" type="checkbox" id="bb[]" value="<?php echo $result->fields['MenuID'];?>">
   </td>    
 </tr><?php 
 $mid=$result->fields['MenuID'];
			showsubmenu($mid);				  
 $result->MoveNext();
            }
  			
	
	 $result->Close(); #To close Record set 


?>
    <tr align="right">
      <td colspan="10" bgcolor="#FFFFFF"><table width="100%">
        <tr>
          <td align="left"><table cellspacing="1" cellpadding="1" class="gray_txt" border="0">
              <tr>
                <td width="20px"  class="disable_row">&nbsp;</td>
                <td>&nbsp;<span class="fieldsname">Disabled Page. </span></td>
              </tr>
          </table></td>
          <td align="right"><input type="submit" name="Activate" value="Activate" class="button"/>
      |<input type="submit" name="Deactivate" value="Deactivate" class="button"/>
        
        |<input name="Delete" type="submit" id="Delete" value="Delete" class="buttonDelete">        </td>
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




