-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Počítač: wm53.wedos.net:3306
-- Vygenerováno: Úte 07. dub 2015, 00:57
-- Verze serveru: 5.6.15
-- Verze PHP: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `d61192_disert`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `basemap`
--

CREATE TABLE IF NOT EXISTS `basemap` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nazev` text COLLATE utf8_czech_ci NOT NULL,
  `odkaz` text COLLATE utf8_czech_ci NOT NULL,
  `maxZoom` text COLLATE utf8_czech_ci NOT NULL,
  `maxNativeZoom` text COLLATE utf8_czech_ci NOT NULL,
  `attribution` text COLLATE utf8_czech_ci NOT NULL,
  `zobrazeno` text COLLATE utf8_czech_ci NOT NULL,
  `popisek_legenda` text COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=5 ;

--
-- Vypisuji data pro tabulku `basemap`
--

INSERT INTO `basemap` (`id`, `nazev`, `odkaz`, `maxZoom`, `maxNativeZoom`, `attribution`, `zobrazeno`, `popisek_legenda`) VALUES
(1, 'OpenStreetMap', 'http://{s}.tile.osm.org/{z}/{x}/{y}.png', '22', '18', 'Map data &copy; <a href="http://openstreetmap.org/">OpenStreetMap</a> contributors', 'ano', '&copy; OSM'),
(2, 'Satelitní © ČÚZK', 'http://geoportal.cuzk.cz/WMTS_ORTOFOTO_900913/WMTService.aspx?service=WMTS&request=GetTile&version=1.0.0&layer=orto&style=default&format=image/png&TileMatrixSet=googlemapscompatibleext2:epsg:3857&TileMatrix={z}&TileRow={y}&TileCol={x}', '22', '18', 'WMTS - Ortofoto ČR | &copy ČÚZK <a href="http://www.cuzk.cz">www.cuzk.cz</a>', 'ano', 'blabla'),
(3, 'ZM ČR © ČÚZK', 'http://geoportal.cuzk.cz/WMTS_ZM_900913/WMTService.aspx?service=WMTS&request=GetTile&version=1.0.0&layer=zm&style=default&format=image/jpeg&TileMatrixSet=googlemapscompatibleext2:epsg:3857&TileMatrix={z}&TileRow={y}&TileCol={x}', '22', '18', 'WMTS - Ortofoto ČR | &copy ČÚZK <a href="http://www.cuzk.cz">www.cuzk.cz</a>', 'ano', ''),
(4, 'Šedá referenční', 'http://server.arcgisonline.com/ArcGIS/rest/services/Canvas/World_Light_Gray_Base/MapServer/tile/{z}/{y}/{x}', '22', '18', 'Tiles &copy; Esri &mdash; Esri, DeLorme, NAVTEQ', 'ano', '');

-- --------------------------------------------------------

--
-- Struktura tabulky `hledani`
--

CREATE TABLE IF NOT EXISTS `hledani` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `vrstva` text COLLATE utf8_czech_ci NOT NULL,
  `atribut` text COLLATE utf8_czech_ci NOT NULL,
  `popisek` text COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=5 ;

--
-- Vypisuji data pro tabulku `hledani`
--

INSERT INTO `hledani` (`id`, `vrstva`, `atribut`, `popisek`) VALUES
(3, '46', 'objekt', 'Hledat objekt'),
(4, '44', 'objectid_12', 'Hledat výjezd (ID)');

-- --------------------------------------------------------

--
-- Struktura tabulky `kartogram`
--

CREATE TABLE IF NOT EXISTS `kartogram` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `vrstva` text COLLATE utf8_czech_ci NOT NULL,
  `hodnota` text COLLATE utf8_czech_ci NOT NULL,
  `vetsimensi` text COLLATE utf8_czech_ci NOT NULL,
  `barva` text COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=42 ;

--
-- Vypisuji data pro tabulku `kartogram`
--

INSERT INTO `kartogram` (`id`, `vrstva`, `hodnota`, `vetsimensi`, `barva`) VALUES
(17, '42', '01', '=', '#ffffff'),
(18, '42', '02', '=', '#FFF2F2'),
(19, '42', '03', '=', '#FFE6E6'),
(20, '42', '04', '=', '#FFD9D9'),
(21, '42', '05', '=', '#FFCCCC'),
(22, '42', '06', '=', '#FFBFBF'),
(23, '42', '07', '=', '#FFB2B2'),
(24, '42', '08', '=', '#FFA6A6'),
(25, '42', '09', '=', '#FF9999'),
(26, '42', '10', '=', '#FF8C8C'),
(27, '42', '11', '=', '#FF8080'),
(28, '42', '12', '=', '#FF7373'),
(29, '42', '13', '=', '#FF6666'),
(30, '42', '14', '=', '#FF5959'),
(31, '42', '15', '=', '#FF4C4C'),
(32, '42', '16', '=', '#FF4040'),
(33, '42', '17', '=', '#FF3333'),
(34, '42', '18', '=', '#FF2626'),
(35, '42', '19', '=', '#FF1A1A'),
(36, '42', '20', '=', '#FF0D0D'),
(37, '42', '21', '=', '#FF0000'),
(38, '42', '22', '=', '#D90000'),
(39, '42', '23', '=', '#B90000'),
(40, '42', '24', '=', '#990000'),
(41, '42', '25', '=', '#800000');

-- --------------------------------------------------------

--
-- Struktura tabulky `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `login` varchar(100) NOT NULL DEFAULT '',
  `passwd` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Vypisuji data pro tabulku `members`
--

INSERT INTO `members` (`member_id`, `firstname`, `lastname`, `login`, `passwd`) VALUES
(1, NULL, NULL, 'superadmin', 'superadmin'),
(6, NULL, NULL, 'pokus', 'pokus');

-- --------------------------------------------------------

--
-- Struktura tabulky `nastaveni`
--

CREATE TABLE IF NOT EXISTS `nastaveni` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `titulek` text COLLATE utf8_czech_ci NOT NULL,
  `gist` text COLLATE utf8_czech_ci NOT NULL,
  `meta_title` text COLLATE utf8_czech_ci NOT NULL,
  `basemap` int(4) NOT NULL,
  `x` text COLLATE utf8_czech_ci NOT NULL,
  `y` text COLLATE utf8_czech_ci NOT NULL,
  `zoom` int(2) NOT NULL,
  `adapt_nazev` text COLLATE utf8_czech_ci NOT NULL,
  `adapt_css` text COLLATE utf8_czech_ci NOT NULL,
  `adapt_load` text COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=5 ;

--
-- Vypisuji data pro tabulku `nastaveni`
--

INSERT INTO `nastaveni` (`id`, `titulek`, `gist`, `meta_title`, `basemap`, `x`, `y`, `zoom`, `adapt_nazev`, `adapt_css`, `adapt_load`) VALUES
(1, '<a target="_blank" href="http://www.hzscr.cz/hzs-olomouckeho-kraje.aspx"><img src="http://rostanetek.cz/disertace/2/logo2.png" />&nbsp;&nbsp;&nbsp;HZS Olomouckého kraje</a>', 'rostanetek', 'Mapový klient [#6] - default', 1, '49.593687', '17.251614', 13, 'default', 'sidebar.css', ''),
(2, '<a target="_blank" href="http://www.hzscr.cz/hzs-olomouckeho-kraje.aspx"><img src="http://rostanetek.cz/disertace/2/logo2.png" />&nbsp;&nbsp;&nbsp;HZS OK</a> POŽÁR', 'rostanetek', 'Mapový klient [#6] - pozar', 4, '49.593687', '17.251614', 10, 'pozar', 'sidebar_red.css', 'document.getElementById(''vrstvy'').click(); document.getElementById(''showmenu'').click();'),
(3, '<a target="_blank" href="http://www.hzscr.cz/hzs-olomouckeho-kraje.aspx"><img src="http://rostanetek.cz/disertace/2/logo2.png" />&nbsp;&nbsp;&nbsp;HZS OK</a> POVODEŇ 1997', 'rostanetek', 'Mapový klient [#6] - povodeň 1997', 2, '49.593687', '17.251614', 13, 'povoden', 'sidebar_blue.css', 'document.getElementById(''vrstvy'').click(); document.getElementById(''showmenu'').click();'),
(4, 'VÝBUCH VRBĚTICE', 'rostanetek', 'Mapový klient [#6] - výbuch Vrbětice', 2, '49.116052', '17.908707', 15, 'vrbetice ', 'sidebar_orange.css', 'document.getElementById(''vrstvy'').click(); document.getElementById(''ui-id-3'').click();');

-- --------------------------------------------------------

--
-- Struktura tabulky `poi`
--

CREATE TABLE IF NOT EXISTS `poi` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nazev` text COLLATE utf8_czech_ci NOT NULL,
  `souradnice` text COLLATE utf8_czech_ci NOT NULL,
  `popisek_legenda` text COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=5 ;

--
-- Vypisuji data pro tabulku `poi`
--

INSERT INTO `poi` (`id`, `nazev`, `souradnice`, `popisek_legenda`) VALUES
(1, 'Výchozí bod', '49.593687, 17.251614', 'Domů'),
(2, 'Uničov', '49.7698978, 17.1180503', ''),
(4, 'Litovel', '49.7020253, 17.0749311', '');

-- --------------------------------------------------------

--
-- Struktura tabulky `prilohy`
--

CREATE TABLE IF NOT EXISTS `prilohy` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `typ` text COLLATE utf8_czech_ci NOT NULL COMMENT 'JPG/PNG nebo DOC/PDF',
  `odkaz` text COLLATE utf8_czech_ci NOT NULL,
  `vrstva` varchar(8) COLLATE utf8_czech_ci NOT NULL,
  `zaznam` varchar(8) COLLATE utf8_czech_ci NOT NULL,
  `hodnota` text COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=76 ;

--
-- Vypisuji data pro tabulku `prilohy`
--

INSERT INTO `prilohy` (`id`, `typ`, `odkaz`, `vrstva`, `zaznam`, `hodnota`) VALUES
(3, '', '', '1', '545', 'následující obr. vložen jako HTML kód: <img src="http://www.geocentrum.cz/Content/images/logo.png">'),
(4, '', '', '1', '590', 'uuuu'),
(5, '', '', '1', '589', 'pppp'),
(6, '', '', '12', '1', 'xxx'),
(7, '', '', '28', '387', 'xxx'),
(8, '', '', '8', '1009', 'uuuuuu'),
(49, 'JPG/PNG', '1_543_x.jpg', '1', '543', 'popiseeek obrazku x'),
(57, 'DOC/PDF', '1_545_Bigdata.doc', '1', '545', 'bigdata'),
(60, '', '__', '', '', ''),
(62, '', '__', '', '', ''),
(72, 'JPG/PNG', '1_544_1421241373_Clipboard01.JPG', '1', '544', '1'),
(75, 'JPG/PNG', '1_544_1421247942_Clipboard01.JPG', '1', '544', '3');

-- --------------------------------------------------------

--
-- Struktura tabulky `vrstvy`
--

CREATE TABLE IF NOT EXISTS `vrstvy` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nazev` text COLLATE utf8_czech_ci NOT NULL,
  `zobrazeno` text COLLATE utf8_czech_ci NOT NULL,
  `nacist_uvod` text COLLATE utf8_czech_ci NOT NULL,
  `kartogram` text COLLATE utf8_czech_ci NOT NULL,
  `kartogram_atribut` text COLLATE utf8_czech_ci NOT NULL,
  `kartogram_alias` text COLLATE utf8_czech_ci NOT NULL,
  `typ` text COLLATE utf8_czech_ci NOT NULL,
  `rest_layer` int(2) NOT NULL,
  `typ_legenda` text COLLATE utf8_czech_ci NOT NULL,
  `odkaz` text COLLATE utf8_czech_ci NOT NULL COMMENT 'WMS:cela adresa,GEOJSON: id gistu,pozor nesmi byt prazdna mezera na konci',
  `weight` text COLLATE utf8_czech_ci NOT NULL,
  `color` text COLLATE utf8_czech_ci NOT NULL,
  `opacity` text COLLATE utf8_czech_ci NOT NULL,
  `priloha_identifikator` text COLLATE utf8_czech_ci NOT NULL,
  `popisek_legenda` text COLLATE utf8_czech_ci NOT NULL,
  `item_order` int(4) NOT NULL,
  `adapt1` text COLLATE utf8_czech_ci NOT NULL,
  `adapt2` text COLLATE utf8_czech_ci NOT NULL,
  `adapt3` text COLLATE utf8_czech_ci NOT NULL,
  `adapt4` text COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci AUTO_INCREMENT=64 ;

--
-- Vypisuji data pro tabulku `vrstvy`
--

INSERT INTO `vrstvy` (`id`, `nazev`, `zobrazeno`, `nacist_uvod`, `kartogram`, `kartogram_atribut`, `kartogram_alias`, `typ`, `rest_layer`, `typ_legenda`, `odkaz`, `weight`, `color`, `opacity`, `priloha_identifikator`, `popisek_legenda`, `item_order`, `adapt1`, `adapt2`, `adapt3`, `adapt4`) VALUES
(24, 'Železnice', 'ano', 'ne', 'ne', '', '', 'GEOJSON', 0, 'linie', '7fee95b26468c8b8c70d', '2', 'black', '1', '', '', 22, 'ano', 'ne', 'ne', 'ne'),
(25, 'Katastralní', 'ano', 'ne', 'ne', '', '', 'WMS', 0, 'linie', '''http://services.cuzk.cz/wms/wms.asp'',{	''interactive'': true,	''layers'':''RST_KN_I,RST_KMD_I,parcelni_cisla_i,hranice_parcel_i,omp'',	''format'': ''image/png'',		''transparent'': true,	''attribution'': ''Katastrální mapa ČR &copy ČÚZK'',		''draw'':true,	crs: L.CRS.EPSG900913	}', '2', 'white', '0.8', '', 'WMS: &copy; ČUZK. Viditelné při maximálním přiblížení', 24, 'ano', 'ne', 'ne', 'ne'),
(28, 'Polohopi', 'nee', 'ne', 'ano', 'KUL', 'vlastniiii', 'GEOJSON', 0, 'polyg', 'ae9d1cc23db3a992bbec', '1', 'white', '0.8', 'CISLO', 'kartogram polygon', 2, 'ano', 'ne', 'ne', 'ne'),
(33, 'Zastavěné území', 'ano', 'ne', 'ne', '', '', 'GEOJSON', 0, 'polyg', 'f32f83aaa163000bcb41', '1', 'lightgrey', '0.5', '', '', 25, 'ano', 'ne', 'ne', 'ne'),
(34, 'Zástavba', 'ano', 'ne', 'ne', '', '', 'GEOJSON', 0, 'polyg', '9521dc012f5c57250652', '1', 'darkgrey', '0.5', '', '', 0, 'ano', 'ne', 'ne', 'ne'),
(35, 'Vodstvo', 'ano', 'ne', 'ne', '', '', 'GEOJSON', 0, 'polyg', '424ae857d9ad6dc5d069', '1', 'lightblue', '0.7', '', '', 20, 'ano', 'ne', 'ne', 'ne'),
(36, 'Silnice', 'ano', 'ne', 'ne', '', '', 'GEOJSON', 0, 'linie', '7c30b50e764584333df5', '1', 'white', '0.7', '', '', 21, 'ano', 'ne', 'ano', 'ne'),
(37, 'KÚ Olomouc', 'ano', 'ne', 'ne', '', '', 'GEOJSON', 0, 'polyg', '6bc06e9e9eb23355e01e', '2', 'purple', '0.5', '', '', 27, 'ano', 'ne', 'ano', 'ne'),
(38, 'SDH', 'ano', 'ne', 'ne', '', '', 'GEOJSON', 0, 'body', '777f0103a1a54eeb3985', 'ion-home', 'gray', '1', '', '', 19, 'ano', 'ano', 'ano', 'ne'),
(39, 'Městské části', 'ano', 'ne', 'ne', '', '', 'GEOJSON', 0, 'polyg', 'cdcd31f98e09e425b72c', '1', 'DeepPink', '0.5', '', '', 26, 'ano', 'ne', 'ne', 'ne'),
(40, 'HZS', 'ano', 'ne', 'ne', '', '', 'GEOJSON', 0, 'body', '1fc3535fe60885ead076', 'ion-home', 'black', '1', '', '', 18, 'ano', 'ano', 'ano', 'ne'),
(41, 'Funkční plochy', 'nee', 'ne', 'ne', '', '', 'GEOJSON', 0, 'polyg', 'c9763f8b7984bdc53531', '1', 'green', '0.7', '', '', 0, 'ano', 'ne', 'ne', 'ne'),
(42, 'Časová dostupnost', 'ano', 'ne', 'ano', 'ToBreak', 'zóna', 'GEOJSON', 0, 'polyg', '7d8fe3dd79409f2b864d', '1', '#800000', '0.7', '', '', 23, 'ano', 'ne', 'ne', 'ne'),
(43, 'Adresní body', 'ne', 'ne', 'ne', '', '', 'GEOJSON', 0, 'body', '7df7b1233bb7e1ac2201', 'ion-fireball', 'green', '1', '', '', 0, 'ano', 'ne', 'ne', 'ne'),
(44, 'Výjezdy', 'ano', 'ne', 'ne', '', '', 'GEOJSON', 0, 'body', 'afc542e5a34967c4b01f', 'ion-flame', 'red', '1', '', '', 14, 'ano', 'ano', 'ne', 'ne'),
(45, 'Zóny ochrany', 'ano', 'ne', 'ne', '', '', 'GEOJSON', 0, 'polyg', '98259e720dfede899470', '1', '#FF4500', '0.5', '', 'Evakuační zóny ', 17, 'ano', 'ano', 'ano', 'ano'),
(46, 'Objekty', 'ano', 'ne', 'ne', '', '', 'GEOJSON', 0, 'body', '32fb96f529cabc2db3dc', 'ion-alert-circled', 'orange', '1', '', '', 16, 'ano', 'ano', 'ano', 'ne'),
(47, 'Výjezdy REST', 'ano', 'ano', 'ne', '', '', 'ESRI', 2, 'esri', '''http://virtus.upol.cz:6080/arcgis/rest/services/netek15/edit/MapServer'', {layers: [2]}', '1', 'red', '1', '', 'ESRI REST dynamická vrstva z ArcGIS Serveru (http://virtus.upol.cz:6080/arcgis/rest/services/netek15/edit/MapServer/2). Lze kliknout pro zobrazení vyskakovacího okna, ale není detekováno změnou kurzoru.', 1, 'ano', 'ne', 'ne', 'ne'),
(48, 'Heatmap výjezdů', 'ano', 'ne', 'ne', '', '', 'HEATMAP', 0, 'esri', '''http://virtus.upol.cz:6080/arcgis/rest/services/netek15/edit/FeatureServer/2'', {radius: 20, minOpacity:0.5}', '1', 'red', '0', '', 'Esri heatmap', 15, 'ano', 'ano', 'ne', 'ne'),
(49, 'Zóny REST', 'ano', 'ano', 'ne', '', '', 'ESRI', 0, 'esri', '''http://virtus.upol.cz:6080/arcgis/rest/services/netek15/edit/MapServer'', {layers: [1]}', '1', 'black', '1', '', '', 8, 'ano', 'ne', 'ne', 'ne'),
(50, 'Objekty REST', 'ano', 'ano', 'ne', '', '', 'ESRI', 0, 'esri', '''http://virtus.upol.cz:6080/arcgis/rest/services/netek15/edit/MapServer'', {layers: [0]}', '1', 'black', '1', '', '', 9, 'ano', 'ne', 'ne', 'ne'),
(51, 'Ortofoto (sev. Morava)', 'ano', 'ne', 'ne', '', '', 'WMTS', 0, 'esri', '''http://rostanetek.cz/disertace/tileserver/landsat/{z}/{x}/{y}.png'', {}', '1', 'black', '1', '', 'Vlastní WMTS publikované skrz tileserver. Pouze pro zoom: 6-11. Zdroj: Landsat.', 29, 'ne', 'ano', 'ne', 'ne'),
(52, 'Ortofoto (2007)', 'ano', 'ne', 'ne', '', '', 'WMTS', 0, 'esri', '''http://rostanetek.cz/disertace/tileserver/geodis/{z}/{x}/{y}.png'', {maxZoom: 22}', '1', 'black', '1', '', 'Vlastní WMTS publikované skrz tileserver. Zdroj: Geodis, licence: KGI UP.', 28, 'ano', 'ano', 'ano', 'ne'),
(53, 'Zasažená uliční síť', 'ano', 'ano', 'ne', '', '', 'GEOJSON', 0, 'linie', '046a7a6097ee51eb180a', '2', 'red', '1', '', 'Uliční síť zasažená při povodni 1997', 10, 'ne', 'ne', 'ano', 'ne'),
(54, 'Zasažená zástavba', 'ano', 'ano', 'ne', '', '', 'GEOJSON', 0, 'polyg', 'b0ef4f1e9eeaca56b102', '1', 'red', '0.7', '', 'Zástavba zatopená při povodni 1997', 11, 'ne', 'ne', 'ano', 'ne'),
(55, 'Zasažená oblast', 'ano', 'ano', 'ne', '', '', 'GEOJSON', 0, 'polyg', 'bc67dd8366901176b58d', '1', 'lightblue', '0.5', '', 'Zatopená oblast při povodních 1997', 12, 'ne', 'ne', 'ano', 'ne'),
(56, 'Q100', 'ano', 'ne', 'ne', '', '', 'GEOJSON', 0, 'polyg', 'bc6b6494337d40851807', '1', 'lightblue', '0.75', '', 'Hranice stoleté vody (Q100)', 13, 'ne', 'ne', 'ano', 'ne'),
(57, 'Copernicus EMSR113 (Reference Map)', 'ano', 'ne', 'ne', '', '', 'WMTS', 0, 'esri', '''http://rostanetek.cz/disertace/tileserver/vrbetice2/{z}/{x}/{y}.png'', {maxZoom: 22}', '1', 'black', '1', '', '07.12.2014 ', 2, 'ne', 'ne', 'ne', 'ano'),
(58, 'Copernicus EMSR113 (Delineation)', 'ano', 'ne', 'ne', '', '', 'WMTS', 0, 'esri', '''http://rostanetek.cz/disertace/tileserver/vrbetice_vybuch/{z}/{x}/{y}.png'', {maxZoom: 22}', '1', 'black', '1', '', '9.12.2014', 3, 'ne', 'ne', 'ne', 'ano'),
(59, 'Zástavba', 'ano', 'ano', 'ne', '', '', 'GEOJSON', 0, 'polyg', 'ffa40998020ef99d4321', '1', 'purple', '0.7', '', '', 4, 'ne', 'ne', 'ne', 'ano'),
(60, 'Ohrožené obce', 'ano', 'ano', 'ne', '', '', 'GEOJSON', 0, 'polyg', 'f27b41995825163dbc95', '1', 'white', '0.7', '', '', 5, 'ne', 'ne', 'ne', 'ano'),
(61, 'Komunikace', 'ano', 'ano', 'ne', '', '', 'GEOJSON', 0, 'linie', 'e525bc1a7a5752389f67', '2', 'purple', '1', '', '', 6, 'ne', 'ne', 'ne', 'ano'),
(62, 'Rozmístění jednotek AČR', 'ano', 'ano', 'ne', '', '', 'GEOJSON', 0, 'body', 'fd896f29188c6001f6a3', 'ion-eye', 'green', '1', '', 'Fiktivní vrstva', 7, 'ne', 'ne', 'ne', 'ano'),
(63, 'Výbuchy', 'ano', 'ano', 'ne', '', '', 'GEOJSON', 0, 'body', '547e405353f758e8c42a', 'ion-radio-waves', 'red', '1', '', 'Reálná místa výbuchů', 0, 'ne', 'ne', 'ne', 'ano');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
