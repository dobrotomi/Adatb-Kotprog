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
    <title>Műsorok</title>
</HEAD>
<BODY>




<?php
echo menu();
?>

<div class="container">
    <h1>Műsorok hozzáadása</h1>
    <form action="musoradd.php" method="post" accept-charset="utf-8">
        <div>
            <div>
                <label for="sel1">Műsor címe:</label>
                <input type="text" name="musorcim" id="sel1" class="form-control" required>
            </div>
            <br>
            <div>
                <label for="sel2">Műsor keletkezése (év):</label>
                <input type="text" name="musorkel" id="sel2" class="form-control" required>
            </div>
            <br>
            <div>
                <label for="sel3">Műsor nyelve:</label>
                <input type="text" name="musornyelv" id="sel3" class="form-control" required>

            </div>
            <br>
            <div>
                <label for="sel9">Műsor hossza (percben):</label>
                <input type="text" name="musorhossz" id="sel9" class="form-control" required>

            </div>
            <br>
            <div>
                <label for="sel8">Rendezte:</label>
                <select name="rendezo" id="sel8" class="form-control">
                    <?php
                        $rendezok = listrendezok();

                        while($sor = mysqli_fetch_assoc($rendezok)) {
                            echo '<option value="'.$sor["szigszam"].'">'.$sor["rendezonev"]." - ".$sor["szigszam"].'</option>';
                        }

                    ?>
                </select>

            </div>
            <br>

            <div class="form-group row">
                <div class="col-xs-2">
                    <label for="sel4">Korhatáros?</label>
                    <select name="musorkorhatar" id="sel4" class="form-control">
                        <option value="0">Nem</option>
                        <option value="6">6</option>
                        <option value="12">12</option>
                        <option value="16">16</option>
                        <option value="18">18</option>
                    </select>
                </div>
            </div>
        </div>


        <input type="submit" value="Hozzáadás" class="btn btn-success">
    </form>
</div>


<hr>

<div class="container">
    <h1>Műsorok listája</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Cím</th>
            <th>Hossz</th>
            <th>Keletkezés éve</th>
            <th>Nyelv</th>
            <th>Korhatár</th>
            <th>Rendező</th>
            <th>Törlés</th>
        </tr>

        <?php
        $musorok = listmusorok();

        while($sor = mysqli_fetch_assoc($musorok)) {
            echo '<tr>';
            echo '<td>'. $sor["mid"]."</td>";
            echo '<td>'. $sor["cim"]."</td>";
            echo '<td>'. $sor["idotartam"]." perc</td>";
            echo '<td>'. $sor["keletkezes"] .'</td>';
            echo '<td>'. $sor["nyelv"] .'</td>';
            echo '<td>'. $sor["korhataros"] .'</td>';
            echo '<td>'. $sor["rendezonev"].'</td>';
            echo '<td>' ?> <form method="POST" onsubmit="if(!confirm('Vigyázz! Sok adatot készülsz törölni. Biztosan folytatni akarod?')){return false;}" action="musordel.php"> <?php
			echo  '<input type="hidden" name="toroltmusor" value="'.$sor["mid"].'" />
				  <input type="submit" value="Műsor törlése" class="btn btn-danger" />
		          </form></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>

</BODY>
</HTML>
