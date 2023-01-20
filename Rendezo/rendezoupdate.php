<?php
include_once("../fuggvenyek.php");

$rnev = $_POST["rnev"];
$szigszam = $_POST['szigszam'];
$ev = $_POST['szulev'];
$honap = $_POST['szulhonap'];
$nap = $_POST['szulnap'];
$szuldatum = date('Y-m-d', mktime(0,0,0, $honap, $nap, $ev));
$rszigszam = $_POST['rszigszam'];

if (isset($rnev) && isset($szigszam) && isset($szuldatum) && isset($rszigszam)){
    editrendezo($rszigszam, $szigszam, $rnev, $szuldatum);
    header("Location: rendezo.php");
}else {
    error.log("Nincs beállítva valamelyik érték");
}
