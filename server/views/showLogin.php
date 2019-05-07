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
    <link href="../../css/personnal.css" rel="stylesheet" type="text/css" />
    <title>Login</title>
</head>

<body>
    <div class='container col-md-12 col-sm-12'>
        <div class="row">
            <div class="col-md-12 pl-0 pr-0 col-sm-12">
                <?php include 'showNavigation.php'; ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action='<?=$_SERVER['DOCUMENT_ROOT']?>/DirectProd/server/controllers/login.php'>
                    <div class="form-group">
                        <label for="email" class="corps">Adresse email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Entrez un email valide">
                    </div>
                    <div class="form-group">
                        <label for="password" class="corps">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <small><a href='<?=$_SERVER['DOCUMENT_ROOT']?>/DirectProd/server/controllers/signIn.php'>Pas encore de compte ?</a></small>
                    </div>
                    <button type="submit" class="btn btn-primary" name="send">Connexion</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>