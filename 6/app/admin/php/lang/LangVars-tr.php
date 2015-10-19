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
 *
 * Turkish Language File - Türkçe Dil Dosyası
 * Ibrahim PALA // Zogor CEO - ibrahim.pala@zogor.com
 * Zogor Tech. R&D and Informatics Co.Ltd. - http://www.zogor.com
 *
 */
// LANGUAGE variables
class LangVars
{
	public $language      = 'Turkish';
	public $locales       = array('tr_TR.utf8','tr_TR','tr','turkish');
	//Class Common
	public $errNoSelect   = 'Mysql bağlantı hatası: Veritabanı %s bağlanılamıyor';
	public $errNoConnect  = 'Mysql bağlantı hatası: Bağlanılamıyor';
	public $errInScript   = '%s kodunun %s satırında hata: %s';
	
	//Class AjaxTableEditor
	//function setDefaults
	public $optLike       = 'İçinde Geçsin';
	public $optNotLike    = 'İçinde Geçmesin';
	public $optEq         = 'Birebir Eşleşsin';
	public $optNotEq      = 'Birebir Eşleşmesin';
	public $optGreat      = 'Büyük Olsun';
	public $optLess       = 'Küçük Olsun';
	public $optGreatEq    = 'Büyük yada Eşit Olsun';
	public $optLessEq     = 'Küçük yada Eşit Olsun';
	
	public $ttlAddRow     = 'Kayıt Ekle';
	public $ttlEditRow    = 'Kaydı Düzenle';
	public $ttlEditMult   = 'Çoklu Kayıt Düzenle';
	public $ttlViewRow    = 'Kaydı Gör';
	public $ttlShowHide   = 'Gösterilen/Gizlenen Sütunlar';
	public $ttlOrderCols  = 'Sütun Sıralaması';
	//function doDefault
	public $errNoAction   = '%s ile ilgili birşey mevcut değil.';
	//function doQuery
	public $errQuery      = 'Aşağıda ki işleyiş ile ilgili problem public:';
	public $errMysql      = 'mysql der ki:';
	public $errPdo        = 'PDO hata:';
	public $errPdoParams  = 'PDO parametreler:';
	// function editMultRows
	public $edit1Row      = 'Aynı anda 1 satır düzenleyebilirsiniz.';
	// function updateRow
	public $errVal        = 'İşaretli alanları düzeltiniz';
	// function updateRowInPlace
	public $errValInPlace = 'Aşağıdaki alanları düzeltin lütfen';
	// function formatIcons
	public $ttlInfo       = 'Bilgi';
	public $ttlEdit       = 'Düzenle';
	public $ttlCopy       = 'Kopyala';
	public $ttlDelete     = 'Sil';
	// function getAdvancedSearchHtml
	public $lblSelect     = 'Seçiniz';
	// All Buttons
	public $btnBack       = 'Geri';
	public $btnCancel     = 'İptal';
	public $btnEdit       = 'Düzenle';
	public $btnAdd        = 'Ekle';
	public $btnUpdate     = 'Düzenle';
	public $btnView       = 'Göster';
	public $btnCopy       = 'Kopyala';
	public $btnDelete     = 'Sil';
	public $btnExport     = 'Dosya Olarak Al';
	public $btnSearch     = 'Arama';
	public $btnCSearch    = 'Aramayı Sıfırla';
	public $btnASearch    = 'Gelişmiş Arama';
	public $btnQSearch    = 'Hızlı Arama';
	public $btnReset      = 'sıfırla';
	public $btnAddCrit    = 'Yeni Kriter';
	public $btnShowHide   = 'Gösterilen/Gizlenen Sütunlar';
	public $btnOrderCols  = 'Sütun Sıralaması';
	public $btnCFilters   = 'Filtreyi Sıfırla';
	public $btnFilters    = 'Filtreyi Uygula';
	// function displayTableHtml
	public $ttlDispRecs   = '<span id="%sstart_rec_num">%s</span> ile <span id="%send_rec_num">%s</span> Arasındaki <span id="%stotal_rec_num">%s</span> Kayıt Gösteriliyor';
	public $ttlDispNoRecs = 'Gösterilecek Kayıt Yok';
	public $ttlRecords    = 'Kayıtlar';
	public $ttlNoRecord   = 'Herhangi Bir Kayıt Bulunmamaktadır';
	public $lblSearch     = 'Arama';
	public $lblPage       = 'Sayfa #:';
	public $lblDisplay    = 'Gösterilen #:';
	public $lblMatch      = 'Eşleşen:';
	public $lblAllCrit    = 'Bütün Kriterler';
	public $lblAnyCrit    = 'Herhangi Bir Kriter';
	// function showHideColumns
	public $ttlColumn     = 'Sütun';
	public $ttlCheckBox   = 'Göster';
	// function handleFileUpload
	public $errFileSize   = '%s çok büyüktü';
	public $errFileReq   = '%s doldurulması gerekmektedir';
}
?>
