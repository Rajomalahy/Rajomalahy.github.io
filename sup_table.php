<?php
     include_once("connexion.php");
    $sup_id = $_GET["id_table"];
    $sup = $con->exec("DELETE FROM `table_resto` WHERE id_table=$sup_id");
    if($sup != ""){
        header("Location: table.php");
    }else{
        echo "erreur";
    }
?>