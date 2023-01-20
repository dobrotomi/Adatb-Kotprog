<?php
include_once("../fuggvenyek.php");

$torolt = $_POST["toroltcsatorna"];
$kep = $_POST["toroltkep"];



unlink("../uploads/".$kep);

if (isset($torolt)) {
    $succ = delcsatorna($torolt);

    if ($succ) {
        header("Location: csatornak.php");
    } else {
        echo "Hiba történt (műsor törlés)";
    }
} else {
    echo "Hiba történt (műsor törlés)";
}
