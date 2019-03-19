<!-- 
Cette page permet l'affichage de la barre de navigation 
avec les possibilitées de se connecter, se déconnecter et s'inscrire 
qui apparaissent ou disparaissent suivant si on est connecté ou pas.
-->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Direct Prod</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controllers/profil.php?idUser=">Profil</a>
                    </li>
                </ul>
                <?php if (empty($_SESSION['connected'])): ?>
                <span class="navbar-text testMarginHorizontal"><a href="#" class="btn btn-outline-primary">Sign Up</a></span>
                <span class="navbar-text testMarginHorizontal"><a href="#" class="btn btn-outline-primary">Login</a></span>
                <?php else :?>
                <span class="navbar-text testMarginHorizontal"><a href="#" class="btn btn-outline-danger">Logout</a></span>
                <span class="navbar-text">Bonjour <?php $_SESSION['userName'] ?></span>
                <?php endif;?>
            </div>
        </nav>