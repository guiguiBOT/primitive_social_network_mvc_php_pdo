<?php

// Ici nous allons créer une classe Router contenant une méthode publique start() qui va dans un premier temps
// récupérer l'URL de la requête, puis vérifier si l'URL est égale à "/" (la racine du site) et si c'est le cas
// on instancie un objet $accueil de la classe MainController et on appelle la méthode index() de ce dernier.
// la méthode index() de MainController est une méthode abstraite qui doit être implémentée dans les classes
// filles de la classe abstraite Controller dont MainController est lui même étendu. Ensuite, si l'URL n'est pas 
// égale à "/", on récupère le nom du contrôleur à instancier en récupérant le premier élément de l'URL 
// (en utilisant la fonction explode() pour séparer les éléments de l'URL)
// la fonction explode() retourne un tableau, on récupère le premier élément de ce tableau, on le met en majuscule
// grace à la fonction ucfirst() et on lui concatène "Controller" pour obtenir le nom du contrôleur à instancier.
// On stocke ce nom dans la variable $className. Ensuite, on vérifie si la classe existe avec la fonction
// class_exists() et si c'est le cas, on instancie un objet $controller de la classe $className et on appelle la
// méthode index() de ce dernier. Si la méthode index() n'est pas implémentée dans le contrôleur, on affiche un message
// d'erreur. Si la classe n'existe pas, on affiche un message d'erreur.

class Router{
    public function start(){
        $url = $_SERVER["REQUEST_URI"];
        if($url==="/"){
            $register = new RegisterController();
            $register->index();
        }
        elseif($url === "/main"){
            $main = new MainController();
            $main->index();
        }
        else{
            $className = ucfirst(explode("/",$url)[1]) . "Controller";
            if(class_exists($className)){
                $controller = new $className();
                if(method_exists($controller, "index"))
                    $controller->index();
                else
                    echo "La méthode index n'existe pas dans le contrôleur $className";
            }
            else{
                echo "Error 404 : not found";
            }
        }
    }
}
?>