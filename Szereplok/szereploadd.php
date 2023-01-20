<?php
include_once("../fuggvenyek.php");

$pnev = $_POST['sznev'];
$pnem = $_POST['nem'];
$pev = $_POST['szulev'];
$phonap = $_POST['szulhonap'];
$pnap = $_POST['szulnap'];
$pszuldatum = date('Y-m-d', mktime(0,0,0, $phonap, $pnap, $pev));

if (isset($pnev) && isset($pnem) && isset($pszuldatum)) {
    addszereplo($pnev, $pszuldatum, $pnem);

    header("Location: szereplok.php");
} else {
    error.log("Nincs beállítva valamelyik érték");
}
