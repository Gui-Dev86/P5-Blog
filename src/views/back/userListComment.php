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
        <div class="container contListComment mb-3">

            <!----- foreach comments in comment--->
                <div class="row">
                    <p>comments.content</p>
                </div>
                <div class="row">
                <!----- if dateuptade is not null--->
                <!---    <p class="commentInfos">A été créé le comments.date|date('d/m/Y \\à H:i:s') }} par <strong>comments.pseudo</strong>--->
                    <!----- else --->
                    <p class="commentInfos">A été modifié le comments.dateUpdate|date('d/m/Y \\à H:i:s') }} par <strong>comments.pseudo</strong>
                    <!----- endif --->
                    <a class="font-weight-bold displayComment" href="<?= local ?>articles/readArticle/1">Afficher le commentaire</a></p>
                </div>
            <!----- endfor --->

        </div>
    </div>
    <div class="container col-12 my-2">
        <div class="row">   
            <div class="col-8 offset-2 col-md-4 offset-md-4 text-center">
                <a class="font-weight-bold paginationLink" href="<?= local ?>articles" class="font-weight-bold link-page">1</a>
            </div>
        </div>
    </div> 
</section>