<?php
 header("Content-Type: text/html;charset=UTF-8");
$vrstva = $_GET["vrs"];
$zaznam = $_GET["zaz"];  
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Admin</title>
  
      <script type='text/javascript' src='../jquery-1.11.1.js'></script>
	  
      <link rel="stylesheet" type="text/css" href="../foundation.css">
      <script type='text/javascript' src="./admin/foundation.min.js"></script>
      <script type='text/javascript' src="./admin/foundation.accordion.min.js"></script>
      <script type='text/javascript' src="./admin/foundation.tab.min.js"></script>
    
  
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
  <dd class="active"><a href="#panel2-1">Zadat přílohu pouze jako <b>textovou poznámku</b></a></dd> 
  <dd><a href="#panel2-2">Zadat přílohu <b>ve formě souboru</b> (možno i s textovou poznámkou)</a></dd> 

  </dl> 
  
  <div class="tabs-content " style="margin:20px; width:50%"> 
  <div class="content active" id="panel2-1"> 
	<form enctype="multipart/form-data" action="add2.php" method="POST" accept-charset="UTF-8"> 
	<input type="hidden" name="vrstva" value="<?php echo $vrstva; ?>" >
	<input type="hidden" name = "zaznam" value="<?php echo $zaznam; ?>">
	Text: <input type="text" name ="hodnota"><br>
	<input type="submit" class="button" value="Nahrát text jako přílohu"> 
	</form>

</div> 
  <div class="content" id="panel2-2"> 
<form enctype="multipart/form-data" action="add.php" method="POST" accept-charset="UTF-8"> 
			<div style="float:left; width: 120px; height:70px;"><select name="typ">
			<option value="DOC/PDF" selected="selected">DOC/PDF</option>
			<option value="JPG/PNG">JPG/PNG</option>
			</select> </div>
			<div class="popisek" style="float:left; height:70px; width: 80%; text-align:left;">Pokud vyberete "JPG/PNG" pak se náhled obrázku zobrazí přímo ve vyskakovacím okně. Pokud vyberete "DOC/PDF" tak se zobrazí jen textový odkaz.</div>
 <input type="hidden" name="vrstva" value="<?php echo $vrstva; ?>" >
 <input type="hidden" name = "zaznam" value="<?php echo $zaznam; ?>">
 <input type="hidden" name="MAX_FILE_SIZE" value="104857600" />  <!-- 100MB = 104857600 bytes -->
 <div style="display:block;">
 Soubor: <input type="file" class="input" name="photo"><br>
<span class="popisek">Max. 100 MB. Povolené formáty: *.JPG, *.PNG, *.GIF, *.TIFF, *.DOC, *.DOCX, *.PDF, *.XLS, *.XLSX, *.ZIP, *.RAR, *.TXT</span> <br><br>
 </div>
 Popisek: <input type="text" name="hodnota"><br>
 <span class="popisek">Pro jedno stejné vyskakovací okno lze přidávat i několik různých příloh</span>
 <br><br>
 <input type="submit" value="Nahrát přílohu" class="button"> 
 </form>  </div> 

  </div> 
  
  
</body>


</html>

