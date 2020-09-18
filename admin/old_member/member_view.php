<?php
require_once("../includes/midas.inc.php");
validate_admin();
if($_REQUEST['del']=='yes')
{
            $sqlDel="delete from synergy_customer where user_id='$_REQUEST[id]'";
			$resultDel = $contact->Execute($sqlDel) or die($contact->ErrorMsg());
			
			$sess_msg=$sitemsgs[7];
			$_SESSION['sessionMsg']=$sess_msg;
}
if(is_post_back()) {
	$bb = $_REQUEST['bb'];	
	if(is_array($bb)) {
		$bbb = implode(',', $bb);		
		if($_REQUEST['Delete']!='') {
			$sqlDel="delete from synergy_customer where user_id in ($bbb)";
			$resultDel = $contact->Execute($sqlDel) or die($contact->ErrorMsg());
			$sess_msg=$sitemsgs[7];
			$_SESSION['sessionMsg']=$sess_msg;
			
		} else if($_REQUEST['Activate']!='') {
			 $sql = "update synergy_customer set user_isactive= 'Y' where user_id  in ($bbb)";
			$resultsql = $contact->Execute($sql) or die($contact->ErrorMsg());
			
			$sess_msg=$sitemsgs[5];
			$_SESSION['sessionMsg']=$sess_msg;
			
		} else if($_REQUEST['Deactivate']!='') {
			$sql = "update synergy_customer set user_isactive= 'N' where user_id in ($bbb)";
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
$start = intval($start);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$columns = "select * ";
$sql = " from  synergy_customer  where 1 ";
//$sql = apply_filter($sql, $adm_login_id, $adm_login_id_filter,'user_id');
$order_by == '' ? $order_by = 'user_id' : true;
$order_by2 == '' ? $order_by2 = 'desc' : true;
$sql .= "order by $order_by $order_by2 ";
$sql_count = "select count(*) ".$sql; 
$sql .= "limit $start, $pagesize ";
$sql = $columns.$sql;
$result = $contact->Execute($sql) or die($contact->ErrorMsg());
$Total_Records=$result->RecordCount();  $result->fields[0];
$reccnt = db_scalar($sql_count);
?>
<link href="styles.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="../includes/general.js"></script>
<script language="JavaScript">
function checkall(objForm){
	len = objForm.elements.length;
	var i=0;
	for( i=0 ; i<len ; i++) {
		if (objForm.elements[i].type=='checkbox') {
			objForm.elements[i].checked=objForm.check_all.checked;
		}
	}
}
</script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<?php include("top.inc.php");?>
<title>Untitled Document</title><div id="content">


<table width="100%" border="0" cellpadding="4" cellspacing="1">
<tr>
 <td>
  
 </td>
</tr>
<tr>
 <td>
<table width="100%" border="0" cellpadding="4" cellspacing="1" class="tblBackColor">
  <tr bgcolor="#FFFFFF"><td><table width="100%" border="0" cellpadding="0" cellspacing="0" style="BACKGROUND-IMAGE: url(images/tablebgrep.gif)">
    <tr><td width="3%" class="pageHead"><img height="17" alt="" 
                  src="images/orangebullet.gif" width="17" 
                vspace="3" /></td>
    <td width="97%" align="left"><div id="pageHead">Clients  View</div></td></tr></table>
</td></tr>
 
<tr><td height="200" bgcolor="#FFFFFF"><table width="100%">
  <tr><td><br> <?php echo display_session_msg();?></td></tr>

<tr><td height="250" valign="top"><br>
       <div align="right"> <a href="members_add.php">Add Clients </a></div>
       <?php if($Total_Records==0){?>

    <div class="msg">Sorry, no records found.</div>
<?php } else{ ?>
  <div align="right">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <tr><td width="77%">&nbsp;</td>
	  <td width="23%" align="right"><span class="fieldsname">Showing Records:</span> 
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


  <div><span class="fieldsname">Records Per Page</span>:
    <?php echo pagesize_dropdown('pagesize', $pagesize);?>
</div>
 
  <form name="form1" method="post" action="">
  <table width="100%"  border="0" cellpadding="3" cellspacing="1" bgcolor="#d8d8d8" class="tableList" >
          <tr>
	          <th width="8%" nowrap> SNo. <?php echo sort_arrows('user_id')?></th>
			 
              <th width="17%" nowrap>First Name <?php echo sort_arrows('user_fname')?></th>
			  <th width="17%" nowrap>Last Name <?php echo sort_arrows('user_lname')?></th>
			  <th width="17%" nowrap>Email Id <?php echo sort_arrows('user_email')?></th>
			   <th width="17%" nowrap> Login-Id <?php echo sort_arrows('user_loginid')?></th>
			 
			 <!-- <th width="17%" nowrap>Confirm Password <?php //echo sort_arrows('user_passwd')?></th>
			  <th width="17%" nowrap>User_address1 <?php //echo sort_arrows('user_address1')?></th>
			   <th width="17%" nowrap>User_address2<?php //echo sort_arrows('user_address2')?></th>-->
			    <th width="17%" nowrap>User Phone <?php echo sort_arrows('user_phone')?></th>
				<!--<th width="17%" nowrap>User City<?php //echo sort_arrows('user_city')?></th>
			   
			  <th width="7%" nowrap>User Zip <?php //echo sort_arrows('user_zip')?></th>
			  <th width="7%" nowrap>User State <?php //echo sort_arrows('user_state')?></th>
			  <th width="7%" nowrap>User Country <?php //echo sort_arrows('user_country')?></th>-->
			  <th width="7%" nowrap>Status <?php echo sort_arrows('user_isactive')?></th>
			  <th width="6%"></th>
            <th width="4%">
			   <input name="check_all" type="checkbox" id="check_all" value="1" onClick="checkall(this.form)">
			   </th>
	 </tr>
  
  <?php
while (!$result->EOF) 
{
	$css = ($css=='trOdd')?'trEven':'trOdd';
	if($result->fields['user_isactive']=="N") { $css="disable_row"; }
// select membres payment status

	$user_id=$result->fields['user_id'];
	
	
?>   
         <tr class="<?php echo $css?>">
         <td nowrap><?php echo $result->fields['user_id']?> </td>
		
		<td align="center" nowrap><?php echo $result->fields['user_fname']?></td>
		<td align="center" nowrap><?php echo $result->fields['user_lname']?></td>
		<td align="center" nowrap><?php echo $result->fields['user_email']?></td>
		<td align="center" nowrap><?php echo $result->fields['user_loginid']?></td><!--
		<td align="center" nowrap><?php //echo $result->fields['user_passwd']?></td>
        <td align="center" nowrap><?php //echo $result->fields['user_address1']?></td>
		 
		 <td align="center" nowrap><?php //echo $result->fields['user_address2'];
		
		?></td>-->
		<td align="center" nowrap><?php echo $result->fields['user_phone']?></td>	
		<!--<td align="center" nowrap><?php //echo $result->fields['user_city']?></td>
		<td align="center" nowrap><?php //echo $result->fields['user_zip']?></td>
		<td align="center" nowrap><?php //echo $result->fields['user_state']?></td>
		<td align="center" nowrap><?php //echo $result->fields['user_country']?></td>-->
		<td align="center" nowrap><?php if($result->fields['user_isactive'] =='Y') echo "Active"; else echo "InActive"; ?></td>
           
		   
<td align="center" nowrap><a href="members_add.php?user_id=<?php echo $result->fields['user_id'];?>"><img src="images/icon-edit.gif" border="0" alt="Edit" /></a>&nbsp;|&nbsp;<a href="member_view.php?del=yes&id=<?php echo $result->fields['user_id'];?>"><img src="images/icon-delete.gif" border="0" alt="Delete" /></a> </td>
			     
		  
   <td width="4%" align="center" nowrap><input name="bb[]" type="checkbox" id="bb[]" value="<?php echo $result->fields['user_id'];?>"></td>    
 </tr><?php $result->MoveNext();
							 }
	$result->Close(); #To close Record set 

?>
    <tr align="right">
      <td colspan="12" bgcolor="#FFFFFF"><table width="100%">
        <tr>
          <td align="left"><table cellspacing="1" cellpadding="1" class="gray_txt" border="0">
              <tr>
                <td width="20px"  class="disable_row">&nbsp;</td>
                <td>&nbsp;<span class="fieldsname">Disabled  Clients </span></td>
              </tr>
          </table></td>
          <td align="right">
	<input type="submit" name="Activate" value="Activate" class="button"/>
      |<input type="submit" name="Deactivate" value="Deactivate" class="button"/> | <input name="Delete" type="submit" id="Delete" value="Delete" class="buttonDelete"></td>
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





