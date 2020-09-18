<?php 
require_once("../includes/midas.inc.php");
  
$start = intval($start);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$columns = "select * ";
$sql = " from imp_static_pages where 1 ";
$sql = apply_filter($sql, $page_id, $page_id_filter,'page_id');
$order_by == '' ? $order_by = 'page_id' : true;
$order_by2 == '' ? $order_by2 = 'desc' : true;
$sql .= "order by $order_by $order_by2 ";

$sql_count = "select count(*) ".$sql; 
$sql .= "limit $start, $pagesize ";
$sql = $columns.$sql;
$result = mysql_query($sql) or die(db_error($sql));
$reccnt = db_scalar($sql_count);
//$num=mysql_num_rows($result);
?>
<link href="styles.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="../includes/general.js"></script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
<?php  include("top.inc.php");?>
<div id="content">
<table width="100%" border="0" cellpadding="4" cellspacing="1" class="tblBackColor">
  <tr bgcolor="#FFFFFF"><td><table width="100%" border="0" cellpadding="0" cellspacing="0" style="BACKGROUND-IMAGE: url(images/tablebgrep.gif)">
    <tr><td width="3%" class="pageHead"><img height="17" alt="" 
                  src="images/orangebullet.gif" width="17" 
                vspace="3" /></td>
    <td width="97%" align="left"><div id="pageHead">Static Page  List</div></td></tr></table>
</td></tr>
 
<tr><td height="200" bgcolor="#FFFFFF"><table width="100%">
  <tr><td><br>
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
</td></tr>

<tr><td height="250" valign="top"><br>
       <div align="right"> <a href="add_page.php"></a></div>
    <?php  if(mysql_num_rows($result)==0){?>

    <div class="msg">Sorry, no records found.</div>
<?php  } else{ ?>
  <div align="right">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <tr><td width="77%">&nbsp;</td>
	  <td width="23%" align="right">    <span class="fieldsname">Showing Records:</span> 
      <?php echo  $start+1?> 
      <span class="fieldsname">to</span> 
      <?php echo ($reccnt<$start+$pagesize)?($reccnt-$start):($start+$pagesize)?>
      <span class="fieldsname">      of</span>      <?php echo  $reccnt?></td>
	  </tr>
	  <tr>
	    <td>&nbsp;</td>
	    <td align="right"></td>
	    </tr>
	</table>
  </div>


  <div><span class="fieldsname">Records Per Page:</span>
    <?php echo pagesize_dropdown('pagesize', $pagesize);?>
</div>
  <form name="form1" method="post" action="">
  <table width="100%"  border="0" cellpadding="3" cellspacing="1" bgcolor="#d8d8d8" class="tableList" >
    <tr>
	      
            <th width="60%" align="center" nowrap> Page name  <?php echo  sort_arrows('page_name')?></th>
		 <th width="40%" nowrap>&nbsp; </th>
			</tr>
 <?php 
while ($line_raw = mysql_fetch_array($result)) {

	$line = ms_display_value($line_raw);
	@extract($line);
	
	$css = ($css=='trOdd')?'trEven':'trOdd';
	if($user_status=="Inactive") { $css="disable_row"; }
?>   

		<tr class="<?php echo $css?>">
      	      
			  <td nowrap align="center"><?php echo $page_name?></td>
			   
			 
            <td align="center" nowrap>              <!--<a href="categories_details.php?cat_id=<?php echo $user_id?>">Details</a> | -->    <a href="add_page.php?PageId=<?php echo $page_id;?>">Edit</a> </td>
            </tr>
			
			
			<?php  }
?>
  </table>
  
  </form>
<?php  
}?>
<?php  include("paging.inc.php");?></td>
</tr></table></td>
</tr>
</table>
</div>
<?php  include("bottom.inc.php");?>
