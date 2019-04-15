<?php

$idUser = filter_input(INPUT_GET, 'idUser', FILTER_VALIDATE_INT);


require_once '../inc/inc.all.php';

if (isset($idUser)) {
    $user = UserManager::GetUserDetailsById($idUser);
} else {
    //Error message : "idUser not found"
    echo '<h1>Error message : "idUser not found"</h1>';
    //redirection vers une page d'erreur
}

$userAds = AdvertisementManager::GetAdvertisementsByUserId($idUser);

include_once '../views/showProfil.php';
