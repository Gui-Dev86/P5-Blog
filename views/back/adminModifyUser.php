<div class="container col-10">
    <div class="row">
        <div class="col-10 my-4">
            <a class="font-weight-bold retour-listMember" href="<?= local ?>adminManagement/adminListAllMembers">Page précédente</a>
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
    <div class="container adminInfosUser py-5 col-12">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 offset-md-2 pb-3">
                <h4>Rôle: <span class="font-italic">(user.role)</span></h4>
            </div>
        </div>
        <div class="row justify-content-center pb-5">
            <!---If compte==0--->
            <button type="submit" class="btn btn-primary btn-modifyUser">Passer en utilisateur</button>
            <!---else--->
    <!---    <button type="submit" class="btn btn-primary btn-modifyUserWarning">Passer en administrateur</button> --->
            <!---endif--->   
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 offset-md-2 pb-3">
                <h4>Etat du compte:
                    <!---If compte==1--->
                        <span class="font-weight-bold font-italic">Actif</span></h4>
                     <!---else--->
        <!---       <span> class="font-weight-bold font-italic mt-2">Inactif</span>--->
            </div>
        </div>
        <div class="row justify-content-center">
            <!---If compte==1--->
            <button type="submit" class="btn btn-primary btn-modifyUserWarning">Désactiver</button>
            <!---else--->
<!---       <button type="submit" class="btn btn-primary btn-modifyUser">Activer</button>--->
            <!---endif--->   
        </div>
    </div>
</section>