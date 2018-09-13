<?php

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/menu.css">
        <link rel="stylesheet" type="text/css" href="CSS/activite.css">
    </head>
    <body>
        <?php include 'menu.php';?>
<br>

<?php

$bdd = new PDO('mysql:host=localhost;dbname=wsb2;charset=utf8', 'root', '');

$IdSession = 1;

$reponse = $bdd->query('SELECT * FROM activite a join participeact pa on pa.idAct = a.idAct join client c on c.Id = pa.idClient where '.$IdSession.'=Id');

?>
        <div>
            <div class="wrapper">
                <aside class="aside aside-1">Mes activités en cours</aside>
                <aside class="aside aside-2">Ajouter des personnes</aside>
            </div>
            <div class="tout">
            
            <?php
while ($donnees = $reponse->fetch()) {
    ?>      
                <div class="wrapper2"> 
                    <aside class="aside aside-3">
                   
                        <aside class="aside aside-3.1">
                            <table>
                                <tr>
                   
                                    <td class="td-name">Proposé par <b><?php echo $donnees['nomProprio'];?> </b></td>
                                    <td class="td-activity">Activité : <b><?php echo $donnees['nomAct'];?> </b></td>
                                    <td class="td-map">Le lieu : <b><?php echo $donnees['Lieu'];?></b></td>
                                    <td class="td-date">La date : <b><?php echo $donnees['Heure'];?></b></td>
                                    <td class="td-time">Durée : <b><?php echo $donnees['Duree'];?></b></td>

                                </tr>
                            </table>
                        </aside>
                      
                    </aside>
                    <aside class="aside aside-4">
                        <tr>
                            <button>Ajouter</button>
                            <button>Supprimer</button>
                        </tr>
                    </aside>
                    
                </div>
                <?php
}
?>
        </div>


    </body>
</html>