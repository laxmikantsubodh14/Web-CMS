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





$SqlUp="select * from imp_menu where MenuID ='$MenuID'";
$ResultUp=mysql_query($SqlUp);
$RowsUp=mysql_fetch_array($ResultUp);
$UpNo1=$RowsUp[Ordering];
 
// echo"===============".$UpNo;
 
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
 
//echo"<br>";  
   
//print_r($AllOrder);

//echo"<br>";
   
 $key = array_search($UpNo1, $AllOrder); 
 
$DownSortOrderNumberKey=$key-1;

//echo"<br>";


$DownNo1=$AllOrder[$DownSortOrderNumberKey];// this is no which is just upper to which no is up.....


 
 
$SqlDownNumID="select * from imp_menu where Ordering='$DownNo1'"; // Now we find id which go below......
$ResultDownNumID=mysql_query($SqlDownNumID);

$RowDownNoID=mysql_fetch_array($ResultDownNumID); 

$DownID=$RowDownNoID[MenuID];    // Up id 
$UpID=$MenuID;


  $UpOrder1="update imp_menu set Ordering='$DownNo1' where MenuID='$UpID'"; 
      $Result1=mysql_query($UpOrder1);
  
 $UpOrder2="update imp_menu set Ordering='$UpNo1' where MenuID='$DownID'";
      mysql_query($UpOrder2);


// Redirect  
?>
<SCRIPT LANGUAGE="JavaScript">
	location.href="reorder.php";
</SCRIPT>