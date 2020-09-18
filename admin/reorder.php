<?php
require_once("../includes/midas.inc.php");
validate_admin();
extract($_REQUEST);

$start = intval($start);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$columns = "select * ";
$sql = " from imp_menu where ParentID='0'";
$sql= apply_filter($sql, $_REQUEST['ParentPage'], "=",'MenuID');
$order_by == '' ? $order_by = 'Ordering' : true;
$order_by2 == '' ? $order_by2 = 'asc' : true;
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
       <div align="right"><a href="menu_list.php">
					<img src="images/return_back.gif" border="0" class="submitbutton"></a></div>
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



</td></tr></table>		
</div>
	
<br />
 
  <form name="form1" method="post" action="">
  <table width="100%"  border="0" cellpadding="3" cellspacing="1" bgcolor="#d8d8d8" class="tableList" >
    <tr>
	      
             <th width="17%" nowrap>Menu Name <?php echo sort_arrows('MenuName') ?></th>
			 <th width="7%" nowrap>Status <?php echo sort_arrows('IsActive')?></th>			
            <th width="6%">Re-Order</th>
      </tr>
  
  <?php
                $SqlMaxOrder="select max(Ordering) maxorder from imp_menu where  ParentID = '0'";
				$ResultMaxOrder=mysql_query($SqlMaxOrder);
				$RowMaxOrder=mysql_fetch_array($ResultMaxOrder);
				 $order=$RowMaxOrder[maxorder];
				
				$SqlminOrder="select min(Ordering) minorder from imp_menu  where  ParentID = '0'";
				$ResultminOrder=mysql_query($SqlminOrder);
				$RowminOrder=mysql_fetch_array($ResultminOrder);
				$ordermin=$RowminOrder[minorder];
				
while (!$result->EOF) 
{
	//$line = ms_display_value($line_raw);
	//@extract($line);
	$css = ($css=='trOdd')?'trEven':'trOdd';
	if($result->fields['IsActive']=="N") { $css="disable_row"; }
?>   <tr class="<?php echo $css?>">
      	     
       <td nowrap><strong><?php echo $result->fields['MenuName']; ?></strong></td>			
			<td align="center" nowrap><?php if($result->fields['IsActive'] =='Y') echo "Active"; else echo "InActive"; ?></td>
           
		   
<td align="center" nowrap><? if($result->fields['Ordering']!=$ordermin) { ?>	
	 <a href="uporder.php?MenuID=<? echo $result->fields['MenuID']; ?>"><img src="images/arrow-up.gif" alt="UP" border="0" /></a>
	 <? } ?>
	 

<? if($RowsMenu['Ordering']!=$order) { ?>	
	  <a href="down.php?MenuID=<? echo $result->fields['MenuID']; ?>"><img src="images/arrow-down.gif" alt="Down" border="0" /></a>
	<? } ?> </td>
			     
		  
   
 </tr><?php 
 
							   
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




