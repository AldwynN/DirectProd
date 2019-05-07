<?php
//$_SERVER['DOCUMENT_ROOT']
require_once $_SERVER['DOCUMENT_ROOT'] . '/DirectProd/server/database/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/DirectProd/server/class/User.php';

class UserManager
{
    /**
     * @brief Retourne un utilisateur en fonction de son id
     * @param int idUser L'id de l'utilisateur qu'on recherche
     * @return [User] L'utilisateur de type User.
     * 				  False = Une erreur est survenue.
     * 				  Null = L'utilisateur est pas trouvé
     */
    public static function GetUserDetailsById($idUser)
    {
        $u = null;

        $req = 'SELECT `idUser`, `password`, `email`, `name`, `city`, `canton`, `postCode`, `streetAndNumber`, `admin`, `description`, `salt` FROM `users` WHERE `idUser` = :id';
        $statement = Database::prepare($req, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        try {
            $statement->execute(array(':id' => $idUser));
        } catch (PDOException $e) {
            echo 'Problème de lecture de la base : ' . $e->getMessage();
            return false;
        }

        if ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
            $u = new User($row['idUser'], $row['password'], $row['email'], $row['name'], $row['city'], $row['canton'], $row['postCode'], $row['streetAndNumber'], $row['admin'], $row['description'], $row['salt']);
        }
        return $u;
    }

    /**
     * @brief Retourne un utilisateur en fonction de son email
     * @param string email L'email de l'utilisateur qu'on recherche
     * @return [User] L'utilisateur de type User.
     * 				  False = Une erreur est survenue.
     * 				  Null = L'utilisateur n'est pas trouvé.
     */
    public static function GetUserDetailsByEmail($email)
    {
        $u = null;

        $req = 'SELECT `idUser`, `password`, `email`, `name`, `city`, `canton`, `postCode`, `streetAndNumber`, `admin`, `description`, `salt` FROM `users` WHERE `email` = :e';
        $statement = Database::prepare($req, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        try {
            $statement->execute(array(':e' => $email));
        } catch (PDOException $e) {
            echo 'Problème de lecture de la base : ' . $e->getMessage();
            return false;
        }

        if ($row = $statement->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
            $u = new User($row['idUser'], $row['password'], $row['email'], $row['name'], $row['city'], $row['canton'], $row['postCode'], $row['streetAndNumber'], $row['admin'], $row['description'], $row['salt']);
        }
        return $u;
    }

    /**
     * @brief Ajoute un utilisateur
     * @param [User] L'objet User qu'on veut insérer dans la base.
     * @return boolean True = Ok.
     * 				   False = Une erreur est survenue.
     *                 Null = L'utilisateur existe déjà
     */
    public static function CreateUser($u)
    {
        if (UserManager::UserExist($u->email)) {
            return null;
        }

        $req = "INSERT INTO `users` (`password`, `email`, `name`, `city`, `canton`, `postCode`, `streetAndNumber`, `admin`, `description`, `salt`)"
            . "VALUES (:p, :e, :n, :ci, :ca, :po, :st, :a, :d, :sa);";
        $statement = Database::prepare($req);

        $salt = uniqid(mt_rand(), true);
        $pwd = sha1($u->password . $salt);
        $admin = 0;

        try {
            $statement->execute(array(
                ':p' => $pwd,
                'e' => $u->email,
                ':n' => $u->name,
                ':ci' => $u->city,
                ':ca' => $u->canton,
                ':po' => $u->postCode,
                ':st' => $u->streetAndNumber,
                ':a' => $admin,
                ':d' => $u->description,
                ':sa' => $salt
            ));
        } catch (PDOException $e) {
            echo 'Problème d\'insertion : ' . $e->getMessage();
            return false;
        }
        return true;
    }

    /**
     * @brief Modifie un utilisateur 
     * @param [User] L'objet User qu'on doit modifier dans la base
     * @return boolean True = Ok.
     * 				    False = Une erreur est survenue.
     */
    public static function UpdateUser($u)
    {
        $req = 'UPDATE `users` SET '
            . 'password = :p, name = :n, city = :ci, canton = :ca, postCode = :po, streetAndNumber = :st, description = :d, salt = :sa WHERE users.idUser = :idUser';
        $statement = Database::prepare($req);

        $salt = uniqid(mt_rand(), true);
        $pwd = sha1($u->password . $salt);
        try {
            $statement->execute(array(
                ':p' => $pwd,
                ':n' => $u->name,
                ':ci' => $u->city,
                ':ca' => $u->canton,
                ':po' => $u->postCode,
                ':st' => $u->streetAndNumber,
                ':d' => $u->description,
                ':sa' => $salt
            ));
        } catch (PDOException $e) {
            echo 'Problème de modification : ' . $e->getMessage();
            return false;
        }
        return true;
    }

    /**
     * @brief Supprime un utilisateur 
     * @param int idUser L'id de l'utilisateur qu'on veut supprimer dans la base
     * @return  boolean True = Ok.
     * 				    False = Une erreur est survenue.
     */
    public static function DeleteUser($idUser)
    {
        $req = 'DELETE FROM `users` WHERE `user.idUser` = :id';
        $statement = Database::prepare($req);
        try {
            $statement->execute(array(':id' => $idUser));
        } catch (PDOException $e) {
            echo 'Problème de suppression : ' . $e->getMessage();
            return false;
        }
        
        return true;
    }

    /**
     * @brief Vérifie si un utilisateur existe déjà avec l'email spécifié
     * @param string email L'email d'un utilisateur qu'on recherche
     * @return  boolean True = Un utilisateur existe déjà avec cette email.
     * 				    False = Utilisateur introuvable ou une erreur est survenue.
     */
    public static function UserExist($email)
    {
        $req = 'SELECT * FROM `users` WHERE `users.email` = :e';
        $statement = Database::prepare($req);
        try {
            $statement->execute(array(':e' => $email));
        } catch (PDOException $e) {
            echo 'Problème de suppression : ' . $e->getMessage();
            return false;
        }
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if (count($row) == 0) {
            return false;
        }
        return true;
    }

    /**
     * @brief Modifie un utilisateur 
     * @param [User] L'objet User qu'on doit modifier dans la base
     * @return  boolean True = Ok.
     * 				    False = Erreur de connection ou une erreur est survenue.
     *                  Null = L'utilisateur n'existe pas.
     */
    public static function Connection($email, $password)
    {
        if (!UserManager::UserExist($email)) {
            return null;
        }

        $req = 'SELECT `salt`, `password` FROM `users` WHERE `email` = :e';
        $statement = Database::prepare($req);

        try {
            $statement->execute();
        } catch (PDOException $e) {
            echo 'Problème de connexion : ' . $e->getMessage();
            return false;
        }

        if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            if (sha1($password . $row['salt']) == $row['password']) {
                return true;
            }
        }
        return false;
    }
}
