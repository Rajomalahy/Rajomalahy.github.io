<?php
     include_once("connexion.php");
    $sup_id = $_GET["id_categorie"];
    $sup = $con->exec("DELETE FROM `categorie` WHERE id_categorie=$sup_id");
    if($sup != ""){
        header("Location: categorie.php");
    }else{
        echo "erreur";
    }
?>