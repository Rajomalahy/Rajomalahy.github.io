<?php
    include_once("connexion.php");
    $id = $_GET["id_table"];
    $select = $con->prepare("SELECT * FROM table_resto WHERE id_table = :id_table");
    $select->execute(array(
        'id_table' => $id
    ));
    $data = $select->fetchAll();

if(isset($_POST["send"])){
    $num = $_POST["numero"];
    $desc = $_POST["description"];
    $resto = $_POST["idResto"];
    $modif = $con->prepare("UPDATE table_resto SET num_table = :num,desc_table = :desc,id_resto = :resto WHERE id_table = $id");
    $modif->execute(array(
        'num' => $num,
        'desc' =>$desc,
        'resto' =>$resto
    ));
    header("Location: table.php");
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
                <label for="formGroupExampleInput">numero de la table</label>
                <input value="<?php echo $data[0]["num_table"]; ?>" type="text" name="numero" class="form-control" id="formGroupExampleInput">
            </div>
            <div class="form-group"> 
                <label for="formGroupExampleInput2">description de la table</label>
                <textarea name="description" class="form-control" id="formGroupExampleInput2"><?php echo $data[0]["desc_table"]; ?></textarea>
            </div>
            <div class="form-group"> 
                <label for="formGroupExampleInput2">numero du restaurant</label>
                <input value="<?php echo $data[0]["id_resto"]; ?>" type="text" name="idResto" class="form-control" id="formGroupExampleInput2" >
            </div>
            <button type="submit" name="send" class="btn btn-primary">Modifier</button>
        </form>

    </div>
    <script>
        CKEDITOR.replace('formGroupExampleInput2');
    </script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script>  
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
</body>
</html>