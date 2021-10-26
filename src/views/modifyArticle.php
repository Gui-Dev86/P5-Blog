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
        <form action="<?= local ?>articles/modifyArticleContent/<?= $article['article'][0]['id_art'] ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $article['article'][0]['title_art'] ?>">
            </div>

            <div class="form-group">
                <label for="chapo">Extrait</label>
                <input type="text" class="form-control" id="chapo" name="chapo" value="<?= $article['article'][0]['chapo_art'] ?>">
            </div>

            <div class="form-group">
                <label for="content">Contenu</label>
                <textarea type="text" class="form-control" rows="10" id="content" name="content"><?= $article['article'][0]['content_art'] ?></textarea>
            </div>   
            <div class="mb-3">
                <img class="imgModify" src="<?= local."public/img/upload/".$article['article'][0]['image_art'] ?>" alt="<?= $article['article'][0]['altImage_art']; ?>">
            </div>
            <div class="form-group">
                <label for="uploadfile">Image</label>
                <input type="file"
                    id="uploadfile" name="uploadfile"
                    accept="image/png, image/jpeg">
            </div>
            <p class = "font-weight-bold font-italic mb-3">**Attention à bien sélectionner une image au format png ou jpeg.</p>
            <div class="form-group">
                <label for="altImage">Description de l'image</label>
                <input type="text" class="form-control" id="altImage" name="altImage" value="<?= $article['article'][0]['altImage_art'] ?>">
            </div>
            <div class = "btnCenterModifyArticle">
                <button type="submit" name="formModifyArticle" class="btn btn-primary font-weight-bold btn-modifyArt my-4">Modifier</button>
            </div>
        </form>
        <?php if(isset($_SESSION['valide'])) {
            echo $_SESSION['valide'];
            unset($_SESSION['valide']);
        } ?>
        <?php if(isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        } ?>
    </div>
</section>