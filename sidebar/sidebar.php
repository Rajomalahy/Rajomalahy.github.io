<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../fonts/css/all.min.css">
    <link rel="stylesheet" href="../fonts/css/fontawesome.min.css"> 
    <link rel="stylesheet" href="../css/style.css">
    <title>sidebar</title>
</head>
<body>
<div class="sidebar">
                <ul class="list-items">
                    <li id="menu1" class="item">
                        <a href="../page.php" >
                            <i class="fas fa-bars"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="item">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-dashboard"></i>
                            <span>Statistiques</span> 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div>
                                <a class="dropdown-item" href="../reservation_table.php">réservation des tables</a>
                            </div>
                            <div id="reserve2">
                                <a class="dropdown-item" href="../reservation_salle.php">réservation des salle</a>
                            </div>
                            <div id="reserve3">
                                <a class="dropdown-item" href="../reservation_chambre.php">réservation des chambres</a>
                            </div>
                            <div id="reserve4">
                                <a class="dropdown-item" href="../reservation_piscine.php">réservation des piscines</a>
                            </div>
                        </div>
                    </li>
                    <li id="menu3" class="item">
                            <a  href="../parametres.php">
                                <i class="fas fa-gear"></i>
                                <span>Parametres</span> 
                            </a>
                        </li>
                    <li id="menu4" class="item">
                        <a href="../utilisateur.php">
                            <i class="fas fa-user"></i>
                            <span>Utilisateurs</span>
                        </a>
                    </li>
                    <li id="menu6" class="item">
                        <a href="../table.php">
                            <i class="fa fa-table"></i>
                            <span>tables</span>
                        </a>
                    </li>
                    <li id="menu7" class="item">
                        <a href="../categorie.php">
                            <i class="fas fa-table"></i>
                            <span>Categorie</span>
                        </a>
                    </li>
                    <li id="menu8" class="item">
                        <a href="../plat.php">
                            <i class="fas fa-table"></i>
                            <span>Plats</span>
                        </a>
                    </li>
                    <li id="menu9" class="item">
                        <a href="../deconnexion.php">
                            <i class="fas fa-dashboard"></i>
                            <span>Deconnexion</span>
                        </a>
                    </li>

                </ul>
            </div>
    <script src="../JavaScript/dash.js"></script>
    <script src="../JavaScript/jquery3.js"></script>    
    <script src="../bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script>  
    <script src="../bootstrap-4.4.1-dist/js/bootstrap.js"></script>
</body>
</html>