<?php
if(!defined('LOCAL_MODE')) {
	die('<span style="font-family: tahoma, arial; font-size: 11px">config file cannot be included directly');
}

if (LOCAL_MODE) {
    // Settings for local smartvision server do not edit here
	// database settings
    $ARR_CFGS["db_host"] = 'localhost';
	$ARR_CFGS["db_name"] = 'vedantus';
    $ARR_CFGS["db_user"] = 'root';
    $ARR_CFGS["db_pass"] = 'pms';
	$tmp = dirname(__FILE__);
	$tmp = str_replace('\\' ,'/',$tmp);
	$tmp = str_replace('/includes' ,'',$tmp);
	define('IMG_PATH', $tmp);  // File system path
    define('SITE_SUB_PATH', '/news/site');
} else {
    // Settings for live server edit whenever shifting site to different server
	// database settings
	$ARR_CFGS["db_host"] = 'localhost';
	$ARR_CFGS["db_name"] = 'vedantus';
    $ARR_CFGS["db_user"] = 'root';
    $ARR_CFGS["db_pass"] = 'pms';
// Path for site
	define('SITE_SUB_PATH', '');
}
define('SITE_WS_PATH', 'http://'.$_SERVER['HTTP_HOST'].SITE_SUB_PATH);
define('THUMB_CACHE_DIR', 'thumb_cache');
define('PLUGINS_DIR', 'includes/plugins');
define('UP_FILES_FS_PATH', SITE_FS_PATH.'/uploaded_files');
define('UP_FILES_WS_PATH', SITE_WS_PATH.'/uploaded_files');
define('DEFAULT_START_YEAR', 2011);
define('DEFAULT_END_YEAR', date('Y')+10);
define('ADMIN_EMAIL', 'newsletter@vedantusus.com');
define('SITE_NAME', 'Vedantus Us');
define('TEST_MODE', false);
define('DEF_PAGE_SIZE_USER',5);
define('DEF_PAGE_SIZE', 25);
$defaultUrl='userhome.php';
$title_message="Welcome Vedantus Us Admin";
$site_title="www.vedantusus.com";
$site_url="www.vedantusus.com";
$site_mail="sonal@us-creations.com";


?>