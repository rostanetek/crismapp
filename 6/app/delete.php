<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Admin</title>
   <link rel="stylesheet" type="text/css" href="../foundation.css">
   </head>
<body>



<?php
include ("db.php"); 
$id=$_POST['id'];  
mysqli_query($pripoj, "DELETE FROM `prilohy` WHERE `id` = '".$id."'") 
or die(mysql_error());  

echo "<div data-alert class=\"alert-box success\">Smazáno. Můžete stránku zavřít.</div>";

?>



</body>
</html>
