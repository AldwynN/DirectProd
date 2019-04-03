<?php

require_once '../inc/inc.all.php';

// Nécessaire lorsqu'on retourne du json
header('Content-Type: application/json');

if (isset($_POST['idAdvertisement'])) {
    if (AdvertisementManager::UpdateValidatedAdvertisement(intval($_POST['idAdvertisement'])) === false) {
        echo '{ "Message": "Erreur de modification de la validité de l\'annonce"}';
        exit();
     }
     echo '{ "Message": "Modification de la validité de l\'annonce effectuée"}';
    exit();
}
