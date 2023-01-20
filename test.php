<?php
include_once ("fuggvenyek.php");
$musorok = listmusorok();
$csatornak = listcsatornak();
$szereplok = listszereplok();
$rendezok = listrendezok();
$idopontok = listidopontok();
$sztom = listsztm();

$i = 0;

while($sor = mysqli_fetch_assoc($szereplok)){
    $i++;
}
while($sor = mysqli_fetch_assoc($musorok)){
    $i++;
}
while($sor = mysqli_fetch_assoc($csatornak)){
    $i++;
}
while($sor = mysqli_fetch_assoc($rendezok)){
    $i++;
}
while($sor = mysqli_fetch_assoc($idopontok)){
    $i++;
}
while($sor = mysqli_fetch_assoc($sztom)){
    $i++;
}
echo $i;