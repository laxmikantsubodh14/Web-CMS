<?php
// connect_db: Updated 31 may 2006
function connect_db()
{
	global $ARR_CFGS;
	if (!isset($GLOBALS['dbcon'])) {
		$GLOBALS['dbcon'] =	mysql_connect($ARR_CFGS["db_host"], $ARR_CFGS["db_user"], $ARR_CFGS["db_pass"]);
		mysql_select_db($ARR_CFGS["db_name"]) or die("Could not connect to database");
	}
}


if(!function_exists("executeQuery"))
{
	function executeQuery($sql)
	{
		$result = mysql_query($sql) or die("<span style='FONT-SIZE:11px; FONT-COLOR: #000000; font-family=tahoma;'><center>An Internal Error has Occured. Please report following error to the webmaster.<br><br>".$sql."<br><br>".mysql_error()."'</center></FONT>");
		return $result;
	} 
}
// db_scalar: Updated 31 may 2006
function db_scalar($sql, $dbcon2 = null)
{
	if($dbcon2 ==''){
		global $contact;
	}
	//$result	= mysql_query($sql,	$dbcon2) or	die(db_error($sql));
	    $result = $contact->Execute($sql) or die($contact->ErrorMsg());
		$TotalRecords =$result->RecordCount();  $result->fields[0];
	
	if ($TotalRecords != '0')
	       $response =	$result->fields[0];
	     else
		      $response=0;
	return $response;
}

// db_error: Updated 31 may 2006
function db_error($sql)
{
	return "<span style='FONT-SIZE:11px; FONT-COLOR: #000000; font-family=tahoma;'><center>An	Internal Error has Occured.	Please report following	error to the webmaster.<br><br>"	. $sql . "<br><br>"	. mysql_errno()	. ': ' . mysql_error() . "</center></FONT>";
}

// mysql_time: Updated 31 may 2006
function mysql_time($hour, $minute,	$ampm)
{
	if ($ampm == 'PM' && $hour != '12')	{
		$hour += 12;
	}
	if ($ampm == 'AM' && $hour == '12')	{
		$hour =	'00';
	}
	$mysql_time	= $hour	. ':' .	$minute	. ':00';
	return $mysql_time;
}

// price_format: Updated 31 may 2006
function price_format($price)
{
	if ($price != '' &&	$price != '0') {
		$price = number_format($price, 2);
		return '$'.$price;
	}
}

// date_format1: Updated 31 may 2006
function date_format1($date)
{
	if (strlen($date) >= 10) {
		if ($date == '0000-00-00 00:00:00' || $date	== '0000-00-00') {
			return '';
		}
		$mktime	= mktime(0,	0, 0, substr($date,	5, 2), substr($date, 8,	2),	substr($date, 0, 4));
		return date("M j, Y", $mktime);
	} else {
		return $s;
	}
}

// datetime_format: Updated 31 may 2006
function datetime_format($date)
{
	global $arr_month_short;
	if (strlen($date) >= 10) {
		if ($date == '0000-00-00 00:00:00' || $date	== '0000-00-00') {
			return '';
		}
		$mktime	= mktime(substr($date, 11, 2), substr($date, 14, 2), substr($date, 17, 2),substr($date,	5, 2), substr($date, 8,	2),	substr($date, 0, 4));
		return date("h:i A M j, Y", $mktime);
	} else {
		return $s;
	}
}

// time_format: Updated 31 may 2006
function time_format($time)
{
	if (strlen($time) >= 5)	{
		$hour =	substr($time, 0, 2);
		$hour =	str_pad($hour, 2, "0", STR_PAD_LEFT);

		return $hour . ':' . substr($time, 3, 2) . ' ' . $ampm;
	} else {
		return $s;
	}
}

// ms_print_r: Updated 31 may 2006
function ms_print_r($var)
{
	//if(LOCAL_MODE || $_SESSION['debug']){
		echo "<textarea rows='10' cols='148' style='font-size: 11px; font-family: tahoma'>";
		print_r($var);
		echo "</textarea>";
	//}
}

// ms_form_value: Updated 31 may 2006
function ms_form_value($var)
{
	return is_array($var) ? array_map('ms_form_value', $var) : htmlspecialchars(stripslashes(trim($var)));
}

// ms_display_value: Updated 31 may 2006
function ms_display_value($var)
{
	return is_array($var) ? array_map('ms_display_value', $var) : nl2br(htmlspecialchars(stripslashes(trim($var))));
}

// ms_stripslashes: Updated 31 may 2006
function ms_stripslashes($var)
{
	return is_array($var) ? array_map('ms_stripslashes', $var) : stripslashes(trim($var));
}

// ms_addslashes: Updated 31 may 2006
function ms_addslashes($var)
{
	return is_array($var) ? array_map('ms_addslashes', $var) : addslashes(trim($var));
}

// ms_trim: Updated 31 may 2006
function ms_trim($var)
{
	return is_array($var) ? array_map('ms_trim', $var) : trim($var);
}

// is_image_valid: Updated 31 may 2006
function is_image_valid($file_name)
{
	global $ARR_VALID_IMG_EXTS;
	$ext = file_ext($file_name);
	if (in_array($ext, $ARR_VALID_IMG_EXTS))	{
		return true;
	} else {
		return false;
	}
}

// getmicrotime: Updated 31 may 2006
function getmicrotime()
{
	list($usec,	$sec) =	explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}

// file_ext: Updated 31 may 2006
function file_ext($file_name)
{
	$path_parts = pathinfo($file_name);
	$ext = strtolower($path_parts["extension"]);
	return $ext;
}

// blank_filter: Updated 31 may 2006
function blank_filter($var)
{
	$var = trim($var);
	return ($var != '' && $var != '&nbsp;');
}

// apply_filter: Updated 31 may 2006
function apply_filter($sql,	$field,	$field_filter, $column)
{
	if (!empty($field))	{
		if ($field_filter == "=" || $field_filter == "") {
			$sql = $sql	. "	and	$column	= '$field' ";
		} else if ($field_filter == "like")	{
			$sql = $sql	. "	and	$column	like '%$field%'	";
		} else if ($field_filter ==	"starts_with") {
			$sql = $sql	. "	and	$column	like '$field%' ";
		} else if ($field_filter ==	"ends_with") {
			$sql = $sql	. "	and	$column	like '%$field' ";
		} else if ($field_filter ==	"not_contains")	{
			$sql = $sql	. "	and	$column	not	like '%$field%'	";
		} else if ($field_filter ==	"!=") {
			$sql = $sql	. "	and	$column	!= '$field'	";
		} else if ($field_filter ==	"IN") {
			$sql = $sql	. "	or $column	IN ($field)	";
		}
	}
	return $sql;
}

// filter_dropdown: Updated 31 may 2006
function filter_dropdown($name	= 'filter',	$sel_value)
{
	$arr = array( "like" => 'Contains', '=' => 'Is', "starts_with" => 'Starts with', "ends_with"	=> 'Ends with', "!=" => 'Is not' , "not_contain" => 'Not contains');
	return array_dropdown($arr, $sel_value, $name);
}

// move_up: Updated 31 may 2006
function move_up($table_name, $where_clause_all, $where_clause_item, $sort_order, $move_by)
{
	$dest_order	= $sort_order -	$move_by;
	// $arr_ids_to_move=Array();
	// echo	"<br>$movie_artist_id, $movie_id, $artistcate_id, $sort_order, $move_by, $dest_order<br>";
	for($i = $sort_order-1;	$i > $dest_order-1;	$i--) {
		$sql = " update	$table_name	set	sort_order=sort_order+1	where $where_clause_all	and	sort_order='$i'";
		// echo	"<br>$sql<br>";
		mysql_query($sql) or die(db_error($sql));
	}
	$sql = " update	$table_name	set	sort_order=sort_order-$move_by where $where_clause_item";
	// echo	"<br>$sql<br>";
	mysql_query($sql) or die(db_error($sql));
}

// move_down: Updated 31 may 2006
function move_down($table_name,	$where_clause_all, $where_clause_item, $sort_order,	$move_by)
{
	$dest_order	= $sort_order +	$move_by;
	// $arr_ids_to_move=Array();
	// echo	"<br>$movie_artist_id, $movie_id, $artistcate_id, $sort_order, $move_by, $dest_order<br>";
	for($i = $sort_order + 1; $i < $dest_order + 1;	$i++) {
		$sql = " update	$table_name	set	sort_order=sort_order-1	where $where_clause_all	and	sort_order='$i'	";
		// echo	"<br>$sql<br>";
		mysql_query($sql) or die(db_error($sql));
	}
	$sql = " update	$table_name	set	sort_order=sort_order+$move_by where $where_clause_item";
	// echo	"<br>$sql<br>";
	mysql_query($sql) or die(db_error($sql));
}

// refine_list: Updated 31 may 2006
function refine_list($id_column, $table_name, $where_clause)
{
	$sql = " select	$id_column,	sort_order from	$table_name	where $where_clause	order by sort_order";
	// echo	"<br>$sql<br>";
	$result	= mysql_query($sql) or die(db_error($sql));
	$i = 1;
	while ($line = mysql_fetch_array($result)) {
		$sql = " update	$table_name	set	sort_order='$i'	where $id_column='$line[0]'";
		// echo	"<br>$sql<br>";
		mysql_query($sql) or die(db_error($sql));
		$i++;
	}
}

// make_url: Updated 31 may 2006
function make_url($url)
{
	$parsed_url	= parse_url($url);
	if ($parsed_url['scheme'] == '') {
		return 'http://' . $url;
	} else {
		return $url;
	}
}

// ms_mail: Updated 31 may 2006
function ms_mail($to, $subject, $message, $arr_headers= array())
{
	$str_headers = '';
	foreach($arr_headers as $name=>$value){
		$str_headers .= "$name: $value\n";
	}
	@mail($to, $subject, $message, $str_headers);
	return true;
}

// make_thumb_im: Updated 31 may 2006
function make_thumb_im($file_path, $arr_options)
{
	$width		= $arr_options['width'];
	$height		= $arr_options['height'];
	$prefix		= $arr_options['prefix'];
	$target_dir	= $arr_options['target_dir'];
	$quality	= $arr_options['quality'];
	
	$path_parts = pathinfo($file_path);

	if($width==''){
		$width = '120';
	}
	
	if($prefix=='') {
		$prefix = 'thumb_';
	}
	if($target_dir=='') {
		$target_dir = $path_parts["dirname"];
	}

	if($quality=='') {
		$quality = '70';
	}
	
	$size = @getimagesize($file_path);
	if($size=='') {
		return false;
	}
	
	/*
	$ratio = round($width/$height, 2);
	$img_width = $size[0];
	$img_height = $size[1];
	*/

	$path_parts = pathinfo($file_path);
		
	$thumb_path="$target_dir/".$prefix.$path_parts["basename"];

	$cmd ="convert -resize ".$width.'x'." -quality $quality \"$file_path\" \"$thumb_path\" ";
	system($cmd);
	//echo("<br>$cmd");
	return $prefix.$path_parts["basename"];
}

// date_to_mysql: Updated 31 may 2006
function date_to_mysql($date)
{
	list($month, $day, $year) = explode('/', $date);
	return "$year-$month-$day";
}

// export_delimited_file: Updated 31 may 2006
function export_delimited_file($sql, $arr_columns, $file_name='', $arr_substitutes='', $arr_tpls='' ){
	//session_cache_limiter('public');
	//header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
	//header("Content-Type: application/force-download");
	if($file_name=='') {
		$file_name = time().'.txt';
	}
	header("Content-type: application/txt");
	header("Content-Disposition: attachment; filename=$file_name");
	$arr_db_cols= array_keys($arr_columns);
	$arr_headers= array_values($arr_columns);
	//ms_print_r($arr_columns);
	//ms_print_r($arr_db_cols);
	//ms_print_r($arr_headers);
	//ms_print_r($arr_headers);
	//ms_print_r($arr_headers);
	$str_columns = implode(',', $arr_db_cols);
	$sql= "select ".$str_columns." $sql" ;
	
	$result= mysql_query($sql) or die(db_error($sql));
	$num_cols = count($arr_columns);
	//$i=0;

	foreach($arr_headers as $header){
		//$i++;
		echo $header."\t";
		//if($i!=$num_cols){
		//	echo "\t";
		//}
	}
	while($line=mysql_fetch_array($result, MYSQL_ASSOC))
	{
		echo "\r\n";
		//echo("<br> ");
		foreach($line as $key => $value){
			$value=str_replace("\n","",$value);
			$value=str_replace("\r","",$value);
			$value=str_replace("\t","",$value);
			if(is_array($arr_substitutes[$key])){
				$value = $arr_substitutes[$key][$value];
			}
			if(isset($arr_tpls[$key])){
				$code = str_replace('{1}', $value, $arr_tpls[$key]);
				//echo ("\$value = $code;");
				//echo("<br>");
				eval ("\$value = $code;");
			}
			echo $value."\t";
		}
	}
}

// checkpoint: Updated 31 may 2006
// to check how much time is lapsed before first call of this function
function checkpoint($from_start = false)
{
	global $TMP_CHECKPOINT;
	if($TMP_CHECKPOINT==''){
		$TMP_CHECKPOINT = SCRIPT_START_TIME;
	}
	if($from_start) {
		$TMP_CHECKPOINT = getmicrotime()- SCRIPT_START_TIME;
		return getmicrotime()-SCRIPT_START_TIME;
	} else {
		$TMP_CHECKPOINT = getmicrotime()-SCRIPT_START_TIME;
		return $TMP_CHECKPOINT;
	}
}

// readable_col_name: Updated 31 may 2006
function readable_col_name($str) 
{
	return ucwords( str_replace('_', ' ', strtolower($str) ) );
}

// ms_echo: Updated 31 may 2006
function ms_echo($str) {
	if(LOCAL_MODE){
		echo($str);
	}
}

// make_dropdown: Updated 31 may 2006
function make_dropdown($sql, $combo_name, $sel_value =	'',	$extra = '', $choose_one = '')
{
	$result	= mysql_query($sql) or die(db_error($sql));
	if (mysql_num_rows($result)	> 0) {
		$str_dropdown = "<select name='$combo_name' id='$combo_name' $extra>";

		if ($choose_one	!= '') {
			// if($css== "opt1"){ $css='opt2';}else{$css='opt1';};
			$str_dropdown .= "<option value=''>$choose_one</option>";
		}
		while	($line = mysql_fetch_array($result)) {
			// if($css== "opt1"){ $css='opt2';}else{$css='opt1';};
			$str_dropdown .= "<option value=\"" . ms_form_value($line[0]) . "\"";
			if ($sel_value == $line[0])	{
				$str_dropdown .= "	selected ";
			}
			$str_dropdown .= ">" .	$line[1] . "</option>";
		}
		$str_dropdown .= "</select>";
	}
	return $str_dropdown;
}

// array_dropdown: Updated 31 may 2006
function array_dropdown( $arr, $sel_value='', $name='', $extra='', $choose_one='', $arr_skip= array())
{
	$combo="<select name='$name' id='$name' $extra >";
	if($choose_one!=''){
		$combo.="<option value=\"\">$choose_one</option>";
	}
	foreach($arr as $key => $value)
	{
		if(is_array($arr_skip) && in_array($key, $arr_skip)) {
			continue;
		}
		$combo.='<option value="'.htmlspecialchars($key).'"';
		if(is_array($sel_value)) {
			if(in_array($key, $sel_value) || in_array(htmlspecialchars($key), $sel_value)) {
				$combo.=" selected ";
			}
		} else {
			if($sel_value==$key || $sel_value==htmlspecialchars($key)) {
				$combo.=" selected ";
			}
		}
		$combo.=" >$value</option>";
	}
	$combo.=" </select>";
	return $combo;
}

// make_checkboxes: Updated 31 may 2006
function make_checkboxes($manutmp, $checkname, $checksel = '', $cols,	$missit, $style	= '', $tableattr = '')
{
	if ($style != "") {
		$style = "class='" . $style	. "'";
	}

	$colwidth =	100	/ $cols;
	$colwidth =	round($colwidth, 2);
	$j = 1;
	/*
	$manutmp['Any']="Any";
	if($checksel==''){
		$checksel=Array("Any");
	}
	*/
	foreach($manutmp as	$key =>	$value)	{
		$tochecked = "";
		if (is_array($checksel)	&& in_array($key, $checksel)) {
			$tochecked = "checked";
		}
		if ($key !=	$missit) {
			if ($value != "") {
				if ($j == 1) {
					$checkstr .= "<table $tableattr><tr>\n";
				} else if (($j % $cols)	== 1) {
					$checkstr .= "</tr><tr>\n";
				}
				$checkstr .= "<td width='" . $colwidth . "%' $style	valign=top><INPUT TYPE='checkbox' $javascript	 NAME='$checkname" . '[]' .	"' value='$key'	$tochecked	   > $value	</td>\n";
				$j++;
			}
		}
	}
	$j--;
	// echo	"$cols-($j%$cols)=".$cols-($j%$cols);
	// echo	"<BR>($j%$cols)=".($j%$cols);
	for($x = $j	% $cols;$x < 4;$x++) {
		if ($x != 3) {
			$checkstr .= "<td>&nbsp;</td>\n";
		} else {
			$checkstr .= "<td>&nbsp;</td></tr>\n";
		}
	}
	$checkstr .= "</table>";
	return $checkstr;
}

// make_radios: Updated 31 may 2006
function make_radios($manutmp, $checkname, $checksel = '', $cols,	$missit, $style	= '', $tableattr = '')
{
	if ($style != "") {
		$style = "class='" . $style	. "'";
	}

	$colwidth =	100	/ $cols;
	$colwidth =	round($colwidth, 2);
	$j = 1;
	/*
	$manutmp['Any']="Any";
	if($checksel==''){
		$checksel=Array("Any");
	}
	*/
	foreach($manutmp as	$key =>	$value)	{
		$tochecked = "";
		if ($checksel == $key) {
			$tochecked = "checked";
		}
		if ($key !=	$missit) {
			if ($value != "") {
				if ($j == 1) {
					$checkstr .= "<table $tableattr><tr>\n";
				} else if (($j % $cols)	== 1) {
					$checkstr .= "</tr><tr>\n";
				}
				$checkstr .= "<td width='" . $colwidth . "%' $style	valign=top><INPUT TYPE='radio' $javascript	 NAME='$checkname' value='$key'	$tochecked	   > $value	</td>\n";
				$j++;
			}
		}
	}
	$j--;
	// echo	"$cols-($j%$cols)=".$cols-($j%$cols);
	// echo	"<BR>($j%$cols)=".($j%$cols);
	for($x = $j	% $cols;$x < 4;$x++) {
		if ($x != 3) {
			$checkstr .= "<td>&nbsp;</td>\n";
		} else {
			$checkstr .= "<td>&nbsp;</td></tr>\n";
		}
	}
	$checkstr .= "</table>";
	return $checkstr;
}

// date_dropdown: Updated 31 may 2006
function date_dropdown($pre, $selected_date = '', $start_year='', $end_year = '', $sort = 'asc')
{
	$cur_date =	date("Y-m-d");
	$cur_date_day =	substr($cur_date, 8, 2);
	$cur_date_month	= substr($cur_date,	5, 2);
	$cur_date_year = substr($cur_date, 0, 4);

	if ($selected_date != '') {
		$selected_date_day = substr($selected_date,	8, 2);
		$selected_date_month = substr($selected_date, 5, 2);
		$selected_date_year	= substr($selected_date, 0,	4);
	}
	$date_dropdown	.= month_dropdown($pre	. "month", $selected_date_month);
	$date_dropdown	.= day_dropdown($pre .	"day", $selected_date_day);
	// echo($pre . "year: ". $selected_date_year);
	$date_dropdown	.= year_dropdown($pre . "year", $selected_date_year, $start_year,	$end_year,	$sort);
	return $date_dropdown;
}

// month_dropdown: Updated 31 may 2006
function month_dropdown($name,	$selected_date_month = '', $extra='')
{
	global $ARR_MONTHS;

	$date_dropdown	= "	<select	name='$name' $extra> <option value='0'>Month</option>";
	$i = 0;
	foreach ($ARR_MONTHS as $key => $value) {
		$date_dropdown	.= " <option ";
		if ($key == $selected_date_month)	{
			$date_dropdown	.= " selected ";
		}
		$date_dropdown	.= " value='" .	str_pad($key, 2, "0",	STR_PAD_LEFT) .	"'>$value</option>";
	}
	$date_dropdown	.= "</select>";
	return $date_dropdown;
}

// day_dropdown: Updated 31 may 2006
function day_dropdown($name, $selected_date_day = '', $extra='')
{
	$date_dropdown	.= "<select	name='$name' $extra>";
	$date_dropdown	.= "<option	value='0'>Date</option>";
	for($i = 1;$i <= 31;$i++) {
		//$s = date('S', mktime(1, 0,	0, 3, $i, 1970));
		$date_dropdown	.= " <option ";
		if ($i == $selected_date_day) {
			$date_dropdown	.= " selected ";
		}
		$date_dropdown	.= " value='" .	str_pad($i,	2, "0",	STR_PAD_LEFT) .	"'>" . $i .	$s . "</option>";
	}
	$date_dropdown	.= "</select>";
	return $date_dropdown;
}

// year_dropdown: Updated 31 may 2006
function year_dropdown($name, $selected_date_year = '', $start_year =	'',	$end_year = '', $extra='')
{
	if ($start_year	== '') {
		$start_year	= DEFAULT_START_YEAR;
	}
	
	if ($end_year == '') {
		$end_year =	DEFAULT_END_YEAR;
	}

	$date_dropdown	.= "<select	name='$name' $extra>";
	$date_dropdown	.= "<option	value='0'>Year</option>";

	for($i = $start_year; $i <= $end_year; $i++) {
		$date_dropdown	.= " <option ";
		if ($i == $selected_date_year) {
			$date_dropdown	.= " selected ";
		}
		$date_dropdown	.= " value='" .	str_pad($i,	2, "0",	STR_PAD_LEFT) .	"'>" . str_pad($i, 2, "0", STR_PAD_LEFT) .	"</option>";
	}
	$date_dropdown	.= "</select>";
	return $date_dropdown;
}

// time_dropdown: Updated 31 may 2006
function time_dropdown($pre, $selected_time = '')
{
	// echo("<br>selected_time:$selected_time");
	if ($selected_time != '' &&	$selected_time != ':') {
		$selected_hour = substr($selected_time,	0, 2);
		$selected_minute = substr($selected_time, 3, 2);
		/*
		if($selected_hour >11){
			$selected_ampm = "PM";
			$selected_hour -= 12;
		}else{
			$selected_ampm = "AM";
		}
		if($selected_hour==0){
			$selected_hour = 12;
		}
		*/
	}
	$str .= hour_dropdown($pre, $selected_hour);
	$str .= '<b>:</b>';
	$str .= minute_dropdown($pre, $selected_minute);
	return $str;
	// echo	"<br>$selected_hour, $selected_minute $selected_ampm <br>";
}

// hour_dropdown: Updated 31 may 2006
function hour_dropdown($pre, $selected_hour )
{
	$str .= "<select	name='"	. $pre . "hour'>";
	$str .= "<option	value=''>Hour</option>";
	for($i = 0;	$i <= 23; $i++)	{
		$str .= " <option ";
		if ($i == $selected_hour &&	$selected_hour != '') {
			$str .= " selected ";
		}
		$str .= " value='" .	str_pad($i,	2, "0",	STR_PAD_LEFT) .	"'>" . str_pad($i, 2, "0", STR_PAD_LEFT) .	"</option>";
	}
	$str .= "</select>";
	return $str;
}

// minute_dropdown: Updated 31 may 2006
function minute_dropdown($pre, $selected_minute )
{
	$str .= "<select	name='"	. $pre . "minute'>";
	$str .= "<option	value=''>Minute</option>";
	for($i = 0;	$i <= 59; $i = $i +	15)	{
		$str .= " <option ";
		if (str_pad($i,	2, "0",	STR_PAD_LEFT) === strval($selected_minute))	{
			$str .= " selected ";
		}
		$str	.= " value='" .	str_pad($i,	2, "0",	STR_PAD_LEFT) .	"'>" . str_pad($i, 2, "0", STR_PAD_LEFT) .	"</option>";
	}
	$str .= "</select>";
	return $str;
}

// ampm_dropdown: Updated 31 may 2006
function ampm_dropdown($pre, $selected_ampm)
{
	$str .= "<select name='" . $pre . "ampm'>";
	$str .= " <option ";
	if ($selected_ampm=='AM') {
		$str .= " selected ";
	}
	$str .= " value='AM'>AM</option>";
	$str .= " <option ";
	if ($selected_ampm=='PM') {
		$str	.= " selected ";
	}
	$str .= " value='PM'>PM</option>";
	$str .= "</select>";
	return $str;
}

// get_qry_str: Updated 31 may 2006
function get_qry_str($over_write_key = array(),	$over_write_value =	array())
{
	global $_GET;
	$m = $_GET;
	if (is_array($over_write_key)) {
		$i = 0;
		foreach($over_write_key	as $key) {
			$m[$key] = $over_write_value[$i];
			$i++;
		}
	} else {
		$m[$over_write_key]	= $over_write_value;
	}
	$qry_str = qry_str($m);
	return $qry_str;
}

// qry_str: Updated 31 may 2006
function qry_str($arr, $skip = '')
{
	$s = "?";
	$i = 0;
	foreach($arr as	$key =>	$value)	{
		if ($key !=	$skip) {
			if (is_array($value)) {
				foreach($value as $value2) {
					if ($i == 0) {
						$s .= $key . '[]=' . $value2;
						$i = 1;
					} else {
						$s .= '&' .	$key . '[]=' . $value2;
					}
				}
			} else {
				if ($i == 0) {
					$s .= "$key=$value";
					$i = 1;
				} else {
					$s .= "&$key=$value";
				}
			}
		}
	}
	return $s;
}

// check_radio: Updated 31 may 2006
function check_radio($s, $s2)
{
	if (is_array($s2)) {
		// echo("<br>$s");
		// print_r($s2);
		if (in_array($s, $s2)) {
			return " checked ";
		}
	} else if ($s == $s2) {
		return " checked ";
	}
}

// sort_arrows: Updated 31 may 2006
function sort_arrows($column)
{
	//return '<A HREF="' . $_SERVER['PHP_SELF'] .	get_qry_str(array('order_by', 'order_by2'),	array($column, 'asc')) . '"><img src="'.SITE_WS_PATH.'/images/up_arrow.gif" border="0"></a>	<a href="'	. $_SERVER['PHP_SELF'] . get_qry_str(array('order_by', 'order_by2'), array($column,	'desc')) . '"><img src="'.SITE_WS_PATH.'/images/down_arrow.gif" border="0"></a>';
	return '<A HREF="' . $_SERVER['PHP_SELF'] .	get_qry_str(array('order_by', 'order_by2'),	array($column, 'asc')) . '"><img src="images/white_up.gif" border="0"></a>	<a href="'	. $_SERVER['PHP_SELF'] . get_qry_str(array('order_by', 'order_by2'), array($column,	'desc')) . '"><img src="images/white_down.gif" border="0"></a>';
}

// select_option: Updated 31 may 2006
function select_option($s, $s1)
{
	if ($s == $s1) {
		echo " selected	";
	}
}

// -----------------------------------------------------


/* Sample
function cuisine_checkbox($checkname = 'cuisines', $checksel = '', $cols = '4',	$missit	= '', $style = '',	$tableattr = '')
{
	$manutmp = Array();
	$sql = " select	cuisine_name, cuisine_name from	grabit_cuisine order by	cuisine_name";
	$result	= mysql_query($sql) or die(db_error($sql));
	while ($line = mysql_fetch_array($result)) {
		$ms_tmp[$line['cuisine_name']] = $line['cuisine_name'];
	}
	return make_checkbox($ms_tmp, $checkname, $checksel, $cols,	$missit, $style, $tableattr);
}
*/

// is_post_back: Updated 31 may 2006
function is_post_back(){
	if(count($_POST)>0) {
		return true;
	} else {
		return false;
	}
	/*
	$cur_page = $_SERVER['REQUEST_URI'];
	$q_pos = strpos($cur_page, '?');
	if($q_pos!==false) {
		$cur_page = substr($cur_page, 0 , $q_pos);
	}

	$parsed_url = parse_url($_SERVER['HTTP_REFERER']);
	$referer = $parsed_url['path'];
//echo "<br>referer: ".$referer;
//echo "<br>cur_page: ".$cur_page;
	if(strtolower($_SERVER['REQUEST_METHOD'])=='post' && $referer == $cur_page) {
		return true;	
	} else {
		return false;	
	}
	*/
}

// request_to_hidden: Updated 31 may 2006
function request_to_hidden($arr_skip='') 
{
	foreach($_REQUEST as $name => $value) {
		$s .= '<input type="hidden" name="'.$name.'" value="'.htmlspecialchars(stripslashes($value)).'">'."\n";
	}
	return $s;
}

// sql_to_array_file: Updated 31 may 2006
function sql_to_array_file($arr_name, $sql, $file, $full_table=false)
{
	$str = "<?\n";
	$result = mysql_query($sql) or die(db_error($sql));
	while ($line = mysql_fetch_array($result)) {
		$line = ms_addslashes($line);
		if($full_table) {
			$key = $line[0];
			foreach($line as $name=>$value) {
				if(!is_numeric($name)) {
					$str .= '$'.$arr_name."['".$key."']['".$name."'] = '".$value."';\n";
				}
			}
			$str .= "\n";
		} else {
			$str .= '$'.$arr_name."['".$line[0]."'] = '".$line[1]."';\n";
		}
	}
	$str .= "\n?>";

	$fh = fopen($file, 'w');
	fwrite($fh, $str);
	fclose($fh);
	return true;
}

// array_radios: Updated 31 may 2006
function array_radios($arr, $sel_value = '', $name = '', $cols = 3, $extra = '')
{
	if ($style != "") {
		$style = "class='" . $style . "'";
	} 

	$colwidth = 100 / $cols;
	$colwidth = round($colwidth, 2);
	$j = 1;
	/*
	$manutmp['Any']="Any";
	if($checksel==''){
		$checksel=Array("Any");
	}
	*/
	foreach($arr as $key => $value) {
		$tochecked = "";
		if (is_array($sel_value) && in_array($key, $sel_value)) {
			$tochecked = "checked";
		} 
		if ($key != $missit) {
			if ($value != "") {
				if ($j == 1) {
					$checkstr .= "<table $tableattr><tr>\n";
				} else if (($j % $cols) == 1 || $cols==1) {
					$checkstr .= "</tr><tr>\n";
				} 

				$checkstr .= "<td width='" . $colwidth . "%' $style valign=top><INPUT TYPE='radio' $javascript  NAME='$name' value='$key' $tochecked     > $value </td>\n";
				$j++;
			} 
		} 
	} 
	$j--; 
	// echo "$cols-($j%$cols)=".$cols-($j%$cols);
	// echo "<BR>($j%$cols)=".($j%$cols);
	for($x = $j % $cols;$x < 4;$x++) {
		if ($x != 3) {
			$checkstr .= "<td>&nbsp;</td>\n";
		} else {
			$checkstr .= "<td>&nbsp;</td></tr>\n";
		} 
	} 
	$checkstr .= "</table>";
	return $checkstr;
} 

// make_thumb_gd: Updated 31 may 2006
function make_thumb_gd($imgPath, $destPath, $newWidth, $newHeight, $ratio_type = 'width', $quality = 60, $verbose = false)
{ 
	// options for ratio type = width|height|distort|crop

	// get image info (0 width and 1 height, 2 is (1 = GIF, 2 = JPG, 3 = PNG)
	$size = getimagesize($imgPath); 
	// break and return false if failed to read image infos
	if (!$size) {
		if ($verbose) {
			echo "Unable to read image info.";
		}
		return false;
	} 
	$curWidth	= $size[0];
	$curHeight	= $size[1];
	$fileType	= $size[2];
	
	// width/height ratio
	$ratio =  $curWidth/$curHeight;

	$srcX = 0;
	$srcY = 0;
	$srcWidth = $curWidth;
	$srcHeight = $curHeight;

	if($ratio_type=='width') {
		// If the dimensions for thumbnails are greater than original image do not enlarge
		if($newWidth > $curWidth) {
			$newWidth = $curWidth;
		}
		$newHeight	= $newWidth / $ratio;
	} else if($ratio_type=='crop') {
		$thumbRatio = $newWidth / $newHeight;
		if($ratio < $thumbRatio) {
			$srcHeight = round($curHeight*$ratio/$thumbRatio);
			$srcY = round(($curHeight-$srcHeight)/2);
		} else {
			$srcWidth = round($curWidth*$thumbRatio/$ratio);
			$srcX = round(($curWidth-$srcWidth)/2);
		}
		/*echo "<br>curWidth: $curWidth";
		echo "<br>curHeight: $curHeight";
		echo "<br>newWidth: $newWidth";
		echo "<br>newHeight: $newHeight";
		echo "<br>ratio: $ratio";
		echo "<br>thumbRatio: $thumbRatio";
		echo "<br>srcWidth: $srcWidth";
		echo "<br>srcX: $srcX";
		echo "<br>srcHeight: $srcHeight";
		echo "<br>srcY: $srcY";*/
	} else if($ratio_type=='height') {
		// If the dimensions for thumbnails are greater than original image do not enlarge
		if($newHeight > $curHeight) {
			$newHeight = $curHeight;
		}
		$newWidth	= $newHeight * $ratio;
	} else if($ratio_type=='distort') {
	}
	
	// create image
	switch ($fileType) {
		case 1:
			if (function_exists("imagecreatefromgif")) {
				$originalImage = imagecreatefromgif($imgPath);
			} else {
				if ($verbose) {
					echo "GIF images are not support in this php installation.";
					return false;
				}
			} 
			$fileExt = 'gif';
			break;
		case 2: 
			$originalImage = imagecreatefromjpeg($imgPath);
			$fileExt = 'jpg';
			break;
		case 3: 
			$originalImage = imagecreatefrompng($imgPath);
			$fileExt = 'png';
			break;
		default:
			if ($verbose) {
				echo "Not a valid image type.";
			}
			return false;
	} 
	// create new image

	$resizedImage = imagecreatetruecolor($newWidth, $newHeight);
	//echo "$srcX, $srcY, $newWidth, $newHeight, $curWidth, $curHeight";
	//echo "<br>$srcX, $srcY, $newWidth, $newHeight, $srcWidth, $srcHeight<br>";
	imagecopyresampled($resizedImage, $originalImage, 0, 0, $srcX, $srcY, $newWidth, $newHeight, $srcWidth, $srcHeight);
	switch ($fileExt) {
		case 'gif':
			imagegif($resizedImage, $destPath, $quality);
			break;
		case 'jpg': 
			imagejpeg($resizedImage, $destPath, $quality);
			break;
		case 'png': 
			imagepng($resizedImage, $destPath, $quality);
			break;
	} 
	// return true if successfull
	return true;
} 

// show_thumb: Updated 31 may 2006
function show_thumb($file_org, $width, $height, $ratio_type = 'width')
{
	$file_name = str_replace(SITE_WS_PATH."/", "", $file_org);
	$file_name = str_replace("/", "^", $file_name);
	$cache_file = $width."x".$height.'__'.$ratio_type .'__'.$file_name;

	$file_fs_path = str_replace(SITE_WS_PATH, SITE_FS_PATH, $file_org);
	if(!is_file(SITE_FS_PATH."/".THUMB_CACHE_DIR."/".$cache_file)) {
		make_thumb_gd($file_fs_path, SITE_FS_PATH."/".THUMB_CACHE_DIR."/".$cache_file, $width, $height, $ratio_type );
	}	
	return SITE_WS_PATH."/".THUMB_CACHE_DIR."/".$cache_file;
}

// ms_parse_keywords: Updated 31 may 2006
// Temporary function. Need to be made more elegant or replace with regular expression
function ms_parse_keywords($keywords)
{
	$arr_keywords = array();
	$dq_end =true;
	$sp_end = true;
	for ($i=0;$i<strlen($keywords);$i++) {
		//echo "<br>cur_token:$cur_token, cur_keyword:$cur_keyword, dq_start:$dq_start, dq_end:$dq_end, sp_start:$sp_start, sp_end:$sp_end,";
		$cur_token = $keywords[$i];
		if($cur_token=='"') {
			if($dq_start) {
				$dq_end = true;
				$dq_start = false;
				$arr_keywords[] = $cur_keyword;
				$cur_keyword = '';
			} else if($dq_end) {
				$dq_end = false;
				$dq_start = true;
				$sp_start = false;
			} else {
				$dq_end = false;
				$dq_start = true;
			}
		} else if($cur_token==' ') {
			if($sp_start || $dq_end) {
				$sp_end = true;
				$sp_start = false;
				$arr_keywords[] = $cur_keyword;
				$cur_keyword = '';
			} else if($sp_end && !$dq_start) {
				$sp_end = false;
				$sp_start = true;
			} else if($dq_start) {
				$cur_keyword .= $cur_token;
			}
		} else {
			$cur_keyword .= $cur_token;
		}
	}

	$arr_keywords[] =$cur_keyword;
	return $arr_keywords;
}

// validate_form: Updated 31 may 2006
function validate_form()
{
	return ' onsubmit="return validateForm(this,0,0,0,1,8);" ';
}

// pagesize_dropdown: Updated 31 may 2006
function pagesize_dropdown($name, $value)
{
	$arr = array('10'=>'10','25'=>'25','50'=>'50','100'=>'100');
	$m = $_GET;
	unset($m['pagesize']);
	return array_dropdown($arr, $value , $name, '  onchange="location.href=\''.$_SERVER['PHP_SELF'].qry_str($m).'&pagesize=\'+this.value" ');
}


//((((((((((((((((((999((((((((((((((((99999999999(((((((((((((((((((((((((((999999999999999999


  function implodeList($arr, $seperator)
{
	$seperatedList = implode($seperator, $arr);
	return $seperatedList;
}





/*##############################################
Use : Returns true if varchar-field is already present in table,false otherwise.
Arguments : none
###############################################*/
function checkUniquenessOfString($tableName,$fieldName,$fieldValue)
{
    global $contact , $resultUnique; 
    $uniqueSql="Select $fieldName from $tableName where $fieldName='$fieldValue'";
	$resultUnique=$contact->Execute($uniqueSql) or $contact->ErrorMsg();
	$totalRowsUnique = $resultUnique->RecordCount();
   // $resultUnique=mysql_query($uniqueSql,$connection) or die('Failed to run Query for Uniqueness !!!');
    if($totalRowsUnique!=0)
        {
            
            return true;
        }
    else
        {
           
            return false;
        }
}

/*##############################################
Use : Returns true if varchar-field is already present in table,false otherwise.
Arguments : none
###############################################*/
function checkUniquenessOfString_add2($tableName,$fieldName,$fieldValue,$fieldName1,$fieldValue1)
{
    global $contact , $resultUnique; 
    $uniqueSql="Select $fieldName from $tableName where $fieldName='$fieldValue' and $fieldName1='$fieldValue1'";
	$resultUnique=$contact->Execute($uniqueSql) or $contact->ErrorMsg();
	$totalRowsUnique = $resultUnique->RecordCount();
   // $resultUnique=mysql_query($uniqueSql,$connection) or die('Failed to run Query for Uniqueness !!!');
    if($totalRowsUnique!=0)
        {
            
            return true;
        }
    else
        {
           
            return false;
        }
}

/*##############################################
Use : Returns true if varchar-field is already present in table,false otherwise.
Arguments : none
###############################################*/

function checkUniquenessOfString1($tableName,$fieldName,$fieldValue,$fieldName1,$fieldValue1)
{
    global $contact;
    $uniqueSql="Select $fieldName from $tableName where $fieldName='$fieldValue' and $fieldName1!='$fieldValue1'";
    $resultUnique=$contact->Execute($uniqueSql) or $contact->ErrorMsg();
	$totalRowsUnique = $resultUnique->RecordCount();
     if($totalRowsUnique!=0)
        {            
          return true;
        }
    else
        {           
          return false;
        }
}

/*##############################################
Use : Returns true if varchar-field is already present in table,false otherwise.
Arguments : none
###############################################*/

function checkUniquenessOfString2($tableName,$fieldName,$fieldValue,$fieldName1,$fieldValue1,$fieldName2,$fieldValue2)
{
    global $contact;
    $uniqueSql="Select $fieldName from $tableName where $fieldName='$fieldValue' and $fieldName1!='$fieldValue1' and $fieldName2='$fieldValue2'";
    $resultUnique=$contact->Execute($uniqueSql) or $contact->ErrorMsg();
	$totalRowsUnique = $resultUnique->RecordCount();
     if($totalRowsUnique!=0)
        {            
          return true;
        }
    else
        {           
          return false;
        }
}


function explodeList($seperatedList, $seperator)
{
	$arr = explode($seperator, $seperatedList);
	return $arr;
}

function datacount($tableName,$fieldName)
{
    global $contact , $resultDataCount; 
    $DataCountSql="select count($fieldName) as total from $tableName";
	$resultDataCount=$contact->Execute($DataCountSql) or $contact->ErrorMsg();
	echo $resultDataCount->fields['total'] ;
	//$totalRowsDataCount = $resultDataCount->RecordCount();
   // $resultUnique=mysql_query($uniqueSql,$connection) or die('Failed to run Query for Uniqueness !!!');
    
	//echo $totalRowsDataCount;
}

function datacount2($tableName,$fieldName,$fieldName,$value)
{
    global $contact , $resultDataCount; 
    $DataCountSql2="select count($fieldName) as total from $tableName where $fieldName='$value' ";
	$resultDataCount2=$contact->Execute($DataCountSql2) or $contact->ErrorMsg();
	echo $resultDataCount2->fields['total'] ;
	
}

function generatePassword($length=5, $strength=5) {
	$vowels = 'aeuy';
	$consonants = 'BDGHJLMNPQRSTVWXZ';
	if ($strength & 1) {
		$consonants .= 'BDGHJLMNPQRSTVWXZ';
	}
	if ($strength & 2) {
		$vowels .= "AEUY";
	}
	if ($strength & 4) {
		$consonants .= '23456789';
	}
	if ($strength & 8) {
		$consonants .= '@#$%';
	}
 
	$password = '';
	$alt = time() % 2;
	for ($i = 0; $i < $length; $i++) {
		if ($alt == 1) {
			$password .= $consonants[(rand() % strlen($consonants))];
			$alt = 0;
		} else {
			$password .= $vowels[(rand() % strlen($vowels))];
			$alt = 1;
		}
	}
	return $password;
}



// //////////////////////////////   Function check member is paid or not /////////////////////
function is_memberes_paid($mem_id)
{
  $added=date('Y-m-d');
$SqlValidPaid = "select member.MembersId from inox_members  as member, inox_subscription  as subsc where member.MembersId=subsc.memberid and subsc.memberid='$mem_id' and subsc.enddate >'$added'  and subsc.startdate<='$added' and subsc.status='Y'" ;
$ResultPaid = mysql_query($SqlValidPaid); if(mysql_error()!=""){echo mysql_error(); die();}
$TotalRecords = mysql_num_rows($ResultPaid);
 if($TotalRecords>0)
     return true;
   else
   	return false; 
}

//*************************************************************************************************************************
                             //* function for banner view *//
function ViewBanner($BannerID,$Status)	
{	
 global $contact;  // Location id = $bannerID 
$sqlViewLocation="select * from  inox_bannerlocations where LocationID='$BannerID'";	
 $resultViewLocation = $contact->Execute($sqlViewLocation) or die($contact->ErrorMsg());
 			 
 $sqlViewBanner="select * from inox_banner where LocationID='$BannerID' and Status='$Status'";
 $resultViewBanner = $contact->Execute($sqlViewBanner) or die($contact->ErrorMsg());
 $Total_Banner=$resultViewBanner->RecordCount();  $result->fields[0];
 $photo=$resultViewBanner->fields[photo];
 $Hight=$resultViewLocation->fields[Hight];
 $Width=$resultViewLocation->fields[Width];
 $atext=$resultViewBanner->fields[atext];
 $target=$resultViewBanner->fields[target];
 $url=$resultViewBanner->fields[url];
echo"<a target=\"$target\" href=\"$url\"><img src=\"uploaded_files/new_photo/$photo\" alt=\"$atext\" name=\"BannerImage\" border=\"0\" /></a>";
//height=\"$Hight\" width=\"$Width\" 
  //    	
}