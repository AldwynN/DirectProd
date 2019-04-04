<?php

require_once '../inc/inc.all.php';

if (isset($_POST['send'])) {
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $organic = filter_input(INPUT_POST, 'organic'); //Boolean
    $date = date("Y-m-d H:i:s");
    if (AdvertisementManager::CreateAdvertisement($title, $description, $organic, $date, $_SESSION['idUser'])) {
        header('Location: index.php');
    } else {
        echo '<h1>Error message : "Fail to insert advertisement"</h1>';
    }
}

include_once '../views/showCreateAd.php';
