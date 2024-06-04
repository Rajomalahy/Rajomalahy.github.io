<?php
    // session_start();   
    // header("cache-control: no cache, must-revelidate");
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
//    if (!isset($_SESSION["level"]) || $_SESSION["level"] == "user") {
//     header("Location: login.php");
//     exit();
// }
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
    <title>page</title>
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
                    <li class="item">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-dashboard"></i>
                            <span>Statistiques</span> 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                    <li  class="item">
                        <a  href="parametres.php">
                            <i class="fas fa-gear"></i>
                            <span>Parametres</span> 
                        </a>
                    </li>
                    <li id="menu4" class="item">
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
                    <!-- <li id="menu8" class="item">
                        <a href="canvas.php">
                            <i class="fas fa-paste"></i>
                            <span>Canvas</span>
                        </a>
                    </li> -->
                    <li id="menu9" class="item">
                        <a href="deconnexion.php">
                            <i class="fas fa-dashboard"></i>
                            <span>Deconnexion</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
            <div  class="main-container">
                <h1 class="main-title">Dashboard</h1>
                <!-- card -->
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
                    <div class="card-visite">
                        <div class="state">
                            <h4> Statistiques mensuelles des Visiteurs</h4>
                            <div class="state-1">
                                <script src="JavaScript/chart.js"></script> 
                                    <canvas id="myChart"></canvas>
                                    <script>
                                        const ctx = document.getElementById('myChart');

                                        new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                <?php
                                                    include("connexion.php");
                                                    $monthlyData = array();
                                                    $monthlyLabels = array();
                                                    $monthlyQuery = $con->prepare("SELECT mois_visite AS mois, COUNT(*) AS total FROM visiteur GROUP BY mois_visite");
                                                    $monthlyQuery->execute();
                                                    while ($row = $monthlyQuery->fetch(PDO::FETCH_ASSOC)) {
                                                        $monthlyData[] = $row['total'];
                                                        $monthlyLabels[] = $row['mois'];
                                                    }
                                                    ?>
                                            labels:  <?php echo json_encode($monthlyLabels); ?>,
                                            datasets: [{
                                                label: 'Année',
                                                data: <?php echo json_encode($monthlyData); ?>,
                                                backgroundColor : [
                                                "#3CB371",
                                                "#3CB371"
                                                ],
                                                borderWidth: 1
                                            }]
                                            },
                                            options: {
                                            scales: {
                                                y: {
                                                beginAtZero: true
                                                }
                                            }
                                            }
                                        });
                                    </script>
                            </div>
                        </div>                  
                    </div>  
                        <div class="card-visite">
                            <div class="state">
                                <h4> Statistiques annuelles des Visiteurs</h4>
                                <div class="state-1">
                                    <script src="JavaScript/chart.js"></script> 
                                        <canvas id="yourChart"></canvas>
                                        <script>
                                            const cts = document.getElementById('yourChart');

                                            new Chart(cts, {
                                                type: 'line',
                                                data: {
                                                    <?php
                                                        include("connexion.php");
                                                        $annualData = array();
                                                        $annualLabels = array();
                                                        $annualQuery = $con->prepare("SELECT annee_visite AS annee, COUNT(id_visiteur) AS total FROM visiteur GROUP BY annee_visite");
                                                        $annualQuery->execute();
                                                        while ($row = $annualQuery->fetch(PDO::FETCH_ASSOC)) {
                                                            $annualData[] = $row['total'];
                                                            $annualLabels[] = $row['annee'];
                                                        }
                                                    ?>
                                                labels: <?php echo json_encode($annualLabels); ?>,
                                                datasets: [{
                                                    label: 'Année',
                                                    data: <?php echo json_encode($annualData); ?>,
                                                    backgroundColor : [
                                                    "blue",
                                                    "blue"
                                                    ],
                                                    borderWidth: 1
                                                }]
                                                },
                                                options: {
                                                scales: {
                                                    y: {
                                                        suggestedMax: 5,
                                                        beginAtZero: true
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
                <header class="header-droit">
                    <div class="toggle-menu-btn" id="openSidebar">
                        <span class="fas fa-bars"></span>
                    </div>
                    <div class="toggle-theme">
                        <span class="fas fa-sun active"></span>
                        <span class="fas fa-moon"></span>
                    </div>
                    <!-- <div class="toggle-enveloppe">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="badge badge-danger" id="count"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">   
                        </div>
                    </div> -->
                </header> 
                <div class="visiteur">
                    <div class="card-header">
                        <i class="fa fa-user"></i>
                    </div>
                    <h3>Nombre de visiteurs</h3>
                        <div class="card-body">
                            <?php
                                include_once("connexion.php");
                                $table = $con->prepare("SELECT COUNT(id_visiteur) AS total FROM visiteur");
                                $table->execute();
                                while($row=$table->fetch(PDO::FETCH_ASSOC)){
                            ?>
                            <p><?php echo $row["total"]; ?></p>
                            <?php } ?>
                        </div>
                </div> 
                <div class="recent-update">
                    <h2>Commandes</h2>
                    <div class="tableau">
                        <table>
                            <thead class="minuscule">
                                <tr>
                                    <th scope="col">numero</th>
                                    <th scope="col">description</th>
                                    <th scope="col">hotel</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $tableau = $con->prepare("SELECT * FROM commande ");
                                    $tableau->execute();
                                    $tab = $tableau->fetchAll();                       
                                ?>
                                <?php foreach($tab as $element){?>
                                    <tr>
                                        <td><?php echo $element["date_livraison"]; ?></td>
                                        <td class="rose"><?php echo $element["Lieu"]; ?></td>
                                        <td><?php echo $element["id_client"]; ?></td>
                                    </tr>
                                <?php }?>
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