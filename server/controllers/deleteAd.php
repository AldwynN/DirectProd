<?php

$idAd = filter_input(INPUT_GET, 'idAd', FILTER_VALIDATE_INT);

require_once $_SERVER['DOCUMENT_ROOT'] . '/DirectProd/server/inc/inc.all.php';

$ad =  AdvertisementManager::GetAdvertisementById($idAd);
$user = UserManager::GetUserDetailsById($ad[0]->idUser);

if (isset($_POST['send'])) {
    if ($_POST['radio'] == "yes") {
        if (AdvertisementManager::DeleteAdvertisementById($idAd)) {
            echo '<div class="alert alert-danger" role="alert">Message de confirmation : "Votre annonce a bien été supprimer". En attente de redirection</div>';
            if ($_SESSION['idUser'] == $ad[0]->idUser) {
                echo '<meta http-equiv="refresh" content="3;URL=index.php">';
            } else {
                $path = 'sendEmailForValidAd.php?idUser=' . $ad[0]->idUser . '&valid=0';
                echo '<meta http-equiv="refresh" content="3;URL=' . $path . '\'">';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Message d\'erreur : "Erreur lors de la suppression de l\'annonce"</div>';
        }
    }
}

include_once $_SERVER['DOCUMENT_ROOT'] . '/DirectProd/server/views/showDeleteAd.php';
