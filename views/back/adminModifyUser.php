<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 offset-md-2 pb-3">
            <h4>Modifiez les informations</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 offset-md-2 pb-3">
            <h4>Rôle: user.role</h4>
        </div>
    </div>
    <div class="row justify-content-center pb-5">
        <!---If compte==0--->
        <button type="submit" class="btn btn-primary ml-5">Passer en utilisateur</button>
        <!---else--->
        <button type="submit" class="btn btn-primary ml-5">Passer en administrateur</button>
        <!---endif--->   
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 offset-md-2 pb-3">
            <h4>Etat du compte</h4>
        </div>
    </div>
    <div class="row justify-content-center pb-5">
        <!---If compte==1--->
        <p class="font-weight-bold font-italic mt-2">Actif</p>
        <button type="submit" class="btn btn-primary ml-5">Désactiver</button>
        <!---else--->
        <p class="font-weight-bold font-italic mt-2">Inactif</p>
        <button type="submit" class="btn btn-primary ml-5">Activer</button>
        <!---endif--->   
    </div>
</div>