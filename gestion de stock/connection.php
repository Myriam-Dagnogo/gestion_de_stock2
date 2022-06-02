



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>
    <div class="FormConnect">
        <?php if (isset($erreur)) {
            echo $erreur;
        }
        ?>


        <div class="form-text">Connexion</div>
        <div class="form-saisie">
            <form method="POST" action="">
                <span> Email</span>
                <input type="text" name="mail" placeholder="Adresse email ">
                <span> Mot de passe</span>
                <input type="password" name="mdp" placeholder="Entrer votre mot de passe ">
                <input type="submit" name="Connexion" class="btnConnect" value="Connexion" href="administration.php">

                Vous êtes pas encore inscrit?&nbsp; <a href="inscription.php"> Inscrivez-vous</a>
            </form>
        </div>
    </div>
</body>

</html>