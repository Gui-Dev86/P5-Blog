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
            <form method="post" action="POST">
                <div class="form-group">
                    <label for="newLogin">Login</label>
                    <input type="texte" name="newLogin" class="form-control" id="newLogin" value="<?= $_SESSION['user']['login']; ?>">
                </div>
                <div class="form-group">
                    <label for="newFistname">Prénom</label>
                    <input type="texte" name="newFistname" class="form-control" id="newFistname" value="<?= $_SESSION['user']['firstname']; ?>">
                </div>
                <div class="form-group">
                    <label for="newLasname">Nom</label>
                    <input type="texte" name="newLasname" class="form-control" id="newLasname" value="<?= $_SESSION['user']['lastname']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email" name="email" class="form-control" id="email" value="<?= $_SESSION['user']['email']; ?>">
                </div>
                <div class="btnCenterMobile">
                    <button type="submit" class="btn btn-primary font-weight-bold btnModifInfos mt-3">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</section>