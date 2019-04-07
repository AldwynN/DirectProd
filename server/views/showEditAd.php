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
        <title>Édition d'une annonce</title>
    </head>
    <body>
    <?php include_once 'showNavigation.php'; ?>
    <div class='container'>
        <div class="d-flex justify-content-center testMarginVertical">
            <div class="media testPadding" style="width: 80%;">
                <div class="media-body">
                    <form method="POST" action="../controllers/editAd.php">
                        <div class="form-group">
                            <label for="title" class="corps">Titre</label>
                            <input type="text" class="form-control" name="title" id="title" value="<?= $ad[0]->title ?>">
                        </div>
                        <div class="form-group">
                            <label for="description" class="corps">Description</label>
                            <textarea name="description" class="form-control" rows="5" cols="40" id="description"><?= $ad[0]->description ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="organic" id="organic" value="true" <?= ($ad[0]->organic == true ? "checked" : "") ?>>
                            <label for="organic" class="corps">Organic</label>
                        </div>
                        <button type="submit" class="btn btn-primary" name="send">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
