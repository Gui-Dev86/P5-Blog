<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Blog - Guillaume Vignères</title>
        <link rel="stylesheet" href="<?= local ?>public/css/base.css" />
        <link rel="stylesheet" href="<?= local ?>public/css/tabAdmin.css" />
        <link rel="stylesheet" href="<?= local ?>public/css/<?= $fichier ?>Style.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
    </head>
    
    <body>
        <header>
            <div class="container col-12">
                <nav class="navbar navbar-expand-md col-12 ">
                <a href="<?= local ?>"><img src="<?= local ?>public/img/logoMenu.png" class="logoDevNav" alt="Logo Guillaume Vignères"></a>
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
                                <a class="nav-link font-weight-bold" href="<?= local ?>articles/pageArticles/1">Articles</a>
                            </li>

                        <?php if(isset($_SESSION["user"])) {  ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link font-weight-bold dropdown-toggle" href="" role="button" data-toggle="dropdown" id="dropdownMenuLink" aria-expanded="false"> <?= ucfirst($_SESSION['user']['login']); ?> </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li class="li-item"><a class="dropdown-item font-weight-bold dropdown-nav" href="<?= local ?>userCompte">Gérer votre compte</a></li>
                                    
                                    <?php if($_SESSION["user"]["role"] == 1) {  ?>
                                        <li class="li-item"><a class="dropdown-item font-weight-bold dropdown-nav" href="<?= local ?>adminManagement">Administration</a></li>
                                        <?php } ?>

                                    <li class="li-item"><a class="dropdown-item font-weight-bold dropdown-nav" href="<?= local ?>login/logOutUser">Déconnexion</a></li>
                                </ul>
                            </li>

                            <?php } else { ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link font-weight-bold dropdown-toggle" href="" role="button" data-toggle="dropdown" id="dropdownMenuLink" aria-expanded="false">Compte</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li class="li-item text-center liLogin"><a class="dropdown-item font-weight-bold login-btn" href="<?= local ?>login">Identifiez-vous</a></li>
                                    <li class="li-item text-center no-member">Nouveau membre? <a class="link-connect" href="<?= local ?>login/registerView">Cliquez ici</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>

            </div>
        </header> 
        <main class="fondAdmin">
            <div class="container heightNav col-12"></div>
            <?= $content ?>
        </main>
        <footer>           
            <div class="container dashedFooter col-10">
                <div class="row mt-2 mt-md-3">   
                    <div class="col-10 offset-1 col-md-8 offset-md-2 text-center">
                        <a href="https://www.linkedin.com/feed/" target="_blank"><img src="<?= local ?>public/img/linked-in1.png" class="logo-rs" alt="Logo Linked-in"></a>
                        <a href="https://github.com/Gui-Dev86" target="_blank"><img src="<?= local ?>public/img/github1.png" class="logo-rs ml-4" alt="Logo Github"></a>
                    </div>
                </div>
                <div class="row">   
                    <div class="col-10 offset-1 col-md-8 offset-md-2 text-center">
                            <p  class="font-weight-bold">Copyright © 2021 Guillaume Vignères - Projet 5 - PHP/Symfony - 
                            
                            <?php if(isset($_SESSION["user"]) AND $_SESSION["user"]["role"] == 1) {  ?>
                                <a class="font-weight-bold link-footer" href="<?= local ?>adminManagement">Administration</a>
                            <?php echo "-"; } ?>
                            
                            <a class="font-weight-bold link-footer" href="<?= local ?>mentionsLegales" target="_blank">Mentions Légales</a></p>
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