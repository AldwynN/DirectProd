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
        <title>Annonces</title>
    </head>
    <body>
        <?php include 'showNavigation.php'; ?>
        <div class="container" style="width: 85%;">
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label for="inputState"><b>Moyen de tri</b></label>
                        <select id="inputState" class="form-control">
                            <option value='0' selected>Date (récente)</option>
                            <option value='1'>Date (vieille)</option>
                            <option value='2'>Ville</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="addAd"><b>Ajouter une annonce</b></label>
                        <?php if (isset($_SESSION["connected"])): ?>
                            <a href="../controllers/createAd.php"><input type="button" class="btn btn-outline-success form-control" id="addAd" value="+"></a>
                        <?php else : ?>
                            <input type="button" class="btn btn-outline-success form-control disabled" id="addAd" value="+">
                        <?php endif; ?>
                    </div>
                </div>
            </form>
            <!-- Media global -->
            <?php
            foreach ($ads as $ad):
                $user = UserManager::GetUserDetailsById($ad->idUser);
                ?>

                <div class="media testMarginHorizontal testMarginVertical testPadding">
                    <!-- Image profil -->
                    <div class="media-left">
                        <img src="https://www.w3schools.com/bootstrap/img_avatar1.png" class="media-object img-fluid" style="width:80px">
                        <h6 class="NameUser"><a href="../controllers/profil.php?idUser=<?= $user[0]->idUser ?>"><?= $user[0]->name ?></a></h6>
                    </div>
                    <!-- Contenu -->
                    <div class="media-body">
                        <h4 class="media-heading title">Media Top</h4>
                        <p class="corps"><?= $ad->description ?></p>
                        <img src="https://c.pxhere.com/photos/88/3a/goat_animal_mammals_farm_animal_world_wildlife_photography_black_and_white_tooth-717480.jpg!d" class="media-object" style="width:300px">
                        <!-- Boutons -->
                        <div class="d-flex flex-row-reverse">
                            <a href="../controllers/adDetails.php?idAd=<?= $ad->idAdvertisement ?>"><button type="button" class="btn btn-outline-info testMarginHorizontal">Détails</button></a>
                            <?php if ($ad->idUser == $_SESSION['idUser']): ?>
                                <a href="../controllers/deleteAd.php?idAd=<?= $ad->idAdvertisement ?>"><button type="button" class="btn btn-outline-danger testMarginHorizontal">Supprimer</button></a>
                                <a href="../controllers/editAd.php?idAd=<?= $ad->idAdvertisement ?>"><button type="button" class="btn btn-outline-warning testMarginHorizontal">Modifier</button></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
    <script>
        $(document).ready(function () {
            $('#inputState').change(function () {
                var selectedValue = $(this).val();
                $.ajax({
                    type: "POST",
                    data: {dropdownValue: selectedValue},
                    url: "../controllers/index.php",
                    dataType: "json",
                });//End ajax
            });
        });
    </script>
</html>