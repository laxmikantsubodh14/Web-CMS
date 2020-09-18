<?php include"../includes/midas.inc.php";
	  $selActNws="select * from imp_rssdetail where View='Y' ";
	   $resActNws=mysql_query($selActNws);
	   if(mysql_num_rows($resActNws)>0)
	    {
	
	        $sqlnews = "update imp_rssdetail set View='N' ";
			$resultsqlnews = $contact->Execute($sqlnews);
			
			
			$sqlnewsM = "update imp_news set View='Y' ";
			$resultsqlMa = $contact->Execute($sqlnewsM);
		 }	
		else
		 {
		    $sqlnews = "update imp_rssdetail set View='Y' ";
			$resultsqlnews = $contact->Execute($sqlnews);
			
			
			$sqlnewsM = "update imp_news set View='N' ";
			$resultsqlMa = $contact->Execute($sqlnewsM);
			
			
		 } 
			if(mysql_num_rows($resActNws)>0)
			{
			 ?>
			 	<script language="javascript">
				location.href="news_list.php";
				</script><? }
				else { ?>
				<script language="javascript">
				location.href="rssdetail_view.php";
				</script>
				<? } ?>