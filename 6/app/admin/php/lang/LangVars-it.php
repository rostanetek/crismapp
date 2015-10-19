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
	public $language      = 'Italian';
	public $locales       = array('it_IT.utf8','it_IT','it','italian');
	//Class Common
	public $errNoSelect   = 'Errore in connessione MySql: impossibile selezionare il database %s';
	public $errNoConnect  = 'Errore in connessione MySql: impossibile connettere il server';
	public $errInScript   = '&Egrave; avvenuto un errore nello script %s alla linea %s: %s';
	
	//Class AjaxTableEditor
	//function setDefaults
	public $optLike       = 'Contiene';
	public $optNotLike    = 'Non Contiene';
	public $optEq         = 'Esattamente uguale a';
	public $optNotEq      = 'Differente da';
	public $optGreat      = 'Maggiore di';
	public $optLess       = 'Minore di';
	public $optGreatEq    = 'Maggiore o uguale a';
	public $optLessEq     = 'Minore o uguale a';
	
	public $ttlAddRow     = 'Aggiungi riga';
	public $ttlEditRow    = 'Modifica Riga';
	public $ttlEditMult   = 'Modifica pi&ugrave; righe';
	public $ttlViewRow    = 'Visualizza riga';
	public $ttlShowHide   = 'Mostra/Cela Colonne';
	public $ttlOrderCols  = 'Ordina Colonne';
	//function doDefault
	public $errNoAction   = 'Errore nel programma %s azione non trovata';
	//function doQuery
	public $errQuery      = 'Errore durante l\'esecuzione della query seguente:';
	public $errMysql      = 'Messaggio mysql:';
	public $errPdo        = 'PDO errore:';
	public $errPdoParams  = 'PDO parametri:';
	// function editMultRows
	public $edit1Row      = 'Puoi modificare solo una riga per volta.';
	// function updateRow
	public $errVal        = 'I campi in rosso devono essere corretti';
	// function updateRowInPlace
	public $errValInPlace = 'Si prega di correggere i seguenti campi';
	// function formatIcons
	public $ttlInfo       = 'Info';
	public $ttlEdit       = 'Modifica';
	public $ttlCopy       = 'Copia';
	public $ttlDelete     = 'Cancella';
	// function getAdvancedSearchHtml
	public $lblSelect     = 'Seleziona il campo desiderato';
	// All Buttons
	public $btnBack       = 'Indietro';
	public $btnCancel     = 'Annulla';
	public $btnEdit       = 'Modifica';
	public $btnAdd        = 'Aggiungi';
	public $btnUpdate     = 'Aggiorna';
	public $btnView       = 'Visualizza';
	public $btnCopy       = 'Copia';
	public $btnDelete     = 'Cancella';
	public $btnExport     = 'Esporta';
	public $btnSearch     = 'Cerca';
	public $btnCSearch    = 'Fine ricerca';
	public $btnASearch    = 'Ricerca Avanzata';
	public $btnQSearch    = 'Ricerca Veloce';
	public $btnReset      = 'Reset';
	public $btnAddCrit    = 'Aggiungi Condizioni';
	public $btnShowHide   = 'Mostra/Cela Colonne';
	public $btnOrderCols  = 'Ordina Colonne';
	public $btnCFilters   = 'Annulla Filtri';
	public $btnFilters    = 'Applica Filtri';
	// function displayTableHtml
	public $ttlDispRecs   = 'Visualizzazione <span id="%sstart_rec_num">%s</span> - <span id="%send_rec_num">%s</span> di <span id="%stotal_rec_num">%s</span> Righe';
	public $ttlDispNoRecs = 'Visualizza 0 Righe';
	public $ttlRecords    = 'Righe';
	public $ttlNoRecord   = 'Non Sono Stati Trovati Record';
	public $lblSearch     = 'Cerca';
	public $lblPage       = 'Pag. n.:';
	public $lblDisplay    = 'Visualizzazione n.:';
	public $lblMatch      = 'Le condizioni devono essere verificate:';
	public $lblAllCrit    = 'Simultaneamente (AND)';
	public $lblAnyCrit    = 'Singolarmente (OR)';
	// function showHideColumns
	public $ttlColumn     = 'Colonna';
	public $ttlCheckBox   = 'Visualizza';
	// function handleFileUpload
	public $errFileSize   = '%s era troppo grande';
	public $errFileReq   = '%s &egrave; un campo necessario';
}
?>
