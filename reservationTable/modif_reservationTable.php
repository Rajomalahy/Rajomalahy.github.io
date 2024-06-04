<?php
session_start();
include_once("../connexion.php");
    $id = $_GET["idTable"];
    $select = $con->prepare("SELECT * FROM reservationTable WHERE idTable = :idTable");
    $select->execute(array(
        'idTable' => $id
    ));
    $data = $select->fetchAll();

if (isset($_POST["ajout"])) {
    $para = $_POST["paragraphes"];
    $para2 = $_POST["paragraphes2"];
    $images = array();

    for ($i = 1; $i <= 3; $i++) {
        if (!empty($_FILES["my_image$i"]["tmp_name"])){
            $target_dir = "../image/";
            $target_file = $target_dir . basename($_FILES["my_image$i"]["name"]);
            move_uploaded_file($_FILES["my_image$i"]["tmp_name"], $target_file);
            $images[] = $_FILES["my_image$i"]["name"];
            header("Location: reservationTable.php");
        } else {
            $images[] = $data[0]["imgTable$i"];
            $modif = $con->prepare("UPDATE reservationTable SET paragraphesTable = :paragraphes, paragraphesTable2 = :paragraphes2 WHERE idTable = $id");
            $modif->execute(array(
                'paragraphes' => $para,
                'paragraphes2' => $para2
            ));
            header("Location: reservationTable.php");
        }
    }
    $modif = $con->prepare("UPDATE reservationTable SET imgTable1 = ?, imgTable2 = ?, imgTable3 = ?, paragraphesTable = ?, paragraphesTable2 = ? WHERE idTable = ?");
    $modif->execute([$images[0], $images[1], $images[2], $para, $para2, $id]);
}


// if (!isset($_SESSION["logged"]) || $_SESSION["level"] !== "admin") {
//     header("Location: login.php");
//     exit();
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fonts/css/all.min.css">
    <link rel="stylesheet" href="../fonts/css/fontawesome.min.css">
    <link rel="stylesheet" href="../bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <title></title>
</head>
<body>
    <div class="container col-md-5 col-md-offset-3">
            <div class="panel panel-info">
                <div class="panel-body">
                    <form method="post" enctype ="multipart/form-data">
                            <?php for ($i = 1; $i <= 3; $i++) { ?>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-2 col-form-label">Image actuelle</label>
                            <div class="col-sm-10">
                                <?php if (!empty($data[0]["imgTable$i"])): ?>
                                    <img src="../image/<?php echo $data[0]["imgTable$i"]; ?>" alt="Image actuelle" width="100">
                                <?php else: ?>
                                    <p>Aucune image actuellement</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="colFormLabel" class="col-sm-2 col-form-label">Nouvelle image<?php echo $i; ?> </label>
                            <div class="col-sm-10">
                                <input type="file" name="my_image<?php echo $i;?>" class="form-control">
                            </div>
                        </div>
                            <?php } ?>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">paragraphe</label>
                                <div class="col-sm-10">
                                <input type="text" name="paragraphes" id="paragraphes" class="form-control" value ="<?php echo $data[0]["paragraphesTable"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabel" class="col-sm-2 col-form-label">paragraphe</label>
                                <div class="col-sm-10">
                                <input type="text" name="paragraphes2" id="paragraphes" class="form-control" value= "<?php echo $data[0]["paragraphesTable2"]; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                <input type="submit" name="ajout" value="Modifier" class="form-control" >
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../JavaScript/jquery3.js"></script>
    <script src="../bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script>  
    <script src="../bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>   
</body>
</html>
