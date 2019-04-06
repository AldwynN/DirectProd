<?php
require_once '../inc/inc.all.php';

//$r = filter_input(INPUT_POST, 'dropdownValue', FILTER_SANITIZE_NUMBER_INT);
        
$ads = AdvertisementManager::GetAdvertisements(/*intval($r)*/);

include_once '../views/showIndex.php';