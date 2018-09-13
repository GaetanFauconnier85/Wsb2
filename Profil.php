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
        <link href="CSS/Profil.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body>

 <?php include 'menu.php';
 
 $idClient = $_SESSION['id'];

 $reponse = $pdo->prepare('SELECT * FROM client  where Id=:idClient');
        $reponse->execute(array(
            ":idClient" => $idClient

        ));
 
 ?>


<div class="p">

<?php while($donnees = $reponse->fetch()){ ?>

  <div class="entoureTexte1"><h1><?php echo $donnees->Nom; ?> <?php echo $donnees->Prenom; ?><a href="Profil.php"><button type="button" class="btn btn-danger">Supprimer</button></a><a href="Profil.php"><button type="button" class="btn btn-success">Ajouter</button></a> <hr></h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Activite prefere</th>
      <th scope="col">Caractere</th>
      <th scope="col">Age</th>
      <th scope="col">Ville</th>
    </tr>
  </thead>
  <tbody>
        <tr>
            <td>Foot</th>
            <td>Positif</th>
            <td>19 ans</td>
            <td>Nantes</td>
        </tr>
    
    
  </tbody>
</table>
</div>

<?php } ?>
</div>


<div class="t">description <br>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas semper turpis et magna lacinia, eu dapibus massa interdum. Aliquam convallis enim est, tincidunt molestie justo congue non. Quisque lectus felis, eleifend id justo ac, pharetra bibendum velit. Vivamus ac quam tristique, condimentum mauris feugiat, porttitor ipsum. Donec scelerisque massa lectus, sed dictum lectus dignissim id. Etiam finibus mi nec mi porttitor bibendum. Vivamus iaculis neque sed risus consectetur tristique. Pellentesque vitae ex ante. Mauris eleifend risus non leo tincidunt feugiat. Maecenas venenatis ante nec enim bibendum, nec imperdiet nunc molestie. Maecenas sagittis sem eu euismod hendrerit. Fusce lobortis ac mauris posuere venenatis.

Integer non lobortis sapien, et sagittis metus. Donec semper magna nec tempus dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus nibh magna, feugiat vestibulum dignissim a, tincidunt sed ex. Cras lobortis blandit vestibulum. Morbi in mauris mauris. Proin volutpat ex a nulla euismod pharetra. Sed quam leo, scelerisque sit amet feugiat at, vehicula at nulla. Cras quis orci eu nisl molestie maximus. Cras nec viverra leo. Nunc varius purus ut lacus aliquam ultrices. Vestibulum quis vestibulum lorem. Phasellus a consequat nibh.

Pellentesque volutpat in leo eu auctor. Maecenas sodales convallis diam a vulputate. Aenean non augue vestibulum, vulputate justo eu, laoreet arcu. In condimentum rutrum pretium. Praesent finibus et ex vel porttitor. Vestibulum metus nunc, dictum id sapien vitae, vestibulum porttitor purus. Duis tincidunt, turpis ut facilisis ultrices, nibh arcu ullamcorper justo, vitae dignissim ligula magna suscipit mi. Maecenas nisl erat, sodales in nisl quis, consequat porttitor odio. Quisque ultrices gravida justo. Etiam sit amet mi at leo scelerisque interdum ut id urna. Praesent lobortis finibus tellus eget tempus. Nam tempor malesuada suscipit. Vivamus nec nunc ultrices, finibus justo vitae, dignissim lorem.

Pellentesque non mi pellentesque, iaculis nisl nec, semper metus. Phasellus rhoncus ut elit vitae viverra. Phasellus posuere est id lacus feugiat luctus. Aenean consectetur pulvinar condimentum. Nunc in aliquet enim, eget aliquet massa. Maecenas vel luctus ligula. Donec ultrices imperdiet mi, sed ullamcorper augue tincidunt eu. Ut iaculis pulvinar enim eu porta. Nullam tristique erat id justo ornare, sit amet pulvinar magna porta. Nullam vitae dignissim risus. Vivamus laoreet eu purus ut eleifend. Vestibulum eget diam pharetra, tristique lectus nec, lacinia velit. Ut eget hendrerit urna.

In eu velit ornare, volutpat sapien vitae, ullamcorper velit. Fusce sit amet feugiat ante. Praesent dignissim ornare ipsum vitae cursus. Vivamus consequat in purus suscipit pellentesque. Nam consequat justo a lacus egestas lacinia. Aenean magna orci, commodo dapibus mi et, imperdiet suscipit leo. Morbi at consequat risus. Nulla sodales convallis neque, non gravida mi luctus ac. Integer ornare dui vel venenatis feugiat. In ut est gravida, tincidunt leo ac, pharetra risus. Maecenas vel ligula urna. Vivamus a nulla et purus venenatis bibendum. Suspendisse at neque bibendum, pellentesque nisi a, volutpat dolor. Nulla laoreet turpis nibh, et tincidunt tellus viverra sed.
</div>
<div class="t">Amis :<br><hr>


<?php for ($i = 1; $i < 20; $i++) { ?>
<div class="entoureTexte">Nom Prenom <a href="Profil.php"><button type="button" class="btn btn-success">Voir profil</button></a>                        
<br><hr></div> 
<?php } ?>
    
</div>

<div class="form-group">
            <div class="input-group input-group-lg icon-addon addon-lg">
                <input type="text" placeholder="Rechercher un utilisateur" id="schbox" class="form-control input-lg">
                <i class="icon icon-search"></i>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-inverse btn-lg">Chercher</button>
                </span>
            </div>
</div>


    </body>
</html>
