<section class="container sectionArticle col-10 mt-3 mb-5" id="article">
    <div class="container contArticle col-12">
        <div class="row">
            <div class="col-12 col-10 mt-3 mb-5 containerDashed text-center">
                <h2 class="font-weight-bold">
                    <span class="ion-minus"></span>Lorem ipsum dolor sit amet. (article.title)<span class="ion-minus"></span>
                </h2>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="container">
            <div class="row">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. (article.chapo)</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tincidunt semper augue, et tristique urna mattis eu. 
                Quisque nunc odio, mattis eget urna sit amet, rutrum porttitor urna. Curabitur vestibulum finibus leo, 
                sagittis maximus odio egestas quis. Praesent sagittis eros augue, sed blandit metus pharetra in. (article.contenu)</p>
            </div>
            <div class="row">
            <!----- if dateuptade is not null--->
                <!--<p>Créé le article.date|date('d/m/Y \\à H:i:s') par <strong>article.pseudo</strong></p>-->
            <!----- else --->
                <p class="textInfo">Modifié le article.dateUpdate|date('d/m/Y \\à H:i:s') par <strong>article.pseudo</strong></p>
            <!----- endif --->
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
    <div class="container mb-5 contComment">
        <div class="col-12 pt-3">
            <div class="container">
                <!----- foreach comments in article--->
                    <div class="row">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tincidunt semper augue, et tristique urna mattis eu. 
                        Quisque nunc odio, mattis eget urna sit amet, rutrum porttitor urna. (comments.content)</p>
                    </div>
                    <div class="row">
                    <!----- if dateuptade is not null--->
                            <!---<p>Créé le comments.date|date('d/m/Y \\à H:i:s') }} par <strong>comments.pseudo</strong><br />--->
                        <!----- else --->
                            <p class="textInfo">Modifié le (comments.dateUpdate|date('d/m/Y \\à H:i:s')) par <strong>(comments.pseudo)</strong><br />
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
</section>
<section class="container col-10" id="newComment">
    <!----- if session.sessionId is defined--->
    <div class="container contCommentMobile">
        <div class="row">
            <form class="col-12" action="index.php?page=comment&method=createComment&id_art=article.id_art" method="post">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Commentaire</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>
                <div class = "btnCenterMobile">
                    <button type="submit" class="col-12 btn btnComment btn-primary ">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</section>