<?php

/* Titre : Classe "Rating"
 * Date : Mardi, 16.04.2019
 * Auteurs : Romain Peretti
 * Version : 1.0
 * Description : Création de la classe "Rating" et initialisation des principaux champs de cette classe
 */

class Rating
{
    /**
     * @brief	Le Constructor appelé au moment de la création de l'objet. Ie. new Rating();
     * @param InRating		Le ratio de l'annonce. (Optionel) Defaut ""
     * @param InComment	    Le commentaire laisser sous le commentaire. (Optionel) Defaut ""
     * @param InDate	    La date de création de l'annonce. (Optionel) Defaut ""
     * @param InIdUser	    L'id de l'utilisateur ayant mit un commentaire. (Optionel) Defaut ""
     * @param InIdAdvertisement	    L'id de l'annonce auquel le commentaire est assigné. (Optionel) Defaut ""
	  */
    public function __construct($InRating = "", $InComment = "", $InDate = "", $InIdUser = "", $InIdAdvertisement = "")
    {
        $this->rating = $InRating;
        $this->comment = $InComment;
        $this->date = $InDate;
        $this->idUser = $InIdUser;
        $this->idAdvertisement = $InIdAdvertisement;
    }

    /** @var int Le ratio de l'annonce sur 5 */
    public $rating;

    /** @var string Le commentaire de l'utilisateur */
    public $comment;

    /** @var int La date de création du commentaire */
    public $date;

    /** @var int L'id de l'utilisateur */
    public $idUser;

    /** @var int L'id de l'annonce */
    public $idAdvertisement;
}
