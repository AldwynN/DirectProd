<?php

$idUser = filter_input(INPUT_GET, 'idUser', FILTER_VALIDATE_INT);


require_once '../inc/inc.all.php';

if (isset($idUser)) {
    $userDetails = UserManager::GetUserDetailsById($idUser);
} else {
    $userDetails = UserManager::GetUserDetailsById(1);
}

//$userDetails = UserManager::GetUserDetailsById($idUser);

include_once '../views/showProfil.php';
