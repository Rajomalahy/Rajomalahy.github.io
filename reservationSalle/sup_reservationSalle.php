<?php
     include_once("../connexion.php");
    $sup_id = $_GET["idSalle"];
    $sup = $con->exec("DELETE FROM `reservationSalle` WHERE idSalle=$sup_id");
    if($sup != ""){
        header("Location: reservationSalle.php");
    }else{
        echo "erreur";
    }
?>
