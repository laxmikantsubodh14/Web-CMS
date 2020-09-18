<?php
require_once("../includes/midas.inc.php");
validate_admin();
if($_REQUEST['del']=='yes')
{
            $sqlDel="delete from imp_rssdetail  where RssdetId='$_REQUEST[id]'";
			$resultDel = $contact->Execute($sqlDel) or die($contact->ErrorMsg());
			
			$sess_msg=$sitemsgs[7];
			$_SESSION['sessionMsg']=$sess_msg;
}
if(is_post_back()) {
	$bb = $_REQUEST['bb'];	
	if(is_array($bb)) {
		$bbb = implode(',', $bb);		
		if($_REQUEST['Delete']!='') {
			$sqlDel="delete from  imp_rssdetail  where  RssdetId in ($bbb)";
			$resultDel = $contact->Execute($sqlDel) or die($contact->ErrorMsg());
			$sess_msg=$sitemsgs[7];
			$_SESSION['sessionMsg']=$sess_msg;
			
		} else if($_REQUEST['Activate']!='') {
			$sql = "update  imp_rssdetail   set Status= 'Y' where RssdetId  in ($bbb)";
			$resultsql = $contact->Execute($sql) or die($contact->ErrorMsg());
			
			$sess_msg=$sitemsgs[5];
			$_SESSION['sessionMsg']=$sess_msg;
			
		} else if($_REQUEST['Deactivate']!='') {
			$sql = "update imp_rssdetail  set Status= 'N' where RssdetId in ($bbb)";
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


 /*?>function listSubcategories($catID, $flag) 
{
	
	$query_subCategoryCombo="select * from imp_menu  where ParentID='$catID' ";
	$query_subCategoryCombo .= "order by MenuName";

	$result_subCategoryCombo=mysql_query($query_subCategoryCombo);
	if(mysql_num_rows($result_subCategoryCombo)==0)
		return;
	while($row_subCategoryCombo=mysql_fetch_array($result_subCategoryCombo))
	{
		echo "<option value='$row_subCategoryCombo[MenuID]' ";
		if($_GET['ParentPage'] == $row_subCategoryCombo['MenuID'])
			echo "selected";
		echo ">";
		for($i=1;$i<=$flag;$i++)
		{
			
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		
		echo "$row_subCategoryCombo[MenuName]";
	
	
	
	echo"</option>";
		
		listSubcategories($row_subCategoryCombo[MenuID], $flag+1);
	}
}<?php */




$start = intval($start);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$columns = "select * ";
$sql = " from  imp_rssdetail  where 1 ";
//$sql= apply_filter($sql, $_REQUEST['ParentPage'], "=",'faqcat_id');
$order_by == '' ? $order_by = 'RssdetId' : true;
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
<script language="javascript">
function chng(str)
{ 
  	document.catform.action="<?=$PHP_SELF;?>";
	document.catform.submit();
   	
}
</script>



<!--<script language="javascript">
function activeMnews()
{ 
alert("news");
  	<?php /*$sqlnews1 = "update  imp_rssdetail set View='N' where RssdetId!='' ";
			$resultsqlnews1 = $contact->Execute($sqlnews1) or die($contact->ErrorMsg());
			
			
			$sqlnewsM1 = "update  imp_news set View='Y' where NewsId!='' ";
			$resultsqlMa1 = $contact->Execute($sqlnewsM1) or die($contact->ErrorMsg());*/
			 ?>
   	
}
</script>-->
<?php include("top.inc.php");?>
<title>Untitled Document</title><div id="content">


<table width="100%" border="0" cellpadding="4" cellspacing="1">

<!--<tr>
	<td><table width="80%" height="25" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="2%" nowrap="nowrap">
			<a  href="faqcat_view.php">FAQ Category  </a>&nbsp;&nbsp;|&nbsp;&nbsp;<a  href="faq_view.php">FAQ </a>
			</td>
			
			
		</tr>
		
		</table></td>
</tr> -->
<tr>
<?  $selActNws="select * from imp_rssdetail where View='Y' ";
	   $resActNws=mysql_query($selActNws);
	  ?>
  <td><a href="news_list.php" onclick="window.location='rssactive.php'; return false;"><font color="#CC0000"> News  List</font></a>&nbsp;<a href="rssdetail_view.php" onclick="window.location='rssactive.php'; return false;"><font color="#CC0000"> RSS Detail List</font></a>&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;Active News :<?php  if(mysql_num_rows($resActNws)>0)
	    { echo "<b>Rss News</b>"; } else { echo "<b>Admin News</b>"; } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To Activate Other One: <a href="#" onclick="window.location='rssactive.php'; return false;"><font color="#CC0000"> (Click Here)</font></a></td>
</tr>
<tr>
 <td>
<table width="100%" border="0" cellpadding="4" cellspacing="1" class="tblBackColor">

  <tr bgcolor="#FFFFFF"><td><table width="100%" border="0" cellpadding="0" cellspacing="0" style="BACKGROUND-IMAGE: url(images/tablebgrep.gif)">
    <tr><td width="3%" class="pageHead"><img height="17" alt="" 
                  src="images/orangebullet.gif" width="17" 
                vspace="3" /></td>
    <td width="97%" align="left"><div id="pageHead">RSS Detail View</div></td></tr></table>
</td></tr>
 
<tr><td height="200" bgcolor="#FFFFFF"><table width="100%">
  <tr><td><br> <?php echo display_session_msg();?></td></tr>
<tr><td align="center">
	 

		    
<?php /*?> <form name="catform" method="get" action=""><span class="fieldsname">Filter By Page Name</span><SELECT NAME="ParentPage" onchange="chng();">
<option value="">Main Menu</option>
<?php
$query_categoryCombo="select * from imp_menu where ParentID = '0' ";
$query_categoryCombo .= "order by MenuName";
 $query_categoryCombo;
$result_categoryCombo=mysql_query($query_categoryCombo);

while($row_categoryCombo=mysql_fetch_array($result_categoryCombo))
{   

  
	echo "<option value='$row_categoryCombo[MenuID]' ";
	if($_GET['ParentPage'] == $row_categoryCombo['MenuID'])
		echo "selected";
	echo ">$row_categoryCombo[MenuName]";
	
	
	
	echo"</option>";
	listSubcategories($row_categoryCombo[MenuID],1);
}


?>
</SELECT></form>	<?php */?>
		

</td></tr>
<tr><td height="250" valign="top"><br>
       <div align="right"> <a href="rssdetail_add.php">Add Rssdetail </a></div>
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

  <div>
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <tr><td >&nbsp;

  
  <span class="fieldsname">Records Per Page</span>:
    <?php echo pagesize_dropdown('pagesize', $pagesize);?> &nbsp; &nbsp;&nbsp;
	</td></tr></table>		
</div>
	
<br />
 
  <form name="form1" method="post" action="">
  <table width="100%"  border="0" cellpadding="3" cellspacing="1" bgcolor="#d8d8d8" class="tableList" >
    <tr>
	      <th width="22%" nowrap> SNo. <?php echo sort_arrows('RssdetId')?></th>
             <th width="37%" nowrap>URL<?php echo sort_arrows('URL')?></th>
			 <th width="26%" nowrap>Status <?php echo sort_arrows('Status')?></th>
			
            <th width="11%"></th>
            <th width="4%"><input name="check_all" type="checkbox" id="check_all" value="1" onClick="checkall(this.form)"></th>
	 </tr>
  
  <?php
while (!$result->EOF) 
{
	//$line = ms_display_value($line_raw);
	//@extract($line);
	$css = ($css=='trOdd')?'trEven':'trOdd';
	if($result->fields['Status']=="N") { $css="disable_row"; }
?>   <tr class="<?php echo $css?>">
      	      <td nowrap><?php echo $result->fields['RssdetId']?> </td>
		<td align="left" valign="top" nowrap>
		   <?php 
		     echo $result->fields['URL']?>
		        
			 		</td>

   <td align="center" nowrap><?php if($result->fields['Status'] =='Y') echo "Active"; else echo "InActive"; ?></td>
           
		   
<td align="center" nowrap><a href="rssdetail_add.php?RssdetId=<?php echo $result->fields['RssdetId'];?>"><img src="images/icon-edit.gif" border="0" alt="Edit" /></a>&nbsp;|&nbsp;<a href="rssdetail_view.php?del=yes&id=<?php echo $result->fields['RssdetId'];?>"><img src="images/icon-delete.gif" border="0" alt="Delete" /></a> </td>
			     
		  
   <td width="4%" align="center" nowrap><input name="bb[]" type="checkbox" id="bb[]" value="<?php echo $result->fields['RssdetId'];?>"></td>    
 </tr><?php $result->MoveNext();
							 }
	$result->Close(); #To close Record set 

?>
    <tr align="right">
      <td colspan="9" bgcolor="#FFFFFF"><table width="100%">
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