<div class="container col-10">
    <div class="row">
        <div class="col-10 my-4">
            <a class="font-weight-bold retour-listArticle" href="<?= local ?>adminManagement/adminListAllArticles/1">< Page précédente</a>
        </div>
    </div>
</div>
<section class="container col-10" id="modifyArticle">
    <div class="container col-12">
        <div class="row">
            <div class="col-12 col-10 mb-5 containerDashed text-center">
                <h3 class="font-weight-bold">
                    <span class="ion-minus"></span>MODIFIER L'ARTICLE<span class="ion-minus"></span>
                </h3>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="index.php?page=article&method=createArticle" method="post">

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" class="form-control"  id="title" name="title">
            </div>

            <div class="form-group">
                <label for="chapo">Extrait</label>
                <input type="text" class="form-control" id="chapo" name="chapo">
            </div>

            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea type="text" class="form-control" rows="10" id="content" name="content"></textarea>
            </div>
            <label for="imgArt">Image</label>
            <input type="file"
                id="imgFileArt" name="imgFileArt"
                accept="image/png, image/jpeg">
            <div class = "btnCenterModifyArticle">
                <button type="submit" class="btn btn-primary font-weight-bold btn-modifyArt mt-4">Modifier</button>
            </div>
        </form>
        <?php if($article[0]["isActive_art"] == 1) { ?>
            <form method="post" action="<?= local ?>admin/desactiveArticle">
                <div class = "mb-3 btnCenterDisplayArticle">
                    <button type="submit" name="hideArticle" class="btn btn-primary font-weight-bold btn-modifyArt">Dissimuler l'article</button>
                </div>
            </form>
        <?php } else { ?>
            <form method="post" action="<?= local ?>admin/activeArticle">
                <div class = "mb-3 btnCenterDisplayArticle">
                    <button type="submit" name="viewArticle" class="btn btn-primary font-weight-bold btn-modifyArt">Afficher l'article</button>
                </div>
            </form>
        <?php } ?>
    </div>
</section>