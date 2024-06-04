<?php
session_start();

  if (!isset($_SESSION["level"]) || $_SESSION["level"] == "user") {
    header("Location: login.php");
    exit();
}

include_once("connexion.php");
if(isset($_POST["send"])){
    $nom = $_POST["nom"];
    $mail = $_POST["email"];
    $pass = $_POST["pass"];
    $role = $_POST["role"];
    $codeUnique = "salem";

    $passeAvecCode = $codeUnique . $pass;
    $hashedPassword = hash('sha256', $passeAvecCode);
    $ajout = $con->prepare("INSERT INTO `utilisateur` (nom_utilisateur,pass_utilisateur,role_utilisateur,
    mail_utilisateur) VALUES ('$nom','$hashedPassword','$role','$mail')");
    $ajout->execute(array(
        'nom_utilisateur' => $nom,
        'pass_utilisateur' => $hashedPassword,
        'role' => $role,
        'mail_utilisateur' => $mail
    ));
    if($ajout){
        header("Location: utilisateur.php");
    }
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
    <title>utilisateur</title>
</head>
<body>
    <div class="dashboard-container">
        <div class="main-sidebar">
            <div class="aside-header">
                <div class="brand">  
                    <h3>SALEM HOTEL</h3>
                </div>
                <div class="close" id="closeSidebar">
                    <i class="fas fa-close"></i>
                </div>
            </div>
            <div class="sidebar">
                <ul class="list-items">
                    <li id="menu1" class="item">
                        <a href="page.php" class="active">
                            <i class="fas fa-bars"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li id="menu2" class="item">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-dashboard"></i>
                            <span>Statistiques</span> 
                        </a>
                        <div id="menu_reservation" class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div id="reserve1">
                                <a class="dropdown-item" href="reservation_table.php">réservation des tables</a>
                            </div>
                            <div id="reserve2">
                                <a class="dropdown-item" href="reservation_salle.php">réservation des salle</a>
                            </div>
                            <div id="reserve3">
                                <a class="dropdown-item" href="reservation_chambre.php">réservation des chambres</a>
                            </div>
                            <div id="reserve4">
                                <a class="dropdown-item" href="reservation_piscine.php">réservation des piscines</a>
                            </div>
                        </div>
                    </li>
                    <li id="menu3" class="item">
                            <a  href="parametres.php">
                                <i class="fas fa-gear"></i>
                                <span>Parametres</span> 
                            </a>
                    </li>
                    <li id="menu4" class="item">
                        <a href="utilisateur.php">
                            <i class="fas fa-user"></i>
                            <span>Utilisateurs</span>
                        </a>
                    </li>
                    <li id="menu6" class="item">
                        <a href="table.php">
                            <i class="fa fa-table"></i>
                            <span>tables</span>
                        </a>
                    </li>
                    <li id="menu7" class="item">
                        <a href="categorie">
                            <i class="fas fa-table"></i>
                            <span>Categorie</span>
                        </a>
                    </li>
                    <li id="menu8" class="item">
                        <a href="plat.php">
                            <i class="fas fa-table"></i>
                            <span>Plats</span>
                        </a>
                    </li>
                    <li id="menu9" class="item">
                        <a href="deconnexion.php">
                            <i class="fas fa-dashboard"></i>
                            <span>Deconnexion</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Utilisateur</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input id="myInput" class="form-control mr-sm-4" type="search" onkeyup="search()" name="recherche" placeholder="recherche" aria-label="Search">
                        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button> -->
                    </form>
                </div>
            </nav>
            <div class="ro">
                <h2> listes des utilisateurs</h2>
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
            </div>
            <table id="tab" class="table">
                <thead>
                    <tr>
                        <th scope="col">nom</th>
                        <th scope="col">mot de passe</th>
                        <th scope="col">role</th>
                        <th scope="col">Email</th>
                        <th scope="col">Supprimer</th>
                        <th scope="col">Modifier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $tableau = $con->prepare("SELECT * FROM utilisateur ");
                        $tableau->execute();
                        $tab = $tableau->fetchAll();                       
                    ?>
                    <?php foreach($tab as $element){?>
                        <tr class="items">
                            <td><?php echo $element["nom_utilisateur"]; ?></td>
                            <td><?php echo $element["pass_utilisateur"]; ?></td>
                            <td><?php echo $element["role_utilisateur"]; ?></td>
                            <td><?php echo $element["mail_utilisateur"]; ?></td>
                            <td><a href="sup_utilisateur.php?id_utilisateur=<?=$element["id_utilisateur"];?>"><i class="fa fa-window-close"></i></a></td>
                            <td><a href="modif_utilisateur.php?id_utilisateur=<?=$element["id_utilisateur"];?>"><i class="fa fa-pen"></i></a></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
       <div class="extrabar">
            <section id="orders" class="recent-orders">
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Utilisateurs</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post">
                                <div class="modal-body">
                                    <div class="container">
                                            <div class="form-group">
                                                <label for="nom">nom</label>
                                                <textarea type="text" name="nom" class="form-control" id="nom" ></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="pass">mot de passe</label>
                                                <input type="text" name="pass" class="form-control" id="pass">
                                            </div>
                                            <div class="form-group">
                                                <label for="role">role</label>
                                                <input type="text" name="role" class="form-control" id="role">
                                            </div>
                                            <div class="form-group">
                                                <label for="mail">E-mail</label>
                                                <input type="text" name="email" class="form-control" id="mail">
                                            </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" name="send" class="btn btn-primary">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                        <header class="header-right">
                            <div class="toggle-menu-btn" id="openSidebar">
                                <span class="fas fa-bars"></span>
                            </div>
                            <div class="toggle-theme">
                                <span class="fas fa-sun active"></span>
                                <span class="fas fa-moon"></span>
                            </div>
                        </header>
            </section>
       </div>
    </div> 
    <script src="JavaScript/search.js"></script>
    <script src="JavaScript/dash.js"></script>
    <script src="JavaScript/jquery3.js"></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script>  
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
</body>
</html>