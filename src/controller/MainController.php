<?php
// Ici nous allons créer la classe MainController qui va gérer la logique de la page d'accueil.
// MainController étend de la classe Controller.
// La méthode index() de MainController va gérer la déconnexion de l'utilisateur, la suppression d'un post,
// la création d'un post et la modification d'un post. Si l'utilisateur clique sur le bouton de déconnexion,
// on détruit la session et on redirige l'utilisateur vers la page de connexion. Si l'utilisateur clique sur le
// bouton de suppression d'un post, on appelle la méthode delete() de la classe Post en lui passant l'id du post
// à supprimer. Si l'utilisateur clique sur le bouton de création d'un post, on crée un objet $post de la classe
// Post avec les données du formulaire et on appelle la méthode insertIntoPost() de la classe Post pour insérer
// le post dans la base de données. Si l'utilisateur clique sur le bouton de confirmation de modification d'un post,
// on crée un objet $post de la classe Post avec les données du formulaire et on appelle la méthode update() de la
// classe Post pour mettre à jour le post dans la base de données. Enfin, on récupère tous les posts de la base de
// données et on appelle la vue main.php

class MainController extends Controller{
    public function index(){
        if(isset($_POST["disconnect"])){
            session_destroy();
            $this->redirect("/login");
        }
        elseif(isset($_POST["delete"])){
            Post::delete($_POST["delete"]);
        }
        elseif(isset($_POST["create"])){
            $post = new Post($_POST["title"], $_POST["content"], $_SESSION["user"]);
            Post::insertIntoPost($post);
        }
        elseif(isset($_POST["confirm"])){
            $post = new Post($_POST["title"], $_POST["content"], $_SESSION["user"], $_POST["confirm"]);
            Post::update($post);
        }
        
        $posts = Post::getPosts();
        require("../views/main.php");
    }
}