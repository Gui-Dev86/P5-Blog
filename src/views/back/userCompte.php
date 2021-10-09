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
    <div class="container col-12 col-md-10">
        <div class="row justify-content-center">
            <div class="container col-12 col-md-8 offset-md-2">
                <h5 class="pb-3">Informations du compte</h5>
                <table class="panel">
                    <tr class="trCompte">
                        <td>Pseudo :</td>
                        <td><?= $_SESSION['user']['login']; ?></td>
                    </tr>
                    <tr class="trCompte">
                        <td>Prénom :</td>
                        <td><?= ucfirst($_SESSION['user']['firstname']); ?></td>
                    </tr>
                    <tr class="trCompte">
                        <td>Nom :</td>
                        <td><?= ucfirst($_SESSION['user']['lastname']); ?></td>
                    </tr>
                    <tr class="trCompte">
                        <td>Adresse email :</td>
                        <td><?= $_SESSION['user']['email']; ?></td>
                    </tr>
                    <tr class="trCompte">
                        <td>Date de création du compte : </td>
                        <td><?php $dateCreate = $_SESSION['user']['dateRegister']; echo date('d-m-Y', strtotime($dateCreate));?></td>
                    </tr>
                    <tr class="trCompte">
                        <td>Dernière mise à jour du compte : </td>
                        <td><?php $dateUpdate = $_SESSION['user']['dateRegister']; echo date('d-m-Y', strtotime($dateUpdate));?></td>
                    </tr>
                    <tr class="trCompte">
                        <td>Rôle : </td>
                        <td><?= $_SESSION['user']['role']; ?></td>
                    </tr>
                </table>
                
            </div>
            <div class="container btnCenterMobile col-12 col-md-8 offset-md-2 pt-3 pb-5">
                <a class="btn btn-default btn-primary font-weight-bold btn-userInfos" href="<?= local ?>userCompte/userFormModifCompte">Modifier vos informations</a>
            </div>
        </div>
    </div>
    <div class="container col-12 col-md-10">
        <div class="row justify-content-center">
            <div class="container  col-12 col-md-8 offset-md-2 pb-5">
                <h5 class="pb-3">Commentaires</h5>
                <div class="btnCenterMobile">
                    <a class="btn btn-default btn-primary font-weight-bold btn-userInfos" href="<?= local ?>userCompte/userListComment">Afficher vos commentaires</a>
                </div>
            </div>  
        </div>
    </div>
    <div class="container col-12 col-md-10">
        <div class="row justify-content-center">
            <div class="container col-12 col-md-8 offset-md-2 pb-3">
                <h5>Changement de mot de passe</h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="container col-12 col-md-8 offset-md-2 pb-5">
                <form method="post" action="index.php?page=admin&method=changePassword">
                    <div class="form-group">
                        <label for="passwrd">Ancien mot de passe</label>
                        <input type="password" name="oldpassword" class="form-control" id="passwrd" placeholder="Saisissez votre ancien mot de passe">
                    </div>
                    <div class="form-group">
                        <label for="passwrd">Nouveau mot de passe</label>
                        <input type="password" name="password1" class="form-control" id="passwrd" placeholder="Saisissez votre nouveau mot de passe">
                    </div>
                    <div class="form-group">
                        <label for="passwrd">Confirmez le nouveau mot de passe</label>
                        <input type="password" name="password2" class="form-control" id="passwrd" placeholder="Confirmez votre nouveau mot de passe">
                    </div>
                    <div class="btnCenterMobile">
                        <button type="submit" class="btn btn-primary font-weight-bold btn-userInfos">Changer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container col-12 col-md-10">
        <div class="row justify-content-center">
            <div class="container col-12 col-md-8 offset-md-2 pb-3">
                <h5>Etat du compte:
                    
                <?php if($_SESSION["user"]["isActiveUser"] == 1 && $_SESSION["user"]["isActiveAdmin"] == 1 ) {  ?>
                        <span class="font-weight-bold font-italic">Actif</span></h5>
                    <?php } else { ?>
                    <span class="font-weight-bold font-italic mt-2">Inactif</span></h5>
                <?php } ?>

            </div>
        </div>
        <div class="row justify-content-center pb-5">

            <?php if($_SESSION["user"]["isActiveUser"] == 1 && $_SESSION["user"]["isActiveAdmin"] == 1 ) { ?>
                <button type="submit" class="btn btn-primary font-weight-bold btn-inactiveUserWarning ml-3">Désactiver</button>
                <?php } else { ?>
            <button type="submit" class="btn btn-primary ml-5 font-weight-bold btn-userInfos">Activer</button>
            <?php } ?>

        </div>
    </div>
</section>