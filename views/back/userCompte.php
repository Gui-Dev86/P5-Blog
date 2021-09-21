<section class="container col-10 mb-5" id="compteUser">
    <div class="container col-12">
        <div class="row">
            <div class="col-12 mt-3 mb-4 containerDashed text-center">
                <h4 class="font-weight-bold">
                    <span class="ion-minus"></span>COMPTE<span class="ion-minus"></span>
                </h4>
            </div>
        </div>
    </div>
    <div class="container col-10">
        <div class="row justify-content-center">
            <div class="container col-12 col-md-8 offset-md-2">
                <h4 class="pb-3">Informations du compte</h4>
                <table class="panel">
                    <tr>
                        <td>Pseudo :</td>
                        <td>session.pseudo</td>
                    </tr>
                    <tr>
                        <td>Adresse email :</td>
                        <td>session.email</td>
                    </tr>
                    <tr>
                        <td>Date de création du compte : </td>
                        <td>date('d/m/Y \\à H:i:s')</td>
                    </tr>
                    <tr>
                        <td>Rôle : </td>
                        <td>session.role</td>
                    </tr>
                </table>
                
            </div>
            <div class="container col-12 col-md-8 offset-md-2 pt-3 pb-5">
                <a class="btn btn-default btn-primary font-weight-bold btn-userInfos" href="<?= local ?>userCompte/userFormModifCompte">Modifier vos informations</a>
            </div>
        </div>
    </div>
    <div class="container col-10">
        <div class="row justify-content-center">
            <div class="container col-12 col-md-8 offset-md-2 pb-5">
                <h4 class="pb-3">Commentaires</h4>
                <a class="btn btn-default btn-primary font-weight-bold btn-userInfos" href="<?= local ?>userCompte/userListComment">Afficher vos commentaires</a>
            </div>  
        </div>
    </div>
    <div class="container col-10">
        <div class="row justify-content-center">
            <div class="container col-12 col-md-8 offset-md-2 pb-3">
                <h4>Changement de mot de passe</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="container col-12 col-md-8 offset-md-2 pb-5">
                <form method="post" action="index.php?page=admin&method=changePassword">
                    <div class="form-group">
                        <label for="passwrd">Ancien mot de passe</label>
                        <input type="password" name="oldpassword" class="form-control" id="passwrd" placeholder="Ancien mot de passe">
                    </div>
                    <div class="form-group">
                        <label for="passwrd">Nouveau mot de passe</label>
                        <input type="password" name="password1" class="form-control" id="passwrd" placeholder="Nouveau mot de passe">
                    </div>
                    <div class="form-group">
                        <label for="passwrd">Confirmez le nouveau mot de passe</label>
                        <input type="password" name="password2" class="form-control" id="passwrd" placeholder="Vérification nouveau mot de passe">
                    </div>
                    <button type="submit" class="btn btn-primary font-weight-bold btn-userInfos">Changer</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container col-10">
        <div class="row justify-content-center">
            <div class="container col-12 col-md-8 offset-md-2 pb-3">
                <h4>Etat du compte</h4>
            </div>
        </div>
        <div class="row justify-content-center pb-5">
            <!---If compte==1--->
            <p class="font-weight-bold font-italic mt-2">Actif</p>
            <button type="submit" class="btn btn-primary font-weight-bold btn-inactiveUserWarning ml-5">Désactiver</button>
            <!---else--->
    <!---        <p class="font-weight-bold font-italic mt-2">Inactif</p>
            <button type="submit" class="btn btn-primary ml-5 font-weight-bold btn-userInfos">Activer</button>--->
            <!---endif--->   
        </div>
    </div>
</section>