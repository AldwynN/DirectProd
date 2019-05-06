<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DirectProd/server/inc/inc.all.php';

//$r = filter_input(INPUT_POST, 'dropdownValue', FILTER_SANITIZE_NUMBER_INT);
        
$ads = AdvertisementManager::GetAdvertisementsValidated(/*intval($r)*/);

include_once $_SERVER['DOCUMENT_ROOT'] . '/DirectProd/server/views/showIndex.php';