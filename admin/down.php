<?
require_once("../includes/midas.inc.php");
validate_admin();
if (!empty($HTTP_GET_VARS))
{
	reset($HTTP_GET_VARS);
	while (list($k,$v) = each($HTTP_GET_VARS)) 
	{
		${$k} = $v;
	}
}
if (!empty($HTTP_POST_VARS))
{
	reset($HTTP_POST_VARS);
	while (list($k,$v) = each($HTTP_POST_VARS)) 
	{
		${$k} = $v;
	}
}
if (!empty($HTTP_SESSION_VARS)) 
{
	reset($HTTP_SESSION_VARS);
	while (list($k,$v) = each($HTTP_SESSION_VARS)) 
	{
		${$k} = $v;
	}
}
if (!empty($HTTP_GET_FILES))
{
	reset($HTTP_GET_FILES);
	while (list($k,$v) = each($HTTP_GET_FILES)) 
	{
		${$k} = $v;
	}
}
if (!empty($HTTP_POST_FILES))
{
	reset($HTTP_POST_FILES);
	while (list($k,$v) = each($HTTP_POST_FILES)) 
	{
		${$k} = $v;
	}
}





$SqlDown="select * from imp_menu where MenuID ='$MenuID'";
$ResultDown=mysql_query($SqlDown);
$RowsDown=mysql_fetch_array($ResultDown);
$DownNo=$RowsDown[Ordering];
 
 #
 # Find all number
 #

$SqlAllOrder="select * from imp_menu order by Ordering";
$ResultAllOrder=mysql_query($SqlAllOrder);

    $i=0;
  while($RowsAllOrder=mysql_fetch_array($ResultAllOrder))
     {
	   if($RowsAllOrder[Ordering]!=0)
	     { 
		 $AllOrder[$i]=$RowsAllOrder[Ordering]; 
		  $i++; 
		 }
	  
	 
	 }
   
//print_r($AllOrder);
   
$key = array_search($DownNo, $AllOrder);  


$UpSortOrderNumberKey=$key+1;
$UpNo=$AllOrder[$UpSortOrderNumberKey];
$SqlUpNumID="select * from imp_menu where Ordering='$UpNo'";
$ResultUpNumID=mysql_query($SqlUpNumID);
$RowUpNoID=mysql_fetch_array($ResultUpNumID); 

$UpID=$RowUpNoID[MenuID];
$DownID=$MenuID;

   $UpdateUpOrder="update imp_menu set Ordering='$DownNo' where MenuID='$UpID'";
       mysql_query($UpdateUpOrder);
  $UpdateUpOrder="update imp_menu set Ordering='$UpNo' where MenuID='$DownID'";
     mysql_query($UpdateUpOrder);

// Redirect  
?>
<SCRIPT LANGUAGE="JavaScript">
	location.href="reorder.php";
</SCRIPT>