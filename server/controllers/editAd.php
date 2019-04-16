<?php

$idAd = filter_input(INPUT_GET, 'idAd', FILTER_VALIDATE_INT);

require_once '../inc/inc.all.php';

$ad = AdvertisementManager::GetAdvertisementById($idAd);

if (isset($_POST['send'])) {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $organic = filter_input(INPUT_POST, 'organic', FILTER_SANITIZE_STRING);
    $date = date('Y-m-d H:i:s');
    if (AdvertisementManager::UpdateAdvertisement($idAd, $title, $description, $organic, $date)) {
        echo '<div class="alert alert-success" role="alert">Message de confirmation : "Annonce bien modifié, en attente de redirection"</div>';
        echo '<meta http-equiv="refresh" content="3;URL=index.php">';
    }else{
        echo '<div class="alert alert-danger" role="alert">Message d\'erreur : "Erreur lors de la modification de l\'annonce"</div>';
    }
}

include_once '../views/showEditAd.php';
