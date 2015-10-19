<?php 

$gist=$_GET['gist']; 
$id=$_GET['id']; 

?>


<html>
<head>
<title>Úpravy</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
</head>
<body style="margin:0;padding:0;font-size:12px;font-family:arial; color:grey;">


<!--<div style="width:100%;height:5%;">
	<div style="width:70%;background-color:lightblue;float:left;height:100%;border-bottom:1px solid white;margin-top:-1px;">popisek vlevo</div>
	<div style="width:30%;background-color:lightblue;float:left;height:100%;border-left:1px solid white;margin-left:-1px;border-bottom:1px solid white;border-bottom:1px solid white;margin-top:-1px;">popisek vpravo</div>
</div>-->



<div style="width:100%;height:100%;display:inline;">
	<div style="width:80%;float:left;height:100%;"><iframe src="http://geojson.io/#id=gist:<?php echo $gist; ?>/<?php echo $id; ?>&map=14/49.6491/17.1212" width="100%" height="100%" frameborder="0" scrolling="no" ></iframe></iframe></div>
	<div style="width:20%;float:left;height:100%;color:black;">
	<ul style=" List-style-type:decimal;padding-right:10px;color:grey;">
		<li>Zkontrolovat přihlášení. Pokud nepřihlášen (= vlevo je zobrazeno "anon&nbsp;|&nbsp;login"), pak <a target="_blank" href="https://github.com/login">přihlásit na GitHub</a> (geocentrum1/heslo123) a poté vlevo kliknout na "login"<br /><br /></li>
		<li>Upravit geometrii nebo atributy v levé části obrazovky<br /><br /></li>
		<li>Zkopírovat zdrojový kód z prostřední části obrazovky (CTRL+A = označit vše, CTRL+C kopírovat)<br /><br /></li>
		<li><a href="https://gist.github.com/<?php echo $gist; ?>/<?php echo $id; ?>/edit" target="_blank">Otevřít úložiště kliknutím zde</a><br /><br /></li>
		<li>Vložit zkopírovaný zdrojový kód do úložiště (CTRL+V) a uložit kliknutím na zelené "Update Gist"<br /><br /></li>
	</ul>
	
	</div>

</div>



</body>
</html>

