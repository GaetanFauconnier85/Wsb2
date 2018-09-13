<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="CSS/ListeParticipants.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="CSS/menu.css">
        <meta charset="UTF-8">   <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
    </head>
    <body>
        
    <?php include 'menu.php';?>

<a href="activite.php"><button type="button" class="btn btn-success suc">Voir les activités auquelles je participe</button></a>

<div class="entoureTexte"><h1>Proposer une activité</h1> <hr>
<div class="form-group">
            <div class="input-group input-group-lg icon-addon addon-lg">
                <input type="text" placeholder="Activité proposée" id="schbox" class="form-control input-lg">
                <i class="icon icon-search"></i>
            </div>
            <div class="input-group input-group-lg icon-addon addon-lg">
                <input type="text" placeholder="Lieu" id="schbox" class="form-control input-lg">
                <i class="icon icon-search"></i>
            </div>
            <div class="input-group input-group-lg icon-addon addon-lg">
                <input type="date" placeholder="Date" id="schbox" class="form-control input-lg">
                <i class="icon icon-search"></i>
            </div>
            
            <button type="button" class="btn btn-success suc">Valider</button>

        </div>

</div> 

<?php

$bdd = new PDO('mysql:host=localhost;dbname=wsb2;charset=utf8', 'root', '');


$reponse = $bdd->query('SELECT * FROM activite');

?>


<div class="entoureTexte1"><h1>Activités déjà présente :</h1> <hr>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Activité</th>
      <th scope="col">Lieu</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  <?php
while ($donnees = $reponse->fetch()) {
    ?>
    <tr>
    
    <th scope="row"><?php echo $donnees['nomAct'];?> 
    <th scope="row"><?php echo $donnees['Lieu'];?>
    <th scope="row"><?php echo $donnees['Heure'];?>
     </tr> <?php
}
?>
 
            
          
    
    
  </tbody>
</table>
</div>


        
    </body>
</html>
