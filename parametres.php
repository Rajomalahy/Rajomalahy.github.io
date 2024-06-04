<?php
    session_start();   
    header("cache-control: no cache, must-revelidate");
?>
<?php
    include_once("connexion.php");
    if(isset($_GET["id_reservation_table"])){
        $main_id = $_GET["id_reservation_table"];
        $modif_notif = $con->prepare("UPDATE reservation_table SET status = 1 WHERE id_reservation_table = '$main_id'");
        $modif_notif->execute();
    }
?>
<?php
    if (!isset($_SESSION["level"]) || $_SESSION["level"] == "user") {
        header("Location: login.php");
        exit();
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
    <title>parametres</title>
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
                        <a href="page.php" class="active" >
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
                    <li class="item">
                        <a href="utilisateur.php">
                            <i class="fas fa-user-tie"></i>
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
                        <a href="categorie.php">
                            <i class="fas fa-pager"></i>
                            <span>Categorie</span>
                        </a>
                    </li>
                    <li id="menu8" class="item">
                        <a href="plat.php">
                            <i class="fas fa-paste"></i>
                            <span>Plats</span>
                        </a>
                    </li>
                    <li id="menu8" class="item">
                        <a href="canvas.php">
                            <i class="fas fa-paste"></i>
                            <span>Canvas</span>
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
    <div class="main-cotainer">
        
        <ul class="group">
            <li>
                <div id="div" class="shadow p-3 mb-5  rounded">
                    <i class="fas fa-home"></i> 
                        logo du site
                        <div class="dive"><a href="salem_php/logo/logo.php"><i class="fas fa-greater-than"></i></a></div>
                </div>
            </li>
           <li>
                <div id="div" class="shadow p-3 mb-5  rounded">
                    <i class="fas fa-home"></i> 
                        En haut du site
                        <div class="div1"><a href="salem_php/head/site_head.php"><i class="fas fa-greater-than"></i></a></div>
                </div>
            </li>
            <li>
                <div id="div" class="shadow p-3 mb-5 bg-white rounded">
                    <i class="fas fa-wrench"></i>
                    container partie 1 du site
                    <div class="div2"><a href="salem_php/container/site_container_head.php"><i class="fas fa-greater-than"></i></a></div>
                </div>
            </li>
            <li>
                <div id="div" class="shadow p-3 mb-5 bg-white rounded">
                    <i class="fas fa-gavel"></i>
                    Le pied du site
                    <div class="divv"><a href="salem_php/footer/site_footer.php"><i class="fas fa-greater-than"></i></a></div>
                </div>
            </li>
            <li>
                <div id="div" class="shadow p-3 mb-5 bg-white rounded">
                    <i class="fas fa-gavel"></i>
                    Le pied du site partie2
                    <div class="div7"><a href="salem_php/footer2/site_footer2.php"><i class="fas fa-greater-than"></i></a></div>
                </div>
            </li>
            <li>
                <div id="div" class="shadow p-3 mb-5 bg-white rounded">
                    <i class="fas fa-gavel"></i>
                    Le pied du site partie3
                    <div class="div7"><a href="salem_php/footer3/site_footer3.php"><i class="fas fa-greater-than"></i></a></div>
                </div>
            </li>
            <li>
                <div id="div" class="shadow p-3 mb-5 bg-white rounded">
                    <i class="fas fa-image"></i>
                    Galerie
                    <div class="div3"><a href="acceuil_php/galerie/galerie_photo.php"><i class="fas fa-greater-than"></i></a></div>
                </div>
            </li>
            <li>
                <div id="div" class="shadow p-3 mb-5 bg-white rounded">
                    <i class="fas fa-image"></i>
                    article
                    <div class="div3"><a href="acceuil_php/article/article.php"><i class="fas fa-greater-than"></i></a></div>
                </div>
            </li>
            <li>
                <div id="div" class="shadow p-3 mb-5 bg-white rounded">
                    <i class="fas fa-image"></i>
                    reservation table
                    <div class="div5"><a href="reservationTable/reservationTable.php"><i class="fas fa-greater-than"></i></a></div>
                </div>
            </li>
            <li>
                <div id="div" class="shadow p-3 mb-5 bg-white rounded">
                    <i class="fas fa-image"></i>
                    reservation piscine
                    <div class="div4"><a href="reservationPiscine/reservationPiscine.php"><i class="fas fa-greater-than"></i></a></div>
                </div>
            </li>
            <li>
                <div id="div" class="shadow p-3 mb-5 bg-white rounded">
                    <i class="fas fa-image"></i>
                    reservation salle de conference
                    <div class="div6"><a href="reservationSalle/reservationSalle.php"><i class="fas fa-greater-than"></i></a></div>
                </div>
            </li>
            <li>
                <div id="div" class="shadow p-3 mb-5 bg-white rounded">
                    <i class="fas fa-image"></i>
                    Details
                    <div class="div3"><a href="details/details.php"><i class="fas fa-greater-than"></i></a></div>
                </div>
            </li>
        </ul>
    </div>
    <div class="extrabar">
                <header class="header-droit">
                    <div class="toggle-menu-btn" id="openSidebar">
                        <span class="fas fa-bars"></span>
                    </div>
                    <!-- <div class="toggle-theme">
                                <span class="fas fa-sun active"></span>
                                <span class="fas fa-moon"></span>
                    </div> -->
                </header>
    </div>
</div>
<script src="JavaScript/dash.js"></script>
<script src="JavaScript/jquery3.js"></script>    
<script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script>  
<script src="bootstrap-4.4.1-dist/js/bootstrap.js"></script>
</body>
</html>