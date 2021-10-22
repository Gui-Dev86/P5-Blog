<div class="jumbotron jumbotron-fluid homeBackground">
    <div class="container col-10">
        <h1 class="text-center font-weight-bold">BLOG D'UN<br />DEVELOPPEUR INFORMATIQUE</h1>
    </div>
</div>

<div class="container col-10 containerDashed px-3 pb-5">
    <div class="container col-12">
        <div class="row">
            <div class="col-12 col-md-6 font-weight-bold text-center">
                <p class= "text-center"><img class="card-img-top logoDevContenu" src="<?= local ?>public/img/logoContenu.png" alt="logo développeur"></p>
            </div>
            <div class="container col-12 col-md-6 pt-3">
                <div class="row">
                    <p class="font-weight-bold aPropos">A PROPOS</p>
                </div>
                <div class="row">
                    <h4 class="font-weight-bold text-center">Vignères Guillaume,</h4>
                </div>
                <div class="row">
                    <p class="font-weight-bold text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tincidunt semper augue, et tristique urna mattis eu. 
                Quisque nunc odio, mattis eget urna sit amet, rutrum porttitor urna. Curabitur vestibulum finibus leo, 
                sagittis maximus odio egestas quis. Praesent sagittis eros augue, sed blandit metus pharetra in. </p>
                </div>
                <div class="text-center">
                    <a href="<?= local ?>public/cv/cv_guillaume_vigneres.pdf" target="_blank" download><button type="submit" class="btn btn-primary font-weight-bold btnHome">Consulter mon CV</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container col-10">
    <div class="row">
        <div class="col-12 font-weight-bold text-center">
        <h4 class="font-weight-bold text-center contactTitre">CONTACTEZ MOI</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2 my-3 pt-2 pb-1 font-weight-bold">
            <form method="POST" action="<?= local ?>main/sendMail">
                <div class="form-group">
                    <label for="lastname">Nom</label>
                    <input type="text" name="lastname" class="form-control" id="formControlInput1" placeholder="Veuillez saisir votre nom">
                </div>
                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input type="text" name="firstname" class="form-control" placeholder="Veuillez saisir votre prénom">
                </div>
                <div class="form-group">
                    <label for="emailUser">Email</label>
                    <input type="text" name="emailUser" class="form-control" placeholder="Veuillez saisir votre email">
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" name="message" rows="8" placeholder="Entrez votre message"></textarea>
                </div>
                <div class="form-group row">
                    <div class="col-12 text-center">
                        <button type="submit" name="formSendMail" class="btn btn-primary font-weight-bold btnHome">Envoyer</button>
                    </div>
                </div>
            </form>
            <?php
                if(isset($_SESSION['valide']))
                {
                    echo $_SESSION['valide'];
                    unset($_SESSION["valide"]);
                } 
                if(isset($_SESSION['error']))
                {
                    echo $_SESSION['error'];
                    unset($_SESSION["error"]);
                }
            ?>
        </div>
    </div>
</div>