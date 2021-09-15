<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Blog - Guillaume Vignères</title>
        <link rel="stylesheet" href="<?= local ?>public/css/nav-footer.css" />
        <link rel="stylesheet" href="<?= local ?>public/css/index.css" />
        <link rel="stylesheet" href="<?= local ?>public/css/tabAdmin.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
    </head>
    
    <body>
        <header>
            <div class="container">

                <nav class="navbar navbar-expand-md col-12 ">
                    <a class="nav-link font-weight-bold logo-nom" href="<?= local ?>">Guillaume Vignères</a>
                    <button class="navbar-toggler align-center" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link font-weight-bold" href="<?= local ?>">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="<?= local ?>articles">Articles</a>
                            </li>


                        <!----- if session is defined--->


                            <li class="nav-item dropdown">
                                <a class="nav-link font-weight-bold dropdown-toggle" href="" role="button" data-toggle="dropdown" id="dropdownMenuLink" aria-expanded="false">Pseudo</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li class="li-item"><a class="dropdown-item font-weight-bold" href="<?= local ?>userCompte">Gérer votre compte</a></li>
                                    <li class="li-item"><a class="dropdown-item font-weight-bold" href="<?= local ?>adminManagement">Administration</a></li>
                                    <li class="li-item"><a class="dropdown-item font-weight-bold" href="#">Déconnexion</a></li>
                                </ul>
                            </li>

                            <!-----else--->

                            <li class="nav-item dropdown">
                                <a class="nav-link font-weight-bold dropdown-toggle" href="" role="button" data-toggle="dropdown" id="dropdownMenuLink" aria-expanded="false">Compte</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li class="li-item"><a class="dropdown-item font-weight-bold text-center" href="<?= local ?>login">Identifiez-vous</a></li>
                                    <li class="li-item"><a class="dropdown-item font-weight-bold" href="<?= local ?>">Pas encore membre?</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>

            </div>
            <div class="container cont-menu col-12"></div>
            <div class="jumbotron jumbotron-fluid change">
                <div class="container col-12">
                    <div class="fond"></div>
                </div>
            </div>
            <div class="container cont-separator col-12"></div>
        </header>   
        <main>
        
        <?= $content ?>

        </main>
        <footer>           
            <div class="container col-12">
                <div class="row">   
                    <div class="col-10 offset-1 col-md-8 offset-md-2 text-center">
                        <a href="#"><img src="<?= local ?>public/img/linked-in.png" class="logo-rs" alt="Logo Linked-in"></a>
                        <a href="#"><img src="<?= local ?>public/img/github.jpg" class="logo-rs" alt="Logo Github"></a>
                    </div>
                </div>
                <div class="row">   
                    <div class="col-10 offset-1 col-md-8 offset-md-2 text-center">
                            <p>Copyright © 2021 Guillaume Vignères - Projet n°5 - PHP/Symfony - <a class="link-footer" href="<?= local ?>mentionsLegales" target="_blank">Mentions Légales</a></p>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script> $(document).ready(function() {
            $(".dropdown-toggle").dropdown();
        }); </script>
    </body>
</html>