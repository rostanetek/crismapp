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
	public $language      = 'Chinese';
	public $locales       = array('zh_CN.utf8','zh_HK.utf8','zh_CN','zh_HK','zh','chinese');
	//Class Common
	public $errNoSelect   = '连接数据库错误：无法选择 % 数据库';
	public $errNoConnect  = '链接数据库错误：无法连接';
	public $errInScript   = '%s 脚本的第 %s 行错误：%s';
	
	//Class AjaxTableEditor
	//function setDefaults
	public $optLike       = '包含';
	public $optNotLike    = '不包含';
	public $optEq         = '完全匹配';
	public $optNotEq      = '完全不匹配';
	public $optGreat      = '大于';
	public $optLess       = '小于';
	public $optGreatEq    = '大于等于';
	public $optLessEq     = '小于等于';
	
	public $ttlAddRow     = '添加记录';
	public $ttlEditRow    = '编辑记录';
	public $ttlEditMult   = '编辑多条记录';
	public $ttlViewRow    = '查看记录';
	public $ttlShowHide   = '显示/隐藏列';
	public $ttlOrderCols  = '列顺序';
	//function doDefault
	public $errNoAction   = '程序 %s 错误：未找到action.';
	//function doQuery
	public $errQuery      = '执行以下查询错误：';
	public $errMysql      = 'mysql 错误：';
	public $errPdo        = 'PDO 错误:';
	public $errPdoParams  = 'PDO 参数:';
	// function editMultRows
	public $edit1Row      = '您同时只能编辑一条记录的数据。';
	// function updateRow
	public $errVal        = '请正确填写红色区域';
	// function updateRowInPlace
	public $errValInPlace = '請更正以下領域';
	// function formatIcons
	public $ttlInfo       = '查看';
	public $ttlEdit       = '编辑';
	public $ttlCopy       = '复制';
	public $ttlDelete     = '删除';
	// function getAdvancedSearchHtml
	public $lblSelect     = '选择查询条件';
	// All Buttons
	public $btnBack       = '返回';
	public $btnCancel     = '放弃';
	public $btnEdit       = '编辑';
	public $btnAdd        = '添加';
	public $btnUpdate     = '更新';
	public $btnView       = '查看';
	public $btnCopy       = '复制';
	public $btnDelete     = '删除';
	public $btnExport     = '导出';
	public $btnSearch     = '查询';
	public $btnCSearch    = '清除查询';
	public $btnASearch    = '高级查询';
	public $btnQSearch    = '快速查询';
	public $btnReset      = '重置';
	public $btnAddCrit    = '添加查询条件';
	public $btnShowHide   = '显示/隐藏列';
	public $btnOrderCols  = '列顺序';
	public $btnCFilters   = '清除过滤器';
	public $btnFilters    = '提交过滤器';
	// function displayTableHtml
	public $ttlDispRecs   = '显示 <span id="%sstart_rec_num">%s</span> - <span id="%send_rec_num">%s</span>，共 <span id="%stotal_rec_num">%s</span> 条记录';
	public $ttlDispNoRecs = '显示 0 条记录';
	public $ttlRecords    = '记录';
	public $ttlNoRecord   = '没有找到记录';
	public $lblSearch     = '查找';
	public $lblPage       = '当前页：';
	public $lblDisplay    = '显示 #:';
	public $lblMatch      = '满足：';
	public $lblAllCrit    = '所有查询条件';
	public $lblAnyCrit    = '任一查询条件';
	// function showHideColumns
	public $ttlColumn     = '列名';
	public $ttlCheckBox   = '是否显示';
	// function handleFileUpload
	public $errFileSize   = '%s 文件太大';
	public $errFileReq    = '%s 是必填项';
}
?>
