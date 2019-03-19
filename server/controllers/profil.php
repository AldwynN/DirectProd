<?php

$idUser = filter_input(INPUT_GET, 'idUser', FILTER_VALIDATE_INT);

require_once '../inc/inc.all.php';

$userDetails = UserManager::GetUserDetailsById($idUser);

include_once '../views/showProfil.php';
