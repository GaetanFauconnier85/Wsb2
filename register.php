<?php
session_start();
require_once 'db.php';

if (!empty($_POST)){

    $errors = array();

    $password = $_POST['password'];
    $username = $_POST['username'];
    $longueurmin = strlen($password);
    $longueurmin2 = strlen($username);
    $longueurmax = strlen($password);
    $longueurmmax2 = strlen($username);

    if((empty($_POST['username'])) || (!preg_match('/^[a-z0-9_]+$/',$_POST['username']))){
        $errors['username'] = "Veuillez entrez un non d'utilisateur correcte (alphanumérique)";
    }elseif(($longueurmin2 < 6) || ($longueurmmax2 > 30)){
        $errors['username'] = "Vous devez entrez minimum 6 caractèes et maximum 30";
    }else{
        $req = $pdo->prepare('SELECT Id FROM client WHERE Identifiant = ?');
        $req->execute([$_POST['username']]);
        $user = $req->fetch();
        if ($user){
            $errors['username'] = 'Ce pseudo est déja pris';
        }
    }

    if((empty($_POST['password'])) || ($_POST['password'] != $_POST['password_confirm'])) {
        $errors['password'] = "Vous n'avez pas recopié votre mot de passe correctement";
    }elseif(($longueurmin < 6) || ($longueurmax > 30)){
        $errors['password'] = "Vous devez entrez minimum 6 caractèes et maximum 30";
    }

    if((empty($_POST['email'])) || (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))){
        $errors['email'] = "Veuillez entrez un email correcte du type example@example.com !";
    }else{
        $req = $pdo->prepare('SELECT id FROM client WHERE Email = ?');
        $req->execute([$_POST['email']]);
        $user = $req->fetch();
        if ($user){
            $errors['email'] = 'Cette email est déja utilisé par un autre compte';
        }
    }

    if(empty($errors)){

        $req = $pdo->prepare("INSERT INTO client SET Identifiant = ?, Email = ?, password = ?, Nom = ?, Prenom = ?, Promo = ?, ActPrefere = ?, status = ?, tel = ?, musiquePrefere = ?, Caractere = ? ");
        $options = [
            'cost' => 13,
        ];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT,$options);
        $req->execute([$_POST['username'], $_POST['email'], $password, $_POST['firstname'], $_POST['lastname'], $_POST['classroom'], $_POST['likesport'], $_POST['status'], $_POST['phone'], $_POST['music'], $_POST['Caractere']]);

        $errors['succes'] = 'Votre Compte à bien été crée';
    }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/register.css">
    </head>
    <body>
    <span>
        <?php if(!empty($errors['succes'])): ?>
        <div class="alert-danger-succes">
            <p><?= $errors['succes']; ?></p>
        </div>
        <?php endif; ?>
    </span>
    <div class="container-fluid">
        <div class="container">
            <h2 class="text-center" id="title">EPSI Student</h2>
            <p class="text-center">
                <small id="passwordHelpInline" class="text-muted"> Merci de bien vouloir remplir ce formulaire d'incription afin de pouvoir accèder au site web</a>.</small>
            </p>
            <hr>
            <div class="row">
                <div class="col-md-5">
                    <form role="form" method="post" action="">
                        <fieldset>

                            <div class="form-group">
                                <label for = "firstname">Votre prénom :</label>
                                <input type="text" name="firstname" id="firstname" class="form-control input-lg" placeholder="Bourget">
                            </div>

                            <div class="form-group">
                                <label for = "lastname">Votre nom :</label>
                                <input type="text" name="lastname" id="lastname" class="form-control input-lg" placeholder="Camille">
                            </div>

                            <div class="form-group">
                                <label for = "username">Votre identifiant :</label>
                                <input type="text" name="username" id="username" class="form-control input-lg" placeholder="kikou44">
                            </div>
                            <span>
                                <?php if(!empty($errors['username'])): ?>
                                    <div class="alert-danger-error">
                                        <p><?= $errors['username']; ?></p>
                                    </div>
                                <?php endif; ?>
                            </span>

                            <div class="form-group">
                                <label for = "password">Votre mot de passe :</label>
                                <input type="password" name="password" id="password" class="form-control input-lg" placeholder="p@ssw0rd">
                            </div>
                            <span>
                                <?php if(!empty($errors['password'])): ?>
                                    <div class="alert-danger-error">
                                        <p><?= $errors['password']; ?></p>
                                    </div>
                                <?php endif; ?>
                            </span>

                            <div class="form-group">
                                <label for = "password_confirm">Confirmer Votre mot de passe :</label>
                                <input type="password" name="password_confirm" id="password_confirm" class="form-control input-lg" placeholder="p@ssw0rd">
                            </div>

                            <div class="form-group">
                                <label for = "phone">Votre numéro de téléphone :</label>
                                <input type="tel" min = "10" max = "10" name="phone" id="phone" class="form-control input-lg" placeholder="0604419012">
                            </div>
                </div>

                <div class="col-md-2">

                </div>

                <div class="col-md-5">

                            <div class="form-group">
                                <label for = "email">Votre adresse email</label>
                                <input type="email" name="email" id="email" class="form-control input-lg" placeholder="exemple@exemple.fr">
                            </div>
                            <span>
                                <?php if(!empty($errors['email'])): ?>
                                    <div class="alert-danger-error">
                                        <p><?= $errors['email']; ?></p>
                                    </div>
                                <?php endif; ?>
                            </span>

                            <div class="form-group">
                                <label for = "classroom">Votre promo :</label>
                                <input type="text" name="classroom" id="classroom" class="form-control input-lg" placeholder="B2">
                            </div>

                            <div class="form-group">
                                <label for = "status">Votre status :</label>
                                <input type="text" name="status" id="status" class="form-control input-lg" placeholder="étudiant">
                            </div>

                            <div class="form-group">
                                <label for = "likesport">Les sports que vous aimer :</label>
                                <input type="text" name="likesport" id="likesport" class="form-control input-lg" placeholder="Course à pied">
                            </div>

                            <div class="form-group">
                                <label for = "music">Votre style de musique :</label>
                                <input type="text" name="music" id="music" class="form-control input-lg" placeholder="électro">
                            </div>

                            <div class="form-group">
                                <label for = "Caractere">votre Carractère :</label>
                                <input type="text" name="Caractere" id="Caractere" class="form-control input-lg" placeholder="positif">
                            </div>

                            <div>
                                <input type="submit" class="btn btn-secondary" value="Inscrivez-vous">
                                <a href="index.php"><p>Retour à la page de connexion</p></a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>