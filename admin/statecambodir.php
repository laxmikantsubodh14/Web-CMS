<?php
include"../includes/midas.inc.php";
$sql="select * from  imp_states where country_id='$_REQUEST[value]'  order by StatesName";
$recordSet3=$contact->Execute($sql) or die($contact->ErrorMsg());
 ?>
<select name="Stateid" class="list_menu" onChange="city(this.value)">
<option value=""  selected="selected">Select state</option>
<?php 
while(!$recordSet3->EOF) 
{

?>
<option value="<?php echo $recordSet3->fields["StatesID"];?>" <?php if($recordSet3->fields["StatesID"]==$recordSet->fields['Stateid']) echo"selected" ?>><?php echo $recordSet3->fields["StatesName"];?></option>
<?php $recordSet3->MoveNext();
}
$recordSet3->Close();?>
</select>