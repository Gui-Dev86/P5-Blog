<section class="container col-12 col-md-10 mb-5" id="adminComments">
    <div class="limiter">
        <div class="container-table100">
            <div class="container col-12">
                <div class="row">
                    <div class="col-12 mb-4">
                        <a class="font-weight-bold retour-listComments" href="<?= local ?>adminManagement">< Retour au panneau d'administration</a>
                    </div>
                </div>
            </div>
            <div class="container col-12 tabLargeScreen pb-3">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Article</th>
                            <th class="column3">Auteur</th>
                            <th class="column4">Création</th>
                            <th class="column5">Mise à jour</th>
                            <th class="column6">Statut</th>
                            <th class="column7">Visualiser</th>
                            <th class="column8 columnEnd">Modifier statut</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($comments['comments'] as $comment) {?>
                        <tr>
                            <td class="column1"><?= substr($comment['title_art'], 0, 30) ?>...</td>
                            <td class="column3"><?= $comment['autor_com'] ?></td>
                            <td class="column4"><?= date('d-m-Y', strtotime($comment['date_com'])); ?></td>
                            <td class="column5"><?php if($comment['date_com'] != $comment['dateUpdate_com']) {echo date('d-m-Y', strtotime($comment['dateUpdate_com'])); } else { echo "---"; }?></td>
                            <td class="column6 <?php if($comment['statut_com'] == NULL) { ?> statutEnCours <?php } ?>"><?php if($comment['statut_com'] == 1) { echo "Validé"; } elseif($comment['statut_com'] == NULL) { echo "En cours"; } else { echo "Refusé"; } ?></td>
                            <td class="column7"><a class="linkManagement" href="<?= local ?>articles/articleListComments/<?= $comment['id_art'] ?>">Afficher</a></td>
                            <td class="column8 columnEnd"><a class="linkManagement" href="<?= local ?>articles/initialiseComment/<?= $comment['id_com'] ?>">Réinitialiser</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php foreach($comments['comments'] as $comment) {?>
                <div class="container tabMobile col-12 col-md-10 mb-3">
                    <div class="row justify-content-center">
                        <div class="container col-12 col-md-8 offset-md-2">
                            <table class="panel">
                                <tr class="trCompte">
                                    <td>Article :</td>
                                    <td><?= substr($comment['title_art'], 0, 30) ?>...</td>
                                </tr>
                                <tr class="trCompte">
                                    <td>Auteur:</td>
                                    <td><?= $comment['autor_com'] ?></td>
                                </tr>
                                <tr class="trCompte">
                                    <td>Création</td>
                                    <td><?= date('d-m-Y', strtotime($comment['date_com'])) ?></td>
                                </tr>
                                <tr class="trCompte">
                                    <td>Mise à jour</td>
                                    <td><?php if($comment['date_com'] != $comment['dateUpdate_com']) { echo  date('d-m-Y', strtotime($comment['dateUpdate_com'])); } else { echo "---"; }?></td>
                                </tr>
                                <tr class="trCompte">
                                    <td>Statut</td>
                                    <td <?php if($comment['statut_com'] == NULL) { ?> class="statutEnCours" <?php } ?>><?php if($comment['statut_com'] == 1) { echo "Validé"; } elseif($comment['statut_com'] == NULL) { echo "En cours"; } else { echo "Refusé"; } ?></td>
                                </tr>
                                <tr class="trCompte">
                                    <td>Visualiser</td>
                                    <td><a class="linkManagement" href="<?= local ?>articles/readArticle/<?= $comment['id_art'] ?>">Afficher</a></td>
                                </tr>
                                <tr class="trCompte">
                                    <td>Modifier statut</td>
                                    <td><a class="linkManagement" href="<?= local ?>articles/initialiseComment/<?= $comment['id_com'] ?>">Réinitialiser</a></td>
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
                                <a class="font-weight-bold paginationLink" href="<?= local ?>adminManagement/adminListAllComments/<?= $numPage - 1 ?>" class="page-link"><<</a>
                            </li>
                            </div>
                            <div class="col-md-2"> 
                            <?php for($page = 1; $page <= $pages; $page++){ ?>
                                <li class="page-item <?php if($numPage != $page){ echo "disabled"; } ?>">
                                    <a class="font-weight-bold paginationLink" href="<?= local ?>adminManagement/adminListAllComments/<?= $page ?>" class="font-weight-bold link-page"><?= $page ?></a>
                                </li>
                            <?php
                            } ?>
                            </div>
                            <div class="col-md-3"> 
                            <li class="page-item <?php if($numPage == $pages) { echo "disabled"; } ?>">
                                <a class="font-weight-bold paginationLink" href="<?= local ?>adminManagement/adminListAllComments/<?= $numPage + 1 ?>" class="page-link">>></a>
                            </li>
                        </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>