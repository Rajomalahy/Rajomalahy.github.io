<?php
    include_once("connexion.php");
    $id = $_GET["id_categorie"];
    $select = $con->prepare("SELECT * FROM categorie WHERE id_categorie = :id_categorie");
    $select->execute(array(
        'id_categorie' => $id
    ));
    $data = $select->fetchAll();

if(isset($_POST["send"])){
    $nom = $_POST["nom"];
    $modif = $con->prepare("UPDATE categorie SET nom = :nom WHERE id_categorie = $id");
    $modif->execute(array(
        'nom' => $nom
    ));
    header("Location: categorie.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="fonts/css/all.min.css">
    <link rel="stylesheet" href="fonts/css/fontawesome.min.css">
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
</head>
<body>
<script src="ckeditor/ckeditor.js"></script>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">nom categorie</label>
                <textarea type="textarea" name="nom" class="form-control" id="formGroupExampleInput"><?php echo $data[0]["nom"]; ?></textarea>
            </div>
            <button type="submit" name="send" class="btn btn-primary">Modifier</button>
        </form>

    <script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script>  
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
    </div>
    <script>
        CKEDITOR.replace('formGroupExampleInput');
    </script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script>  
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
</body>
</html>