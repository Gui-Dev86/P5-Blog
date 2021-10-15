<div class="container col-10">
    <div class="row">
        <div class="col-10 my-4">
            <a class="font-weight-bold retour-listArticle" href="<?= local ?>adminManagement/adminListAllComments">< Page précédente</a>
        </div>
    </div>
</div>
<section class="container sectionArticle col-10 mb-5" id="<?= $article['article'][0]['id_art'] ?>">
    <div class="container contArticle col-12">
        <div class="row">
            <div class="col-12 mt-3 mb-4 containerDashed text-center">
                <h4 class="font-weight-bold">
                    <span class="ion-minus"></span><?= $article['article'][0]['title_art'] ?><span class="ion-minus"></span>
                </h4>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="container">
            <div class="row">
                <p class="text-justify font-weight-bold"><?= $article['article'][0]['chapo_art'] ?></p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <p class="text-justify"><?= $article['article'][0]['content_art'] ?></p>
            </div>
            <div class="row mb-3" id="listComments">
                <?php if($article['article'][0]['dateUpdate_art'] > $article['article'][0]['date_art']) { ?>
                    <p class="text-justify textInfo"><?= "Mis à jour le ". date('d-m-Y', strtotime($article['article'][0]['dateUpdate_art'])); 
                } else { 
                    echo "Créé le ".date('d-m-Y', strtotime($article['article'][0]['date_art'])); } ?> par <strong><?= $article['article'][0]['autor_art'] ?></strong><br />
            </div>
        </div>
    </div>
</section>
<section class="container col-10" id="comment">
    <div class="container">
        <div class="row">
            <h4>Commentaires</h4>
        </div>
    </div>
    <?php foreach($comments['comments'] as $comment) { ?>
        <div class="container mb-4 contComment">
            <div class="col-12 pt-3">
                <div class="container">
                    <div class="row">
                        <p class="text-justify"><?= $comment['content_com'] ?></p>
                    </div>
                    <div class="row">
                        <p class="text-justify textInfo">
                        <?php if($comment['dateUpdate_com'] > $comment['date_com']) { ?>
                        <?= "Mis à jour le ". date('d-m-Y', strtotime($comment['dateUpdate_com'])); } else { echo "Créé le ".date('d-m-Y', strtotime($comment['date_com'])); } ?>
                        par&nbsp<b><?= $comment['autor_com'] ?></b>.</p>
                    </div>
                    <div class="row">
                        <?php if($comment['statut_com'] == 1 ) { ?>
                            <p class="text-justify textInfo">Le commentaire a été <span class="font-weight-bold">validé</span>.</p>
                        <?php } if($comment['statut_com'] == 0 && $comment['statut_com'] != NULL) { ?>
                            <p class="text-justify textInfo">Le commentaire a été <span class="font-weight-bold">refusé</span>.</p>
                        <?php } if($comment['statut_com'] == NULL) { ?>
                            <p class="text-justify textInfo">Le commentaire est en <span class="font-weight-bold">cours de validation</span>.</p>
                        <?php } ?>
                    </div>
                    <?php if(isset($_SESSION["user"]) && $_SESSION["user"]["role"] == 1 && $comment['statut_com'] == NULL) { ?>
                        <div class="container">
                            <div class="row pt-2">
                                <div class=" col-md-3 offset-md-3 text-center">
                                    <a class="btn btn-primary btnComment mb-3" href="<?= local ?>">Valider le commentaire</a>
                                </div>
                                <div class=" col-md-3 text-center">
                                    <a class="btn btn-warning btnRefuseComment mb-3" href="<?= local ?>">Refuser le commentaire</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?> 
                </div>
            </div>
        </div>
    <?php } ?>
</section>
<row>
    <div class="container col-12 my-2">
        <div class="row">   
            <div class="col-8 offset-2 col-md-4 offset-md-4 text-center">
                <ul class="pagination">
                <div class="col-md-3 offset-md-2">  
                    <li class="page-item <?php if($numPageComments == 1){ echo "disabled"; } ?>">
                        <a class="font-weight-bold paginationLink" href="<?= local ?>articles/validComment/<?=$article['article'][0]['id_art']?>/<?= $numPageComments - 1 ?>#listComments" class="page-link"><<</a>
                    </li>
                    </div>
                    <div class="col-md-2"> 
                    <?php for($page = 1; $page <= $pagesComments; $page++){ ?>
                        <li class="page-item <?php if($numPageComments != $page){ echo "disabled"; } ?>">
                            <a class="font-weight-bold paginationLink" href="<?= local ?>articles/validComment/<?=$article['article'][0]['id_art']?>/<?= $numPageComments?>#listComments" class="font-weight-bold link-page"><?= $page ?></a>
                        </li>
                    <?php
                    } ?>
                    </div>
                    <div class="col-md-3"> 
                    <li class="page-item <?php if($numPageComments == $pagesComments OR $pagesComments < 1) { echo "disabled"; } ?>">
                        <a class="font-weight-bold paginationLink" href="<?= local ?>articles/validComment/<?=$article['article'][0]['id_art']?>/<?= $numPageComments + 1 ?>#listComments" class="page-link">>></a>
                    </li>
                </div>
                </ul>
            </div>
        </div>
    </div>
</row>