<?php
// Ce fichier sert à tester la connexion à la base de données
// Pour l'utiliser il suffit de lancer la commande "php DbConnexionTest.php" dans le terminal
// à la racine du projet avec la commande "php DbConnexionTest.php"
// Si la connexion à la base de données est réussie, le message "Connexion à la base de données 
// réussie" sera affiché dans le terminal. Sinon, le message d'erreur sera affiché.

require_once("src/models/Db.php");
try {
    $db = Db::getInstance();
    echo "Connexion à la base de données réussie";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}