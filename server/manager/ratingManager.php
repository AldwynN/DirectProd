<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/server/database/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/server/class/Rating.php';

class RatingManager
{

    /**
     * @brief Ajout d'un taux et d'un commentaire.
     * @param [Rating] L'objet "Rating" qu'on veut insérer dans la base.
     * @return boolean True = Ok.
     * 				   False = Une erreur est survenue.
     */
    public static function CreateCommentAndRate($r)
    {
        $req = 'INSERT INTO `rate` (`rating`, `comment`, `date`, `idUser`, `idAdvertisement`) '
            . ' VALUES (:r, :c, :d, :idU, :idA)';
        $statement = Database::prepare($req);

        try {
            $statement->execute(array(
                ':r' => $r->rating,
                ':c' => $r->comment,
                ':d' => $r->date,
                ':idU' => $r->idUser,
                ':idA' => $r->idAdvertisement
            ));
        } catch (PDOException $e) {
            echo 'Problème lors de l\'ajout de l\'annonce dans la base : ' . $e->getMessage();
            return false;
        }

        return true;
    }

    /**
     * @brief Retourne un tableau contenant les taux et les commentaires de l'annonce spécifée
     * @param int idAd L'id de l'annonce qu'on recherche
     * @return array Un tableau contenant les commentaires de type "Rating".
     * 				 False = Une erreur est survenue.
     */
    public static function GetCommentsAndRateOfAnAd($idAd)
    {
        $arr = array();

        $req = 'SELECT `rating`, `comment`, `date`, `idUser`, `idAdvertisement` FROM `rate` WHERE `idAdvertisement` = :id';
        $statement = Database::prepare($req, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        try {
            $statement->execute(array(':id' => $idAd));
        } catch (PDOException $e) {
            echo 'Problème lors de l\'ajout de l\'annonce dans la base : ' . $e->getMessage();
            return false;
        }

        while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
            $r = new Rating($row['rating'], $row['comment'], $row['date'], $row['idUser'], $row['idAdvertisement']);

            array_push($arr, $r);
        }

        return $arr;
    }
}
