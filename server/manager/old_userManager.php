<?php

require_once '../inc/inc.all.php';

/* Titre : Manager de la classe "User"
 * Date : Mardi, 14.03.2019
 * Auteurs : Romain Peretti
 * Version : 1.0
 * Description : Manager comportant les différents fonctions en rapport avec la classe "User"
 */

class OldUserManager {

    public static function GetUserDetailsById($idUser) {
        try {
            $req = Database::prepare("SELECT * FROM users WHERE idUser = :idUser");
            $req->bindParam(":idUser", $idUser, PDO::PARAM_INT);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, 'User');
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function CreateUser($password, $email, $name, $city, $canton, $postCode, $streetAndNumber, $description) {
        $sqlInsertUser = "INSERT INTO direct_prod.users (`password`, `email`, `name`, `city`, `canton`, `postCode`, `streetAndNumber`, `admin`, `description`, `salt`)"
                . "VALUES (:password, :email, :name, :city, :canton, :postCode, :streetAndNumber, :admin, :description, :salt);";
        $salt = uniqid(mt_rand(), true);
        $encryptPassword = sha1($password . $salt);
        $admin = 0;

        try {
            $req = Database::prepare($sqlInsertUser);
            if (!UserManager::UserExist($email)) {
                $req->bindParam(":password", $encryptPassword, PDO::PARAM_STR);
                $req->bindParam(":email", $email, PDO::PARAM_STR);
                $req->bindParam(":name", $name, PDO::PARAM_STR);
                $req->bindParam(":city", $city, PDO::PARAM_STR);
                $req->bindParam(":canton", $canton, PDO::PARAM_STR);
                $req->bindParam(":postCode", $postCode, PDO::PARAM_STR);
                $req->bindParam(":streetAndNumber", $streetAndNumber, PDO::PARAM_STR);
                $req->bindParam(":admin", $admin);
                $req->bindParam(":description", $description, PDO::PARAM_STR);
                $req->bindParam(":salt", $salt, PDO::PARAM_STR);
                $req->execute();
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public static function UpdateUser($idUser, $password, $name, $city, $canton, $postCode, $streetAndNumber, $description) {
        $sqlUpdateUser = "UPDATE direct_prod.users "
                . "SET password = :password, name = :name, city = :city, canton = :canton, postCode = :postCode, streetAndNumber = :streetAndNumber, description = :description, salt = :salt WHERE users.idUser = :idUser";
        $salt = uniqid(mt_rand(), true);
        $encryptPassword = sha1($password . $salt);
        try {
            $req = Database::prepare($sqlUpdateUser);
            $req->bindParam(":idUser", $idUser, PDO::PARAM_INT);
            $req->bindParam(":password", $encryptPassword, PDO::PARAM_STR);
            $req->bindParam(":name", $name, PDO::PARAM_STR);
            $req->bindParam(":city", $city, PDO::PARAM_STR);
            $req->bindParam(":canton", $canton, PDO::PARAM_STR);
            $req->bindParam(":postCode", $postCode, PDO::PARAM_STR);
            $req->bindParam(":streetAndNumber", $streetAndNumber, PDO::PARAM_STR);
            $req->bindParam(":description", $description, PDO::PARAM_STR);
            $req->bindParam(":salt", $salt, PDO::PARAM_STR);
            $req->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function DeleteUser($idUser) {
        try {
            $req = Database::prepare("DELETE FROM direct_prod.users WHERE users.idUser = :idUser");
            $req->bindParam(":idUser", $idUser, PDO::PARAM_INT);
            $req->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function GetUserDetailsByEmail($email) {
        try {
            $req = Database::prepare("SELECT * FROM users WHERE email = :email");
            $req->bindParam(":email", $email, PDO::PARAM_STR);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, 'User');
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function Connection($email, $password) {
        $sqlGetInfosUser = "SELECT salt, password FROM users WHERE email = :email";
        try {
            $req = Database::prepare($sqlGetInfosUser);
            $req->bindParam(":email", $email, PDO::PARAM_STR);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_ASSOC);
            if (sha1($password . $result[0]["salt"]) == $result[0]["password"]) {
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public static function UserExist($email) {
        try {
            $req = Database::prepare("SELECT * FROM direct_prod.users WHERE email = :email");
            $req->bindParam(":email", $email, PDO::PARAM_STR);
            $req->execute();
            $result = $req->fetchAll(PDO::FETCH_CLASS, 'User');
            if (count($result) > 0) {
                return true;
            }
            else {
                return false;
            }       
            //return (count($result) > 0 ? true : false);
        } catch (Exception $e) {
            return false;
        }
    }
}