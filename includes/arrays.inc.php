<?
$ARR_VALID_IMG_EXTS = array('jpg', 'jpeg', 'jpe', 'gif', 'png', 'bmp');

$ARR_WEEK_DAYS = array(
'mon' => 'Monday',
'tue' => 'Tuesday',
'wed' => 'Wednesday',
'thu' => 'Thursday',
'fri' => 'Friday',
'sat' => 'Saturday',
'sun' => 'Sunday'
);

    $arr_month[0]="January";
	$arr_month[1]="February";
	$arr_month[2]="March";
	$arr_month[3]="April";
	$arr_month[4]="May";
	$arr_month[5]="June";
	$arr_month[6]="July";
	$arr_month[7]="August";
	$arr_month[8]="September";
	$arr_month[9]="October";
	$arr_month[10]="November";
	$arr_month[11]="December";
	
	$arr_year=array('1'=>"1",'2'=>"2",'3'=>"3",'4'=>"4",'5'=>"5",'6'=>"6",'7'=>"7",'8'=>"8",'9'=>"9",'10'=>"10");
$arr_monthexp=array('0'=>"0",'1'=>"1",'2'=>"2",'3'=>"3",'4'=>"4",'5'=>"5",'6'=>"6",'7'=>"7",'8'=>"8",'9'=>"9",'10'=>"10",'11'=>"11");


$ARR_MONTHS = Array('01'=>'Jan' , '02'=>'Feb' , '03'=>'Mar' , '04'=>'Apr' , '05'=>'May' , '06'=>'Jun' , '07'=>'Jul' , '08'=>'Aug' , '09'=>'Sep' , '10'=>'Oct' , '11'=>'Nov' , '12'=>'Dec');

if ($handle = opendir(dirname(__FILE__).'/db_arrays')) { 
	while (false !== ($file = readdir($handle))) { 
		if ($file != "." && $file != "..") { 
			include(dirname(__FILE__).'/db_arrays/'.$file);
		} 
	} 
   closedir($handle); 
} 

    $arr_monthe[1]="January";
	$arr_monthe[2]="February";
	$arr_monthe[3]="March";
	$arr_monthe[4]="April";
	$arr_monthe[5]="May";
	$arr_monthe[6]="June";
	$arr_monthe[7]="July";
	$arr_monthe[8]="August";
	$arr_monthe[9]="September";
	$arr_monthe[10]="October";
	$arr_monthe[11]="November";
	$arr_monthe[12]="December";

?>