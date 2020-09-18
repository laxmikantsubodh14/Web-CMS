<?php
//require("includes/Rss.php");
require_once('includes/Rss.minified.php'); // include library
$Rss = new Rss; // create object
$SqlNewsRss="select * from  imp_rssdetail where  View='Y' and Status='Y'";
$ResultNewsRss=mysql_query($SqlNewsRss) or die(mysql_error());
$RowsNewRss=mysql_fetch_array($ResultNewsRss); 
//echo mysql_num_rows($ResultNewsRss);
try {
	$feed1 = $Rss->getFeed("$RowsNewRss[URL]", Rss::XML);
//	echo '<pre>';
	
	//print_r($feed);
	 
	/*foreach($feed as $item)	{
		echo "<b>Title:</b> <a href=\"$item[link]\">$item[title]</a>\n";
		echo "<b>Published:</b> $item[date]\n";
		echo "<b>Category:</b> $item[category]\n";
		echo "\n$item[description]\n";
		
	}*/
	//echo "<hr/>";
//	echo "<hr/>";
	//echo '</pre>';
}
catch (Exception $e) {
	echo $e->getMessage();
}
//end if
