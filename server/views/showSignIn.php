<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS & JS -->
        <link href="../../css/bootstrap-4.2.1-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../../css/bootstrap-4.2.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Personnal CSS -->
        <link href="../../css/test.css" rel="stylesheet" type="text/css"/>
        <title>Inscription</title>
    </head>
    <body>
        <?php include_once 'showNavigation.php'; ?>
        <div class='container'>
            <div class="d-flex justify-content-center testMarginVertical">
                <div class="media testPadding" style="width: 80%;">
                    <div class="media-body">
                        <form method="POST" action="../controllers/signIn.php">
                            <div class="form-group">
                                <label for="email" class="corps">Adresse email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Entrez un email valide">
                            </div>
                            <div class="form-group">
                                <label for="password" class="corps">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <label for="repeatPassword" class="corps">Confirmer le mot de passe</label>
                                <input type="password" class="form-control" name="repeatPassword" id="repeatPassword">
                            </div>
                            <div class="form-group">
                                <label for="name" class="corps">Nom</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Romain">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="canton" class="corps">Canton</label>
                                        <input type="text" class="form-control" name="canton" id="canton" placeholder="Vaud">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="city" class="corps">Ville</label>
                                        <input type="text" class="form-control" name="city" id="city" placeholder="Lausanne">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="postCode" class="corps">Code postal</label>
                                        <input type="text" class="form-control" name="postCode" id="postCode" placeholder="1007">
                                    </div>
                                    <div class="col-md-9">
                                        <label for="streetAndNumber" class="corps">Rue et numéro</label>
                                        <input type="text" class="form-control" name="streetAndNumber" id="streetAndNumber" placeholder="14 Rue Jean-Dujardin">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="corps">Description</label>
                                <textarea name="description" class="form-control" rows="5" cols="40" id="description"></textarea>
                            </div>
                            <div class="form-group">
                                <small><a href="../controllers/login.php">Déjà un compte ?</a></small>
                            </div>
                            <button type="submit" class="btn btn-primary" name="send">Inscription</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
