<?php
require_once '../inc/inc.all.php';

$ads = AdvertisementManager::GetAdvertisements();

include_once '../views/showAdTable.php';