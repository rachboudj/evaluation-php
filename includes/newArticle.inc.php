<h1>Ajouter un article</h1>

<?php

if (isset($_POST['frmNewArticle'])) {
    $titre = isset($_POST['titre']) ? htmlentities(trim($_POST['titre'])) : "";
    $description = isset($_POST['description']) ? htmlentities(trim($_POST['description'])) : "";
    $auteur = isset($_POST['auteur']) ? htmlentities(trim($_POST['auteur'])) : "";
    $status = isset($_POST['status']) ? htmlentities(trim($_POST['status'])) :  "";

    $errors = array();

    $errors = validationTexte($errors,$titre,'titre',3,100);
    $errors = validationTexte($errors,$description,'description',10,1000);
    $errors = validationTexte($errors,$auteur,'auteur',3,100);
    $errors = validationTexte($errors,$status,'status',3,100);


    if(count($errors) === 0) {
            $requeteNewArticle = "INSERT INTO articles (titre,description,auteur,created_at,modified_at,status) VALUES (:title,:content,:auteur,NOW(),NOW(),:status)";
            $query = pdo()->prepare($requeteNewArticle);
            $query->bindValue(':titre',$titre, PDO::PARAM_STR);
            $query->bindValue(':description',$description, PDO::PARAM_STR);
            $query->bindValue(':auteur',$auteur, PDO::PARAM_STR);
            $query->bindValue(':status',$status, PDO::PARAM_STR);
            $query->execute();
            // $last_id = pdo()->lastInsertId();
    } else {
        require_once './includes/newArticle.inc.php';
    }
} else {
    $titre = $description = $auteur = $status = "";
    require_once './includes/frmNewArticle.php';
}
