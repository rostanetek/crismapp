<?php

include('../db.php');
$pdo = connect();
$sql = "SELECT * FROM vrstvy WHERE `zobrazeno` = 'ano' ORDER BY item_order ASC";
$query = $pdo->prepare($sql);
$query->execute();
$list = $query->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Admin</title>


<!-- poradi vrstev -->
<link rel="stylesheet" href="style.css" />
<script type="text/javascript" src="../../jquery-1.11.1.js"></script>
<script type="text/javascript" src="jquery-ui-1.10.4.custom.min.js"></script>
<!-- poradi vrstev -->



</head>

<body>
 <div class="popisek">Přetažením změníte pořadí vrstev. Pokud jste přidávali/editovali vrstvy, pro jistotu nejprve <a href="#" onclick="window.location.reload(true);">obnovte</a> obsah okna.</div> 
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





</body>
</html>
