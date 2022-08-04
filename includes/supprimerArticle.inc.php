<?php

if (!empty($_GET['articleId']) && ctype_digit($_GET['articleId'])) 
{
    $id = $_GET['articleId'];
    if ($pdo = pdo()) {
        $sql = "DELETE FROM articles WHERE articles.id_article = '$id'";
        // die($sql);
        $query = $pdo->query($sql);
        $query->execute();
    }
    
} else {
    // die('L\'article n\'a pas été supprimé...');
}