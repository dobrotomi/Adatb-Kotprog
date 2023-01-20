<?php

function connect() {

    $conn = mysqli_connect("localhost", "root", "") or die("Csatlakozási hiba");
    if ( false == mysqli_select_db($conn, "MUSORUJSAG" )  ) {

        return null;
    }
    mysqli_query($conn, 'SET NAMES UTF8');
    mysqli_query($conn, 'SET character_set_results=utf8');
    mysqli_set_charset($conn, 'utf8');

    return $conn;

}

function listmusoroka() {
    if (!($conn = connect())) {
        return false;
    }
    $res = mysqli_query($conn, "SELECT mid, cim, idotartam, CONCAT(cim, ' - ', keletkezes) AS musor FROM musor") or die(mysql_error());
    mysqli_close($conn);
    return $res;
}

function listmusorok() {
    if (!($conn = connect())) {
        return false;
    }
    //IF(rendezonev is not null, rendezonev, 'Nem ismerjük') as
    $res = mysqli_query($conn, "SELECT mid, cim, idotartam, keletkezes, nyelv, korhataros, rendezonev FROM musor, rendezo WHERE musor.rendezo_szigszam = rendezo.szigszam") or die(mysql_error());
    mysqli_close($conn);
    return $res;
}

function listszereplok() {
    if (!($conn = connect())) {
        return false;
    }
    //"SELECT szid, sznev, szuldatum, nem, szereplo.mcim, musor.mid, cim FROM szereplo, musor WHERE musor.mid = szereplo.mcim"
    $res = mysqli_query($conn, "SELECT szid, sznev, szuldatum, nem FROM szereplo") or die(mysql_error());
    mysqli_close($conn);
    return $res;
}

function listcsatornak() {
    if (!($conn = connect())) {
        return false;
    }
    $res = mysqli_query($conn, "SELECT csid, csnev, tema, kep FROM csatorna") or die(mysql_error());
    mysqli_close($conn);
    return $res;
}

function listidopontok() {
    if (!($conn = connect())) {
        return false;
    }
    //SELECT cim, csnev, kezdesido, idotartam, musor.mid, csatorna.kep, csatorna.csid FROM idopont, csatorna, musor WHERE idopont.mid = musor.mid AND idopont.csid = csatorna.csid ORDER BY kezdesido ASC
    $res = mysqli_query($conn, "SELECT cim, csnev, kezdesido, idotartam, korhataros, musor.mid, csatorna.kep, csatorna.csid 
                                        FROM idopont 
                                        INNER JOIN MUSOR ON idopont.mid = musor.mid 
                                        INNER JOIN csatorna ON idopont.csid = csatorna.csid 
                                        ORDER BY csnev, kezdesido ASC") or die(mysql_error());
    mysqli_close($conn);
    return $res;
}

function listszereplokbymusor($id){

    if (!($conn = connect())) {
        return false;
    }
    //SELECT * FROM szereplo WHERE mid = $id ORDER BY sznev ASC"
    $res = mysqli_query($conn, "SELECT * FROM szereplo, musor, szereplotomusor WHERE szereplotomusor.mid = musor.mid AND szereplotomusor.szid = szereplo.szid AND szereplotomusor.mid = $id") or die(mysql_error());
    mysqli_close($conn);
    return $res;
}

function listrendezok() {
    if (!($conn = connect())) {
        return false;
    }
    $res = mysqli_query($conn, "SELECT * FROM rendezo ORDER BY rendezonev") or die(mysql_error());
    mysqli_close($conn);
    return $res;
}
function listsztm() {
    if (!($conn = connect())) {
        return false;
    }
    $res = mysqli_query($conn, "SELECT cim, sznev, szereplotomusor.szid, szereplotomusor.mid FROM szereplotomusor INNER JOIN musor ON musor.mid = szereplotomusor.mid INNER JOIN szereplo ON szereplo.szid = szereplotomusor.szid ORDER BY cim, sznev") or die(mysql_error());
    mysqli_close($conn);
    return $res;
}



/* ADD TO TABLE */
function addmusor($cim, $nyelv, $keletkezes, $korhataros, $rendezoszig, $hossz) {
    if (!($conn = connect())) {
        return false;
    }

    $prep = mysqli_prepare($conn, "INSERT INTO musor (cim, nyelv, keletkezes, korhataros, rendezo_szigszam, idotartam) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($prep, "ssddss", $cim, $nyelv, $keletkezes, $korhataros, $rendezoszig, $hossz);
    $ret = mysqli_stmt_execute($prep);
    mysqli_close($conn);

    return $ret;
}

function addszereplo($nev, $szuldatum, $nem) {
    if (!($conn = connect())) {
        return false;
    }

    $prep = mysqli_prepare($conn, "INSERT INTO szereplo (sznev, szuldatum, nem) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($prep, "sss", $nev, $szuldatum, $nem);
    $ret = mysqli_stmt_execute($prep);
    mysqli_close($conn);

    return $ret;
}

function addcsatorna($csnev, $tema, $kep) {
    if (!($conn = connect())) {
        return false;
    }
    $prep = mysqli_prepare($conn, "INSERT INTO csatorna (csnev, tema, kep) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($prep, "sss", $csnev, $tema, $kep);
    $ret = mysqli_stmt_execute($prep);
    mysqli_close($conn);

    return $ret;
}
function addtomusorujsag($mid, $csid, $time) {
    if (!($conn = connect())) {
        return false;
    }
    $prep = mysqli_prepare($conn, "INSERT INTO idopont (mid, csid, kezdesido) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($prep, "dds", $mid, $csid, $time);
    $ret = mysqli_stmt_execute($prep);
    mysqli_close($conn);

    return $ret;
}

function addrendezo($szigszam, $nev, $szuldatum) {
    if (!($conn = connect())) {
        return false;
    }

    $prep = mysqli_prepare($conn, "INSERT INTO rendezo (szigszam, rendezonev, szuldatum) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($prep, "sss", $szigszam, $nev, $szuldatum);
    $ret = mysqli_stmt_execute($prep);
    mysqli_close($conn);

    return $ret;
}

function addsztm($mid, $szid) {
    if (!($conn = connect())) {
        return false;
    }

    $prep = mysqli_prepare($conn, "INSERT INTO szereplotomusor (mid, szid) VALUES (?, ?)");
    mysqli_stmt_bind_param($prep, "dd", $mid, $szid);
    $ret = mysqli_stmt_execute($prep);
    mysqli_close($conn);

    return $ret;
}

/* DEL FROM TABLE */
function delmusor($id) {
    if ( !($conn = connect()) ) {
        return false;
    }

    $prep = mysqli_prepare( $conn,"DELETE FROM musor WHERE mid = ?");
    mysqli_stmt_bind_param($prep, "d", $id);
    $ret = mysqli_stmt_execute($prep);


    mysqli_close($conn);
    return $ret;
}
function delcsatorna($id) {
    if ( !($conn = connect()) ) {
        return false;
    }

    $prep = mysqli_prepare( $conn,"DELETE FROM csatorna WHERE csid = ?");
    mysqli_stmt_bind_param($prep, "d", $id);
    $ret = mysqli_stmt_execute($prep);


    mysqli_close($conn);
    return $ret;
}
function delszereplo($id) {
    if ( !($conn = connect()) ) {
        return false;
    }

    $prep = mysqli_prepare( $conn,"DELETE FROM szereplo WHERE szid = ?");
    mysqli_stmt_bind_param($prep, "d", $id);
    $ret = mysqli_stmt_execute($prep);


    mysqli_close($conn);
    return $ret;
}

function delfrommusorujsag($csatornaid, $idopont) {
    if ( !($conn = connect()) ) {
        return false;
    }

    $prep = mysqli_prepare( $conn,"DELETE FROM idopont WHERE csid = ? AND kezdesido = ?");
    mysqli_stmt_bind_param($prep, "ss", $csatornaid, $idopont);
    $ret = mysqli_stmt_execute($prep);


    mysqli_close($conn);
    return $ret;
}

function delrendezo($szigszam){
    if ( !($conn = connect()) ) {
        return false;
    }
    $prep = mysqli_prepare( $conn,"DELETE FROM rendezo WHERE szigszam = ?");
    mysqli_stmt_bind_param($prep, "s", $szigszam);
    $ret = mysqli_stmt_execute($prep);


    mysqli_close($conn);
    return $ret;
}

function delsztom($mid, $szid) {
    if ( !($conn = connect()) ) {
        return false;
    }
    $prep = mysqli_prepare( $conn,"DELETE FROM szereplotomusor WHERE mid = ? AND szid = ?");
    mysqli_stmt_bind_param($prep, "dd", $mid, $szid);
    $ret = mysqli_stmt_execute($prep);


    mysqli_close($conn);
    return $ret;
}



function editcsatorna($csid, $csnev, $tema, $kep) {
    if ( !($conn = connect()) ) {
        return false;
    }
    $prep = mysqli_prepare($conn, "UPDATE csatorna SET csnev=?, tema=?, kep=? WHERE csid = ?");

    mysqli_stmt_bind_param($prep, "sssd", $csnev, $tema, $kep, $csid);
    $ret = mysqli_stmt_execute($prep);
    mysqli_close($conn);

    return $ret;
}

function editrendezo($szigszamr ,$szigszam, $nev, $szuldatum) {
    if ( !($conn = connect()) ) {
        return false;
    }
    $prep = mysqli_prepare($conn, "UPDATE rendezo SET szigszam=?, rendezonev=?, szuldatum=? WHERE szigszam = ?");

    mysqli_stmt_bind_param($prep, "ssss", $szigszam, $nev, $szuldatum, $szigszamr);
    $ret = mysqli_stmt_execute($prep);
    mysqli_close($conn);

    return $ret;

}

function stat0() {
    if (!($conn = connect())) {
        return false;
    }
    $res = mysqli_query($conn, "SELECT *
                                        FROM musor
                                        WHERE keletkezes = (SELECT MIN(keletkezes) FROM musor)") or die(mysql_error());
    mysqli_close($conn);
    return $res;
}

function stat1() {
    if (!($conn = connect())) {
        return false;
    }
    $res = mysqli_query($conn, "SELECT csnev, COUNT(idopont.csid) as szam
                                        FROM csatorna
                                        INNER JOIN idopont ON csatorna.csid = idopont.csid
                                        GROUP BY csnev") or die(mysql_error());
    mysqli_close($conn);
    return $res;
}

function stat3(){
    if (!($conn = connect())) {
        return false;
    }

    /*
     *  SELECT musor.cim, COUNT(sznev) as db
        FROM szereplo
        INNER JOIN musor ON musor.mid = szereplo.mid
        GROUP BY szereplo.mid
     *
     */
    $res = mysqli_query($conn, "SELECT musor.cim, COUNT(szereplotomusor.szid) as db 
                                        FROM szereplotomusor 
                                        INNER JOIN musor ON musor.mid = szereplotomusor.mid 
                                        INNER JOIN szereplo ON szereplo.szid = szereplotomusor.szid 
                                        GROUP BY szereplotomusor.mid") or die(mysql_error());
    mysqli_close($conn);
    return $res;
}
function stat4() {
    if (!($conn = connect())) {
        return false;
    }
    $res = mysqli_query($conn, "SELECT *
                                        FROM musor
                                        WHERE keletkezes = (SELECT MAX(keletkezes) FROM musor)") or die(mysql_error());
    mysqli_close($conn);
    return $res;
}
function stat5() {
    if (!($conn = connect())) {
        return false;
    }
    $res = mysqli_query($conn, "SELECT sznev, COUNT(sznev) as db
                                        FROM szereplo
                                        GROUP BY sznev") or die(mysql_error());
    mysqli_close($conn);
    return $res;
}







