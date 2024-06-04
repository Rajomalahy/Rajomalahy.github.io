<?php
session_start();
if(isset($_SESSION["logged"])){
    header("Location: page.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="fonts/css/all.min.css">
    <link rel="stylesheet" href="fonts/css/fontawesome.min.css">
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="wrapper">
        <span class="bg-animate"></span>
        <div class="form-box login">
            <h2>Authentification</h2>
            <form method="post" action="#">
                <div class="input-box">
                    <input type="text" name="nom" id="nom" required>
                    <label for="nom">Nom</label>
                    <i class="fas fa-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="passe" id="passe" required>
                    <label for="pass">Mot de passe</label>
                    <i class="fas fa-lock"></i>
                </div>
                <button type="submit" class="btn" name="connecter"> Se Connecter</button>
            </form>
            <?php
                include_once("connexion.php");
                if(isset($_POST["connecter"])){
                    $nom = $_POST["nom"];
                    $passe = $_POST["passe"];

                    $login = $con->prepare("SELECT * FROM utilisateur WHERE nom_utilisateur = ?");
                    $login->execute([$nom]);
                    $data = $login->fetch(PDO::FETCH_ASSOC);

                    if($data){
                        $hashedPasswordInDatabase = $data["pass_utilisateur"];
                        if(hash('sha256', $passe) === $hashedPasswordInDatabase){
                            $_SESSION["level"] = $data["role_utilisateur"];
                                // $_SESSION["logged"] = TRUE;
                                if($_SESSION["level"] == "admin"){
                                    header("Location: page.php");
                                    exit();
                                }
                                else{
                                    header("Location: table.php");
                                    exit();
                                }
                        }else{
                            echo "<p> mot de passe  incorrecte ou nom incorrecte</p>";
                        }
                    }  else{
                        echo "<p> mot de passe  incorrecte ou nom incorrecte</p>";
                        }                  
                }
            ?>              
        </div>
        <div class="infos-text login">
            <h2>Salem hôtel</h2>
            <p>Bienvenue</br>chez Salem Hôtel Fianarantsoa</p>
        </div>
    </div>
</body>
</html>