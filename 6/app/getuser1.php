<?php
$q = $_GET['q'];
$lay = $_GET['lay'];

include ("db.php");

$query = "SELECT * FROM prilohy WHERE zaznam = '".$q."' AND vrstva = '".$lay."'";
$result = mysqli_query($con,$query);
if ( mysqli_num_rows($result) ) {
   while ($row = mysqli_fetch_assoc($result)) {
	   echo $row['hodnota'];
	   echo '<br />';
   }
   } else {
      echo 'bez příloh';
   }
?> 