<section class="container col-12 col-md-10 mb-5" id="adminArticles">
    <div class="limiter">
        <div class="container-table100">
            <div class="container col-12">
                <div class="row">
                    <div class="col-12 mb-4">
                        <a class="font-weight-bold retour-listArticles" href="<?= local ?>adminManagement">< Retour au panneau d'administration</a>
                    </div>
                </div>
            </div>
            <div class="container col-12 pb-3">
                <div class="row">
                    <div class="col-12 text-center">
                        <a class="btn btn-primary font-weight-bold btn-newArt mb-3" href="<?= local ?>articles/createArticle">Ajouter un article</a>
                    </div>
                </div>
            </div>
            <div class="container col-12 tabLargeScreen pb-3">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Titre</th>
                            <th class="column3">Auteur</th>
                            <th class="column4">Création</th>
                            <th class="column5">Mise à jour</th>
                            <th class="column6">Visible</th>
                            <th class="column7">Visualiser</th>
                            <th class="column8 columnEnd">Modifier</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($articles['articles'] as $article) {?>
                            <tr>
                                <td class="column1"><?= substr($article['title_art'], 0, 30) ?>...</td>
                                <td class="column3"><?= $article['autor_art'] ?></td>
                                <td class="column4"><?= date('d-m-Y', strtotime($article['date_art'])) ?></td>
                                <td class="column5"><?php if($article['date_art'] != $article['dateUpdate_art']) { echo  date('d-m-Y', strtotime($article['dateUpdate_art'])); } else { echo "---"; }?></td>
                                <?php if($article['isActive_art'] == 1) { ?>
                                    <td class="column6"><a class="linkManagement" href="<?= local ?>articles/desactiveArticle/<?= $article['id_art'] ?>">Oui</a></td>
                                <?php } else { ?>
                                    <td><a class="linkManagement" href="<?= local ?>articles/activeArticle/<?= $article['id_art'] ?>">Non</a></td>
                                <?php } ?>
                                <td class="column7"><a class="linkManagement" href="<?= local ?>articles/readArticle/<?= $article['id_art'] ?>">Afficher</a></td>
                                <td class="column8 columnEnd"><a class="linkManagement" href="<?= local ?>articles/modifyArticle/<?= $article['id_art'] ?>">Modifier</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php foreach($articles['articles'] as $article) {?>
                <div class="container tabMobile col-12 col-md-10 mb-3">
                    <div class="row justify-content-center">
                        <div class="container col-12 col-md-8 offset-md-2">
                            <table class="panel">
                                <tr class="trCompte">
                                    <td>Titre :</td>
                                    <td><?= substr($article['title_art'], 0, 30) ?>...</td>
                                </tr>
                                <tr class="trCompte">
                                    <td>Auteur:</td>
                                    <td><?= $article['autor_art'] ?></td>
                                </tr>
                                <tr class="trCompte">
                                    <td>Création</td>
                                    <td><?= date('d-m-Y', strtotime($article['date_art'])) ?></td>
                                </tr>
                                <tr class="trCompte">
                                    <td>Mise à jour</td>
                                    <td><?php if($article['date_art'] != $article['dateUpdate_art']) { echo  date('d-m-Y', strtotime($article['dateUpdate_art'])); } else { echo "---"; }?></td>
                                </tr>
                                <tr class="trCompte">
                                    <td>Visible</td>
                                    <?php if($article['isActive_art'] == 1) { ?>
                                            <td><a class="linkManagement" href="<?= local ?>articles/desactiveArticle/<?= $article['id_art'] ?>">Oui</a></td>
                                    <?php } else { ?>
                                            <td><a class="linkManagement" href="<?= local ?>articles/activeArticle/<?= $article['id_art'] ?>">Non</a></td>
                                    <?php } ?>
                                </tr>
                                <tr class="trCompte">
                                    <td>Visualiser</td>
                                    <td><a class="linkManagement" href="<?= local ?>articles/readArticle/<?= $article['id_art'] ?>">Afficher</a></td>
                                </tr>
                                <tr class="trCompte">
                                    <td>Modifier</td>
                                    <td><a class="linkManagement" href="<?= local ?>articles/modifyArticle/<?= $article['id_art'] ?>">Modifier</a></td>
                                </tr>
                            </table>             
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
                                <a class="font-weight-bold paginationLink" href="<?= local ?>adminManagement/adminListAllArticles/<?= $numPage - 1 ?>" class="page-link"><<</a>
                            </li>
                            </div>
                            <div class="col-md-2"> 
                            <?php for($page = 1; $page <= $pages; $page++){ ?>
                                <li class="page-item <?php if($numPage != $page){ echo "disabled"; } ?>">
                                    <a class="font-weight-bold paginationLink" href="<?= local ?>adminManagement/adminListAllArticles/<?= $page ?>" class="font-weight-bold link-page"><?= $page ?></a>
                                </li>
                            <?php
                            } ?>
                            </div>
                            <div class="col-md-3"> 
                            <li class="page-item <?php if($numPage == $pages) { echo "disabled"; } ?>">
                                <a class="font-weight-bold paginationLink" href="<?= local ?>adminManagement/adminListAllArticles/<?= $numPage + 1 ?>" class="page-link">>></a>
                            </li>
                        </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
