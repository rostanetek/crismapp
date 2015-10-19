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
	public $language      = 'Brazilian-Portuguese';
	public $locales       = array('pt_BR.utf8','pt_PT.utf8','pt_BR','pt_PT','pt','portuguese');
	//Class Common
	public $errNoSelect   = 'Erro connectando ao mysql: Não foi possível selecionar o banco de dados %s';
	public $errNoConnect  = 'Erro connectando ao mysql: Impossível conectar';
	public $errInScript   = 'Ocorreu um erro no script %s na linha %s: %s';
	
	//Class AjaxTableEditor
	//function setDefaults
	public $optLike       = 'Contém';
	public $optNotLike    = 'Não contém';
	public $optEq         = 'Corresponde exatamente';
	public $optNotEq      = 'Não corresponde exatamente';
	public $optGreat      = 'Maior';
	public $optLess       = 'Menor';
	public $optGreatEq    = 'Maior ou igual a';
	public $optLessEq     = 'Menor ou igual a';
	
	public $ttlAddRow     = 'Inserir Registro';
	public $ttlEditRow    = 'Editar Registro';
	public $ttlEditMult   = 'Editar Multiplos Registros';
	public $ttlViewRow    = 'Detalhar registro';
	public $ttlShowHide   = 'Mostrar/Esconder Colunas';
	public $ttlOrderCols  = 'Ordenar Colunas';
	//function doDefault
	public $errNoAction   = 'Erro no programa  %s action não encontrado.';
	//function doQuery
	public $errQuery      = 'Ocorreu um erro ao executar a consulta a seguir:';
	public $errMysql      = 'Erro do mysql:';
	public $errPdo        = 'PDO erro:';
	public $errPdoParams  = 'PDO parâmetros:';
	// function editMultRows
	public $edit1Row  = 'Você só pode editar 1 linha por vez';
	// function updateRow
	public $errVal        = 'Corrija os campos em vermelho';
	// function updateRowInPlace
	public $errValInPlace = 'Por favor, corrija os seguintes campos';
	// function formatIcons
	public $ttlInfo       = 'Detalhes';
	public $ttlEdit       = 'Editar';
	public $ttlCopy       = 'Copiar';
	public $ttlDelete     = 'Excluir';
	// function getAdvancedSearchHtml
	public $lblSelect     = 'Selecione um';
	// All Buttons
	public $btnBack       = 'Voltar';
	public $btnCancel     = 'Cancelar';
	public $btnEdit       = 'Editar';
	public $btnAdd        = 'Inserir';
	public $btnUpdate     = 'Atualizar';
	public $btnView       = 'Detalhes';
	public $btnCopy       = 'Copiar';
	public $btnDelete     = 'Excluir';
	public $btnExport     = 'Exportar';
	public $btnSearch     = 'Pesquisar';
	public $btnCSearch    = 'Limpar critérios de pesquisa';
	public $btnASearch    = 'Pesquisa avançada';
	public $btnQSearch    = 'Pesquisa rápida';
	public $btnReset      = 'Limpar';
	public $btnAddCrit    = 'Inserir Critério';
	public $btnShowHide   = 'Mostrar/Esconder Colunas';
	public $btnOrderCols  = 'Ordenar Colunas';
	public $btnCFilters   = 'Limpar Filtros';
	public $btnFilters    = 'Aplicar Filtros';
	// function displayTableHtml
	public $ttlDispRecs   = 'Mostrando <span id="%sstart_rec_num">%s</span> - <span id="%send_rec_num">%s</span> of <span id="%stotal_rec_num">%s</span> Registros';
	public $ttlDispNoRecs = 'Mostrando 0 Registros';
	public $ttlRecords    = 'Registros';
	public $ttlNoRecord   = 'Nenhum registro encontrado';
	public $lblSearch     = 'Pesquisa';
	public $lblPage       = 'Página #:';
	public $lblDisplay    = 'Mostrar #:';
	public $lblMatch      = 'Correspondência:';
	public $lblAllCrit    = 'Todos os critérios';
	public $lblAnyCrit    = 'Qualquer critério';
	// function showHideColumns
	public $ttlColumn     = 'Coluna';
	public $ttlCheckBox   = 'Mostrar';
	// function handleFileUpload
	public $errFileSize   = 'O arquivo %s era muito grande';
	public $errFileReq   = '%s é uma campo obrigatório';
}
?>
