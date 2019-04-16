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
    <title>Détails de l'annonce</title>
</head>

<body>
    <div class='container col-md-12 col-sm-12'>
        <div class="row">
            <div class="col-md-12 pl-0 pr-0 col-sm-12">
                <?php include 'showNavigation.php'; ?>
            </div>
        </div>
        <div class="row justify-content-center" style='color: white;'>
            <div class='col-md-8 border'>
                <div class='row justify-content-end'>
                    <a href='../controllers/editAd.php?idAd=<?= $adDetails[0]->idAdvertisement ?>' class='btn btn-info'>M</a>
                    <a href='../controllers/deleteAd.php?idAd=<?= $adDetails[0]->idAdvertisement ?>' class='btn btn-danger'>S</a>
                </div>
                <div class='row'>
                    <div class='col-md-5 col-sm-6'>
                        <img src="http://calgarypma.ca/wp-content/uploads/2018/01/default-thumbnail.jpg" style="width: 15rem; height: 15rem;" class="img-fluid" alt="">
                    </div>
                    <div class='col-md-7 col-sm-6'>
                        <h4><?= $adDetails[0]->title ?></h4>
                        <h6><?= $userAd[0]->name ?>, le <?= $adDetails[0]->date ?></h6>
                        <h6>Code postal : <?= $userAd[0]->postCode ?>, N° et rue : <?= $userAd[0]->streetAndNumber ?></h6>
                    </div>
                </div>
                <div class='row'>
                    <p class='text-justify'><?= $adDetails[0]->description ?></p>
                </div>
            </div>
        </div>
        <div class='row justify-content-center'>

            <?php
            $cpt = 0;
            foreach ($adRating as $rate) :
                $detailUserRating = UserManager::GetUserDetailsById($rate->idUser);
                $cpt++;

                if ($cpt % 2 == 1) : ?>
                    <div class='row col-md-12 justify-content-center'>
                    <?php endif; ?>
                    <div class='col-md-4 border' style='color:white;'>
                        <h6><?= $detailUserRating[0]->name ?></h6>
                        <p><?= $rate->comment ?></p>
                        <p>Le <?= $rate->date ?></p>
                    </div>

                    <?php if ($cpt % 2 == 0) : ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="d-flex justify-content-center testMarginVertical">
            <div class='card'>
                <form method="post" action='#'>
                    <div class='row justify-content-center'>
                        <div class='col-md-4'>
                            <ul class='list-group list-group-flush'>
                                <li class='list-group-item'><input type="radio" name="optradio" checked='checked' value='1'>1</li>
                                <li class='list-group-item'><input type="radio" name="optradio" value='2'>2</li>
                                <li class='list-group-item'><input type="radio" name="optradio" value='3'>3</li>
                                <li class='list-group-item'><input type="radio" name="optradio" value='4'>4</li>
                                <li class='list-group-item'><input type="radio" name="optradio" value='5'>5</li>
                            </ul>
                        </div>
                        <div class='col-md-8'>
                            <h6>Vous pouvez poster un commentaire</h6>
                            <textarea cols='40' rows='7' name='comment' required style='resize:none'></textarea>
                        </div>
                        <div class='col-md-12 '>
                            <input type='submit' name='send' value='Poster le commentaire et le classement' class='btn btn-primary'>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>