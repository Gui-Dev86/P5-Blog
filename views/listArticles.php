<section id="blog">
    <div class="row">
        <div class="col-lg-12 col-lg-offset-3 text-center">
            <h2>
                <span class="ion-minus"></span>----- Articles du blog -----<span class="ion-minus"></span>
            </h2>
        </div>
    </div>

    <div class="container py-3">
        <div class="row">
            <!----- foreach article in articles--->
                <div class="col-12">
                    <div class="card text-center">
                        <div class="card-block">
                            <h5 class="card-header">article.title</h5>
                            <h6 class="card-subtitle mb-2 text-muted  p-3">article.chapo</h6>
                            <p class="card-text text-truncate  p-2">article.description</p>
                            <p class="card-text"><small class="text-muted">Mis à jour le
                                    <!----- if dateptade is not null--->
                                        <td>article.dateUpdate par <b>article.username</b></td>
                                        <!----- elseif --->
                                        <td>article.dateCreation  par <b>article.username</b></td>
                                    </small></p>
                            <a class="btn btn-primary mb-3" href="<?= local ?>articles/lire/1">Plus...</a>
                        </div>
                    </div>
                </div>
            <!----- endfor --->
        </div>
    </div>
    <div class="container py-3">
        <div class="row">
            <div class=" col-12 text-center">
                <a class="btn btn-primary mb-3" href="<?= local ?>articles/createArticle">Ajouter un article</a>
            </div>
        </div>
    </div>
</section>