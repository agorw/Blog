<div class="row">
    <h1>Administration</h1>
    <div class="col-sm-8">
        <p>
            <a href="?p=admin.posts.add" class="btn btn-success">Ajouter</a>
        </p>
        <table class="table">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Titre</td>
                    <td>Action</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post) : ?>
                    <tr>
                        <td><?= $post->id; ?></td>
                        <td><?= $post->title; ?></td>
                        <td>
                            <a class="btn btn-primary" href="?p=admin.posts.edit&id=<?= $post->id; ?>">editer</a>
                            <form class="inline" action="?p=admin.posts.delete" method="post">
                                 <input type="hidden" name="id" value="<?= $post->id; ?>"">
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