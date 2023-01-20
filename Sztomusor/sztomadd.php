<?php
include_once("../fuggvenyek.php");

$mid = $_POST['cim'];
$szid = $_POST['szereplok'];



if (isset($szid) && isset($mid)) {
    foreach ($szid as $item) {
        addsztm($mid, $item);
    }
    header("Location: szereploktomusor.php");
} else {
    error.log("Nincs beállítva valamelyik érték");
}




?>