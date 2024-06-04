<?php
     include_once("../connexion.php");
    $sup_id = $_GET["idTable"];
    $sup = $con->exec("DELETE FROM `reservationTable` WHERE idTable=$sup_id");
    if($sup != ""){
        header("Location: reservationTable.php");
    }else{
        echo "erreur";
    }
?>
