<h1>Accueil</h1>

<?php 

$sql = "SELECT * FROM articles WHERE status = 'publish' ORDER BY created_at DESC LIMIT 10";
$query = pdo()->prepare($sql);
$query->execute();
$articles = $query->fetchAll();

?>


<section id="articles">
    <hr>
    <h2>Quelques articles</h2>
    <p class="title">Mes derniers articles !</p>
    <div class="container-article">
        <?php foreach ($articles as $article) {
        ?>
            <div class="card-article">
                <div class="text-card">
                    <p class="status"><?= ucfirst($article['status']); ?></p>
                    <h3><?= ucfirst($article['titre']); ?></h3>
                    <p><?= ucfirst($article['auteur']); ?></p>
                    <button><a href="index.php?page=detailArticle&amp;id=<?= $article['id_article']; ?>">Voir plus</a></button>
                </div>

            </div>

        <?php } ?>
    </div>

</section>