<?php
include_once("../fuggvenyek.php");

$id = $_POST["csid"];
$idopont = $_POST["kezdesido"];


if (isset($id) && isset($idopont)) {
    $succ = delfrommusorujsag($id, $idopont);

    if ($succ) {
        header("Location: musorujsagosszeallit.php");
    } else {
        echo "Hiba történt (műsor törlés)";
    }
} else {
    echo "Hiba történt (műsor törlés)";
}
