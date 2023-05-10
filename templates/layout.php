<?php 

use Application\Lib\Tools;

$account = Tools::getSessionUserId() == 1 ? ['login','Connexion'] : ['panel','Mon Compte'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css?<?= time() ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600&display=swap" rel="stylesheet">
    <?= $loader ?>
    <title>NextBe | <?= $title ?></title>
</head>
<body>
    <header class="common flex-r">
        <div class="logo-container flex-r flex-r-c">
            <div class="logo">

            </div>
            <span>
                NextBe
            </span>
        </div>
        <nav id="navbar">
            <div class="links">
                <ul>
                    <li><a href="#">A propos</a></li>
                    <li><a href="./tickets">Vol</a></li>
                    <li><a href="#">Companie</a></li>
                    <li><a href="#">Destination</a></li>
                    <li><a href="#">Modalités</a></li>
                </ul>
            </div>
            <div class="account">
                <a href="<?= $account[0] ?>">
                    <button><?= $account[1] ?></button>
                </a>
            </div>
        </nav>
        <button id="menu-toggle" class="menu-toggle"> 
            <span class="burger-menu-box">
                <span class="burger-menu-inner">
                    
                </span>
            </span>
        </button>
    </header>
    <main>
        <?= $content ?>
    </main>
    <footer>
        
    </footer>
    <script>
        let nav = document.getElementById('navbar');
        let btn = document.getElementById('menu-toggle');

        btn.onclick = () => {
            if(nav.classList.contains('active')) nav.classList.remove('active');
            else nav.classList.add('active');
        }
    </script>
    <?= $script ?>
</body>
</html>
