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
    <div class="col-sm-10">
        <h1><?= $categorie->name_cat; ?></h1>
        <?php foreach ($posts as $value) : ?>
            <div class="card mb-2">
                <div class="card-body bg-dark">
                    <h5 class="card-title"><?= ucfirst($value->title); ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $value->name_cat; ?></h6>
                    <p class="card-text"><?= $value->extrait; ?> </p>
                    <a href="<?= $value->url; ?>" class="card-link">Lire la suite ...</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>