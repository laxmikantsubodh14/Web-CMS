<?php
require_once("../includes/midas.inc.php");
validate_admin();
if($_REQUEST['del']=='yes')
{
            $sqlDel="delete from imp_product where ProductId='$_REQUEST[id]'";
			$resultDel = $contact->Execute($sqlDel) or die($contact->ErrorMsg());
			
			$sess_msg=$sitemsgs[7];
			$_SESSION['sessionMsg']=$sess_msg;
}
if(is_post_back()) {
	$bb = $_REQUEST['bb'];	
	if(is_array($bb)) {
		$bbb = implode(',', $bb);		
		if($_REQUEST['Delete']!='') {
			$sqlDel="delete from imp_product where ProductId in ($bbb)";
			$resultDel = $contact->Execute($sqlDel) or die($contact->ErrorMsg());
			$sess_msg=$sitemsgs[7];
			$_SESSION['sessionMsg']=$sess_msg;
			
		} else if($_REQUEST['Activate']!='') {
			$sql = "update imp_product set Status= 'Y' where ProductId  in ($bbb)";
			$resultsql = $contact->Execute($sql) or die($contact->ErrorMsg());
			
			$sess_msg=$sitemsgs[5];
			$_SESSION['sessionMsg']=$sess_msg;
			
		} else if($_REQUEST['Deactivate']!='') {
			$sql = "update imp_product set Status= 'N' where ProductId in ($bbb)";
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
$sql = " from  imp_product  where 1 ";
$sql = apply_filter($sql, $adm_login_id, $adm_login_id_filter,'ProductId');
$order_by == '' ? $order_by = 'ProductId' : true;
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
 <td>
<table width="100%" border="0" cellpadding="4" cellspacing="1" class="tblBackColor">
  <tr bgcolor="#FFFFFF"><td><table width="100%" border="0" cellpadding="0" cellspacing="0" style="BACKGROUND-IMAGE: url(images/tablebgrep.gif)">
    <tr><td width="3%" class="pageHead"><img height="17" alt="" 
                  src="images/orangebullet.gif" width="17" 
                vspace="3" /></td>
    <td width="97%" align="left"><div id="pageHead">Order View</div></td></tr></table>
</td></tr>
 
<tr><td height="200" bgcolor="#FFFFFF"><table width="100%">
  <tr><td><br> <?php echo display_session_msg();?></td></tr>

<tr><td height="250" valign="top"><br>
       <!--<div align="right"> <a href="product_add.php">Add Product </a></div>-->
      

    <div class="msg">Sorry, no records found.</div>

<?php include("paging.inc.php");?></td>
</tr></table></td>
</tr>
</table></td></tr></table>
</div>
<?php include("bottom.inc.php");?>





