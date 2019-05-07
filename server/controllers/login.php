<?php

require_once "../inc/inc.all.php";

if (isset($_POST['send'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    if (UserManager::Connection($email, $password)) {
        $userConnected = UserManager::GetUserDetailsByEmail($email);
        $_SESSION['connected'] = true;
        $_SESSION['name'] = $userConnected[0]->name;
        $_SESSION['idUser'] = $userConnected[0]->idUser;
        $_SESSION['admin'] = $userConnected[0]->admin;
        header('Location: index.php');
    }else{
        //Error message : "Wrong email or password"
        echo '<h1>Error message : "Wrong email or password"</h1>';
    }
}

include_once "../views/showLogin.php";