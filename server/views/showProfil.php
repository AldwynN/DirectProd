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
    <title>Profil</title>
</head>

<body>
    <div class='container col-md-12 col-sm-12'>
        <div class="row">
            <div class="col-md-12 pl-0 pr-0 col-sm-12">
                <?php include 'showNavigation.php'; ?>
            </div>
        </div>
        <div class='row justify-content-center testMarginVertical'>
            <div class='col-md-8'>
                <div class='card'>
                    <img class="mx-auto d-block" src="https://www.w3schools.com/bootstrap/img_avatar1.png" alt="Card image cap" style='width: 15rem; height: 15rem;'>

                    <div class="card-body">
                        <h4 class="card-title"><?= $user[0]->name ?></h4>
                        <h6 class='card-text'><?= $user[0]->email ?></h6>
                        <p class="card-text"><?= $user[0]->description ?></p>
                        <div class='row'>
                            <div class='col-md-6'>
                                <p class="card-text">Ville : <?= $user[0]->city ?></p>
                                <p class="card-text">Canton : <?= $user[0]->canton ?></p>
                            </div>
                            <div class='col-md-6'>
                                <p class="card-text">Code postal : <?= $user[0]->postCode ?></p>
                                <p class="card-text">N° et rue : <?= $user[0]->streetAndNumber ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $cpt = 0;
        foreach ($userAds as $ad) :
            $cpt++; ?>

            <?php if ($cpt % 2 == 1) : ?>
                <div class='row justify-content-center testMarginVertical'>
                <?php endif; ?>
                <div class="col-md-4 col-sm-12 col-12">
                    <div class="card" style='height: 100%'>
                        <div class="card-body">
                            <h5 class="card-title"><?= $ad->title ?></h5>
                            <p class="card-text text-justify"><?= $ad->description ?></p>
                            <div class="row justify-content-end">
                                <a href="../controllers/adDetails.php?idAd=<?= $ad->idAdvertisement ?>" class="btn btn-outline-info testMarginHorizontal testMarginVertical">Détails</a>
                                <a href="../controllers/deleteAd.php?idAd=<?= $ad->idAdvertisement ?>" class="btn btn-outline-danger testMarginHorizontal testMarginVertical">Supprimer</a>
                                <a href="../controllers/editAd.php?idAd=<?= $ad->idAdvertisement ?>" class="btn btn-outline-warning testMarginHorizontal testMarginVertical">Modifier</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($cpt % 2 == 0) : ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</body>

</html>