<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/panel.css?<?= time() ?>">
    <?= $loader ?>
    <title>NextBe | Gestion utilisateur</title>
</head>
<body>
    <aside>
        <div id="hero">

        </div>
        <nav>
        <ul>
            <li><a href="../">Accueil</a></li>
            <li><a href="./">Vos informations</a>
            <li><a href="./reservations">Vos réservations</a></li>
            <li><a href="./planes">Avions</a></li>
            <li><a href="./models">Modèles</a></li>
            <li><a href="./flights-manager">Vols</a></li>
            <li id="logout"><a href="logout">Déconnexion</a></li>
        </ul>
        </nav>
    </aside>
    <main>
        <?= $content ?>
    </main>
<?= $script ?>
</body>
</html>