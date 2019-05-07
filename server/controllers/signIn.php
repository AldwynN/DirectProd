<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/DirectProd/server/inc/inc.all.php';

if (isset($_POST['send'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $repeatPassword = filter_input(INPUT_POST, 'repeatPassword', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $canton = filter_input(INPUT_POST, 'canton', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $postCode = filter_input(INPUT_POST, 'postCode', FILTER_SANITIZE_STRING);
    $streetAndNumber = filter_input(INPUT_POST, 'streetAndNumber', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

    if (!UserManager::GetUserDetailsByEmail($email)) {
        if ($password == $repeatPassword) {
            if (UserManager::CreateUser($password, $email, $name, $city, $canton, $postCode, $streetAndNumber, $description)) {
                header('Location: login.php');
            } else {
                /* Error message : "Fail to create account" */
                echo '<h1>Error message : "Fail to create account"</h1>';
            }
        } else {
            /* Error message : "Wrong repeated password" */
            echo '<h1>Error message : "Wrong repeated password"</h1>';
        }
    } else {
        /* Error message : "Email already taken" */
        echo '<h1>Error message : "Email already taken"</h1>';
    }
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/DirectProd/server/views/showSignIn.php';