<?php

/* Titre : Classe "Advertisement"
 * Date : Jeudi, 14.03.2019
 * Auteurs : Romain Peretti
 * Version : 1.0
 * Description : Création de la classe "Advertisement" et initialisation des principaux champs de cette classe
 */

class Advertisement
{

    /**
     * @brief	Le Constructor appelé au moment de la création de l'objet. Ie. new Advertisement();
     * @param InIdAdvertisement		L'id de l'annonce. (Optionel) Defaut ""
     * @param InTitle	    Le Titre de l'annonce. (Optionel) Defaut ""
     * @param InDescription	    La description de l'annonce. (Optionel) Defaut ""
     * @param InOrganic	    Un boolean définissant si l'annonce est organique ou non. (Optionel) Defaut ""
     * @param InValid	    Un boolean définissant si l'annonce est validé par l'admin. (Optionel) Defaut ""
     * @param InDate	    La date de l'annonce. (Optionel) Defaut ""
     * @param InIdUser	    L'id de l'utilisateur auquel l'annonce est assigné. (Optionel) Defaut ""
	  */
    public function __construct($InIdAdvertisement = "", $InTitle = "", $InDescription = "", $InOrganic = "", $InValid = "", $InDate = "", $InIdUser = "")
    { 
        $this->idAdvertisement = $InIdAdvertisement;
        $this->title = $InTitle;
        $this->description = $InDescription;
        $this->organic = $InOrganic;
        $this->valid = $InValid;
        $this->date = $InDate;
        $this->idUser = $InIdUser;
    }

    /** @var int L'id de l'annonce */
    public $idAdvertisement;

    /** @var string Le titre de l'annonce*/
    public $title;

    /** @var string La description de l'annonce*/
    public $description;

    /** @var bool Si l'annonce est organique ou pas*/
    public $organic;

    /** @var bool Si l'annonce est toujours valide*/
    public $valid;

    /** @var string La date de l'annonce*/
    public $date;

    /** @var int L'id de l'utilisateur ayant créé l'annonce*/
    public $idUser;
}
