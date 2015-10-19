<?php
/*	require_once('auth.php'); */
?>

<?php
include ("db.php"); 





if($_GET){
	$scenar = $_GET["scenar"];
} 
if(!$_GET){
	$scenar = "default";
}
$query22 = "SELECT * FROM nastaveni WHERE adapt_nazev = '".$scenar."'";
$result22 = mysqli_query($con,$query22);
while ($row = mysqli_fetch_assoc($result22)) {

$adapt_id=$row['id'];
$adapt_idcko = "adapt".$adapt_id;
$adapt_titulek=$row['titulek'];
$adapt_gist=$row['gist'];
$adapt_meta_title=$row['meta_title'];
$adapt_basemap=$row['basemap'];
$adapt_x=$row['x'];
$adapt_y=$row['y'];
$adapt_zoom=$row['zoom'];
$adapt_nazev=$row['adapt_nazev'];
$adapt_css=$row['adapt_css'];
$adapt_load=$row['adapt_load'];
}
?>


<html>
<head>
<?php

echo "<title>".$adapt_meta_title."</title>"; 

?>

<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta http-equiv="Content-language" content="cs" />




<!--[if lt IE 9]>
<script src="../html5shiv.js" type="text/javascript"></script>
<script src="../respond.js" type="text/javascript"></script>
<![endif]-->


<link rel="stylesheet" href="../leaflet.css" />
<link rel="stylesheet" href="../style.css" />
<link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
<!--[if IE]>
<link rel="stylesheet" href="../ie.css">
<![endif]-->
 
 
<!-- zaklad leaflet -->
<script src="../leaflet-src.js"></script>
<script src="../leaflet.ajax.js"></script>
<script src="../proj4-compressed.js"></script>
<script src="../proj4leaflet.js"></script>
<!-- zaklad leaflet -->


<!-- mobilni zarizeni -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!--<script src="../leaflet.twofingerzoom.js"></script>
 mobilni zarizeni -->


<!-- tlacitko home -->
<script src="../leaflet.home.js"></script>
<link rel="stylesheet" href="../leaflet.home.css" />
<!-- tlacitko home -->


<!-- mereni+meritko -->
<link rel="stylesheet" href="../distance.css" />
<link rel="stylesheet" href="../leaflet.draw.css" />
<script src="../leaflet.draw.js"></script>
<script src="../Distance.js"></script>

<link rel="stylesheet" href="../leaflet.measurecontrol.css" />
<script src="../leaflet.draw.js"></script>
<script src="../leaflet.measurecontrol.js"></script>
<!-- mereni+meritko -->


<!-- vyhledavani s naseptavacem -->
<link rel="stylesheet" href="../leaflet-search.css" />
<script src="../leaflet-search2.js"></script>
<!-- vyhledavani s naseptavacem -->


<!-- lokalizace současné pozice -->
<link rel="stylesheet" href="../L.Control.Locate.css" />
<!--[if lt IE 9]>
<link rel="stylesheet" href="../L.Control.Locate.ie.css"/>
<![endif]-->
<script src="../L.Control.Locate.js" ></script>
<!-- lokalizace současné pozice -->


<!-- souradnice -->
<link rel="stylesheet" href="../L.Control.MousePosition.css" />
<script src="../L.Control.MousePosition.js" ></script>
<!-- souradnice -->
  
  
<!-- prave tlacitko mysi --> 
<link rel="stylesheet" href="../leaflet.contextmenu.css"/>
<script src="../leaflet.contextmenu.js"></script>
<!-- prave tlacitko mysi --> 
  
  
<!-- tisk --> 
<link rel="stylesheet" href="../easyPrint.css"/>
<script src="../leaflet.easyPrint.js"></script>
<!-- tisk --> 
	 
	 
<!-- minimap -->  
<link rel="stylesheet" href="../Control.MiniMap.css" />
<script src="../Control.MiniMap.js" type="text/javascript"></script>
<!-- minimap --> 


<!-- sidebar --> 
<script src="../leaflet-sidebar.js"></script>

<!-- sidebar --> 
 
 <?php
 echo "<link rel=\"stylesheet\" href=\"../".$adapt_css."\" >"

 ?>
 
<!-- fulltextove vyhledavani --> 
<script src="../esri-leaflet.js"></script>
<script src="../esri-leaflet-geocoder.js"></script>
<link rel="stylesheet" type="text/css" href="../esri-leaflet-geocoder.css">
<!-- fulltextove vyhledavani --> 


<!-- fullscreen --> 
<script src='../leaflet.fullscreen.js'></script>
<link href='../leaflet.fullscreen.css' rel='stylesheet' />
<!-- fullscreen --> 


<!-- tooltip -->
<script src="../modernizr.js"></script>
<!-- tooltip -->


<!-- zalozky-hledani atributu-->
<link rel="stylesheet" href="../jquery-ui2.css">
<script src="../jquery-1.11.1.js"></script> 
<script src="../jquery-ui.js"></script>
<!-- zalozky hledani atributu-->

<!-- omnivore pro Topojson <script src="../leaflet-omnivore.min.js"></script>-->


<!-- kolecko nacitani za zacatku -->
<script src="../spin.js"></script>
<script src="../leaflet.spin.js"></script>
<!-- kolecko nacitani za zacatku -->


<!-- hledani schovani -->
<script type='text/javascript'>
    $(document).ready(function() {
        $('#showmenu').click(function() {
                $('.menu').toggle("slide");
        });

    });
</script>
<!-- hledani schovani -->


<!-- esri rest --> 
<script src="../shp.min.js"> </script>
<!-- esri rest --> 

<!-- heatmap --> 
<script src="../leaflet-heat.js"></script>
<script src="../esri-leaflet-heatmap-feature-layer.js"></script>
<!-- heatmap --> 

<!-- bodove ikony -->
<script src="../Leaflet.MakiMarkers.js"></script>

<link rel="stylesheet" href="../leaflet.awesome-markers.css">
<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css">
<script src="../leaflet.awesome-markers.js"></script>
<!-- bodove ikony -->


<!-- fancybox --> 
<script type="text/javascript" src="../jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="../jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox({
		width: "90%",
		height: "90%",
		margin: [0, 0, 0, 0] // top, right, bottom, left
		});
	});
</script>
<!-- fancybox --> 
</head>
 
<?php echo "<body onLoad=\"".$adapt_load."\">"; ?>

<!-- sidebar -->
<div id="sidebar" class="sidebar collapsed">
	<!-- menu -->
	<ul class="sidebar-tabs" role="tablist" style="padding-top:10px;">
		<li><a href="#vrstvy" role="tab" id="vrstvy"><i class="fa fa-bars"></i><span>Vrstvy</span></a></li>
		<li><a href="#poi" role="tab" id="poi"><i class="fa fa-user"></i><span>POI</span></a></li>
		<li><a href="#scenar" role="tab" id="scenar"><i class="fa fa-book" style="font-size:120%;"></i><span>Scénář</span></a></li>
		<li><a href="#napoveda" role="tab" id="napoveda"><i class="fa fa-question"></i><span>Návod</span></a></li>
	</ul>


	<div class="sidebar-content active">
		<!-- vrstvy -->
		<div class="sidebar-pane" id="vrstvy">
			<div id="controls"></div>
		</div>
		
		<!-- poi -->
		<div class="sidebar-pane" id="poi">
			<ul class="zalozky">
			<?php			
			$query4 = "SELECT * FROM poi";
			$result4 = mysqli_query($con,$query4);

			while ($row = mysqli_fetch_assoc($result4)) {
			echo "<li><a onclick=\"map.setView([".$row['souradnice']."  ], 18);\" href=\"#\">".$row['nazev']."  </a>"; 
			if (isset($row['popisek_legenda']) && strlen($row['popisek_legenda']) > 0) {echo " <span data-tooltip aria-haspopup='true' class='has-tip' title='".$row['popisek_legenda']."'><img src='../info.png' width='15px' height='15px' style='vertical-align:middle;'></span> ";}
			echo "</li>";
			}
			?>
			</ul>
		</div>
		
	
		
		<!-- scenar -->
		<div class="sidebar-pane" id="scenar">
		<p><br /><br />
			<a class="upravy" href="">Výchozí</a><br /><br />
			<a class="upravy" href="?scenar=pozar">Požár</a><br /><br />
			<a class="upravy" href="?scenar=povoden">Povodeň</a><br /><br />
			<a class="upravy" href="?scenar=vrbetice">Výbuch Vrbětice</a><br /><br />
			</p>	
		</div>
		
		
	
		
		
		<!-- napoveda -->
		<div class="sidebar-pane" id="napoveda">
			<h2>Nápověda</h2> <a href="../navod.pdf" style="color:gold;">ke stažení (PDF)</a>
			<h3>Ovládání mapy</h3>
			V mapě se lze pohybovat pomocí myši tzv. drag&drop - <b>stisknutím levého tlačítka a táhnutím myši do požadovaného směru</b>. Pravým tlačítkem myši vyvoláte kontextovou nabídku, která také umožnuje přiblížení či oddálení mapy. Dvojitý klik do mapy znamená její přiblížení. Pro <b>přiblížení/oddálení lze použít také ikony +/- (viz. níže) nebo kolečko myši</b>.
			<br /><br /><h3>Zobrazení informací</h3>Kliknutím na příslušný objekt v mapě (bod, linii, či plochu) zobrazíte vyskakovací okno s informacemi.
			<br /><br /><h3>Vrstvy</h3>Záložka "Vrstvy" v levém horním rohu umožňuje zobrazit vrstvy v mapě. V horní části se nachází výběr podkladové mapy. Níže je pak k dispozici přehled všech vrstev, které zobrazíte kliknutím na název vrstvy (= zatrhnutím tlačítka). V aplikaci je možné zobrazit libovolný počet vrstev, ale pouze jednu podkladovou mapu.
			<br /><br /><h3>POI - body zájmu</h3>Záložka "POI" v levém horním rohu obsahuje seznam předdefinovaných bodů. Kliknutím na název konkrétního bodu se mapa na něj automaticky přiblíží.
			
			<div style="display:inline-flex; margin-top: 10px;"><div class="napoveda napoveda_hledani" style="float:left;"></div><div style="float:left; padding-left:10px;"><h3>Vyhledávání</h3></div></div>
			<div>Vyhledávání se nachází v pravém horním rohu obrazovky. Nejprve zvolte v záhlaví hledání ("záložkách") co chcete hledat, a posléze zadejte do vyhledávacího pole několik prvních znaků.  Vyhledávání Vám automaticky nabídne dostupné možnosti. Po kliknutí na jednu z možností, se mapa automaticky přiblíží a zvýrazní dané místo. Kliknutím na ikonu lupy, lze hledání minimalizovat.</div>
			
			<div style="display:inline-flex; margin-top: 10px;"><div class="napoveda napoveda_plus" style="float:left;"></div>&nbsp;<div class="napoveda napoveda_minus" style="float:left;"></div><div style="float:left; padding-left:10px;"><h3>Zoom</h3></div></div>
			<div>Umožňují přiblížení/oddálení mapy. Lze použít také kolečko myši v obou směrech, příp. dvojklik levým tlačítkem myši pro přiblížení.</div>
			
			<div style="display:inline-flex; margin-top: 10px;"><div class="napoveda napoveda_home" style="float:left;"></div><div style="float:left; padding-left:10px;"><h3>Domů</h3></div></div>
			<div>Zobrazí výchozí pozici mapy.</div>
			
			<div style="display:inline-flex; margin-top: 10px;"><div class="napoveda napoveda_full" style="float:left;"></div><div style="float:left; padding-left:10px;"><h3>Celá obrazovka</h3></div></div>
			<div>Umožní maximalizovat mapové pole na celou obrazovku monitoru, bez lišt prohlížeče. Pro zrušení zmáčkněte klávesu ESC nebo F11.</div>
			
			<div style="display:inline-flex; margin-top: 10px;"><div class="napoveda napoveda_lokalizace" style="float:left;"></div><div style="float:left; padding-left:10px;"><h3>Lokalizace</h3></div></div>
			<div>Umožní přibližně lokalizovat Vaši aktuální pozici. Přesnost lokalizace se může pohybovat od několika metrů v případě aktivní GPS při přístupu přes mobil/tablet až po několik kilometrů v případě internetového kabelového připojení. <><i>V případě, že používáte Internet Explorer s vyšší mírou zabezpečení a funkce nereaguje (Geolocation error), je potřeba povolit lokalizaci: klávesa alt-Nástroje-Možnosti internetu-záložka Osobní údaje-odškrknout Nikdy nepovolovat webům vyžadovat polohu-kliknout Použít-OK. Následně je třeba znovu načíst mapu (F5).</i></div>
			
			<div style="display:inline-flex; margin-top: 10px;"><div class="napoveda napoveda_tisk" style="float:left;"></div><div style="float:left; padding-left:10px;"><h3>Tisk</h3></div></div>
			<div>Umožní tisk mapy.</div>
			
			<div style="display:inline-flex; margin-top: 10px;"><div class="napoveda napoveda_mereni" style="float:left;"></div><div style="float:left; padding-left:10px;"><h3>Měření</h3></div></div>
			<div>Umožní měření linií a ploch. Klikáním do mapy označte zjišťovaný průběh linie nebo obvodu plochy. Dvojklikem ukončíte měření a zobrazíte obsah měřené plochy (nutné min. 4 body).</div>
		</div>
	</div>
	
	<div class="uroven">
	<?php			
		echo $adapt_titulek;
	?></div>
	
</div>

<!-- mapove okno -->
<div style="width:100%; height:100%" id="map">



	
<!-- hledani - zobrazit/skryt -->	
<div class="hledatko">
	<div id="showmenu" title="Zobrazit/skrýt hledání" onclick="document.getElementById('fulltext').style.display = 'none'; document.getElementById('ui-id-1').click();"></div>
	<div class="menu" >
			
			<!-- vlastni vyhledani -->
			<div id="tabs">
				<ul>
				<?php			
					$query7 = "SELECT * FROM hledani";
					$result7 = mysqli_query($con,$query7);

					while ($row = mysqli_fetch_assoc($result7)) {
					echo "<li><a onclick=\"document.getElementById('fulltext').style.display = 'none';\" href=\"#tabs-".$row['id']."\">".$row['popisek']."</a></li>";
					}
				?>
				<li><a onclick="document.getElementById('fulltext').style.display = 'block';" href="#tabs-0">Hledat adresu</a></li>
				</ul>
				<?php			
					$query8 = "SELECT * FROM hledani";
					$result8 = mysqli_query($con,$query8);

					while ($row = mysqli_fetch_assoc($result8)) {
					echo "<div id=\"tabs-".$row['id']."\"></div>";
					}
				?>
				<div id="tabs-0" style="width:350px; height:36px;"></div>
			</div>
	
	</div>
</div>



</div>


<!-- vlastni script mapy -->
<script type='text/javascript'>
function showCoordinates (e) {
  alert(e.latlng);
};
function centerMap (e) {
  map.panTo(e.latlng);
};
function zoomIn (e) {
  map.zoomIn();
};
function zoomOut (e) {
  map.zoomOut();
};


// ajax pro nacteni priloh
function showUser(str) {
if (str == "") {
	document.getElementById("prilohy").innerHTML = "";
	return;
} else {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("prilohy").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","getuser2.php?q="+str,true);
	xmlhttp.send();
}
};


// popup okno se vsemi atributy, ktere jsou v atrib.tabulce bez ohledu na vrstvu
function popUp(f,l){
	var out = [];
	if (f.properties){
		for(key in f.properties){
			out.push(key+": "+f.properties[key]);
		}
		l.bindPopup(out.join("<br />"));
	}
};



//podkladove mapy
<?php
$query14 = "SELECT * FROM basemap WHERE zobrazeno='ano'";
$result14 = mysqli_query($con,$query14);
while ($row = mysqli_fetch_assoc($result14)) {
echo "var base_".$row['id']." = L.tileLayer('".$row['odkaz']."', {maxZoom: ".$row['maxZoom'].",  maxNativeZoom: ".$row['maxNativeZoom'].", attribution: '".$row['attribution']."' });" ; 
}
?>

var base = {
<?php
$query15 = "SELECT * FROM basemap WHERE zobrazeno='ano'";
$result15 = mysqli_query($con,$query15);
while ($row = mysqli_fetch_assoc($result15)) {
echo "\"".$row['nazev']."";
if (isset($row['popisek_legenda']) && strlen($row['popisek_legenda']) > 0) {echo " <span data-tooltip aria-haspopup='true' class='has-tip' title='".$row['popisek_legenda']."'><img src='../info.png' width='15px' height='15px' style='vertical-align:middle;'></span> ";}
echo " \": base_".$row['id']."," ; 
}
?>
};


var ikonka_red = L.icon({
iconUrl: '../promo_red.png',
iconSize: [20, 20],
iconAnchor: [10, 10],
popupAnchor: [0, -28]
});			
			
var ikonka_orange = L.icon({
iconUrl: '../promo_orange.png',
iconSize: [20, 20],
iconAnchor: [10, 10],
popupAnchor: [0, -28]
});			

var ikonka_violet = L.icon({
iconUrl: '../promo_violet.png',
iconSize: [20, 20],
iconAnchor: [10, 10],
popupAnchor: [0, -28]
});			


<?php
$query17 = "SELECT * FROM vrstvy WHERE zobrazeno='ano' AND typ_legenda='body'";
$result17 = mysqli_query($con,$query17);
while ($row = mysqli_fetch_assoc($result17)) {
echo "
var ikonka_".$row['id']." = L.AwesomeMarkers.icon({
icon: '".$row['weight']."', prefix: 'ion', markerColor: '".$row['color']."', iconColor: '#fff'
});
";
}
?>
<?php

$query9 = "SELECT * FROM vrstvy WHERE `typ` = 'GEOJSON' AND `kartogram` = 'ano' AND `zobrazeno` = 'ano' AND `".$adapt_idcko."` = 'ano'";
$result9 = mysqli_query($con,$query9);
   while ($row = mysqli_fetch_assoc($result9)) {

		echo "
			// nastaveni jednotlivych barev kartogramu // d == 545 ? 'green' : nebo d >= 5 ? '#green' :
			function getColor_".$row['id']."(d) { return  ";
					
					$query9a = "SELECT * FROM kartogram WHERE `vrstva` = '".$row['id']."' ORDER BY `hodnota` DESC";
					$result9a = mysqli_query($con,$query9a);
					while ($row9a = mysqli_fetch_assoc($result9a)) {
						echo "d ".$row9a['vetsimensi']."= ".$row9a['hodnota']." ? '".$row9a['barva']."' : ";
						echo "\r\n";
					}
					
					echo "	 'grey'; //pokud neni v rozmezi
			};


			// nastaveni kartogramu
			function style_".$row['id']."(feature) {
				return {
					weight: ".$row['weight'].", //sila borderu
					";
					
					if ($row['typ_legenda']=="body") {echo "";}
					if ($row['typ_legenda']=="linie") {echo "
						opacity: ".$row['opacity'].", //pruhlednost linie
						color: getColor_".$row['id']."(feature.properties.".$row['kartogram_atribut']."),  //barva borderu
					";}
					if ($row['typ_legenda']=="polyg") {echo "
						fillOpacity: ".$row['opacity'].", //pruhlednost vyplne
						color: '".$row['color']."',  //barva borderu
						fillColor: getColor_".$row['id']."(feature.properties.".$row['kartogram_atribut'].") //barva vyplne
					";}
				
				
					
					echo "
				};
			};

			// nastaveni zvyrazeni pri prejeti mysi
			function zvyrazneni(e) {
				var layer = e.target;

				layer.setStyle({
				//bohuzel zvyrazneni  nefunguje pro linie,proto pozdeji vyple
					weight: ".$row['weight'].",
					color: '#66FF00'
					
				});

				if (!L.Browser.ie && !L.Browser.opera) {
					layer.bringToFront();
				}
			};

			// nastaveni zruseni zvyrazeni po odjeti mysi
			var vrstva_".$row['id']."
			function reset_".$row['id']."(e) {
				vrstva_".$row['id'].".resetStyle(e.target);
			};


			// zkompletovani funkce kartogramu+zvyrazeni pri prejeti mysi		
		";	
			
			
		if (isset($row['priloha_identifikator']) && strlen($row['priloha_identifikator']) > 0) {
			echo "
				// popup okno se vsemi atributy + prilohy
				function onEachFeature_".$row['id']."(f,l){
			";
			
			//bohuzel zvyrazneni nefunguje pro linie,proto tady vyple
			if ($row['typ_legenda']=="polyg") {echo "
				l.on({
					mouseover: zvyrazneni,
					mouseout: reset_".$row['id']."
				});		
			";}
				
				
			echo "	
				var out = [];
				if (f.properties){
			
				for(key in f.properties){
					out.push(key+\": \"+f.properties[key]);
				}
				var q = f.properties.".$row['priloha_identifikator'].";
				var lay = \"".$row['id']."\";
				
				l.bindPopup(out.join(\"<br />\") + \"<br />\" + \"<hr />\" + \"<a class='prilohy' id='xxx' onclick=\\\"showUser('\"+q+\"&lay=\"+lay+\"');style.display='none';\\\">zobrazit přílohy</a> <div id='prilohy'></div> <hr> <a class='novapriloha' href=\\\"nove.php?zaz=\"+ q +\"&vrs=".$row['id']."\\\" target=\\\"_blank\\\">zadat novou přílohu</a> <br /><a class='smazatprilohu' href=\\\"smazat.php?zaz=\"+ q +\"&vrs=".$row['id']."\\\" target=\\\"_blank\\\">smazat přílohu</a>     \" );
				}
				}

				
				//pokud je vrstva jako kartogram, tak tady bez var! to je definovano vyse 	
				vrstva_".$row['id']." = new L.GeoJSON.AJAX([\"https://gist.githubusercontent.com/".$adapt_gist."/".$row['odkaz']."/raw\"],{
				draw: true,
				style: style_".$row['id'].",
				onEachFeature: onEachFeature_".$row['id']."
				});
				
				
				
				
				";
		
		} else echo "
				// popup okno se vsemi atributy bez prilohy
				function onEachFeature_".$row['id']."(feature, layer) {
				layer.on({
					mouseover: zvyrazneni,
					mouseout: reset_".$row['id']."
				});
				
				var out = [];
				if (feature.properties){
					for(key in feature.properties){
						out.push(key+\": \"+feature.properties[key]);
					}
					layer.bindPopup(out.join(\"<br />\"));
				}
			}
			
			
				//pokud je vrstva jako kartogram, tak tady bez var! to je definovano vyse 	
				vrstva_".$row['id']." = new L.GeoJSON.AJAX([\"https://gist.githubusercontent.com/".$adapt_gist."/".$row['odkaz']."/raw\"],{
				draw: true,
				style: style_".$row['id'].",
				onEachFeature: onEachFeature_".$row['id']."
				});
		";	
				   
	}
    ;  





//jednotlive vrstvy GEOJSON bez kartogramu
$query = "SELECT * FROM vrstvy WHERE `typ` = 'GEOJSON' AND `kartogram` = 'ne' AND `zobrazeno` = 'ano' AND `".$adapt_idcko."` = 'ano'";
$result = mysqli_query($con,$query);
if ( mysqli_num_rows($result) ) {
   while ($row = mysqli_fetch_assoc($result)) {
	   
		if (isset($row['priloha_identifikator']) && strlen($row['priloha_identifikator']) > 0) {
			echo "
				// popup okno se vsemi atributy + prilohy
				function popUp_".$row['id']."(f,l){
				var out = [];
				if (f.properties){
			
				for(key in f.properties){
					out.push(key+\": \"+f.properties[key]);
				}
				var q = f.properties.".$row['priloha_identifikator'].";
				var lay = \"".$row['id']."\";
				
				l.bindPopup(out.join(\"<br />\") + \"<br />\" + \"<hr />\" + \"<a class='prilohy' id='xxx' onclick=\\\"showUser('\"+q+\"&lay=\"+lay+\"');style.display='none';\\\">zobrazit přílohy</a> <div id='prilohy'></div>\");
				}
				}

				var vrstva_".$row['id']." =	new L.GeoJSON.AJAX([\"https://gist.githubusercontent.com/".$adapt_gist."/".$row['odkaz']."/raw\"],{
				style: function (feature) {
				return {"; if ($row['typ_legenda']!="body") {echo " weight: ".$row['weight'].", ";}; echo " color: \"".$row['color']."\", fillOpacity: ".$row['opacity']." };
				},"; if ($row['typ_legenda']=="body") {echo "pointToLayer: function (feature, latlng) {return L.marker(latlng, {icon: ikonka_".$row['id']."});},  ";}; echo "
				onEachFeature:popUp_".$row['id']."";
		} 
		
		else echo "
			var vrstva_".$row['id']." =	new L.GeoJSON.AJAX([\"https://gist.githubusercontent.com/".$adapt_gist."/".$row['odkaz']."/raw\"],{
				style: function (feature) {
				return {"; if ($row['typ_legenda']!="body") {echo " weight: ".$row['weight'].", ";}; echo " color: \"".$row['color']."\", fillOpacity: ".$row['opacity']." };
				},	pointToLayer: function (feature, latlng) {return L.marker(latlng, {icon: ikonka_".$row['id']."});}, 
				onEachFeature:popUp";
		
		echo "    });  	";	   
   }
   } ;
   
   
//jednotlive vrstvy WMS

$query5 = "SELECT * FROM vrstvy WHERE `typ` = 'WMS' AND `zobrazeno` = 'ano' ";
$result5 = mysqli_query($con,$query5);
if ( mysqli_num_rows($result5) ) {
   while ($row = mysqli_fetch_assoc($result5)) {

		echo "var vrstva_".$row['id']." = new L.tileLayer.wms(".$row['odkaz']."); ";	   
	}
   } ;  

   //jednotlive vrstvy WMTS

$query5 = "SELECT * FROM vrstvy WHERE `typ` = 'WMTS' AND `zobrazeno` = 'ano'";
$result5 = mysqli_query($con,$query5);
if ( mysqli_num_rows($result5) ) {
   while ($row = mysqli_fetch_assoc($result5)) {

		echo "var vrstva_".$row['id']." = new L.tileLayer(".$row['odkaz']."); ";	   
	}
   } ; 
   
   
//jednotlive vrstvy ESRI REST

$query18 = "SELECT * FROM vrstvy WHERE `typ` = 'ESRI' AND `zobrazeno` = 'ano' ";
$result18 = mysqli_query($con,$query18);
if ( mysqli_num_rows($result5) ) {
   while ($row = mysqli_fetch_assoc($result18)) {

		echo "var vrstva_".$row['id']." = new L.esri.dynamicMapLayer(".$row['odkaz']."); ";	   
	}
   } ;    
   
      //jednotlive vrstvy Esri heatmap

$query19 = "SELECT * FROM vrstvy WHERE `typ` = 'HEATMAP' AND `zobrazeno` = 'ano' ";
$result19 = mysqli_query($con,$query19);
if ( mysqli_num_rows($result19) ) {
   while ($row = mysqli_fetch_assoc($result19)) {

		echo "var vrstva_".$row['id']." = new L.esri.heatmapFeatureLayer(".$row['odkaz']."); ";	   
	}
   } ; 
?> 

   //definovani vyskakovaciho okna pro REST vrstvu vyjezdu
  vrstva_47.bindPopup(function (error, featureCollection) {
    if(error || featureCollection.features.length === 0) {
      return false;
    } else {
      return 	'objectid_12: ' + featureCollection.features[0].properties.objectid_12 + '<br />' +
				'typ: ' + featureCollection.features[0].properties.typ	+ '<br />' +
				'podtyp: ' + featureCollection.features[0].properties.podtyp	+ '<br />' +
				'typ_ssu: ' + featureCollection.features[0].properties.typ_ssu	+ '<br />' +
				'popis_typu: ' + featureCollection.features[0].properties.popis_typu	+ '<br />' +
				'okres: ' + featureCollection.features[0].properties.okres	+ '<br />' +
				'obec: ' + featureCollection.features[0].properties.obec	+ '<br />' +
				'cast_obce: ' + featureCollection.features[0].properties.cast_obce	+ '<br />' +
				'adresa: ' + featureCollection.features[0].properties.ulice	+ featureCollection.features[0].properties.cislo_d	+'<br />' +
				'objekt: ' + featureCollection.features[0].properties.objekt	+ '<br />' +
				'ohlaseni: ' + featureCollection.features[0].properties.ohlaseni	+ '<br />' +
				'lokalizace: ' + featureCollection.features[0].properties.lokalizace	+ '<br />' 
	  ; 
    }
  }); 
	
// definovani vrstev (nazev, tooltip, legenda)	
var overlays = {
	
<?php
$query2 = "SELECT * FROM vrstvy WHERE `zobrazeno` = 'ano' AND `".$adapt_idcko."` = 'ano' ORDER BY `item_order` ASC";
$result2 = mysqli_query($con,$query2);
   while ($row = mysqli_fetch_assoc($result2)) {
		echo "	\"".$row['nazev']." ";
			if (isset($row['popisek_legenda']) && strlen($row['popisek_legenda']) > 0) {echo " <span data-tooltip aria-haspopup='true' class='has-tip' title='".$row['popisek_legenda']."'><img src='../info.png' width='15px' height='15px' style='vertical-align:middle;'></span> ";}
		
			if ($row['typ_legenda']=="body" && $row['id']!="47") {echo "<span class='legend'><div class='awesome-marker-icon-".$row['color']." awesome-marker leaflet-zoom-animated leaflet-clickable' style='float: right;position: relative; top: -13px; max-height: 38px;left: 20px;'><i class='ion ".$row['weight']."' style='color: #fff'></i></div></span>\": vrstva_".$row['id'].", ";}
			/*  natvrdo vlozena legenda pro ESRI REST*/			
			if ($row['typ_legenda']=="body" && $row['id']=="47") {echo "<div class='legend'><img src='http://virtus.upol.cz:6080/arcgis/rest/services/netek15/edit/MapServer/2/images/d98bc5dbd3cd06ed543064772a85eca8' style='vertical-align: middle;' /> Dopravní nehoda<br /><img src='http://virtus.upol.cz:6080/arcgis/rest/services/netek15/edit/MapServer/2/images/05b86ecddee45df7b4e4cdd9a0d78fbf' style='vertical-align: middle;' /> ostatní událost<br /><img src='http://virtus.upol.cz:6080/arcgis/rest/services/netek15/edit/MapServer/2/images/88a45f907e043f2edada9d5ec2f9293e' style='vertical-align: middle;' /> Planý poplach  <br /><img src='http://virtus.upol.cz:6080/arcgis/rest/services/netek15/edit/MapServer/2/images/4bbaddf1a9763eed06ee424e0b3a5827' style='vertical-align: middle;' /> Požár <br /><img src='http://virtus.upol.cz:6080/arcgis/rest/services/netek15/edit/MapServer/2/images/cbd27169e899ddbc92745e107b665b42' style='vertical-align: middle;' /> Technická pomoc <br /><img src='http://virtus.upol.cz:6080/arcgis/rest/services/netek15/edit/MapServer/2/images/4317d5bc9a502c122fd143be70e0336b' style='vertical-align: middle;' /> Záchrana osob  <br /><img src='http://virtus.upol.cz:6080/arcgis/rest/services/netek15/edit/MapServer/2/images/ca40a4a04a55cdbad13eb870642190f7' style='vertical-align: middle;' /> Únik nebezp. látek <br /></div>\": vrstva_".$row['id'].", ";}
			if ($row['typ_legenda']=="esri") {echo " \" : vrstva_".$row['id'].", ";}
			
			if ($row['typ_legenda']=="linie" &&  $row['kartogram']=="ne") {echo "<span class='legend'><i class='linie' style='background:".$row['color'].";height:".$row['weight'].";opacity:".$row['opacity'].";'></i></span>\": vrstva_".$row['id'].", ";}
			if ($row['typ_legenda']=="polyg" &&  $row['kartogram']=="ne") {echo "<span class='legend'><i class='polyg' style='background:".$row['color'].";opacity:".$row['opacity'].";'></i></span>\": vrstva_".$row['id'].", ";}
			
			if ($row['typ_legenda']=="linie" &&  $row['kartogram']=="ano") {echo "<div class='legend'>";
					$query11 = "SELECT * FROM kartogram WHERE `vrstva` = '".$row['id']."' ORDER BY `hodnota` ASC";
					$result11 = mysqli_query($con,$query11);
					while ($row11 = mysqli_fetch_assoc($result11)) {echo "<i class='linie_kart' style='background:".$row11['barva'].";height:".$row['weight'].";opacity:".$row['opacity'].";'></i>"; if (isset($row['kartogram_alias']) && strlen($row['kartogram_alias']) > 0) {echo "".$row['kartogram_alias']."";} else {{echo "".$row['kartogram_atribut']."";}} echo ": ".$row11['hodnota']."<br>";}	 
			echo "</div> \": vrstva_".$row['id'].", ";}
			
			if ($row['typ_legenda']=="polyg" &&  $row['kartogram']=="ano") {echo "<div class='legend'>";
					$query10 = "SELECT * FROM kartogram WHERE `vrstva` = '".$row['id']."' ORDER BY `hodnota` ASC";
					$result10 = mysqli_query($con,$query10);
					while ($row10 = mysqli_fetch_assoc($result10)) {echo "<i class='polyg_kart' style='background:".$row10['barva'].";opacity:".$row['opacity'].";'></i>"; if (isset($row['kartogram_alias']) && strlen($row['kartogram_alias']) > 0) {echo "".$row['kartogram_alias']."";} else {{echo "".$row['kartogram_atribut']."";}} echo ": ".$row10['hodnota']."<br>";}
				echo "</div> \": vrstva_".$row['id'].", ";}
			
		
    echo "\r\n"; 
   }
?> 
};


// nacteni podkladovych + vrstev
var params = {};
window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
  params[key] = decodeURIComponent(value);
});




// vlastni nastaveni mapy
var map = new L.Map('map', {
fullscreenControl: true,
home: true,
  maxZoom: 21,
  <?php
	

		echo " center: [params.lat || ".$adapt_x.", params.lng || ".$adapt_y."],  ";
		echo " zoom: params.zoom || ".$adapt_zoom.", ";
	 
   ?>
  layers: layers,
  twoFingerZoom: true,
		contextmenu: true,
          contextmenuWidth: 140,
	      contextmenuItems: [{
		      text: 'Souřadnice',
		      callback: showCoordinates
	      }, {
		      text: 'Vycentrovat',
		      callback: centerMap
	      }, '-', {
		      text: 'Přiblížit',
		      icon: '../zoom-in.png',
		      callback: zoomIn
	      }, {
		      text: 'Oddálit',
		      icon: '../zoom-out.png',
		      callback: zoomOut
	      }]
});


//zapnuti vrstvy ihned po nacteni
<?php
$query3 = "SELECT * FROM vrstvy WHERE `nacist_uvod` = 'ano' AND `zobrazeno` = 'ano' AND `".$adapt_idcko."` = 'ano'";
$result3 = mysqli_query($con,$query3);
   while ($row = mysqli_fetch_assoc($result3)) {
		echo "	vrstva_".$row['id'].".addTo(map); ";	     
   } 
   

		echo "	base_".$adapt_basemap.".addTo(map); ";	     
  
?> 


// zobrazeni vrstev v sidebaru
var layers = new L.Control.Layers(base, overlays);
layers._map = map;
var controlDiv = layers.onAdd(map);
document.getElementById('controls').appendChild(controlDiv);

// lokalizace polohy
L.control.locate().addTo(map);

// mereni+meritko
map.addControl(new L.Control.Scale());
//var d = new L.Control.Distance(); map.addControl(d);

// tisk
L.easyPrint().addTo(map);

// minimap
var ggl1 = L.tileLayer('http://tile.openstreetmap.org/{z}/{x}/{y}.png')
var miniMap = new L.Control.MiniMap(ggl1, { toggleDisplay: true}).addTo(map);

//souradnice
L.control.mousePosition().addTo(map);

//mereni
L.Control.measureControl().addTo(map);

//sidebar
var sidebar = L.control.sidebar('sidebar').addTo(map);
 
// hledani fulltext
var searchControlF = new L.esri.Controls.Geosearch().addTo(map);
var results = new L.LayerGroup().addTo(map);
searchControlF.on('results', function(data){
	results.clearLayers();
	for (var i = data.results.length - 1; i >= 0; i--) {
	  results.addLayer(L.marker(data.results[i].latlng));
	}
});

  

  
  
<!-- hledani atributu -->
<?php
$query6 = "SELECT * FROM hledani";
$result6 = mysqli_query($con,$query6);
   while ($row = mysqli_fetch_assoc($result6)) {
		echo "	
			var searchControl = new L.Control.Search({layer: vrstva_".$row['vrstva'].", propertyName: '".$row['atribut']."', text: '".$row['popisek']."', wrapper:'tabs-".$row['id']."' });
			searchControl.on('search_locationfound', function(e) {
				e.layer.setStyle({ weight: 5, color: \"#66FF00\", opacity: 1});
				if (!L.Browser.ie && !L.Browser.opera) {
						layer.bringToFront();
					}
			}).on('search_collapsed', function(e) {
				vrstva_".$row['vrstva'].".setStyle({weight: 1, color: \"white\", opacity: 1});	
			});
			map.addControl( searchControl ); 
		";	     
   } 
?> 
</script> 



<!-- tooltip -->
<script src="../foundation.min.js"></script>
<script>
  $(document).foundation();
  
  $(function() {
	$( "#tabs" ).tabs();
	});
</script>
 <!-- tooltip -->
 
</body>
</html>