<?php

/* Titre : Classe "User"
 * Date : Jeudi, 14.03.2019
 * Auteurs : Romain Peretti
 * Version : 1.0
 * Description : Création de la classe "User" et initialisation des principaux champs de cette classe
 */

class User
{

    /**
     * @brief	Le Constructor appelé au moment de la création de l'objet. Ie. new User();
     * @param InPassword		Le mot de passe de l'utilisateur. (Optionel) Defaut ""
     * @param InEmail	L'email de l'utilisateur. (Optionel) Defaut ""
     * @param InName	    Le nom complet de l'utilisateur. (Optionel) Defaut ""
     * @param InCity	    La ville de l'utilisateur. (Optionel) Defaut ""
     * @param InCanton	    Le canton de l'utilisateur. (Optionel) Defaut ""
     * @param InPostCode	    Le code postal de l'utilisateur. (Optionel) Defaut ""
     * @param InStreetAndNumber	    Le numéro et le nom de la rue de l'utilisateur. (Optionel) Defaut ""
     * @param InAdmin	    Un boolean pour savoir si l'utilisateur est admin. (Optionel) Defaut ""
     * @param InDescription	    La description de l'utilisateur. (Optionel) Defaut ""
     * @param InSalt	    Le salt du mot de passe de l'utilisateur. (Optionel) Defaut ""
	  */
    public function __construct($InIdUser = "", $InPassword = "", $InEmail = "", $InName = "", $InCity = "", $InCanton = "", $InPostCode = "", $InStreetAndNumber = "", $InAdmin = "", $InDescription = "", $InSalt = "")
    {
        $this->idUser = $InIdUser;
        $this->password = $InPassword;
        $this->email = $InEmail;
        $this->name = $InName;
        $this->city = $InCity;
        $this->canton = $InCanton;
        $this->postCode = $InPostCode;
        $this->streetAndNumber = $InStreetAndNumber;
        $this->admin = $InAdmin;
        $this->description = $InDescription;
        $this->salt = $InSalt;
    }

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
