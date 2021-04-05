<?php if (!$reponse) : ?>
    <div class="alert alert-success alert-dismissible fade show">
        success
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<form method="POST">
    <?= $form->input('title', 'Titre'); ?>
    <?= $form->input('content', 'Contenu', ['type' => 'textarea']); ?>
    <?= $form->select('categories_id', 'Categories', $categories); ?>

    <?= $form->submit('Sauvegarder'); ?>
</form>