<?php

require_once '../inc/inc.all.php';

/* Titre : Manager de la classe "Advertisement"
 * Date : Mardi, 14.03.2019
 * Auteurs : Romain Peretti
 * Version : 1.0
 * Description : Manager comportant les différents fonctions en rapport avec la classe "Advertisement"
 */

class AdvertisementManager
{

    public static function GetAdvertisements($triage = null)
    {
        $sqlRequest = "SELECT * FROM advertisements";
        switch ($triage) {
            case DESC:
                $sqlRequest .= " ORDER BY date DESC";
                break;
            case ASC:
                $sqlRequest .= " ORDER BY date ASC";
                break;
            case CITY:
                $sqlRequest .= " ORDER BY city ASC";
                break;
            default:
                $sqlRequest .= " ORDER BY date DESC";
                break;
        }
        try {
            $req = Database::prepare($sqlRequest);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, 'Advertisement');
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function GetAdvertisementsUnvalidated()
    {
        try {
            $req = Database::prepare("SELECT * FROM advertisements WHERE valid = 0 ORDER BY date ASC");
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, 'Advertisement');
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function GetAdvertisementById($idAdvertisement)
    {
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

    public static function GetAdvertisementsByUserId($idUser)
    {
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

    public static function CreateAdvertisement($title, $description, $organic, $date, $idUser)
    {
        $sqlCreateAd = "INSERT INTO `advertisements`(`title`, `description`, `organic`, `valid`, `date`, `idUser`)"
            . " VALUES (:title, :description, :organic, :valid, :date, :idUser)";
        $valid = false;
        $organicBool = (isset($organic) ? true : false);
        try {
            $req = Database::prepare($sqlCreateAd);
            $req->bindParam(":title", $title, PDO::PARAM_STR);
            $req->bindParam(":description", $description, PDO::PARAM_STR);
            $req->bindParam(":organic", $organicBool, PDO::PARAM_BOOL);
            $req->bindParam(":valid", $valid, PDO::PARAM_BOOL);
            $req->bindParam(":date", $date, PDO::PARAM_STR);
            $req->bindParam(":idUser", $idUser, PDO::PARAM_INT);
            $req->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function UpdateAdvertisement($idAdvertisement, $title, $description, $organic, $date)
    {
        $sqlCreateAd = "UPDATE direct_prod.advertisements"
            . " SET title = :title, description = :description, organic = :organic, valid = :valid, date = :date, idUser = :idUser WHERE idAdvertisement = :idAd)";
        $valid = false;
        $organicBool = (isset($organic) ? true : false);
            try {
            $req = Database::prepare($sqlCreateAd);
            $req->bindParam(":title", $title, PDO::PARAM_STR);
            $req->bindParam(":description", $description, PDO::PARAM_STR);
            $req->bindParam(":organic", $organicBool, PDO::PARAM_BOOL);
            $req->bindParam(":valid", $valid, PDO::PARAM_BOOL);
            $req->bindParam(":date", $date, PDO::PARAM_STR);
            $req->bindParam(":idAd", $idAdvertisement, PDO::PARAM_INT);
            $req->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function DeleteAdvertisementById($idAdvertisement)
    {
        try {
            $req = Database::prepare("DELETE FROM direct_prod.advertisements WHERE idAdvertisement = :idAd");
            $req->bindParam(":idAd", $idAdvertisement, PDO::PARAM_INT);
            $req->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function UpdateValidatedAdvertisement($idAdvertisement)
    {
        try {
            $req = Database::prepare('UPDATE direct_prod.advertisements SET valid = 1 WHERE idAdvertisement = :idAd');
            $req->bindParam(":idAd", $idAdvertisement, PDO::PARAM_INT);
            $req->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
