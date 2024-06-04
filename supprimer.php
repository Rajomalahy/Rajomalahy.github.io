<?php
     include_once("connexion.php");
    $sup_id = $_GET["id_plat"];
    $sup = $con->exec("DELETE FROM `plat` WHERE id_plat=$sup_id");
    if($sup != ""){
        header("Location: plat.php");
    }else{
        echo "erreur";
    }
?>