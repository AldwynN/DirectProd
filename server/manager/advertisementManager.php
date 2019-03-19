<?php
require_once '../inc/inc.all.php';

/* Titre : Manager de la classe "Advertisement"
 * Date : Mardi, 14.03.2019
 * Auteurs : Romain Peretti
 * Version : 1.0
 * Description : Manager comportant les différents fonctions en rapport avec la classe "Advertisement"
 */

class AdvertisementManager {

    public static function GetAdvertisements() {
        try {
            $req = Database::prepare("SELECT * FROM direct_prod.advertisements ORDER BY date DESC");
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, 'Advertisement');
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function GetAdvertisementById($idAdvertisement) {
        try {
            $req = Database::prepare("SELECT * FROM direct_prod.advertisements WHERE idAdvertisement = :idAd");
            $req->bindParam(":idAd", $idAdvertisement, PDO::PARAM_INT);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, 'Advertisement');
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function GetAdvertisementsByUserId($idUser) {
        try {
            $req = Database::prepare("SELECT * FROM direct_prod.advertisements WHERE idUser = :idUser");
            $req->bindParam(":idUser", $idUser, PDO::PARAM_INT);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, 'Advertisement');
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function CreateAdvertisement($title, $description, $organic, $valid, $date, $idUser) {
        $sqlCreateAd = "INSERT INTO `advertisements`(`title`, `description`, `organic`, `valid`, `date`, `idUser`)"
                . " VALUES (:title, :description, :organic, :valid, :date, :idUser)";
        try {
            $req = Database::prepare($sqlCreateAd);
            $req->bindParam(":title", $title, PDO::PARAM_STR);
            $req->bindParam(":description", $description, PDO::PARAM_STR);
            $req->bindParam(":organic", $organic, PDO::PARAM_BOOL);
            $req->bindParam(":valid", $valid, PDO::PARAM_BOOL);
            $req->bindParam(":date", $date, PDO::PARAM_STR);
            $req->bindParam(":idUser", $idUser, PDO::PARAM_INT);
            $req->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function UpdateAdvertisement($idAdvertisement, $title, $description, $organic, $valid, $date) {
        $sqlCreateAd = "UPDATE direct_prod.advertisements" 
                . " SET title = :title, description = :description, organic = :organic, valid = :valid, date = :date, idUser = :idUser WHERE idAdvertisement = :idAd)";
        try {
            $req = Database::prepare($sqlCreateAd);
            $req->bindParam(":title", $title, PDO::PARAM_STR);
            $req->bindParam(":description", $description, PDO::PARAM_STR);
            $req->bindParam(":organic", $organic, PDO::PARAM_BOOL);
            $req->bindParam(":valid", $valid, PDO::PARAM_BOOL);
            $req->bindParam(":date", $date, PDO::PARAM_STR);
            $req->bindParam(":idAd", $idAdvertisement, PDO::PARAM_INT);
            $req->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function DeleteAdvertisementById($idAdvertisement) {
        try {
            $req = Database::prepare("DELETE FROM direct_prod.advertisements WHERE idAdvertisement = :idAd");
            $req->bindParam(":idAd", $idAdvertisement, PDO::PARAM_INT);
            $req->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}