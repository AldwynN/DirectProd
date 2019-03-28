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
        <title>Détails de l'annonce</title>
    </head>
    <body>
        <?php include_once 'showNavigation.php'; ?>
        <div class='container'>
            <div class="d-flex justify-content-center testMarginVertical">
                <div class="card" style="width: 75%;">
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-md-4'>
                                <img src="http://www.laboiteafromages37.com/photo/pagecontent/5/goat-image_0.jpg" style="width: 70%; height: 100%; object-fit: cover;" class="card-img-top" alt="">
                            </div>
                            <div class='col-md-6'>
                                <h5><?= $adDetails[0]->title ?></h5>
                                <h6><?= $userAd[0]->name ?>, le <?= $adDetails[0]->date ?></h6>
                                <h6><?= $userAd[0]->postCode ?>, <?= $userAd[0]->streetAndNumber ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-12'>
                        <p><?= $adDetails[0]->description ?></p>
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-center testMarginVertical">
                <div class='card'>
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-md-4'>
                                <form method="post">
                                    <label class="radio-inline"><input type="radio" name="optradio" >1</label>
                                    <label class="radio-inline"><input type="radio" name="optradio">2</label>
                                    <label class="radio-inline"><input type="radio" name="optradio">3</label>
                                    <label class="radio-inline"><input type="radio" name="optradio">4</label>
                                    <label class="radio-inline"><input type="radio" name="optradio">5</label>
                                    <input type="submit" value="Noter l'annonce"
                                </form>
                            </div>
                            <div class='col-md-8'>
                                <form method="post">
                                    <table>
                                        <thead>Vous pouvez poster un commentaire</thead>
                                        <tr>
                                            <td><textarea cols='40' rows='5' name='comment' required></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><input type='submit' value='Poster le commentaire'></td>
                                        </tr>
                                    </table>
                                </form>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>