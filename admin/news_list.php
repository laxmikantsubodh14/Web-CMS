<?php
require_once("../includes/midas.inc.php");
validate_admin();
if($_REQUEST['del']=='yes')
{
	$sqlDel="delete from  imp_news  where NewsId='$_REQUEST[id]'";
	$resultDel = $contact->Execute($sqlDel) or die($contact->ErrorMsg());
	$sess_msg=$sitemsgs[7];
	$_SESSION['sessionMsg']=$sess_msg;
}

if(is_post_back()) {
	$tt = $_REQUEST['tt'];	
	if(is_array($tt)) {
		$ttt = implode(',', $tt);		
		if($_REQUEST['Delete']!='') {
			$sqlDel="delete from  imp_news  where  NewsId  in ($ttt)";
	$resultDel = $contact->Execute($sqlDel) or die($contact->ErrorMsg());
			
			$sess_msg=$sitemsgs[7];
			$_SESSION['sessionMsg']=$sess_msg;
			
		} else if($_REQUEST['Activate']!='') {
			$sql = "update  imp_news     set Status= 'Y' where NewsId   in ($ttt)";
		$resultsql = $contact->Execute($sql) or die($contact->ErrorMsg());
			$sess_msg=$sitemsgs[5];
			$_SESSION['sessionMsg']=$sess_msg;
			
		} else if($_REQUEST['Deactivate']!='') {
			$sql = "update  imp_news  set Status= 'N' where NewsId  in ($ttt)";
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

if($_REQUEST['subcatname']!='')
{
  $SqlQuery1="select category_id from patels_categories where category_status='$_REQUEST[subcatname]'";
  $resultQuery1 = $contact->Execute($SqlQuery1) or die($contact->ErrorMsg());
     $Cc=0;
    while (!$resultQuery1->EOF)
	   {
	         $MainCategories[ $Cc]=$resultQuery1->fields['category_id'];
               $Cc++;
	        $resultQuery1->MoveNext();
		}
	$resultQuery1->Close(); #To close Record set 
  
}
if(count($MainCategories)>0)
$cat_str=implode(',',$MainCategories);

$start = intval($start);
$pagesize = intval($pagesize)==0?$pagesize=DEF_PAGE_SIZE:$pagesize;
$columns = "select * ";
$sql = " from   imp_news  where 1 ";
$sql= apply_filter($sql, $_REQUEST['subcatname'], "=",'category_id');
$sql= apply_filter($sql, $cat_str, "IN",'category_id');
$order_by == '' ? $order_by = 'NewsId' : true;
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

<script language="javascript">
function chng(str)
{ 
  
   	document.catform.action="<?=$PHP_SELF;?>?NewId=" + str;
	document.catform.submit();
   	
}
</script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}


	-->
</style>
<?php include("top.inc.php");?>
<div id="content">

<table width="100%" border="0" cellpadding="4" cellspacing="1">

<tr>
<?  $selActNws="select * from imp_rssdetail where View='Y' ";
	   $resActNws=mysql_query($selActNws);
	  ?>
  <td><a href="news_list.php" ><font color="#CC0000"> News  List</font></a>&nbsp;<a href="rssdetail_view.php" ><font color="#CC0000"> RSS Detail List</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  Active News :<?php  if(mysql_num_rows($resActNws)>0)
	    { echo "<b>Rss News</b>"; } else { echo "<b>Admin News</b>"; } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To Activate Other One: <a href="#" onclick="window.location='rssactive.php'; return false;"><font color="#CC0000"> (Click Here)</font></a></td>
</tr>
<tr>
<tr>
 <td>
<table width="100%" border="0" cellpadding="4" cellspacing="1" class="tblBackColor">
  <tr bgcolor="#FFFFFF"><td><table width="100%" border="0" cellpadding="0" cellspacing="0" style="BACKGROUND-IMAGE: url(images/tablebgrep.gif)">
    <tr><td width="3%" class="pageHead"><img height="17" alt="" 
                  src="images/orangebullet.gif" width="17" 
                vspace="3" /></td>
    <td width="97%" align="left"><div id="pageHead"> News View</div></td></tr></table>
</td></tr>
 
<tr><td height="200" bgcolor="#FFFFFF"><table width="100%">
  <tr><td><br> <?php echo display_session_msg();?></td></tr>

<tr><td height="250" valign="top"><br>
       <div align="right"> <a href="news_add.php">Add News Info</a></div>
       <?php if($Total_Records==0){?>

    <div class="msg">Sorry, no records found.</div>
<?php } else{ ?>
  <div align="right">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <tr><td width="77%" align="left">&nbsp;
	   
		</td>
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
	  <!--<form name="catform" method="get" action="">
<span class="fieldsname">News Filter By Categories</span>
		    
			   <?php 
			    // $tempcategory = $_REQUEST['subcatname'];
				  //include("../includes/categoryCombo1.php");
				?>
</form>	-->
</td></tr></table>		
</div>
	
<br />
  <form name="form1" method="post" action="">
  <table width="100%"  border="0" cellpadding="3" cellspacing="1" bgcolor="#d8d8d8" class="tableList" >
    <tr>
	      <th width="8%" nowrap> SNo. <?php echo sort_arrows('NewsId')?></th>
             <th width="17%" nowrap> News Heading <?php echo sort_arrows('heading')?></th>
	         <th width="17%" nowrap> Main Image </th>
			 <th width="7%" nowrap>Status <?php echo sort_arrows('Status')?></th>
			
            <th width="6%"></th>
            <th width="4%"><input name="check_all" type="checkbox" id="check_all" value="1" onClick="checkall(this.form)"></th>
	 </tr>
  <?php
while (!$result->EOF) {
	//$line = ms_display_value($line_raw);
	//@extract($line);
	$css = ($css=='trOdd')?'trEven':'trOdd';
	if($result->fields['Status']=="N"){ $css="disable_row"; }
?>   <tr class="<?php echo $css?>">
      	      <td nowrap><?php echo $result->fields['NewsId']?> </td>
			  
			  
       <td nowrap><b>
	   <?php
	   
	    $textHeading=$result->fields['heading']; 
		echo $text = wordwrap($textHeading, 40, "<br />\n");

	   
	   ?></b></td>
	   
	  
	   <td>
		
 <?php if($result->fields['photo']=="")
	{
		echo "Image is not Available";
	}
	else
	{?>
		
		<img src="../uploaded_files/new_photo/<?php echo($result->fields['photo']); ?>" alt="" name="existing_image" width="100"align="center">&nbsp;
		 <?php } ?>
				  </td>
	   
	   	   
	  <td align="center" nowrap><?php if($result->fields['Status']=='Y') echo "Active"; else echo"InActive"; ?></td>
           
		   
<td align="center" nowrap><a href="news_add.php?NewsId=<?php echo $result->fields['NewsId'];?>"><img src="images/icon-edit.gif" border="0" alt="Edit" /></a>&nbsp;|&nbsp;<a href="news_list.php?del=yes&id=<?php echo $result->fields['NewsId'];?>"><img src="images/icon-delete.gif" border="0" alt="Delete" /></a> </td>
			     
		  
   <td width="4%" align="center" nowrap><input name="tt[]" type="checkbox" id="tt[]" value="<?php echo 
    $result->fields['NewsId'] ?>"></td>    
 </tr><?php  $result->MoveNext();
							   }
							     $result->Close(); #To close Record set 
?>
    <tr align="right">
      <td colspan="10" bgcolor="#FFFFFF"><table width="100%">
        <tr>
          <td align="left"><table cellspacing="1" cellpadding="1" class="gray_txt" border="0">
              <tr>
                <td width="20px"  class="disable_row">&nbsp;</td>
                <td>&nbsp;<span class="fieldsname">Disabled News. </span></td>
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



