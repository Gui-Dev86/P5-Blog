<section class="container col-10 mb-5" id="login">
    <div class="container col-12">
        <div class="row">
            <div class="col-12 mt-3 mb-4 containerDashed text-center">
                <h4 class="font-weight-bold">
                    <span class="ion-minus"></span>CONNECTEZ-VOUS<span class="ion-minus"></span>
                </h4>
            </div>
        </div>
    </div>
    <div class="container col-12 col-md-10">
        <div class="row justify-content-center">
            <div class="container col-12 col-md-8 offset-md-2 pb-5">
                <form method="post" action="">
                    <div class="form-group">
                        <label class="font-weight-bold" for="login">Login</label>
                        <input type="password" name="login" class="form-control" id="login" placeholder="Saisissez votre login">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="password">Mot de passe</label>
                        <input type="password" name="password1" class="form-control" id="password" placeholder="Saisissez votre mot de passe">
                    </div>
                    <div class="btnCenterMobile">
                        <button type="submit" class="btn btn-primary font-weight-bold btnConnect mt-3">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="container col-12 col-md-8 offset-md-2 pb-3">
                <a class="linkConnect" href="<?= local ?>login/recupPassword">Mot de passe oublié? cliquez ici</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="container col-12 col-md-8 offset-md-2 pb-3">
                <a class="linkConnect" href="<?= local ?>login/registerView">Enregistrez-vous</h4>
            </div>
        </div>
    </div>
</section>