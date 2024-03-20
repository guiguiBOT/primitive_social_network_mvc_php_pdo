<?php
// Ici nous créons la classe LoginController qui va gérer la logique de la page de connexion.
// LoginController étend de la classe Controller.
// La méthode index() de LoginController va récupérer les données du formulaire de connexion et les vérifier.
// Si les données sont valides, on récupère l'utilisateur avec le nom d'utilisateur entré dans le formulaire
// et on vérifie si le mot de passe entré dans le formulaire correspond au mot de passe de l'utilisateur en
// base de données. Si c'est le cas, on stocke l'id de l'utilisateur dans la session et on redirige l'utilisateur
// vers la page d'accueil. Si le nom d'utilisateur n'existe pas en base de données, on affiche un message d'erreur.
// Si le mot de passe entré dans le formulaire ne correspond pas au mot de passe de l'utilisateur en base de données,
// on affiche un message d'erreur.
// Enfin, on appelle la vue login.php

class LoginController extends Controller{
    public function index(){
        try{
            if(isset($_POST["login"])){
                $user = User::getUserByUsername(htmlspecialchars($_POST["username"]));
                if(!$user){
                    throw new Exception("Aucun utilisateur trouvé à ce username",2); 
                }
                else{
                    if($user["password"] === htmlspecialchars($_POST["password"])){
                        $_SESSION["user"] = $user["id"];
                        $this->redirect("/main");
                    }
                    else throw new Exception("Mauvais mot de passe",2);
                }
            }
        }
        catch(PDOException|Exception $e){
            echo $e->getMessage();
        }
        require("../views/login.php");
    }
}