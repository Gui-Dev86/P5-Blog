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
                    <span class="ion-minus"></span>COMMENTAIRES<span class="ion-minus"></span>
                </h4>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="container">

            <!----- foreach comments in comment--->
                <div class="row">
                    <p>comments.content</p>
                </div>
                <div class="row">
                <!----- if dateuptade is not null--->
                        <p>A été créé le comments.date|date('d/m/Y \\à H:i:s') }} par <strong>comments.pseudo</strong></p>
                    <!----- else --->
                        <p>A été modifié le comments.dateUpdate|date('d/m/Y \\à H:i:s') }} par <strong>comments.pseudo</strong></p>
                    <!----- endif --->
                    <a class="ml-3" href="<?= local ?>articles/readArticle/1">Afficher le commentaire</a>
                </div>
            <!----- endfor --->

        </div>
    </div>
</section>