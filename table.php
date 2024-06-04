
<?php
include_once("connexion.php");
if(isset($_POST["send"])){
    $numero = $_POST["numero"];
    $description = $_POST["description"];
    $numResto = $_POST["idResto"];
    $ajout = $con->prepare("INSERT INTO `table_resto` (num_table,desc_table,id_resto) VALUES ('$numero','$description','$numResto')");
    $ajout->execute(array(
        'numero_table' => $numero,
        'description_table' => $description,
        'id_resto' => $numResto
    ));
    if($ajout){
        header("Location: table.php");
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
</head>
<body>
<script src="ckeditor/ckeditor.js"></script>
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
                <a class="navbar-brand" href="#">Table</a>
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
                    <h2> listes de tables</h2>
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
                </div>
                <table id="tab" class="table">
                    <thead>
                        <tr>
                            <th scope="col">numero</th>
                            <th scope="col">description</th>
                            <th scope="col">restaurant</th>
                            <th scope="col">Supprimer</th>
                            <th scope="col">Modifier</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $tableau = $con->prepare("SELECT * FROM table_resto ");
                            $tableau->execute();
                            $tab = $tableau->fetchAll();                       
                        ?>
                        <?php foreach($tab as $element){?>
                            <tr class="items">
                                <td><?php echo $element["num_table"]; ?></td>
                                <td><?php echo $element["desc_table"]; ?></td>
                                <td><?php echo $element["id_resto"]; ?></td>
                                <td><a href="sup_table.php?id_table=<?=$element["id_table"];?>"><i class="fa fa-window-close"></i></a></td>
                                <td><a href="modif_table.php?id_table=<?=$element["id_table"];?>"><i class="fa fa-pen"></i></a></td>
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
                                <h5 class="modal-title" id="exampleModalLabel">Nouveau Table</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post">
                                <div class="modal-body">
                                    <div class="container">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">numero da la table</label>
                                                <input type="text" name="numero" class="form-control" id="formGroupExampleInput">
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput2">Description</label>
                                                <textarea type="text" name="description" class="form-control" id="formGroupExampleInput2" ></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput2">numero du restaurant</label>
                                                <input type="numero" name="idResto" class="form-control" id="formGroupExampleInput2" >
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
            </section>
        </div>
    </div>
   
    <script>
        CKEDITOR.replace('formGroupExampleInput2');
    </script>
    <script src="JavaScript/search.js"></script>
    <script src="JavaScript/dash.js"></script>
    <script src="JavaScript/jquery3.js"></script>
    <script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script>  
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>


</body>
</html>