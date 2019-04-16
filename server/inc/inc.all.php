<?php
session_start();

/*
$_SESSION['idUser'] = 1;
$_SESSION['name'] = "Romain Peretti";
$_SESSION['connected'] = false;
*/

require_once '../database/database.php';

require_once 'constante.php';

require_once '../class/Advertisement.php';
require_once '../class/User.php';
require_once '../class/Rating.php';

require_once '../manager/advertisementManager.php';
require_once '../manager/userManager.php';
require_once '../manager/ratingManager.php';
