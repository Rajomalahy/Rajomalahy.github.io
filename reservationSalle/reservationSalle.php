<?php
session_start();
include_once("../connexion.php");

if (!isset($_SESSION["level"]) || $_SESSION["level"] == "user") {
    header("Location: login.php");
    exit();
}
?>
<?php
    if(isset($_POST["ajout"])){
        $para = $_POST["paragraphe"];
        $para2 = $_POST["paragraphe2"]; 
        $images = array();

        for ($i = 1; $i <= 3; $i++) {
            $photo = $_FILES["my_image_$i"]["name"];
            $upload = "../image/".$photo;
            move_uploaded_file($_FILES["my_image_$i"]["tmp_name"], $upload);
            $images[] = $photo; 
        }
        $sql = $con->prepare("INSERT INTO reservationSalle(imgSalle1,imgSalle2, imgSalle3, paragraphesSalle, paragraphesSalle2) VALUES (?, ?, ?, ?, ?)");

        $sql->execute([$images[0],$images[1],$images[2], $para, $para2]);
    
        header("Location: reservationSalle.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-4.4.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../fonts/css/all.min.css">
    <link rel="stylesheet" href="../fonts/css/fontawesome.min.css"> 
    <link rel="stylesheet" href="../css/style.css">
    <title>Galerie</title>
</head>
<body>
      <div  class="dashboard-container">
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
                        <li class="item" >
                            <a href="../page.php"  class="active">
                                <i class="fas fa-bars"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="item">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-dashboard"></i>
                                <span>Statistiques</span> 
                            </a>
                            <div id="menu_reservation" class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div id="reserve1">
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
                        <li class="item">
                        <a  href="../parametres.php">
                            <i class="fas fa-gear"></i>
                            <span>Parametres</span> 
                        </a>
                    </li>
                        <li class="item">
                            <a href="../utilisateur.php">
                                <i class="fas fa-user"></i>
                                <span>Utilisateurs</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="../table.php">
                                <i class="fa fa-table"></i>
                                <span>tables</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="../categorie.php">
                                <i class="fas fa-table"></i>
                                <span>Categorie</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="../plat.php">
                                <i class="fas fa-table"></i>
                                <span>Plats</span>
                            </a>
                        </li>
                        <li class="item">
                            <a href="../deconnexion.php">
                                <i class="fas fa-dashboard"></i>
                                <span>Deconnexion</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="main-container">
                <div class="ro">
                    <h2>reservation salle de confèrence</h2>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">image</th>
                            <th scope="col">image</th>
                            <th scope="col">image</th>
                            <th scope="col">paragraphes</th>
                            <th scope="col">paragraphes</th>
                            <th scope="col">Modifier</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once("../connexion.php");
                            $sql = $con->prepare("SELECT * FROM reservationSalle");
                            $sql->execute();
                            $fetch = $sql->fetchAll();
                            foreach($fetch as $tab){
                        ?>
                            <tr>
                                <td><img src="../image/<?php echo $tab["imgSalle1"];?>" width="50px" height="50px"></td>
                                <td><img src="../image/<?php echo $tab["imgSalle2"];?>" width="50px" height="50px"></td>
                                <td><img src="../image/<?php echo $tab["imgSalle3"];?>" width="50px" height="50px"></td>
                                <td><?php echo $tab["paragraphesSalle"]; ?></td>
                                <td><?php echo $tab["paragraphesSalle2"]; ?></td>
                                <td><a href="modif_reservationSalle.php?idSalle=<?php echo $tab["idSalle"]; ?>"><i class="fa fa-pen"></i></a></td>
                                <td><a href="sup_reservationSalle.php?idSalle=<?php echo $tab["idSalle"]; ?>"><i class="fa fa-window-close"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="extrabar">
                <section id="orders" class="recent-orders">
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">article</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" enctype ="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="container">
                                                <?php for ($i = 1; $i <= 3; $i++) { ?>
                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-2 col-form-label">image</label>
                                                <div class="col-sm-10">
                                                <input type="file" name="my_image_<?php echo $i; ?>" class="form-control" >
                                                </div>
                                            </div>
                                                <?php } ?>
                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-2 col-form-label">paragraphes</label>
                                                <div class="col-sm-10">
                                                <textarea name="paragraphe" id="paragraphe" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="colFormLabel" class="col-sm-2 col-form-label">paragraphes2</label>
                                                <div class="col-sm-10">
                                                <textarea name="paragraphe2" id="paragraphe" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <button  type="submit" name="ajout" value="Ajouter" class="btn btn-primary">Ajouter</button>
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
                                <i class="fas fa-sun active"></i>
                                <i class="fas fa-moon"></i>
                            </div>
                        </header>
                </section>                
            </div>
      </div>

    <script src="../JavaScript/dash.js"></script>
    <script src="../JavaScript/jquery3.js"></script>    
    <script src="../bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script>  
    <script src="../bootstrap-4.4.1-dist/js/bootstrap.js"></script>
</body>
</html>