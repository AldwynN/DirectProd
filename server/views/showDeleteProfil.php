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
    <title>Suppression du compte</title>
</head>

<body>
    <?php include_once 'showNavigation.php'; ?>
    <div class='container'>
        <div class="d-flex justify-content-center testMarginVertical">
            <div class="media testPadding corps" style="width: 80%;">
                <div class="media-body">
                    <form method="POST" action="<?= $path = '../controllers/deleteProfil.php?idUser=' . $_SESSION['idUser'] ?>">
                        <fieldset class="form-group">
                            <legend class="col-form-label">Voulez vous vraiment supprimer votre compte (<?= $user[0]->email ?>)</legend>
                            <small><i>PS : Toutes vos annonces seront supprimer en même temps que votre compte</i></small>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radioYes" value="yes">
                                <label class="form-check-label" for="radioYes">Oui</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radioNo" value="no" checked>
                                <label class="form-check-label" for="radioNo">No</label>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary" name="send">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>