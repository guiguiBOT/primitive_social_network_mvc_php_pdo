<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
</head>
<body>
    <h1>My social network</h1>
    <form method="post">
        <button type="submit" name="disconnect">Se déconnecter</button>
    </form>
    <?php
        foreach($posts as $post){
            if(isset($_POST["edit"])){
                if($_POST["edit"]==$post["id"])
                    echo '<form method="post">
                        <input type="text" name="title" placeholder="Title" value="'. $post["title"] .'"/>
                        <input type="text" name="content" placeholder="Content" value="'. $post["content"] .'"/>
                        <button type="submit" name="confirm" value="' . $post["id"] . '">Confirmer</button>';
                else{
                    echo "<h2>" . $post["title"] . "</h2>";
                    echo "<p>" . $post["content"] . "</p>";
                    echo '<form method="post">';
                }
            }
            else{
                echo "<h2>" . $post["title"] . "</h2>";
                echo "<p>" . $post["content"] . "</p>";
                echo '<form method="post">';
            }
            
            if($post["owner_id"] === $_SESSION["user"]){
            ?>
                    <button type="submit" name="edit" value="<?= $post["id"] ?>">Modifier</button>
                    <button type="submit" name="delete" value="<?= $post["id"] ?>">Supprimer</button>
                </form>
            <?php
            }
            echo "<hr>";
        }
    ?>
    <h2>
        Postez un message
    </h2>
    <form method="post">
        <input type="text" name="title" placeholder="Titre"/>
        <input type="text" name="content" placeholder="Message"/>
        <button type="submit" name="create">POSTER</button>
    </form>
</body>
</html>