<div class="container col-10">
    <div class="row">
        <div class="col-10 my-4">
            <a class="font-weight-bold retour-listArticle" href="<?= local ?>articles/pageArticles/1">< Retour à la liste d'articles</a>
        </div>
    </div>
</div>
<section class="container sectionArticle col-10 mb-5" id="<?= $article[0]['id_art'] ?>">
    <div class="container contArticle col-12">
        <div class="row">
            <div class="col-12 mt-3 mb-4 containerDashed text-center">
                <h4 class="font-weight-bold">
                    <span class="ion-minus"></span><?= $article[0]['title_art'] ?><span class="ion-minus"></span>
                </h4>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="container contImgMobile">
            <div class="row">
                <div class="col-12 mb-3 text-center">
                    <img class="img-art" src="<?= local."public/img/upload/".$article[0]['image_art'] ?>" alt="<?= $article[0]['altImage_art'] ?>">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <p class="text-justify font-weight-bold"><?= $article[0]['chapo_art'] ?></p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <p class="text-justify"><?= $article[0]['content_art'] ?></p>
            </div>
            <div class="row mb-3">
                <?php if($article[0]['dateUpdate_art'] > $article[0]['date_art']) { ?>
                    <p class="text-justify textInfo"><?= "Mis à jour le ". date('d-m-Y', strtotime($article[0]['dateUpdate_art'])); 
                } else { 
                    echo "Créé le ".date('d-m-Y', strtotime($article[0]['date_art'])); } ?> par <strong><?= $article[0]['autor_art'] ?></strong><br />
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
    <div class="container mb-4 contComment">
        <div class="col-12 pt-3">
            <div class="container">
                <!----- foreach comments in article--->
                    <div class="row">
                        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tincidunt semper augue, et tristique urna mattis eu. 
                        Quisque nunc odio, mattis eget urna sit amet, rutrum porttitor urna. (comments.content)</p>
                    </div>
                    <div class="row">
                    <!----- if dateuptade is not null--->
                            <!---<p>Créé le comments.date|date('d/m/Y \\à H:i:s') }} par <strong>comments.pseudo</strong><br />--->
                        <!----- else --->
                            <p class="text-justify textInfo">Modifié le (comments.dateUpdate|date('d/m/Y \\à H:i:s')) par <strong>(comments.pseudo)</strong><br />
                        <!----- endif --->
                        <!----- if statut = 1--->
                            <!---Le commentaire a été validé.</p>--->
                            <!----- elseif statut = 0--->
                            <!---Le commentaire a été refusé.</p>--->
                            <!---- else--->
                                Le commentaire est en cours de validation.</p>
                        <!----- endif--->
                    </div> 
                    <div class="row">
                        <!----- if session.pseudo is auteur--->
                        <div class="text-center">
                            <a class="linkModifSupp mb-3" href="<?= local ?>">Modifier</a>
                        </div>
                        <div class="text-center">
                            <a class="linkModifSupp mb-3 pl-2" href="<?= local ?>">Supprimer</a>
                        </div>
                    </div>
                </div>
                <!----- else if role is admin et if isvalidate is false--->
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
                <!----- endif ---> 
            </div>
        </div>
    <!---endfor--->
    <div class="container col-12 my-2">
        <div class="row">   
            <div class="col-8 offset-2 col-md-4 offset-md-4 text-center">
                <a class="font-weight-bold paginationLink" href="<?= local ?>" class="font-weight-bold link-page">1</a>
            </div>
        </div>
    </div>
</section>
<section class="container col-10" id="newComment">
    <!----- if session.sessionId is defined--->
    <div class="container contNewComment">
        <div class="row">
            <form class="col-12" action="index.php?page=comment&method=createComment&id_art=article.id_art" method="post">
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