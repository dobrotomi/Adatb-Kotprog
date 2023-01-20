<?php
include_once("../fuggvenyek.php");

$torolt = $_POST["toroltszereplo"];

if (isset($torolt)) {
    $succ = delszereplo($torolt);

    if ($succ) {
        header("Location: szereplok.php");
    } else {
        echo "Hiba történt (műsor törlés)";
    }
} else {
    echo "Hiba történt (műsor törlés)";
}
