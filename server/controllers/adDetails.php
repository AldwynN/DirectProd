<?php

$idAd = filter_input(INPUT_GET, 'idAd', FILTER_VALIDATE_INT);

require_once '../inc/inc.all.php';

$adDetails = AdvertisementManager::GetAdvertisementById($idAd);
$userAd = UserManager::GetUserDetailsById($adDetails[0]->idUser);


include_once '../views/showAdDetails.php';