<section class="container col-12 col-md-10 mb-5" id="adminMembers">
    <div class="limiter">
        <div class="container-table100">
            <div class="container col-12">
                <div class="row">
                    <div class="col-12 mb-4">
                        <a class="font-weight-bold retour-listMembers" href="<?= local ?>adminManagement">< Retour au panneau d'administration</a>
                    </div>
                </div>
            </div>
            <div class="container col-12 tabLargeScreen pb-3">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Login</th>
                            <th class="column2">Prénom</th>
                            <th class="column3">Nom</th>
                            <th class="column4">Email</th>
                            <th class="column5">Inscription</th>
                            <th class="column6">Mise à jour</th>
                            <th class="column7">Rôle</th>
                            <th class="column8">Statut</th>
                            <th class="column9 columnEnd">Modifier</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($users['users'] as $user) {?>
                        <tr>
                            <td class="column1"><?= $user['login_user'] ?></td>
                            <td class="column2"><?= $user['firstname_user'] ?></td>
                            <td class="column3"><?= $user['lastname_user'] ?></td>
                            <td class="column4"><?= $user['email_user'] ?></td>
                            <td class="column5"><?= date('d-m-Y', strtotime($user['dateCreate_user'])); ?></td>
                            <td class="column6"><?= date('d-m-Y', strtotime($user['dateUpdate_user'])); ?></td>
                            <td class="column7"><?php if($user['role_user'] == 1) { echo "Admin"; } else { echo "Member"; }?></td>
                            <td class="column8"><?php if($user['isActiveUser_user'] == 1 && $user['isActiveAdmin_user'] == 1) { echo "Actif"; } else { echo "Inactif"; } ?></td>
                            <td class="column9 columnEnd"><a class="linkManagement" href="<?= local ?>adminManagement/adminModifyUser/<?= $user['id_user'] ?>">Modifier</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php foreach($users['users'] as $user) {?>
            <div class="container tabMobile col-12 col-md-10 mb-3">
                <div class="row justify-content-center">
                    <div class="container col-12 col-md-8 offset-md-2">
                        <table class="panel">
                            <tr class="trCompte">
                                <td>Login :</td>
                                <td><?= $user['login_user'] ?></td>
                            </tr>
                            <tr class="trCompte">
                                <td>Prénom:</td>
                                <td><?= $user['firstname_user'] ?></td>
                            </tr>
                            <tr class="trCompte">
                                <td>Nom:</td>
                                <td><?= $user['lastname_user'] ?></td>
                            </tr>
                            <tr class="trCompte">
                                <td>Email:</td>
                                <td><?= $user['email_user'] ?></td>
                            </tr>
                            <tr class="trCompte">
                                <td>Inscription</td>
                                <td><?= date('d-m-Y', strtotime($user['dateCreate_user'])); ?></td>
                            </tr>
                            <tr class="trCompte">
                                <td>Mise à jour</td>
                                <td><?= date('d-m-Y', strtotime($user['dateUpdate_user'])); ?></td>
                            </tr>
                            <tr class="trCompte">
                                <td>Rôle</td>
                                <td><?php if($user['role_user'] == 1) { echo "Admin"; } else { echo "Member"; }?></td>
                            </tr>
                            <tr class="trCompte">
                                <td>Statut</td>
                                <td><?php if($user['isActiveUser_user'] == 1 && $user['isActiveAdmin_user'] == 1) { echo "Actif"; } else { echo "Inactif"; } ?></td>
                            </tr>
                            <tr class="trCompte">
                                <td>Modifier</td>
                                <td><a class="linkManagement" href="<?= local ?>adminManagement/adminModifyUser/<?= $user['id_user'] ?>">Modifier</a></td>
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
                                <a class="font-weight-bold paginationLink" href="<?= local ?>adminManagement/adminListAllMembers/<?= $numPage - 1 ?>" class="page-link"><<</a>
                            </li>
                            </div>
                            <div class="col-md-2"> 
                            <?php for($page = 1; $page <= $pages; $page++){ ?>
                                <li class="page-item <?php if($numPage != $page){ echo "disabled"; } ?>">
                                    <a class="font-weight-bold paginationLink" href="<?= local ?>adminManagement/adminListAllMembers/<?= $page ?>" class="font-weight-bold link-page"><?= $page ?></a>
                                </li>
                            <?php
                            } ?>
                            </div>
                            <div class="col-md-3"> 
                            <li class="page-item <?php if($numPage == $pages) { echo "disabled"; } ?>">
                                <a class="font-weight-bold paginationLink" href="<?= local ?>adminManagement/adminListAllMembers/<?= $numPage + 1 ?>" class="page-link">>></a>
                            </li>
                        </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>