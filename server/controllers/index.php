<?php

require_once 'manager/advertisementManager.php';
require_once 'manager/userManager.php';

$ads = AdvertisementManager::GetAdvertisements();

include '../views/showAdTable.php';