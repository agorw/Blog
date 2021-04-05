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
        <h2 class="text-center mt-5 mb-0 black"><?= ucfirst($post->title); ?></h2>
        <p class="p-5 mt-0 border border-dark"><?= $post->content; ?></p>
    </div>

</div>