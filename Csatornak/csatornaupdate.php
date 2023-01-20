<?php
include_once("../fuggvenyek.php");

$csid = $_POST["csid"];
$pnev = $_POST['csatnev'];
$ptema = $_POST['csattema'];
$pkep = $_POST['kep'];
$pfile = $_FILES['fileToUpload'];

if ($pkep == $pfile["name"]) {
    if (isset($csid) && isset($pnev) && isset($pfile["name"])){
        editcsatorna($csid, $pnev, $ptema, $pkep);
        header("Location: csatornak.php");
    }else {
        error.log("Nincs beállítva valamelyik érték");
    }
} else {

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "A fájl nem kép. ";
            $uploadOk = 0;
        }
    }

// Check if file already exists
    if (file_exists($target_file)) {
        echo "Ez a fájl már létezik. ";
        if (isset($csid) && isset($pnev) && isset($pfile["name"])){
            editcsatorna($csid, $pnev, $ptema, $pkep);
            header("Location: csatornak.php");
        }else {
            error.log("Nincs beállítva valamelyik érték");
        }
        $uploadOk = 0;
    }

// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Túl nagy a fájl. ";
        $uploadOk = 0;
    }

// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "jfif") {
        echo "Csak JPG, PNG és JPEG fájlokat tölthet fel. ";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Hiba történt a fájl feltöltésekor. ";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

            if (isset($csid) && isset($pnev) && isset($pfile["name"])){
                unlink("uploads/".$pkep);
                editcsatorna($csid, $pnev, $ptema, $pfile["name"]);
                header("Location: csatornak.php");
            }else {
                error.log("Nincs beállítva valamelyik érték");
            }


            echo "Sikeresen feltöltötted ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). "-t";
        } else {
            echo "Hiba történt a fájl feltöltésekor. ";
        }
    }
}

/*
if (isset($ptema) && isset($pnev) && isset($pkep)) {
    editcsatorna($csid, $pnev, $ptema, $pkep);


}
*/




