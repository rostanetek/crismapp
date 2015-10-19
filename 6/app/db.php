<?php

//!!! POZOR: nastavit take v ./admin/DBC.pph !!!



/*  rostanetek.cz */

 /*
$GLOBALS['host'] = 'wm53.wedos.net';
$GLOBALS['db_user'] = 'a61192_disert';
$GLOBALS['db_password'] = 'jhdVu9D7';
$GLOBALS['db_name'] = 'd61192_disert';
*/
 /* localhost*/ 

$GLOBALS['host'] = 'localhost';
$GLOBALS['db_user'] = 'root';
$GLOBALS['db_password'] = '';
$GLOBALS['db_name'] = 'disertace';





//uzivatele
define('DB_HOST', $GLOBALS['host']);
define('DB_USER', $GLOBALS['db_user']);
define('DB_PASSWORD', $GLOBALS['db_password']);
define('DB_DATABASE', $GLOBALS['db_name']);


//nacitani vrstev do mapy
$con = mysqli_connect($GLOBALS['host'],$GLOBALS['db_user'],$GLOBALS['db_password'],$GLOBALS['db_name']); 
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
$con->set_charset("utf8");
mysqli_select_db($con,"ajax_demo");


//prilohy
/* puvodni-stary prikaz 
mysql_connect($GLOBALS['host'], $GLOBALS['db_user'], $GLOBALS['db_password']) or die(mysql_error()) ; 
mysql_select_db($GLOBALS['db_name']) or die(mysql_error()) ; 	
mysql_query("SET NAMES utf8");*/

$pripoj = mysqli_connect($GLOBALS['host'], $GLOBALS['db_user'], $GLOBALS['db_password'], $GLOBALS['db_name']);


//admin-presouvani vrstev
function connect() {
	$host = $GLOBALS['host']; 
	$db_user = $GLOBALS['db_user'];
	$db_password = $GLOBALS['db_password'];
	$db_name = $GLOBALS['db_name'];
    return new PDO('mysql:host='.$host.';dbname='.$db_name, $db_user, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

?>