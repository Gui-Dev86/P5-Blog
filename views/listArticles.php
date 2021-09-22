<section class="container col-10" id="listArticle">
    <div class="container col-12">
        <div class="row">
            <div class="col-12 col-10 mt-3 mb-5 containerDashed text-center">
                <h4 class="font-weight-bold">
                    <span class="ion-minus"></span>ARTICLES<span class="ion-minus"></span>
                </h4>
            </div>
        </div>
    </div>
    <div class="container contArticle col-12 py-3">
        <div class="row">
            <!----- foreach article in articles--->
                <div class="col-12 contArticle col-md-4 pr-5-md5">
                    <div class="card-block">
                        <img class="card-img-top" src="<?= local ?>public/img/upload/desktop.jpg" alt="(nom fichier)">
                        <div class="card-body">
                            <div class="cardTitre">
                                <h5 class="card-title font-weight-bold">Lorem ipsum dolor sit amet. (article.title)</h5>
                                <p class="card-text"><small class="text-muted">Mis à jour le
                            <!----- if dateptade is not null--->
                                    <!--<td>(article.dateUpdate) par <b>(article.username)</b></td>-->
                            <!----- elseif --->
                                        <td>(article.dateCreation)  par <b>(article.username)</b></td></small></p>
                                <!---endif--->
                                <div class="text-center">
                                    <a class="btn btn-primary btn-art font-weight-bold stretched-link mb-2" href="<?= local ?>articles/readArticle/1">Lire la suite</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!----- endfor --->
        </div>
    </div>
    <div class="container col-12 my-2">
        <div class="row">   
            <div class="col-8 offset-2 col-md-4 offset-md-4 text-center">
                <a class="font-weight-bold paginationLink" href="<?= local ?>articles" class="font-weight-bold link-page">1</a>
            </div>
        </div>
    </div>  
</section>