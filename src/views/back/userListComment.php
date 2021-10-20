<div class="container col-10">
    <div class="row">
        <div class="col-10 my-4">
            <a class="font-weight-bold retour-compteUser" href="<?= local ?>userCompte">< Retour à votre compte</a>
        </div>
    </div>
</div>
<section class="container col-10 mb-5" id="userModifCompte">
    <div class="container col-12">
        <div class="row">
            <div class="col-12 mb-4 containerDashed text-center">
                <h4 class="font-weight-bold">
                    <span class="ion-minus"></span>COMMENTAIRES<span class="ion-minus"></span>
                </h4>
            </div>
        </div>
    </div>
    <?php foreach($comments['comments'] as $comment) { ?>
        <div class="col-12">
            <div class="container contListComment mb-3">
         
                <div class="row">
                    <p><?= $comment['content_com'] ?></p>
                </div>
                <div class="row"><?php if($comment['dateUpdate_com'] > $comment['date_com']) { 
                    echo "Mis à jour le ". date('d-m-Y', strtotime($comment['dateUpdate_com'])); } else { echo "Créé le ".date('d-m-Y', strtotime($comment['date_com'])); } ?> 
                    par&nbsp <b><?= $comment['autor_com'] ?></b>
                    <a class="font-weight-bold displayComment" href="<?= local ?>articles/readArticle/<?= $comment['id_art'] ?>">Afficher le commentaire</a></p>
                </div>
           
            </div>
        </div>
    <?php } ?>
    <div class="container col-12 my-2">
        <div class="row">   
            <div class="col-8 offset-2 col-md-4 offset-md-4 text-center">
                <ul class="pagination">
                <div class="col-md-3 offset-md-2">  
                    <li class="page-item <?php if($numPage == 1){ echo "disabled"; } ?>">
                        <a class="font-weight-bold paginationLink" href="<?= local ?>userCompte/userListComment/<?= $numPage - 1 ?>" class="page-link"><<</a>
                    </li>
                    </div>
                    <div class="col-md-2"> 
                    <?php for($page = 1; $page <= $pages; $page++){ ?>
                        <li class="page-item <?php if($numPage != $page){ echo "disabled"; } ?>">
                            <a class="font-weight-bold paginationLink" href="<?= local ?>userCompte/userListComment/<?= $page ?>" class="font-weight-bold link-page"><?= $page ?></a>
                        </li>
                    <?php
                    } ?>
                    </div>
                    <div class="col-md-3"> 
                    <li class="page-item <?php if($numPage == $pages) { echo "disabled"; } ?>">
                        <a class="font-weight-bold paginationLink" href="<?= local ?>userCompte/userListComment/<?= $numPage + 1 ?>" class="page-link">>></a>
                    </li>
                </div>
                </ul>
            </div>
        </div>
    </div>
</section>