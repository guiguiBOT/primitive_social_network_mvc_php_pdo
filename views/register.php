<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'enregistrement</title>
</head>
<body>
    <h1>Enregistrez-vous</h1>
    <?= isset($error["db"]) ? "<p>" . $error["db"] . "</p>" : "" ?>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username"/>
        <input type="text" name="password" placeholder="Password" />
        <input type="text" name="firstName" placeholder="First name" />
        <input type="text" name="lastName" placeholder="Last name" />
        <button type="submit" name="register">Créer compte</button>
        <a href="/login">Se connecter</a>
    <?= isset($error["form"]) ? "<p>" . $error["form"] . "</p>" : "" ?>
    </form>
</body>
</html>