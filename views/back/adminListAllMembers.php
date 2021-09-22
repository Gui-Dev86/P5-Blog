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
                            <th class="column2">Email</th>
                            <th class="column3">Inscription</th>
                            <th class="column4">Rôle</th>
                            <th class="column5">Statut</th>
                            <th class="column6 columnEnd">Modifier</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!----- foreach comment in comments--->
                        <tr>
                            <td class="column1">Toto</td>
                            <td class="column2">tata@ootlook.fr</td>
                            <td class="column3">15/09/2021</td>
                            <td class="column4">Admin</td>
                            <td class="column5">Actif</td>
                            <td class="column6 columnEnd"><a class="linkManagement" href="<?= local ?>adminManagement/adminModifyUser">Modifier</a></td>
                        </tr>
                        <!---endforeach--->
                    </tbody>
                </table>
            </div>
            <!----- foreach article in articles--->
            <div class="container tabMobile col-12 col-md-10">
                <div class="row justify-content-center">
                    <div class="container col-12 col-md-8 offset-md-2">
                        <table class="panel">
                            <tr class="trCompte">
                                <td>Login :</td>
                                <td>Toto</td>
                            </tr>
                            <tr class="trCompte">
                                <td>Email:</td>
                                <td>tata@ootlook.fr</td>
                            </tr>
                            <tr class="trCompte">
                                <td>Inscription</td>
                                <td>15/09/2021</td>
                            </tr>
                            <tr class="trCompte">
                                <td>Rôle</td>
                                <td>Admin</td>
                            </tr>
                            <tr class="trCompte">
                                <td>Statut</td>
                                <td>Actif</td>
                            </tr>
                            <tr class="trCompte">
                                <td>Modifier</td>
                                <td><a class="linkManagement" href="<?= local ?>adminManagement/adminModifyUser">Modifier</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!---endforeach--->
            <div class="container col-12 my-2">
                <div class="row">   
                    <div class="col-8 offset-2 col-md-4 offset-md-4 text-center">
                        <a class="font-weight-bold paginationLink" href="<?= local ?>articles" class="font-weight-bold link-page">1</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>