<?php
include_once("../fuggvenyek.php");

$torolt = $_POST["toroltmusor"];

if (isset($torolt)) {
    $succ = delmusor($torolt);

    if ($succ) {
        header("Location: musorok.php");
    } else {
        echo "Hiba történt (műsor törlés)";
    }
} else {
    echo "Hiba történt (műsor törlés)";
}
