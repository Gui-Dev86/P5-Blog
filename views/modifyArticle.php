<div class="container heightNav col-12"></div>

<div class="row">
        <div class="col text-center">
            <h3>Modifier l'article</h3>
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

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>