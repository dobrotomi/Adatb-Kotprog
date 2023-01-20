<?php include_once("../menu.php");
include_once("../fuggvenyek.php");
$szul = explode('-', $_POST["szuldatum"])
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
    <title>Rendezők</title>
</HEAD>
<BODY>




<?php
echo menu();
?>

<div class="container">
    <h1><?php echo $_POST["rnev"] ?> - Szerkesztése</h1>
    <form method="POST" action="rendezoupdate.php" accept-charset="utf-8">
        <div>
            <div>
                <label for="sel1">Rendező neve:</label>
                <input type="text" name="rnev" value="<?php echo $_POST["rnev"] ?>" class="form-control" id="sel1" required>
            </div>
            <br>
            <div>
                <label for="sel2">Személyi igazolvány szám:</label>
                <input type="text" name="szigszam" value="<?php echo $_POST["szigszam"] ?>" class="form-control" id="sel2" required>
            </div>
        </div>
        <br>
        <label>Születési dátum: </label>

        <div class="form-group row">
            <div class="col-xs-2">
                <label for="sel4">Év</label>
                <select name="szulev" class="form-control" id="sel4" />
                <option value="<?php echo $szul[0] ?>"><?php echo $szul[0] ?></option>
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
                <option value="<?php echo $szul[1] ?>"><?php echo $szul[1] ?></option>
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
                <option value="<?php echo $szul[2] ?>"><?php echo $szul[2] ?></option>
                <?php
                for ($i=1; $i<=31; $i++) {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
                ?>
                </select>
            </div>
        </div>
        <input type="hidden" name="rszigszam" value="<?php echo $_POST["szigszam"]?>">


        <input type="submit" value="Szerkesztés" class="btn btn-success" />

    </form>
</div>



</BODY>
</HTML>