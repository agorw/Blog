<div class="row">
    <div id="menu" class="col-sm-2 bg-dark">
        <div class="card bg-dark">
            <img class="card-img-top mx-5 mt-2 rounded-circle" style="width:130px" src="img/flavicon.png" alt="Avatar">
            <div class="card-body text-center">
                <a href="#">Profil</a>
            </div>
        </div>
        <ul>

            <?php foreach ($categories as $cat) : ?>
                <li><a href="<?= $cat->url; ?>"><?= $cat->name_cat; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="col-3 p-3 m-5">

        <?php
        if (!$errors) :
        ?>
            <div class="alert alert-danger alert-dismissible fade show">
                Login and Password is incorrect!!!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        endif;
        ?>

        <form method="POST">
            <?= $form->input('username', 'Login'); ?>
            <?= $form->input('password', 'mots de passe', ['type' => 'password']); ?>

            <?= $form->submit('Connexion'); ?>
        </form>
    </div>
</div>