<?php

if (!empty($_GET['articleId']) && ctype_digit($_GET['articleId']) && verifierAdmin() || verifierRedacteur() || verifierModerateur()) 
{
    $id = $_GET['articleId'];
    if ($pdo = pdo()) {
        $sql = "DELETE FROM commentaires WHERE commentaires.id_commentaire = '$id'";
        // die($sql);
        $query = $pdo->query($sql);
        $query->execute();
        // header('Location: index.php?page=detailArticle&id='.$id);
        // die('Problème au niveau de la redirection');
    }
    
} else {
    die('Le commentaire n\'a pas été supprimé...');
}