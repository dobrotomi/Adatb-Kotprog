<?php
include_once("../fuggvenyek.php");

$pnev = $_POST['rnev'];
$szigszam = $_POST["szigszam"];
$pev = $_POST['szulev'];
$phonap = $_POST['szulhonap'];
$pnap = $_POST['szulnap'];
$pszuldatum = date('Y-m-d', mktime(0,0,0, $phonap, $pnap, $pev));

if (isset($pnev) && isset($szigszam) && isset($pszuldatum)) {
    addrendezo($szigszam, $pnev, $pszuldatum);

    header("Location: rendezo.php");
} else {
    error.log("Nincs beállítva valamelyik érték");
}

