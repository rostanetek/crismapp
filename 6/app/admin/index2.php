<?php

include('../db.php');
$pdo = connect();
$sql = 'SELECT * FROM vrstvy ORDER BY item_order ASC';
$query = $pdo->prepare($sql);
$query->execute();
$list = $query->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Administrace</title>


<!-- poradi vrstev -->
<link rel="stylesheet" href="style.css" />
<script type="text/javascript" src="../jquery-1.11.1.js"></script>
<script type="text/javascript" src="jquery-ui-1.10.4.custom.min.js"></script>
<!-- poradi vrstev -->


<!-- accordion -->
<link rel="stylesheet" href="../jquery-ui.css">
<script src="../jquery-ui.js"></script>

<script>
 $(function() {
$( "#accordion" ).accordion({
collapsible: true,active: false
});
});
</script>
<!-- accordion -->
</head>

<body>

<div id="accordion">
<h3>Nastavení vrstev + kartogramů</h3>
<div>
<p>
aaaa
</p>
</div>


<h3>Pořadí vrstev</h3>
<div>
<p>
Přetažením změníte pozici vrstev. 
    <div class="container">

        <div class="content">

        <ul id="sortable">
            <?php
            foreach ($list as $rs) {
            ?>
            <li id="<?php echo $rs['id']; ?>">
                <span></span>
               
                <div><h2><?php echo $rs['item_order']." / ".$rs['nazev']; ?></h2></div>
            </li>
            <?php
            }
            ?>
        </ul>
        </div><!-- content -->    

    </div><!-- container -->
	
	<script type="text/javascript">
	$(function() {
    $('#sortable').sortable({
        axis: 'y',
        opacity: 0.7,
        handle: 'span',
        update: function(event, ui) {
            var list_sortable = $(this).sortable('toArray').toString();
    		// change order in the database using Ajax
            $.ajax({
                url: 'set_order.php',
                type: 'POST',
                data: {list_order:list_sortable},
                success: function(data) {
                    //finished
                }
            });
        }
    }); // fin sortable
	});
	</script>


</p>
</div>


<h3>Nastavení vyhledávání</h3>
<div>
<p>
aaaa
</p>
</div>

<h3>Seznam POI bodů</h3>
<div>
<p>


<!-- <?php
$query = "SELECT * FROM poi";
$result = mysqli_query($con,$query);
   while ($row = mysqli_fetch_assoc($result)) {
		echo " ".$row['nazev']." / ".$row['souradnice']."";	
		echo "<form action=\"delete.php\" method=\"POST\"> <input type=\"hidden\" name=\"id\" value=\"".$row['id']."\"><input type=\"submit\" value=\"Smazat\"> </form>";
		
		echo "<br />";	
		
	}
    ;
?>-->
</p>
</div>



</div>
</body>
</html>
