<?php include_once("../menu.php");
include_once("../fuggvenyek.php")
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
    <meta http-equiv="content-type" content="text/html; charset=UTF8" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Műsorújság</title>

    <style>
        td {
            float: left;
        }
    </style>
</HEAD>
<BODY>

<?php
echo menu();
?>

<div class="container">
    <h1>Statisztikák</h1>

    <table class="table">
        <tr>
            <th colspan="2">Legrégebben keletkezett műsor(ok) az adatbázisban</th>
        </tr>
        <?php
        $musorok = stat0();
        while($musor = mysqli_fetch_assoc($musorok)){
            echo "<tr><td>".$musor["cim"].":</td>";
            echo "<td>".$musor["keletkezes"]."</td></tr>";
        }
        ?>

    </table>
    <br>
    <table class="table">
        <tr>
            <th colspan="2">Legújabb műsor(ok) az adatbázisban</th>
        </tr>
        <?php
        $musorok = stat4();
        while($musor = mysqli_fetch_assoc($musorok)){
            echo "<tr><td>".$musor["cim"].":</td>";
            echo "<td>".$musor["keletkezes"]."</td></tr>";
        }
        ?>

    </table>
    <br>
    <table class="table">
        <tr>
            <th colspan="2">Műsoronként hány szereplő van az adatbázisban</th>
        </tr>
        <?php
        $musorok = stat3();
        while($musor = mysqli_fetch_assoc($musorok)){
            echo "<tr><td>".$musor["cim"].":</td>";
            echo "<td>".$musor["db"]."</td></tr>";
        }
        ?>
    </table>
    <br>
    <table class="table">
        <tr>
            <th colspan="2">Melyik szereplő hány műsorban szerepelt</th>
        </tr>
        <?php
        $szereplok = stat5();
        while($szereplo = mysqli_fetch_assoc($szereplok)){
            echo "<tr><td>".$szereplo["sznev"].":</td>";
            echo "<td>".$szereplo["db"]."</td></tr>";
        }
        ?>
    </table>
    <br>
    <table class="table">
        <tr>
            <th colspan="2">Csatornánkénti műsorok száma az adatbázisban</th>
        </tr>
        <?php
        $csatornak = stat1();
        while($csat = mysqli_fetch_assoc($csatornak)){
            echo "<tr><td>".$csat["csnev"].":</td>";
            echo "<td>".$csat["szam"]."</td></tr>";
        }
        ?>
    </table>
    <br>



</div>




</BODY>
</HTML>