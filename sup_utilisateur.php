<?php
     include_once("connexion.php");
    $sup_id = $_GET["id_utilisateur"];
    $sup = $con->exec("DELETE FROM `utilisateur` WHERE id_utilisateur=$sup_id");
    if($sup != ""){
        header("Location: utilisateur.php");
    }else{
        echo "erreur";
    }
?>