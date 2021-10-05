<section class="container col-10 mb-5" id="recupPassword">
    <div class="container col-12">
        <div class="row">
            <div class="col-12 mt-3 mb-4 containerDashed text-center">
                <h4 class="font-weight-bold">
                    <span class="ion-minus"></span>SAISISSEZ VOTRE EMAIL<span class="ion-minus"></span>
                </h4>
            </div>
        </div>
    </div>
        <div class="container col-12 col-md-8 offset-md-2 pb-5">
            <form method="post" action="<?= local ?>login/recoverPassword">
                <div class="form-group">
                    <label class="font-weight-bold" for="email_user">Email</label>
                    <input type="email" name="email_user" class="form-control" id="email_user" placeholder="Saisissez votre email">
                </div>
                <div class="btnCenterMobile">
                    <button type="submit" name="formRecoverPassword" class="btn btn-primary font-weight-bold btn-validateEmail">Valider</button>
                </div>
            </form>
            <?php
            if(isset($message))
            {
                echo $message;
            }
            if(isset($error))
            {
                echo $error;
            }
            ?>
        </div>
    </div>
</section>