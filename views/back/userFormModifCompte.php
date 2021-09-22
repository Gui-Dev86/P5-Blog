<div class="container col-10">
    <div class="row">
        <div class="col-10 my-4">
            <a class="font-weight-bold retour-compteUser" href="<?= local ?>userCompte">< Retour à votre compte</a>
        </div>
    </div>
</div>
<section class="container col-10 mb-5" id="userModifCompte">
    <div class="container col-12">
        <div class="row">
            <div class="col-12 mb-4 containerDashed text-center">
                <h4 class="font-weight-bold">
                    <span class="ion-minus"></span>MODIFIER VOS INFORMATIONS PERSONNELLES<span class="ion-minus"></span>
                </h4>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="container col-12 col-md-8 offset-md-2 pb-5">
            <form method="post" action="">
                <div class="form-group">
                    <label for="passwrd">Login</label>
                    <input type="password" name="oldpassword" class="form-control" id="passwrd" placeholder="session.login">
                </div>
                <div class="form-group">
                    <label for="passwrd">Adresse email</label>
                    <input type="password" name="password1" class="form-control" id="passwrd" placeholder="session.email">
                </div>
                <div class="btnCenterMobile">
                    <button type="submit" class="btn btn-primary font-weight-bold btnModifInfos">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</section>