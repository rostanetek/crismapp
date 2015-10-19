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
// Un-Comment for debugging
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
class Common
{		
	
	protected $langVars;	
	protected $headerFiles = array();
	protected $showBackLink = false;
	
	public function logError($message, $file, $line)
	{
		$message = sprintf('An error occurred in script %s on line %s: %s',$file,$line,$message);
		throw new Exception($message);
		echo '<span style="color: red;">'.$message.'</span>';
		//var_dump($message);
		exit();
	}


	protected function displayHeaderHtml()
	{
		?>
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
		"http://www.w3.org/TR/html4/loose.dtd">
		<html>
		<head>
		<title>Admin</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link href="../../foundation.css" rel="stylesheet" type="text/css" />
		<link href="css/icon_styles.css" rel="stylesheet" type="text/css" />
		
		<link href="js/jquery/css/redmond/jquery-ui-1.9.2.custom.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery/js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="js/jquery/js/jquery-ui-1.9.2.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery/js/jquery.json.min.js"></script>
		<script type="text/javascript" src="js/jquery/js/jquery.cookie.js"></script>
		<script type="text/javascript" src="js/ajax_table_editor.js"></script>
		<?php echo implode("\n",$this->headerFiles); ?>
		

		</head>	
		<body window.onload=function() {top.scrollTo(0,0);};>
		
		
		
		<?php
	}	
	
	protected function displayFooterHtml()
	{
		?>
		<!-- <? if($this->showBackLink): ?>
			<br /><br /><div align="center"><a href="index.php">Back To Examples</a></div><br /><br />
		<? endif; ?>-->
		</body>
		</html>
		<?php
	}	
	
	protected function getAjaxUrl()
	{
		$ajaxUrl = $_SERVER['PHP_SELF'];
		if(count($_GET) > 0)
		{
			$queryStrArr = array();
			foreach($_GET as $var => $val)
			{
				$queryStrArr[] = $var.'='.urlencode($val);
			}
			$ajaxUrl .= '?'.implode('&',$queryStrArr);
		}
		return $ajaxUrl;
	}
	
}
?>
