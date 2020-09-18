<?
function show_date_picker($jscal_input_name, $jscal_def_date='', $validation = 'date|mm/dd/yyyy', $validation_msg = 'Date should be in mm/dd/yyyy format')
{
	global $SITE_FS_PATH;
	if(!defined('JSCAL_INCLUDED')) {
		define('JSCAL_INCLUDED', true);
		ob_start();
		include(dirname(__FILE__).'date_pick_files.inc.php');
		$date_picker .= ob_get_contents();
		ob_end_clean();
	}
	ob_start();
	include(dirname(__FILE__).'date_pick.inc.php');
	$date_picker .= ob_get_contents();
	ob_end_clean();
	return $date_picker;
}
?>