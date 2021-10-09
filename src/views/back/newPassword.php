<section class="container col-10 mb-5" id="newPassword">
    <div class="container col-12">
        <div class="row">
            <div class="col-12 mt-3 mb-4 containerDashed text-center">
                <h4 class="font-weight-bold">
                    <span class="ion-minus"></span>SAISISSEZ VOTRE NOUVEAU MOT DE PASSE<span class="ion-minus"></span>
                </h4>
            </div>
        </div>
    </div>
        <div class="container col-12 col-md-8 offset-md-2 pb-5">
            <form method="post" action="<?= local ?>login/userNewPassword">
                <div class="form-group">
                    <label class="font-weight-bold" for="newPassword_user">Nouveau mot de passe</label>
                    <input type="password" name="newPassword_user" class="form-control" id="newPassword_user" placeholder="Saisissez votre nouveau mot de passe">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="confirmNewPassword_user">Confirmez votre mot de passe</label>
                    <input type="password" name="confirmNewPassword_user" class="form-control" id="confirmNewPassword_user" placeholder="Confirmez votre mot de passe">
                </div>
                <div class="btnCenterMobile">
                    <button type="submit" name="formNewPassword" class="btn btn-primary font-weight-bold btn-validatePassword">Valider</button>
                </div>
            </form>
            <?php
            if(isset($_SESSION['valide']))
            {
                echo $_SESSION['valide'];
                unset($_SESSION["valide"]);
                unset($_SESSION["token"]);
            } 
            if(isset($_SESSION['error']))
            {
                echo $_SESSION['error'];
                unset($_SESSION["error"]);
            }
            ?>
        </div>
    </div>
</section>