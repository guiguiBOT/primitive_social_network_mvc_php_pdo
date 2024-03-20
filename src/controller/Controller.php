<?php
// Création d'une classe abstract Controller qui sera le parent de toutes les classes controllers.
// Cette classe contiendra des méthodes et des propriétés communes à tous les controllers.
abstract class Controller{
    // On déclare une méthode redirect() qui prend en paramètre un chemin et qui redirige l'utilisateur
    // vers la page correspondante. La fonction header() permet de renvoyer des entêtes HTTP.
    // Ici, on renvoie une entête de type Location qui contient le chemin vers lequel on veut rediriger l'utilisateur.
    // On utilise la fonction exit() pour arrêter l'exécution du script.
    public function redirect($path) {
        header("Location: $path");
        exit();
    }
    // On force les classes enfants à implémenter la méthode index(), cette méthode contiendra toute la logique
    // de la page demandée par l'utilisateur. Chaque controller aura une méthode index() différente.
    abstract public function index();
}
?>