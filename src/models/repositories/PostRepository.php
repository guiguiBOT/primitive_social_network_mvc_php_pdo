<?php
// Ici nous allons créer la classe PostRepository qui va gérer les requêtes SQL concernant les posts.
// PostRepository étend de la classe Db. La méthode request() de PostRepository va nous permettre de faire des
// requêtes SQL à la base de données. La méthode getPosts() de PostRepository va nous permettre de récupérer tous
// les posts de la base de données. La méthode getPostById() de PostRepository va nous permettre de récupérer
// un post de la base de données en fonction de son id. La méthode getPostByUser() de PostRepository va
// nous permettre de récupérer un post de la base de données en fonction de l'id de son propriétaire. La méthode
// insertIntoPost() de PostRepository va nous permettre d'insérer un post dans la base de données. La méthode
// delete() de PostRepository va nous permettre de supprimer un post de la base de données. La méthode update() de
// PostRepository va nous permettre de mettre à jour un post dans la base de données.

class PostRepository extends Db{
    private static function request($query){
        return self::getInstance()->query($query);
    }

    public static function getPosts(){
        return self::request("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPostById($id){
        return self::request("SELECT * FROM posts WHERE id=$id")->fetch(PDO::FETCH_ASSOC);
    }

    public static function getPostByUser($idUser){
        return self::request("SELECT * FROM posts WHERE owner_id='$idUser'")->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertIntoPost(Post $post){
        return self::request("INSERT INTO posts(Title, Content, owner_id) VALUES ('" . $post->getTitle() . "','" . $post->getContent() . "'," . $post->getIdUser() . ")");
    }

    public static function delete($id){
        return self::request("DELETE FROM posts WHERE id=$id");
    }

    public static function update(Post $post){
        return self::request("UPDATE posts SET Title='" . $post->getTitle() . "', Content='" . $post->getContent() . "' WHERE id=" . $post->getId());
    }
}