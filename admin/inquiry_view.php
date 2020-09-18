<?php
require_once("../includes/midas.inc.php");
if(is_post_back()) {
	$arr_event_ids = $_REQUEST['arr_cat_ids'];	
	if(is_array($arr_event_ids)) {
		$arr_event_ids = implode(',', $arr_event_ids);		
		if($_REQUEST['Delete']!='') {
			$sqlDel="delete from imp_inquiry where Enq_ID in ($arr_event_ids)";
			$rsDel=executeQuery($sqlDel);
		} else if($_REQUEST['Activate']!='') {
			$sql = "update imp_inquiry set  status= 'Y' where Enq_ID in ($arr_event_ids)";
			mysql_query($sql) or die(db_error($sql));
		} else if($_REQUEST['Deactivate']!='') {
			$sql = "update imp_inquiry set  status= 'N' where Enq_ID in ($arr_event_ids)";
			mysql_query($sql) or die(db_error($sql));
		}
	}
	header("Location: ".$_SERVER['HTTP_REFERER']);
	exit;
}
$start = intval($start);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$columns = "select * ";
$sql = " from  imp_inquiry  where 1 ";
$sql = apply_filter($sql, $adm_login_id, $adm_login_id_filter,'Enq_ID');
$order_by == '' ? $order_by = 'Enq_ID' : true;
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
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<?php include("top.inc.php");?>
<title>Untitled Document</title><div id="content">


<table width="100%" border="0" cellpadding="4" cellspacing="1">

<tr>
	<td><?php // include("../includes/topNavigation.php");?></td>
</tr> 
<tr>
 <td>
<table width="100%" border="0" cellpadding="4" cellspacing="1" class="tblBackColor">
  <tr bgcolor="#FFFFFF"><td><table width="100%" border="0" cellpadding="0" cellspacing="0" style="BACKGROUND-IMAGE: url(images/tablebgrep.gif)">
    <tr><td width="3%" class="pageHead"><img height="17" alt="" 
                  src="images/orangebullet.gif" width="17" 
                vspace="3" /></td>
    <td width="97%" align="left"><div id="pageHead">Inquiry  View</div></td></tr></table>
</td></tr>
 
<tr><td height="200" bgcolor="#FFFFFF"><table width="100%">
  <tr><td><br> <?php echo display_session_msg();?></td></tr>

<tr><td height="250" valign="top"><br>

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
	      <th width="8%" nowrap> Name<?php echo sort_arrows('Name')?></th>
             <th width="17%" nowrap>Email-Id<?php echo sort_arrows('email')?></th>
			 <th width="17%" nowrap>Telephone<?php echo sort_arrows('Telephone')?></th>
			
            <th width="6%">Address</th>
            <th width="4%"><input name="check_all" type="checkbox" id="check_all" value="1" onClick="checkall(this.form)"></th>
	 </tr>
  
  <?php
while (!$result->EOF) 
{
	//$line = ms_display_value($line_raw);
	//@extract($line);
	$css = ($css=='trOdd')?'trEven':'trOdd';
	//if($result->fields['Status']=="N") { $css="disable_row"; }
?>   <tr class="<?php echo $css?>">
      	      
			   <td nowrap><a href='inquiry_reply1.php?inquiry_id=<? echo urlencode($result->fields['Enq_ID']) ?>'><font color=""><? echo $result->fields['Name'] ?></font></a>&nbsp;</td>
		<td align="center" nowrap><?php echo $result->fields['email']?></td>

   <td align="center" nowrap><?php echo $result->fields['Telephone']?></td>
    <td align="center" nowrap><?php echo $result->fields['Address']?></td>
			     
		  
  <td width="4%" align="center" nowrap><input name="arr_cat_ids[]" type="checkbox" id="arr_cat_ids[]" value="<?php echo $result->fields['Enq_ID'];?>"></td>    
 </tr><?php $result->MoveNext();
							 }
	$result->Close(); #To close Record set 

?>
    <tr align="right">
      <td colspan="10" bgcolor="#FFFFFF"><table width="100%">
        <tr>
          <td align="left"><table cellspacing="1" cellpadding="1" class="gray_txt" border="0">
              <tr>
                <td width="20px"  class="disable_row">&nbsp;</td>
                <td>&nbsp;<span class="fieldsname">Disabled   </span></td>
              </tr>
          </table></td>
          <td align="right">
	<input type="submit" name="Activate" value="Activate" class="button"/>
      |<input type="submit" name="Deactivate" value="Deactivate" class="button"/> | <input name="Delete" type="submit" id="Delete" value="Delete" class="buttonDelete">        </td>
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





