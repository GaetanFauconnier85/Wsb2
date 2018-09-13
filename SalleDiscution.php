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
        <link href="CSS/salleDiscution.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="CSS/menu.css">
        <title></title>
    </head> 
    <body>
        
    <?php include 'menu.php';
    $idClient = $_SESSION['id'];

    $reponse = $pdo->prepare('SELECT * FROM participeact where idClient = ?');
    $reponse->execute([$idClient]);

    $repo = $pdo->prepare('SELECT * FROM message m join activite a on a.idAct=m.idAct join client c on c.Id=m.idClient ');
    $repo->execute([$idClient]);
    

    
    
    ?>
    <?php 

$test = $reponse->fetch(); 
if(!empty($_POST)&& $test->idAct != $_SESSION['idAct']) {

$req = $pdo->prepare("INSERT INTO participeact SET idClient = ?, idAct = ?");
$req->execute([$idClient,$_SESSION['idAct']]);

}?>

        <h1>Salle de discution</h1>   <hr>     

        <div class="oui">
        <?php while($ty = $repo->fetch()){?>
            <div class="entoureTexte"><div><div class="nomUser"><b><button type="button" class="btn btn-default btn-circle btn-xl"></button><?php echo $ty->Nom; ?>:<br><?php echo $ty->HeureMess; ?></div></b> <?php echo $ty->message; ?> </div><br></div> 
         
            <?php } ?>
        </div>

    <hr>
    <form method="post" action="SalleDiscution">
    <div class="form-group">
            <div class="input-group input-group-lg icon-addon addon-lg">
                <input name="oui" type="text" placeholder="Ajouter commentaire" id="schbox" class="form-control input-lg">
                <i class="icon icon-search"></i>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-inverse btn-lg">Ajouter</button>
                </span>
            </div>
</div>
            </form>

<?php 

if(!empty($_POST['oui'])) {
$mess=$_POST['oui'];
$requ = $pdo->prepare("INSERT INTO message SET idClient = ? ,idAct=?,message=?");
$requ->execute([$idClient, $_SESSION['idAct'],$mess]);

}?>


<br>
    <a href="Acceuil.php"><button type="button" class="btn btn-danger">Retour à l'accueil</button></a>                        

    <form action="" method="post">
        <a href="activite.php"><input type="button" value = "Ajouter cette activité à mon panier" class="btn btn-success"></a>
    </form>



    </body>
</html>
