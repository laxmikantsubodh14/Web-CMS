<?php
include"../includes/midas.inc.php";
$sql="select * from  imp_city where StatesID='$_REQUEST[value]' order by city";
$recordSet3=$contact->Execute($sql) or die($contact->ErrorMsg());
 ?>
<select name="city_id" class="list_menu">
<option value=""  selected="selected">Select City</option>
<?php 
while(!$recordSet3->EOF) 
{

?>
<option value="<?php echo $recordSet3->fields["city_id"];?>" <?php if($recordSet3->fields["city_id"]==$recordSet->fields['city_id']) echo"selected" ?>><?php echo $recordSet3->fields["city"];?></option>
<?php $recordSet3->MoveNext();
}
$recordSet3->Close();?>
</select>