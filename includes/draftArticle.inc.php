<?php

if (!empty($_GET['articleId']) && ctype_digit($_GET['articleId'])) 
{
    $id = $_GET['articleId'];
    if ($pdo = pdo()) {
        $sql = "UPDATE articles SET status = 'draft' WHERE articles.id_article = '$id'";
        $query = $pdo->query($sql);
        $query->execute();
    }
    
} else {
    // die('L\'article n\'a pas été mis en brouillon...');
}