
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Site</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!---- css------------>  
        
        <link href='http://fonts.googleapis.com/css?family=Crete+Round'rel="stylesheet">

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>


        <!------ Include the above in your HEAD tag ---------->

    </head>

    <body>

        <h1 class="page_title">Bienvenue sur la plateforme EPSI STUDENTS</h1>


        <form action="PageRecherche.php" method="post">

        <div class="entoureTexte"> <hr>
            <div class="form-group">
                <div class="input-group input-group-lg icon-addon addon-lg">
                    <input type="text" placeholder="Activite" name="act" id="schbox" class="form-control input-lg">
                    <i class="icon icon-search"></i>
                </div>
                <div class="input-group input-group-lg icon-addon addon-lg">
                    <input type="text" placeholder="Lieu" name="lieu" id="schbox" class="form-control input-lg">
                    <i class="icon icon-search"></i>
                </div>
                <br>

                <button type="submit"  class="btn btn-success suc">Valider</button>

            </div>

        </form>


            <div class="side_menu">
                <div class="burger_box">
                    <div class="menu-icon-container">
                        <a href="#" class="menu-icon js-menu_toggle closed">
                            <span class="menu-icon_box">
                                <span class="menu-icon_line menu-icon_line--1"></span>
                                <span class="menu-icon_line menu-icon_line--2"></span>
                                <span class="menu-icon_line menu-icon_line--3"></span>
                            </span>
                        </a>
                    </div>
                </div>


                <div class="container">
                    <h2 class="menu_title">Menu </h2>
                    <ul class="list_load">
                        <li class="list_item"><a href="activite.php">Mes activites</a></li> <hr>
                        <li class="list_item"><a href="Profil.php">Profil</a></li> <hr>
                        <li class="list_item"><a href="ProposeAct.php">Ajouter une activite</a></li> <hr>
                    </ul>

                </div>
            </div>
            </div> 
      
                <script>
                    $(document).ready(function () {
                        // Requires jQuery

                        $(document).on('click', '.js-menu_toggle.closed', function (e) {
                            e.preventDefault();
                            $('.list_load, .list_item').stop();
                            $(this).removeClass('closed').addClass('opened');

                            $('.side_menu').css({'left': '0px'});

                            var count = $('.list_item').length;
                            $('.list_load').slideDown((count * .6) * 100);
                            $('.list_item').each(function (i) {
                                var thisLI = $(this);
                                timeOut = 100 * i;
                                setTimeout(function () {
                                    thisLI.css({
                                        'margin-left': '0'
                                    });
                                }, 100 * i);
                            });
                        });

                        $(document).on('click', '.js-menu_toggle.opened', function (e) {
                            e.preventDefault();
                            $('.list_load, .list_item').stop();
                            $(this).removeClass('opened').addClass('closed');

                            $('.side_menu').css({'left': '-250px'});

                            var count = $('.list_item').length;
                            $('.list_item').css({
                                'margin-left': '-20px'
                            });
                            $('.list_load').slideUp(300);
                        });
                    });
                </script>





                </body>
                </html>