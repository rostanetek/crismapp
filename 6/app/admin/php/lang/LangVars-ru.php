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
	public $language      = 'Russian';
	public $locales       = array('ru_RU.utf8','ru_RU','ru','russian');
	//Class Common
	public $errNoSelect   = 'Ошибка при подключении к mysql: невозможно выбрать базу данных %s';
	public $errNoConnect  = 'Ошибка при подключении к mysql: невозможно установить соединение';
	public $errInScript   = 'Ошибка в скрипте %s на строке  %s: %s';
	
	//Class AjaxTableEditor
	//function setDefaults
	public $optLike       = 'Содержит';
	public $optNotLike    = 'Не содержит';
	public $optEq         = 'Равно';
	public $optNotEq      = 'Не равно';
	public $optGreat      = 'Больше чем';
	public $optLess       = 'Меньше чем';
	public $optGreatEq    = 'Больше или равно';
	public $optLessEq     = 'Меньше или равно';
	
	public $ttlAddRow     = 'Добавить строку';
	public $ttlEditRow    = 'Редактировать строку';
	public $ttlEditMult   = 'Редактировать несколько строк';
	public $ttlViewRow    = 'Просмотреть строку';
	public $ttlShowHide   = 'Показать/скрыть столбцы';
	public $ttlOrderCols  = 'Порядок столбцов';
	//function doDefault
	public $errNoAction   = 'Ошибка в программе. Действие %s не найдено.';
	//function doQuery
	public $errQuery      = 'Произошла ошибка при выполнении следующего запроса:';
	public $errMysql      = 'Сообщение mysql:';
	public $errPdo        = 'PDO ошибка:';
	public $errPdoParams  = 'PDO параметры:';
	// function editMultRows
	public $edit1Row      = 'Вы можете редактировать только одну строку за раз.';
	// function updateRow
	public $errVal        = 'Пожалуйста исправьте поля выделенные  красным цветом';
	// function updateRowInPlace
	public $errValInPlace = 'Пожалуйста, исправьте следующие поля';
	// function formatIcons
	public $ttlInfo       = 'Информация';
	public $ttlEdit       = 'Редактировать';
	public $ttlCopy       = 'Копировать';
	public $ttlDelete     = 'Удалить';
	// function getAdvancedSearchHtml
	public $lblSelect     = 'Выберите';
	// All Buttons
	public $btnBack       = 'Назад';
	public $btnCancel     = 'Отменить';
	public $btnEdit       = 'Редактировать';
	public $btnAdd        = 'Добавить';
	public $btnUpdate     = 'Обновить';
	public $btnView       = 'Просмотреть';
	public $btnCopy       = 'Копировать';
	public $btnDelete     = 'Удалить';
	public $btnExport     = 'Экспортировать';
	public $btnSearch     = 'Поиск';
	public $btnCSearch    = 'Очистить поиск';
	public $btnASearch    = 'Расширенный поиск';
	public $btnQSearch    = 'Быстрый поиск';
	public $btnReset      = 'Сбросить';
	public $btnAddCrit    = 'Добавить критерий';
	public $btnShowHide   = 'Показать/скрыть столбцы';
	public $btnOrderCols  = 'Порядок столбцов';
	public $btnCFilters   = 'Очистить фильтры';
	public $btnFilters    = 'Применить фильтры';
	// function displayTableHtml
	public $ttlDispRecs   = 'Отображается <span id="%sstart_rec_num">%s</span> - <span id="%send_rec_num">%s</span> из <span id="%stotal_rec_num">%s</span> записей';
	public $ttlDispNoRecs = 'Отображается 0 записей';
	public $ttlRecords    = 'Записи';
	public $ttlNoRecord   = 'Записей не найдено';
	public $lblSearch     = 'Поиск';
	public $lblPage       = 'Страница #:';
	public $lblDisplay    = 'Отображение #:';
	public $lblMatch      = 'Совпадает:';
	public $lblAllCrit    = 'Все критерии';
	public $lblAnyCrit    = 'Любой критерий';
	// function showHideColumns
	public $ttlColumn     = 'Столбец';
	public $ttlCheckBox   = 'Отображение';
	// function handleFileUpload
	public $errFileSize   = 'The %s was too big';
	public $errFileReq   = '%s is a required field';
}
?>
