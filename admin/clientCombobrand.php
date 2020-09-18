<SELECT NAME="subClientName" onChange="populate(this.options[this.selectedIndex].value, document.AddForm);">
<option value="">Select Client</option>
<?
$query_categoryCombo="select * from imp_portfolio where SubClient = '0' ";
  echo mysql_query();
if(trim($id)>0)
	//$query_categoryCombo .= "and category_id != $id ";
$query_categoryCombo .= "order by ClientName";
echo $query_categoryCombo;
$result_categoryCombo=mysql_query($query_categoryCombo);
echo mysql_query();
while($row_categoryCombo=mysql_fetch_array($result_categoryCombo))
{
	echo "<option value='$row_categoryCombo[ClientId]' ";
	if($tempcategory == $row_categoryCombo['ClientId'])
		echo "selected";
	echo ">$row_categoryCombo[ClientName]</option>";
	//listSubcategories($row_categoryCombo[ClientId],1);
}

function listSubcategories($catID, $flag) 
{
	global $tempcategory, $id;
	$query_subCategoryCombo="select * from imp_portfolio  where SubClient='$catID' ";
	if(trim($id)>0)
		$query_subCategoryCombo .= "and ClientId != $id ";
	$query_subCategoryCombo .= "order by ClientName";

	$result_subCategoryCombo=mysql_query($query_subCategoryCombo);
	if(mysql_num_rows($result_subCategoryCombo)==0)
		return;
	while($row_subCategoryCombo=mysql_fetch_array($result_subCategoryCombo))
	{
		echo "<option value='$row_subCategoryCombo[ClientId]' ";
		if($tempcategory == $row_subCategoryCombo['ClientId'])
			echo "selected";
		echo ">";
		for($i=1;$i<=$flag;$i++)
		{
			/*
			if($i==$flag)
				echo "|___";
			else
			*/
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		echo "$row_subCategoryCombo[ClientName]</option>";
		listSubcategories($row_subCategoryCombo[ClientId], $flag+1);
	}
} 
?>
</SELECT>

