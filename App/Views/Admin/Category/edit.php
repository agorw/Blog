<?php if ($reponse) : ?>
    <div class="alert alert-success alert-dismissible fade show">
        La categorie a bien ete editer
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<form method="POST">
    <?= $form->input('name_cat', 'Categorie'); ?>
    <?= $form->submit('Sauvegarder'); ?>
</form>