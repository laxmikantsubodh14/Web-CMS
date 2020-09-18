<?php
require_once("../includes/midas.inc.php");
validate_admin();
extract($_REQUEST);
$start = intval($start);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$columns = "select * ";
$sql = " from imp_contactus where ContactID='$ContactID' ";
$order_by == '' ? $order_by = 'AddedDate' : true;
$order_by2 == '' ? $order_by2 = 'asc' : true;
$sql .= "order by $order_by $order_by2 ";
$sql_count = "select count(*) ".$sql; 
$sql .= "limit $start, $pagesize ";
$sql = $columns.$sql;
$result = mysql_query($sql) or die(db_error($sql));
$reccnt = db_scalar($sql_count);

$line_raw = mysql_fetch_array($result);
	$line = ms_display_value($line_raw);
	@extract($line);
?>
<LINK href="css/css.css" type=text/css rel=stylesheet>
<table width="96%" border="0" align="center" cellpadding="4" cellspacing="1" class="tblBackground">
				<tr class="header_row">
				  <td colspan="2" class="white_txt">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0">
				    <tr>
				      <td align="left" class="white_bold">Contact Us Quote Detail </td>
				      <td align="right" class="white_bold">&nbsp;</td>
				    </tr></table>				  </td>
				</tr>
		
			
				<tr class="oddClass">
				  <td><span class="fieldsname">Name</span></td>
				  <td>  <?php echo $Name;?> </td></tr>
				  
				 <tr class="evanClass">
				  <td><span class="fieldsname">Email-Id :</span><font class="red_txt"></font></td>
				  <td><?php echo $Email;?></td></tr> 
				  
				  <tr class="oddClass">
				  <td><span class="fieldsname">Contact Number ? :</span></td>
				  <td><?php echo $Phone;?></td></tr>
				  
				   <tr class="evanClass">
				  <td><span class="fieldsname">Instant Messenger :</span></td>
				  <td><?php echo $Messenger;?> , <?php echo $Mess_add;?></td></tr>  
				  
				  <tr class="oddClass">
				  <td><span class="fieldsname">How did u find us ? :</span></td>
				  <td><?php echo $findus;?></td></tr>
				  
				  <tr class="evanClass">
				  <td><span class="fieldsname">Country :</span><font class="red_txt"></font></td>
				  <td><?php echo $Country;?> </td>                  </tr> 		
				  
			   <tr class="oddClass">
				  <td><span class="fieldsname">Information Required:</span></td>
				  <td>	<?php echo $inforeq;?>
				   </td>
				  </tr> 
				  
				 
				</table>