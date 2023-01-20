<?php
include_once("../fuggvenyek.php");
include_once("../menu.php");

$csnev = $_POST["csnev"];
$csid = $_POST["csid"];
$tema = $_POST["tema"];
$kep = $_POST["kep"];

?>



<!DOCTYPE HTML>
<HTML>
<HEAD>
    <meta http-equiv="content-type" content="text/html; charset=UTF8" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Csatornák</title>
</HEAD>
<BODY>




<?php
echo menu();
?>



<div class="container">
    <h1><?php echo $csnev ?> - Szerkesztése</h1>

    <form action="csatornaupdate.php" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        <div>
            <label for="sel1">Csatorna neve:</label>
            <input type="text" name="csatnev" value="<?php echo $csnev; ?>" class="form-control" id="sel1">
        </div>
        <br>
        <div>
            <label for="sel2">Csatorna témája:</label>
            <input type="text" name="csattema" value="<?php echo $tema; ?>" class="form-control" id="sel2">
        </div>
        <br>
        <div class="input-group mb-3">
            <label for="sel3">Csatorna logoja:</label>
            <input type="file" name="fileToUpload" id="fileToUpload" value="" class="form-control" id="sel3">
        </div>
        <br>
        <input type="hidden" name="csid" value="<?php echo $csid?>">
        <input type="hidden" name="kep" value="<?php echo $kep; ?>">
        <input type="submit" value="Szerkesztés" class="btn-success btn">
    </form>
</div>



</BODY>
</HTML>


