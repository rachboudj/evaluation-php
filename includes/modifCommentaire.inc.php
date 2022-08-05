<?php
$errors = array();
if(!empty($_GET['articleId']) && is_numeric($_GET['articleId'])) {
    $id = $_GET['articleId'];
    $sql = "SELECT * FROM commentaires WHERE id_commentaire = :id_commentaire";
    $query = $pdo=pdo()->prepare($sql);
    $query->bindValue(':id_commentaire',$id, PDO::PARAM_INT);
    $query->execute();
    $commentaire = $query->fetch();
    if (empty($commentaire)) {
        // die();
    }

    if (!empty($_POST['submitted'])) 
    {
        $description = trim(strip_tags($_POST['description']));
        $auteur = trim(strip_tags($_POST['auteur']));
        $status = trim(strip_tags($_POST['status']));

        $errors = validationTexte($errors,$description,'description',10,1000);
        $errors = validationTexte($errors,$auteur,'auteur',3,100);
        $errors = validationTexte($errors,$status,'status',3,100);

        if(count($errors) === 0) 
        {
            $sql = "UPDATE commentaires SET description= :description, auteur= :auteur, modified_at = NOW(),status= 'new' WHERE id_commentaire= :id_commentaire";
            $query = $pdo=pdo()->prepare($sql);
            $query->bindValue(':description',$description, PDO::PARAM_STR);
            $query->bindValue(':auteur',$auteur, PDO::PARAM_STR);
            $query->bindValue(':status',$status, PDO::PARAM_STR);
            $query->bindValue(':id_commentaire',$id, PDO::PARAM_INT);
            $query->execute();
            // echo "<script>window.location.replace('http://localhost:8886/evaluation-php-rachid/index.php?page=articlesAdmin')</script>";
        }
    }
} else {
    // die();
}
?>

