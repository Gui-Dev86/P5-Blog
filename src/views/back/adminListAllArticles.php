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
                         <!----- foreach article in articles--->
                        <tr>
                            <td class="column1">Blablabla</td>
                            <td class="column3">Toto</td>
                            <td class="column4">15/09/2021</td>
                            <td class="column5">---</td>
                            <td class="column6">Oui</td>
                            <td class="column7"><a class="linkManagement" href="<?= local ?>articles/readArticle/1">Afficher</a></td>
                            <td class="column8 columnEnd"><a class="linkManagement" href="<?= local ?>articles/modifyArticle">Modifier</a></td>
                        </tr>
                        <!---endforeach--->
                    </tbody>
                </table>
            </div>
            <!----- foreach article in articles--->
            <div class="container tabMobile col-12 col-md-10 mb-3">
                <div class="row justify-content-center">
                    <div class="container col-12 col-md-8 offset-md-2">
                        <table class="panel">
                            <tr class="trCompte">
                                <td>Titre :</td>
                                <td>Blablabla</td>
                            </tr>
                            <tr class="trCompte">
                                <td>Auteur:</td>
                                <td>Toto</td>
                            </tr>
                            <tr class="trCompte">
                                <td>Création</td>
                                <td>15/09/2021</td>
                            </tr>
                            <tr class="trCompte">
                                <td>Mise à jour</td>
                                <td>---</td>
                            </tr>
                            <tr class="trCompte">
                                <td>Visible</td>
                                <td>Oui</td>
                            </tr>
                            <tr class="trCompte">
                                <td>Visualiser</td>
                                <td><a class="linkManagement" href="<?= local ?>articles/readArticle/1">Afficher</a></td>
                            </tr>
                            <tr class="trCompte">
                                <td>Modifier</td>
                                <td><a class="linkManagement" href="<?= local ?>articles/modifyArticle">Modifier</a></td>
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
