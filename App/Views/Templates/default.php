<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= App::getInstance()->title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">

</head>


<body class="text-white bg-secondary">
    <nav class="navbar navbar-expand-sm  navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="img/flavicon.png" alt="" width="30" height="24" class="ml-1 d-inline-block align-text-top rounded">
                Agorw.fr
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="text-white nav-item nav-link active" href="index.php">Home</a>
                    <?php if (!isset($_SESSION['auth'])) : ?>
                        <a class="text-white nav-item nav-link" href="index.php?p=user.login">Connexion</a>
                    <?php else : ?>
                        <a class="text-white nav-item nav-link" href="index.php?p=admin.category.index">Categories</a>
                        <a class="text-white nav-item nav-link" href="index.php?p=admin.posts.index">Articles</a>
                        <a class="text-white nav-item nav-link" href="index.php?p=user.deconnexion">deconnexion</a>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <?= $content; ?>
    </div>
<footer class="text-center bg-dark text-white">
Copyright Agorw.fr
</footer>
</body>

</html>