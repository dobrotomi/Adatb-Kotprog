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
    <h1>Csatornák hozzáadása</h1>

    <form action="csatornaadd.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        <div>
            <label for="sel1">Csatorna neve:</label>
            <input type="text" name="csatnev" class="form-control" id="sel1" required>
        </div>
        <br>
        <div>
            <label for="sel2">Csatorna témája:</label>
            <input type="text" name="csattema" class="form-control" id="sel2" required>
        </div>
        <br>
        <div class="input-group mb-3">
            <label for="sel3">Csatorna logoja:</label>
            <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" id="sel3" required>
        </div>
        <br>
        <input type="submit" value="Hozzáadás" class="btn-success btn">
    </form>
</div>


<hr>
<div class="container">
    <h1>Csatornák listája</h1>

    <table class="table">
        <tr>
            <th>Logo</th>
            <th>Név</th>
            <th>Téma</th>
            <th>Szerkesztés</th>
            <th>Törlés</th>
        </tr>

        <?php
        $musorok = listcsatornak();

        while($sor = mysqli_fetch_assoc($musorok)) {
            echo '<tr>';
            echo '<td><img style="width: 100px" src="../uploads/'.$sor["kep"].'"></td>';
            echo '<td>'. $sor["csnev"] .'</td>';
            echo '<td>'. $sor["tema"] .'</td>';
            echo '<td><form method="POST" action="csatornaszerk.php">
				  <input type="hidden" name="csid" value="' .$sor["csid"].'" />
				  <input type="hidden" name="csnev" value="'.$sor["csnev"].'" />
				  <input type="hidden" name="tema" value="'.$sor["tema"].'" />
				  <input type="hidden" name="kep" value="'.$sor["kep"].'" />
				  <input type="submit" value="Csatorna szerkesztése" class="btn btn-warning" />
		          </form></td>';
            echo '<td><form method="POST" action="csatornadel.php">
				  <input type="hidden" name="toroltcsatorna" value="' .$sor["csid"].'" />
				  <input type="hidden" name="toroltkep" value="'.$sor["kep"].'" />
				  <input type="submit" value="Csatorna törlése" class="btn btn-danger" />
		          </form></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>


</BODY>
</HTML>
