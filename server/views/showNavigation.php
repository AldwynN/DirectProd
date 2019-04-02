<!-- 
Cette page permet l'affichage de la barre de navigation 
avec les possibilitées de se connecter, se déconnecter et s'inscrire 
qui apparaissent ou disparaissent suivant si on est connecté ou pas.
-->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../controllers/index.php">Direct Prod</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../controllers/index.php">Home</a>
            </li>
            <?php if (!isset($_SESSION)): ?>
            <li class="nav-item disabled"><a class="nav-link">Profil</a></li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="../controllers/profil.php?idUser=<?= $_SESSION['idUser'] ?>">Profil</a>
                </li>
            <?php endif; ?>
        </ul>
        <?php if (!isset($_SESSION['connected'])): ?>
            <span class="navbar-text testMarginHorizontal"><a href="../controllers/signIn.php" class="btn btn-outline-primary">Sign Up</a></span>
            <span class="navbar-text testMarginHorizontal"><a href="../controllers/login.php" class="btn btn-outline-primary">Login</a></span>
        <?php else : ?>
            <span class="navbar-text testMarginHorizontal"><a href="../controllers/logout.php" class="btn btn-outline-danger">Logout</a></span>
            <span class="navbar-text">Bonjour <?= $_SESSION['name'] ?></span>
        <?php endif; ?>
    </div>
</nav>