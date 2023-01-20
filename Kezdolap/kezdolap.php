<?php include_once("../menu.php");
include_once("../fuggvenyek.php")
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
    <meta http-equiv="content-type" content="text/html; charset=UTF8" >
    <!--link rel="stylesheet" href="style.css"-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Műsorújság</title>
</HEAD>
<BODY>




<?php
echo menu();
?>
<div class="container">
    <h1>Műsorújság</h1>

    <?php
    $csatornak = listcsatornak();
    while ($csat = mysqli_fetch_assoc($csatornak)) {
        echo '<table class="table">';
        echo '<tr>';
        echo '<th style="column-span:4"><img class="img-thumbnail" style="width: 200px;" src="../uploads/'.$csat["kep"].'"></th>';
        echo '</tr>';
        echo '<tr>';
        echo '<td><b>Cím</b></td>';
        echo '<td><b>Kezdődik</b></td>';
        echo '<td><b>Hossz</b></td>';
        echo '<td><b>Korhatár</b></td>';
        echo '<td><b>Szereplők</b></td>';
        echo '</tr>';
        $musorok = listidopontok();
        while($sor = mysqli_fetch_assoc($musorok)) {
            if ($sor["csnev"] == $csat["csnev"]) {
                echo '<tr>';
                echo '<td>'. $sor["cim"]."</td>";
                echo '<td>'. $sor["kezdesido"] .'</td>';
                echo '<td>'. $sor["idotartam"].' perc</td>';
                echo '<td style="text-align: center">'. $sor["korhataros"].'</td>';
                echo '<td><form action="musorszereplok.php" method="post">
                            <input type="submit" value="Tovább a szereplőkhöz" class="btn btn-info">
                            <input type="hidden" name="fasz" value="' .$sor["mid"].'"> 
                            <input type="hidden" name="csnev" value="'.$sor["csnev"].'"> 
                            <input type="hidden" name="kep" value="'.$sor["kep"].'"> 
                            <input type="hidden" name="cim" value="'.$sor["cim"].'"> 
                           </form>
                       </td>'; //Új oldalon új táblázatban amiben 1 headernél ott a címe a filmnek, alatta felsoroljuk a szereplőket, adatokkal együtt
                echo '</tr>';
            }

        }
        echo '</table>';
        echo '<br>';
        echo '<br>';
    }

    ?>
</div>



</BODY>
</HTML>