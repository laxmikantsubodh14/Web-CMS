<?php
require_once("../includes/midas.inc.php");
validate_admin();
if($_REQUEST['del']=='yes')
    {
		$sqlDel="delete from imp_applyjob  where ResumeId ='$_REQUEST[id]'";
		$rsDel=executeQuery($sqlDel);
		$sess_msg=$sitemsgs[7];
		$_SESSION['sessionMsg']=$sess_msg;
    }
if(is_post_back()) {
	$arr_unit_ids = $_REQUEST['arr_unit_ids'];	
	if(is_array($arr_unit_ids)) {
		$arr_unit_ids = implode(',', $arr_unit_ids);		
		if($_REQUEST['Delete']!='') {
			$sqlDel="delete from imp_applyjob  where ResumeId  in ($arr_unit_ids)";
			$rsDel=executeQuery($sqlDel);
			
			$sess_msg=$sitemsgs[7];
			$_SESSION['sessionMsg']=$sess_msg;
			
		} else if($_REQUEST['Activate']!='') {
			$sql = "update imp_applyjob set Status  = 'Y' where ResumeId  in ($arr_unit_ids)";
			mysql_query($sql) or die(db_error($sql));
			
			$sess_msg=$sitemsgs[5];
			$_SESSION['sessionMsg']=$sess_msg;
			
		} else if($_REQUEST['Deactivate']!='') {
			$sql = "update imp_applyjob set Status  = 'N' where ResumeId  in ($arr_unit_ids)";
			mysql_query($sql) or die(db_error($sql));
			
			$sess_msg=$sitemsgs[6];
			$_SESSION['sessionMsg']=$sess_msg;
		}
	}
	?>
				<script language="javascript">
				   location.href="<?php echo $_SERVER['HTTP_REFERER'];?>";
				</script>
				<?php 
	             header("Location: ".$_SERVER['HTTP_REFERER']);
	             exit;
}

$start = intval($start);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$columns = "select * ";
$sql = " from imp_applyjob where 1 ";
$order_by == '' ? $order_by = 'Applydate' : true;
$order_by2 == '' ? $order_by2 = 'desc' : true;
$sql .= "order by $order_by $order_by2 ";
$sql_count = "select count(*) ".$sql; 
$sql .= "limit $start, $pagesize ";
$sql = $columns.$sql;
$result = mysql_query($sql) or die(db_error($sql));
$reccnt = db_scalar($sql_count);
?>
<link href="styles.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="../includes/general.js"></script>
<script language="javascript">
var newwindow;
function poptastic(url)
{
	newwindow=window.open(url,'name','height=250,width=400,top=300,left=400');
	if (window.focus) {newwindow.focus()}
}
</script>
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
    <td width="97%" align="left"><div id="pageHead"> Job Application List </div></td></tr></table>
</td></tr>
 
<tr><td height="200" bgcolor="#FFFFFF"><table width="100%">
  <tr><td><br> <?php echo display_session_msg();?></td></tr>

<tr><td height="250" valign="top"><br>
       <div align="right"> &nbsp;</div>
       <?php if(mysql_num_rows($result)==0){?>

    <div class="msg">Sorry, no records found.</div>
<?php } else{ ?>
  <div align="right">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <tr><td width="77%">&nbsp;</td>
	  <td width="23%" align="right">    <span class="fieldsname">Showing Records:</span> 
      <?php echo $start+1 ?>
      <span class="fieldsname"> to </span> 
      <?php echo ($reccnt<$start+$pagesize)?($reccnt-$start):($start+$pagesize)?>
      <span class="fieldsname"> of </span> <?php echo $reccnt ?></td>
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
	      <th width="8%" nowrap> SNo.<?php echo sort_arrows('ResumeId')?></th>
            <th width="17%" nowrap> Name <?php echo sort_arrows('Name')?></th>
			<th width="3%" nowrap> Contact Email <?php echo sort_arrows('EmailID')?></th>
			<th width="4%" nowrap>Apply For Job </th>
			<th width="7%" nowrap> Attachment </th>
            <th width="6%"></th>
            <th width="4%"><input name="check_all" type="checkbox" id="check_all" value="1" onClick="checkall(this.form)"></th>
	 </tr>
 <?php
while ($line_raw = mysql_fetch_array($result)) {
	$line = ms_display_value($line_raw);
	@extract($line);
	$css = ($css=='trOdd')?'trEven':'trOdd';
	if($Status=="N") { $css="disable_row"; }
	$jobidd=$line_raw[JobID]; 
    $sqljosfor="select * from imp_jobs where JobsId='$jobidd'";
        $resjobsfor=mysql_query($sqljosfor);
		$rowjobsfor=mysql_fetch_array($resjobsfor);
?>   <tr class="<?php echo $css?>">
      	      <td nowrap><?php echo $ResumeId  ?> </td>
			  
           
		    <td nowrap align="center"><b><?php echo $Name; ?></b></td>
			<td align="center" nowrap><?php  echo $EmailID ;  ?></td>
            <td align="center" nowrap><?php  echo $rowjobsfor[JobsTitle] ;  ?></td>
            <td align="center" nowrap><?php if($Resume!=''){?><a href="../uploaded_files/Resume/<?php echo $Resume;?>">View/Downlaod</a><?php } else { echo"N/A"; }?></td>
		   
<td align="center" nowrap><a href="javascript:poptastic('app.php?ResumeId=<?php echo $ResumeId;?>');"><img src="images/icon-edit.gif" border="0" alt="Edit" /></a>&nbsp;|&nbsp;<a href="jobapp_list.php?del=yes&id=<?php echo $ResumeId;?>"><img src="images/icon-delete.gif" border="0" alt="Delete" /></a> </td>
			
   <td width="4%" align="center" nowrap><input name="arr_unit_ids[]" type="checkbox" id="arr_unit_ids[]" value="<?php echo $ResumeId ?>"></td>    
 </tr><?php }
?>
    <tr align="right">
      <td colspan="11" bgcolor="#FFFFFF"><table width="100%">
        <tr>
          <td align="left"><table cellspacing="1" cellpadding="1" class="gray_txt" border="0">
              <tr>
                <td width="20px"  class="disable_row">&nbsp;</td>
                <td>&nbsp;<span class="fieldsname">Disabled Branch </span></td>
              </tr>
          </table></td>
          <td align="right">
	  <!--<input type="submit" name="Activate" value="Activate" class="button"/>
      | <input type="submit" name="Deactivate" value="Deactivate" class="button"/>-->
            <input name="Delete" type="submit" id="Delete" value="Delete" class="buttonDelete">        </td>
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
