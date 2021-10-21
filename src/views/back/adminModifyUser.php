<div class="container col-10">
    <div class="row">
        <div class="col-10 my-4">
            <a class="font-weight-bold retour-listMember" href="<?= local ?>adminManagement/adminListAllMembers/1">< Page précédente</a>
        </div>
    </div>
</div>
<section class="container col-10" id="modifyUser">
    <div class="container col-12">
        <div class="row">
            <div class="col-12 col-10 mb-5 containerDashed text-center">
                <h4 class="font-weight-bold">
                    <span class="ion-minus"></span>MODIFIER LES INFORMATIONS<span class="ion-minus"></span>
                </h4>
            </div>
        </div>
    </div>
    <div class="container adminInfosUser py-3 mb-3 col-12">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 offset-md-2 pb-3">
                <h5>Login: <span class="font-italic font-weight-bold"><?= $user['user']['login_user']; ?></span></h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 offset-md-2 pb-3">
                <h5>Rôle: <span class="font-italic font-weight-bold"><?php if($user['user']['role_user'] == 1) { echo "Admin"; } else { echo "Member"; } ?></span></h5>
            </div>
        </div>
        <?php if($user['user']['id_user'] == 1) { ?>
            <div class="container col-12 col-md-10">
                <div class="row justify-content-center">
                    <div class="container col-12 col-md-8 offset-md-2 pb-3">
                        <h5 class="font-weight-bold text-center">Le compte principale ne peut pas être modifié.</h5>
                    </div>
                </div>
            </div>
            <?php } elseif($user['user']['id_user'] == $_SESSION['user']['idUser']) { ?>
            <div class="container col-12 col-md-10">
                <div class="row justify-content-center">
                    <div class="container col-12 col-md-8 offset-md-2 pb-3">
                        <h5 class="font-weight-bold text-center">Vous ne pouvez pas modifier votre propre rôle.</h5>
                    </div>
                </div>
            </div>
        <?php } else { ?>
        <?php if($user['user']['role_user'] == 1) { ?>
        <form method="post" action="<?= local ?>adminManagement/activeUser">
            <div class="form-group row justify-content-center pb-5 ">
                <button type="submit" name="adminDowngroundUser" class="btn btn-primary font-weight-bold btn-modifyUser">Passer en utilisateur</button>
            </div>
        </form>
        <?php } else { ?>
        
        <form method="post" action="<?= local ?>/adminManagement/activeAdmin">
            <div class="form-group row justify-content-center pb-5 ">
                <button type="submit" name="adminUpgradeUser" class="btn btn-primary font-weight-bold btn-modifyUserWarning">Passer en administrateur</button>
            </div>
        </form>
        <?php } } if(isset($message)) {
            echo $message;
        } ?>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 offset-md-2 pb-3">
                <h5>Etat du compte:
                    <span class="font-weight-bold font-italic"><?php if($user['user']['isActiveUser_user'] == 1 && $user['user']['isActiveAdmin_user'] == 1) { echo "Actif"; ?></span></h5>
            </div>
        </div>
        <form method="post" action="<?= local ?>/adminManagement/desactiveCompte">
            <div class="form-group row justify-content-center pb-5 ">
                <button type="submit" name="adminDesactiveCompte" class="btn btn-primary font-weight-bold btn-modifyUserWarning">Désactiver</button>
                <?php } elseif($user['user']['isActiveAdmin_user'] == 0) { echo "Inactif"; ?></span></h5>
            </div>
        </form>
        </div>
        <form method="post" action="<?= local ?>/adminManagement/activeCompte">
            <div class="form-group row justify-content-center pb-5 ">
                <button type="submit" name="adminActiveCompte" class="btn btn-primary font-weight-bold btn-modifyUser">Activer</button> 
                <?php } elseif($user['user']['isActiveUser_user'] == 0) { echo "Inactif"; ?></span></h5>
            </div>
        </form>
    </div>
    <div class="container col-12 col-md-10">
        <div class="row justify-content-center">
            <div class="container col-12 col-md-8 offset-md-2 pb-3">
                <h5 class="font-weight-bold text-center pt-3">Le compte a été désactivé par l'utilisateur.</h5>
            </div>
        </div>
    </div>
    <?php } ?>
</section>