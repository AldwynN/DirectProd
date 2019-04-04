<?php

$idAd = filter_input(INPUT_GET, 'idAd', FILTER_VALIDATE_INT);

require_once '../inc/inc.all.php';

$ad =  AdvertisementManager::GetAdvertisementById($idAd);
$user = UserManager::GetUserDetailsById($ad[0]->idAdvertisement);

if(isset($_POST['send'])){

    if (AdvertisementManager::DeleteAdvertisementById($idAd)){
        header('Location: index.php');
    }else{
        echo '<h1>Error message : "Fail to delete advertisement"</h1>';
    }
}

include_once '../views/showDeleteAd.php';