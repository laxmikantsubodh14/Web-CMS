<?
// require variables named: $jscal_input_name, $jscal_def_date, $jscal_trig_id
?>
<input class="readonly" type="text" name="<?=$jscal_input_name?>" id="<?=$jscal_input_name?>" size="10" value="<?=$jscal_def_date?>" <? if($validation!=''){?> alt="<?=$validation?>" emsg="<?=$validation_msg?>" <? }?>/> 
<img src="jscal/img.gif" id="<?=$jscal_input_name?>_trigger" style="cursor: pointer; border: 1px solid red;" title="Date selector"
      onmouseover="this.style.background='red';" onmouseout="this.style.background=''" /> 
<script type="text/javascript">
    Calendar.setup({
        inputField     :    "<?=$jscal_input_name?>",     // id of the input field
        ifFormat       :    "%m/%d/%Y",      // format of the input field
        button         :    "<?=$jscal_input_name?>_trigger",  // trigger for the calendar (button ID)
        align          :    "B2",           // alignment (defaults to "Bl")
        singleClick    :    true
    });
</script> (mm/dd/yyyy)