<?php
session_start();
require_once 'db.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" type="text/css" href="css/recherche.css">
    </head>
    <body>
        <?php include 'menu.php';
        
        $act = $_POST['act'];
        $lieu = $_POST['lieu'];

        $IdSession = $_SESSION['id'];
        
        $reponse = $pdo->prepare('SELECT * FROM activite  where nomAct = :act AND Lieu = :lieu');
        $reponse->execute(array(
            ":act" => $act, ":lieu" => $lieu

        ))

        
        ?>

        <div class="flex-container">

            <div class="item one">
                <p>Les résultats :</p>

                <div class="container">
                    <?php 
                    while($donnees = $reponse->fetch()){ ?>
                       <hr> <?php echo $donnees->nomAct;?> proposé par <?php echo $donnees->nomProprio;?><form action="PresentationAct.php" method="post">
                         <input type='hidden' name="idAct" value=<?php echo $donnees->idAct ?>>  <button type="submit"  class="btn btn-success suc">Voir Profil</button><hr>
                    </form>
 <?php
                    } ?>
                </div>

            </div>
            <div class="item two">
                <div class="profile"></div>
                <div class="information">

                    <div class="description">
                        <h2>Propriétaire :</h2><br>
                        <h2>Activité :</h2><br>
                        <h2>Dates :</h2><br>
                        <h2>Heure :</h2><br>
                    </div>

                    <div class="map">

                    </div>

                </div>
            </div>

        </div>
    </body>
</html>