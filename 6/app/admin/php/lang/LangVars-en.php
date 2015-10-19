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
	public $language      = 'English';
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
	
	public $ttlAddRow     = 'Add Row';
	public $ttlEditRow    = 'Edit Row';
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
	public $errVal        = 'Please correct the fields in red';
	// function updateRowInPlace
	public $errValInPlace = 'Please correct the following fields';
	// function formatIcons
	public $ttlInfo       = 'Info';
	public $ttlEdit       = 'Edit';
	public $ttlCopy       = 'Copy';
	public $ttlDelete     = 'Delete';
	// function getAdvancedSearchHtml
	public $lblSelect     = 'Select One';
	// All Buttons
	public $btnBack       = 'Back';
	public $btnCancel     = 'Cancel';
	public $btnEdit       = 'Edit';
	public $btnAdd        = 'Add';
	public $btnUpdate     = 'Update';
	public $btnView       = 'View';
	public $btnCopy       = 'Copy';
	public $btnDelete     = 'Delete';
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
	public $ttlDispRecs   = 'Displaying <span id="%sstart_rec_num">%s</span> - <span id="%send_rec_num">%s</span> of <span id="%stotal_rec_num">%s</span> Records';
	public $ttlDispNoRecs = 'Displaying 0 Records';
	public $ttlRecords    = 'Records';
	public $ttlNoRecord   = 'No Records Found';
	public $lblSearch     = 'Search';
	public $lblPage       = 'Page #:';
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
