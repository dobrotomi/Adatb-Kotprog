<?php
include_once("../fuggvenyek.php");

$pcim = $_POST['musorcim'];
$pnyelv = $_POST['musornyelv'];
$pkeletkezes = $_POST['musorkel'];
$pkorhataros = $_POST['musorkorhatar'];
$pszigszam = $_POST["rendezo"];
$hossz = $_POST["musorhossz"];


if (isset($pcim) && isset($pnyelv) && isset($pkeletkezes) && isset($pkorhataros) && isset($pszigszam)) {
    addmusor($pcim, $pnyelv, $pkeletkezes, $pkorhataros, $pszigszam, $hossz);

    header("Location: musorok.php");
} else {
    error.log("Nincs beállítva valamelyik érték");
}
