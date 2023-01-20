<?php include_once("../menu.php");
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
    <title>Szereplők</title>
</HEAD>
<BODY>




<?php
echo menu();
?>

<div class="container">
    <h1>Szereplők</h1>
    <form method="POST" action="szereploadd.php" accept-charset="utf-8">
        <div>
            <div>
                <label for="sel1">Név:</label>
                <input type="text" name="sznev" class="form-control" id="sel1" required>
            </div>
            <br>
            <div>
                <label for="sel2">Nem:</label>
                <select name="nem" id="sel2" class="form-control">
                    <option value="ferfi">Férfi</option>
                    <option value="no">Nő</option>
                </select>
            </div>
            <br>
        </div>
        <br>
        <label>Születési dátum: </label>
        <div class="form-group row">
            <div class="col-xs-2">
                <label for="sel4">Év</label>
                <select name="szulev" class="form-control" id="sel4" />
                <?php
                for ($i=1800; $i<=2100; $i++) {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
                ?>
                </select>
            </div>
            <div class="col-xs-2">
                <label for="sel5">Hónap</label>
                <select name="szulhonap" class="form-control" id="sel5" />
                <?php
                for ($i=1; $i<=12; $i++) {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
                ?>
                </select>
            </div>
            <div class="col-xs-2">
                <label for="sel6">Nap</label>
                <select name="szulnap" class="form-control" id="sel6"/>
                <?php
                for ($i=1; $i<=31; $i++) {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
                ?>
                </select>
            </div>
        </div>



        <input type="submit" value="Hozzáadás" class="btn btn-success" />

    </form>
</div>


<hr>

<div class="container">
    <h1>Szereplők listája</h1>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Név</th>
            <th>Nem</th>
            <th>Születési dátum</th>
            <th>Törlés</th>
        </tr>

        <?php
        $musorok = listszereplok();

        while($sor = mysqli_fetch_assoc($musorok)) {
            echo '<tr>';
            echo '<td>'. $sor["szid"]."</td>";
            echo '<td>'. $sor["sznev"]."</td>";
            echo '<td>'. $sor["nem"] .'</td>';
            echo '<td>'. $sor["szuldatum"] .'</td>';
            echo '<td><form method="POST" action="szereplodel.php">
				  <input type="hidden" name="toroltszereplo" value="' .$sor["szid"].'" />
				  <input type="submit" value="Szereplő törlése" class="btn btn-danger"    />
		          </form></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>

</BODY>
</HTML>