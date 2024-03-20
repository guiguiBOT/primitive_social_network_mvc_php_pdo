<?php

// Ici nous allons créer la classe RegisterController qui va gérer l'inscription d'un utilisateur.
// RegisterController étend de la classe Controller. Ce qui va nous permettre d'utiliser la méthode redirect() 
// pour rediriger l'utilisateur vers la page de connexion après son inscription.
// Pour commencer nous créons une méthode index() imposée par la classe mère Controller. Cette méthode va
// récupérer les données du formulaire d'inscription et les vérifier. Si les données sont valides, on crée un
// objet $user de la classe User avec les données du formulaire et on appelle la méthode insertIntoUser() de la
// classe UserRepository pour insérer l'utilisateur dans la base de données. Si l'insertion échoue, on attrape
// l'exception et on stocke le message d'erreur dans la variable $error. Ensuite on appelle la vue register.php


class RegisterController extends Controller{
    public function index(){
        $error = [];
        try{
            if(isset($_POST["register"])){
                $user = new User($_POST["username"], $_POST["password"], $_POST["firstName"], $_POST["lastName"]);
                User::insertIntoUser($user);
                $this->redirect("/login");
            }
        }
        catch(PDOException|Exception $e){
            if($e->getCode() === 1)
                $error["form"] = $e->getMessage();
            else
                $error["db"] = $e->getMessage();
        }
        require("../views/register.php");
    }
}