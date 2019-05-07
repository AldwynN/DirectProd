<?php
//$_SERVER['DOCUMENT_ROOT']
require_once $_SERVER['DOCUMENT_ROOT'] . '/DirectProd/server/database/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/DirectProd/server/class/Advertisement.php';

class AdvertisementManager
{

    /**
     * @brief Retourne toutes les annonces validé par l'admin.
     * @return array Un tableau contenant toutes les annonces de type "Advertisement".
     * 				 False = Une erreur est survenue.
     */
    public static function GetAdvertisementsValidated()
    {
        $arr = array();

        $req = 'SELECT `idAdvertisement`, `title`, `description`, `organic`, `valid`, `date`, `idUser` FROM `advertisements` WHERE `valid` = 1';
        $statement = Database::prepare($req, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo 'Problème de lecture de la base de données: ' . $e->getMessage();
            return false;
        }

        while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
            $a = new Advertisement($row['idAdvertisement'], $row['title'], $row['description'], $row['organic'], $row['valid'], $row['date'], $row['idUser']);

            array_push($arr, $a);
        }

        return $arr;
    }

    /**
     * @brief Retourne toutes les annonces non validé par l'admin.
     * @return array Un tableau contenant toutes les annonces de type "Advertisement".
     * 				 False = Une erreur est survenue.
     */
    public static function GetAdvertisementsUnvalidated()
    {
        $arr = array();

        $req = 'SELECT `idAdvertisement`, `title`, `description`, `organic`, `valid`, `date`, `idUser` FROM `advertisements` WHERE `valid` = 0';
        $statement = Database::prepare($req, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo 'Problème de lecture de la base de données: ' . $e->getMessage();
            return false;
        }

        while ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
            $a = new Advertisement($row['idAdvertisement'], $row['title'], $row['description'], $row['organic'], $row['valid'], $row['date'], $row['idUser']);

            array_push($arr, $a);
        }

        return $arr;
    }

    /**
     * @brief Retourne l'annonce qu'on recherche par son id.
     * @param int L'id de l'annonce.
     * @return [Advertisement] L'annonce de type "Advertisement".
     * 				           False = Une erreur est survenue.
     *                         Null = Annonce pas trouvé.
     */
    public static function GetAdvertisementById($idAd)
    {
        $a = null;

        $req = 'SELECT `idAdvertisement`, `title`, `description`, `organic`, `valid`, `date`, `idUser` FROM `advertisements` WHERE `idAdvertisement` = :id';
        $statement = Database::prepare($req);

        try {
            $statement->execute(array(':id' => $idAd));
        } catch (PDOException $e) {
            echo 'Problème de lecture de la base de données: ' . $e->getMessage();
            return false;
        }

        if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $a = new Advertisement($row['idAdvertisement'], $row['title'], $row['description'], $row['organic'], $row['valid'], $row['date'], $row['idUser']);
        }

        return $a;
    }

    /**
     * @brief Retourne les annonces qu'on recherche par l'id de son créateur.
     * @param int L'id de l'utilisateur.
     * @return array Un tableau contant toutes les annonces de l'utilisateur.
     *               False = Une erreur est survenue.
     */
    public static function GetAdvertisementsByUserId($idUser)
    {
        $a = null;

        $req = 'SELECT `idAdvertisement`, `title`, `description`, `organic`, `valid`, `date`, `idUser` FROM `advertisements` WHERE `idUser` = :id';
        $statement = Database::prepare($req);

        try {
            $statement->execute(array(':id' => $idUser));
        } catch (PDOException $e) {
            echo 'Problème de lecture de la base de données: ' . $e->getMessage();
            return false;
        }

        if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $a = new Advertisement($row['idAdvertisement'], $row['title'], $row['description'], $row['organic'], $row['valid'], $row['date'], $row['idUser']);
        }

        return $a;
    }

    /**
     * @brief Ajoute une annonce.
     * @param [Advertisement] L'objet "Advertisement" qu'on veut insérer dans la base.
     * @return boolean True = Ok.
     * 				   False = Une erreur est survenue.
     */
    public static function CreateAdvertisements($a)
    {
        $req = 'INSERT INTO `advertisements` (`title`, `description`, `organic`, `valid`, `date`, `idUser`)'
            . ' VALUES (:t, :d, :o, :v, :da, :id)';
        $statement = Database::prepare($req);

        try {
            $statement->execute(array(
                ':t' => $a->title,
                ':d' => $a->description,
                ':o' => $a->organic,
                ':v' => $a->valid,
                ':da' => $a->date,
                ':id' => $a->idUser
            ));
        } catch (PDOException $e) {
            echo 'Problème lors de l\'ajout de l\'annonce dans la base : ' . $e->getMessage();
            return false;
        }

        return true;
    }

    /**
     * @brief Modifie une annonce. 
     * @param [Advertisement] L'objet "Advertisement" qu'on veut modifier dans la base.
     * @return boolean True = Ok.
     * 				    False = Une erreur est survenue.
     */
    public static function UpdateAdvertisement($a)
    {
        $req = 'UPDATE `advertisements` SET '
            . ' `title` = :t, `description` = :d, `organic` = :o, `valid` = :v, `date` = :da, `idUser` = :id)';
        $statement = Database::prepare($req);

        try {
            $statement->execute(array(
                ':t' => $a->title,
                ':d' => $a->description,
                ':o' => $a->organic,
                ':v' => $a->valid,
                ':da' => $a->date,
                ':id' => $a->idUser
            ));
        } catch (PDOException $e) {
            echo 'Problème lors de la modification de l\'annonce : ' . $e->getMessage();
            return false;
        }

        return true;
    }

    /**
     * @brief Supprime une annonce 
     * @param int idAd L'id de l'annonce qu'on veut supprimer dans la base
     * @return  boolean True = Ok.
     * 				    False = Une erreur est survenue.
     */
    public static function DeleteAdvertisementById($idAd)
    {
        $req = 'DELETE FROM `advertisements` WHERE `idAdvertisement` = :id';
        $statement = Database::prepare($req);
        try {
            $statement->execute(array(':id' => $idAd));
        } catch (PDOException $e) {
            echo 'Problème de suppression : ' . $e->getMessage();
            return false;
        }

        return true;
    }

    /**
     * @brief Modifie l'annonce pour qu'elle devienne valide  
     * @param int idAd L'id de l'annonce qu'on veut modifier dans la base
     * @return  boolean True = Ok.
     * 				    False = Une erreur est survenue.
     */
    public static function UpdateAdvertisementToValid($idAd)
    {
        $req = 'UPDATE `advertisements` SET `valid` = 1 WHERE `idAdvertisement` = :id';
        $statement = Database::prepare($req);
        try {
            $statement->execute(array(':id' => $idAd));
        } catch (PDOException $e) {
            echo 'Problème de suppression : ' . $e->getMessage();
            return false;
        }

        return true;
    }
}
