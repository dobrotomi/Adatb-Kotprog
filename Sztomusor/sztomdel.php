<?php
include_once("../fuggvenyek.php");

$mid = $_POST['tm'];
$szid = $_POST['tsz'];



if (isset($szid) && isset($mid)) {
        delsztom($mid, $szid);

    header("Location: szereploktomusor.php");
} else {
    error.log("Nincs beállítva valamelyik érték");
}




?>