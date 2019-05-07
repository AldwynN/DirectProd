<?php

$idUser = filter_input(INPUT_GET, 'idUser', FILTER_VALIDATE_INT);

require_once $_SERVER['DOCUMENT_ROOT'] . '/DirectProd/server/inc/inc.all.php';

$user = UserManager::GetUserDetailsById($idUser);

if (isset($_POST['send'])) {
    $radio = filter_input(INPUT_POST, 'radio');
    if ($radio == "yes") {
        if (UserManager::DeleteUser($_SESSION['idUser'])) {
            header('Location: logout.php');
        } else {
            echo '<div class="alert alert-danger" role="alert">Message d\'erreur : "Erreur lors de la suppression du compte"</div>';
        }
    }
    echo '<div class="alert alert-info" role="alert">Message d\'information : "Annulation de la demande en attente de redirection"</div>';
    echo '<meta http-equiv="refresh" content="3;URL=index.php">';
}

include $_SERVER['DOCUMENT_ROOT'] . '/DirectProd/server/views/showDeleteProfil.php';
