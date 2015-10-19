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

$vrstva=$_POST['vrstva']; 
$zaznam=$_POST['zaznam']; 
$hodnota=$_POST['hodnota'];

$typ="";
$pic="";

include ("db.php"); 



mysqli_query($pripoj, "INSERT INTO `prilohy` (typ, odkaz, vrstva, zaznam, hodnota ) VALUES ('$typ', '$pic', '$vrstva', '$zaznam', '$hodnota' ) ") ; 


echo "<div data-alert class=\"alert-box success\">Soubor nahrán jako příloha. Můžete stránku zavřít.</div>";

?> 


</body>
</html>
