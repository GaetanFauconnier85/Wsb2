<?php
session_start();
require_once 'db.php';
if (!empty($_POST)) {
    $errors = array();

    $req = $pdo->prepare("SELECT * FROM activite WHERE nomAct = ? ");
    $req->execute([$_POST['activity']]);
    $result = $req->fetch();

    if(empty($_POST['activity'])) {
        $errors['activity'] = "Veuiller remplir le champ activité !";
    }elseif(empty($_POST['lieux'])) {
        $errors['lieux'] = "Veuiller remplir le champ lieux !";
    }elseif(empty($_POST['date'])) {
        $errors['date'] = "Veuiller remplir le champ date !";
    }elseif(empty($_POST['duree'])) {
        $errors['duree'] = "Veuiller remplir le champ durée !";
    }elseif(empty($_POST['Description'])) {
        $errors['Description'] = "Veuiller remplir le champ Description !";
    }

    if(($_POST['activity'] == $result->nomAct) && ($_POST['lieux'] == $result->Lieu) && ($_POST['date'] == $result->Heure )) {
        $errors['already'] = "Cette activité est déja proposé !";
    }

    if(empty($errors)){
        $req = $pdo->prepare("INSERT INTO activite SET nomAct = ?, Heure = ?, Lieu = ?, nomProprio = ?, idProprio = ?, Duree = ?, Description = ? ");
        $req->execute([$_POST['activity'], $_POST['date'], $_POST['lieux'], $_SESSION['prenom'], $_SESSION['id'], $_POST['duree'], $_POST['Description']]);
    }
}
?>
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
    
    <form role="form" method="post" action="">
        <div class="entoureTexte"><h1>Proposer une activité</h1> <hr>
            <div class="form-group">
            <span>
                    <?php if(!empty($errors['activity'])): ?>
                        <div class="alert-danger-error">
                            <p><?= $errors['activity']; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($errors['lieux'])): ?>
                        <div class="alert-danger-error">
                            <p><?= $errors['lieux']; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($errors['date'])): ?>
                        <div class="alert-danger-error">
                            <p><?= $errors['date']; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($errors['duree'])): ?>
                        <div class="alert-danger-error">
                            <p><?= $errors['duree']; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($errors['Description'])): ?>
                        <div class="alert-danger-error">
                            <p><?= $errors['Description']; ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if(!empty($errors['already'])): ?>
                        <div class="alert-danger-error">
                            <p><?= $errors['already']; ?></p>
                        </div>
                    <?php endif; ?>
            </span>
                <div class="input-group input-group-lg icon-addon addon-lg">
                    <input type="text" placeholder="Activité proposée" name="activity" id="schbox" class="form-control input-lg">
                    <i class="icon icon-search"></i>
                </div>
                <div class="input-group input-group-lg icon-addon addon-lg">
                    <input type="text" placeholder="Lieu" name="lieux" id="schbox" class="form-control input-lg">
                    <i class="icon icon-search"></i>
                </div>
                <div class="input-group input-group-lg icon-addon addon-lg">
                    <input type="text" placeholder="Durée" name="duree" id="duree" class="form-control input-lg">
                    <i class="icon icon-search"></i>
                </div>
                <div class="input-group input-group-lg icon-addon addon-lg">
                    <textarea name="Description" placeholder="Description"></Textarea>
                    <i class="icon icon-search"></i>
                </div>
                <div class="input-group input-group-lg icon-addon addon-lg">
                    <input type="date" placeholder="Date" name="date" id="schbox" class="form-control input-lg">
                    <i class="icon icon-search"></i>
                </div>
            
                <input type="submit" value="Proposer l'activité" class="btn btn-success suc">

            </div>
        </div> 
    </form>

<?php

$reponse = $pdo->query('SELECT * FROM activite');

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
    
    <th scope="row"><?php echo $donnees->nomAct;?> 
    <th scope="row"><?php echo $donnees->Lieu;?>
    <th scope="row"><?php echo $donnees->Heure;?>
     </tr> <?php
}
?>
  
  </tbody>
</table>
</div>


        
    </body>
</html>
