<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/DirectProd/server/inc/inc.all.php';

if (!isset($_SESSION['admin']) || $_SESSION['admin'] != 1) {
    header('Location: index.php');
 }

$ads = AdvertisementManager::GetAdvertisementsUnvalidated();

include_once $_SERVER['DOCUMENT_ROOT'] . '/DirectProd/server/views/showAdmin.php';
