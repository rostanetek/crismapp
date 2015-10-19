<?php
/*	require_once('auth2.php'); */
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Admin</title>
  
      <script type='text/javascript' src='../../jquery-1.11.1.js'></script>
	  
      <link rel="stylesheet" type="text/css" href="../../foundation.css">
      <script type='text/javascript' src="foundation.min.js"></script>
      <script type='text/javascript' src="foundation.accordion.min.js"></script>
      <script type='text/javascript' src="foundation.tab.min.js"></script>
    
  
<style type='text/css'>
* { padding:0; margin:0;}
.popisek { color: grey;  font-size: 0.8em; text-align:center; }
.accordion .content { overflow: hidden; }
</style>
  
<!-- zalozky-->
<script type='text/javascript'>//<![CDATA[ 
$(function(){
$(document).foundation();
});//]]>  

</script>

</head>
<body>
   
  <dl class="tabs tabs" data-tab> 
  <dd class="active"><a href="#panel2-1">Nastavení vrstev</a></dd> 
  <dd><a href="#panel2-2">Kartogram</a></dd>
  <dd><a href="#panel2-3">Pořadí vrstev</a></dd>   
  <dd><a href="#panel2-4">Vyhledávání</a></dd> 
  <dd><a href="#panel2-5">Seznam POI bodů</a></dd> 
  <dd><a href="#panel2-6">Obecné nastavení/adapt.scénáře</a></dd>  
  <dd><a href="#panel2-7">Podkladové mapy</a></dd>  
  <dd><a href="#panel2-8">Uživatelé</a></dd> 
  </dl> 
  
  <div class="tabs-content "> 
  <div class="content active" id="panel2-1"> <div class="popisek">Kliknutím na název sloupce v záhlaví tabulku seřadíte.</div> <iframe src="vrstvy.php" width="100%" height="2000px" frameborder="0" scrolling="yes" ></iframe> </div> 
  <div class="content" id="panel2-2"> <div class="popisek">Kliknutím na název sloupce v záhlaví tabulku seřadíte.</div> <iframe src="kartogram.php" width="100%" height="1000px" frameborder="0" scrolling="no" ></iframe> </div>  
  <div class="content" id="panel2-3"> <iframe src="poradi.php" width="100%" height="1000px" frameborder="0" scrolling="no" ></iframe> </div> 
  <div class="content" id="panel2-4"> <div class="popisek">Kliknutím na název sloupce v záhlaví tabulku seřadíte.</div><iframe src="hledani.php" width="100%" height="1000px" frameborder="0" scrolling="no" ></iframe> </div> 
  <div class="content" id="panel2-5"> <div class="popisek">Kliknutím na název sloupce v záhlaví tabulku seřadíte.</div> <iframe src="poi.php" width="100%" height="1000px" frameborder="0" scrolling="no" ></iframe> </div> 
  <div class="content" id="panel2-6"> <div class="popisek">Kliknutím na název sloupce v záhlaví tabulku seřadíte.</div> <iframe src="nastaveni.php" width="100%" height="1000px" frameborder="0" scrolling="no" ></iframe> </div> 
  <div class="content" id="panel2-7"> <div class="popisek">Kliknutím na název sloupce v záhlaví tabulku seřadíte.</div> <iframe src="basemap.php" width="100%" height="1000px" frameborder="0" scrolling="no" ></iframe> </div> 
  <div class="content" id="panel2-8"> <div class="popisek">Kliknutím na název sloupce v záhlaví tabulku seřadíte.</div> <iframe src="members.php" width="100%" height="1000px" frameborder="0" scrolling="no" ></iframe> </div> 
  
  </div> 
  
  
</body>


</html>

