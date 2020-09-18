<?php
# PHP ADODB document - made with PHAkt
	# FileName="Connection_php_adodb.htm"
	# Type="ADODB"
	# HTTP="true"
	# DBTYPE="mysql"  if need to change database like oracle  change only database type only 
	
	$MM_contact_HOSTNAME = "localhost";
	$MM_contact_DATABASE = "mysql:vedantus"; // database name and data base type
	$MM_contact_DATABASENAME="vedantus";
	$MM_contact_DBTYPE   = preg_replace("/:.*$/", "", $MM_contact_DATABASE);
	$MM_contact_DATABASE = preg_replace("/^.*?:/", "", $MM_contact_DATABASE);
	$MM_contact_USERNAME = "root";
	$MM_contact_PASSWORD = "pms";
	$MM_contact_LOCALE = "Us";
	$MM_contact_MSGLOCALE = "En";
	$MM_contact_CTYPE = "C";
	$KT_locale = $MM_contact_MSGLOCALE;
	$KT_dlocale = $MM_contact_LOCALE;
	$KT_serverFormat = "%Y-%m-%d %H:%M:%S";
	$QUB_Caching = "false";
	
	switch (strtoupper ($MM_contact_LOCALE)) {
		case 'EN':
				$KT_localFormat = "%d-%m-%Y %H:%M:%S";
		break;
		case 'EUS':
				$KT_localFormat = "%m-%d-%Y %H:%M:%S";
		break;
		case 'FR':
				$KT_localFormat = "%d-%m-%Y %H:%M:%S";
		break;
		case 'RO':
				$KT_localFormat = "%d-%m-%Y %H:%M:%S";
		break;
		case 'IT':
				$KT_localFormat = "%d-%m-%Y %H:%M:%S";
		break;
		case 'GE':
				$KT_localFormat = "%d-%m-%Y %H:%M:%S";
		break;
		case 'US':
				$KT_localFormat = "%Y-%m-%d %H:%M:%S";
		break;
		default :
				$KT_localFormat = "none";			
	}
  
 

	if (!defined('CONN_DIR')) define('CONN_DIR',dirname(__FILE__));
	require_once(SITE_FS_PATH."/adodb/adodb.inc.php");
	//require_once(CONN_DIR."/../adodb/adodb.inc.php");  // Include Adodb connection file
	//require_once(SITE_FS_PATH."/adodb/adodb.inc.php");
	ADOLoadCode($MM_contact_DBTYPE);
	$contact=&ADONewConnection($MM_contact_DBTYPE);

	if($MM_contact_DBTYPE == "access" || $MM_contact_DBTYPE == "odbc"){
		if($MM_contact_CTYPE == "P"){
			$contact->PConnect($MM_contact_DATABASE, $MM_contact_USERNAME,$MM_contact_PASSWORD, 
			$MM_contact_LOCALE);
		} else $contact->Connect($MM_contact_DATABASE, $MM_contact_USERNAME,$MM_contact_PASSWORD, 
			$MM_contact_LOCALE);
	} else if (($MM_contact_DBTYPE == "ibase") or ($MM_contact_DBTYPE == "firebird")) {
		if($MM_contact_CTYPE == "P"){
			$contact->PConnect($MM_contact_HOSTNAME.":".$MM_contact_DATABASE,$MM_contact_USERNAME,$MM_contact_PASSWORD);
		} else $contact->Connect($MM_contact_HOSTNAME.":".$MM_contact_DATABASE,$MM_contact_USERNAME,$MM_contact_PASSWORD);
	}else {
		if($MM_contact_CTYPE == "P"){
			$contact->PConnect($MM_contact_HOSTNAME,$MM_contact_USERNAME,$MM_contact_PASSWORD,
   			$MM_contact_DATABASE,$MM_contact_LOCALE);
		} else $contact->Connect($MM_contact_HOSTNAME,$MM_contact_USERNAME,$MM_contact_PASSWORD,
   			$MM_contact_DATABASE,$MM_contact_LOCALE);
   }

	if (!function_exists("updateMagicQuotes")) {
		function updateMagicQuotes($HTTP_VARS){
			if (is_array($HTTP_VARS)) {
				foreach ($HTTP_VARS as $name=>$value) {
					if (!is_array($value)) {
						$HTTP_VARS[$name] = addslashes($value);
					} else {
						foreach ($value as $name1=>$value1) {
							if (!is_array($value1)) {
								$HTTP_VARS[$name1][$value1] = addslashes($value1);
							}
						}
						
					}
					global $$name;
					$$name = &$HTTP_VARS[$name];
				}
			}
			return $HTTP_VARS;
		}
		
		if (!get_magic_quotes_gpc()) {
			$HTTP_GET_VARS = updateMagicQuotes($HTTP_GET_VARS);
			$HTTP_POST_VARS = updateMagicQuotes($HTTP_POST_VARS);
			$HTTP_COOKIE_VARS = updateMagicQuotes($HTTP_COOKIE_VARS);
		}
	}
	if (!isset($HTTP_SERVER_VARS['REQUEST_URI'])) {
		$HTTP_SERVER_VARS['REQUEST_URI'] = $HTTP_SERVER_VARS['PHP_SELF'];
	}
	
	

?>
