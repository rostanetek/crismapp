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
	public $language      = 'Spanish';
	public $locales       = array('es_ES.utf8','es_MX.utf8','es_ES','es_MX','es','spanish');
	//Class Common
	public $errNoSelect   = 'Error al conectar a mysql: No podía seleccionar el base de datos %s';
	public $errNoConnect  = 'Error no podía conectar a mysql';
	public $errInScript   = 'Un error ocurrío en script %s en línea %s: %s';
	
	//Class AjaxTableEditor
	//function setDefaults
	public $optLike       = 'Contiene';
	public $optNotLike    = 'No contiene';
	public $optEq         = 'Coincide exactamente';
	public $optNotEq      = 'No coincide exactamente';
	public $optGreat      = 'Mas grande que';
	public $optLess       = 'Menos que';
	public $optGreatEq    = 'Mas grande que o igual';
	public $optLessEq     = 'Menos que o igual';
	
	public $ttlAddRow     = 'Anadir Record';
	public $ttlEditRow    = 'Editar Record';
	public $ttlEditMult   = 'Editar Mutiples Filas';
	public $ttlViewRow    = 'Ver Record';
	public $ttlShowHide   = 'Mostrar/Esconder Columnas';
	public $ttlOrderCols  = 'Ordenar Columnas';
	//function doDefault
	public $errNoAction   = 'Error en programa accion %s no existe.';
	//function doQuery
	public $errQuery      = 'Había un error al ejecutar la siguiente consulta:';
	public $errMysql      = 'mysql dijó:';
	public $errPdo        = 'Error de PDO:';
	public $errPdoParams  = 'PDO parametros:';
	// function editMultRows
	public $edit1Row      = 'Solo se puede editar un registro a la vez.';
	// function updateRow
	public $errVal        = 'Por favor corriga los campos marcados en rojo';
	// function updateRowInPlace
	public $errValInPlace = 'Por favor corrija los siguientes campos';
	// function formatIcons
	public $ttlInfo       = 'Info';
	public $ttlEdit       = 'Editar';
	public $ttlCopy       = 'Copiar';
	public $ttlDelete     = 'Borrar';
	// function getAdvancedSearchHtml
	public $lblSelect     = 'Seleccione uno';
	// All Buttons
	public $btnBack       = 'Atras';
	public $btnCancel     = 'Cancelar';
	public $btnEdit       = 'Editar';
	public $btnAdd        = 'Anadir';
	public $btnUpdate     = 'Guardar';
	public $btnView       = 'Ver';
	public $btnCopy       = 'Copiar';
	public $btnDelete     = 'Borrar';
	public $btnExport     = 'Exportar';
	public $btnSearch     = 'Buscar';
	public $btnCSearch    = 'Quitar Búsqueda';
	public $btnASearch    = 'Búsqueda Avanzada';
	public $btnQSearch    = 'Búsqueda Rápida';
	public $btnReset      = 'Reiniciar'; // Reajustar or Resetear?
	public $btnAddCrit    = 'Anadir Criterio';
	public $btnShowHide   = 'Mostrar/Esconder Columnas';
	public $btnOrderCols  = 'Ordenar Columnas';
	public $btnCFilters   = 'Quitar Filtrós';
	public $btnFilters    = 'Aplicar Filtrós';
	// function displayTableHtml
	public $ttlDispRecs   = 'Mostrando <span id="%sstart_rec_num">%s</span> - <span id="%send_rec_num">%s</span> de <span id="%stotal_rec_num">%s</span> Registros';
	public $ttlDispNoRecs = 'Mostrando 0 Registros';
	public $ttlRecords    = 'Registros';
	public $ttlNoRecord   = 'Ningun Registro Fue Encontrado';
	public $lblSearch     = 'Buscar';
	public $lblPage       = '# De Página:';
	public $lblDisplay    = '# Para Mostrar:';
	public $lblMatch      = 'Coincidir:';
	public $lblAllCrit    = 'Todos Criterios';
	public $lblAnyCrit    = 'Cualquier Criterio';
	// function showHideColumns
	public $ttlColumn     = 'Columna';
	public $ttlCheckBox   = 'Mostrar';
	// function handleFileUpload
	public $errFileSize   = 'The %s was too big';
	public $errFileReq   = '%s is a required field';
}
?>
