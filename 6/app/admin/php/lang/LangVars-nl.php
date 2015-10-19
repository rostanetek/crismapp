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
	public $language      = 'Dutch';
	public $locales       = array('nl_NL.utf8','nl_NL','nl','dutch');
	//Class Common
	public $errNoSelect   = 'Fout in sql: Selectie fout met %s database';
	public $errNoConnect  = 'Fout in sql: Connectie fout met';
	public $errInScript   = 'Een fout is opgetreden in script %s in regel %s: %s';
	
	//Class AjaxTableEditor
	//function setDefaults
	public $optLike       = 'Bevat';
	public $optNotLike    = 'Bevat niet';
	public $optEq         = 'Exact gelijk';
	public $optNotEq      = 'Niet exact gelijk';
	public $optGreat      = 'Groter dan';
	public $optLess       = 'Kleiner dan';
	public $optGreatEq    = 'Gelijk of Groter dan';
	public $optLessEq     = 'Gelijk of Kleiner dan';
	
	public $ttlAddRow     = 'Toevoegen Rij';
	public $ttlEditRow    = 'Bewerk Rij';
	public $ttlEditMult   = 'Bewerk meerdere rijen';
	public $ttlViewRow    = 'Bekijk Rij';
	public $ttlShowHide   = 'Show/Verberg Kolommen';
	public $ttlOrderCols  = 'Kolom volgorde';
	//function doDefault
	public $errNoAction   = 'Fout in programma %s actie niet gevonden.';
	//function doQuery
	public $errQuery      = 'Er is een fout opgetreden met de volgende query: ';
	public $errMysql      = 'mysql rapporteerd:';
	public $errPdo        = 'PDO fout:';
	public $errPdoParams  = 'PDO parameters:';
	// function editMultRows
	public $edit1Row      = 'Je kan slechts 1 rij per keer bewerken.';
	// function valError
	public $errVal        = 'De rode velden dienen gecorrigeerd te worden.';
	// function updateRowInPlace
	public $errValInPlace = 'Corrigeer de volgende velden';
	// function formatIcons
	public $ttlInfo       = 'Info';
	public $ttlEdit       = 'Bewerk';
	public $ttlCopy       = 'Kopi&euml;er';
	public $ttlDelete     = 'Verwijder';
	// function getAdvancedSearchHtml
	public $lblSelect     = 'Selecteer';
	// All Buttons
	public $btnBack       = 'Terug';
	public $btnCancel     = 'Annuleer';
	public $btnEdit       = 'Bewerk';
	public $btnAdd        = 'Toevoegen';
	public $btnUpdate     = 'Vernieuwen';
	public $btnView       = 'Bekijk';
	public $btnCopy       = 'Kopi&euml;er';
	public $btnDelete     = 'Verwijder';
	public $btnExport     = 'Exporteer';
	public $btnSearch     = 'Zoeken';
	public $btnCSearch    = 'Zoeken verwijderen';
	public $btnASearch    = 'Uitgebreid zoeken';
	public $btnQSearch    = 'Snel Zoeken';
	public $btnReset      = 'Default';
	public $btnAddCrit    = 'Toevoegen Criteria';
	public $btnShowHide   = 'Show/Verberg Kolommen';
	public $btnOrderCols  = 'Order Kolommen';
	public $btnCFilters   = 'Verwijder filters';
	public $btnFilters    = 'Toepassen filters';
	// function displayTableHtml
	public $ttlDispRecs   = 'In beeld <span id="%sstart_rec_num">%s</span> - <span id="%send_rec_num">%s</span> van <span id="%stotal_rec_num">%s</span> Rijen';
	public $ttlDispNoRecs = 'In beeld 0 Rijen';
	public $ttlRecords    = 'Rijen';
	public $ttlNoRecord   = 'Geen rijen gevonden';
	public $lblSearch     = 'Zoeken';
	public $lblPage       = 'Pagina nr: ';
	public $lblDisplay    = 'In beeld ';
	public $lblMatch      = 'Match: ';
	public $lblAllCrit    = 'Alle Criteria';
	public $lblAnyCrit    = 'E&eacute;n van de Criteria';
	// function showHideColumns
	public $ttlColumn     = 'Kolom';
	public $ttlCheckBox   = 'Display';
	// function handleFileUpload
	public $errFileSize   = 'De %s was te groot';
	public $errFileReq   = '%s is een verplicht veld';
}
?>
