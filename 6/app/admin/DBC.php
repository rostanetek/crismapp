<?php
/*
 * Mysql Ajax Table Editor
 *
 * Copyright (c) 2014 Chris Kitchen <info@mysqlajaxtableeditor.com>
 * All rights reserved.
 *
 * See COPYING file for license information.
 *
 * Download the latest version from
 * http://www.mysqlajaxtableeditor.com
 */
class DBC
{


	private static $instance = null;
	
	
	/*
	private static $host = 'wm53.wedos.net';
	private static $db = 'd61192_disert';
	private static $user = 'a61192_disert';
	private static $pass = 'jhdVu9D7';
	
	*/
	
	private static $host = 'localhost';
	private static $db = 'disertace';
	private static $user = 'root';
	private static $pass = '';
    
	
	public static function get()
	{
		if(self::$instance == null)
		{
			try
			{
				self::$instance = new PDO(
					'mysql:host='.self::$host.';dbname='.self::$db, 
					self::$user, 
					self::$pass,
					array(
						PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
						PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
						PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					)
				);
			} 
			catch(PDOException $e)
			{
				echo "Error!: " . $e->getMessage() . "<br/>";
				die();
			}
		}
		return self::$instance;
	}
	
	public function getPrepareSets($arr)
	{
		$prepareSets = array();
		foreach($arr as $column => $value)
		{
			$prepareSets[] = "`$column` = :".$column;
		}
		return $prepareSets;
	}
	
}
?>
