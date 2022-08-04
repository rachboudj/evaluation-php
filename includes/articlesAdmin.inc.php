<h1>Les articles</h1>

<?php

$sql = "SELECT * FROM articles ORDER BY created_at DESC";
$query = pdo()->prepare($sql);
$query->execute();
$articles = $query->fetchAll();

?>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>Titre</th>
            <th>Contenu</th>
            <th>Auteur</th>
            <th>Date de création</th>
            <th>Date de modification</th>
            <th>Status</th>
            <th colspan="3">Opérations</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article) { ?>
            <tr>
                <td><?= $article['id_article']; ?></td>
                <td><?= $article['titre']; ?></td>
                <td><?= $article['description']; ?></td>
                <td><?= $article['auteur']; ?></td>
                <td><?= $article['created_at']; ?></td>
                <td><?= $article['modified_at']; ?></td>
                <td><?= $article['status']; ?></td>
                <td><a href="index.php?page=modifArticle&amp;id=<?= $article['id_article'] ?>">Éditer</a></td>
                <td><a href="index.php?page=draftArticle&amp;id=<?= $article['id_article'] ?>">Mettre en brouillon</a></td>
                <td><a href="index.php?page=suppArticle&amp;id=<?= $article['id_article'] ?>">Supprimer</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>