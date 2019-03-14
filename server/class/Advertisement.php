<?php

/* Titre : Classe "Advertisement"
 * Date : Jeudi, 14.03.2019
 * Auteurs : Romain Peretti
 * Version : 1.0
 * Description : Création de la classe "Advertisement" et initialisation des principaux champs de cette classe
 */

class Advertisement {

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
