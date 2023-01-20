<?php
include_once("../fuggvenyek.php");

$torolt = $_POST["toroltrendezo"];

if (isset($torolt)) {
    $succ = delrendezo($torolt);


    if ($succ) {
        header("Location: rendezo.php");
    } else {
        echo "Hiba történt (műsor törlés)";
    }
} else {
    echo "Hiba történt (műsor törlés)";
}
