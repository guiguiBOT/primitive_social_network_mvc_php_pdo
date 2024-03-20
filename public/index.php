<?php

// Création de la page index.php qui est le point d'entrée de notre application.
// Etant donnée que nous avons démarré le serveur php dans le dossier public, c'est ce
// fichier qui sera exécuté en premier. C'est ici que nous allons importer les différentes
// classes et fichiers nécessaires au bon fonctionnement de notre application.
// Nous allons également créer une nouvelle instance de la classe Router que nous avons créée
// et appeler la méthode start() de cette classe. Cela aura pour effet de rediriger l'utilisateur
// vers la bonne page en fonction de l'url demandée.

session_start();
require("../src/models/Db.php");
require("../src/models/repositories/UserRepository.php");
require("../src/models/User.php");
require("../src/models/repositories/PostRepository.php");
require("../src/models/Post.php");
require("../src/controller/Controller.php");
require("../src/controller/MainController.php");
require("../src/controller/LoginController.php");
require("../src/controller/RegisterController.php");
require("../core/Router.php");
$router = new Router();
$router->start();
?>