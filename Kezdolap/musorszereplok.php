<?php
include_once("../fuggvenyek.php");
include_once("../menu.php");
    $asd = $_POST["fasz"];
    $csat = $_POST["csnev"];
    $cim = $_POST["cim"];
    $kep = $_POST["kep"];
    $szereplok = listszereplokbymusor($asd)


?>

<!DOCTYPE HTML>
<HTML>
<HEAD>
    <meta http-equiv="content-type" content="text/html; charset=UTF8" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Szereplők</title>
</HEAD>
<BODY>




<?php
echo menu();

?>
<div class="container">
    <h1><?php echo $csat;?> - <?php echo $cim; ?></h1>

    <?php
        echo '<img class="img-thumbnail" style="width: 200px; float:right" src="../uploads/'.$kep.'"></th>';
    ?>
    <h1>Szereplők</h1>
    <table class="table">
        <tr>
            <th>Név</th>
            <th>Születési dátum</th>
            <th>Nem</th>
        </tr>

        <?php
        while ($sor = mysqli_fetch_assoc($szereplok)){
            echo '<tr>';
            echo '<td>'. $sor["sznev"]."</td>";
            echo '<td>'. $sor["szuldatum"]."</td>";
            echo '<td>'. $sor["nem"] .'</td>';
            echo '</tr>';
        }


        ?>
    </table>

</div>



</BODY>
</HTML>
