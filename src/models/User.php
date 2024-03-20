<?php
// Ici nous allons créer la classe User qui va représenter un utilisateur.
// La classe User étend de la classe UserRepository. UserRepository est une classe qui contient des méthodes
// pour interagir avec la base de données. La classe User va contenir les propriétés et les méthodes spécifiques
// à un utilisateur. Les propriétés de la classe User sont privées, pour y accéder nous devons utiliser des méthodes
// publiques. Les méthodes publiques de la classe User vont nous permettre de récupérer ou de modifier les propriétés
// des instances de la classe User.
// $this représente l'instance de la classe courante. Lorsque nous créons une instance de la classe User, nous
// pouvons accéder à ses propriétés et à ses méthodes en utilisant $this.
// Nous allons gérer les erreurs en utilisant des exceptions. Si une erreur survient, nous allons l'attraper et
// afficher un message d'erreur.
// La méthode __construct() est une méthode magique qui est appelée automatiquement lorsqu'une instance de la classe
// est créée. Elle prend en paramètre les données de l'utilisateur et les stocke dans les propriétés de l'instance.
// La méthode __construct() appelle les méthodes de la classe mère UserRepository pour vérifier et stocker les données
// dans la base de données.
// Le fait que la propriété id soit initialisée à null signifie que l'instance de la classe User n'a pas d'id lorsqu'elle
// est créée. L'id est généré automatiquement par la base de données lors de l'insertion de l'utilisateur.
// Les méthodes publiques de la classe User, appelées getters et setters, vont nous permettre de récupérer ou de modifier
// les propriétés des instances de la classe User. Les getters vont nous permettre de récupérer les propriétés des instances
// de la classe User. Les setters vont nous permettre de modifier les propriétés des instances de la classe User.
// Les méthodes publiques de la classe User vont vérifier les données avant de les stocker dans les propriétés des instances
// de la classe User. Si les données ne sont pas valides, une exception sera levée.
// La méthode getId() va nous permettre de récupérer l'id de l'utilisateur.
// La méthode getUsername() va nous permettre de récupérer le nom d'utilisateur de l'utilisateur.
// La méthode setUsername() va nous permettre de modifier le nom d'utilisateur de l'utilisateur.
// La méthode getPassword() va nous permettre de récupérer le mot de passe de l'utilisateur.
// La méthode setPassword() va nous permettre de modifier le mot de passe de l'utilisateur.
// La méthode getFirstName() va nous permettre de récupérer le prénom de l'utilisateur.
// La méthode setFirstName() va nous permettre de modifier le prénom de l'utilisateur.
// La méthode getLastName() va nous permettre de récupérer le nom de famille de l'utilisateur.
// La méthode setLastName() va nous permettre de modifier le nom de famille de l'utilisateur.



class User extends UserRepository{
    private $id;
    private $username;
    private $firstName;
    private $lastName;
    private $password;

    public function __construct($username, $password, $firstName, $lastName, $id=null){
        $this->id = $id;
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    public function getId(){return $this->id;}

    public function getUsername(){return $this->username;}
    public function setUsername($username){
        if(preg_match("/^[A-z]+$/", $username))
            $this->username = htmlspecialchars($username);
        else
            throw new Exception("Username invalide",1);
    }

    public function getPassword(){return $this->password;}
    public function setPassword($password){
        if(preg_match("/^[A-z0-9\-\!]{3,}$/", $password))
            $this->password = htmlspecialchars($password);
        else
            throw new Exception("Mot de passe invalide",1);
        
    }

    public function getFirstName(){return $this->firstName;}
    public function setFirstName($firstName){
        if(preg_match("/^[A-z]+$/", $firstName))
            $this->firstName = htmlspecialchars($firstName);
        else
            throw new Exception("Prénom invalide",1);
    }

    public function getLastName(){return $this->lastName;}
    public function setLastName($lastName){
        if(preg_match("/^[A-z]+$/", $lastName))
            $this->lastName = htmlspecialchars($lastName);
        else
            throw new Exception("Nom de famille invalide",1);
    }
}