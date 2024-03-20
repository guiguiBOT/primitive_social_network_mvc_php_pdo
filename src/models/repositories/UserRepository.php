<?php
// Ici nous allons créer la classe UserRepository qui va gérer les requêtes SQL concernant les utilisateurs.
// UserRepository étend de la classe Db. La méthode request() de UserRepository va nous permettre de faire des
// requêtes SQL à la base de données. La méthode getUsers() de UserRepository va nous permettre de récupérer tous
// les utilisateurs de la base de données. La méthode getUserById() de UserRepository va nous permettre de récupérer
// un utilisateur de la base de données en fonction de son id. La méthode getUserByUsername() de UserRepository va
// nous permettre de récupérer un utilisateur de la base de données en fonction de son nom d'utilisateur. La méthode
// insertIntoUser() de UserRepository va nous permettre d'insérer un utilisateur dans la base de données.

class UserRepository extends Db{
    private static function request($query){
        return self::getInstance()->query($query);
    }

    public static function getUsers(){
        return self::request("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUserById($id){
        return self::request("SELECT * FROM users WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
    }

    public static function getUserByUsername($username){
        return self::request("SELECT * FROM users WHERE username='$username'")->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertIntoUser(User $user){
        return self::request("INSERT INTO users(username, password, firstName, lastName) VALUES ('" . $user->getUsername() . "','" . $user->getPassword() . "','" . $user->getFirstName() . "','" . $user->getLastName() . "')");
    }
}