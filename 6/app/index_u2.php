<?php
include ("db.php"); 

$query12 = "SELECT * FROM nastaveni WHERE id = 1";
$result12 = mysqli_query($con,$query12);
while ($row = mysqli_fetch_assoc($result12)) {
$gist=$row['gist'];
}

?>


<html>
<head>
<?php
$query13 = "SELECT * FROM nastaveni WHERE id = 1";
$result13 = mysqli_query($con,$query13);
while ($row = mysqli_fetch_assoc($result13)) {
echo "<title>".$row['meta_title']."</title>"; 
}
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
<link rel="stylesheet" href="../leaflet-sidebar.css" />
<!-- sidebar --> 
 
 
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
</head>
 
<body>
<!-- sidebar -->
<div id="sidebar" class="sidebar collapsed">
	<!-- menu -->
	<ul class="sidebar-tabs" role="tablist" style="padding-top:10px;">
		<li><a href="#vrstvy" role="tab"><i class="fa fa-bars"></i><span>Vrstvy</span></a></li>
		<li><a href="#poi" role="tab"><i class="fa fa-user"></i><span>POI</span></a></li>
		<li><a href="#edit" role="tab"><i class="fa fa-edit" style="font-size:120%;"></i><span>Editace</span></a></li>
		<li><a href="#navod" role="tab"><i class="fa fa-info" style="font-size:120%;"></i><span>Návod</span></a></li>
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
		
		<!-- edit -->
		<div class="sidebar-pane" id="edit">
		<h2>Úprava vrstev</h2>
		<p>Kliknutím na název příslušné vrstvy se dostanete do editačního klienta. V něm je nutné být přihlášen (kliknout na login vpravo nahoře).<br /><br /></p>
			<?php
			$query50 = "SELECT * FROM vrstvy WHERE `typ` = 'GEOJSON' AND `zobrazeno` = 'ano' ORDER BY `item_order` ASC";
			$result50 = mysqli_query($con,$query50);
			if ( mysqli_num_rows($result50) ) {
			   while ($row50 = mysqli_fetch_assoc($result50)) {
					echo " <a class=\"upravy\" target=\"_blank\" href=\"http://geojson.io/#id=gist:".$gist."/".$row50['odkaz']."&map=14/49.6491/17.1212\">".$row50['nazev']."</a><br /> ";
					/* echo " <a class=\"upravy\" target=\"_blank\" href=\"upravy.php?id=".$row50['odkaz']."&gist=".$gist."\">".$row50['nazev']."</a><br /> ";*/   
			   }
			   };			
			?>
		</div>
		
		
		
		<!-- navod -->
		<div class="sidebar-pane" id="navod">
			<h2>Návod pro administraci</h2>
			<br />
			<h4>Přílohy</h4>
			<p>Pokud jsou u dané dané vrstvy povoleny přílohy, pak lze přidat/smazat přílohu ve vyskakovacím okně konkrétního místa.</p>
			<br />
			<h4>Úprava vrstev</h4>
			<p>Jednotlivé vrstvy i obsah vyskakovacích oken lze upravit skrz záložku "Editace".<br /><br /></p>

						
		</div>
	</div>
	
	<div class="uroven">
	<?php			
		$query12 = "SELECT * FROM nastaveni WHERE id = 1";
		$result12 = mysqli_query($con,$query12);

		while ($row = mysqli_fetch_assoc($result12)) {
		echo $row['titulek'];
		}
	?></div>
	
</div>

<!-- mapove okno -->
<div style="width:100%; height:100%" id="map">


<div id="logo3"><a href="http://www.geocentrum.cz/" target="_blank" title="www.geocentrum.cz"><img src="../logo.png" /></a> </div>
	
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
}
function centerMap (e) {
  map.panTo(e.latlng);
}
function zoomIn (e) {
  map.zoomIn();
}
function zoomOut (e) {
  map.zoomOut();
}


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
}


// popup okno se vsemi atributy, ktere jsou v atrib.tabulce bez ohledu na vrstvu
function popUp(f,l){
	var out = [];
	if (f.properties){
		for(key in f.properties){
			out.push(key+": "+f.properties[key]);
		}
		l.bindPopup(out.join("<br />"));
	}
}



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


var ikonka_blue = L.icon({
iconUrl: '../pin3.png',
iconSize: [40, 40],
iconAnchor: [20, 40],
popupAnchor: [0, -28]
});			
			
var ikonka_black = L.icon({
iconUrl: '../pin.png',
iconSize: [40, 40],
iconAnchor: [20, 40],
popupAnchor: [0, -28]
});			
<?php

$query9 = "SELECT * FROM vrstvy WHERE `typ` = 'GEOJSON' AND `kartogram` = 'ano' AND `zobrazeno` = 'ano'";
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
			}


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
			}

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
			}

			// nastaveni zruseni zvyrazeni po odjeti mysi
			var vrstva_".$row['id']."
			function reset_".$row['id']."(e) {
				vrstva_".$row['id'].".resetStyle(e.target);
			}


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
				vrstva_".$row['id']." = new L.GeoJSON.AJAX([\"https://gist.githubusercontent.com/".$gist."/".$row['odkaz']."/raw\"],{
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
				vrstva_".$row['id']." = new L.GeoJSON.AJAX([\"https://gist.githubusercontent.com/".$gist."/".$row['odkaz']."/raw\"],{
				draw: true,
				style: style_".$row['id'].",
				onEachFeature: onEachFeature_".$row['id']."
				});
		";	
				   
	}
    ;  





//jednotlive vrstvy GEOJSON bez kartogramu
$query = "SELECT * FROM vrstvy WHERE `typ` = 'GEOJSON' AND `kartogram` = 'ne' AND `zobrazeno` = 'ano'";
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

				var vrstva_".$row['id']." =	new L.GeoJSON.AJAX([\"https://gist.githubusercontent.com/".$gist."/".$row['odkaz']."/raw\"],{
				style: function (feature) {
				return { weight: ".$row['weight'].", color: \"".$row['color']."\", fillOpacity: ".$row['opacity']." };
				},"; if ($row['typ_legenda']=="body") {echo "pointToLayer: function (feature, latlng) {return L.marker(latlng, {icon: ikonka_".$row['color']."});},  ";}; echo "
				onEachFeature:popUp_".$row['id']."";
		} 
		
		else echo "
			var vrstva_".$row['id']." =	new L.GeoJSON.AJAX([\"https://gist.githubusercontent.com/".$gist."/".$row['odkaz']."/raw\"],{
				style: function (feature) {
				return { weight: ".$row['weight'].", color: \"".$row['color']."\", fillOpacity: ".$row['opacity']." };
				},	pointToLayer: function (feature, latlng) {return L.marker(latlng, {icon: ikonka_".$row['color']."});}, 
				onEachFeature:popUp";
		
		echo "    });  	";	   
   }
   } ;
   
   
//jednotlive vrstvy WMS

$query5 = "SELECT * FROM vrstvy WHERE `typ` = 'WMS' AND `zobrazeno` = 'ano'";
$result5 = mysqli_query($con,$query5);
if ( mysqli_num_rows($result5) ) {
   while ($row = mysqli_fetch_assoc($result5)) {

		echo "var vrstva_".$row['id']." = new L.tileLayer.wms(".$row['odkaz']."); ";	   
	}
   } ;   
   
?> 

  
	
// definovani vrstev (nazev, tooltip, legenda)	
var overlays = {
	
<?php
$query2 = "SELECT * FROM vrstvy WHERE `zobrazeno` = 'ano' ORDER BY `item_order` ASC";
$result2 = mysqli_query($con,$query2);
   while ($row = mysqli_fetch_assoc($result2)) {
		echo "	\"".$row['nazev']." ";
			if (isset($row['popisek_legenda']) && strlen($row['popisek_legenda']) > 0) {echo " <span data-tooltip aria-haspopup='true' class='has-tip' title='".$row['popisek_legenda']."'><img src='../info.png' width='15px' height='15px' style='vertical-align:middle;'></span> ";}
		
			if ($row['typ_legenda']=="body") {echo "<span class='legend'><i class='body' style='color:".$row['color'].";'></i></span>\": vrstva_".$row['id'].", ";}
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
  center: [params.lat || 49.646082, params.lng || 17.137400], 
  zoom: params.zoom || 17,
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
$query3 = "SELECT * FROM vrstvy WHERE `nacist_uvod` = 'ano' AND `zobrazeno` = 'ano' ";
$result3 = mysqli_query($con,$query3);
   while ($row = mysqli_fetch_assoc($result3)) {
		echo "	vrstva_".$row['id'].".addTo(map); ";	     
   } 
   
$query16 = "SELECT * FROM nastaveni";
$result16 = mysqli_query($con,$query16);
   while ($row = mysqli_fetch_assoc($result16)) {
		echo "	base_".$row['basemap'].".addTo(map); ";	     
   }
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