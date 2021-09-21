<div class="limiter">
    <div class="container-table100">
        <div class="container col-10">
            <div class="row">
                <div class="col-12 my-4">
                    <a class="font-weight-bold retour-listArticles" href="<?= local ?>adminManagement">< Retour au panneau d'administration</a>
                </div>
            </div>
        </div>
    <div class="container pb-3">
        <div class="row">
            <div class=" col-12 text-center">
                <a class="btn btn-primary mb-3" href="<?= local ?>articles/createArticle">Ajouter un article</a>
            </div>
        </div>
    </div>
    <div class="wrap-table100">
            <div class="table100">
                <table>
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">Titre</th>
                            <th class="column3">Auteur</th>
                            <th class="column4">Création</th>
                            <th class="column5">Mise à jour</th>
                            <th class="column6">Visible</th>
                            <th class="column7">Visualiser</th>
                            <th class="column8">Modifier</th>
                            <th class="column9 columnEndArticle">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="column1">Blablabla</td>
                            <td class="column3">Toto</td>
                            <td class="column4">15/09/2021</td>
                            <td class="column5">---</td>
                            <td class="column6">Oui</td>
                            <td class="column7"><a href="<?= local ?>articles/readArticle/1">Afficher</a></td>
                            <td class="column8"><a href="<?= local ?>articles/modifyArticle">Modifier</a></td>
                            <td class="column9 columnEndArticle"><a href="<?= local ?>">Supprimer</a></td>
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
