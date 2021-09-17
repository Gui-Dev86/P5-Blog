<div class="container heightNav col-12"></div>

<div class="row">
    <div class="col text-center">
        <h3>article.title</h3>
    </div>
</div>

<div class="col-12">
    <div class="container">
        <div class="row">
            <p>article.chapo</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <p>article.content</p>
        </div>
        <div class="row">
         <!----- if dateuptade is not null--->
            <p>A été créé le article.date|date('d/m/Y \\à H:i:s') par <strong>article.pseudo</strong></p>
         <!----- else --->
            <p>A été modifié le article.dateUpdate|date('d/m/Y \\à H:i:s') par <strong>article.pseudo</strong></p>
        <!----- endif --->
        </div>
    </div>
   
    <!----- if role is admin--->
    <div class="container py-3">
        <div class="row">
            <div class=" col-2 offset-8 text-center">
                <a class="btn btn-primary mb-3" href="<?= local ?>articles/modifyArticle">Modifier l'article</a>
            </div>
            <div class=" col-2 text-center">
                <a class="btn btn-danger mb-3" href="<?= local ?>">Supprimer l'article</a>
            </div>
        </div>
    </div>
        <!----- endif --->
  
</div>

<div class="container">
    <div class="row">
        <h4>Commentaires</h4>
    </div>
</div>
<div class="col-12">
    <div class="container">

        <!----- foreach comments in article--->
            <div class="row">
                <p>comments.content</p>
            </div>
            <div class="row">
               <!----- if dateuptade is not null--->
                    <p>A été créé le comments.date|date('d/m/Y \\à H:i:s') }} par <strong>comments.pseudo</strong></p>
                <!----- else --->
                    <p>A été modifié le comments.dateUpdate|date('d/m/Y \\à H:i:s') }} par <strong>comments.pseudo</strong></p>
                <!----- endif --->
            </div>
            
            <div class="container py-3">
                <div class="row">
                    <!----- if session.pseudo is auteur--->
                    <div class=" col-2 offset-8 text-center">
                        <a class="btn btn-primary mb-3" href="<?= local ?>articles/modifyArticle">Modifier le commentairee</a>
                    </div>
                    <!----- else if role is admin--->
                        <!----- if statut is enCours--->
                            <div class=" col-2-8 text-center">
                                <a class="btn btn-primary mb-3" href="<?= local ?>">Valider le commentaire</a>
                            </div>
                        <!----- else--->
                            <div class=" col-2-8 text-center">
                                <a class="btn btn-primary mb-3" href="<?= local ?>">Refuser le commentaire</a>
                            </div>
                            <div class=" col-2 text-center">
                                <a class="btn btn-danger mb-3" href="<?= local ?>">Supprimer le commentaire</a>
                            </div>
                        <!----- endif --->
                    <!----- endif --->
                </div>
            </div>
        <!----- endfor --->
    </div>
</div>
<!----- if session.sessionId is defined--->
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <form class="col-8" action="index.php?page=comment&method=createComment&id_art=article.id_art" method="post">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Commentaire</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
        <div class="col-2"></div>
    </div>
</div>