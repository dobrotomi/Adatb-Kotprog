<?php
include_once("../menu.php");
include_once("../fuggvenyek.php")
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
    <meta http-equiv="content-type" content="text/html; charset=UTF8" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Csatornák</title>
</HEAD>
<BODY>




<?php
echo menu();
?>
<div class="container">
    <h1>Szereplők hozzáadása műsorokhoz</h1>

    <form action="sztomadd.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        <div>
            <label for="sel1">Műsor címe:</label>
            <select name="cim" id="sel1" class="form-control">
                <?php
                $musorok = listmusorok();

                while ($sor = mysqli_fetch_assoc($musorok)){
                    echo '<option value="'.$sor["mid"].'">'.$sor["cim"]." - ".$sor["keletkezes"].'</option>';
                }
                ?>
            </select>

        </div>
        <br>
        <div>
            <label for="sel10">Szereplők:</label>
            <select name="szereplok[]" id="sel10" class="form-control" style="height: 200px" multiple>
                <?php
                $szereplok = listszereplok();

                while($sor = mysqli_fetch_assoc($szereplok)) {
                    echo '<option value="'.$sor["szid"].'">'.$sor["sznev"]." - ".$sor["szuldatum"].'</option>';
                }

                ?>
            </select>

        </div>
        <br>
        <input type="submit" value="Hozzáadás" class="btn-success btn">
    </form>
</div>


<hr>
<div class="container">
    <h1>Szereplők melyik műsorban szerepelnek</h1>

    <table class="table">
        <tr>
            <th>Műsorok</th>
            <th>Szereplők</th>
            <th>Törlés</th>
        </tr>

        <?php
            $sztom = listsztm();

            while ($sor = mysqli_fetch_assoc($sztom)){
                echo "<tr>";
                echo '<td>'. $sor["cim"] .'</td>';
                echo '<td>'. $sor["sznev"] .'</td>';
                echo '<td><form method="POST" action="sztomdel.php">
				  <input type="hidden" name="tsz" value="' .$sor["szid"].'" />
				  <input type="hidden" name="tm" value="' .$sor["mid"].'" />
				  <input type="submit" value="Szereplő törlése a műsorból" class="btn btn-danger" />
		          </form></td>';
            }
        ?>

    </table>
</div>


</BODY>
</HTML>
