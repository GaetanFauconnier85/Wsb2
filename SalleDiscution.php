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
        
    <?php include 'menu.php';?>

        <h1>Salle de discution</h1>   <hr>     

        <div class="oui">

            <?php for ($i = 1; $i < 20; $i++) { ?>
            <div class="entoureTexte"><div><div class="nomUser"><b><button type="button" class="btn btn-default btn-circle btn-xl"></button> Nom Utlisateur   :<br>jj/mm/aaaa hh:minmin</div></b>  Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. Il n'a pas fait que survivre cinq siècles, mais s'est aussi adapté à la bureautique informatique, sans que son contenu n'en soit modifié. Il a été popularisé dans les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMake</div><br></div> 
            <?php } ?>
                
        </div>

    <hr>
    <a href="Acceuil.php"><button type="button" class="btn btn-danger">Retour à l'accueil</button></a>                        

    <a href="activite.php"><button type="button" class="btn btn-success">Ajouter cette activité à mon panier</button></a>
        
    </body>
</html>
