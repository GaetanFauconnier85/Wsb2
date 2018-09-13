<?php
session_start();

require_once 'db.php';

if (!empty($_POST)){

    $errors = array();

    $password = $_POST['password'];
    $longueurmin = strlen($password);
    $longueurmax = strlen($password);

    $req = $pdo->prepare('SELECT * FROM client WHERE Email = ?');
    $req->execute([$_POST['email']]);
    $succeful = $req->fetch();

    if((empty($_POST['email'])) || (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))){
        $errors['email'] = "Veuillez entrez un email correcte du type example@example.com !";
    }

    if((empty($_POST['password']))) {
        $errors['password'] = "Le champ mot de passe est vide !";
    }elseif(($longueurmin < 6) || ($longueurmax > 30)){
        $errors['password'] = "Vous devez entrez minimum 6 caractèes et maximum 30";
    }elseif($_POST['password'] <> password_verify($password, $succeful->password)) {
        $errors['password'] = "Le mot de passe entré est inccorecte !";
    }

    if(empty($errors)){

        if(password_verify($password, $succeful->password)) {
            $_SESSION['id'] = $succeful->Id;
            $_SESSION['nom'] = $succeful->Nom;
            $_SESSION['prenom'] = $succeful->Prenom;
            $_SESSION['nom'] = $succeful->Nom;
            $_SESSION['promo'] = $succeful->Promo;
            $_SESSION['identifiant'] = $succeful->Identifiant;
            $_SESSION['email'] = $succeful->Email;
            $_SESSION['activiteprefere'] = $succeful->ActPrefere;
            $_SESSION['status'] = $succeful->status;
            $_SESSION['tel'] = $succeful->tel;
            $_SESSION['musiqueprefere'] = $succeful->musiquePrefere;
            $_SESSION['platprefere'] = $succeful->platPrefere;
            header('Location: Acceuil.php');
        }
    }
}

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
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div id="first">
                    <div class="myform form ">
                        <div class="logo mb-3">
                            <div class="col-md-12 text-center">
                                <h1>Se connecter</h1>
                                <p>Bienvenu chez Epsi student !</p>
                            </div>
                        </div>
                        <form action="" method="POST" autocomplete="off">
                            <div class="form-group">
                                <label for="email">Adresse email</label>
                                <input type="text" name="email"  class="form-control" id="email" placeholder="exemple@exemple.fr">
                            </div>
                            <span>
                                <?php if(!empty($errors['email'])): ?>
                                    <div class="alert-danger-error">
                                        <p><?= $errors['email']; ?></p>
                                    </div>
                                <?php endif; ?>
                            </span>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="p@ssw0rd">
                            </div>
                            <span>
                                <?php if(!empty($errors['password'])): ?>
                                    <div class="alert-danger-error">
                                        <p><?= $errors['password']; ?></p>
                                    </div>
                                <?php endif; ?>
                            </span>
                            <div class="form-group">
                                <hr>
                            </div>
                            <div class="col-md-12 text-center ">
                                <button type="submit" class=" btn btn-block mybtn btn-secondary tx-tfm">Se connecter</button>
                            </div>
                            <div class="col-md-12 ">
                                <div class="login-or">
                                    <hr class="hr-or">
                                    <span class="span-or">ou</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <p class="text-center">Vous n'avez pas de compte? <a href="register.php" id="signup">Inscrivez-vous ici !</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>