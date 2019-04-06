<?php

require_once '../inc/inc.all.php';

if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
    header('Location: index.php');
 }

$ads = AdvertisementManager::GetAdvertisementsUnvalidated();

include_once '../views/showAdmin.php';
