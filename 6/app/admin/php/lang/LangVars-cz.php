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
// LANGUAGE variables
class LangVars
{
	public $language      = 'Česky';
	public $locales       = array('en_US.utf8','en_GB.utf8','en_US','en_GB','en','english');
	//Class Common
	public $errNoSelect   = 'Error connecting to mysql: Could not select the %s database';
	public $errNoConnect  = 'Error connecting to mysql: Could not connect';
	public $errInScript   = 'An error occurred in script %s on line %s: %s';
	
	//Class AjaxTableEditor
	//function setDefaults
	public $optLike       = 'Contains';
	public $optNotLike    = 'Does Not Contain';
	public $optEq         = 'Matches Exactly';
	public $optNotEq      = 'Does Not Match Exactly';
	public $optGreat      = 'Greater Than';
	public $optLess       = 'Less Than';
	public $optGreatEq    = 'Greater Than Or Equal To';
	public $optLessEq     = 'Less Than Or Equal To';
	
	public $ttlAddRow     = 'Přidat';
	public $ttlEditRow    = 'Editovat řádek';
	public $ttlEditMult   = 'Edit Multiple Rows';
	public $ttlViewRow    = 'View Row';
	public $ttlShowHide   = 'Show/Hide Columns';
	public $ttlOrderCols  = 'Order Columns';
	//function doDefault
	public $errNoAction   = 'Error in program %s action not found.';
	//function doQuery
	public $errQuery      = 'There was an error executing the following query:';
	public $errMysql      = 'mysql said:';
	public $errPdo        = 'PDO error:';
	public $errPdoParams  = 'PDO query params:';
	// function editMultRows
	public $edit1Row      = 'You can only edit 1 row at a time.';
	// function updateRow
	public $errVal        = 'Vyplňte požadovaná pole';
	// function updateRowInPlace
	public $errValInPlace = 'Vyplňte požadovaná pole';
	// function formatIcons
	public $ttlInfo       = 'Info';
	public $ttlEdit       = 'Upravit';
	public $ttlCopy       = 'Duplikovat';
	public $ttlDelete     = 'Smazat';
	// function getAdvancedSearchHtml
	public $lblSelect     = '---';
	// All Buttons
	public $btnBack       = 'Zpět';
	public $btnCancel     = 'Storno';
	public $btnEdit       = 'Editovat';
	public $btnAdd        = 'Přidat nový záznam';
	public $btnUpdate     = 'Uložit';
	public $btnView       = 'Zobrazit';
	public $btnCopy       = 'Duplikovat';
	public $btnDelete     = 'Smazat';
	public $btnExport     = 'Export';
	public $btnSearch     = 'Search';
	public $btnCSearch    = 'Clear Search';
	public $btnASearch    = 'Advanced Search';
	public $btnQSearch    = 'Quick Search';
	public $btnReset      = 'Reset';
	public $btnAddCrit    = 'Add Criteria';
	public $btnShowHide   = 'Show/Hide Columns';
	public $btnOrderCols  = 'Order Columns';
	public $btnCFilters   = 'Clear Filters';
	public $btnFilters    = 'Apply Filters';
	// function displayTableHtml
	public $ttlDispRecs   = 'Zobrazeno <span id="%sstart_rec_num">%s</span> - <span id="%send_rec_num">%s</span> z <span id="%stotal_rec_num">%s</span> záznamů';
	public $ttlDispNoRecs = 'Zobrazeno 0 záznamů';
	public $ttlRecords    = 'záznamů';
	public $ttlNoRecord   = 'No Records Found';
	public $lblSearch     = 'Search';
	public $lblPage       = 'Stránka č.';
	public $lblDisplay    = 'Display #:';
	public $lblMatch      = 'Match:';
	public $lblAllCrit    = 'All Criteria';
	public $lblAnyCrit    = 'Any Criteria';
	// function showHideColumns
	public $ttlColumn     = 'Column';
	public $ttlCheckBox   = 'Display';
	// function handleFileUpload
	public $errFileSize   = 'The %s is too big';
	public $errFileReq   = '%s is a required field';
}
?>
