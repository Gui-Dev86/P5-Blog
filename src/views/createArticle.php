<div class="container col-10">
    <div class="row">
        <div class="col-10 my-4">
            <a class="font-weight-bold retour-listArticle" href="<?= local ?>adminManagement/adminListAllArticles">Page précédente</a>
        </div>
    </div>
</div>
<section class="container col-10" id="createArticle">
    <div class="container col-12">
        <div class="row">
            <div class="col-12 col-10 mb-5 containerDashed text-center">
                <h3 class="font-weight-bold">
                    <span class="ion-minus"></span>CREER UN NOUVEL ARTICLE<span class="ion-minus"></span>
                </h3>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="createArticle" method="post" enctype="multipart/form-data">

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
            <div class="form-group">
                <label for="uploadfile">Image</label>
                <input class="mb-3" type="file"
                    id="uploadfile" name="uploadfile"
                    accept="image/png, image/jpeg">
            </div>
            <div class="form-group">
                <label for="altImage">Description de l'image</label>
                <input type="text" class="form-control" id="altImage" name="altImage">
            </div>
            <div class = "btnCenterNewArticle">
                <button type="submit" name="formCreateArticle" class="btn btn-primary font-weight-bold btn-createArt mt-4 mb-3">Créer</button>
            </div>
        </form>
        <?php
            if(isset($_SESSION['valide']))
            {
                echo $_SESSION['valide'];
                unset($_SESSION["valide"]);
            }
            if(isset($error))
            {
                echo $error;
            }
        ?>
    </div>
</section>