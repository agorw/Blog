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
        <div class="m-5">
            <h1>Bienvenue sur Agorw.fr</h1>
            <p>Ce blog est destiné a publier ma penser personnel elle n'est pas a prendre pour agent content.</p>
        </div>
    </div>
</div>