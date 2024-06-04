
<?php
    include_once("connexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="fonts/css/all.min.css">
    <link rel="stylesheet" href="fonts/css/fontawesome.min.css">
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container" id="table">
        <div class="row">
    <div class="ro-title">
        <h2>listes des commandes</h2>
    </div> 
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">numero</th>
                                <th scope="col">description</th>
                                <th scope="col">numero de l'hotel</th>
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
                                    <td><?php echo $element["Lieu"]; ?></td>
                                    <td><?php echo $element["id_client"]; ?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
        </div>
    </div>


    <script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script>  
    <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>


</body>
</html>