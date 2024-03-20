<?php
// 2. Création du fichier Db.php qui contiendra une classe Db qui contiendra une méthode public static instance()
// qui retournera une instance de PDO.
// PDO est une classe PHP qui permet de se connecter à une base de données. Elle est fournie par défaut avec PHP.
// Pour se connecter à la base de donées, on doit lui fournir 3 paramètres : Le nom de la base de données, le nom
// d'utilisateur ainsi que le mot de passe. Ces paramètres sont fournis en argument du constructeur de la classe PDO.
// La méthode instance() de la classe Db va vérifier si une instance de PDO existe déjà, si ce n'est pas le cas, elle
// va créer une nouvelle instance de PDO et la retourner. Si une instance de PDO existe déjà, elle la retournera
// directement. On pourra donc se connecter à la base de données en appelant la méthode instance() de la classe Db.
// On pourra ensuite utiliser les méthodes de l'objet PDO retourné pour effectuer des requêtes SQL sur la base de données.
// On pourra par exemple utiliser la méthode query() pour effectuer une requête SQL de type SELECT, 
class Db
{
    // Unique instance de PDO
    public static $instance;

    // Permet de récupérer l'instance de la base de données, on la crée si elle n'existe pas puis on la retourne.
    public static function getInstance()
    {
        if (self::$instance === null) {
            try {
                // Pense à modifier le mot de passe de la db quand tu repasse sur le portable et le nom de la db par poo_project !
                self::$instance = new PDO("mysql:host=localhost;dbname=social_network", "root", "");   
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$instance;
    }

    public static function disconnect(){
        self::$instance = null;
    }
}
?>