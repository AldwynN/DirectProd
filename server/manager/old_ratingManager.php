<?php

require_once '../inc/inc.all.php';

/* Titre : Manager de la classe "Rating"
 * Date : Mardi, 16.04.2019
 * Auteurs : Romain Peretti
 * Version : 1.0
 * Description : Manager comportant les différents fonctions en rapport avec la classe "Rating"
 */

class OldRatingManager
{

    public static function CreateRating($rating, $comment, $idUser, $idAd)
    {
        $date = date("Y-m-d H:i:s");
        try {
            $req = Database::prepare("INSERT INTO direct_prod.rate (rating, comment, `date`, idUser, idAdvertisement) VALUES (:rating, :comment, :date, :idUser, :idAd)");
            $req->bindParam(":rating", $rating, PDO::PARAM_INT);
            $req->bindParam(":comment", $comment, PDO::PARAM_INT);
            $req->bindParam(":date", $date, PDO::PARAM_STR);
            $req->bindParam(":idUser", $idUser, PDO::PARAM_INT);
            $req->bindParam(":idAd", $idAd, PDO::PARAM_INT);
            $req->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function GetCommentsOfAnAdById($idAdvertisement)
    {
        try {
            $req = Database::prepare("SELECT * FROM direct_prod.rate WHERE idAdvertisement = :idAd");
            $req->bindParam(":idAd", $idAdvertisement, PDO::PARAM_INT);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, 'Rating');
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
