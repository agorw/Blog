<div class="row">
    <h1>Administration</h1>
    <div class="col-sm-8">
        <p>
            <a href="?p=admin.category.add" class="btn btn-success">Ajouter</a>
        </p>
        <table class="table">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>categorie</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Category as $categorie) : ?>
                    <tr>
                        <td><?= $categorie->categories_id; ?></td>
                        <td><?= $categorie->name_cat; ?></td>
                        <td>
                            <a class="btn btn-primary" href="?p=admin.category.edit&id=<?= $categorie->categories_id; ?>">editer</a>
                            <form class="inline-block" action="?p=admin.category.delete" method="post">
                                 <input type="hidden" name="id" value="<?= $categorie->categories_id; ?>"">
                                 <button class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>