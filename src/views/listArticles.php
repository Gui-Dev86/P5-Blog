<div class="fondArticles"></div>
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
            <?php foreach($articles as $article) { ?>
                <div class="col-12 contArticle col-md-4 pr-5-md5 mb-3">
                    <div class="card-block">
                        <img class="card-img-top" src="<?= $article['image_art'] ?>" alt="<?= $article['altImage_art'] ?>">
                        <div class="card-body">
                            <div class="cardTitre">
                                <h5 class="card-title font-weight-bold"><?= $article['title_art'] ?></h5>
                                <p class="card-text"><small class="text-muted"><?php if($article['dateUpdate_art'] > $article['date_art']) { ?>
                                    
                                    <td>
                                        <?= "Mis à jour le ". date('d-m-Y', strtotime($article['dateUpdate_art'])); } else { echo "Créé le ".date('d-m-Y', strtotime($article['date_art'])); } ?> 
                                        par <b><?= $article['autor_art'] ?></b>
                                    </td></small>
                                </p>
                    
                                <div class="text-center">
                                    <a class="btn btn-primary btn-art font-weight-bold stretched-link mb-2" href="<?= local ?>articles/readArticle/<?= $article['id_art'] ?>">Lire la suite</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
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
