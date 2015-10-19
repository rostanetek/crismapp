<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Admin</title>
   <link rel="stylesheet" type="text/css" href="../foundation.css">
   
	<style type='text/css'>
	* { padding:0; margin:0;}
	.popisek { color: grey;  font-size: 0.8em; text-align:center; }
	</style>

   </head>
<body>
  <dl class="tabs tabs" data-tab> 
  <dd class="active"><a href="#panel2-1">Smazat přílohy</a></dd> 
 
  </dl> 

    <div class="tabs-content " style="margin:20px; width:80%"> 
  <div class="content active" id="panel2-1"> 
	




<?php

$vrstva = $_GET["vrs"];
$zaznam = $_GET["zaz"];  
include ("db.php"); 

$query = "SELECT * FROM prilohy WHERE `vrstva` = '".$vrstva."' AND `zaznam` = '".$zaznam."'";
$result = mysqli_query($con,$query);
   while ($row = mysqli_fetch_assoc($result)) {
		echo "<div style=\"float:left; width: 75%;\">";
		echo "".$row['hodnota']." ";	

		if ($row['typ']=="JPG/PNG") {echo "<a href=\"prilohy/".$row['odkaz']."\" target=\"_blank\"><img style=\"vertical-align:top; max-width:300px\"  src=\"prilohy/".$row['odkaz']."\"></a> <br />";}
		if ($row['typ']=="DOC/PDF") {echo "<a href=\"prilohy/".$row['odkaz']."\" class=\"prilohyy\"><i class=\"fa fa-download\"></i> PDF/DOC ke stažení</a> <br />";}
		
		echo "</div><div style=\"float:left; width: 25%;\">";
		echo "<form action=\"delete.php\" method=\"POST\"> <input type=\"hidden\" name=\"id\" value=\"".$row['id']."\"><br><input type=\"submit\" class=\"button\" value=\"Smazat\"> </form>";
		
		echo "</div><hr />";	
		
	};   
   

?>
</div> 
</div> 
</body>
</html>

