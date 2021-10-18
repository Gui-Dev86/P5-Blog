<div class="container col-10">
    <div class="row">
        <div class="col-10 my-4">
            <a class="font-weight-bold retour-listArticle" href="<?= local ?>articles/pageArticles/1">< Retour à la liste d'articles</a>
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
        <div class="container contImgMobile">
            <div class="row">
                <div class="col-12 mb-3 text-center">
                    <img class="img-art" src="<?= local."public/img/upload/".$article['article'][0]['image_art'] ?>" alt="<?= $article['article'][0]['altImage_art'] ?>">
                </div>
            </div>
        </div>
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
                    echo "Créé le ".date('d-m-Y', strtotime($article['article'][0]['date_art'])); } ?> par&nbsp<strong><?= $article['article'][0]['autor_art'] ?></strong><br />
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
                        <?php if(isset($_SESSION['user']) && $comment['id_user'] == $_SESSION['user']['idUser']) { ?>
                             <!--<form action="<?= local ?>articles/readModifyComment/" method="post">-->
                                 <!--<div class="form-group">  -->
                                    <div class="text-center">
                                        <a href="<?= local ?>articles/readModifyComment/<?= $article['article'][0]['id_art'] ?>/<?= $numPageComments ?>/<?= $comment['id_com'] ?>">Modifier</a>
                                        <!--<button type="submit" name="readModifyComment" class="linkModifSupp">Modifier</button>-->
                                    </div>
                                <!--</div>-->
                             <!--</form>-->
                            <form action="<?= local ?>articles/deleteComment/" method="post">
                                <div class="form-group">
                                    <div class="text-center">
                                        <button type="submit" name="deleteComment" class="linkModifSupp pl-2">Supprimer</button>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
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
                        <a class="font-weight-bold paginationLink" href="<?= local ?>articles/readArticle/<?=$article['article'][0]['id_art']?>/<?= $numPageComments - 1 ?>#listComments" class="page-link"><<</a>
                    </li>
                    </div>
                    <div class="col-md-2"> 
                    <?php for($page = 1; $page <= $pagesComments; $page++){ ?>
                        <li class="page-item <?php if($numPageComments != $page){ echo "disabled"; } ?>">
                            <a class="font-weight-bold paginationLink" href="<?= local ?>articles/readArticle/<?=$article['article'][0]['id_art']?>/<?= $numPageComments?>#listComments" class="font-weight-bold link-page"><?= $page ?></a>
                        </li>
                    <?php
                    } ?>
                    </div>
                    <div class="col-md-3"> 
                    <li class="page-item <?php if($numPageComments == $pagesComments OR $pagesComments < 1) { echo "disabled"; } ?>">
                        <a class="font-weight-bold paginationLink" href="<?= local ?>articles/readArticle/<?=$article['article'][0]['id_art']?>/<?= $numPageComments + 1 ?>#listComments" class="page-link">>></a>
                    </li>
                </div>
                </ul>
            </div>
        </div>
    </div>
</row>
<?php if(isset($_SESSION["user"])) { ?>
    <?php if($_SESSION["user"]["isActiveUser"] == 1 && $_SESSION["user"]["isActiveAdmin"] == 1 ) { ?>
        <section class="container col-10" id="newComment">
            <div class="container contNewComment">
                <div class="row">
                    <form class="col-12" action="<?= local ?>articles/createModifyComment" method="post">
                        <div class="form-group" id="ancreNewComment">
                            <label for="exampleFormControlTextarea1">Commentaire</label>
                            <textarea class="form-control" id="comment" name="commentContent" rows="3"><?php if(isset($_SESSION['comment'])) { echo $_SESSION['comment'][0]['content_com']; unset($_SESSION['comment']); } ?></textarea>
                        </div>
                        <div class = "btnCenterMobile">
                            <button type="submit" name="formCreateComment" class="col-12 btn btnComment btn-primary mb-5">Envoyer</button>
                        </div>
                    </form>
                    <?php
                        if(isset($_SESSION['valide']))
                        {
                            echo $_SESSION['valide'];
                            unset($_SESSION['valide']);
                            unset($_SESSION['idCommentPage']);
                        }
                        if(isset($_SESSION['error']))
                        {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                    ?>
                </div>
            </div>
        </section>
    <?php } else { ?>
         <section class="container col-10">
            <div class="col-12">
                <h5 class="font-weight-bold text-center mb-3">Votre compte est actuellement désactivé pour plus d'informations rendez-vous dans dans la partie gestion de votre compte.</h5>
            </div>
        </section>
    <?php } ?>
<?php } else { ?>
    <section class="container col-10">
        <div class="col-12">
            <h5 class="font-weight-bold text-center mb-3">Pour commenter l'article veuillez vous connecter ou vous inscrire sur le site.</h5>
        </div>
    </section>
<?php } ?>