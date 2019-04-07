<?php

define('PASSWORD_NOT_EQUALS', 0);
define('PASSWORD_EQUALS', 1);
define('NEW_PASSWORD_EMPTY', 2);
define('CURRENT_PASSWORD_VERIFICATION_IS_FALSE', 3);

$errorState;

$idUser = (!isset($_GET['idUser']) && isset($idUser) ? $idUser : filter_input(INPUT_GET, 'idUser', FILTER_VALIDATE_INT));

require_once '../inc/inc.all.php';

$user = UserManager::GetUserDetailsById($idUser);

if (isset($_POST['send'])) {
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $finalPassword;
    if (sha1($password . $user[0]->salt) == $user[0]->password) {
        $newPassword = filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_STRING);
        $repeatNewPassword = filter_input(INPUT_POST, 'repeatNewPassword', FILTER_SANITIZE_STRING);

        if (isset($newPassword) && isset($repeatNewPassword)) {
            if ($newPassword == $repeatNewPassword) {
                $errorState = PASSWORD_EQUALS;
            } else {
                /* Error message : "New passwords are not the same" */
                $errorState = PASSWORD_NOT_EQUALS;
            }
        } else {
            //Password not change
            $errorState = NEW_PASSWORD_EMPTY;
        }

        switch ($errorState) {
            case PASSWORD_EQUALS:
                $finalPassword = $newPassword;
                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
                $canton = filter_input(INPUT_POST, 'canton', FILTER_SANITIZE_STRING);
                $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
                $postCode = filter_input(INPUT_POST, 'postCode', FILTER_SANITIZE_STRING);
                $streetAndNumber = filter_input(INPUT_POST, 'streetAndNumber', FILTER_SANITIZE_STRING);
                $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
                if (UserManager::UpdateUser($_SESSION['idUser'], $finalPassword, $name, $city, $canton, $postCode, $streetAndNumber, $description)) {
                    $redirection = "Location: profil.php?idUser=" . $_SESSION['idUser'];
                    header($redirection);
                } else {
                    /* Error message : "Fail to update profil" */
                    echo '<div class="alert alert-danger" role="alert">Message d\'erreur : "Erreur lors de la modification du compte"</div>';
                }
                break;
            case PASSWORD_NOT_EQUALS:
                echo '<div class="alert alert-danger" role="alert">Message d\'erreur : "Les mots de passe ne sont pas les mêmes"</div>';
                break;
            case NEW_PASSWORD_EMPTY:
                $finalPassword == $password;
                break;
            case CURRENT_PASSWORD_VERIFICATION_IS_FALSE:
                echo '<div class="alert alert-danger" role="alert">Message d\'erreur : "Mauvais mot de passe actuel"</div>';
                break;
            default:
                break;
        }
    }
}

include_once '../views/showEditProfil.php';
