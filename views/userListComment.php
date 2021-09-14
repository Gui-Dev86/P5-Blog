<div class="container">
    <div class="row">
        <h4>Commentaires</h4>
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