<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS & JS -->
        <link href="../../css/bootstrap-4.2.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../../css/bootstrap-4.2.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Personnal CSS -->
        <link href="../../css/test.css" rel="stylesheet" type="text/css" />
        <title>Login</title>
    </head>
    <body>
        <?php include_once 'showNavigation.php'; ?>
        <div class='container'>
            <div class="d-flex justify-content-center testMarginVertical">
                <div class="media testPadding" style="width: 80%;">
                    <div class="media-body">
                        <form method="POST" action="../controllers/login.php">
                            <div class="form-group">
                                <label for="email" class="corps">Adresse email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Entrez un email valide">
                            </div>
                            <div class="form-group">
                                <label for="password" class="corps">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <small><a href="../controllers/signIn.php">Pas encore de compte ?</a></small>
                            </div>
                            <button type="submit" class="btn btn-primary" name="send">Connexion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html> 