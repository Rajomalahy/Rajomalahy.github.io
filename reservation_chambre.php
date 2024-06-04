
<?php
session_start();
    include("connexion.php");
    if(isset($_GET["id_reservation_chambre"])){
        $main_id = $_GET["id_reservation_chambre"];
        $modif_notif = $con->prepare("UPDATE reservation_chambre SET status = 1 WHERE id_reservation_chambre = '$main_id'");
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
    <title>reservation chambre</title>
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
                        <a href="page.php" >
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
                        <a href="categorie.php">
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
                <h3 class="main-titre">Statistique de réservation des chambres</h3>
                    <div class="insights">
                        <div class="card">
                            <div class="card-container">
                                <div class="card-header">
                                    <i class="fas fa-table"></i>
                                </div>
                                <div class="card-body">
                                        <h3>Tables</h3>
                                        <?php
                                        include_once("connexion.php");
                                        $table = $con->prepare("SELECT COUNT(id_table) AS total FROM table_resto");
                                        $table->execute();
                                        while($row=$table->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <p><?php echo $row["total"]; ?></p>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-container">
                                <div class="card-header">
                                    <i class="fa fa-clipboard"></i>
                                </div>
                                <div class="card-body">    
                                        <h3>Plats</h3>
                                        <?php
                                        include_once("connexion.php");
                                        $table = $con->prepare("SELECT COUNT(id_plat) AS total FROM plat");
                                        $table->execute();
                                        while($row=$table->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <p><?php echo $row["total"]; ?></p>
                                        <?php } ?>
                                        <p><?php echo $row["total"]; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-container">
                                <div class="card-header">
                                    <i class="fa fa-clipboard"></i>
                                </div>
                                <div class="card-body">
                                        <h3>categorie</h3>
                                        <?php
                                        include_once("connexion.php");
                                        $table = $con->prepare("SELECT COUNT(id_categorie) AS total FROM categorie");
                                        $table->execute();
                                        while($row=$table->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <p><?php echo $row["total"]; ?></p>
                                        <?php } ?>
                                        <p><?php echo $row["total"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="statistique">
                    <div class="card-visite1">
                        <div class="state2">
                            <h4> Statistiques des réservations de la table</h4>
                            <div class="state-1">
                                <script src="JavaScript/chart.js"></script>
                                <canvas id="barCanvas" aria-label="chart" role="img">
                                </canvas>  
                                <script>
                            
                                    const barCanvas = document.getElementById('barCanvas');

                                    const barChart = new Chart(barCanvas, {
                                    type: 'bar',
                                    data: {
                                    <?php

                                        include("connexion.php");
                                        $reserve = $con->prepare("SELECT COUNT(id_reservation_chambre) AS effectif, date_debut FROM reservation_chambre GROUP BY date_debut");
                                        $reserve->execute();
                                        $data = $reserve->fetchAll(PDO::FETCH_ASSOC);

                                        $labels = array_column($data, 'date_debut');
                                        $effectifs = array_column($data, 'effectif');
                                        ?>
                                    labels:<?php echo json_encode($labels); ?> ,
                                    datasets: [{
                                        data:  <?php echo json_encode($effectifs); ?>,
                                        backgroundColor : [
                                        "#3CB371",
                                        "#2F4F4F"
                                        ],
                                        borderWidth: 1
                                    }]
                                    },
                                    options: {
                                    scales: {
                                        y: {
                                        suggestedMax: 10,
                                        ticks:{
                                            font:{
                                            size : 16
                                            }
                                        }
                                        },
                                        x : {
                                        ticks : {
                                            font : {
                                                size : 16
                                            }
                                            }
                                            }
                                        }
                                        }
                                        });

                                </script>     
                            </div>
                        </div> 
                    </div>  
                </div>
            </div>
                <div class="extrabar">
                    <header class="header-right">
                        <div class="toggle-menu-btn" id="openSidebar">
                            <span class="fas fa-bars"></span>
                        </div>
                        <div class="toggle-theme">
                                <span class="fas fa-sun active"></span>
                                <span class="fas fa-moon"></span>
                            </div>
                        <div class="toggle-enveloppe">
                            <?php
                            include_once("connexion.php");
                            $select = $con->prepare("SELECT * FROM reservation_chambre WHERE status =0");
                            $select->execute();
                            $count = $select->fetchAll();
                            ?>
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="badge badge-danger" id="count"><?php echo count($count); ?></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">  
                                    <?php
                                        include_once("connexion.php");
                                        $select = $con->prepare("SELECT * FROM reservation_chambre WHERE status =0");
                                        $select->execute();
                                        $count = $select->fetchAll();
                                        if($count>0){
                                            foreach($count as $element){
                                                echo ' <a class="dropdown-item" href="reservation_chambre.php?id_reservation_chambre='.$element['id_reservation_chambre'].' ">'.$element['date_debut'].'</a> ';
                                                echo "<a class='dropdown-item'></a>";
                                            }
                                        }else{
                                            echo '<a class="dropdown-item text-danger font-weight-bold" href="#"><i class="fas fa-frown-open"></i> Aucun notification</a>';
                                        }
                                    ?> 
                                </div>
                        </div>
                    </header>
                    
                    <div class="recent-updat">
                        <h2>notifications</h2>
                        <div class="tableau">
                            <table>
                                <thead class="minuscule">
                                    <tr>
                                        <th scope="col">S_N</th>
                                        <th scope="col">date</th>
                                        <th scope="col">heure</th>
                                        <th scope="col">client</th>
                                        <th scope="col">table</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sr_no = 0; 
                                        include("connexion.php");
                                        $notify = $con->prepare("SELECT * FROM reservation_chambre WHERE status = 1");
                                        $notify->execute();
                                        // $tab = $notify->fetchAll();
                                        $tab = $notify->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($tab as $element){
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $sr_no++; ?></th>
                                        <td><?php echo $element["date_debut"] ;?></td>
                                        <td><?php echo $element["date_fin"] ;?></td>
                                        <td><?php echo $element["id_client"] ;?></td>
                                        <td><?php echo $element["id_chambre"] ;?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>  
    </div>

<script src="JavaScript/dash.js"></script>
<script src="JavaScript/jquery3.js"></script>    
<script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script>  
<script src="bootstrap-4.4.1-dist/js/bootstrap.js"></script>
</body>
</html>