<?php

$q = $_GET['q'];
$lay = $_GET['lay'];

include ("db.php");

$query = "SELECT * FROM prilohy WHERE zaznam = '".$q."' AND vrstva = '".$lay."'";
$result = mysqli_query($con,$query);
if ( mysqli_num_rows($result) ) {
   while ($row = mysqli_fetch_assoc($result)) {
	   if ($row['typ']=="JPG/PNG") {echo "<a href=\"prilohy/".$row['odkaz']."\" target=\"_blank\"><img src=\"prilohy/".$row['odkaz']."\"></a> <br />";}
	   if ($row['typ']=="DOC/PDF") {echo "<a href=\"prilohy/".$row['odkaz']."\" class=\"prilohyy\"><i class=\"fa fa-download\"></i> PDF/DOC ke stažení</a> <br />";}
	   echo $row['hodnota'];
	   echo '<br /><br />';
   }
   } else {
      echo 'bez příloh';
   }
?> 