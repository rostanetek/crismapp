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
	public $language      = 'French';
	public $locales       = array('fr_FR.utf8','fr_FR','fr','french');
	//Class Common
	public $errNoSelect   = 'Erreur avec sql: erreur de s&eacute;lection de %s';
	public $errNoConnect  = 'Erreur avec sqll: Erreur de connexion avec';
	public $errInScript   = 'Une erreur s\'est produite dans le script %s dans ligne %s: %s';
	
	//Class AjaxTableEditor
	//function setDefaults
	public $optLike       = 'Ressembler';
	public $optNotLike    = 'Non ressembler';
	public $optEq         = '&Eacute;galit&eacute;';
	public $optNotEq      = 'Non &eacute;galit&eacute;';
	public $optGreat      = 'Plus de';
	public $optLess       = 'Moins de';
	public $optGreatEq    = '&Eacute;galit&eacute; ou Plus de';
	public $optLessEq     = '&Eacute;galit&eacute; ou Moins de';
	
	public $ttlAddRow     = 'Ajouter enregistrement';
	public $ttlEditRow    = 'Modifier enregistrement';
	public $ttlEditMult   = 'Modifier plusieurs lignes';
	public $ttlViewRow    = 'Afficher enregistrement';
	public $ttlShowHide   = 'Afficher/Cacher les colonnes';
	public $ttlOrderCols  = 'Ordre les colonnes';
	//function doDefault
	public $errNoAction   = 'Erreur dans le programme %s l\'action ne trouve pas.';
	//function doQuery
	public $errQuery      = 'Il y avait une erreur avec la requ�te suivante: ';
	public $errMysql      = 'mysql rapporte:';
	public $errPdo        = 'PDO erreur:';
	public $errPdoParams  = 'PDO paramètres:';
	// function editMultRows
	public $edit1Row      = 'Vous pouvez modifier seulement 1 ligne à la fois.';
	// function valError
	public $errVal        = 'Les champs en rouge doivent &ecirc;tre corrig&eacute;s.';
	// function updateRowInPlace
	public $errValInPlace = 'S\'il vous plaît corriger les champs suivants';
	// function formatIcons
	public $ttlInfo       = 'Info';
	public $ttlEdit       = 'Modifier';
	public $ttlCopy       = 'Copier';
	public $ttlDelete     = 'Supprimer';
	// function getAdvancedSearchHtml
	public $lblSelect     = 'Selecter';
	// All Buttons
	public $btnBack       = 'Retour';
	public $btnCancel     = 'Annuler';
	public $btnEdit       = 'Modifier';
	public $btnAdd        = 'Ajouter';
	public $btnUpdate     = 'Actualiser';
	public $btnView       = 'Afficher';
	public $btnCopy       = 'Copier';
	public $btnDelete     = 'Supprimer';
	public $btnExport     = 'Exporter';
	public $btnSearch     = 'Rechercher';
	public $btnCSearch    = 'supprimer le recherche';
	public $btnASearch    = 'Recherche avanc&eacute;e';
	public $btnQSearch    = 'Recherche rapide';
	public $btnReset      = 'Défaut';
	public $btnAddCrit    = 'Ajouter des crit&egrave;res';
	public $btnShowHide   = 'Afficher/Cacher les colonnes';
	public $btnOrderCols  = 'Ordre les colonnes';
	public $btnCFilters   = 'Supprimer Filtres';
	public $btnFilters    = 'Appliquer des filtres';
	// function displayTableHtml
	public $ttlDispRecs   = 'Afficher <span id="%sstart_rec_num">%s</span> - <span id="%send_rec_num">%s</span> de <span id="%stotal_rec_num">%s</span> lignes';
	public $ttlDispNoRecs = 'Afficher 0 lignes';
	public $ttlRecords    = 'Lignes';
	public $ttlNoRecord   = 'Ne trouver pas des lignes';
	public $lblSearch     = 'Rechercher';
	public $lblPage       = 'Page nr: ';
	public $lblDisplay    = 'Afficher ';
	public $lblMatch      = 'Correspondre: ';
	public $lblAllCrit    = 'Toutes des crit&egrave;res';
	public $lblAnyCrit    = 'Une des crit&egrave;res';
	// function showHideColumns
	public $ttlColumn     = 'Colonne';
	public $ttlCheckBox   = 'Afficher';
	// function handleFileUpload
	public $errFileSize   = 'Le %s est trop grand';
	public $errFileReq   = '%s est champ obligatoire';
}
?>
