<section class="container col-10 mb-5" id="login">
    <div class="container col-12">
        <div class="row">
            <div class="col-12 mt-3 mb-4 containerDashed text-center">
                <h4 class="font-weight-bold">
                    <span class="ion-minus"></span>SAISISSEZ LES INFORMATIONS<span class="ion-minus"></span>
                </h4>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="container col-12 col-md-8 offset-md-2 pb-5">
            <form method="POST" action="<?= local ?>login/registerUser">
                <div class="form-group">
                    <label class="font-weight-bold" for="firstname_user">Prénom</label>
                    <input type="texte" name="firstname_user" class="form-control" id="firstname_user" placeholder="Saisissez votre prénom">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="lastname_user">Nom</label>
                    <input type="texte" name="lastname_user" class="form-control" id="lastname_user" placeholder="Saisissez votre nom">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="login">Login</label>
                    <input type="texte" name="login_user" class="form-control" id="login_user" placeholder="Saisissez votre login">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="password_user">Mot de passe</label>
                    <input type="password" name="password_user" class="form-control" id="password_user" placeholder="Saisissez votre mot de passe">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="confirmPassword_user">Confirmer le mot de passe</label>
                    <input type="password" name="confirmPassword_user" class="form-control" id="confirmPassword_user" placeholder="Confirmez votre mot de passe">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="email_user">Email</label>
                    <input type="email" name="email_user" class="form-control" id="email_user" placeholder="Saisissez votre email">
                </div>
                <div class="btnCenterMobile">
                    <button type="submit" name="formRegistration" class="btn btn-primary font-weight-bold btnRegister">S'enregistrer</button>
                </div>
            </form>
            <?php
            if(isset($error))
            {
                echo $error;
            }
            ?>
        </div>
    </div>
</section>