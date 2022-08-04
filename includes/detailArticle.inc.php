<h1>Détails de l'article</h1>
<?php 

if(!empty($_GET['id']) && is_numeric($_GET['id'])) 
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM articles WHERE id_article = :id_article";
    $query = $pdo=pdo()->prepare($sql);
    $query->bindValue(':id_article',$id, PDO::PARAM_INT);
    $query->execute();
    $article = $query->fetch();
    if(empty($article)) {
        die('Erreur 404');
    }
} else {
    die('Erreur 404');
}

?>

<div class="container">
    <h2><?php echo ucfirst($article['titre']); ?></h2>
    <p><?php echo nl2br($article['description']); ?></p>
    <p>Date: <?php echo date('d/m/Y à H:i:s', strtotime($article['created_at'])); ?></p>
</div>