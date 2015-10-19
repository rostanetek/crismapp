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
	public $language      = 'German';
	public $locales       = array('de_DE.utf8','de_DE','de','german');
	//Class Common
	public $errNoSelect   = 'Fehler bei Datenbank-Verbindung: Datenbank %s nicht gefunden';
	public $errNoConnect  = 'Fehler bei Datenbank-Verbindung: Kann nicht verbinden';
	public $errInScript   = 'Fehler im Skript %s gefunden in Zeile %s: %s';
	
	//Class AjaxTableEditor
	//function setDefaults
	public $optLike       = 'enth&auml;lt';
	public $optNotLike    = 'enth&auml;lt nicht';
	public $optEq         = 'ist gleich';
	public $optNotEq      = 'ist ungleich';
	public $optGreat      = 'ist gr&ouml;sser als';
	public $optLess       = 'ist kleiner als';
	public $optGreatEq    = 'ist gr&ouml;sser gleich';
	public $optLessEq     = 'ist kleiner gleich';
	
	public $ttlAddRow     = 'Datensatz zuf&uuml;gen';
	public $ttlEditRow    = 'Datensatz editieren';
	public $ttlEditMult   = 'Bearbeit mehrerer Zeilen';
	public $ttlViewRow    = 'Datensatz zeigen';
	public $ttlShowHide   = 'zeigen/ausblenden';
	public $ttlOrderCols  = 'Spalten Reihenfolge';
	//function doDefault
	public $errNoAction   = 'Fehler in Programm %s Aktion nicht gefunden.';
	//function doQuery
	public $errQuery      = 'Fehler in der folgenden SQL-Abfrage: ';
	public $errMysql      = 'mySQL Meldung war:';
	public $errPdo        = 'PDO Fehler:';
	public $errPdoParams  = 'PDO parameter:';
	// function editMultRows
	public $edit1Row      = 'Sie können nur 1 Datensatz gleichzeitig ändern';
	// function valError
	public $errVal        = 'Die roten Felder m&uuml;ssen korrigiert werden.';
	// function updateRowInPlace
	public $errValInPlace = 'Bitte korrigieren Sie die folgenden Felder';
	// function formatIcons
	public $ttlInfo       = 'Info';
	public $ttlEdit       = '&auml;ndern';
	public $ttlCopy       = 'kopieren';
	public $ttlDelete     = 'l&ouml;schen';
	// function getAdvancedSearchHtml
	public $lblSelect     = '-Spalte w&auml;hlen-';
	// All Buttons
	public $btnBack       = 'fertig';
	public $btnCancel     = 'abbrechen';
	public $btnEdit       = 'bearbeiten';
	public $btnAdd        = 'zuf&uuml;gen';
	public $btnUpdate     = '&uuml;bernehmen';
	public $btnView       = 'ansehen';
	public $btnCopy       = 'kopieren';
	public $btnDelete     = 'l&ouml;schen';
	public $btnExport     = 'als .csv exportieren';
	public $btnSearch     = 'suchen';
	public $btnCSearch    = 'Suchtext l&ouml;schen';
	public $btnASearch    = 'Multi-Suche';
	public $btnQSearch    = 'einfache Suche';
	public $btnReset      = 'zur&uuml;ck zum Original';
	public $btnAddCrit    = 'weiteres Kriterium';
	public $btnShowHide   = 'Spalten anzeigen/verbergen';
	public $btnOrderCols  = 'Spalten Reihenfolge';
	public $btnCFilters   = 'Filter zurücksetzen';
	public $btnFilters    = 'Filter anwenden';
	// function displayTableHtml
	public $ttlDispRecs   = 'Angezeigt sind die Datensätze <span id="%sstart_rec_num">%s</span> - <span id="%send_rec_num">%s</span> von insgesamt <span id="%stotal_rec_num">%s</span>';
	public $ttlDispNoRecs = 'Keine Datensätze angezeigt';
	public $ttlRecords    = 'Datensätzen';
	public $ttlNoRecord   = 'Keine Datensätze gefunden';
	public $lblSearch     = 'Suchen';
	public $lblPage       = 'Seite Nr: ';
	public $lblDisplay    = 'Anzeige ';
	public $lblMatch      = 'Sucherfolg beim Zutreffen ';
	public $lblAllCrit    = 'aller Kriterien';
	public $lblAnyCrit    = 'einem der Kriterien';
	// function showHideColumns
	public $ttlColumn     = 'Spalte';
	public $ttlCheckBox   = 'Anzeige';
	// function handleFileUpload
	public $errFileSize   = '%s war zu groß';
	public $errFileReq   = '%s ist ein benötigtes Feld';
}
?>
