<section class="container contArticle col-10" id="blog">
    <div class="container contArticle col-12">
        <div class="row">
            <div class="col-12 col-10 mt-3 mb-5 containerDashed text-center">
                <h2 class="font-weight-bold">
                    <span class="ion-minus"></span>ARTICLES<span class="ion-minus"></span>
                </h2>
            </div>
        </div>
    </div>
    <div class="container contArticle col-12 py-3">
        <div class="row">
            <!----- foreach article in articles--->
                <div class="col-12 contArticle col-md-4">
                    <div class="card text-center">
                        <div class="card-block">
                            <div class="cardTitre">
                                <h5 class="card-header">Lorem ipsum dolor sit amet. (article.title)</h5>
                                <div class="cardText">
                                    <p class="card-text p-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. (article.chapo)</p>
                                    <p class="card-text"><small class="text-muted">Mis à jour le
                                            <!----- if dateptade is not null--->
                                                <!--<td>(article.dateUpdate) par <b>(article.username)</b></td>-->
                                                <!----- elseif --->
                                                <td>(article.dateCreation)  par <b>(article.username)</b></td>
                                            </small></p>
                                    <a class="btn btn-primary btn-art font-weight-bold stretched-link mb-3" href="<?= local ?>articles/readArticle/1">Lire la suite</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!----- endfor --->
        </div>
    </div>   
</section>