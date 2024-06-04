<?php
require('base.php');

$sql = "SELECT*FROM inscrit";
$exec = mysqli_query($connexion, $sql);

$sql1 = "SELECT*FROM reinscrit";
$exec1 = mysqli_query($connexion, $sql1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frais de scolarité Emit</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="./fonts/css/all.min.css">
    <link rel="stylesheet" href="./fonts/css/fontawesome.min.css">
    

    <script type="text/javascript" src="./STYLE/JQuery.js"></script>
    
</head>
<body>
    <div class="contenu">
        <div class="sidebar">
            <div class="tete">
                <input type="image" src="images.png" class="img">
            </div>
            <div class="menu">
                <ul>
                    <li id="menu1">
                        <div class="a">
                            <span class="icon"><i class="fa fa-th-large"></i></span>
                            <span class="titre">Tableau de bord</span>
                        </div>
                        
                     
                    </li>
                    <li id="menu2">
                        <div class="a">
                            <span class="icon"><i class="fa fa-user-plus"></i></span>
                            <span class="titre">Inscription</span>
                        </div>
                        
                        
                    </li>
                    <li id="menu3">
                        <div class="a">
                            <span class="icon"><i class="fa fa-user-plus"></i></span>
                            <span class="titre">Réinscription</span>
                        </div>
                       
                        
                    </li>
                    <li id="menu4">
                        <div class="a">
                            <span class="icon"><i class="fa fa-list"></i></span>
                            <span class="titre">Liste Inscription</span>
                        </div>
                        
                      
                    </li>
                    <li id="menu5">
                        <div class="a">
                            <span class="icon"><i class="fa fa-list"></i></span>
                            <span class="titre">Liste Réinscription</span>
                        </div>
                        
                      
                    </li>
                    <li id="menu7">
                        <a href="login.php" class="a">
                            <span class="icon"><i class="fa fa-share-square"></i></span>
                            <span class="titre">Déconnexion</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="theme-toggler">
                    <span class="active"><i class="fa fa-sun"></i></span>
                    <span><i class="fa fa-moon"></i></span>
                </div>
            </div>
            <section id="box_section">
                <div class="box">
                    <div class="card">
                        <div>
                        <?php
// Connexion à la base de données
$conn = mysqli_connect("localhost", "root", "", "javascrit");

// Vérifier la connexion
if (!$conn) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Requête SQL pour compter le nombre d'enregistrements dans les tables "etudiants1" et "etudiants2"
$sql2 = "(SELECT COUNT(*) AS total FROM inscrit) UNION (SELECT COUNT(*) AS total FROM reinscrit)";

// Exécution de la requête SQL
$resultat = mysqli_query($conn, $sql2);

// Vérifier si la requête a renvoyé des résultats
if (mysqli_num_rows($resultat) > 0) {
    // Tableau pour stocker les nombres totaux d'étudiants inscrits dans chaque table
    $totaux_etudiants = array();

    // Boucle à travers les résultats et stockage des nombres totaux d'étudiants inscrits dans le tableau
    while ($row = mysqli_fetch_assoc($resultat)) {
        $totaux_etudiants[] = $row["total"];
    }

    // Calculer la somme des nombres totaux d'étudiants inscrits dans les deux tables
    $somme = array_sum($totaux_etudiants);

    // Afficher la somme
   // echo "Le nombre total d'étudiants inscrits dans les tables est : " . $somme;
} else {
    echo "Aucun résultat trouvé.";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
                            <div class="numbers"><?= $somme ?></div>
                            <div class="cardName">Nombres des étudiants</div>
                        </div>
                        <div class="iconBx">
                            <i class="fa fa-user-graduate"></i>
                        </div>
                    </div>
                    
                    
                    <div class="card">
                        <div>
                        <?php
// Connexion à la base de données
$connex = mysqli_connect("localhost", "root", "", "javascrit");

// Vérifier la connexion
if (!$connex) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Requête SQL pour compter le nombre d'enregistrements dans les tables "etudiants1" et "etudiants2"
$sql3 = "(SELECT COUNT(*) AS totale FROM inscrit) UNION (SELECT COUNT(*) AS totale FROM reinscrit WHERE mode2='Totalement')";

// Exécution de la requête SQL
$result = mysqli_query($connex, $sql3);

// Vérifier si la requête a renvoyé des résultats
if (mysqli_num_rows($result) > 0) {
    // Tableau pour stocker les nombres totaux d'étudiants inscrits dans chaque table
    $totaux_etudiant = array();

    // Boucle à travers les résultats et stockage des nombres totaux d'étudiants inscrits dans le tableau
    while ($row = mysqli_fetch_assoc($result)) {
        $totaux_etudiant[] = $row["totale"];
    }

    // Calculer la somme des nombres totaux d'étudiants inscrits dans les deux tables
    $sommeC = array_sum($totaux_etudiant);

    // Afficher la somme
   // echo "Le nombre total d'étudiants inscrits dans les tables est : " . $somme;
} else {
    echo "Aucun résultat trouvé.";
}

// Fermer la connexion à la base de données
mysqli_close($connex);
?>
                            <div class="numbers"><?= $sommeC ?></div>
                            <div class="cardName">Paiements Complets</div>
                        </div>
                        <div class="iconBx">
                            <i class="fa fa-chart-line"></i>
                        </div>
                    </div>
                   
    
                    <div class="card">
                        <div>
                        <?php
// Connexion à la base de données
$conn1 = mysqli_connect("localhost", "root", "", "javascrit");

// Vérifier la connexion
if (!$conn1) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Requête SQL pour compter le nombre d'enregistrements dans la table "etudiants"
$sql4 = "SELECT COUNT(*) AS total FROM reinscrit WHERE mode2='Partiellement'";

// Exécution de la requête SQL
$resultat = mysqli_query($conn1, $sql4);

// Vérifier si la requête a renvoyé des résultats
if (mysqli_num_rows($resultat) > 0) {
    // Récupérer le nombre total d'étudiants inscrits
    $row = mysqli_fetch_assoc($resultat);
    $total_etudiants = $row["total"];

    // Afficher le nombre total d'étudiants inscrits
   // echo "Il y a " . $total_etudiants . " étudiants inscrits dans la table.";
} else {
    echo "Aucun résultat trouvé.";
}

// Fermer la connexion à la base de données
mysqli_close($conn1);
?>
                            <div class="numbers"><?= $total_etudiants ?></div>
                            <div class="cardName">Paiements Incomplets</div>
                        </div>
                        <div class="iconBx">
                            <i class="fa fa-chart-line"></i>
                        </div>
                    </div>
                  
    
                    <div class="card">
                        <div>
                        <?php
// Établir une connexion à la base de données
$mysqli = mysqli_connect("localhost", "root", "", "javascrit");

// Vérifier la connexion
if (mysqli_connect_errno()) {
    echo "Échec de la connexion à MySQL: " . mysqli_connect_error();
    exit();
}

// Exécuter la requête SQL pour récupérer les montants des deux tables et calculer leur somme
$resultat = mysqli_query($mysqli, "SELECT SUM(mtvers1) as somme FROM inscrit UNION SELECT SUM(mtvers2) FROM reinscrit");

// Récupérer les résultats sous forme de tableau associatif
$row = mysqli_fetch_assoc($resultat);

// Ajouter les montants ensemble
$sommes = $row["somme"];

// Afficher la somme
//echo "La somme des montants dans les deux tables est de: " . $somme;

// Fermer la connexion à la base de données
mysqli_close($mysqli);
?>

                            <div class="numbers"><?= $sommes ?>Ar</div>
                            <div class="cardName">Solde</div>
                        </div>
                        <div class="iconBx">
                            <i class="fa fa-coins"></i>
                        </div>
                    </div>
                   
                </div>
            </section>
            <section id="inscrit_section" class="hidden">
                <div class="formulaire">
                    <div class="header">
                        <h2>Ajouter un étudiant</h2>
                    </div>
                    
                    <form action="ajoutEtu.php" name="formu" method="GET" class="form">
                        <div class="Part1">
                            <div class="form-control">
                                <label>Nom: </label>
                                <input type="text" name="nom1" id="Nom" onkeyup="majuscule()" class="nom1">
                                
                            </div>
                
                            <div class="form-control">
                                <label>Prénom:</label>
                                <input type="text" name="prenom1" id="Prenom">
                            </div>
                           <div class="form-control">
                                <label>Date de naissance:</label>
                                <input type="date" name="dte_naiss1" id="datenaiss">
                                
                           </div>
                           <div class="form-control">
                            <label>Mention:</label>
                            <select name="mention1" id="Mention">
                                <option value="AES">AES</option>
                                <option value="DA2I">DA2I</option>
                                <option value="RPM">RPM</option>
                            </select>
                            
                           </div>
                        </div>
                        <div class="Part2">
                            <div class="form-control">
                                <label for="">Niveau:</label>
                                <select name="niveau1" id="niveau">
                                    <option value="L1">L1</option>
                                </select>
                                
                            </div>
                           <div class="form-control">
                                <label>Date de versement</label>
                                <input type="date" name="dtvers1" id="dtvers">
                                <span id="datevers_vide"> </span>
                           </div>
                           <div class="form-control">
                            <label>Montant versé</label>
                            <input type="number" name="mtvers1" id="mtvers1">
                            <span id="montantvers_vide"></span>
                           </div>
                        </div>
                        
                        <input type="submit" value="Enregistrer" name="enreg" class="button" id="button">
                        <i class="fa fa-user-plus"></i>
                    </form>
                </div>
            </section>
            <section id="reinscrit_section" class="hidden">
                <div class="formulaire2">
                    <div class="header">
                        <h2>Ajouter un étudiant</h2>
                    </div>
                    
                    <form name="formu" method="GET" class="form" action="ajoutEtu2.php">
                        <div class="Part1">
                            <div class="form-control">
                                <label>Numero Matricule : </label>
                                <input type="number" name="Matricule" id="Maricule" onkeyup="majuscule()" required="required">
                                <span id="Nom_vide"></span>
                            </div>
                            <div class="form-control">
                                <label>Nom: </label>
                                <input type="text" name="nom2" id="Nom" onkeyup="majuscule()" required="required">
                                <span id="Nom_vide"></span>
                            </div>
                            <div class="form-control">
                                <label>Prénom:</label>
                                <input type="text" name="prenom2" id="Prenom" required="required">
                            </div>
                           <div class="form-control">
                                <label>Date de naissance:</label>
                                <input type="date" name="dt_naiss2" id="datenaiss" required="required">
                                <span id="datenaiss_vide"></span>
                           </div>
                           <div class="form-control">
                            <label>Mention:</label>
                            <select name="mention2" id="Mention" required="required">
                                <option value="AES">AES</option>
                                <option value="DA2I">DA2I</option>
                                <option value="RPM">RPM</option>
                            </select>
                            <span id="Mention_vide"></span>
                           </div>
                        </div>
                        <div class="Part2">
                            <div class="form-control">
                                <label for="">Niveau:</label>
                                <select name="niveau2" id="niveau" required="required">
                                    <option value="L2">L2</option>
                                    <option value="L3">L3</option>
                                    <option value="M1">M1</option>
                                    <option value="M2">M2</option>
                                </select>
                                <span id="Niveau_vide"></span>
                            </div>
                            <div class="form-control">
                                <label>Mode de payement</label>
                                <select name="mode2" id="mode">
                                    <option value="Totalement">Totalement</option>
                                    <option value="Partiellement">Partiellement</option>
                                </select>
                                <span id="datevers_vide"></span>
                            </div>
                           <div class="form-control">
                                <label>Date de versement</label>
                                <input type="date" name="dtvers2" id="dtvers">
                                <span id="lieuvers_vide"> </span>
                           </div>
                           <div class="form-control">
                            <label>Montant versé</label>
                            <input type="number" name="mtvers2" id="montantvers">
                            <span id="montantvers_vide"></span>
                           </div>
                        </div>
                        
                        <input type="submit" value="Enregistrer" name="enreg2" class="button2" id="button">
                        <i class="fa fa-user-plus"></i>
                    </form>
                </div>
            </section>
            <section id="list_inscrit" class="hidden">
                <div class="search">

                    <input type="text" id="recherche" placeholder="rechercher">
                    
                </div>

                
        
        <div class="col-md-12">
                <div class="liste1">
                    <h2>Liste des étudiants en L1</h2>
                    <table id="defaut" class="table table-stiped">
                    <div id="affichage"></div>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Date naissance</th>
                            <th>Mention</th>
                            <th>Niveau</th>
                            <th>Date versement</th>
                            <th>Montant</th>
                            <th>Action</th>                
                        </tr>
                    </thead>
                        <?php while ($inscrit = mysqli_fetch_assoc($exec)) { ?>
                            <tbody>
                            <tr>
                                <td> <?= $inscrit["nom1"] ?> </td>
                                <td> <?= $inscrit["prenom1"] ?> </td>
                                <td> <?= $inscrit["dte_naiss1"] ?></td>
                                <td> <?= $inscrit["mention1"] ?></td>
                                <td> <?= $inscrit["niveau1"] ?></td>
                                <td> <?= $inscrit["dtvers1"] ?></td>
                                <td> <?= $inscrit["mtvers1"] ?></td>
                                <td>
                                    <a href="updateEtu.php?id=<?php echo $inscrit["id1"] ?>" ><i class="fa fa-pen"></i></a>
                                    <a href="deleteEtu.php?id=<?php echo $inscrit["id1"] ?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                            <?php } ?>
                      
                    </table>
                    </div>
                </div>
                
            </section>
            <section id="list_reinscrit" class="hidden">
                <div class="search" >
                    <input type="text" id="recherche" placeholder="rechercher">
                </div>
                <div class="liste2">
                    <h2>Liste des étudiants de L2 à M2</h2>
                    <table id="defaut" class="table table-stiped">
                    <div id="affichage"></div>
                        <tr>
                            <th>Numero Matricule</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Date naissance</th>
                            <th>Mention</th>
                            <th>Niveau</th>
                            <th>Mode de paiement</th>
                            <th>Date de versement</th>
                            <th>Montant</th>
                            <th>Action</th>
                        </tr>
                        <?php while ($reinscrit = mysqli_fetch_assoc($exec1)) { ?>
                            <tr>
                                <td> <?= $reinscrit["Matricule"] ?> </td>
                                <td> <?= $reinscrit["nom2"] ?> </td>
                                <td> <?= $reinscrit["prenom2"] ?> </td>
                                <td> <?= $reinscrit["dt_naiss2"] ?></td>
                                <td> <?= $reinscrit["mention2"] ?></td>
                                <td> <?= $reinscrit["niveau2"] ?></td>
                                <td> <?= $reinscrit["mode2"] ?></td>
                                <td> <?= $reinscrit["dtvers2"] ?></td>
                                <td> <?= $reinscrit["mtvers2"] ?></td>
                                <td>
                                    <div class="icon2">
                                        <a href="updateEtu2.php?id=<?php echo $reinscrit["Matricule"] ?>" ><i class="fa fa-pen"></i></a>
                                        <a href="deleteEtu2.php?id=<?php echo $reinscrit["Matricule"] ?>"><i class="fa fa-trash"></i></a>
                                    </div>
                                    
                                </td>
                            </tr>
                            <?php } ?>
                    </table>
                </div>
            </section>
           
        </div>
    </div>
    <script src="menu.js"></script>
    <script type="text/javascript" src="anim.js"> </script>
    
    
</body>
</html>