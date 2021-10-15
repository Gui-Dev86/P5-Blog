<div class="container col-10">
    <div class="row">
        <div class="col-10 my-4">
            <a class="font-weight-bold retour-listArticle" href="<?= local ?>articles/pageArticles/1">< Retour à la liste d'articles</a>
        </div>
    </div>
</div>
<?php
?>
<section class="container sectionArticle col-10 mb-5" id="<?= $article['article'][0]['id_art'] ?>">
    <div class="container contArticle col-12">
        <div class="row">
            <div class="col-12 mt-3 mb-4 containerDashed text-center">
                <h4 class="font-weight-bold">
                    <span class="ion-minus"></span><?= $article['article'][0]['title_art'] ?><span class="ion-minus"></span>
                </h4>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="container contImgMobile">
            <div class="row">
                <div class="col-12 mb-3 text-center">
                    <img class="img-art" src="<?= local."public/img/upload/".$article['article'][0]['image_art'] ?>" alt="<?= $article['article'][0]['altImage_art'] ?>">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <p class="text-justify font-weight-bold"><?= $article['article'][0]['chapo_art'] ?></p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <p class="text-justify"><?= $article['article'][0]['content_art'] ?></p>
            </div>
            <div class="row mb-3" id="listComments">
                <?php if($article['article'][0]['dateUpdate_art'] > $article['article'][0]['date_art']) { ?>
                    <p class="text-justify textInfo"><?= "Mis à jour le ". date('d-m-Y', strtotime($article['article'][0]['dateUpdate_art'])); 
                } else { 
                    echo "Créé le ".date('d-m-Y', strtotime($article['article'][0]['date_art'])); } ?> par <strong><?= $article['article'][0]['autor_art'] ?></strong><br />
            </div>
        </div>
    </div>
</section>
<section class="container col-10" id="comment">
    <div class="container">
        <div class="row">
            <h4>Commentaires</h4>
        </div>
    </div>
    <?php foreach($comments['comments'] as $comment) { if($comment['isActive_com'] == 1) { ?>
        <div class="container mb-4 contComment">
            <div class="col-12 pt-3">
                <div class="container">
                    <div class="row">
                        <p class="text-justify"><?= $comment['content_com'] ?></p>
                    </div>
                    <div class="row">
                        <p class="text-justify textInfo">
                        <?php if($comment['dateUpdate_com'] > $comment['date_com']) { ?>
                        <?= "Mis à jour le ". date('d-m-Y', strtotime($comment['dateUpdate_com'])); } else { echo "Créé le ".date('d-m-Y', strtotime($comment['date_com'])); } ?>
                        par&nbsp<b><?= $comment['autor_com'] ?></b>.</p>
                    </div>
                    <div class="row">
                        <?php if($comment['statut_com'] == 1 ) { ?>
                            <p class="text-justify textInfo">Le commentaire a été validé.</p>
                        <?php } if($comment['statut_com'] == 0 && $comment['statut_com'] != NULL) { ?>
                            <p class="text-justify textInfo">Le commentaire a été refusé.</p>
                        <?php } if($comment['statut_com'] == NULL) { ?>
                            <p class="text-justify textInfo">Le commentaire est en cours de validation.</p>
                        <?php } ?>
                    </div> 
                    <div class="row">
                        <?php if(isset($_SESSION['user']) && $comment['id_user'] == $_SESSION['user']['idUser']) { ?>
                            <div class="text-center">
                                <a class="linkModifSupp mb-3" href="<?= local ?>">Modifier</a>
                            </div>
                            <div class="text-center">
                                <a class="linkModifSupp mb-3 pl-2" href="<?= local ?>">Supprimer</a>
                            </div>
                        <?php } ?>
                    </div>
                    </div>
                    <?php if(isset($_SESSION["user"]) && $_SESSION["user"]["role"] == 1 && $comment['statut_com'] == NULL) { ?>
                        <div class="container">
                            <div class="row pt-2">
                                <div class=" col-md-3 offset-md-3 text-center">
                                    <a class="btn btn-primary btnComment mb-3" href="<?= local ?>">Valider le commentaire</a>
                                </div>
                                <div class=" col-md-3 text-center">
                                    <a class="btn btn-warning btnRefuseComment mb-3" href="<?= local ?>">Refuser le commentaire</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?> 
                </div>
            </div>
        </div>
    <?php } } ?>
</section>
<row>
    <div class="container col-12 my-2">
        <div class="row">   
            <div class="col-8 offset-2 col-md-4 offset-md-4 text-center">
                <ul class="pagination">
                <div class="col-md-3 offset-md-2">  
                    <li class="page-item <?php if($numPageComments == 1){ echo "disabled"; } ?>">
                        <a class="font-weight-bold paginationLink" href="<?= local ?>articles/readArticle/<?=$article['article'][0]['id_art']?>/<?= $numPageComments - 1 ?>#listComments" class="page-link"><<</a>
                    </li>
                    </div>
                    <div class="col-md-2"> 
                    <?php for($page = 1; $page <= $pagesComments; $page++){ ?>
                        <li class="page-item <?php if($numPageComments != $page){ echo "disabled"; } ?>">
                            <a class="font-weight-bold paginationLink" href="<?= local ?>articles/readArticle/<?=$article['article'][0]['id_art']?>/<?= $numPageComments?>#listComments" class="font-weight-bold link-page"><?= $page ?></a>
                        </li>
                    <?php
                    } ?>
                    </div>
                    <div class="col-md-3"> 
                    <li class="page-item <?php if($numPageComments == $pagesComments OR $pagesComments < 1) { echo "disabled"; } ?>">
                        <a class="font-weight-bold paginationLink" href="<?= local ?>articles/readArticle/<?=$article['article'][0]['id_art']?>/<?= $numPageComments + 1 ?>#listComments" class="page-link">>></a>
                    </li>
                </div>
                </ul>
            </div>
        </div>
    </div>
</row>
<?php if(isset($_SESSION["user"])) { ?>
    <?php if($_SESSION["user"]["isActiveUser"] == 1 && $_SESSION["user"]["isActiveAdmin"] == 1 ) { ?>
        <section class="container col-10" id="newComment">
            <div class="container contNewComment">
                <div class="row">
                    <form class="col-12" action="" method="post">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Commentaire</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                        </div>
                        <div class = "btnCenterMobile">
                            <button type="submit" class="col-12 btn btnComment btn-primary mb-5">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    <?php } else { ?>
         <section class="container col-10" text-center>
            <div class="col-12">
                <h5 class="font-weight-bold text-center mb-3">Votre compte est actuellement désactivé pour plus d'informations rendez-vous dans dans la partie gestion de votre compte.</h5>
            </div>
        </section>
    <?php } ?>
<?php } else { ?>
    <section class="container col-10" text-center>
        <div class="col-12">
            <h5 class="font-weight-bold text-center mb-3">Pour commenter l'article veuillez vous connecter ou vous inscrire sur le site.</h5>
        </div>
    </section>
<?php } ?>