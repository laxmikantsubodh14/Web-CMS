<?php
require_once("../includes/midas.inc.php");
validate_admin();
if($_REQUEST['del']=='yes')
{
            $sqlDel="delete from imp_admin where adm_id='$_REQUEST[id]'";
			$resultDel = $contact->Execute($sqlDel) or die($contact->ErrorMsg());
			//$rsDel=executeQuery($sqlDel);
			
			$sess_msg=$sitemsgs[7];
			$_SESSION['sessionMsg']=$sess_msg;
}
if(is_post_back()) {
	$arr_adm_ids = $_REQUEST['arr_cat_ids'];	
	if(is_array($arr_adm_ids)) {
		$str_adm_ids = implode(',', $arr_adm_ids);		
		if($_REQUEST['Delete']!='') {
			$sqlDel="delete from imp_admin where adm_id in ($str_adm_ids)";
			$resultDel = $contact->Execute($sqlDel) or die($contact->ErrorMsg());
			
			$sess_msg=$sitemsgs[7];
			$_SESSION['sessionMsg']=$sess_msg;
			
		} else if($_REQUEST['Activate']!='') {
			$sql = "update imp_admin set adm_status = 'Active' where adm_id in ($str_adm_ids)";
			$resultsql = $contact->Execute($sql) or die($contact->ErrorMsg());
			
			$sess_msg=$sitemsgs[5];
			$_SESSION['sessionMsg']=$sess_msg;
			
		} else if($_REQUEST['Deactivate']!='') {
			$sql = "update imp_admin set adm_status = 'Inactive' where adm_id in ($str_adm_ids)";
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
	//header("Location: ".$_SERVER['HTTP_REFERER']);
	exit;
}


$start = intval($start);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$columns = "select * ";
$sql = " from imp_admin where 1 and status!='O'";


//$sql = apply_filter($sql, $adm_login_id, $adm_login_id_filter,'adm_login_id');



$order_by == '' ? $order_by = 'adm_id' : true;
$order_by2 == '' ? $order_by2 = 'desc' : true;

$sql .= "order by $order_by $order_by2 ";

$sql_count = "select count(*) ".$sql; 
$sql .= "limit $start, $pagesize ";
$sql = $columns.$sql;
$result = $contact->Execute($sql) or die($contact->ErrorMsg());
$Total_Records=$result->RecordCount();  $result->fields[0];
//$result = mysql_query($sql) or die(db_error($sql));

$reccnt = db_scalar($sql_count);
?>

<link href="styles.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="../includes/general.js"></script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<?php include("top.inc.php");?>
<div id="content">
<table width="100%" border="0" cellpadding="4" cellspacing="1" class="tblBackColor">
  <tr bgcolor="#FFFFFF"><td><table width="100%" border="0" cellpadding="0" cellspacing="0" style="BACKGROUND-IMAGE: url(images/tablebgrep.gif)">
    <tr><td width="3%" class="pageHead"><img height="17" alt="" 
                  src="images/orangebullet.gif" width="17" 
                vspace="3" /></td>
    <td width="97%" align="left"><div id="pageHead">Admin List</div></td></tr></table>
</td></tr>



 
<tr><td height="200" bgcolor="#FFFFFF"><table width="100%">
  <tr><td><br>
  <?php echo display_session_msg();?>
  <!--<form name="form2" method="get" action="<?php echo $_SERVER['PHP_SELF']?>">
 <table  border="0" align="center" cellpadding="2" cellspacing="0" class="tableSearch">
    <tr align="center">
      <th colspan="2" align="left">Search</th>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF" class="tdLabel style1">Cat Parent Id</td>
      <td bgcolor="#FFFFFF"><span class="style1">
        <input type="text" name="cat_parent_id">
        <?php echo filter_dropdown('cat_parent_id_filter', $cat_parent_id)?>
      </span></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><span class="style1"></span></td>
      <td bgcolor="#FFFFFF"><span class="style1">
        <input name="pagesize" type="hidden" id="pagesize" value="<?php echo $pagesize?>" />
        <input type="submit" name="Submit" value="Submit" class="button">
      </span></td>
    </tr>
  </table>
</form>--> 
</td>
  </tr>

<tr><td height="250" valign="top"><br>
       <div align="right"> <a href="add_admin.php">Add New 
    Admin</a></div>
    <?php if($Total_Records==0){?>

    <div class="msg">Sorry, no records found.</div>
<?php } else{ ?>
  <div align="right">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <tr><td width="77%">&nbsp;</td>
	  <td width="23%" align="right">    <span class="fieldsname">Showing Records</span>: 
      <?php echo $start+1?> 
      <span class="fieldsname">to</span> 
      <?php echo ($reccnt<$start+$pagesize)?($reccnt-$start):($start+$pagesize)?>
      <span class="fieldsname">      of</span>      <?php echo $reccnt?></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td align="right">&nbsp;</td>
	    </tr>
	</table>
  </div>


  <div>Records Per Page:
    <?php echo pagesize_dropdown('pagesize', $pagesize);?>
</div>
  <form name="form1" method="post" action="">
  <table width="100%"  border="0" cellpadding="3" cellspacing="1" bgcolor="#d8d8d8" class="tableList" >
    <tr>
	      <th width="8%" nowrap> SNo. <?php echo sort_arrows('adm_id')?></th>
		  
            
			<!--<th width="15%" nowrap> Password <?php //echo sort_arrows('adm_password')?></th>-->
            <th width="13%" nowrap>Username<?php echo sort_arrows('adm_login_id')?></th>
			 <th width="8%" nowrap> Login id <?php echo sort_arrows('adm_login_id')?></th>
			<th width="13%" nowrap>Email<?php echo sort_arrows('adm_email')?></th>
			
			<th width="7%" nowrap>Status <?php echo sort_arrows('adm_status')?></th>
			
            <th width="6%"></th>
            <th width="4%"><input name="check_all" type="checkbox" id="check_all" value="1" onClick="checkall(this.form)"></th>
	 </tr>
 <?php
while (!$result->EOF) {
	//$line = ms_display_value($line_raw);
	//@extract($line);
	$css = ($css=='trOdd')?'trEven':'trOdd';
	if($result->fields['adm_status']=="Inactive") { $css="disable_row"; }
?>   <tr class="<?php echo $css?>">
      	      <td nowrap><?php echo $result->fields['adm_id'];?> </td>
			  
			  <!--<td nowrap><?php //echo $adm_password?></td>-->
            <td nowrap><strong><a href='<?php echo $_SERVER['PHP_SELF']."?userId=$result->fields[user_id]";?>&show=product' class="blue_txt"> </a><b>
			
			<?php echo $result->fields['adm_login_id']; ?></b></strong></td>
			<td align="center" nowrap><?php echo $result->fields['adm_login_id'];?></td>
			<td align="center" nowrap><?php echo $result->fields['adm_email'];?></td>
	        <td align="center" nowrap><?php echo $result->fields['adm_status'];?></td>
            <td align="center" nowrap valign="middle"><a href="add_admin.php?adm_id=<?php echo $result->fields['adm_id'];?>"><img src="images/icon-edit.gif" border="0" alt="Edit" /></a>&nbsp;|&nbsp;<a href="admin_list.php	?del=yes&id=<?php echo $result->fields['adm_id']?>"><img src="images/icon-delete.gif" border="0" alt="Delete" /></a></td>
            <td width="4%" align="center" nowrap><input name="arr_cat_ids[]" type="checkbox" id="arr_cat_ids[]" value="<?php echo $result->fields['adm_id'];?>"></td>    
 </tr>
 <?php 

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
                <td class="fieldsname">&nbsp;Disabled Admin. </td>
              </tr>
          </table></td>
          <td align="right"><input type="submit" name="Activate" value="Activate" class="button"/>
      | <input type="submit" name="Deactivate" value="Deactivate" class="button"/>
        
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
</table>
</div>
<?php include("bottom.inc.php");?>
