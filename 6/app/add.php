<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Admin</title>
   <link rel="stylesheet" type="text/css" href="../foundation.css">
   </head>
<body>


<?php 
header("Content-Type: text/html;charset=UTF-8");

//This is the directory where images will be saved 
$target = "prilohy/"; 
$target = $target . basename( $_FILES['photo']['name']); 

$acceptedFormats = array('jpg', 'JPG', 'jpeg', 'JPEG', 'gif', 'GIF', 'png', 'PNG', 'tif', 'TIF', 'tiff', 'TIFF', 'doc', 'DOC', 'docx', 'DOCX', 'xls', 'XLS', 'xlsx', 'XLSX', 'pdf', 'PDF', 'zip', 'ZIP', 'rar', 'RAR', 'txt', 'TXT' );

if(!in_array(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION), $acceptedFormats)) {
    echo "<div data-alert class=\"alert-box alert \">Chyba. Nepovolený formát přílohy. <a href=\"javascript:history.go(-1)\">ZPĚT</a></div>";

}


else {
	//This gets all the other information from the form 
	$vrstva=$_POST['vrstva']; 
	$zaznam=$_POST['zaznam']; 

	$hodnota=$_POST['hodnota'];
	$typ=$_POST['typ']; 
	$predpona = $vrstva."_".$zaznam; 
	$pic_bez=($_FILES['photo']['name']); 
	$t=time();
	$pic=($predpona."_".$t."_".$_FILES['photo']['name']); 

	include ("db.php"); 

	//Writes the information to the database 
	mysqli_query($pripoj, "INSERT INTO `prilohy` (typ, odkaz, vrstva, zaznam, hodnota ) VALUES ('$typ', '$pic', '$vrstva', '$zaznam', '$hodnota' ) ") ; 

	//Writes the photo to the server 
	if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)) 
	{ 
	rename("prilohy/".$pic_bez, "prilohy/".$pic);
	//Tells you if its all ok 
	echo "<div data-alert class=\"alert-box success\">Soubor nahrán jako příloha. Můžete stránku zavřít.</div> ";  
	} 
	else { 

	//Gives and error if its not 
	echo "<div data-alert class=\"alert-box alert \">Chyba. Soubor se nepodařilo nahrát! Max. povolená velikost souboru je 100MB. <a href=\"javascript:history.go(-1)\">ZPĚT</a></div>"; 
	} 

}
?> 



</body>
</html>