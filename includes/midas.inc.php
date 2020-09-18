<?php
@session_start();
error_reporting(E_ALL ^ E_NOTICE);
// Start output buffering
// Set variable $NO_OB = true if output buffering is not needed in a file
/*
if(!isset($NO_OB) && LOCAL_MODE==false) {
	ob_start("ob_gzhandler");
}
*/
if ($_SERVER['HTTP_HOST'] == "midas" || $_SERVER['HTTP_HOST'] == "localhost") {
    define('LOCAL_MODE', true);
} else {
 	define('LOCAL_MODE', false);
}
// File system path
$tmp = dirname(__FILE__);
$tmp = str_replace('\\' ,'/',$tmp);
$tmp = substr($tmp, 0, strrpos($tmp, '/'));
define('SITE_FS_PATH', $tmp); 
// include all the library files needed here  connect.php bannerlocation.php
//require_once(SITE_FS_PATH."/includes/config.inc.php");
require_once(SITE_FS_PATH."/includes/config.inc.php");
require_once(SITE_FS_PATH."/includes/funcs_lib.inc.php");
require_once(SITE_FS_PATH."/includes/funcs_cur.inc.php");
require_once(SITE_FS_PATH."/includes/arrays.inc.php");
require_once(SITE_FS_PATH."/includes/array.inc.php");
require_once(SITE_FS_PATH."/includes/sitemsgs.php");
require_once(SITE_FS_PATH."/includes/connect.php");
                                                                       
if(strtolower($_SERVER['HTTPS'])=='on') {
	define('IN_SSL', true);
	define('HTTP_OR_HTTPS_PATH', SITE_SSL_PATH);
} else {
	define('IN_SSL', false);
	define('HTTP_OR_HTTPS_PATH', SITE_WS_PATH);
}

// Script start time used to test site performance
define('SCRIPT_START_TIME', getmicrotime());
//echo("<br>SCRIPT_START_TIME: ".SCRIPT_START_TIME);

// magic_quotes_gpc needs to be "on"
if(!get_magic_quotes_gpc()) {
	$_GET		= ms_addslashes($_GET);
	$_POST		= ms_addslashes($_POST);
	$_COOKIE	= ms_addslashes($_COOKIE);
} else {
	$_GET		= ms_trim($_GET);
	$_POST		= ms_trim($_POST);
	$_COOKIE	= ms_trim($_COOKIE);
}

import_request_variables('gp');

// magic_quotes_runtime needs to be "off"
if(get_magic_quotes_runtime()) {
	set_magic_quotes_runtime(0);
}

// load plugins
if ($handle = opendir(SITE_FS_PATH.'/'.PLUGINS_DIR)) { 
   while (false !== ($file = readdir($handle))) { 
       if ($file != "." && $file != "..") { 
		   $curr_dir = SITE_FS_PATH.'/'.PLUGINS_DIR.'/'.$file;
           if(is_dir($curr_dir)) {
			   if(file_exists($curr_dir.'/midas_plugin.php')) {
				   require_once($curr_dir.'/midas_plugin.php');
			   }
		   }
       } 
   } 
   closedir($handle); 
} 
// Protect admin pages
$PHP_SELF = $_SERVER['PHP_SELF'];
$admin_pos  = strpos($PHP_SELF, '/admin/');
if($admin_pos !== false) {
	// Remove following comment to enable admin login check
	//protect_admin_page();
}

// Set variable $NO_CON to anything if DB connection is not needed in file
if(!isset($NO_CON)) { 
	connect_db(); // Opening DB connection
}
?>