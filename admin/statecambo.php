<?php 
include"../includes/midas.inc.php"; 
$sql="select * from  imp_states where country_id='$_REQUEST[value]'";
$recordSet3=$contact->Execute($sql) or die($contact->ErrorMsg());
?>
<select name="StatesID" class="list_menu" >
                     <option value=""  selected="selected"><< Select State >></option>
					 <?php 
					 while(!$recordSet3->EOF) 
					          {
		                          
                      ?>
                    <option value="<?php echo $recordSet3->fields["StatesID"];?>" <?php if($recordSet3->fields["StatesID"]==$recordSet->fields['StatesID']) echo"selected" ?>><?php echo $recordSet3->fields["StatesName"];?></option>
                    <?php $recordSet3->MoveNext();
					}
					$recordSet3->Close();?>
                    </select>