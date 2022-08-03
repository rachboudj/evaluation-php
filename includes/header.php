<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Évaluation de php</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <header>
        <div class="logo">
            UnBlog
        </div>
        <nav>
            <ul>
                <li><a href="index.php?page=accueil">Accueil</a></li>
                <li><a href="index.php?page=inscription">Inscription</a></li>
                <li><a href="index.php?page=contact">Contact</a></li>
                <?php
                if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
                    echo '<li><a href="index.php?page=logout">Logout</a></li>';
                } else {
                    echo '<li><a href="index.php?page=login">Login</a></li>';                    
                }
                ?>
            </ul>
        </nav>
    </header>