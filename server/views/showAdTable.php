<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php include_once 'views/showNavigation'; ?>
        <!-- Media global -->
        <?php foreach ($ads as $ad) : $user = UserManager::GetUserDetailsById($ad['idUser']); ?>
       
        <div class="media testMarginHorizontal testMarginVertical testPadding">
            <!-- Image profil -->
            <div class="media-left">
                <img src="https://www.w3schools.com/bootstrap/img_avatar1.png" class="media-object img-fluid" style="width:80px">
                <h6 class="NameUser"><?= $user['name'] ?></h6>
            </div>
            <!-- Contenu -->
            <div class="media-body">
                <h4 class="media-heading title">Media Top</h4>
                <p class="corps">
                    <?= $ad['description'] ?>
                </p>
                <img src="https://c.pxhere.com/photos/88/3a/goat_animal_mammals_farm_animal_world_wildlife_photography_black_and_white_tooth-717480.jpg!d" class="media-object" style="width:300px">

                <!-- Boutons -->
                <div class="d-flex flex-row-reverse">
                    <button type="button" class="btn btn-outline-info testMarginHorizontal">Détails</button>
                    <button type="button" class="btn btn-outline-danger testMarginHorizontal">Supprimer</button>
                    <button type="button" class="btn btn-outline-warning testMarginHorizontal">Modifier</button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </body>
</html>
