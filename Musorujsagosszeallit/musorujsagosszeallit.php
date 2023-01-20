<?php include_once("../menu.php");
include_once("../fuggvenyek.php")
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
    <meta http-equiv="content-type" content="text/html; charset=UTF8" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Műsorújság összeállítása</title>
</HEAD>
<BODY>




<?php
echo menu();
?>


<div class="container">
    <h1>Műsorujság összeállítása</h1>
    <form method="POST" action="musorujsagossz.php" accept-charset="utf-8">
        <div>
            <div>
                <label for="sel1">Cím:</label>
                <select name="mucim" class="form-control" id="sel1">
                    <?php
                    $musorok = listmusoroka();
                    while( $sor = mysqli_fetch_assoc($musorok) ) {
                        echo '<option value="'.$sor["mid"].'">'.$sor["cim"]." - ".$sor["idotartam"].' perc</option>';
                    }
                    mysqli_free_result($musorok);

                    ?>
                </select>
            </div>
            <br>
            <div>
                <label for="sel2">Csatorna:</label>
                <select name="mucsnev" class="form-control" id="sel2">
                    <?php
                    $csatornak = listcsatornak();
                    while( $sor = mysqli_fetch_assoc($csatornak) ) {
                        echo '<option value="'.$sor["csid"].'">'.$sor["csnev"].'</option>';
                    }
                    mysqli_free_result($csatornak);

                    ?>
                </select>
            </div>
        </div>

        <br>
        <div class="form-group row">
            <div class="col-xs-2">
                <label for="sel3">Év</label>
                <select name="muev" class="form-control" id="sel3">
                    <?php
                    for ($i=2022; $i<=2100; $i++) {
                        echo '<option value="'.$i.'">'.$i.'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="col-xs-2">
                <label for="sel4">Hónap</label>
                <select name="muhonap" class="form-control" id="sel4"/>
                <?php
                for ($i=1; $i<=12; $i++) {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
                ?>
                </select>
            </div>
            <div class="col-xs-2">
                <label for="sel5">Nap</label>
                <select name="munap" class="form-control" id="sel5"/>
                <?php
                for ($i=1; $i<=31; $i++) {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
                ?>
                </select>
            </div>
            <div class="col-xs-2">
                <label for="sel6">Óra</label>
                <select name="muora" class="form-control" id="sel6"/>
                <?php
                for ($i=0; $i<=23; $i++) {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
                ?>
                </select>
            </div>
            <div class="col-xs-2">
                <label for="sel7">Perc</label>

                <select name="muperc" class="form-control" id="sel7"/>
                <?php
                for ($i=0; $i<=59; $i++) {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
                ?>
                </select>
            </div>
        </div>

        <script>
            function myFunction() {
                if (confirm("Vigyázz! Sok adatot készülsz törölni!")) {
                    return true
                } else {
                    return false;
                }
            }
        </script>

        <input type="submit" value="Hozzáadás" class="btn-success btn"/>

    </form>
</div>




<hr>
<div class="container">
    <h1>Műsorújság piszkozat</h1>

    <table class="table">
        <tr>
            <th>Cím</th>
            <th>Csatorna</th>
            <th>Időpont</th>
            <th>Hossz</th>
            <th>Törlés</th>
        </tr>

        <?php
        $musorok = listidopontok();

        while($sor = mysqli_fetch_assoc($musorok)) {
            echo '<tr>';
            echo '<td>'. $sor["cim"]."</td>";
            echo '<td>'. $sor["csnev"] .'</td>';
            echo '<td>'. $sor["kezdesido"] .'</td>';
            echo '<td>'. $sor["idotartam"] ." perc".'</td>';
            echo '<td><form method="POST" action="musorujsagosszdel.php">
				  <input type="hidden" name="csid" value="' .$sor["csid"].'" />
				  <input type="hidden" name="kezdesido" value="'.$sor["kezdesido"].'" />
				  <input type="submit" value="Időpont törlése" class="btn btn-danger" />
		          </form></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>


</BODY>
</HTML>