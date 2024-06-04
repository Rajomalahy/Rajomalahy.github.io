<?php
    include_once("connexion.php");
    $coordX = $_POST["coordX"];
    $coordY = $_POST["coordY"];

    $sql = $con->prepare("INSERT INTO coordonnees(coordX, coordY) VALUES ('$coordX', '$coordY')");
    $sql->execute();
    header("Location: canvas.php");
?>