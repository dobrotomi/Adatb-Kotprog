<?php
include_once("../fuggvenyek.php");

$pcim = $_POST['mucim'];
$pcsnev = $_POST['mucsnev'];
$pev = $_POST["muev"];
$phonap = $_POST["muhonap"];
$pnap = $_POST["munap"];
$pora = $_POST["muora"];
$pperc = $_POST["muperc"];
$pidopont = date('Y-m-d H:i', mktime($pora,$pperc,0, $phonap, $pnap, $pev));



if (isset($pcim) && isset($pcsnev) && isset($pidopont)) {
    addtomusorujsag($pcim, $pcsnev, $pidopont);

    header("Location: musorujsagosszeallit.php");
} else {
    error.log("Nincs beállítva valamelyik érték");
}

