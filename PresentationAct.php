<?php
session_start();
require_once 'db.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/menu.css">
        <link href="CSS/PresentationAct.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>

 <?php include 'menu.php';
 
 $idAct = $_POST['idAct'];
 $_SESSION['idAct'] = $idAct;
        
        $reponse = $pdo->prepare('SELECT * FROM activite  where idAct=:idAct');
        $reponse->execute(array(
            ":idAct" => $idAct

        ));

        $comment = $pdo->prepare('SELECT * FROM commentaire co join activite a on a.idAct=co.idAct join client c on c.Id=co.idClient where co.idAct=:idAct');
       $comment->execute(array(
         ":idAct" => $idAct
       ));
 ?>


    <div class="p">

      <?php while($donnees = $reponse->fetch()){ ?>

        <div class="entoureTexte1"><h1><?php echo $donnees->nomAct; ?></h1> <br>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Propriétaire</th>
            <th scope="col">Lieu</th>
            <th scope="col">Date</th>
            <th scope="col">Duree</th>
          </tr>
        </thead>
        <tbody>
                  <tr>
                  <th scope="row"><?php echo $donnees->nomProprio; ?></th>
                  <td><?php echo $donnees->Lieu; ?></td>
                  <td> <?php echo $donnees->Heure; ?> </td>
                  <td><?php echo $donnees->Duree; ?></td>
                </tr>
          
          
        </tbody>
      </table>
    </div>

</div>
<?php  ?>
<div class="h">
<form action="SalleDiscution.php" method="post">
<input type="hidden" name="test" value="<?php echo $donnees->idAct; ?>" >

<img  src="contact.png" alt="oui"><br>
<input type="submit" value="Contact">
  </form>
  
  <br><br>Contacter le propriétaire !
</div>

<div class="t"><h1>Description : </h1> <br>

                     <?php echo $donnees->Description; ?> 
                    
</div>
<?php } ?>
<div class="t"><h1>Commentaire :</h1> <br>

<?php 
while($com = $comment->fetch()){ 

 echo $com->Nom; echo $com->commentaire;echo $com->Heure; ?> <br> <?php

} ?>

</div>
    </body>
</html>
