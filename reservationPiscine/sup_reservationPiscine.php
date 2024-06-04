<?php
     include_once("../connexion.php");
    $sup_id = $_GET["idPiscine"];
    $sup = $con->exec("DELETE FROM `reservationPiscine` WHERE idPiscine=$sup_id");
    if($sup != ""){
        header("Location: reservationPiscine.php");
    }else{
        echo "erreur";
    }
?>
