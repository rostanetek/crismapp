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

class AjaxTableEditor
{
	public $DBC;
	public $action;
	public $retArr = array();
	public $warnings = array();
	public $html;
	public $numResults;
	//public $instanceName;
	public $start;
	public $display;
	public $orderByColumn;
	public $ascOrDesc;
	public $searchString;
	public $selectClause;
	public $joinClause;
	public $whereClause;
	public $groupByClause;
	public $havingClause;
	public $queryParams = array();
	public $dbName;
	public $tableColumns = array();
	public $tableName;
	public $varPrefix;
	public $primaryKeyCol;
	public $userColumns = array();
	public $errorFun;
	public $permissions;
	public $tableTitle;
	public $valError;
	public $addRowTitle;
	public $editRowTitle;
	public $editMultTitle;
	public $viewRowTitle;
	public $showHideTitle;
	public $orderColTitle;
	public $searchType;
	public $numAdvSearches;
	public $opts;
	public $matchAll;
	public $advSearches = array();
	public $defNumAdvSearches;
	public $afterAddFun;
	public $afterEditFun;
	public $afterCopyFun;
	public $afterDeleteFun;
	public $extraOrderByInfo;
	public $information = array();
	public $userButtons = array();
	public $userIcons = array();
	public $tableInfo;
	//public $oddRowColor;
	//public $evenRowColor;
	public $userDefDisplay;
	public $displayNumInc;
	public $dbAndTable;
	public $maxDispNum;
	public $beginTime;
	public $viewQuery;
	public $recordInfo;
	public $replaceWithId;
	public $useHightlight;
	public $userActions = array();
	public $reqMarker;
	public $viewTableInfo;
	public $editTableInfo;
	public $addTableInfo;
	public $showHideTableInfo;
	public $addScreenFun;
	public $editScreenFun;
	public $viewScreenFun;
	public $tableScreenFun;
	public $showHideScreenFun;
	public $orderColScreenFun;
	public $valErrorStyles;
	public $noValErrorStyles;
	public $iconColPosition;
	public $mateUserId;
	public $pagePercent;
	public $pageRange;
	public $pageBegin;
	public $pageEnd;
	public $showAll;
	public $queryLineBreak;
	public $viewHtmlFun;
	public $handleHackingFun;
	public $removeIcons;
	public $langVars;
	public $iconTitle;
	public $sqlFilters;
	public $havingFilters;
	public $allowEditMult;
	public $disableMultCbFun;
	public $extraRowInfo;
	public $filterSearches;
	public $filterColId;
	public $asColumnInfo;
	public $paginationLinks;
	public $sessionData;
	public $sessionVars = array();
	public $data;
	public $modifyRowSets;
	public $customJoin;
	public $exportDelimiter;
	public $exportLineBreak;
	public $instanceName;
	public $valErrorFields;
	public $removeCriteria;
	public $delayedJs = array();
	public $hiddenColumnsSet = false;
	protected $encKey = 'c4j9803f90riepals';
	public $columnTotals = array();
	public $columnAverages = array();
	public $numPages = 0;
	public $convertRangeDates;
	public $defaultDbDateFormat;
	public $defaultTableClass;
	public $mysqlFunReplaceStr;
	public $numValErrors = 0;
	public $replaceWithRowNumStr;
	public $filterPosition;
	public $displayFilterBtns;
	public $tooltipMsgs = array();
	public $tooltipMsgFadeTime = 'null';
	public $showDefaultValidationMsg = true;
	public $userInsertFun;
	public $userUpdateFun;
	public $userDeleteFun;
	public $oldPrimaryKeyValue;
	public $escapeHtml = false;
	
	public function setDefaults()
	{
		// Load session data
		$this->loadSessionData();
		// Set session variables
		$this->displayNum = isset($this->sessionData['displayNum']) ? $this->sessionData['displayNum'] : 50;
		$this->defNumAdvSearches = isset($this->defNumAdvSearches) ? $this->defNumAdvSearches : 3;
		$this->numAdvSearches = isset($this->sessionData['numAdvSearches']) ? $this->sessionData['numAdvSearches'] : $this->defNumAdvSearches;
		$this->searchType = isset($this->sessionData['searchType']) ? $this->sessionData['searchType'] : 'quick';
		$this->searchString = isset($this->sessionData['searchString']) ? $this->sessionData['searchString'] : '';
		$this->matchAll = isset($this->sessionData['matchAll']) ? $this->sessionData['matchAll'] : true;
		$this->advSearches = isset($this->sessionData['advSearches']) ? $this->sessionData['advSearches'] : array();
		$this->filterSearches = isset($this->sessionData['filterSearches']) ? $this->sessionData['filterSearches'] : array();
		// Arrays
		$this->warnings = array();
		$this->sessionVars = array('numAdvSearches','searchType','matchAll','advSearches','filterSearches','displayNum','searchType','searchString','orderByColumn','ascOrDesc');
		$this->opts = array('like' => $this->langVars->optLike, 'not like' => $this->langVars->optNotLike, '=' => $this->langVars->optEq, '<>' => $this->langVars->optNotEq, '>' => $this->langVars->optGreat, '<' => $this->langVars->optLess, '>=' => $this->langVars->optGreatEq, '<=' => $this->langVars->optLessEq);
		$this->userActions = count($this->userActions) > 0 ? $this->userActions : array();
		// Other
		$this->dbAndTable = isset($this->dbName) ? $this->dbName.'.'.$this->tableName : $this->tableName;
		$this->start = isset($this->start) ? $this->start : 0;
		$this->ascOrDesc = isset($this->ascOrDesc) ? $this->ascOrDesc : 'asc';
		$this->orderByColumn = isset($this->orderByColumn) ? $this->orderByColumn : $this->addTickMarks($this->primaryKeyCol);
		$this->tableTitle = isset($this->tableTitle) ? $this->tableTitle : mb_convert_case(str_replace('_',' ',$this->tableName),MB_CASE_TITLE, "UTF-8");
		$this->valError = isset($this->valError) ? $this->valError : false;
		$this->addRowTitle = isset($this->addRowTitle) ? $this->addRowTitle : $this->langVars->ttlAddRow;
		$this->editRowTitle = isset($this->editRowTitle) ? $this->editRowTitle : $this->langVars->ttlEditRow;
		$this->editMultTitle = isset($this->editMultTitle) ? $this->editMultTitle : $this->langVars->ttlEditMult;
		$this->viewRowTitle = isset($this->viewRowTitle) ? $this->viewRowTitle : $this->langVars->ttlViewRow;
		//$this->oddRowColor = isset($this->oddRowColor) ? $this->oddRowColor : '#FFFFFF';
		//$this->evenRowColor = isset($this->evenRowColor) ? $this->evenRowColor : '#EDEDED';
		$this->userDefDisplay = isset($this->userDefDisplay) ? $this->userDefDisplay : false;
		$this->displayNumInc = isset($this->displayNumInc) ? $this->displayNumInc : 5;
		$this->maxDispNum = isset($this->maxDispNum) ? $this->maxDispNum : 200;
		//$this->instanceName = isset($this->instanceName) ? $this->instanceName : '';
		$this->viewQuery = isset($this->viewQuery) ? $this->viewQuery : false;
		$this->recordInfo = isset($this->recordInfo) ? $this->recordInfo : true;
		$this->replaceWithId = isset($this->replaceWithId) ? $this->replaceWithId : '#primaryColValue#';
		$this->useHighlight = isset($this->useHighlight) ? $this->useHighlight : true;
		$this->reqMarker = isset($this->reqMarker) ? $this->reqMarker : '*';
		$this->defaultTableClass = isset($this->defaultTableClass) ? $this->defaultTableClass : 'mateTable';
		$this->tableInfo = isset($this->tableInfo) ? $this->tableInfo : 'class="'.$this->defaultTableClass.'"';
		$this->viewTableInfo = isset($this->viewTableInfo) ? $this->viewTableInfo : 'class="'.$this->defaultTableClass.'"';
		$this->editTableInfo = isset($this->editTableInfo) ? $this->editTableInfo : 'class="'.$this->defaultTableClass.'"';
		$this->addTableInfo = isset($this->addTableInfo) ? $this->addTableInfo : 'class="'.$this->defaultTableClass.'"';
		$this->showHideTableInfo = isset($this->showHideTableInfo) ? $this->showHideTableInfo : 'class="'.$this->defaultTableClass.'"';
		$this->valErrorStyles = isset($this->valErrorStyles) ? $this->valErrorStyles : array('color' => '#f90d0d');
		$this->noValErrorStyles = isset($this->noValErrorStyles) ? $this->noValErrorStyles : array('color' => '#333');
		$this->iconColPosition = isset($this->iconColPosition) ? $this->iconColPosition : 'last';
		$this->showHideTitle = isset($this->showHideTitle) ? $this->showHideTitle : $this->langVars->ttlShowHide;
		$this->orderColTitle = isset($this->orderColTitle) ? $this->orderColTitle : $this->langVars->ttlOrderCols;
		$this->pagePercent = isset($this->pagePercent) ? $this->pagePercent : 20;
		$this->pageRange = isset($this->pageRange) ? $this->pageRange : 10;
		$this->pageBegin = isset($this->pageBegin) ? $this->pageBegin : 5;
		$this->pageEnd = isset($this->pageEnd) ? $this->pageEnd : 5;
		$this->showAll = isset($this->showAll) ? $this->showAll : 200;
		$this->queryLineBreak = isset($this->queryLineBreak) ? $this->queryLineBreak : "\n";
		$this->allowEditMult = isset($this->allowEditMult) ? $this->allowEditMult : true;
		$this->paginationLinks = isset($this->paginationLinks) ? $this->paginationLinks : false;
		$this->exportDelimiter = isset($this->exportDelimiter) ? $this->exportDelimiter : ',';
		$this->exportLineBreak = isset($this->exportLineBreak) ? $this->exportLineBreak : "\r\n";
		$this->instanceName = isset($this->instanceName) ? $this->instanceName : 'mate1_';
		$this->removeCriteria = isset($this->removeCriteria) ? $this->removeCriteria : false;
		$this->convertRangeDates = isset($this->convertRangeDates) ? $this->convertRangeDates : true;
		$this->defaultDbDateFormat = isset($this->defaultDbDateFormat) ? $this->defaultDbDateFormat : 'Y-m-d H:i:s';
		$this->varPrefix = isset($this->varPrefix) ? $this->varPrefix : md5($this->instanceName.'-'.$this->primaryKeyCol.'-'.$this->tableName.'-'.$_SERVER['PHP_SELF']);
		$this->mysqlFunReplaceStr = isset($this->mysqlFunReplaceStr) ? $this->mysqlFunReplaceStr : '#VALUE#';
		$this->replaceWithRowNumStr = isset($this->replaceWithRowNumStr) ? $this->replaceWithRowNumStr : '#mateRowNum#';
		$this->filterPosition = isset($this->filterPosition) ? $this->filterPosition : 'bottom';
		$this->displayFilterBtns = isset($this->displayFilterBtns) ? $this->displayFilterBtns : true;
		$this->tooltipMsgs = isset($this->tooltipMsgs) ? $this->tooltipMsgs : array();
		//var_dump($this->instanceName.'-'.$this->primaryKeyCol.'-'.$this->tableName.'-'.$_SERVER['PHP_SELF']);
		//var_dump($this->varPrefix);
	}
	
	public function setConfig($var,$val)
	{
		if(!isset($this->sessionData[$var]))
		{
			if(in_array($var,$this->sessionVars,true))
			{
				$this->sessionData[$var] = $val;
			}
			else
			{
				$this->{$var} = $val;
			}
		}
	}
	
	public function doDefault()
	{
		if(isset($this->userActions[$this->action]) && is_callable($this->userActions[$this->action]))
		{
			call_user_func($this->userActions[$this->action],$this->info,$this->instanceName);
		}
		else
		{
			$this->warnings[] = sprintf($this->langVars->errNoAction,$this->action);
		}
	}
	
	public function displayInformation()
	{
		if(!empty($this->information))
		{
			//$this->setInnerHtml('information',implode('<br /><br />',$this->information));
			$this->setInnerHtml('information',implode('<br /><br />',$this->information));
		}	
	}
	
	public function setInnerHtml($layerId,$html)
	{
		$this->retArr[] = array('layer_id' => '#'.$this->instanceName.$layerId, 'where' => 'innerHTML', 'value' => $html);
	}
	
	public function replaceHtml($layerId,$value)
	{
		$this->retArr[] = array('layer_id' => '#'.$this->instanceName.$layerId, 'where' => 'replace', 'value' => $value);
	}
	
	public function setHtmlValue($layerId,$value)
	{
		$this->retArr[] = array('layer_id' => '#'.$this->instanceName.$layerId, 'where' => 'value', 'value' => $value);
	}
	
	public function addJavascript($javascript,$delay=0)
	{
		if($delay > 0)
		{
			$this->delayedJs[$delay][] = $javascript;
		}
		else
		{
			$this->retArr[] = array('where' => 'javascript', 'value' => $javascript);
		}
	}
	
	public function displayWarnings()
	{
		if(!empty($this->warnings))
		{
			$this->addJavascript('alert(\''.implode('\n',$this->warnings).'\');');	
		}
	}
	
	public function loadDelayedJs()
	{
		$delayedJs = array();
		for($i = 1; $i <= 3; $i++)
		{
			if(isset($this->delayedJs[$i]))
			{
				$delayedJs = array_merge($delayedJs,$this->delayedJs[$i]);
			}
		}
		//var_dump($delayedJs);
		if(count($delayedJs) > 0)
		{
			$this->retArr[] = array('where' => 'javascript', 'value' => implode("\n",$delayedJs));
		}
	}
	
	public function addTooltipMsg($msgHtml,$msgType='error',$msgFadeTime='null')
	{
		$this->tooltipMsgs[] = array('html' => $msgHtml, 'type' => $msgType, 'fade_time' => $msgFadeTime);
	}
	
	public function displayTooltips()
	{
		foreach($this->tooltipMsgs as $msgInfo)
		{
			$this->addJavascript($this->instanceName.'.showTooltipMsg("'.$this->escapeJsData($msgInfo['html']).'","'.$msgInfo['type'].'",'.$msgInfo['fade_time'].');');
		}
	}
	
	public function doQuery($query,$queryParams=array())
	{
		try
		{
			if(count($queryParams) > 0)
			{
				$stmt = DBC::get()->prepare($query);
				$stmt->execute($queryParams);
				return $stmt;
			}
			else
			{
				return DBC::get()->query($query);
			}
		}
		catch(PDOException $e)
		{
			$queryParamStrArr = array();
			foreach($queryParams as $key => $val)
			{
				$queryParamStrArr[] = $key.' => '.DBC::get()->quote($val);
			}
			$queryParamStr = count($queryParamStrArr) > 0 ? $this->langVars->errPdoParams.' '.implode(', ',$queryParamStrArr).'<br /><br /> ' : '';
			//var_dump($e->getMessage());
			$message = '<br /><br  />'.$this->langVars->errQuery.' <br />'.$query.'<br /><br />'.$queryParamStr.$this->langVars->errPdo.'<br /> "'.$e->getMessage().'" on line: '.$e->getLine();
			$trace = $e->getTrace();
			//var_dump($trace);
			call_user_func($this->errorFun,$message,$trace[1]['file'],$trace[1]['line'],$this->instanceName);
			return false;
		}
	}
	
	public function getPdoQuotedArr($arr)
	{
		$pdoQuotedArr = array();
		foreach($arr as $val) 
		{
			$pdoQuotedArr[] = DBC::get()->quote($val);
		}
		return $pdoQuotedArr;
	}
	
	public function escapeJsData($data)
	{
		return str_replace(array("\r","\n"),array('\r','\n'),addslashes($data));
	}
	
	public function encryptData($value)
	{
	   $text = $value;
	   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
	   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	   $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->encKey, $text, MCRYPT_MODE_ECB, $iv);
	   return bin2hex($crypttext);
	}
	
	public function decryptData($value)
	{
	   if(!empty($value))
	   {
		   $crypttext = $this->hex2bin($value);
		   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
		   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		   $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->encKey, $crypttext, MCRYPT_MODE_ECB, $iv);
		   return trim($decrypttext);
		}
		else
		{
			return '';
		}
	}	
	
	public function hex2bin($data)
	{
		$len = strlen($data);
		return pack("H" . $len, $data);
	}
	
	public function startTimer()
	{
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$this->beginTime = $time;
	}
	
	public function endTimer()
	{
		$time = microtime();
		$time = explode(' ', $time);
		$time = $time[1] + $time[0];
		$endtime = $time;
		$totaltime = ($endtime - $this->beginTime);
		$this->information[] = $totaltime;
	}
	
	public function loadSessionData()
	{
		if(isset($this->data['sessionData']))
		{
			$this->sessionData = $this->jsonDecode(base64_decode($this->data['sessionData']),true);
		}
	}

	public function storeSessionData()
	{
		$this->addJavascript($this->instanceName.'.storeSessionData(\''.base64_encode($this->jsonEncode($this->sessionData)).'\');');
	}
	
	public function jsonDecode($data,$convertToArray=false)
	{
		if(function_exists('json_decode'))
		{
			$data = json_decode($data,$convertToArray);
		}
		else
		{
			require_once('JSON.php');
			$initParam = $convertToArray ? SERVICES_JSON_LOOSE_TYPE : '';
			$js = new Services_JSON($initParam);
			$data = $js->decode($data);
		}
		return $data;
	}
	
	public function jsonEncode($data)
	{
		if(function_exists('json_encode'))
		{
			$data = json_encode($data);
		}
		else
		{
			require_once('JSON.php');
			$js = new Services_JSON();
			$data = $js->encode($data);
		}
		return $data;
	}
	
	public function main()
	{
		//$this->startSession();
		//$this->mysqlConnect();
		//$this->checkLoginInfo(array('Admin'));
		//$this->startTimer();
		$this->action = $this->data['action'];
		$this->info = $this->data['info'];
		$this->handleFlow();
		//$this->endTimer();
		$this->displayInformation();
		$this->displayWarnings();
		$this->loadDelayedJs();
		$this->displayTooltips();
		$this->storeSessionData();
		echo $this->jsonEncode($this->retArr);
	}
	
	public function handleFlow()
	{
		switch ($this->action)
		{
			case 'clear_filters':
				$this->sessionData['filterSearches'] = array();
				$this->filterSearches = array();
				$this->updateHtml();
				break;
			case 'handle_filter_search':
				$this->handleFilterSearch();
				break;
			case 'update_mult_rows':
				$this->updateMultRows();
				break;
			case 'edit_mult_rows':
				$this->editMultRows();
				break;
			case 'reset_column_order':
				$this->resetColumnOrder();
				break;
			case 'update_column_order':
				$this->updateColumnOrder();
				break;
			case 'order_columns_screen':
				$this->orderColumnsScreen();
				break;
			case 'show_column':
				$this->showColumn();
				break;
			case 'hide_column':
				$this->hideColumn();
				break;
			case 'update_hidden_columns':
				$this->updateHiddenColumns();
				break;
			case 'show_hide_columns':
				$this->showHideColumns();
				break;
			case 'view_row':
				$this->viewRow();
				break;
			case 'update_row':
				$this->updateRow();
				break;
			case 'edit_row':
				$this->editRow();
				break;
			case 'delete_rows':
				$this->deleteRows();
				break;
			case 'update_html':
				$this->updateHtml();
				break;
			case 'handle_search':
				$this->sessionData['searchType'] = 'quick';
				$this->searchType = 'quick';
				$this->searchString = $this->info;
				$this->sessionData['searchString'] = $this->info;
				$this->sessionData['start'] = 0;
				$this->updateHtml();
				//$this->addJavascript("resetScrollTop();");
				break;
			case 'page_num_changed':
				$this->sessionData['start'] = $this->info;
				$this->updateHtml();
				break;
			case 'display_num_changed':
				$this->displayNum = $this->info;
				$this->sessionData['displayNum'] = $this->displayNum;
				$this->sessionData['start'] = 0;
				$this->updateHtml();
				//$this->addJavascript($this->instanceName.'.resetScrollTop();');
				break;
			case 'order_by_changed':
				//$this->sessionData['orderByColumn'] = $this->info[0];
				//$this->sessionData['orderByColumn'] = isset($this->tableColumns[$this->info[0]]['order_mask']) ? $this->tableColumns[$this->info[0]]['order_mask'] : $this->addTickMarks($this->info[0]);
				$this->sessionData['orderByColumn'] = isset($this->tableColumns[$this->info[0]]) ? $this->info[0] : $this->primaryKeyCol;
				//var_dump($info->info[0]);
				$this->sessionData['ascOrDesc'] = $this->info[1];
				$this->updateHtml();
				break;
			case 'add_row':
				$this->addRow();
				break;
			case 'insert_row':
				$this->insertRow();
				break;
			case 'show_advanced_search':
				$this->sessionData['numAdvSearches'] = $this->defNumAdvSearches;
				$this->numAdvSearches = $this->defNumAdvSearches;
				$this->sessionData['searchString'] = '';
				$this->searchString = '';
				$this->sessionData['searchType'] = 'advanced';
				$this->searchType = 'advanced';
				$this->updateHtml();
				break;
			case 'show_quick_search':
				$this->sessionData['advSearches'] = array();
				$this->advSearches = array();
				$this->sessionData['searchType'] = 'quick';
				$this->searchType = 'quick';
				$this->updateHtml();
				break;
			case 'advanced_search':
				$this->sessionData['searchType'] = 'advanced';
				$this->searchType = 'advanced';
				$this->advancedSearch();
				$this->updateHtml();
				//$this->addJavascript("resetScrollTop();");
				break;	
			case 'match_all':
				$this->sessionData['matchAll'] = true;
				break;
			case 'match_any':
				$this->sessionData['matchAll'] = false;
				break;
			case 'clear_adv_search':
				$this->sessionData['matchAll'] = true;
				$this->matchAll = true;
				$this->sessionData['numAdvSearches'] = $this->defNumAdvSearches;
				$this->numAdvSearches = $this->defNumAdvSearches;
				$this->sessionData['advSearches'] = array();
				$this->advSearches = array();
				$this->updateHtml();
				break;
			case 'copy_rows':
				$this->copyRows();
				//$this->updateHtml();
				break;
			case 'user_icon_clicked':
				$this->userIconClicked();
				break;
			case 'user_button_clicked':
				$this->userButtonClicked();
				break;
			default :
				$this->doDefault();
		}
	}
	
	public function handleFilterSearch()
	{
		//var_dump($this->info);
		foreach($this->info['filters'] as $filterInfo)
		{
			if(strlen($filterInfo['filterStr']) > 0)
			{
				$this->sessionData['filterSearches'][$filterInfo['filterCol']] = $filterInfo['filterStr'];
			}
			else if(isset($this->sessionData['filterSearches'][$filterInfo['filterCol']]))
			{
				unset($this->sessionData['filterSearches'][$filterInfo['filterCol']]);
			}
		}
		$this->filterSearches = isset($this->sessionData['filterSearches']) ? $this->sessionData['filterSearches'] : array();
		$this->sessionData['start'] = 0;
		$this->updateHtml();
		if(isset($this->info['currentFilterId']) && strlen($this->info['currentFilterId']) > 0)
		{
			$this->addJavascript('$("#'.$this->info['currentFilterId'].'").select();');
		}
	}
	
	public function resetColumnOrder()
	{
		$cookieData = $this->getCookieData();
		if(isset($cookieData['order']))
		{
			$cookieData['order'] = array();
		}
		$this->writeCookieData($cookieData);
		$this->addJavascript($this->instanceName.'.toAjaxTableEditor(\'update_html\',\'\',{updateHistory: true});');
	}
	
	public function setHiddenColumns()
	{
		if(stristr($this->permissions,'H') && $this->hiddenColumnsSet == false)
		{
			$cookieData = $this->getCookieData();
			$hiddenArr = isset($cookieData['hidden']) ? $cookieData['hidden'] : array();
			foreach($this->tableColumns as $col => $info)
			{
				if(stristr($info['perms'],'H') && $col != $this->primaryKeyCol)
				{
					if(isset($hiddenArr[$col]))
					{
						$this->tableColumns[$col]['hidden'] = $hiddenArr[$col];
					}
				}
				if(isset($this->tableColumns[$col]['hidden']) && $this->tableColumns[$col]['hidden'])
				{
					$this->tableColumns[$col]['hidden_add'] = true;
					$this->tableColumns[$col]['hidden_edit'] = true;
				}
			}
			$this->hiddenColumnsSet = true;
		}
	}
	
	public function updateHiddenColumns()
	{
		$cookieData = $this->getCookieData();
		$hiddenArr = array();
		foreach($this->info as $col => $checked)
		{
			if($checked == false)
			{
				$hiddenArr[$col] = true;
			}
			else
			{
				$hiddenArr[$col] = false;
			}
		}
		$cookieData['hidden'] = $hiddenArr;
		$this->writeCookieData($cookieData);
		$this->addJavascript($this->instanceName.'.toAjaxTableEditor(\'update_html\',\'\',{updateHistory: true});');
	}
	
	public function writeCookieData($cookieData)
	{
		$cookieData = $this->encryptData($this->jsonEncode($cookieData));
		if(!setcookie($this->varPrefix,$cookieData,time() + 60*60*24*7*365*2))
		{
			$this->warnings[] = 'To perform this function your browser must accept cookies.';
		}
	}
	
	public function getCookieData()
	{
		if(isset($_COOKIE[$this->varPrefix]) && strlen($_COOKIE[$this->varPrefix]) > 0)
		{
			return $this->jsonDecode($this->decryptData($_COOKIE[$this->varPrefix]),true);
		}
		else
		{
			return array();
		}
	}
	
	public function showHideColumns()
	{
		if(stristr($this->permissions,'H'))
		{
			$cookieData = $this->getCookieData();
			$hiddenArr = isset($cookieData['hidden']) ? $cookieData['hidden'] : array();
			$html = '';
			$html .= '<div id="'.$this->instanceName.'show_hide_cb_layer">';
			$html .= '<table '.$this->showHideTableInfo.'><tr style="font-weight: bold;"><td>'.$this->langVars->ttlColumn.'</td><td>'.$this->langVars->ttlCheckBox.'</td></tr>';
			foreach($this->tableColumns as $col => $info)
			{
				if(stristr($info['perms'],'H') && $col != $this->primaryKeyCol)
				{
					$checked = 'checked="checked"';
					if(isset($hiddenArr[$col]) && $hiddenArr[$col])
					{
						$checked = '';
					}
					if(!isset($hiddenArr[$col]) && $this->columnIsHidden($info))
					{
						$checked = '';
					}
					//$html .= '<tr><td><label for="'.$col.'_hide_cb">'.$info['display_text'].'</label>:</td><td><input type="checkbox" id="'.$col.'_hide_cb" onchange="'.$this->instanceName.'.showHideColumn(this,\''.$col.'\');" '.$checked.' /></tr>';
					$html .= '<tr><td><label for="'.$this->instanceName.$col.'_hide_cb">'.$info['display_text'].'</label>:</td><td><input type="checkbox" id="'.$this->instanceName.$col.'_hide_cb" value="'.$col.'" '.$checked.' /></tr>';
				}
			}
			$html .= '</table>';
			$html .= '</div>';
			$this->setInnerHtml('titleLayer',$this->showHideTitle);
			$this->setInnerHtml('recordLayer','');
			//$this->setInnerHtml('filterLayer','');
			//$this->setInnerHtml('searchButtonsLayer','<button onclick="'.$this->instanceName.'.toAjaxTableEditor(\'update_html\',\'\',{updateHistory: true});">'.$this->langVars->btnBack.'</button>');
			$this->setInnerHtml('searchButtonsLayer','<button onclick="'.$this->instanceName.'.updateHiddenColumns();">'.$this->langVars->btnUpdate.'</button> <button onclick="'.$this->instanceName.'.toAjaxTableEditor(\'update_html\',\'\',{updateHistory: true});">'.$this->langVars->btnCancel.'</button>');
			$this->setInnerHtml('tableLayer',$html);
			//$this->addJavascript("resetScrollTop();");
			if(is_callable($this->showHideScreenFun))
			{
				call_user_func($this->showHideScreenFun,$this->instanceName);
			}
		}
	}
	
	public function orderColumnsScreen()
	{
		if(stristr($this->permissions,'O'))
		{
			$html = '';
			$this->setHiddenColumns();
			$this->setColumnOrder();
			$html .= '<ul id="'.$this->instanceName.'columnOrderList" class="mateOrderColumnsContainer">';
			foreach($this->tableColumns as $col => $info)
			{
				if(stristr($info['perms'],'O') && stristr($info['perms'],'T') && !$this->columnIsHidden($info))
				{
					$html .= '<li id="'.$col.'" class="mateOrderColumn">'.$info['display_text'].'</li>';
				}
			}
			$html .= '</ul>';
			$this->setInnerHtml('titleLayer',$this->orderColTitle);
			$this->setInnerHtml('recordLayer','');
			//$this->setInnerHtml('filterLayer','');
			$this->setInnerHtml('searchButtonsLayer','<button onclick="'.$this->instanceName.'.toAjaxTableEditor(\'reset_column_order\',\'\');">'.$this->langVars->btnReset.'</button> <button onclick="'.$this->instanceName.'.toAjaxTableEditor(\'update_html\',\'\',{updateHistory: true});">'.$this->langVars->btnBack.'</button>');		
			$this->setInnerHtml('tableLayer',$html);
			//$this->addJavascript("resetScrollTop();");
			$javascript = '$("#'.$this->instanceName.'columnOrderList").sortable({
				dropOnEmpty: false,
				update: function(event,ui) {
					var info = [];
					$("#'.$this->instanceName.'columnOrderList li.mateOrderColumn").each(function(index,li) {
						info[info.length] = $(li).attr("id");
					});
					'.$this->instanceName.'.toAjaxTableEditor("update_column_order",info);				
				}
			});';
			$this->addJavascript($javascript);
			if(is_callable($this->orderColScreenFun))
			{
				call_user_func($this->orderColScreenFun,$this->instanceName);
			}
		}
	}
	
	public function updateColumnOrder()
	{
		$cookieData = $this->getCookieData();
		$orderArr = array();
		if(stristr($this->permissions,'O'))
		{
			foreach($this->info as $col)
			{
				if(isset($this->tableColumns[$col]['perms']) && stristr($this->tableColumns[$col]['perms'],'O'))
				{
					$orderArr[] = $col;
				}
			}
		}
		$cookieData['order'] = $orderArr;
		$this->writeCookieData($cookieData);
	}
	
	public function setColumnOrder()
	{
		if(stristr($this->permissions,'O'))
		{
			$cookieData = $this->getCookieData();
			$orderArr = isset($cookieData['order']) ? $cookieData['order'] : array();
			$newTableColumns = array();
			foreach($orderArr as $index => $col)
			{
				if(isset($this->tableColumns[$col]) && stristr($this->tableColumns[$col]['perms'],'O'))
				{
					$newTableColumns[$col] = $this->tableColumns[$col];
					unset($this->tableColumns[$col]);
				}
			}
			foreach($this->tableColumns as $col => $info)
			{
				$newTableColumns[$col] = $info;
			}
			$this->tableColumns = $newTableColumns;
		}
	}
	
	public function userButtonClicked()
	{
		$buttonKey = $this->info['buttonKey'];
		if(isset($this->userButtons[$buttonKey]['pass_id_array']) && $this->userButtons[$buttonKey]['pass_id_array'])
		{
			$params = isset($this->userButtons[$buttonKey]['params']) ? $this->userButtons[$buttonKey]['params'] : array();
			call_user_func($this->userButtons[$buttonKey]['call_back_fun'],$this->info['checkboxes'],$params,$this->instanceName);
		}
		else
		{
			foreach($this->info['checkboxes'] as $info)
			{
				$id = $info;
				if($row = $this->getTableRow($id))
				{
					if(isset($this->userButtons[$buttonKey]['call_back_fun']) && is_callable($this->userButtons[$buttonKey]['call_back_fun']))
					{
						$params = isset($this->userButtons[$buttonKey]['params']) ? $this->userButtons[$buttonKey]['params'] : array();
						call_user_func($this->userButtons[$buttonKey]['call_back_fun'],$row,$params,$this->instanceName);
					}
				}		
			}
		}
		if(!(isset($this->userButtons[$buttonKey]['no_update']) && $this->userButtons[$buttonKey]['no_update']))
		{
			$this->updateHtml();
		}
	}
	
	public function userIconClicked()
	{
		$id = $this->info[0];
		$iconKey = $this->info[1];
		if($row = $this->getTableRow($id))
		{
			if(isset($this->userIcons[$iconKey]['call_back_fun']) && is_callable($this->userIcons[$iconKey]['call_back_fun']))
			{
				call_user_func($this->userIcons[$iconKey]['call_back_fun'],$row,$this->instanceName);
			}
		}
		if(!(isset($this->userIcons[$iconKey]['no_update']) && $this->userIcons[$iconKey]['no_update']))
		{
			$this->updateHtml();
		}
	}
	
	public function copyRows()
	{
		$nextRowNum = $this->info['last_row_num'] + 1;
		if(!$this->hasRightsToRows($this->info['rows_to_copy']))
		{
			$this->handleHacking();
		}
		$counter = 1;
		$numRowsToCopy = count($this->info['rows_to_copy']);
		foreach($this->info['rows_to_copy'] as $mateRowNum => $id)
		{
			$preparedSets = array();
			$queryParams = array();
			$afterCopyArray = array();
			$queryParams = array();
			if($row = $this->getTableRow($id))
			{
				$afterCopyArray = $row;
				$sets = array();
				foreach($this->tableColumns as $col => $info)
				{
					if(stristr($info['perms'],'C') && !isset($info['join']['real_column']))
					{
						$val = $row[$col];
						$val = $this->getSqlValue($col,$val);
						if(isset($this->tableColumns[$col]['on_copy_fun']) && is_callable($this->tableColumns[$col]['on_copy_fun']))
						{
							$val = call_user_func($this->tableColumns[$col]['on_copy_fun'],$col,$val,$row,$this->instanceName,$nextRowNum);
						}
						$preparedSets[] = $this->getAddEditPreparedSet($col,$val,'add');
						if($val !== null && !isset($this->tableColumns[$col]['mysql_add_fun']))
						{
							$queryParams[$col] = $val;
						}
					}
				}
				if(count($preparedSets) == 0)
				{
				   $preparedSets[] = $this->primaryKeyCol." = ''";
				}
				$query2 = "insert into $this->tableName set ".implode(', ',$preparedSets);
				$result2 = $this->doQuery($query2,$queryParams);
				
				$newRowId = DBC::get()->lastInsertId();
				if(isset($this->afterCopyFun) && is_callable($this->afterCopyFun))
				{
					call_user_func($this->afterCopyFun,$this->primaryKeyCol,$newRowId,$afterCopyArray,$this->instanceName,$nextRowNum);
				}
				if($counter == $numRowsToCopy)
				{
					$this->setHtmlValue('last_row_num',$nextRowNum);
				}
				$newRows[] = array('new_row_id' => $newRowId, 'next_row_num' => $nextRowNum, 'mate_row_num' => $mateRowNum);
				$nextRowNum++;
			}
			$counter++;
		}
		if(count($newRows) > 0)
		{
			$this->setHiddenColumns();
			$this->setColumnOrder();
			$this->formatJoinClause();
			$this->formatSelectClause();
			foreach($newRows as $nrInfo)
			{
				$this->drawRowInPlace($nrInfo['new_row_id'],$nrInfo['next_row_num'],true,$nrInfo['mate_row_num']);
			}
		}
	}
	
	public function advancedSearch()
	{
		$addCriteria = $this->info['addCriteria'];
		unset($this->info['addCriteria']);
		$this->sessionData['start'] = 0;
		foreach($this->info as $i => $info)
		{
			$this->advSearches[$i] = $this->info[$i];
		}
		$this->sessionData['advSearches'] = $this->advSearches;
		if($addCriteria)
		{
			$this->sessionData['numAdvSearches']++;
			$this->numAdvSearches++;
		}
	}
	
	public function exportInfo()
	{
		$this->setHiddenColumns();
		$this->setColumnOrder();
		$this->formatJoinClause();
		$this->formatSelectClause();
		$this->formatWhereClause();
		if(strlen($this->groupByClause) > 0)
		{
			$this->formatHavingClause();
		}
		$this->setNumResults();
		$this->setPagingVars();
		$exportInfo = '';
		$this->extraOrderByInfo = empty($this->extraOrderByInfo) ? '' : ', '.$this->extraOrderByInfo;
		$query = $this->selectClause.' '.$this->joinClause.' '.$this->whereClause.' '.$this->groupByClause.' '.$this->havingClause.' order by '.$this->getOrderByColumn($this->orderByColumn).' '.$this->getAscOrDesc().' '.$this->extraOrderByInfo;
		$result = $this->doQuery($query,$this->queryParams);
		if($result->rowCount() > 0)
		{
			$exportRow = array();
			foreach($this->tableColumns as $col => $info)
			{
				if(stristr($info['perms'],'X') && !$this->columnIsHidden($info))
				{
					$exportRow[] = '"'.$info['display_text'].'"';
				}
			}
			$exportInfo .= implode($this->exportDelimiter,$exportRow).$this->exportLineBreak;
			
			while($row = $result->fetch())
			{
				$exportRow = array();
				foreach($this->tableColumns as $col => $info)
				{
					$value = '';
					if(stristr($info['perms'],'X') && !$this->columnIsHidden($info))
					{
						$value = $row[$col];
						if(isset($info['csv_export_fun']) && is_callable($info['csv_export_fun']))
						{
							$value = call_user_func($info['csv_export_fun'],$col,$value,$row,$this->instanceName);
						}
						$exportRow[] = '"'.str_replace(array("\r", "\n", '"'),array('','','""'),$value).'"';
					}
				}
				$exportInfo .= implode($this->exportDelimiter,$exportRow).$this->exportLineBreak;
			}
			return $exportInfo;
		}
	}
	
	public function formatIcons($id,$row,$mateRowNum)
	{
		$html = '';
		$numIcons = 0;						
		if(stristr($this->permissions,'V') && stristr($this->removeIcons,'V') === false)
		{
			$html .= '<li class="info"><a href="javascript: void(0);" onclick="'.$this->instanceName.'.toAjaxTableEditor(\'view_row\',\''.$id.'\',{updateHistory: true});" title="'.$this->langVars->ttlInfo.'"></a></li>';
			$numIcons++;
		}
		if(stristr($this->permissions,'E') && stristr($this->removeIcons,'E') === false)
		{
			$html .= '<li class="edit"><a href="javascript: void(0);" onclick="'.$this->instanceName.'.editRow(\''.$id.'\');" title="'.$this->langVars->ttlEdit.'"></a></li>';
			$numIcons++;
		}
		if(stristr($this->permissions,'C') && stristr($this->removeIcons,'C') === false)
		{
			$html .= '<li class="copy"><a href="javascript: void(0);" onclick="'.$this->instanceName.'.copyRow(\''.$id.'\',\''.$mateRowNum.'\');" title="'.$this->langVars->ttlCopy.'"></a></li>';
			$numIcons++;
		}
		if(stristr($this->permissions,'D') && stristr($this->removeIcons,'D') === false)
		{
			$html .= '<li class="delete"><a href="javascript: void(0);" onclick="'.$this->instanceName.'.confirmDeleteRow(\''.$id.'\',\''.$mateRowNum.'\')" title="'.$this->langVars->ttlDelete.'"></a></li>';
			$numIcons++;
		}
		foreach($this->userIcons as $iconKey => $info)
		{
			if(isset($info['call_back_fun']) && is_callable($info['call_back_fun']))
			{
				$confirmMsg = isset($info['confirm_msg']) ? $info['confirm_msg'] : '';
				$html .= '<li class="'.$info['class'].'"><a href="javascript: void(0);" onclick="'.$this->instanceName.'.userIconClicked(\'user_icon_clicked\',new Array(\''.$id.'\',\''.$iconKey.'\'),\''.$confirmMsg.'\')" title="'.$info['title'].'"></a></li>';
				$numIcons++;
			}
			else if(isset($info['icon_html']))
			{
				$info['icon_html'] = str_replace($this->replaceWithId,$id,$info['icon_html']);
				$html .= $info['icon_html'];
				$numIcons++;
			}
			else if(isset($info['format_fun']) && is_callable($info['format_fun']))
			{
				$userIconInfo = call_user_func($info['format_fun'],$row,$this->instanceName,$mateRowNum);
				$html .= $userIconInfo['icon_html'];
				$numIcons = $numIcons + $userIconInfo['num_icons'];				
			}
		}				
		if($numIcons > 0)
		{
			$width = $numIcons * 26;
			$html = '<td nowrap="nowrap"><ul class="actions" style="width: '.$width.'px;">'.$html.'</ul></td>';
		}
		
		return $html;
	}
	
	public function viewRow()
	{
		if(stristr($this->permissions,'V'))
		{
			$html = '';
			$id = $this->info;
			$this->setHiddenColumns();
			$this->setColumnOrder();
			$this->formatJoinClause();
			$this->formatSelectClause();
			$query = $this->selectClause.' '.$this->joinClause.' where '.$this->tableName.'.'.$this->primaryKeyCol." = :id";
			$queryParams = array('id' => $id);
			$result = $this->doQuery($query,$queryParams);
			if($row = $result->fetch())
			{
				$html .= '<table '.$this->viewTableInfo.'>';
				foreach($this->tableColumns as $col => $info)
				{
					if(stristr($info['perms'],'V'))
					{
						$value = $row[$col];
						if(isset($info['view_fun']) && is_callable($info['view_fun']))
						{
							$value = call_user_func($info['view_fun'],$col,$value,$row,$this->instanceName);
						}
						$value = strlen(trim($value)) > 0 ? $value : '&nbsp;';
						$html .= '<tr><td id="'.$col.'_label_cell" class="labelCell">'.$info['display_text'].':</td><td id="'.$col.'_value_cell" class="valueCell">'.$value.'</td></tr>';
					}
				}
				if(isset($this->viewHtmlFun) && is_callable($this->viewHtmlFun))
				{
					$html .= call_user_func($this->viewHtmlFun,$row,$this->instanceName);
				}
				$html .= '</tr></table><div id="'.$this->instanceName.'viewRowButtons">';
				if(stristr($this->permissions,'E'))
				{
					$html .= '<button onclick="'.$this->instanceName.'.editRow(\''.$id.'\');">'.$this->langVars->btnEdit.'</button>';
				}
				$html .= '<button onclick="'.$this->instanceName.'.toAjaxTableEditor(\'update_html\',\'\',{updateHistory: true});">'.$this->langVars->btnBack.'</button></div>';
			}
			$this->setInnerHtml('titleLayer',$this->viewRowTitle);
			$this->setInnerHtml('recordLayer','');
			//$this->setInnerHtml('filterLayer','');
			$this->setInnerHtml('searchButtonsLayer','');
			$this->setInnerHtml('tableLayer',$html);
			//$this->addJavascript("resetScrollTop();");
			
			if(is_callable($this->viewScreenFun))
			{
				call_user_func($this->viewScreenFun,$this->instanceName);
			}
		}		
	}
	
	public function updateMultRows()
	{
		$this->valError = false;
		$sets = array();
		$afterEditArray = array();
		$idArr = is_array($this->info['idArr']) ? $this->info['idArr'] : $this->info['idArr'];

		//$inputInfo = $this->info['inputInfo'];
		$hasFileUpload = isset($this->info['inputInfo']['submit_mate_file_upload']) ? true : false;
		unset($this->info['inputInfo']['submit_mate_file_upload']);
		$inputInfo = $this->stripMateInstanceName($this->info['inputInfo']);
		$insertId = $idArr;
		unset($inputInfo['submit_mate_file_upload']);
		
		
		foreach($inputInfo as $col => $val)
		{
			if(isset($this->tableColumns[$col]))
			{
				// Check to make sure the column has edit permissions.
				if(!stristr($this->tableColumns[$col]['perms'],'E'))
				{
					$this->handleHacking();
				}
				
				$val = $this->validateInputValue($col,$val,$inputInfo,'edit');
				if($val === false)
				{
					continue;
				}
				if(!isset($this->tableColumns[$col]['file_upload']))
				{
					$val = $this->getSqlValue($col,$val);
					$preparedSets[] = $this->getAddEditPreparedSet($col,$val,'add');
					if($val !== null && !isset($this->tableColumns[$col]['mysql_edit_fun']))
					{
						$queryParams[$col] = $val;
					}
				}
			}
		}
		
		if($this->valError)
		{
			$this->addJavascript($this->instanceName.'.enableButtons();');
			//$this->setInnerHtml('titleLayer',$this->editRowTitle.'<div style="color: #f90d0d;">'.$this->langVars->errVal.'</div>');
			if($this->showDefaultValidationMsg)
			{
				$this->addTooltipMsg($this->langVars->errVal);
			}
		}
		else
		{
			foreach($idArr as $index => $id)
			{
				$idArr[$index] = $id;
			}
			if(!$this->hasRightsToRows($idArr) || !stristr($this->permissions,'E'))
			{
				$this->handleHacking();
			}
			if(count($preparedSets) > 0)
			{
				$quotedIdArr = $this->getPdoQuotedArr($idArr);
				$query = "update $this->tableName set ".implode(', ',$preparedSets)." where $this->primaryKeyCol in (".implode(",",$quotedIdArr).")";
				$result = $this->doQuery($query,$queryParams);
				if($result)
				{
					if(!empty($this->afterEditFun) && is_callable($this->afterEditFun))
					{
						call_user_func($this->afterEditFun,$this->primaryKeyCol,$idArr,$afterEditArray,$this->instanceName);
					}				
				}
			}
			if($hasFileUpload)
			{
				$idInputHtml = '<input type="hidden" name="'.$this->instanceName.$this->primaryKeyCol.'" value="'.htmlspecialchars(serialize($insertId)).'" />';
				$this->addJavascript('$(\'#'.$this->instanceName.'add_edit_form\').append(\''.$idInputHtml.'\');');
				$this->addJavascript($this->instanceName.'.submitFileUploadForm();');
			}
			else
			{
				//$this->updateHtml();
				$this->addJavascript($this->instanceName.'.toAjaxTableEditor(\'update_html\',\'\',{updateHistory: true});');
			}
		}
	}
	
	public function updateRow()
	{
		$this->valError = false;
		$oldPrimaryKeyValue = $this->info['old_primary_key_value'];
				
		unset($this->info['old_primary_key_value']);
		
		$this->info = $this->stripMateInstanceName($this->info);
		
		$newPrimaryKeyValue = $this->updateRowInDb($this->info,$oldPrimaryKeyValue);
		
		if($this->valError)
		{
			$this->addJavascript($this->instanceName.'.enableButtons();');
			if($this->showDefaultValidationMsg)
			{
				$this->addTooltipMsg($this->langVars->errVal);
			}
			$columns = array_keys($this->valErrorFields);
			$this->addJavascript('$(\'#'.$this->instanceName.$columns[0].'\').focus();');
		}
		else
		{
			$this->addJavascript($this->instanceName.'.toAjaxTableEditor(\'update_html\',\'\',{updateHistory: true});');
		}
	}
	
	public function updateRowInDb($info,$oldPrimaryKeyValue,$mateRowNum='',$inPlace=false)
	{
		$preparedSets = array();
		$queryParams = array();
		$afterEditArray = array();
		$newPrimaryKeyValue = '';
		$fileColumns = array('name','size','type');
		
		if(!$this->hasRightsToRow($oldPrimaryKeyValue) || !stristr($this->permissions,'E'))
		{
			$this->handleHacking();
		}
		
		foreach($info as $col => $val)
		{
			if(isset($this->tableColumns[$col]))
			{
				// Check to make sure the column has add permissions
				if(!stristr($this->tableColumns[$col]['perms'],'E'))
				{
					$this->handleHacking();
				}
				
				$val = $this->validateInputValue($col,$val,$info,'edit',$inPlace);
				$val = $this->getSqlValue($col,$val);
				if($val === false)
				{
					continue;
				}
				$preparedSets[] = $this->getAddEditPreparedSet($col,$val,'edit');
				if($val !== null && !isset($this->tableColumns[$col]['mysql_edit_fun']))
				{
					$queryParams[$col] = $val;
				}
				if($col == $this->primaryKeyCol)
				{
					$newPrimaryKeyValue = $val;
				}
				$afterEditArray[$col] = $val;
			}
		}
		
		if(strlen($newPrimaryKeyValue) == 0)
		{
			$newPrimaryKeyValue = $oldPrimaryKeyValue;
		}
		
		if(!$this->valError && count($preparedSets) > 0)
		{
			if(!empty($this->userUpdateFun) && is_callable($this->userUpdateFun)) {
				return call_user_func($this->userUpdateFun,$this->primaryKeyCol,$oldPrimaryKeyValue,$afterEditArray,$this->instanceName,$mateRowNum);
			}			
			$queryParams['old_primary_key_value'] = $oldPrimaryKeyValue;
			$query = "update $this->tableName set ".implode(', ',$preparedSets)." where $this->primaryKeyCol = :old_primary_key_value";
			$result = $this->doQuery($query,$queryParams);
			if($result)
			{
				if(!empty($this->afterEditFun) && is_callable($this->afterEditFun))
				{
					call_user_func($this->afterEditFun,$this->primaryKeyCol,$oldPrimaryKeyValue,$afterEditArray,$this->instanceName,$mateRowNum);
				}				
			}
		}
		return $newPrimaryKeyValue;
	}
	
	public function stripMateInstanceName($info,$mateRowNum='')
	{
		$instNameLen = strlen($this->instanceName);
		$newInfo = array();
		foreach($info as $col => $val)
		{
			if($col != 'mateRowNum')
			{
				$col = strlen($mateRowNum) > 0 ? substr(substr($col,$instNameLen),0,(strlen($mateRowNum)+1) * -1) : substr($col,$instNameLen);
			}
			$newInfo[$col] = $val;
		}
		return $newInfo;
	}
	
	public function insertRow()
	{
		$this->valError = false;
		$this->info = $this->stripMateInstanceName($this->info);
		$insertId = isset($this->info[$this->primaryKeyCol]) ? $this->info[$this->primaryKeyCol] : '';
		$insertId = $this->insertRowInDb($this->info,$insertId);
		if($this->valError)
		{
			$this->addJavascript($this->instanceName.'.enableButtons();');
			if($this->showDefaultValidationMsg)
			{
				$this->addTooltipMsg($this->langVars->errValInPlace.': '.implode(', ',$this->valErrorFields));
			}
			$columns = array_keys($this->valErrorFields);
			$this->addJavascript('$(\'#'.$this->instanceName.$columns[0].'\').focus();');
			//$this->addTooltipMsg($this->langVars->errVal);
		}
		else
		{
			$this->addJavascript($this->instanceName.'.toAjaxTableEditor(\'update_html\',\'\',{updateHistory: true});');
		}
	}
	
	public function insertRowInDb($info,$insertId,$nextRowNum='',$inPlace=false)
	{
		$preparedSets = array();
		$queryParams = array();
		$afterAddArray = array();
		$fileColumns = array('name','size','type');
		
		if(!stristr($this->permissions,'A'))
		{
			$this->handleHacking();
		}
		
		foreach($info as $col => $val)
		{
			if(isset($this->tableColumns[$col]))
			{
				// Check to make sure the column has add permissions
				if(!stristr($this->tableColumns[$col]['perms'],'A'))
				{
					$this->handleHacking();
				}
				
				$val = $this->validateInputValue($col,$val,$info,'add',$inPlace);
				$val = $this->getSqlValue($col,$val);
				if($val === false && !isset($this->tableColumns[$col]['mysql_add_fun']))
				{
					continue;
				}
				$preparedSets[] = $this->getAddEditPreparedSet($col,$val,'add');
				if($val !== null && !isset($this->tableColumns[$col]['mysql_add_fun']))
				{
					$queryParams[$col] = $val;
				}
				$afterAddArray[$col] = $val;
			}
		}
		if(!$this->valError)
		{
			if(!empty($this->userInsertFun) && is_callable($this->userInsertFun)) {
				return call_user_func($this->userInsertFun,$this->primaryKeyCol,'',$afterAddArray,$this->instanceName,$nextRowNum);
			}
			if(count($preparedSets) == 0)
			{
			   $preparedSets[] = $this->primaryKeyCol." = ''";
			}
			$query = "insert into $this->tableName set ".implode(', ',$preparedSets);
			//$this->information[] = $query;
			$result = $this->doQuery($query,$queryParams);
			if($result)
			{
				$insertId = strlen($insertId) > 0 ? $insertId : DBC::get()->lastInsertId();
				if(!empty($this->afterAddFun) && is_callable($this->afterAddFun))
				{
					call_user_func($this->afterAddFun,$this->primaryKeyCol,$insertId,$afterAddArray,$this->instanceName,$nextRowNum);
				}
			}
		}
		return $insertId;
	}
	
	public function getSqlValue($col,$val)
	{
		if(isset($this->tableColumns[$col]['null_array']) && in_array($val,$this->tableColumns[$col]['null_array'],true))
		{
			return null;
		}
		return $val;
	}
	
	public function getPreparedSet($colStr,$op='=',$queryParamStr='',$tickMarks=true)
	{
		$queryParamStr = strlen($queryParamStr) == 0 ? ':'.$colStr : ':'.$queryParamStr;
		$colStr = $tickMarks ? $this->addTickMarks($colStr) : $colStr;
		return $colStr.' '.$op.' '.$queryParamStr;
	}
	
	public function getAddEditPreparedSet($col,$val,$addOrEdit)
	{
		$preparedSet = '';
		if(isset($this->tableColumns[$col]['mysql_'.$addOrEdit.'_fun']))
		{
			if(stristr($this->tableColumns[$col]['mysql_'.$addOrEdit.'_fun'],$this->mysqlFunReplaceStr) !== false || stristr($this->tableColumns[$col]['mysql_'.$addOrEdit.'_fun'],')') !== false) 
			{
				$preparedSet = $this->addTickMarks($col)." = ".str_ireplace($this->mysqlFunReplaceStr,':'.$col,$this->tableColumns[$col]['mysql_'.$addOrEdit.'_fun']);			
			} 
			else 
			{
				$preparedSet = $this->addTickMarks($col)." = ".$this->tableColumns[$col]['mysql_'.$addOrEdit.'_fun']."(:".$col.")";
			}
		}
		else
		{
			if($val === null)
			{
				$preparedSet = $this->addTickMarks($col)." = null";
			}
			else
			{
				$preparedSet = $this->getPreparedSet($col);
			}
		}
		return $preparedSet;
	}
	
	public function formatDate($date,$format)
	{
		if(isset($this->langVars->language) && $this->langVars->language != 'English')
		{
			$englishMonthNames = $this->getMonthNamesArr();
			$otherMonthNames = $this->getMonthNamesArr($this->langVars->locales);
			$date = str_ireplace($otherMonthNames['long'],$englishMonthNames['long'],$date);
			$date = str_ireplace($otherMonthNames['short'],$englishMonthNames['short'],$date);
		}
		$ts = strtotime($date);
		if($ts !== false && $ts > 0)
		{
			return date($format,$ts);
		}
		return '';
	}
	
	public function getMonthNamesArr($locales=array('en_US.utf8','en_GB.utf8','en_US','en_GB','en','english'))
	{
		$monthNames = array();
		$oldLocale = setlocale(LC_TIME,'0');
		$year = date('Y');
		setlocale(LC_TIME,$locales);
		for($i = 1; $i <= 12; $i++) 
		{
			$monthNames['short'][] = strftime('%b', mktime(12, 0, 0, $i, 1, $year));
			$monthNames['long'][] = strftime('%B', mktime(12, 0, 0, $i, 1, $year));
		}
		setlocale(LC_TIME,$oldLocale);
		return $monthNames;
	}
	
	public function validateInputValue($col,$val,$row,$addOrEdit,$inPlace=false)
	{
		$valError = false;
		if(isset($this->tableColumns[$col]['on_'.$addOrEdit.'_fun']) && is_callable($this->tableColumns[$col]['on_'.$addOrEdit.'_fun']))
		{
			$val = call_user_func($this->tableColumns[$col]['on_'.$addOrEdit.'_fun'],$col,$val,$row,$this->instanceName);
		}
		else if(isset($this->tableColumns[$col]['calendar']))
		{
			$val = $this->formatDate($val,$this->defaultDbDateFormat);
		}
		// Check Validation
		if(isset($this->tableColumns[$col]['val_fun']) && is_callable($this->tableColumns[$col]['val_fun']) && !call_user_func($this->tableColumns[$col]['val_fun'],$col,$val,$row,$this->instanceName))
		{
			$valError = true;
		}
		else if(isset($this->tableColumns[$col]['req']) && $this->tableColumns[$col]['req'])
		{
			// by pass validation if hidden
			if(isset($this->tableColumns[$col]['hidden']) && $this->tableColumns[$col]['hidden'] && $inPlace)
			{
				$valError = false;
			}
			else if(strlen(trim($val)) == 0)
			{
				$valError = true;
			}
			else if(isset($this->tableColumns[$col]['calendar']) && substr($val,0,10) == '0000-00-00')
			{
				$valError = true;
			}
		}
		// Remove old validation styles if any
		if($valError == false && (!isset($this->tableColumns[$col]['hidden_'.$addOrEdit]) || !$this->tableColumns[$col]['hidden_'.$addOrEdit]) && $inPlace == false)
		{
			foreach($this->noValErrorStyles as $style => $styleValue)
			{
				$this->addJavascript('$("#'.$col.'_label_cell").css("'.$style.'","'.$styleValue.'");');
			}
		}
		if($valError)
		{
			$this->valError = true;
			$this->numValErrors++;
			if($inPlace)
			{
				if(isset($this->tableColumns[$col]['display_text']))
				{
					$this->valErrorFields[$col] = $this->tableColumns[$col]['display_text'];
				}
			}
			else
			{
				$this->valErrorFields[$col] = $this->tableColumns[$col]['display_text'];
				foreach($this->valErrorStyles as $style => $styleValue)
				{
					$this->addJavascript('$("#'.$col.'_label_cell").css("'.$style.'","'.$styleValue.'");');
				}
				//$this->addJavascript('$("#'.$col.'_label_cell").setStyle("'.$this->valErrorStyles.'");');
			}
		}
		return $val;
	}
	
	public function addRow()
	{
		if(stristr($this->permissions,'A'))
		{
			$html = '';
			$rowHtml = '';
			$jsFun = $this->instanceName.'.insertRow();';
			//$calJs = array();
			$formInfo = '';
			foreach($this->tableColumns as $col => $info)
			{
				if(stristr($info['perms'],'A') && !isset($info['join']['real_column']))
				{
					$inputHtmlInfo = $this->getInputHtmlInfo($info,array(),$col,$jsFun,'add');
					$inputHtml = $inputHtmlInfo['input_html'];
					
					if(isset($info['hidden_add']) && $info['hidden_add'])
					{
						$rowHtml .= $inputHtml;
					}
					else
					{	
						$rowHtml .= '<tr><td id="'.$col.'_label_cell" class="labelCell"><label for="'.$this->instanceName.$col.'">'.$info['display_text'].':</label></td><td id="'.$col.'_input_cell" class="inputCell">'.$inputHtml.'</td></tr>';
					}
				}
			}
			$html .= '<form id="'.$this->instanceName.'add_edit_form" name="'.$this->instanceName.'add_edit_form" '.$formInfo.'><table '.$this->addTableInfo.'>';
			$html .= $rowHtml;
			$html .= '</table></form><div id="'.$this->instanceName.'addRowButtons" class="mateAddRowBtnsDiv"><button onclick="'.$jsFun.'">'.$this->langVars->btnAdd.'</button><button onclick="'.$this->instanceName.'.toAjaxTableEditor(\'update_html\',\'\',{updateHistory: true});">'.$this->langVars->btnCancel.'</button></div>';
			
			$this->setInnerHtml('titleLayer',$this->addRowTitle);
			$this->setInnerHtml('recordLayer','');
			$this->setInnerHtml('searchButtonsLayer','');
			$this->setInnerHtml('tableLayer',$html);

			if(is_callable($this->addScreenFun))
			{
				call_user_func($this->addScreenFun,$this->instanceName);
			}
		}	
	}
	
	public function returnJsBool($bool)
	{
		if($bool)
		{
			return 'true';
		}
		return 'false';
	}
	
	public function editMultRows()
	{
		if(stristr($this->permissions,'E'))
		{
			if($this->allowEditMult)
			{
				$html = '';
				$rowHtml = '';
				//$calJs = array();
				$formInfo = '';
				$jsFun = $this->instanceName.".updateMultRows(new Array('".implode("','",$this->info)."'));";
				
				if(isset($this->beforeEditFun) && is_callable($this->beforeEditFun))
				{
					$newInfoArr = array();
					$quotedIdArr = $this->getPdoQuotedArr($this->info);
					$query = "select * from $this->tableName where $this->primaryKeyCol in (".implode(",",$quotedIdArr).")";
					$result = $this->doQuery($query);
					while($row = $result->fetch())
					{
						$returnVal = call_user_func($this->beforeEditFun,$this->primaryKeyCol,$this->info['id'],$row,$this->instanceName);
						if($returnVal !== false)
						{
							$newInfoArr[] = $row[$this->primaryKeyCol];
						}
					}
					$this->info = $newInfoArr;
				}
				
				$id = current($this->info);
				if($row = $this->getTableRow($id))
				{
					foreach($this->tableColumns as $col => $info)
					{
						if(stristr($info['perms'],'E') && !isset($info['join']['real_column']) && $col != $this->primaryKeyCol)
						{
							$inputHtmlInfo = $this->getInputHtmlInfo($info,$row,$col,$jsFun,'edit',true);
							$inputHtml = $inputHtmlInfo['input_html'];
							
							if(isset($info['hidden_edit']) && $info['hidden_edit'])
							{
								$rowHtml .= $inputHtml;
							}
							else
							{
								$rowHtml .= '<tr>';
								$rowHtml .= '<td id="'.$col.'_label_cell" class="labelCell"><label for="'.$this->instanceName.$col.'">'.$info['display_text'].':</label></td>';
								$rowHtml .= '<td id="'.$col.'_input_cell" class="inputCell">'.$inputHtml.'</td>';
								$rowHtml .= '<td><input type="checkbox" id="'.$this->instanceName.$col.'_em_cb" onchange="'.$this->instanceName.'.disableEnableInput(\''.$this->instanceName.$col.'\',this);" /></td>';
								$rowHtml .= '</tr>';
							}
						}
					}
					$html .= '<form id="'.$this->instanceName.'add_edit_form" name="'.$this->instanceName.'add_edit_form" '.$formInfo.'><table '.$this->editTableInfo.'>';
					$html .= $rowHtml;
					$html .= '</table></form><div id="'.$this->instanceName.'editRowButtons" class="mateEditRowBtnsDiv"><button onclick="'.$jsFun.'">'.$this->langVars->btnUpdate.'</button><button onclick="'.$this->instanceName.'.toAjaxTableEditor(\'update_html\',\'\',{updateHistory: true});">'.$this->langVars->btnCancel.'</button></div>';
				}
				$this->setInnerHtml('titleLayer',$this->editMultTitle);
				$this->setInnerHtml('recordLayer','');
				//$this->setInnerHtml('filterLayer','');
				$this->setInnerHtml('searchButtonsLayer','');
				$this->setInnerHtml('tableLayer',$html);
				
				if(is_callable($this->editScreenFun))
				{
					call_user_func($this->editScreenFun,$this->instanceName);
				}
			}
			else
			{
				$this->warnings[] = $this->langVars->edit1Row;
			}
		}
	}
	
	public function editRow()
	{
		if(stristr($this->permissions,'E'))
		{
			$html = '';
			$rowHtml = '';
			$id = $this->info;
			$jsFun = $this->instanceName.'.updateRow(\''.$id.'\');';
			$formInfo = '';
			
			if($row = $this->getTableRow($id))
			{
				if(isset($this->beforeEditFun) && is_callable($this->beforeEditFun))
				{
					$returnVal = call_user_func($this->beforeEditFun,$this->primaryKeyCol,$id,$row,$this->instanceName);
					if($returnVal === false)
					{
						return;
					}
				}
				foreach($this->tableColumns as $col => $info)
				{
					if(stristr($info['perms'],'E') && !isset($info['join']['real_column']))
					{
						$inputHtmlInfo = $this->getInputHtmlInfo($info,$row,$col,$jsFun,'edit');
						$inputHtml = $inputHtmlInfo['input_html'];
						if(isset($info['hidden_edit']) && $info['hidden_edit'])
						{
							$rowHtml .= $inputHtml;
						}
						else
						{
							$rowHtml .= '<tr><td id="'.$col.'_label_cell" class="labelCell"><label for="'.$this->instanceName.$col.'">'.$info['display_text'].':</label></td><td id="'.$col.'_input_cell" class="inputCell">'.$inputHtml.'</td></tr>';
						}
					}
				}
			}
			$html .= '<form id="'.$this->instanceName.'add_edit_form" name="'.$this->instanceName.'add_edit_form" '.$formInfo.'><table '.$this->editTableInfo.'>';
			$html .= $rowHtml;
			$html .= '</table></form><div id="'.$this->instanceName.'editRowButtons" class="mateEditRowBtnsDiv"><button onclick="'.$jsFun.'">'.$this->langVars->btnUpdate.'</button><button onclick="'.$this->instanceName.'.toAjaxTableEditor(\'update_html\',\'\',{updateHistory: true});">'.$this->langVars->btnCancel.'</button></div>';
			$this->setInnerHtml('titleLayer',$this->editRowTitle);
			$this->setInnerHtml('recordLayer','');
			$this->setInnerHtml('searchButtonsLayer','');
			$this->setInnerHtml('tableLayer',$html);
			if(is_callable($this->editScreenFun))
			{
				call_user_func($this->editScreenFun,$this->instanceName);
			}
		}
	}
	
	public function columnIsHidden($colInfo)
	{
		if(isset($colInfo['hidden']) && $colInfo['hidden'])
		{
			return true;
		}
		return false;
	}
	
	public function getTableRow($primaryKeyValue)
	{
		$query = "select * from $this->tableName where $this->primaryKeyCol = :primaryKeyValue";
		$queryParams = array('primaryKeyValue' => $primaryKeyValue);
		$result = $this->doQuery($query,$queryParams);
		if($row = $result->fetch())
		{
			return $row;
		}
		return false;
	}
	
	public function getInputDefaultValue($info,$row,$col,$addOrEdit)
	{
		$val = isset($row[$col]) ? $row[$col] : '';
		$defVal = $val;
		if(isset($val) && strlen($val) > 0)
		{
			if(isset($info[$addOrEdit.'_fun']) && is_callable($info[$addOrEdit.'_fun']))
			{
				$defVal = call_user_func($info[$addOrEdit.'_fun'],$col,$defVal,$row,$this->instanceName);
			}
			// If it is a calendar and there is a default and no date use the default
			else if(isset($info['calendar']))
			{
				if(isset($info['default']) && substr($val,0,10) == '0000-00-00')
				{
					$defVal = $info['default'];
				}
				else
				{
					$defVal = $row[$col];
				}
			}
			else
			{
				$defVal =  $val;
			}
		}
		else if(isset($info['default']) && $addOrEdit == 'add')
		{
			$defVal = $info['default'];
		}
		return $defVal;
	}
	
	public function escapeHtml($string) 
	{
		$out = htmlspecialchars($string, ENT_QUOTES, 'UTF-8', false);
		return preg_replace('/&amp;/', '&', $out);
	}
	
	public function getInputHtmlInfo($info,$row,$col,$jsFun,$addOrEdit,$editMult=false,$mateRowNum='')
	{
		$defVal = $this->getInputDefaultValue($info,$row,$col,$addOrEdit,$mateRowNum);
		$hasFileUpload = false;
		$inputInfo = isset($info['input_info']) ? str_replace($this->replaceWithRowNumStr,$mateRowNum,$info['input_info']) : '';
		$inputInfo .= $editMult ? ' disabled="disabled"' : '';
		$inputHtml = '';
		$inputId = strlen($mateRowNum) > 0 ? $this->instanceName.$col.'_'.$mateRowNum : $this->instanceName.$col;
		
		if(isset($info['format_input_fun']) && is_callable($info['format_input_fun']))
		{
			$inputHtml .= call_user_func($info['format_input_fun'],$col,$defVal,$row,$inputInfo,$this->instanceName,$mateRowNum);
		}
		else if(isset($info['hidden_'.$addOrEdit]) && $info['hidden_'.$addOrEdit])
		{
			$inputHtml .= '<input type="hidden" id="'.$inputId.'" name="'.$inputId.'" value="'.htmlspecialchars($defVal).'" '.$inputInfo.' />';
		}
		else if(isset($info['select_query']))
		{
			$inputHtml .= $this->getSelect($info['select_query'],$inputId,$defVal,$inputInfo);
		}
		else if(isset($info['select_array']) && is_array($info['select_array']))
		{
			$inputHtml .= $this->getSelectFromArray($info['select_array'],$inputId,$defVal,$inputInfo);
		}
		else if(isset($info['textarea']))
		{
			$numRows = isset($info['textarea']['rows']) ? $info['textarea']['rows'] : 7;
			$numCols = isset($info['textarea']['cols']) ? $info['textarea']['cols'] : 25;
			$inputHtml .= '<textarea id="'.$inputId.'" name="'.$inputId.'" rows="'.$numRows.'" cols="'.$numCols.'" value="'.htmlspecialchars($defVal).'" '.$inputInfo.' >'.htmlspecialchars($defVal).'</textarea>';
		}
		else if(isset($info['checkbox']))
		{
			$checkedValue = isset($info['checkbox']['checked_value']) ? $info['checkbox']['checked_value'] : '';
			$unCheckedValue = isset($info['checkbox']['un_checked_value']) ? $info['checkbox']['un_checked_value'] : '';
			$checked = $defVal == $checkedValue ? 'checked="checked"' : '';
			$inputHtml .= '<input type="checkbox" id="'.$inputId.'" name="'.$inputId.'" value="'.$defVal.'" onclick="'.$this->instanceName.'.updateCheckBoxValue(this,\''.$checkedValue.'\',\''.$unCheckedValue.'\');" '.$checked.' '.$inputInfo.' />';
		}
		else if(isset($info['join']) && is_array($info['join']) && !isset($info['join']['no_auto_select']))
		{
			$joinTable = !empty($info['join']['db']) ? $info['join']['db'].'.'.$info['join']['table'] : $info['join']['table'];
			$sqDisplayMask = $joinTable.'.'.$info['join']['column'];
			if(isset($info['join']['orig_display_mask']) && strlen($info['join']['orig_display_mask']) > 0)
			{
				$sqDisplayMask = $info['join']['orig_display_mask'];
			}
			else if(isset($info['join']['display_mask']) && strlen($info['join']['display_mask']) > 0)
			{
				$sqDisplayMask = $info['join']['display_mask'];
			}
			//$info['join']['display_mask'] = isset($info['join']['display_mask']) ? $info['join']['display_mask'] : $joinTable.'.'.$info['join']['column'];
			$selectQuery = 'select distinct('.$info['join']['column'].'), '.$sqDisplayMask.' from '.$joinTable.' order by '.$sqDisplayMask.' asc';
			$inputHtml .= $this->getSelect($selectQuery,$inputId,$defVal,$inputInfo);
		}
		else if(isset($info['calendar']))
		{
			$inputHtml .= '<input type="text" id="'.$inputId.'" name="'.$inputId.'" value="'.htmlspecialchars($defVal).'" onKeyPress="if('.$this->instanceName.'.enterPressed(event)){'.$jsFun.' return false;}" '.$inputInfo.' />';
			$this->addJavascript($this->getCalJs($info['calendar'],$col,$inputInfo,$mateRowNum),2);
		}
		else
		{
			$inputType = isset($info['input_type']) ? $info['input_type'] : 'text';
			$maxLength = isset($info['maxlen']) ? 'maxlength="'.$info['maxlen'].'"' : '';
			$inputHtml .= '<input type="'.$inputType.'" id="'.$inputId.'" name="'.$inputId.'" value="'.htmlspecialchars($defVal).'" '.$maxLength.' onKeyPress="if('.$this->instanceName.'.enterPressed(event)){'.$jsFun.' return false;}" '.$inputInfo.' />';
		}
		if(isset($info['req']) && $info['req'] && !isset($info['hidden_'.$addOrEdit]))
		{
			$inputHtml .= $editMult ? '<span id="'.$col.'_req_mark" style="display: none;">'.$this->reqMarker.'</span>' : $this->reqMarker;
		}
		return array('input_html' => $inputHtml);
	}
	
	public function getCalJs($calInfo,$col,$inputInfo,$mateRowNum='')
	{
		$js = '';
		$inputId = strlen($mateRowNum) > 0 ? $this->instanceName.$col.'_'.$mateRowNum : $this->instanceName.$col;
		$options = isset($calInfo['options']) ? $calInfo['options'] : array();
		if(isset($calInfo['js_format']))
		{
			$options['dateFormat'] = $calInfo['js_format'];
			$js = '$("#'.$inputId.'").datepicker("option","dateFormat","'.$calInfo['js_format'].'")';
			$options['dateFormat'] = 'yy-mm-dd';
		}
		$options = (object) $options;
		return '$("#'.$inputId.'").datepicker('.$this->jsonEncode($options).');'.$js;
	}
	
	public function deleteRows()
	{
		$deletedRowNums = array();
		if(stristr($this->permissions,'D'))
		{
			foreach($this->info as $mateRowNum => $id)
			{
				$id = $id;
				if(!$this->hasRightsToRow($id))
				{
					$this->handleHacking();
				}
				$callbackArr = array();
				if((isset($this->beforeDeleteFun) && is_callable($this->beforeDeleteFun)) || (isset($this->afterDeleteFun) && is_callable($this->afterDeleteFun)) || (isset($this->userDeleteFun) && is_callable($this->userDeleteFun)))
				{
					$callbackArr = array();
					if($row = $this->getTableRow($id)) {
						$callbackArr = $row;
					}
				}
				if(isset($this->beforeDeleteFun) && is_callable($this->beforeDeleteFun))
				{
					$returnVal = call_user_func($this->beforeDeleteFun,$this->primaryKeyCol,$id,$callbackArr,$this->instanceName,$mateRowNum);
					if($returnVal === false)
					{
						continue;
					}
				}
				if(!empty($this->userDeleteFun) && is_callable($this->userDeleteFun))
				{
					if(call_user_func($this->userDeleteFun,$this->primaryKeyCol,$id,$callbackArr,$this->instanceName,$mateRowNum)) 
					{
						$deletedRowNums[] = $mateRowNum;
					}
				}
				else
				{
					$query = "delete from $this->tableName where $this->primaryKeyCol = :id";
					$queryParams = array('id' => $id);
					$result = $this->doQuery($query,$queryParams);
					if($result)
					{
						$deletedRowNums[] = $mateRowNum;
						if(isset($this->afterDeleteFun) && is_callable($this->afterDeleteFun))
						{
							call_user_func($this->afterDeleteFun,$this->primaryKeyCol,$id,$callbackArr,$this->instanceName,$mateRowNum);
						}
					}
				}
			}
		}
		if(count($deletedRowNums) > 0)
		{
			$this->addJavascript($this->instanceName.'.removeRows(new Array("'.implode('","',$deletedRowNums).'"));');
		}
	}
	
	public function updateHtml()
	{
		$this->displayTable();
		$this->displayBottomInfo();
		$this->setInnerHtml('titleLayer',$this->tableTitle);
		if(is_callable($this->tableScreenFun))
		{
			call_user_func($this->tableScreenFun,$this->instanceName);
		}
	}
	
	public function displayFilters()
	{
		if(stristr($this->permissions,'F'))
		{
			$this->addJavascript($this->instanceName.'.displayFilters("'.$this->filterPosition.'");',2);
			if(strlen($this->filterColId) > 0)
			{
				$this->addJavascript('$("#'.$this->filterColId.'").focus();');
			}
		}
	}
	
	public function displayBottomInfo()
	{
		if($this->paginationLinks == true)
		{
			$linkHtml = $this->getPaginationLinks();
			$html = $this->numPages > 1 ? '<div class="matePageLinksDiv">'.$this->langVars->lblPage.' '.$linkHtml.'</div><div class="mateBtnsDiv">' : '';
		}
		else
		{
			$html = '<div class="mateBtnsDiv">'.$this->langVars->lblPage.' '.$this->getPageDropDown();			
		}
		if(stristr($this->permissions,'U'))
		{
			$html .= $this->langVars->lblDisplay.' '.$this->getDispNumDropDown();
		}
		if(stristr($this->permissions,'A'))
		{
			$html .= '<button onclick="'.$this->instanceName.'.toAjaxTableEditor(\'add_row\',\'\',{updateHistory: true});">'.$this->langVars->btnAdd.'</button>';
		}
		if(stristr($this->permissions,'E') && !stristr($this->permissions,'I'))
		{
			$html .= '<button onclick="'.$this->instanceName.'.editRows();">'.$this->langVars->btnEdit.'</button>';
		}
		if(stristr($this->permissions,'V') && !stristr($this->permissions,'I'))
		{
			$html .= '<button onclick="'.$this->instanceName.'.viewRows();">'.$this->langVars->btnView.'</button>';
		}
		if(stristr($this->permissions,'C') && !stristr($this->permissions,'I'))
		{
			$html .= '<button onclick="'.$this->instanceName.'.copyRows();">'.$this->langVars->btnCopy.'</button>';
		}
		if(stristr($this->permissions,'D') && !stristr($this->permissions,'I'))
		{
			$html .= '<button onclick="'.$this->instanceName.'.deleteRows();">'.$this->langVars->btnDelete.'</button>';
		}
		if(stristr($this->permissions,'X'))
		{
			$exportUrl = $_SERVER['PHP_SELF'];
			$exportUrl .= isset($_SERVER['QUERY_STRING']) > 0 && strlen($_SERVER['QUERY_STRING']) > 0 ? '?'.$_SERVER['QUERY_STRING'].'&mate_export=1' : '?mate_export=1';
			$html .= '<button onclick="'.$this->instanceName.'.handleExport(\''.$exportUrl.'\');">'.$this->langVars->btnExport.'</button>';
		}
		if(stristr($this->permissions,'H'))
		{
			$html .= '<button onclick="'.$this->instanceName.'.toAjaxTableEditor(\'show_hide_columns\',\'\',{updateHistory: true});">'.$this->langVars->btnShowHide.'</button>';		
		}
		if(stristr($this->permissions,'O'))
		{
			$html .= '<button onclick="'.$this->instanceName.'.toAjaxTableEditor(\'order_columns_screen\',\'\',{updateHistory: true});">'.$this->langVars->btnOrderCols.'</button>';		
		}
		//if(stristr($this->permissions,'F') && !stristr($this->permissions,'Q') && !stristr($this->permissions,'S'))
		if(stristr($this->permissions,'F') && $this->displayFilterBtns)
		{
			$html .= '<button onclick="'.$this->instanceName.'.handleFilterSearch();">'.$this->langVars->btnFilters.'</button>';		
			$html .= '<button onclick="'.$this->instanceName.'.toAjaxTableEditor(\'clear_filters\',\'\',{updateHistory: true});">'.$this->langVars->btnCFilters.'</button>';		
		}
		if(stristr($this->permissions,'S') && $this->searchType == 'quick')
		{
			$html .= '<button onclick="'.$this->instanceName.'.toAjaxTableEditor(\'show_advanced_search\',\'\',{updateHistory: true});">'.$this->langVars->btnASearch.'</button>';
		}
		else if(stristr($this->permissions,'Q') && $this->searchType == 'advanced')
		{
			$html .= '<button onclick="'.$this->instanceName.'.toAjaxTableEditor(\'show_quick_search\',\'\',{updateHistory: true});">'.$this->langVars->btnQSearch.'</button>';		
		}
		foreach($this->userButtons as $key => $info)
		{
			if(isset($info['button_html']))
			{
				$html .= $info['button_html'].'';
			}
			else if(isset($info['button_info']))
			{
				$html .= '<button '.$info['button_info'].'>'.$info['label'].'</button>';			
			}
			else if(isset($info['call_back_fun']) && is_callable($info['call_back_fun']) && stristr($this->permissions,'M'))
			{
				$confirmMsg = isset($info['confirm_msg']) ? $info['confirm_msg'] : '';
				$html .= '<button onclick="'.$this->instanceName.'.userButtonClicked(\''.$key.'\',\''.$confirmMsg.'\')">'.$info['label'].'</button>';
			}
		}
		
		$html .= '</div>';
		if(stristr($this->permissions,'Q') && $this->searchType == 'quick')
		{	
			$html .= '<div class="mateSearchStringDiv">'.$this->langVars->lblSearch.': <input type="text" id="'.$this->instanceName.'searchString" value="'.$this->searchString.'" size="25" onKeyPress="if('.$this->instanceName.'.enterPressed(event)){'.$this->instanceName.'.handleSearch(); return false;}" /><button onclick="'.$this->instanceName.'.handleSearch();">'.$this->langVars->lblSearch.'</button><button onclick="'.$this->instanceName.'.clearSearch();">'.$this->langVars->btnCSearch.'</button></div>';
		}
		else if(stristr($this->permissions,'S') && $this->searchType == 'advanced')
		{
			$html .= $this->getAdvancedSearchHtml();
		}
		$html .= '<div id="'.$this->instanceName.'hiddenFormLayer"></div>';
		$this->setInnerHtml('searchButtonsLayer',$html);
	}	
	
	public function displayTable()
	{
		$this->setHiddenColumns();
		$this->setColumnOrder();
		$this->formatJoinClause();
		$this->formatSelectClause();
		$this->formatWhereClause();
		if(strlen($this->groupByClause) > 0)
		{
			$this->formatHavingClause();
		}
		$this->setNumResults();
		$this->setPagingVars();
		$this->displayTableHtml();
		$this->displayFilters();
	}
	
	public function formatSelectClause()
	{
		if(strlen($this->selectClause) == 0)
		{
			$sets = array();
			foreach($this->tableColumns as $col => $info)
			{
				$sets[] = $this->getSelectSet($col,$info);
			}
			$this->selectClause = 'select '.implode(', '.$this->queryLineBreak,$sets).$this->queryLineBreak.'from '.$this->dbAndTable.$this->queryLineBreak;
		}
	}
	
	public function getSelectSet($col,$info)
	{
		if(isset($info['join']) && is_array($info['join']))
		{
			$info['join']['display_mask'] = isset($info['join']['display_mask']) ? $info['join']['display_mask'] : $info['join']['alias'].'.'.$info['join']['column'];
			$set = $info['join']['display_mask'].' as '.$this->addTickMarks($col);
		}
		else if(isset($info['display_mask']))
		{
			$set = $info['display_mask'].' as '.$this->addTickMarks($col);
		}
		else
		{
			$set = $this->addTickMarks($this->dbAndTable.'.'.$col);
		}
		return $set;
	}
	
	public function formatJoinClause()
	{
		if(strlen($this->joinClause) == 0)
		{
			//var_dump('i am here');
			$sets = array();
			$counter = 0;
			$joins = array();
			foreach($this->tableColumns as $col => $info)
			{
				$saveJoin = true;
				if(isset($info['join']) && is_array($info['join']))
				{
					if($col == $this->primaryKeyCol && isset($info['join']['display_mask']))
					{
						$this->warnings[] = 'Joining on the primary key with a display mask is not supported.';
					}
					//$this->tableColumns[$col]['join']['orig_column'] = $this->tableColumns[$col]['join']['column'];
					$this->tableColumns[$col]['join']['orig_display_mask'] = isset($this->tableColumns[$col]['join']['display_mask']) ? $this->tableColumns[$col]['join']['display_mask'] : '';
					if(isset($info['join']['custom_join']))
					{
						$joinIdentifier = $info['join']['custom_join'];
					}
					else
					{
						// Set join table var, if there is a database concat with table
						$joinTable = !empty($info['join']['db']) ? $info['join']['db'].'.'.$info['join']['table'] : $info['join']['table'];
						// Set join type
						$joinType = isset($info['join']['type']) ? $info['join']['type'] : 'left';
						// Set join column
						$joinColumn = isset($info['join']['real_column']) ? $info['join']['real_column'] : $col;
						// Set foriegn join column
						$foriegnJoinColumn = $info['join']['column'];
						// Set join identifier
						$joinIdentifier = $joinTable.$joinColumn.$foriegnJoinColumn.$joinType;
					}
					if(isset($joins[$joinIdentifier]))
					{
						// If this table was joined before, get the old alias and set save join to false
						$this->tableColumns[$col]['join']['alias'] = $joins[$joinIdentifier];
						$joinAlias = $this->tableColumns[$col]['join']['alias'];
						$saveJoin = false;
					}
					else
					{
						// If this is a new join and there is no user defined alias create one.
						if(!isset($this->tableColumns[$col]['join']['alias']))
						{
							$this->tableColumns[$col]['join']['alias'] = $info['join']['table'].'_'.substr(md5(uniqid(rand(),1)), 3, 5).'_'.$counter;
						}
						$joinAlias = $this->tableColumns[$col]['join']['alias'];
						// Store join and alias
						$joins[$joinIdentifier] = $joinAlias;
					}
					// Replace old table and database with alias (this must be done before the select clause is formatted)
					// Use preg replace so the substitution only happens once on each table/column definition (this is prevent errors when column names contain the table names)
					// Need to use explode/implode for concatenating columns
					if(isset($info['join']['display_mask']))
					{
						if(!isset($info['join']['custom_join']))
						{
							//$this->tableColumns[$col]['join']['display_mask'] = implode(',',preg_replace('/'.preg_quote($joinTable).'/',preg_quote($joinAlias),explode(',',$info['join']['display_mask']),1));
							$this->tableColumns[$col]['join']['display_mask'] = implode(',',preg_replace('/'.preg_quote($info['join']['table']).'/',preg_quote($joinAlias),explode(',',$info['join']['display_mask']),1));
							//var_dump($this->tableColumns[$col]['join']['display_mask']);
						}
					}
					else
					{
						$this->tableColumns[$col]['join']['display_mask'] = $joinAlias.'.'.$info['join']['column'];
					}
					//var_dump($this->tableColumns[$col]['join']['display_mask']);
					if($saveJoin)
					{
						if(isset($info['join']['custom_join']))
						{
							$sets[] = $info['join']['custom_join'];
						}
						else
						{
							$sets[] = $joinType.' join '.$this->addTickMarks($joinTable).' as '.$this->addTickMarks($joinAlias).' on '.$this->addTickMarks($this->dbAndTable.'.'.$joinColumn).' = '.$this->addTickMarks($joinAlias.'.'.$foriegnJoinColumn);
						}
						$counter++;
					}
				}
			}
			if(!empty($sets))
			{
				$this->joinClause = implode($this->queryLineBreak,$sets).$this->queryLineBreak;
			}
			if(strlen($this->customJoin) > 0)
			{
				$this->joinClause .= $this->customJoin.$this->queryLineBreak;
			}
		}
	}
	
	public function formatWhereClause($includeSearches=true)
	{
		$sets = array();
		$whereClause = '';
		if($includeSearches)
		{
			// Quick search
			if(strlen($this->searchString) > 0 && $this->searchType == 'quick')
			{
				$sets = array_merge($sets,$this->getQuickSearchSets());
			}
			// Advanced search
			else if(count($this->advSearches) > 0 && $this->searchType == 'advanced')
			{
				$sets = array_merge($sets,$this->getAdvancedSearchSets());
			}
			
			$glue = 'or';
			if($this->searchType == 'advanced' && $this->matchAll)
			{
				$glue = 'and';
			}
			if(count($sets) > 0)
			{
				$whereClause .= '('.implode(' '.$glue.$this->queryLineBreak,$sets).')';
			}
			
			// Format filters
			if(count($this->filterSearches) > 0)
			{
				$filterSets = $this->getFilterSets();
			}
			if(isset($filterSets) && count($filterSets) > 0)
			{
				$filterClause = '('.implode(' and'.$this->queryLineBreak,$filterSets).')';
				if(strlen($whereClause) > 0)
				{
					$whereClause .= $this->queryLineBreak.' and '.$this->queryLineBreak.$filterClause;
				}
				else
				{
					$whereClause .= $filterClause;
				}
			}
		}
		$dfSets = $this->getDataFilterSets();
		if(count($dfSets) > 0)
		{
			if(strlen($whereClause) > 0)
			{
				$whereClause .= ' and '.$this->queryLineBreak.implode(' and '.$this->queryLineBreak,$dfSets);
			}
			else
			{
				$whereClause .= ' '.implode(' and '.$this->queryLineBreak,$dfSets);
			}
		}
		
		if(strlen($whereClause) > 0)
		{
			$this->whereClause .= ' where '.$whereClause.$this->queryLineBreak;
		}
		if(strlen($this->sqlFilters) > 0)
		{
			if(strlen($this->whereClause) > 0)
			{
				$this->whereClause .= ' and '.$this->sqlFilters.$this->queryLineBreak;
			}
			else
			{
				$this->whereClause .= 'where '.$this->sqlFilters.$this->queryLineBreak;
			}
		}
	}
	
	public function getQuickSearchSets($having=false)
	{
		$preparedSets = array();
		foreach($this->tableColumns as $col => $info)
		{
			if(stristr($info['perms'],'Q'))
			{
				if(($having == false && !isset($info['having'])) || ($having == true && isset($info['having'])))
				{
					$queryParamStr = $col.'_qsearch';
					if(isset($info['join']) && is_array($info['join']))
					{
						// Changed to use alias Sept 2010 to allow for custom joins
						//$joinTable = !empty($info['join']['db']) ? $info['join']['db'].'.'.$info['join']['table'] : $info['join']['table'];
						$joinTable = $info['join']['alias'];
						$info['join']['display_mask'] = isset($info['join']['display_mask']) ? $info['join']['display_mask'] : $joinTable.'.'.$info['join']['column'];
						$preparedSets[] = $this->getPreparedSet($info['join']['display_mask'],'like',$queryParamStr,false);
						$this->queryParams[$queryParamStr] = '%'.$this->searchString.'%';
					}
					else if(isset($info['display_mask']))
					{
						$preparedSets[] = $this->getPreparedSet($info['display_mask'],'like',$queryParamStr,false);
						$this->queryParams[$queryParamStr] = '%'.$this->searchString.'%';
					}
					else
					{
						$preparedSets[] = $this->getPreparedSet($this->dbAndTable.'.'.$col,'like',$queryParamStr);
						$this->queryParams[$queryParamStr] = '%'.$this->searchString.'%';
					}
				}
			}
		}
		return $preparedSets;
	}
	
	public function getAdvancedSearchSets($having=false)
	{
		$preparedSets = array();
		$rangeOps = array('>','<','>=','<=');
		foreach($this->advSearches as $i => $asInfo)
		{
			if(!empty($asInfo['cols']) && stristr($this->tableColumns[$asInfo['cols']]['perms'],'S'))
			{
				if(($having == false && !isset($this->tableColumns[$asInfo['cols']]['having'])) || ($having == true && isset($this->tableColumns[$asInfo['cols']]['having'])))
				{
					if(!isset($this->opts[$asInfo['opts']]))
					{
						// Unknown search operator
						$this->handleHacking();
						continue;
					}
					$queryParamStr = $asInfo['cols'].'_'.$i.'_asearch';
					$isRangeOp = in_array($asInfo['opts'],$rangeOps);
					if($this->convertRangeDates && isset($this->tableColumns[$asInfo['cols']]['calendar']) && $isRangeOp)
					{
						$asInfo['strs'] = $this->formatDate($asInfo['strs'],$this->defaultDbDateFormat);
					}
					$searchCol = '';
					if(isset($this->tableColumns[$asInfo['cols']]['range_mask']) && $isRangeOp)
					{
						$searchCol = $this->tableColumns[$asInfo['cols']]['range_mask'];
					}
					else if(isset($this->tableColumns[$asInfo['cols']]['join']) && is_array($this->tableColumns[$asInfo['cols']]['join']))
					{
						$info = $this->tableColumns[$asInfo['cols']];
						$joinTable = $info['join']['alias'];
						$info['join']['display_mask'] = isset($info['join']['display_mask']) ? $info['join']['display_mask'] : $joinTable.'.'.$info['join']['column'];
						$searchCol = $info['join']['display_mask'];
						/*
						if(isset($info['join']['display_mask']))
						{
							$info['join']['display_mask'] = $info['join']['display_mask'];
							$searchCol = $info['join']['display_mask'];
						}
						else
						{
							// Test adding tick marks here
							$searchCol = $this->addTickMarks($joinTable.'.'.$info['join']['column']);
						}
						*/
					}
					else if(isset($this->tableColumns[$asInfo['cols']]['display_mask']))
					{
						$searchCol = $this->tableColumns[$asInfo['cols']]['display_mask'];
					}
					else
					{
						$searchCol = $this->addTickMarks($this->dbAndTable.'.'.$asInfo['cols']);
					}
					if($asInfo['opts'] == 'like' || $asInfo['opts'] == 'not like')
					{
						$asInfo['strs'] = '%'.$asInfo['strs'].'%';
					}
					//$sets[] = $searchCol.' '.$asInfo['opts']." '".$asInfo['strs']."'";
					$preparedSets[] = $this->getPreparedSet($searchCol,$asInfo['opts'],$queryParamStr,false);
					$this->queryParams[$queryParamStr] = $asInfo['strs'];
				}
			}
		}
		return $preparedSets;
	}
	
	public function getFilterSets($having=false)
	{
		$filterSets = array();
		foreach($this->filterSearches as $filterCol => $filterStr)
		{
			if(isset($this->tableColumns[$filterCol]) && stristr($this->tableColumns[$filterCol]['perms'],'F'))
			{
				if(($having == false && !isset($this->tableColumns[$filterCol]['having'])) || ($having == true && isset($this->tableColumns[$filterCol]['having'])))
				{
					$queryParamStr = $filterCol.'_qfilter';
					// If it is a join column
					if(isset($this->tableColumns[$filterCol]['join']) && is_array($this->tableColumns[$filterCol]['join']))
					{
						$info = $this->tableColumns[$filterCol];
						// Changed to use alias Sept 2010 to allow for custom joins
						//$joinTable = !empty($info['join']['db']) ? $info['join']['db'].'.'.$info['join']['table'] : $info['join']['table'];
						$joinTable = $info['join']['alias'];
						$info['join']['display_mask'] = isset($info['join']['display_mask']) ? $info['join']['display_mask'] : $joinTable.'.'.$info['join']['column'];
						$filterSets[] = $this->getPreparedSet($info['join']['display_mask'],'like',$queryParamStr,false);
						$this->queryParams[$queryParamStr] = '%'.$filterStr.'%';
					}
					else if(isset($this->tableColumns[$filterCol]['display_mask']))
					{
						$displayMask = $this->tableColumns[$filterCol]['display_mask'];
						$filterSets[] = $this->getPreparedSet($displayMask,'like',$queryParamStr,false);
						$this->queryParams[$queryParamStr] = '%'.$filterStr.'%';
					}
					else
					{
						$filterSets[] = $this->getPreparedSet($this->dbAndTable.'.'.$filterCol,'like',$queryParamStr);
						$this->queryParams[$queryParamStr] = '%'.$filterStr.'%';
					}
				}
			}
		}
		return $filterSets;
	}
	
	public function getDataFilterSets($having=false)
	{
		// Format data filters
		$dfSets = array();
		foreach($this->tableColumns as $col => $info)
		{
			if(($having == false && !isset($info['having'])) || ($having == true && isset($info['having'])))
			{			
				$subSets = array();
				if(isset($info['data_filters']))
				{
					if(isset($info['join']['display_mask']))
					{
						foreach($info['data_filters']['filters'] as $df)
						{
							$subSets[] = $info['join']['display_mask'].' '.$df;
						}
					}
					else if(isset($info['display_mask']))
					{
						foreach($info['data_filters']['filters'] as $df)
						{
							$subSets[] = $info['display_mask'].' '.$df;
						}
					}
					else
					{
						$tableName = empty($this->dbName) ? $this->tableName : $this->dbName.'.';
						foreach($info['data_filters']['filters'] as $df)
						{
							$subSets[] = $this->addTickMarks($tableName.'.'.$col).' '.$df;
						}
					}
					if(isset($info['data_filters']['criteria']) && $info['data_filters']['criteria'] == 'any')
					{
						$dfSets[] = '('.implode(' or'.$this->queryLineBreak,$subSets).')';
					}
					else
					{
						$dfSets[] = implode(' and'.$this->queryLineBreak,$subSets);
					}
				}
			}
		}
		return $dfSets;
	}
	
	public function formatHavingClause($includeSearches=true)
	{
		$sets = array();
		$havingClause = '';
		$having = true;
		if($includeSearches)
		{
			// Quick search
			if(strlen($this->searchString) > 0 && $this->searchType == 'quick')
			{
				$sets = array_merge($sets,$this->getQuickSearchSets($having));
			}
			// Advanced search
			else if(count($this->advSearches) > 0 && $this->searchType == 'advanced')
			{
				$sets = array_merge($sets,$this->getAdvancedSearchSets($having));
			}
			
			$glue = 'or';
			if($this->searchType == 'advanced' && $this->matchAll)
			{
				$glue = 'and';
			}
			if(count($sets) > 0)
			{
				$havingClause .= '('.implode(' '.$glue.$this->queryLineBreak,$sets).')';
			}
			// Format filters
			if(count($this->filterSearches) > 0)
			{
				$filterSets = $this->getFilterSets($having);
			}
			if(isset($filterSets) && count($filterSets) > 0)
			{
				$filterClause = '('.implode(' and'.$this->queryLineBreak,$filterSets).')';
				if(strlen($havingClause) > 0)
				{
					$havingClause .= $this->queryLineBreak.' and '.$this->queryLineBreak.$filterClause;
				}
				else
				{
					$havingClause .= $filterClause;
				}
			}
			$dfSets = $this->getDataFilterSets($having);
			if(count($dfSets) > 0)
			{
				if(empty($havingClause))
				{
					$havingClause .= ' '.implode(' and '.$this->queryLineBreak,$dfSets);
				}
				else
				{
					$havingClause .= ' and '.$this->queryLineBreak.implode(' and '.$this->queryLineBreak,$dfSets);
				}
			}
		}
		if(strlen($havingClause) > 0)
		{
			$this->havingClause .= ' having '.$havingClause.$this->queryLineBreak;
		}
		if(strlen($this->havingFilters) > 0)
		{
			if(strlen($this->havingClause) > 0)
			{
				$this->havingClause .= ' and '.$this->havingFilters.$this->queryLineBreak;
			}
			else
			{
				$this->havingClause .= 'having '.$this->havingFilters.$this->queryLineBreak;
			}
		}
	}
	
	public function setNumResults()
	{
		$this->numResults = 0;
		if(strlen($this->groupByClause) > 0)
		{
			$query = 'select * from '.$this->tableName.' '.$this->joinClause.' '.$this->whereClause.' '.$this->groupByClause.' '.$this->havingClause;
			$result = $this->doQuery($query,$this->queryParams);
			if($result)
			{
				$this->numResults = $result->rowCount();
			}
		}
		else
		{
			$query = 'select count(*) as num_results from '.$this->tableName.' '.$this->joinClause.' '.$this->whereClause;
			$result = $this->doQuery($query,$this->queryParams);
			if($row = $result->fetch())
			{
				$this->numResults = $row['num_results'];
			}
		}
	}
	
	public function setPagingVars()
	{
		// Set start variable after the num results variable has been set (could order by vars be set in the main set defaults function???)
		if(isset($this->sessionData['start']) && $this->sessionData['start'] < $this->numResults)
		{
			$this->start = $this->sessionData['start'];
		}
		if(isset($this->sessionData['orderByColumn']))
		{
			$this->orderByColumn = $this->sessionData['orderByColumn'];
		}
		if(isset($this->sessionData['ascOrDesc']))
		{
			$this->ascOrDesc = $this->sessionData['ascOrDesc'];
		}
	}
	
	public function displayTableHtml()
	{
		$html = '';
		$numRows = 0;
		$this->extraOrderByInfo = empty($this->extraOrderByInfo) ? '' : ', '.$this->extraOrderByInfo;
		// Added tick marks using implod/explode in case custom order by columns have periods in them.
		$this->start = (int)$this->start;
		$this->displayNum = (int)$this->displayNum;
		$query = $this->selectClause.' '.$this->joinClause.' '.$this->whereClause.' '.$this->groupByClause.' '.$this->havingClause.' order by '.$this->getOrderByColumn($this->orderByColumn).' '.$this->getAscOrDesc().' '.$this->extraOrderByInfo.' limit '.$this->start.', '.$this->displayNum;
		if($this->viewQuery)
		{
			$this->information[] = '<div id="'.$this->instanceName.'mateViewQuery" align="left">'.nl2br($query).'</div>';
		}
		//$queryParams = array('order_by' => $this->orderByColumn, 'asc_or_desc' => $this->getAscOrDesc());
		$stmt = $this->doQuery($query,$this->queryParams);
		$rows = $stmt->fetchAll();
		$mysqlNumRows = count($rows);
		$html .= '<div>';
		$html .= '<form id="'.$this->instanceName.'table_form" style="margin: 0px;" onsubmit="return false;">';
		$html .= '<table '.$this->tableInfo.'>';
		if($mysqlNumRows > 0 || stristr($this->permissions,'F'))
		{
			$html .= '<tr id="'.$this->instanceName.'header_row" class="header">';
			if(stristr($this->permissions,'M'))
			{
				$html .= '<td id="'.$this->instanceName.'select_all_cb_cell" width="40" align="left"><input type="checkbox" id="'.$this->instanceName.'select_all_cb" onclick="'.$this->instanceName.'.selectCbs(this);" /></td>';
			}
			
			if(stristr($this->permissions,'I') && $this->iconColPosition == 'first')
			{
				$html .= strlen($this->iconTitle) > 0 ? '<td>'.$this->iconTitle.'</td>' : '<td>&nbsp;</td>';
			}
			
			foreach($this->tableColumns as $col => $info)
			{
				if(stristr($info['perms'],'T') && !$this->columnIsHidden($info))
				{
					$colHeaderInfo = isset($info['col_header_info']) ? $info['col_header_info'] : '';
					if(stristr($this->permissions,'F') && stristr($info['perms'],'F'))
					{
						$filterStr = isset($this->filterSearches[$col]) ? $this->filterSearches[$col] : '';
						$filterData = $this->jsonEncode(array($col,$filterStr));
						//var_dump($filterData);
						//$colHeaderInfo .= ' headers="'.$filterData.'"';
						$colHeaderInfo .= ' filterCol="'.$col.'" filterStr="'.htmlspecialchars($filterStr).'"';
					}
					if($this->orderByColumn == $col)
					{
						list($oppAscOrDesc,$arrow) = $this->ascOrDesc == 'asc' ? array('desc','&uarr;') : array('asc','&darr;');
						$html .= '<td '.$colHeaderInfo.' ><a href="javascript: void(0);" onclick="'.$this->instanceName.'.toAjaxTableEditor(\'order_by_changed\', new Array(\''.$col.'\',\''.$oppAscOrDesc.'\'),{updateHistory: true});">'.$info['display_text'].'</a> '.$arrow.'</td>';
					}
					else
					{
						$html .= '<td '.$colHeaderInfo.' ><a href="javascript: void(0);" onclick="'.$this->instanceName.'.toAjaxTableEditor(\'order_by_changed\', new Array(\''.$col.'\',\'asc\'),{updateHistory: true});">'.$info['display_text'].'</a></td>';			
					}
				}
			}
			foreach($this->userColumns as $column)
			{
				$colHeaderInfo = isset($column['col_header_info']) ? $column['col_header_info'] : '';
				$html .= isset($column['title']) ? '<td '.$colHeaderInfo.'>'.$column['title'].'</td>' : '<td '.$colHeaderInfo.'>&nbsp;</td>';
			}
			if(stristr($this->permissions,'I') && $this->iconColPosition == 'last')
			{
				$html .= strlen($this->iconTitle) > 0 ? '<td>'.$this->iconTitle.'</td>' : '<td>&nbsp;</td>';
			}
			$html .= '</tr>';
		}
		if($mysqlNumRows > 0)
		{
			//$bgColor = $this->evenRowColor;
			foreach($rows as $row)
			{
				$numRows++;
				$html .= $this->getRowHtml($row,$numRows);
			}
			if(count($this->columnTotals) > 0)
			{
				$numRows++;
				$html .= $this->getTotalRowHtml($numRows);
			}
			$html .= '</table>';
			$html .= '</form>';
			$html .= '<input type="hidden" id="'.$this->instanceName.'last_row_num" value="'.$numRows.'" />';
			$html .= '</div>';
		}
		else
		{
			$html .= '</table></form></div>';
			$html .= '<div><b>'.$this->langVars->ttlNoRecord.'</b></div>';
		}
		$this->setInnerHtml('tableLayer',$html);
	
		if($this->recordInfo)
		{
			if($this->numResults > 0)
			{
				$end = $this->displayNum + $this->start;
				$end = $end < $this->numResults ? $end : $this->numResults;
				$start = $this->numResults > 0 ? $this->start + 1 : 0;
				$recordHtml = '<div>'.sprintf($this->langVars->ttlDispRecs,$this->instanceName,$start,$this->instanceName,$end,$this->instanceName,number_format($this->numResults)).'</div>';
			}
			else
			{
				$recordHtml = '<div>'.$this->langVars->ttlDispNoRecs.'</div>';
			}
			$this->setInnerHtml('recordLayer',$recordHtml);
		}
	}
	
	public function getTotalRowHtml($numRows)
	{
		$rowInfo = array();
		$rowSets = array();
		$rowSets['style'] = 'font-weight: bold;';
		//$bgColor = ($numRows % 2) == 0 ? $this->evenRowColor : $this->oddRowColor;
		//$rowSets['bgcolor'] = $bgColor;
		foreach($rowSets as $attr => $value)
		{
			$rowInfo[] = $attr.'="'.$value.'"';
		}
		if(stristr($this->permissions,'M'))
		{
			$html .= '<td>&nbsp;</td>';
		}
		if(stristr($this->permissions,'I') && $this->iconColPosition == 'first')
		{
			$html .= '<td>&nbsp;</td>';
		}				
		foreach($this->tableColumns as $col => $info)
		{
			if(stristr($info['perms'],'T'))
			{
				if(isset($this->columnTotals[$col]))
				{
					$html .= '<td>'.number_format($this->columnTotals[$col]).'</td>';
				}
				else
				{
					$html .= '<td>&nbsp;</td>';
				}
			}
		}
		foreach($this->userColumns as $column)
		{
			$html .= '<td>&nbsp;</td>';
		}
		if(stristr($this->permissions,'I') && $this->iconColPosition == 'last')
		{
			$html .= '<td>&nbsp;</td>';
		}
		$html = '<tr '.implode(' ',$rowInfo).' '.$extraRowInfo.'>'.$html.'</tr>';
		return $html;
	}
	
	public function getRowHtml($row,$numRows)
	{
		$rowInfo = array();
		$rowSets = array();
		$rowSets['id'] = $this->instanceName.'row_'.$numRows;
		//$rowSets['class'] = 'ajaxRow';
		//$bgColor = ($numRows % 2) == 0 ? $this->evenRowColor : $this->oddRowColor;
		//$rowSets['bgcolor'] = $bgColor;
		$rowSets['class'] = ($numRows % 2) == 0 ? 'even' : 'odd';
		$cbInfo = $this->getCbInfo($row,$numRows);
		$html = $cbInfo['cb_html'];
		if($cbInfo['has_active_cb']) {
			$rowSets['onclick'] = $this->instanceName.'.rowClicked(\''.$numRows.'\');';
			//$rowSets['style'] = 'cursor: pointer;';
			$rowSets['class'] .= ' clickable';
		}
		
		$extraRowInfo = strlen($this->extraRowInfo) > 0 ? str_replace(array($this->replaceWithId,'#rowNum#'),array($row[$this->primaryKeyCol],$numRows),$this->extraRowInfo) : '';
		
		if(isset($this->modifyRowSets) && is_callable($this->modifyRowSets))
		{
			$rowSets = call_user_func($this->modifyRowSets,$rowSets,$row,$this->instanceName,$numRows);
		}
		foreach($rowSets as $attr => $value)
		{
			$rowInfo[] = $attr.'="'.$value.'"';
		}
		if(stristr($this->permissions,'I') && $this->iconColPosition == 'first')
		{
			$html .= $this->formatIcons($row[$this->primaryKeyCol],$row,$numRows);
		}				
		foreach($this->tableColumns as $col => $info)
		{
			if(stristr($info['perms'],'T') && !$this->columnIsHidden($info))
			{
				$html .= $this->getTableCellHtml($row,$col,$info,$numRows);
			}
		}
		foreach($this->userColumns as $column)
		{
			if(isset($column['call_back_fun']) && is_callable($column['call_back_fun']))
			{
				$html .= call_user_func($column['call_back_fun'],$row,$this->instanceName);
			}
			else
			{
				$html .= '<td>&nbsp;</td>';
			}
		}
		if(stristr($this->permissions,'I') && $this->iconColPosition == 'last')
		{
			$html .= $this->formatIcons($row[$this->primaryKeyCol],$row,$numRows);
		}
		$html = '<tr '.implode(' ',$rowInfo).' '.$extraRowInfo.'>'.$html.'</tr>';

		return $html;
	}
	
	public function getTableCellHtml($row,$col,$info,$mateRowNum)
	{
		$value = isset($row[$col]) ? $row[$col] : '';
		if(isset($info['total_column']) && $info['total_column'])
		{
			$this->columnTotals[$col] = isset($this->columnTotals[$col]) ? $this->columnTotals[$col] + $value : $value;
		}
		$tableCellInfo = isset($info['table_cell_info']) ? $info['table_cell_info'] : '';
		if(isset($info['table_fun']) && is_callable($info['table_fun']))
		{
			$value = call_user_func($info['table_fun'],$col,$value,$row,$this->instanceName,$mateRowNum);
		}
		$value = strlen(trim($value)) > 0 ? $value : '&nbsp;';
		if(isset($info['sub_str']) && strlen(strip_tags($value)) > $info['sub_str'])
		{
			$value = substr(strip_tags($value),0,$info['sub_str']).'...';
		}
		if(($this->escapeHtml && !isset($info['escape_html'])) || (isset($info['escape_html']) && $info['escape_html'])) 
		{
			$value = $this->escapeHtml($value);
		}
		if(strlen($this->searchString) > 0 && $this->useHighlight && $value != '&nbsp;')
		{
			$value = $this->highlightSearchString($this->searchString,$value);
		}
		return '<td '.$tableCellInfo.'>'.$value.'</td>';
	}
	
	public function getCbInfo($row,$numRows,$disabled=false)
	{
		$cbHtml = '';
		$hasActiveCb = false;
		if(stristr($this->permissions,'M'))
		{
			if((is_callable($this->disableMultCbFun) && call_user_func($this->disableMultCbFun,$row,$this->instanceName,$numRows)) || $disabled)
			{
				$cbHtml = '<td><input class="'.$this->instanceName.'_rowCb rowCheckBox" type="checkbox" id="'.$this->instanceName.'cb_'.$numRows.'" value="'.$row[$this->primaryKeyCol].'" disabled="disabled" /></td>';
			}
			else
			{
				$hasActiveCb = true;
				$cbHtml = '<td><input class="'.$this->instanceName.'_rowCb rowCheckBox" type="checkbox" id="'.$this->instanceName.'cb_'.$numRows.'" onclick="'.$this->instanceName.'.checkBoxClicked(this,event)" value="'.$row[$this->primaryKeyCol].'" /></td>';						
			}
		}
		return array('cb_html' => $cbHtml, 'has_active_cb' => $hasActiveCb);
	}
	
	public function getDispNumDropDown()
	{
		$counter = 0;
		$value = $this->displayNumInc;
		$html = '<select id="'.$this->instanceName.'display_number" onchange="'.$this->instanceName.'.toAjaxTableEditor(\'display_num_changed\',this.value,{updateHistory: true});">';
		while($value < $this->maxDispNum && ($value < $this->numResults || $value <= $this->displayNum))
		{
			$value = $value + $this->displayNumInc;
			if($value == $this->displayNum)
			{
				$html .= '<option value="'.$value.'" selected="selected">'.$value.'</option>';
			}
			else
			{
				$html .= '<option value="'.$value.'">'.$value.'</option>';
			}
			$counter++;
		}
		if($counter == 0)
		{
			$html .= '<option value="'.$this->displayNum.'" selected="selected">'.$this->displayNum.'</option>';
		}
		$html .= '</select>';
		return $html;
	}
	
	public function getPageDropDown()
	{
		$pages = array();
		$curPage = round($this->start / $this->displayNum);
		$numPages = ceil($this->numResults / $this->displayNum);
		if($numPages == 0)
		{
			$pages = array(0);
		}
		else if($numPages < $this->showAll) 
		{
			$pages = range(1, $numPages);
		} 
		else 
		{
			for($i = 1; $i <= $this->pageBegin; $i++)
			{
				$pages[] = $i;
			}
			for($i = $numPages - $this->pageEnd; $i <= $numPages; $i++)
			{
				$pages[] = $i;
			}
			$i = $this->pageBegin;
			$x = $numPages - $this->pageEnd;
			$metBoundary = false;
			while($i <= $x)
			{
				if($i >= ($curPage - $this->pageRange) && $i <= ($curPage + $this->pageRange)) 
				{
					$i++;
					$metBoundary = true;
				} 
				else 
				{
					$i = $i + floor($numPages / $this->pagePercent);
	
					if ($i > ($curPage - $this->pageRange) && !$metBoundary)
					{
						$i = $curPage - $this->pageRange;
					}
				}
				if ($i > 0 && $i <= $x) 
				{
					$pages[] = $i;
				}
			}
			sort($pages);
			$pages = array_unique($pages);
		}
	
		$html = '<select id="'.$this->instanceName.'page_number" onchange="'.$this->instanceName.'.toAjaxTableEditor(\'page_num_changed\',this.value,{updateHistory: true});">';
		foreach($pages as $i)
		{
			$value = ($i - 1) * $this->displayNum;
			$value = $value < 0 ? 0 : $value;
			if(($i - 1) == $curPage)
			{
				$html .= '<option value="'.$value.'" selected="selected" style="font-weight: bold">'.$i.'</option>';
			}
			else
			{
				$html .= '<option value="'.$value.'">'.$i.'</option>';
			}
		}
		$html .= '</select>';
		return $html;
	}
	
	public function getPaginationLinks()
	{
		$pages = array();
		$this->pagePercent = 5;
		$this->pageRange = 2;
		$this->pageBegin = 3;
		$this->pageEnd = 2;
		$this->showAll = 10;
		$curPage = round($this->start / $this->displayNum);
		$numPages = ceil($this->numResults / $this->displayNum);
		if($numPages == 0)
		{
			$pages = array(0);
		}
		else if($numPages < $this->showAll)
		{
			$pages = range(1, $numPages);
		}
		else
		{
			for($i = 1; $i <= $this->pageBegin; $i++)
			{
				$pages[] = $i;
			}
			for($i = $numPages - $this->pageEnd; $i <= $numPages; $i++)
			{
				$pages[] = $i;
			}
			$i = $this->pageBegin;
			$x = $numPages - $this->pageEnd;
			$metBoundary = false;
			while($i <= $x)
			{
				if($i >= ($curPage - $this->pageRange) && $i <= ($curPage + $this->pageRange))
				{
					$i++;
					$metBoundary = true;
				}
				else
				{
					$i = $i + floor($numPages / $this->pagePercent);
	
					if ($i > ($curPage - $this->pageRange) && !$metBoundary)
					{
						$i = $curPage - $this->pageRange;
					}
				}
				if ($i > 0 && $i <= $x)
				{
					$pages[] = $i;
				}
			}
			sort($pages);
			$pages = array_unique($pages);
		}
		
		$html = '';
		foreach($pages as $i)
		{
			$value = ($i - 1) * $this->displayNum;
			$value = $value < 0 ? 0 : $value;
			if(($i - 1) == $curPage)
			{
			   
				$html .= '<span class="mateSelPage"><a  href="javascript: void(0);" value="'.$value.'" onclick="'.$this->instanceName.'.toAjaxTableEditor(\'page_num_changed\','.intval($value).',{updateHistory: true});">'.$i.'</a></span>';
			}
			else
			{
				$html .= '<span class="mateNavPage"><a  href="javascript: void(0);" value="'.$value.'" onclick="'.$this->instanceName.'.toAjaxTableEditor(\'page_num_changed\','.intval($value).',{updateHistory: true});">'.$i.'</a></span>';
			}
			$this->numPages++;
		}
		return $html;
	}
	
	public function getAdvancedSearchHtml()
	{
		$html = '<div id="'.$this->instanceName.'searchLayer" class="mateAdvancedSearchDiv">';
		for($i = 0; $i < $this->numAdvSearches; $i++)
		{
			$html .= '<div class="mateAdvancedSearchCriteriaDiv"><span id="'.$this->instanceName.'as_cols_span_'.$i.'"><select id="'.$this->instanceName.'as_cols_'.$i.'" '.$this->asColumnInfo.'><option value="">'.$this->langVars->lblSelect.'</option>';
			foreach ($this->tableColumns as $col => $info)
			{
				if(stristr($info['perms'],'S'))
				{
					if(isset($this->advSearches[$i]['cols']) && $this->advSearches[$i]['cols'] == $col)
					{
						$html .= '<option value="'.$col.'" selected>'.$info['display_text'].'</option>';
					}
					else
					{
						$html .= '<option value="'.$col.'">'.$info['display_text'].'</option>';
					}
				}
			}
			$html .= '</select></span><span id="'.$this->instanceName.'as_opts_span_'.$i.'"><select id="'.$this->instanceName.'as_opts_'.$i.'">';
			foreach ($this->opts as $sign => $text)
			{
				if(isset($this->advSearches[$i]['opts']) && $this->advSearches[$i]['opts'] == $sign)
				{
					$html .= '<option value="'.$sign.'" selected>'.$text.'</option>';
				}
				else
				{
					$html .= '<option value="'.$sign.'">'.$text.'</option>';
				}
			}
			$html .= '</select></span>';
			if(isset($this->advSearches[$i]['strs']))
			{
				$html .= '<span id="'.$this->instanceName.'as_strs_span_'.$i.'"><input type="text" id="'.$this->instanceName.'as_strs_'.$i.'" size="28" value="'.$this->advSearches[$i]['strs'].'" onKeyPress="if('.$this->instanceName.'.enterPressed(event)){'.$this->instanceName.'.handleAdvancedSearch(\''.$this->numAdvSearches.'\'); return false;}" /></span>';
			}
			else
			{
				$html .= '<span id="'.$this->instanceName.'as_strs_span_'.$i.'"><input type="text" id="'.$this->instanceName.'as_strs_'.$i.'" size="28" value="" onKeyPress="if('.$this->instanceName.'.enterPressed(event)){'.$this->instanceName.'.handleAdvancedSearch(\''.$this->numAdvSearches.'\'); return false;}" /></span>';
			}
			$html .= '</div>';
		}
		if(!$this->removeCriteria)
		{
			$allChecked = $this->matchAll ? 'checked="checked"' : '';
			$anyChecked = $this->matchAll ? '' : 'checked="checked"';
			$html .= '<div class="mateCriteriaDiv">'.$this->langVars->lblMatch;
			$html .= '<input type="radio" name="match" value="all" id="'.$this->instanceName.'match_all" '.$allChecked.' onclick="'.$this->instanceName.'.toAjaxTableEditor(\'match_all\',\'\');"> <label for="'.$this->instanceName.'match_all">'.$this->langVars->lblAllCrit.'</label>';
			$html .= '<input type="radio" name="match" value="any" id="'.$this->instanceName.'match_any" '.$anyChecked.' onclick="'.$this->instanceName.'.toAjaxTableEditor(\'match_any\',\'\');"> <label for="'.$this->instanceName.'match_any">'.$this->langVars->lblAnyCrit.'</label>';
			$html .= '</div>';
		}
		$html .= '<div class="mateAdvancedSearchBtnsDiv">';
		$html .= '<button onclick="'.$this->instanceName.'.handleAdvancedSearch(\''.$this->numAdvSearches.'\');">'.$this->langVars->lblSearch.'</button><button onclick="'.$this->instanceName.'.toAjaxTableEditor(\'clear_adv_search\',\'\',{updateHistory: true});">'.$this->langVars->btnCSearch.'</button>';
		$html .= '<button onclick="'.$this->instanceName.'.handleAdvancedSearch(\''.$this->numAdvSearches.'\',true);">'.$this->langVars->btnAddCrit.'</button>';
		$html .= '<input type="hidden" id="'.$this->instanceName.'num_adv_searches" value="'.$this->numAdvSearches.'" />';
		$html .= '</div>';
		$html .= '</div>';
		return $html;
	}
	
	public function highlightSearchString($needle,$haystack)
	{
		if(!empty($needle))
		{
			$highlight = '<span class="highlight">\1</span>';
			//$pattern = '#(%s)#i';
			$pattern = '/(?!<.*?)(%s)(?![^<>]*?>)/i';
			$regex = sprintf($pattern, preg_quote($needle));
			return preg_replace($regex,$highlight,$haystack);
		}
		else
		{
			return $haystack;
		}
	}
	
	public function getSelect($query,$colName,$defaultValue = '', $otherInfo = '')
	{
		$html = '<select id="'.$colName.'" name="'.$colName.'" '.$otherInfo.'><option value="" selected="selected">'.$this->langVars->lblSelect.'</option>';
		$result = $this->doQuery($query);
		while($row = $result->fetch(PDO::FETCH_NUM))
		{
			if($row[0] == $defaultValue)
			{
				$html .= '<option value="'.$row[0].'" selected="selected">'.$row[1].'</option>';
			}
			else
			{
				$html .= '<option value="'.$row[0].'">'.$row[1].'</option>';
			}
		}
		$html .= '</select>';		
		return $html;
	}
	
	public function getSelectFromArray($selArr,$nameAndId,$defaultValue = '', $otherInfo = '')
	{
		$html = '<select id="'.$nameAndId.'" name="'.$nameAndId.'" '.$otherInfo.'><option value="" selected="selected">'.$this->langVars->lblSelect.'</option>';
	
		foreach($selArr as $value => $display)
		{
			if($value == $defaultValue)
			{
				$html .= '<option value="'.$value.'" selected="selected">'.$display.'</option>';
			}
			else
			{
				$html .= '<option value="'.$value.'">'.$display.'</option>';
			}
		}
		$html .= '</select>';		
		return $html;
	}
	
	public function stripTickMarks($string)
	{
		return str_replace('`','',$string);
	}
	
	public function addTickMarks($string)
	{
		return '`'.implode('`.`',explode('.',$string)).'`';
	}
	
	public function getOrderByColumn($column)
	{
		if(isset($this->tableColumns[$column]['order_mask']))
		{
			return $this->tableColumns[$column]['order_mask'];
		}
		else if(isset($this->tableColumns[$column]))
		{
			return $this->addTickMarks($column);
		}
		return $this->addTickMarks($this->primaryKeyCol);
	}
	
	/* Thanks to Otto Ebeling and Max Technologies Ltd for helping with the security functions. */
	public function getAscOrDesc()
	{
	   if($this->ascOrDesc == 'desc')
	   {
		   return 'desc';
	   }
	   else
	   {
		   return 'asc';
	   }
	}
	
	public function hasRightsToRow($id)
	{
		$originalColumns = $this->tableColumns;
		// Unset the hidden columns here because if there are joins there can be more or less rows returned.
		$this->setHiddenColumns();
		$this->formatJoinClause();
		$this->formatSelectClause();
		$this->formatWhereClause(false);
		$queryParams = array('id' => $id);
		$whereClause = strlen($this->whereClause) > 0 ? "and ".$this->tableName.'.'.$this->primaryKeyCol." = :id" : "where ".$this->tableName.'.'.$this->primaryKeyCol." = :id";
		$query = $this->selectClause.' '.$this->joinClause.' '.$this->whereClause.' '.$whereClause;
		//$this->selectClause = '';
		$this->whereClause = '';
		//$this->joinClause = '';
		$this->tableColumns = $originalColumns;
		$this->hiddenColumnsSet = false;
		$result = $this->doQuery($query,$queryParams);
		if($row = $result->fetch())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function hasRightsToRows($idArr)
	{
		$originalColumns = $this->tableColumns;
		// Unset the hidden columns here because if there are joins there can be more or less rows returned.
		$this->setHiddenColumns();
		$this->formatJoinClause();
		$this->formatSelectClause();
		$this->formatWhereClause(false);
		$quotedIdArr = $this->getPdoQuotedArr($idArr);
		$whereClause = strlen($this->whereClause) > 0 ? "and ".$this->tableName.'.'.$this->primaryKeyCol." in (".implode(",",$quotedIdArr).")" : "where ".$this->tableName.'.'.$this->primaryKeyCol." in (".implode(",",$quotedIdArr).")";
		$query = $this->selectClause.' '.$this->joinClause.' '.$this->whereClause.' '.$whereClause;
		//$this->selectClause = '';
		$this->whereClause = '';
		//$this->joinClause = '';
		$this->tableColumns = $originalColumns;
		$this->hiddenColumnsSet = false;
		$result = $this->doQuery($query);
		if($result->rowCount() == count($idArr))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function handleHacking()
	{
		if(isset($this->handleHackingFun) && is_callable($this->handleHackingFun))
		{
			call_user_func($this->handleHackingFun,$this->instanceName);
		}
		exit();
	}
	/* End security functions */
	
	public function setLangVars()
	{
		if(class_exists('LangVars'))
		{
			$this->langVars = new LangVars();
		}
		else
		{
			$langVarsPath = str_replace('AjaxTableEditor.php','lang/LangVars-en.php',__file__);
			if(is_file($langVarsPath))
			{
				require_once($langVarsPath);
				$this->langVars = new LangVars();
			}
			else
			{
				$this->warnings[] = 'The language file could not be found.';
			}
		}
	}
	
	public function getDisplayRowInfo($primaryKeyValue) {
		$query = $this->selectClause.' '.$this->joinClause.' where '.$this->tableName.'.'.$this->primaryKeyCol." = :primaryKeyValue";
		$queryParams = array('primaryKeyValue' => $primaryKeyValue);
		$result = $this->doQuery($query,$queryParams);
		if($row = $result->fetch())
		{
			return $row;
		}
		return array();
	}
	
	public function drawRowInPlace($id,$mateRowNum,$newRow,$drawAfterRowNum='')
	{
		$row = $this->getDisplayRowInfo($id);
		if(count($row) > 0)
		{
			$rowHtml = $this->getRowHtml($row,$mateRowNum);
			if($this->searchType == 'quick' && strlen($this->searchString) > 0 && $this->useHighlight)
			{
				$rowHtml = $this->highlightSearchString($this->searchString,$rowHtml);
			}
			//var_dump($rowHtml);
			if($newRow)
			{
				$this->addJavascript($this->instanceName.'.drawNewRowInPlace(\''.$this->escapeJsData($rowHtml).'\',\''.$drawAfterRowNum.'\');');
			}
			else
			{
				//$this->addJavascript('$(\'#'.$this->instanceName.'row_'.$mateRowNum.'\').replace(\''.$this->escapeJsData($rowHtml).'\');');
				$this->replaceHtml('row_'.$mateRowNum,$rowHtml);
			}
		}
	}
	
	function __construct($tableName,$primaryCol,$errorFun,$permissions,$tableColumns)
	{
		$this->setLangVars();
		$this->tableName = $tableName;
		$this->primaryKeyCol = $primaryCol;
		$this->errorFun = $errorFun;
		$this->permissions = $permissions;
		$this->tableColumns = $tableColumns;
	}
}
?>