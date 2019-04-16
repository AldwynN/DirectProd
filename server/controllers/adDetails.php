<?php

$idAd = filter_input(INPUT_GET, 'idAd', FILTER_VALIDATE_INT);

require_once '../inc/inc.all.php';

$adDetails = AdvertisementManager::GetAdvertisementById($idAd);
$userAd = UserManager::GetUserDetailsById($adDetails[0]->idUser);
$adRating = RatingManager::GetCommentsOfAnAdById($idAd);

if (isset($_POST['send'])) {
    $rating = filter_input(INPUT_POST, 'optradio', FILTER_SANITIZE_STRING);
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
    if (RatingManager::CreateRating($rating, $comment, $_SESSION['idUser'], $idAd)) { 
        echo '<div class="alert alert-success" role="alert">Message de confirmation : "Commentaire et classement ajouter"</div>';
    } else { 
        echo '<div class="alert alert-danger" role="alert">Message d\'erreur : "Erreur lors de l\'ajout du commentaire"</div>';
    }
}

include_once '../views/showAdDetails.php';
