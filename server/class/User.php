<?php

/* Titre : Classe "User"
 * Date : Jeudi, 14.03.2019
 * Auteurs : Romain Peretti
 * Version : 1.0
 * Description : Création de la classe "User" et initialisation des principaux champs de cette classe
 */

class User {

    /** @var int L'id de l'utilisateur */
    public $idUser;

    /** @var string Le mot de passe de l'utilisateur */
    public $password;

    /** @var string L'email de l'utilisateur */
    public $email;

    /** @var string Le nom de l'utilisateur */
    public $name;

    /** @var string La ville de l'utilisateur */
    public $city;

    /** @var string Le canton de l'utilisateur */
    public $canton;

    /** @var string Le code postal de l'utilisateur */
    public $postCode;

    /** @var string La rue et le numéro de l'utilisateur */
    public $streetAndNumber;

    /** @var bool Si l'utilisateur est admin ou pas */
    public $admin;

    /** @var string La description de l'utilisateur */
    public $description;
    
    /** @var string Le salt utilisé pour le mdp de l'utilisateur */
    public $salt;

}
