<?php
    include_once("connexion.php");
    $id = $_GET["id_plat"];
    $select = $con->prepare("SELECT * FROM plat WHERE id_plat = :id_plat");
    $select->execute(array(
        'id_plat' => $id
    ));
    $data = $select->fetchAll();

if(isset($_POST["send"])){
    $nom = $_POST["nom"];
    $prix = $_POST["prix"];
    $modif = $con->prepare("UPDATE plat SET nom_plat = :nom,prix_plat = :prix WHERE id_plat = $id");
    $modif->execute(array(
        'nom' => $nom,
        'prix' =>$prix
    ));
    header("Location: plat.php");
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
                <label for="formGroupExampleInput">nom du plat</label>
                <textarea type="textarea" name="nom" class="form-control" id="formGroupExampleInput"><?php echo $data[0]["nom_plat"]; ?></textarea>
            </div>
            <div class="form-group"> 
                <label for="formGroupExampleInput2">prix</label>
                <input value="<?php echo $data[0]["prix_plat"]; ?>" type="text" name="prix" class="form-control" id="formGroupExampleInput2" >
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