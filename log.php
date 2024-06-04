<?php
session_start();

if(isset($_POST['Connecter'])){
    if(!empty($_POST['nom_utilisateur']) && !empty($_POST['mail_utilisateur']) && !empty($_POST['pass_utilisateur']) && !empty($_POST['role_utilisateur'])){
        $nom = $_POST["nom"];
        $mail = $_POST["mail"];
        $passe = $_POST["pass"];
        $role = $_POST["role"];
        include("connexion.php");

        $login = $con->prepare("SELECT * FROM utilisateur WHERE nom_utilisateur = $nom AND mail_utilisateur = $mail AND pass_utilisateur = $passe AND role_utilisateur = $role");
        $login->execute();

        if($res){
            while($row = mysqli_fetch_assoc($res)) {
                $_SESSION['utilisateur'] = $row["pseudo"];
                header("Location: Statistique.php");
            }
        }else{
            echo "Erreur de connexion";
        }
        mysqli_close($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="nom" id="nom"></br></br>
        <input type="email" name="mail" id="mail"></br></br>
        <input type="password" name="pass" id="pass"></br></br>
        <input type="text" name="role" id="role"></br></br>
        <input type="submit" name="Connecter" value="se connecter">
    </form>
</body>
</html>