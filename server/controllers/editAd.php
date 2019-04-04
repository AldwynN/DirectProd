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
        header('Location: index.php');
    }else{
        echo '<h1>Error message : "Fail to update your advertisement"</h1>';
    }
}

include_once '../views/showEditAd.php';
