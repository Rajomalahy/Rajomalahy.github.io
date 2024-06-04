<?php
    include_once("connexion.php");
    $id = $_GET["id_utilisateur"];
    $select = $con->prepare("SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur");
    $select->execute(array(
        'id_utilisateur' => $id
    ));
    $data = $select->fetchAll();

if(isset($_POST["send"])){
    $nom = $_POST["nom"];
    $mail = $_POST["email"];
    $pass = $_POST["pass"];
    $role = $_POST["role"];
    $modif = $con->prepare("UPDATE utilisateur SET nom_utilisateur = :nom,pass_utilisateur = :pass,role_utilisateur = :role,mail_utilisateur = :mail WHERE id_utilisateur = $id");
    $modif->execute(array(
        'nom' => $nom,
        'pass' => $pass,
        'role' => $role,
        'mail' =>$mail
    ));
    header("Location: utilisateur.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="fonts/css/all.min.css">
    <link rel="stylesheet" href="fonts/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>modification d'utilisateur</title>
</head>
<body>
    <script src="ckeditor/ckeditor.js"></script>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">nom</label>
                <textarea type="text" name="nom" class="form-control" id="nom" ><?php echo $data[0]["nom_utilisateur"]; ?></textarea>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Mot de passe</label>
                <textarea type="text" name="pass" class="form-control" id="pass" ><?php echo $data[0]["pass_utilisateur"]; ?></textarea>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Role</label>
                <textarea type="text" name="role" class="form-control" id="role" ><?php echo $data[0]["role_utilisateur"]; ?></textarea>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">E-mail</label>
                <textarea type="email" name="email" class="form-control" id="mail" ><?php echo $data[0]["mail_utilisateur"]; ?></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="send" class="btn btn-primary">Modifier</button>
            </div>
        </form>
    </div>

    <script>
        CKEDITOR.replace('nom');
    </script>
    <script>
        CKEDITOR.replace('mail');
    </script>
    <script>
        CKEDITOR.replace('pass');
    </script>
    <script>
        CKEDITOR.replace('role');
    </script>
    <script src="JavaScript/jquery3.js"></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script>  
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
</body>
</html>