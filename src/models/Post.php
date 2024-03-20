<?php
// Ici nous allons créer la classe Post qui va représenter un post. La classe Post étend de la classe PostRepository.
// La classe Post va nous permettre de créer des objets post avec les données du formulaire de création de post.
// La classe PostRepository est une classe qui contient des méthodes pour interagir avec la base de données.
// La classe Post va contenir les propriétés et les méthodes spécifiques à un post. Les propriétés de la classe Post
// sont privées, pour y accéder nous devons utiliser des méthodes publiques. Les méthodes publiques de la classe Post
// vont nous permettre de récupérer ou de modifier les propriétés des instances de la classe Post.
// $this représente l'instance de la classe courante. Lorsque nous créons une instance de la classe Post, nous pouvons
// accéder à ses propriétés et à ses méthodes en utilisant $this.
// Nous allons gérer les erreurs en utilisant des exceptions. Si une erreur survient, nous allons l'attraper et afficher
// un message d'erreur.
// La méthode __construct() est une méthode magique qui est appelée automatiquement lorsqu'une instance de la classe est
// créée. Elle prend en paramètre les données du post et les stocke dans les propriétés de l'instance. La méthode __construct()
// appelle les méthodes de la classe mère PostRepository pour vérifier et stocker les données dans la base de données.
// Le fait que la propriété id soit initialisée à null signifie que l'instance de la classe Post n'a pas d'id lorsqu'elle est
// créée. L'id est généré automatiquement par la base de données lors de l'insertion du post.
// Les méthodes publiques de la classe Post, appelées getters et setters, vont nous permettre de récupérer ou de modifier les
// propriétés des instances de la classe Post. Les getters vont nous permettre de récupérer les propriétés des instances de la
// classe Post. Les setters vont nous permettre de modifier les propriétés des instances de la classe Post.
// Les méthodes publiques de la classe Post vont vérifier les données avant de les stocker dans les propriétés des instances de
// la classe Post. Si les données ne sont pas valides, une exception sera levée.
// La méthode getId() va nous permettre de récupérer l'id du post.
// La méthode getTitle() va nous permettre de récupérer le titre du post.
// La méthode setTitle() va nous permettre de modifier le titre du post.
// La méthode getContent() va nous permettre de récupérer le contenu du post.
// La méthode setContent() va nous permettre de modifier le contenu du post.
// La méthode getIdUser() va nous permettre de récupérer l'id de l'utilisateur qui a créé le post.
// La méthode setIdUser() va nous permettre de modifier l'id de l'utilisateur qui a créé le post.

class Post extends PostRepository{
    private $id;
    private $title;
    private $content;
    private $idUser;

    public function __construct($title, $content, $idUser, $id=null){
        $this->id = $id;
        $this->setTitle($title);
        $this->setContent($content);
        $this->setIdUser($idUser);
    }

    public function getId(){return $this->id;}

    public function getTitle(){return $this->title;}
    public function setTitle($title){
        $this->title = htmlspecialchars($title);
    }

    public function getContent(){return $this->content;}
    public function setContent($content){
        $this->content = htmlspecialchars($content);
    }

    public function getIdUser(){return $this->idUser;}
    public function setIdUser($idUser){
        $this->idUser = htmlspecialchars($idUser);
    }
}