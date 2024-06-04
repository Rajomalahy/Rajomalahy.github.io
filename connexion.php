<?php
    try{
        $con = new PDO ("mysql:host=localhost;dbname=projet_stage","root","");
    }catch( Exception $e){
        die('Erreur : '.$e->getMessage());
    }
?>