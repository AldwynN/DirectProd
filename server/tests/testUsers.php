<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/server/manager/userManager.php';

//Test sur la fonction GetUserDetailsById()
echo '<h2>Test 1 - GetUserDetailsById()</h2>';
// Récupération d'un utilisateur par son id
$u = UserManager::GetUserDetailsById(1);
if ($result === false) {
    echo 'Problème lors de la récupération par id';
}
if ($result === null) {
    echo 'L\'utilisateur est introuvable';
}
if ($u) {
    echo '<pre>';
    echo var_dump($u);
    echo '</pre>';
}

// Récupération d'un utilisateur qui n'existe pas
$u = UserManager::GetUserDetailsById(9999999);
if ($result === false) {
    echo 'Problème lors de la récupération par id';
}
if ($result === null) {
    echo 'L\'utilisateur est introuvable';
}
if ($u) {
    echo '<pre>';
    echo var_dump($u);
    echo '</pre>';
}

//Test sur la fonction GetUserDetailsByEmail()
echo '<h2>Test 2 - GetUserDetailsByEmail()</h2>';
// Récupération d'un utilisateur par son email
$u = UserManager::GetUserDetailsByEmail('romain.prtt@eduge.ch');
if ($result === false) {
    echo 'Problème lors de la récupération par id';
}
if ($result === null) {
    echo 'L\'utilisateur est introuvable';
}
if ($u) {
    echo '<pre>';
    echo var_dump($u);
    echo '</pre>';
}

// Récupération d'un utilisateur qui n'existe pas
$u = UserManager::GetUserDetailsByEmail('testing@test.com');
if ($result === false) {
    echo 'Problème lors de la récupération par id';
}
if ($result === null) {
    echo 'L\'utilisateur est introuvable';
}
if ($u) {
    echo '<pre>';
    echo var_dump($u);
    echo '</pre>';
}

//Test sur la fonction CreateUser()
echo '<h2>Test 3 - CreateUser()</h2>';
// Ajout d'un utilisateur
$u = new User(null, '1234', 'jeanPierre@outlook.com', 'Jean Pierre', 'Berne', 'Arni', '3507', '38, Arnistrasse', false, 'Peter ist ein netter Junge, der Tiere liebt', '1111');

$result = UserManager::CreateUser($u);
if($result === false){
    echo 'Problème d\'ajout d\'un utilisateur';
}
if($result === true){
    echo 'Création d\'un utilisateur réussi';
}
if($result === null){
    echo 'L\'utilisateur existe déjà';
}

// Un utilisateur existe déjà avec l'email spécifié
$u = new User(null, '1234', 'romain.prtt@eduge.ch', 'Jean Pierre', 'Berne', 'Arni', '3507', '38, Arnistrasse', false, 'Peter ist ein netter Junge, der Tiere liebt', '1111');

$result = UserManager::CreateUser($u);
if($result === false){
    echo 'Problème d\'ajout d\'un utilisateur';
}
if($result === true){
    echo 'Création d\'un utilisateur réussi';
}
if($result === null){
    echo 'L\'utilisateur existe déjà';
}

//Test sur la fonction UpdateUser()
echo '<h2>Test 4 - UpdateUser()</h2>';
// Modification d'un utilisateur
$u = new User(null, '5678', 'jeanPierre@outlook.com', 'Michel Jacki', 'Vaud', 'Aigle', '5401', '15, Chemin du Mont-Tendre', false, 'J\'aime la chasse au oeufs de Pâques' , '2222');
$result = UpdateUser($u);
if($result === false){
    echo 'Problème de mise à jour de l\'utilisateur "jeanPierre@outlook.com"';
}
if($result === true){
    echo 'Mise à jour de l\'utilisateur "jeanPierre@outlook.com" réussi';
}

//Test sur la fonction DeleteUser()
echo '<h2>Test 5 - DeleteUser()</h2>';

//--------------------------------------------------------------------------------------------
// Voir avec Gawen
//--------------------------------------------------------------------------------------------

//Test sur la fonction UserExist()
echo '<h2>Test 6 - UserExist()</h2>';
// Vérification qu'un utilisateur existe déjà avec l'email spécifié
$result = UserManager::UserExist('romain.prtt@eduge.ch');
if($result === false){
    echo 'Utilisateur introuvable ou erreur lors de la recherche en base';
}
if($result === true){
    echo 'Utilisateur trouvé avec l\'email "romain.prtt@eduge.ch"';
}

//Test sur la fonction Connection()
echo '<h2>Test 7 - Connection()</h2>';
// Connexion d'un utilisateur
$result = UserManager::Connection('romain.prtt@eduge.ch', '123');
if($result === false){
    echo 'Utilisateur introuvable ou erreur lors de la recherche en base';
}
if($result === null){
    echo 'L\'utilisateur n\'existe pas';
}
if($result === true){
    echo 'Utilisateur connecté avec l\'email "romain.prtt@eduge.ch"';
}

//Test sur la fonction Connection()
echo '<h2>Test 8 - Connection()</h2>';
// Connexion d'un utilisateur
$result = UserManager::Connection('romain.prtt@eduge.ch', '123');
if($result === false){
    echo 'Utilisateur introuvable ou erreur lors de la recherche en base';
}
if($result === null){
    echo 'L\'utilisateur n\'existe pas';
}
if($result === true){
    echo 'Utilisateur connecté avec l\'email "romain.prtt@eduge.ch"';
}