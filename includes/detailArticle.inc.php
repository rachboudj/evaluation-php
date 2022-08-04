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

