<?php

require_once '../inc/inc.all.php';

$ads = AdvertisementManager::GetAdvertisementsUnvalidated();

include_once '../views/showAdmin.php';